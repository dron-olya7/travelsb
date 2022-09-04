<?php
include_once 'functions.php';
//$link = connect();
$link = new PDO("mysql:host=localhost", "root", "dron0702");
$hid = $_GET['hid'];
$select = 'select countries.country coname, cities.city ciname, hotels.hotel hotname,
        hotels.cost price, hotels.stars stars, hotels.id hid from hotels
join cities on hotels.cityid = cities.id
join countries on cities.countryid = countries.id
where cityid =' . $hid;
$res = mysqli_query($link, $select);
echo '<table width="100%" class="table table-striped text-center">';
echo '<thead style="font-weight: bold;"><td>Hotel</td><td>Country</td><td>City</td><td>Price</td><td>Stars</td><td>Link</td></thead>';
while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
    echo '<tr>';
    echo '<td>' . $row['hotname'] . '</td><td>' . $row['coname'] . '</td><td>' . $row['ciname'] . '</td><td>' . $row['price'] . '</td><td>' . $row['stars'] . '</td><td><a href="pages/hotelinfo.php?hotel=' . $row['hid'] . '" target="_blank">More info</a></td>';
    echo '</tr>';
}
echo '</table><br>';

mysqli_free_result($res);

