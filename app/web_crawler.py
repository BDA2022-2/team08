import os
import time
import pandas as pd

from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys

df = pd.read_csv('C:/xampp/htdocs/data/plant_species.csv')
df_img_url = pd.read_csv('C:/xampp/htdocs/data/plant_species_tmp.csv', index_col=0)
species = df['국명']
length = len(df_img_url)
species = species.iloc[length:]

img_url = []
img_count = 0

def crawling_img(name):
    global img_url
    global img_count
    global df_img_url
    options = webdriver.ChromeOptions()
    options.add_experimental_option("excludeSwitches", ["enable-logging"])
    driver = webdriver.Chrome(options=options)
    driver.get("https://www.google.co.kr/imghp?hl=ko&tab=wi&authuser=0&ogbl")
    elem = driver.find_element(By.NAME, "q")
    elem.send_keys(name)
    elem.send_keys(Keys.RETURN)

    imgs = driver.find_elements(By.CSS_SELECTOR, ".rg_i.Q4LuWd")
    count = 0
    for img in imgs:
        try:
            img.click()
            imgUrl = driver.find_element(By.XPATH, 
                '//*[@id="Sva75c"]/div/div/div/div[3]/div[2]/c-wiz/div[2]/div[1]/div[1]/div[2]/div/a/img').get_attribute(
                "src")
            if imgUrl[0:5] == 'https' :
                img_url.append(imgUrl)
                count = count + 1
            if count >= 1:
                break
        except:
            pass
    img_count = img_count + 1
    if len(img_url) < img_count :
        img_url.append('http://www.billking.co.kr/index/skin/board/basic_support/img/noimage.gif')
    if img_count%100 == 0 :
        print(str(2800+img_count) + "/2939 완료")
        df_img_url = pd.concat([df_img_url.iloc[:length], pd.Series(img_url, name = 'img_url')], axis=0, names= ['img_url'])
        df_img_url.to_csv("C:/xampp/htdocs/data/plant_species_tmp_2.csv", mode="w", header=False, index=False)
    if img_count == 23 :
        print(str(2939+img_count) + "/2963 완료")
        df_img_url = pd.concat([df_img_url.iloc[:length], pd.Series(img_url, name = 'img_url')], axis=0, names= ['img_url'])
        df_img_url.to_csv("C:/xampp/htdocs/data/plant_species_tmp_2.csv", mode="w", header=False, index=False)
    driver.close()

for s in species:
    crawling_img(s)

print("크롤링 완료")