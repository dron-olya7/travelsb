<?php
//$link = connect();
$link = new PDO("mysql:host=localhost", "root", "dron0702");

echo '<form action="index.php?page=5" method="post" enctype="multipart/form-data" class="input-group">';
echo '<select name="userid">';
$select = 'SELECT * from users where roleid = 2 order by login';
$res = mysqli_query($link, $select);
while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)){
    echo '<option value="'.$row['id'].'">'.$row['login'].'</option>';
}
mysqli_free_result($res);
echo '</select>';
echo '<input type="hidden" name="MAX_FILE_SIZE" valie="50000">';
echo '<input type="file" name="file" accept="image/*">';
echo '<input type="submit" name="addadmin" value="Add" class="btn btn-sm btn-info">';
echo '</form>';

if(isset($_POST['addadmin'])){
    $userid = $_POST['userid'];
    $fn = $_FILES['file']['tmp_name'];
    $file = fopen($fn, 'rb');
    $img = fread($file, filesize($fn));
    fclose($file);
    $img = addslashes($img);
    $insert = 'UPDATE users set avatar="'.$img.'", roleid=1 where id='.$userid;
    mysqli_query($link, $insert);
}
$select = 'SELECT * from users where roleid = 1 order by login'; 
$res = mysqli_query($link, $select);
echo '<table class="table table-striped">';
while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)){
    echo '<tr>';
    echo '<td>' .$row['id']. '</td>';
    echo '<td>' .$row['login']. '</td>';
    echo '<td>' .$row['email']. '</td>';
    $img = base64_encode($row['avatar']);
    echo '<td><img height="100px" src="data:image/jpeg; base64, '.$img.'"></td>';
    echo '</tr>';
}
mysqli_free_result($res);
echo '</table>';

echo '<form action="index.php?page=5" method="post" class="input-group">';
echo '<select name="deluserid">';
$selectD = 'SELECT * from users where roleid = 1';
$res = mysqli_query($link, $selectD);
while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)){
    echo '<option value="'.$row['id'].'">'.$row['login'].'</option>';
}
mysqli_free_result($res);
echo '<input type="submit" name="deladmin" value="Delete" class="btn btn-sm btn-info">';
echo '</select>';
echo '</form';


if(isset($_POST['deladmin'])){
    $userid = $_POST['deluserid'];
    $insertDel = 'UPDATE users set roleid = 2 where id=' . $userid;
    mysqli_query($link, $insertDel);

}

