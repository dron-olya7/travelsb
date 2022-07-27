function showCities(countryid) {
    if (countryid === "0") {
        document.getElementById('citylist').innerHTML = "";
    }
    //создадим AJAX объект
    var ao = new XMLHttpRequest();
    //создадим функцию для обработки данных с сервера и запишем её в onreadystatechange
    ao.onreadystatechange = function () {
        if (ao.readyState == 4 && ao.status == 200)
        {
            document.getElementById('citylist').innerHTML = ao.responseText;
        }
    }
    //создаём и отправляем AJAX-запрос
    ao.open('GET', "../pages/ajaxcities.php?cid=" + countryid, true);
    ao.send(null);
}

function showHotels(cityid){
    if (cityid === "0"){
        document.getElementById("hoteltable").innerHTML = "";
    }
    let ao = new XMLHttpRequest();
    ao.onreadystatechange = function () {
        if (ao.readyState === 4 && ao.status === 200){
            document.getElementById("hotels").innerHTML = ao.responseText;
        }
    }
    ao.open("GET", "../pages/ajaxhotels.php?hid=" + cityid, true);
    ao.send(null);
}