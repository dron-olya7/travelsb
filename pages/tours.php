<h2>Select Tours</h2>
<hr>
<?php

try {
    $link = new PDO("mysql:host=localhost; dbname=travelsdb", "root", "dron0702");
    $sqlcountry = "select * from countries";
    $rescountry = $link->query($sqlcountry);
    echo '<select name="countyid" id="countyid" onchange="showCities(this.value);>';
    echo '<option value="0">select country...</option>';
    while ($row = $rescountry->fetch()) {
        echo '<option value="' . $row['id'] . '">' . $row['country'] . '</option>';
    }
    echo '</select>';
    $sqlcity = "select * from cities";
    $rescity = $link->query($sqlcity);
    echo '<select name="cityid" id="citylist" onchange="showHotels(this.value)">';
    echo '<option value="0">select city...</option>';
    while ($row = $rescity->fetch()) {
        echo '<option value="' . $row['id'] . '">' . $row['city'] . '</option>';
    }
    echo'</select>';
    echo '<div id="hotels"></div>';
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}






//$link = connect();
//echo '<div class="form-inline">';
//echo '<select name="countyid" id="countyid" onchange="showCities(this.value);">';
//echo '<option value="0">select country</option>';
//$res = mysqli_query($link, 'select * from countries');
//while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
//    echo '<option value="' . $row['id'] . '">' . $row['country'] . '</option>';
//}
//echo '</select>';
////список городов
//echo '<select name="cityid" id="citylist" onchange="showHotels(this.value)"></select>';
//echo '</div>';
////список отелей
//echo '<div id="hotels"></div>';














//$link = connect();
//$selectcountry = "select * from countries";
//$res = mysqli_query($link, $selectcountry);
//
//
//echo '<table>';
//echo '<tr>';
//echo '<th>Country</th>';
//echo '</tr>';
//while ($row = mysqli_fetch_array($res)){
//    echo '<tr>';
//    echo '<td>'.$row[country].'</td>';
//    echo '</tr>';
//}
//echo '</table>';
//
//$selectcity = "select * from cities order by city";
//$res = mysqli_query($link, $selectcity);
//
//
//echo '<table>';
//echo '<tr>';
//echo '<th>City</th>';
//echo '</tr>';
//while ($row = mysqli_fetch_array($res)){
//    echo '<tr>';
//    echo '<td>'.$row[city].'</td>';
//    echo '</tr>';
//}
//echo '</table>';







//echo '<form action="index.php?page=1" method="post">';
//echo '<select name="countryid" class="col-sm-3 col-md-3 col-lg-3">';
//$res = mysqli_query($link, 'select * from countries order by country');
//echo '<option value="0">Select country...</option>';
//while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
//    echo '<option value="'.$row['id'].'">'.$row['country'].'</option>';
//}
//mysqli_free_result($res);
//echo '<input type="submit" name="selcountry" value="Select Country" class="btn btn-primary">';
//echo '</select>';
//if (isset($_POST['selcountry'])) {
//    echo '<br>';
//    $countryid = $_POST['countryid'];
//    if ($countryid == 0) {
//        exit();
//    }
//    $res = mysqli_query($link, 'select * from cities where countryid='.$countryid.' order by city');
//    echo '<select name="cityid" class="col-sm-3 col-md-3 col-lg-3">';
//    echo '<option value="0">Select city...</option>';
//    while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
//        echo '<option value="'.$row['id'].'">'.$row['city'].'</option>';
//    }
//    mysqli_free_result($res);
//    echo '</select>';
//    echo '<input type="submit" name="selcity" value="Select City" class="btn btn-primary">';
//}
//echo '</form>';



//if (isset($_POST['selcity'])) {
//    $cityid = $_POST['cityid'];
//    $select = 'select cnt.country as "country", ct.city as "city", h.hotel as "hotel", h.cost as "price", h.stars as "stars", h.id as "hotelid"
//                from hotels h, cities ct, countries cnt where h.cityid = ct.id and h.countryid = cnt.id and h.cityid='.$cityid;
//    $res = mysqli_query($link, $select);
//    echo '<table width="100%" class="table table-striped tbtours text-center">';
//    echo '<thead style="font-weight: bold;"><td>Hotel</td><td>Country</td><td>City</td><td>Price</td><td>Starts</td><td>Link</td></thead>';
//    while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
//        echo '<tr id="'.$row['city'].'">';
//        echo '<td>'.$row['hotel'].'</td><td>'.$row['country'].'</td><td>'.$row['city'].'</td><td>'.$row['price'].'</td><td>'.$row['stars'].'</td><td><a href="pages/hotelinfo.php?hotel='.$row['hotelid'].'" target="_blank">More info</a></td>';
//        echo '</tr>';
//    }
//    echo '</table><br>';
//}
//
