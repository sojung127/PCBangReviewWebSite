function popup(url){
    var name= "중복확인";

    var popupX = (document.body.offsetWidth / 2) - (500 / 2);
//&nbsp;만들 팝업창 좌우 크기의 1/2 만큼 보정값으로 빼주었음

    var popupY= (document.body.offsetHeight / 2) - (150 / 2);
//&nbsp;만들 팝업창 상하 크기의 1/2 만큼 보정값으로 빼주었음

    var option = "width=500, height=150, left="+ popupX + ', top='+ popupY;
    window.open(url, name, option);

}