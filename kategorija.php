<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TvzNews</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php
    include 'connect.php';
    $kategorija=$_GET['id'];
    $query = "SELECT * FROM vijesti WHERE kategorija='$kategorija' AND arhiva=0";
    $result = mysqli_query($dbc, $query);
     ?>
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
    <main class="content">
    <section>
        <h2 style="color:red;"><?php echo $kategorija; ?></h2>
        <div class="b-container">
    <?php
       
       
        while($row = mysqli_fetch_array($result)) {
        
        echo '<article>';
        echo '<img src="img/'. $row['slika'] . '" alt="nema slike">';
        echo '<h4>';
        echo '<a href="clanak.php?id='.$row['id'].'">';
        echo $row['naslov'];
        echo '</a></h4>';
        echo '</article>';
        }
    ?> 
    </div>
</section>
</main>
    <footer>
        <p>Marin Borevković</p>
        <p>mborevkov@tvz.hr</p>
        <p>2024</p>
    </footer>
</body>
</html>