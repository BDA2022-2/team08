const mapContainer = document.getElementById("map"), // 지도를 표시할 div
  mapOption = {
    center: new kakao.maps.LatLng(37.54699, 127.09598), // 지도의 중심좌표
    level: 8, // 지도의 확대 레벨
  };

const map = new kakao.maps.Map(mapContainer, mapOption);

//근처 산 데이터 (추후 db 데이터 불러올 부분. 현재 dummy list 생성해둠.)
const positions = [
  { title: "북악산", latlng: new kakao.maps.LatLng(37.593, 126.9737306) },
  { title: "인왕산", latlng: new kakao.maps.LatLng(37.5849, 126.9578444) },
  { title: "삼성산", latlng: new kakao.maps.LatLng(37.43594444, 126.9393917) },
  { title: "매봉산", latlng: new kakao.maps.LatLng(38.07666111, 127.7667472) },
  { title: "영주산", latlng: new kakao.maps.LatLng(37.64494167, 126.8127556) },
  { title: "아차산", latlng: new kakao.maps.LatLng(37.56684444, 127.1027417) },
  { title: "대모산", latlng: new kakao.maps.LatLng(37.47482778, 127.0790111) },
];

// HTML5의 geolocation으로 사용할 수 있는지 확인합니다
if (navigator.geolocation) {
  // GeoLocation을 이용해서 접속 위치를 얻어옵니다
  navigator.geolocation.getCurrentPosition(function (position) {
    const userLat = position.coords.latitude, // 위도
      userLong = position.coords.longitude; // 경도

    // 마커가 표시될 위치를 geolocation으로 얻어온 좌표로 생성합니다
    const userPosition = new kakao.maps.LatLng(userLat, userLong);

    // 커스텀 오버레이와 마커를 표시합니다
    displayMarker(positions, userPosition);
  });
} else {
  // HTML5의 GeoLocation을 사용할 수 없을때 마커 표시 위치와 인포윈도우 내용을 설정합니다
  const userPosition = new kakao.maps.LatLng(37.559285765296, 126.94568079431); //학교 주소로 설정해두었습니다.

  displayMarker(positions, userPosition);
}

// // 마커 이미지 주소
// const imageSrc =
//   "https://user-images.githubusercontent.com/65700066/199877130-73ec9c56-980f-4a11-925d-3bd40dd624c6.png";
// // 마커 이미지 크기
// const imageSize = new kakao.maps.Size(30, 35);
// // 마커 이미지 생성
// const markerImage = new kakao.maps.MarkerImage(imageSrc, imageSize);

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
      '  <a href="http://localhost/team08/app/info.html">' +
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

// // 지도를 표시하는 div 크기를 변경하는 함수입니다
// function resizeMap() {
//   const mapContainer = document.getElementById("map");
//   mapContainer.style.width = "50%";
//   mapContainer.style.height = "50%";
//   mapContainer.style.position = "absolute";

//   mapContainer.style.overflow = "visible";
// }

// function relayout() {
//   // 지도를 표시하는 div 크기를 변경한 이후 지도가 정상적으로 표출되지 않을 수도 있습니다
//   // 크기를 변경한 이후에는 반드시  map.relayout 함수를 호출해야 합니다
//   // window의 resize 이벤트에 의한 크기변경은 map.relayout 함수가 자동으로 호출됩니다
//   map.relayout();
// }
// resizeMap();
// relayout();
