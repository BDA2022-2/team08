const mapContainer = document.getElementById("map"); // 지도를 표시할 div
const mapOption = {
  center: new kakao.maps.LatLng(37.54699, 127.09598), // 지도의 중심좌표
  level: 6, // 지도의 확대 레벨
};

const map = new kakao.maps.Map(mapContainer, mapOption);

//근처 산 데이터 (추후 db데이터 불러올 부분. 현재 dummy list 생성해둠.)
const positions = [
  {
    id: 3351,
    title: "안산",
    latlng: new kakao.maps.LatLng(37.576994, 126.945881),
  },
  {
    id: 3356,
    title: "노고산",
    latlng: new kakao.maps.LatLng(37.552947, 126.941892),
  },
  {
    id: 3362,
    title: "망봉산",
    latlng: new kakao.maps.LatLng(37.573311, 126.893833),
  },
  {
    id: 3363,
    title: "와우산",
    latlng: new kakao.maps.LatLng(37.551353, 126.928578),
  },
  {
    id: 3333,
    title: "매봉",
    latlng: new kakao.maps.LatLng(37.629706, 126.908344),
  },
  {
    id: 3335,
    title: "매봉",
    latlng: new kakao.maps.LatLng(37.638069, 126.953694),
  },
  {
    id: 3350,
    title: "백련산",
    latlng: new kakao.maps.LatLng(37.591589, 126.927789),
  },
  {
    id: 3334,
    title: "남장대",
    latlng: new kakao.maps.LatLng(37.633681, 126.970978),
  },
  {
    id: 3352,
    title: "북악산",
    latlng: new kakao.maps.LatLng(37.593, 126.973731),
  },
  {
    id: 3353,
    title: "인왕산",
    latlng: new kakao.maps.LatLng(37.5849, 126.957844),
  },
  {
    id: 1902,
    title: "보문산",
    latlng: new kakao.maps.LatLng(36.296194, 127.421856),
  },
  {
    id: 3357,
    title: "남산",
    latlng: new kakao.maps.LatLng(37.551647, 126.987744),
  },
];

// HTML5의 geolocation으로 사용할 수 있는지 확인합니다
if (navigator.geolocation) {
  // GeoLocation을 이용해서 접속 위치를 얻어옵니다
  navigator.geolocation.getCurrentPosition(function (position) {
    const userLat = position.coords.latitude; // 위도
    const userLong = position.coords.longitude; // 경도

    // 마커가 표시될 위치를 geolocation으로 얻어온 좌표로 생성합니다
    const userPosition = new kakao.maps.LatLng(userLat, userLong);

    // 마커를 표시합니다
    displayMarker(positions, userPosition);
  });
} else {
  // HTML5의 GeoLocation을 사용할 수 없을때 마커 표시 위치와 인포윈도우 내용을 설정합니다
  const userPosition = new kakao.maps.LatLng(37.5668522, 126.9488277); //학교 주소로 설정해두었습니다.

  displayMarker(positions, userPosition);
}

function displayMarker(positions, userPosition) {
  // 사용자 위치 마커 생성 및 표시
  const marker = new kakao.maps.Marker({
    map: map,
    position: userPosition,
  });
  // 마커가 지도 위에 표시되도록 설정합니다
  marker.setMap(map);

  for (let i = 0; i < positions.length; i++) {
    // 커스텀 오버레이에 표출될 내용으로 HTML 문자열이나 document element가 가능합니다
    const content =
      '<div class="customoverlay">' +
      `  <a href="http://localhost/team08/app/info.php?mtn_index=${positions[i].id}&mtn_name=${positions[i].title}">` +
      `    <span class="title">${positions[i].title}</span>` +
      "  </a>" +
      "</div>";

    // 커스텀 오버레이를 생성합니다
    const customOverlay = new kakao.maps.CustomOverlay({
      map: map,
      position: positions[i].latlng,
      content: content,
      yAnchor: 1,
    });

    // 커스텀 오버레이를 지도에 표시합니다.
    customOverlay.setMap(map);
    map.setCenter(positions[i].latlng);
  }
  // 지도 중심좌표를 접속위치로 변경합니다
  map.setCenter(userPosition);
}
