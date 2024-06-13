<?php
include 'connect.php';
$picture = $_FILES['slika']['name'];
$title=$_POST['naslov'];
$about=$_POST['about'];
$content=$_POST['sadrzaj'];
$category=$_POST['kategorija'];
$date=date('d.m.Y.');
if(isset($_POST['arhiva'])){
 $archive=1;
}else{
 $archive=0;
}
$target_dir = 'img/'.$picture;
move_uploaded_file($_FILES["slika"]["tmp_name"], $target_dir);
$query = "INSERT INTO vijesti (datum, naslov, sazetak, tekst, slika, kategorija, arhiva ) VALUES ('$date', '$title', '$about', '$content', '$picture', '$category', '$archive')";
$result = mysqli_query($dbc, $query) or die('Error querying databese.');
mysqli_close($dbc);
?>