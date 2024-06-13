<?php include 'connect.php';
define('UPLPATH', 'img/');
if(isset($_POST['update'])){
$picture = $_FILES['slika']['name'];
$title=$_POST['naslov'];
$about=$_POST['about'];
$content=$_POST['sadrzaj'];
$category=$_POST['kategorija'];
if(isset($_POST['arhiva'])){
 $archive=1;
}else{
 $archive=0;
}
$target_dir = 'img/'.$picture;
$standard_dir = $_FILES["slika"]["tmp_name"];
move_uploaded_file($standard_dir, $target_dir);
$id=$_POST['id'];
$query = "UPDATE vijesti SET naslov='$title', sazetak='$about', tekst='$content', kategorija='$category', arhiva='$archive' WHERE id=$id ";

$result = mysqli_query($dbc, $query);

if($picture != '')
{
    $query2 = "UPDATE vijesti SET slika='$picture' WHERE id=$id";
    $result2 = mysqli_query($dbc, $query2);
}

}
?>