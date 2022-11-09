<?php
    date_default_timezone_set('Asia/Seoul');

    $ch = curl_init();
    $url = 'http://apis.data.go.kr/1360000/VilageFcstInfoService_2.0/getVilageFcst'; /*URL*/
    $queryParams = '?' . urlencode('serviceKey') . '=PLM%2FTnlUf%2BzzHw3XZNg97c1vQJ3frT%2BRyoCkq%2FtEoFplOMT0KjvIgVZFPwVTyD%2F8GctHGBnwLXiaHNAm9ZSqLA%3D%3D'; /*Service Key*/
    $queryParams .= '&' . urlencode('pageNo') . '=' . urlencode('1'); /**/
    $queryParams .= '&' . urlencode('numOfRows') . '=' . urlencode('1000'); /**/
    $queryParams .= '&' . urlencode('dataType') . '=' . urlencode('XML'); /**/
    $queryParams .= '&' . urlencode('base_date') . '=' . urlencode(date("Ymd",time())); /**/
    $queryParams .= '&' . urlencode('base_time') . '=' . urlencode(date("Hi",time())); /**/
    $queryParams .= '&' . urlencode('nx') . '=' . urlencode('36'); /**/
    $queryParams .= '&' . urlencode('ny') . '=' . urlencode('127'); /**/
    
    curl_setopt($ch, CURLOPT_URL, $url . $queryParams);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    $response = curl_exec($ch);
    curl_close($ch);
    
    $object = simplexml_load_string($response);
    $items = $object->body->items->item;
    $TMX = "";
    $TMN = "";
    $POP = "";
    $PCP = "";
    $ctgs = ["TMX", "TMN", "POP", "PCP"];
    // foreach ($items as $item) {
    //     if ($tmp != (string)$item->category){
    //         $tmp = (string)$item->category;
    //         print($tmp."<br>");
    //         ${$tmp} = (string)$item->fcstValue;
    //         print(${$tmp}."<br>");
    //     }
    // }
    foreach ($items as $item) {
        $tmp = (string)$item->category;
        print($item);
        if (in_array($tmp, $ctgs)){
            ${$tmp} = (string)$item->fcstValue;
        }
        if ($TMX & $TMN & $POP & $PCP) {
            break;
        }
    }
    print($TMX.$TMN.$POP.$PCP);


?>