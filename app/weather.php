<?php
    $ch = curl_init();
    $url = 'http://apis.data.go.kr/1360000/VilageFcstInfoService_2.0/getVilageFcst'; /*URL*/
    $queryParams = '?' . urlencode('serviceKey') . '=PLM/TnlUf+zzHw3XZNg97c1vQJ3frT+RyoCkq/tEoFplOMT0KjvIgVZFPwVTyD/8GctHGBnwLXiaHNAm9ZSqLA=='; /*Service Key*/
    $queryParams .= '&' . urlencode('pageNo') . '=' . urlencode('1'); /**/
    $queryParams .= '&' . urlencode('numOfRows') . '=' . urlencode('1000'); /**/
    $queryParams .= '&' . urlencode('dataType') . '=' . urlencode('XML'); /**/
    $queryParams .= '&' . urlencode('base_date') . '=' . urlencode('20210628'); /**/
    $queryParams .= '&' . urlencode('base_time') . '=' . urlencode('0500'); /**/
    $queryParams .= '&' . urlencode('nx') . '=' . urlencode('55'); /**/
    $queryParams .= '&' . urlencode('ny') . '=' . urlencode('127'); /**/
    
    curl_setopt($ch, CURLOPT_URL, $url . $queryParams);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    $response = curl_exec($ch);
    curl_close($ch);
    
    var_dump($response);
?>