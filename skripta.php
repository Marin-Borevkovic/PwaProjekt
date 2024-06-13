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
    include 'unos.php';
        $title = $_POST['naslov'];
        $about = $_POST['about'];
        $content = $_POST['sadrzaj'];
        $category = $_POST['kategorija'];
        $slika  = $_FILES['slika']['name'];
        $submit = $_POST['submit'];
        $target_dir = 'img/'.$slika;
        move_uploaded_file($_FILES["slika"]["tmp_name"], $target_dir);
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
            <article class="novi">
                <?php if(isset($submit)):?>
                    <p><?php echo $category; ?></p>
                    <h2><?php echo $title; ?></h2>
                    <p>Autor:</p>
                    <p>Objavljeno:<?php echo date("d.m.Y"); ?></p>
                    <p style="padding:10px"><?php 
                    echo "<img  style='height:290px;width:520px;' src='img/$slika' alt='Nema slike'>"; 
                    ?></p>
                    <p class="about" style="padding:10px"><?php echo $about; ?></p>
                    <p class="sadrzaj" style="padding:10px"><?php echo $content; ?></p>
                    
                    
                <?php endif; ?>
            </article>
        </section>
    </main>
    <footer>
        <p>Marin Borevković</p>
        <p>mborevkov@tvz.hr</p>
        <p>2024</p>
    </footer>
</body>
</html>