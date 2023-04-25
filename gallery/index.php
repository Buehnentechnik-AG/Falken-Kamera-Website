<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>Falken Kamera</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="../styles/default.css">
    <link rel="stylesheet" href="../styles/navbar.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="navbar">
        <nav>
            <h1>Falken Kamera</h1>
            <ul>
                <li><a href="/" target="_self"><b>Home</b></a></li>
                <li><a class="current-nav" href="#"><b>Galerie</b></a></li>
                <li><a href="/latest" target="_self"><b>Neustes Bild</b></a></li>
            </ul>
        </nav>
        <hr>
    </div>
    <div id="wrapper">
        <div id="gallery">

            <?php

            $dir = __DIR__ . DIRECTORY_SEPARATOR . "images" . DIRECTORY_SEPARATOR;
            $images = glob("$dir*.{jpg,jpeg,gif,png,bmp,webp}", GLOB_BRACE);

            foreach (array_reverse($images) as $i) {
                echo ('<div class="img">');
                printf("<img class='zoomable' src='images/%s'/>", basename($i));
                echo ('</div>');
            }

            ?>

        </div>
    </div>

    <script src="../scripts/fullscreen.js"></script>
    <script src="../scripts/navbar.js"></script>
</body>

</html>