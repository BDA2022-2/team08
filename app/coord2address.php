<?php
  // https://developers.kakao.com/docs/latest/ko/local/dev-guide#coord-to-address
  // https://dreamaz.tistory.com/35
  $userLat = $_POST['userLat'];
  $userLon = $_POST['userLon'];
  $kakao_restapi_key = "9c64e752a5fc407d416ba6bd2dbd6ef6";
  $url = 'https://dapi.kakao.com/v2/local/geo/coord2address'; // URL
  $queryParams = '?' . urlencode('x') . '=' . urlencode($userLon); // user 경도
  $queryParams .= '&' . urlencode('y') . '=' . urlencode($userLat); // user 위도
  $header_data = [];
  $header_data[] = 'Authorization: KakaoAK '.$kakao_restapi_key;
  
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url . $queryParams); // 연결 URL
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); // 반환값 문자열로 반환
  curl_setopt($ch, CURLOPT_HEADER, TRUE); //헤더 정보를 보내도록 함
  curl_setopt($ch, CURLOPT_HTTPHEADER, $header_data); //header 지정하기
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
  $response = curl_exec($ch); // curl 실행
  curl_close($ch); // curl 종료
  $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
  $header = substr($response, 0, $header_size);
  $body = substr($response, $header_size);    
  $body_json = json_decode($body, true);
  
  $address_name = $body_json["documents"][0]["address"]["address_name"]; // 전체 지번 주소
  $region_1depth_name = $body_json["documents"][0]["address"]["region_1depth_name"]; // 지역 1Depth명, 시도 단위
  $region_2depth_name = $body_json["documents"][0]["address"]["region_2depth_name"]; // 지역 2Depth명, 구 단위
?>