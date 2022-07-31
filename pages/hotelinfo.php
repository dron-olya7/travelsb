<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hotel Info</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/info.css">
</head>
<body>
<?
include_once "functions.php";
if (isset($_GET['hotel'])) {
    $hotel = $_GET['hotel'];
    $link = connect();
    $select = 'select * from hotels where id=' . $hotel;
    $res = mysqli_query($link, $select);
    $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
    $hname = $row['hotel'];
    $hstars = $row['stars'];
    $hcost = $row['cost'];
    $hinfo = $row['info'];
    $hid = $row['id'];
    mysqli_free_result($res);
    echo '<h2 class="text-uppercase text-center">'.$hname.'</h2>';
   // echo '<div class="row"><div class="col-md-6 text-center">';
    $select = 'select imagepath from images where hotelid=' . $hotel;
    $res = mysqli_query($link, $select);
    echo '<span class="label label-info">Watch your pictures</span>';
    echo '<ul id="gallery" class="info">';
    $i = 0;
    while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
        echo '<div class="flex-container"><li><img src="../'.$row['imagepath'].'" alt="image hotel" style="height: 300px;"></li>';
    }
    mysqli_fetch_array($res);
    echo '<p><li> Звезды: ' . $hstars. '</p>';
    echo '<p> Стоимость за сутки: ' . $hcost. '</p>';
    echo '<p>' . $hinfo. '</p></li></div>';
    echo '</ul>';


    $select = 'SELECT * from comments, users where hotelid = ' . $hid . ' and userid = users.id order by login';
    $res = mysqli_query($link, $select);
    echo '<p class="text-center">Comments</p>';
    echo '<table class="table">';
    while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
        echo '<tr>';
        echo '<td class="text-center">'.$row['comment'].'</td>';
        echo '<td>'.$row['login'].'</td>';
        echo '</tr>';
    }
    mysqli_free_result($res);
    echo '</table>';





}


?>


<!--    --><?//
//    $select = 'SELECT * from comments, users where hotelid = ' . $hid . ' and userid = users.id order by login';
//    $res = mysqli_query($link, $select);
//    echo '<table class="table table-striped">';
//    while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
//        echo '<tr>';
//        echo '<td>' . $row['comment'] . '</td>';
//        echo '<td>' . $row['login'] . '</td>';
//        echo '</tr>';
//    }
//    mysqli_free_result($res);
//    ?>


</body>
</html>
