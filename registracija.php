<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TvzNews</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>TvzNews</h1>
        <div class="bottom-bar">
            <p>Fri, June 13, 2024</p>
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <div class="vl"></div>
                <li><a href="kategorija.php?id=Sport">Sport</a></li>
                <div class="vl"></div>
                <li><a href="kategorija.php?id=Kultura">Kultura</a></li>
                <div class="vl"></div>
                <li><a href="kategorija.php?id=Politika">Politika</a></li>
                <div class="vl"></div>
                <li><a href="kategorija.php?id=Zabava">Zabava</a></li>
                <div class="vl"></div>
                <li><a href="administracija.php">Administracija</a></li>
                <div class="vl"></div>
                <li><a href="unos.html">Unos</a></li>
            </ul>
        </nav>
    </header>

<?php
include 'connect.php';
$ime = $_POST['ime'];
$prezime = $_POST['prezime'];
$username = $_POST['username'];
$lozinka = $_POST['pass'];
$hashed_password = password_hash($lozinka, CRYPT_BLOWFISH);
$razina = 0;
$registriranKorisnik = '';

$sql = "SELECT korisnicko_ime FROM korisnik WHERE korisnicko_ime = ?";
$stmt = mysqli_stmt_init($dbc);
if (mysqli_stmt_prepare($stmt, $sql)) {
 mysqli_stmt_bind_param($stmt, 's', $username);
 mysqli_stmt_execute($stmt);
 mysqli_stmt_store_result($stmt);
 }
if(mysqli_stmt_num_rows($stmt) > 0)
{
    $msg='Korisničko ime već postoji!';
}
else
{
    $sql = "INSERT INTO korisnik (ime, prezime, korisnicko_ime, lozinka, razina) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($dbc);
        if (mysqli_stmt_prepare($stmt, $sql)) 
        {
            mysqli_stmt_bind_param($stmt, 'ssssd', $ime, $prezime, $username, $hashed_password, $razina);
            mysqli_stmt_execute($stmt);
            $registriranKorisnik = true;
        }       
}
mysqli_close($dbc);
?>
<?php 
if($registriranKorisnik == true)
{

    echo 'Uspješno ste registrirani!';
    $_SESSION['$username'] = $username;
    $_SESSION['$level'] = $razina;
    header( "refresh:2;url=index.php" );
}else{ ?>
    <form class='registracija' action="registracija.php" method='POST'>

        <span id="porukaIme" class="bojaPoruke"></span>
        <input type='text' id='ime' name='ime' placeholder='Ime'>

        <span id="porukaPrezime" class="bojaPoruke"></span>
        <input type='text' id='prezime' name='prezime' placeholder='Prezime'>

        <span id="porukaUsername" class="bojaPoruke"></span>
        <?php echo ' <span class="bojaPoruke">'.$msg.'</span>'; ?>
        <input type='text' id='username' name='username' placeholder='Korisničko ime'>

        <span id="porukaPass" class="bojaPoruke"></span>
        <input type='password' id='pass' name='pass' placeholder='Lozinka'>

        <span id="porukaPassRep" class="bojaPoruke"></span>
        <input type='password' id='passRep' name='passRep' placeholder='Ponovite lozinku'>

        <input type='submit' value='Registriraj se' name='registracija' id="slanje">
    </form>
    <script type="text/javascript">
 document.getElementById("slanje").onclick = function(event) {

 var slanjeForme = true;

 var poljeIme = document.getElementById("ime");
 var ime = document.getElementById("ime").value;
 if (ime.length == 0) {
 slanjeForme = false;
 poljeIme.style.border="1px dashed red";
 document.getElementById("porukaIme").innerHTML="<br>Unesite ime!<br>";
 } else {
 poljeIme.style.border="1px solid green";
 document.getElementById("porukaIme").innerHTML="";
 }
 var poljePrezime = document.getElementById("prezime");
 var prezime = document.getElementById("prezime").value;
 if (prezime.length == 0) {
 slanjeForme = false;

 poljePrezime.style.border="1px dashed red";

document.getElementById("porukaPrezime").innerHTML="<br>Unesite Prezime!<br>";
 } else {
 poljePrezime.style.border="1px solid green";
 document.getElementById("porukaPrezime").innerHTML="";
 }

 var poljeUsername = document.getElementById("username");
 var username = document.getElementById("username").value;
 if (username.length == 0) {
 slanjeForme = false;
 poljeUsername.style.border="1px dashed red";

document.getElementById("porukaUsername").innerHTML="<br>Unesite korisničko ime!<br>";
 } else {
 poljeUsername.style.border="1px solid green";
 document.getElementById("porukaUsername").innerHTML="";
 }

 var poljePass = document.getElementById("pass");
 var pass = document.getElementById("pass").value;
 var poljePassRep = document.getElementById("passRep");
 var passRep = document.getElementById("passRep").value;
 if (pass.length == 0 || passRep.length == 0 || pass != passRep) {
 slanjeForme = false;
 poljePass.style.border="1px dashed red";
 poljePassRep.style.border="1px dashed red";
 document.getElementById("porukaPass").innerHTML="<br>Lozinke nisu iste!<br>";

document.getElementById("porukaPassRep").innerHTML="<br>Lozinke nisu iste!<br>";
 } 
 else {
 poljePass.style.border="1px solid green";
 poljePassRep.style.border="1px solid green";
 document.getElementById("porukaPass").innerHTML="";
 document.getElementById("porukaPassRep").innerHTML="";
 }

 if (slanjeForme != true) {
 event.preventDefault();
 }


 };

 </script>
<?php } ?>
</body>
</html>