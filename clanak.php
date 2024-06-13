<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TvzNews</title>
    <link rel="stylesheet" href="styles.css"/>
</head>
<body>
    <?php
    include 'connect.php';
    $id=$_GET['id'];
    $query = "SELECT * FROM vijesti WHERE id='$id'";
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
        <?php while($row = mysqli_fetch_array($result)): ?>
    <div class="hero">
        <h2><?php echo $row['kategorija'];?></h2>
        <h1><?php echo $row['naslov'];?></h1>
        <p><?php echo "".$row['datum'];?></p>
        
    </div>
    <div class="slika">
        <?php echo "<img src= 'img/".$row['slika']."' alt='Nema slike'>";?>
        <h2 class="kategorija_clanak"><?php echo $row['kategorija'];?></h2>
    </div>
    <p style="margin: 15px 0; font-size:1.5rem;font-weight:bold;"><?php echo $row['sazetak'];?></p>
    <div class="text">
        <p><?php echo $row['tekst'];?></p>
    </div>
    <?php endwhile; ?>
    </main>
  
    <footer>
        <p>Marin Borevković</p>
        <p>mborevkov@tvz.hr</p>
        <p>2024</p>
    </footer>
</body>