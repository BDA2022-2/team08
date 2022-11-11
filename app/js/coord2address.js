let address = "주소";
async function coord2address() {
  const kakao_restapi_key = "9c64e752a5fc407d416ba6bd2dbd6ef6";
  const options = {
    method: "GET",
    headers: { Authorization: "KakaoAK " + kakao_restapi_key },
  };
  const result = await fetch(
    "https://dapi.kakao.com/v2/local/geo/coord2address.json?x=126.9393917&y=37.43594444",
    options
  );
  const json = await result.json();
  return (address = json.documents[0].address);
  //region_1depth_name = address.region_1depth_name;
  //region_2depth_name = address.region_2depth_name;
  // console.log(address);
  // console.log(region_1depth_name);
  // console.log(region_2depth_name);
}
// document.addEventListener("DOMContentLoaded", coord2address);
coord2address().then((result) => {
  address = result;
  console.log(address);
});
