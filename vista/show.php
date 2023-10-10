<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu mejor amigo en casa - Show</title>
    <link rel="stylesheet" href="vista/css/master.css">
</head>
<body>
    <main class="show">
        <header>
            <h2>Consultar Mascota</h2>
            <a href="index.php?m=index" class="back"></a>
            <a href="index.php?l=logout" class="close"></a>
        </header>
        <?php foreach ($mascota as $value) { ?>
            <figure class="photo-preview">
                <img src="vista/imgs/<?php echo $value['photo'] ?>" alt="">
            </figure>
            <div>
                <article class="info-name"><p><?php echo $value['nombre'] ?></p></article>
                <article class="info-race"><p><?php echo $value['raza'] ?></p></article>
                <article class="info-category"><p><?php echo $value['categoria'] ?></p></article>
                <article class="info-gender"><p><?php echo $value['genero'] ?></p></article>
            </div>
        <?php } ?>

    </main>
</body>
</html>