<?php

$link = connect();
echo '<form action="index.php?page=2" method="post" class="input-group">';
echo '<select name="hotel">';
$select = 'select countries.country, cities.city, hotels.hotel, hotels.id, users.id
            from countries, cities, hotels, users where countries.id = hotels.countryid and cities.id = hotels.cityid order by countries.country';
$res = mysqli_query($link, $select);
$linkCountry = [];
while ($row = mysqli_fetch_array($res, MYSQLI_NUM)) {
    echo '<option value="' . $row[3] . '">';
    echo $row[0] . ' / ' . $row[1] . ' / ' . $row[2];
    echo '</option>';

}
echo '<input type="text" name="comment" placeholder="Comment" >';
echo '<input type="submit" name="addcomment" value="Add" class="btn btn-sm btn-info">';
echo '</select>';
echo '</form>';

mysqli_free_result($res);
if (isset($_REQUEST['addcomment'])) {
    $hotelid = $_POST['hotel'];
    $usersid = $linkCountry[$hotelid];
    $comment = $_POST['comment'];
    $insertcomment = 'insert into comments(comment, userid, hotelid) values ("' . $comment . '",' . $usersid . "," . $hotelid . ')';
    mysqli_query($link, $insertcomment);
    echo "<script>";
    echo "window.location=document.URL;";
    echo "</script>";
}
