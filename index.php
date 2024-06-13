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
    <main class="content">
        <?php
            include 'connect.php';
            define('UPLPATH', 'img/');
        ?>
        <hr>
        <section class="sport">
            <h2>Sport</h2>
            <div class="b-container">
                    <?php
                    $query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='sport' LIMIT 3";
                    $result = mysqli_query($dbc, $query);
                    while($row = mysqli_fetch_array($result)) {
                    echo '<article>';
                    echo '<img src="'.UPLPATH.$row['slika'].'" alt="nema slike">';   
                    echo '<h4>';
                    echo '<a href="clanak.php?id='.$row['id'].'">';
                    echo $row['naslov'];
                    echo '</a></h4>';
                    echo '</article>';
                    }
                ?> 
            </div>
        </section>
        <hr>
        <section class="kultura">
            <h2>Kultura</h2>
            <div class="b-container">
                <?php
                    $query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='kultura' LIMIT 3";
                    $result = mysqli_query($dbc, $query);
                    while($row = mysqli_fetch_array($result)) {
                    echo '<article>';
                    echo '<img src="'.UPLPATH.$row['slika'].'" alt="nema slike">';
                    echo '<h4>';
                    echo '<a href="clanak.php?id='.$row['id'].'" >';
                    echo $row['naslov'];
                    echo '</a></h4>';
                    echo '</article>';
                    }
                ?> 
            </div>
        </section>
        <hr>
        <section class="politika">
            <h2>Politika</h2>
            <div class="b-container">
                <?php
                    $query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='politika' LIMIT 3";
                    $result = mysqli_query($dbc, $query);
                    while($row = mysqli_fetch_array($result)) {
                    echo '<article>';
                    echo '<img src="'.UPLPATH.$row['slika'].'" alt="nema slike">';
                    echo '<h4>';
                    echo '<a href="clanak.php?id='.$row['id'].'" >';
                    echo $row['naslov'];
                    echo '</a></h4>';
                    echo '</article>';
                    }
                ?> 
            </div>
        </section>
        <hr>
        <section class="zabava">
            <h2>Zabava</h2>
            <div class="b-container">
                <?php
                    $query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='zabava' LIMIT 3";
                    $result = mysqli_query($dbc, $query);
                    while($row = mysqli_fetch_array($result)) {
                    echo '<article>';
                    echo '<img src="'.UPLPATH.$row['slika'].'" alt="nema slike">';
                    echo '<h4>';
                    echo '<a href="clanak.php?id='.$row['id'].'" >';
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
        <hr>
    </footer>
</body>
</html>