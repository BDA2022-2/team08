window.addEventListener(
  "DOMCountentLoaded",
  navigator.geolocation.getCurrentPosition(success, failed)
);
function success(pos) {
  const coord = pos.coords;
  userLat = coord.latitude;
  userLon = coord.longitude;
  document.write(
    '<form action="near.php" id="sbm_form" method="post"><input type="hidden" name="userLat" value="' +
      userLat +
      '"><input type="hidden" name="userLon" value="' +
      userLon +
      '"></form>'
  );
  document.getElementById("sbm_form").submit();
}
function failed(err) {
  console.log("geoloc 실패");
}
