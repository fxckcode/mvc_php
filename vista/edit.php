<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu mejor amigo en casa - Edit</title>
    <link rel="stylesheet" href="vista/css/master.css">
</head>
<body>
    <main class="edit">
        <header>
            <h2>Modificar Mascota</h2>
            <a href="index.php?m=index" class="back"></a>
            <a href="index.php?l=logout" class="close"></a>
        </header>
        <?php foreach ($mascota as $v) { ?>
            <figure class="photo-preview">
                <img src="vista/imgs/<?php echo $v['photo'] ?>" alt="">
            </figure>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="text" name="nombre" placeholder="Nombre" value="<?php echo $v['nombre'] ?>">
                <div class="select">
                    <select name="race_id">
                        <option value="">Seleccione Raza...</option>
                        <?php foreach ($raza as $r) { ?>
                            <option value="<?php echo $r['id'] ?>" <?php echo $v['race_id'] = $r['id'] ? "selected" : "" ?>><?php echo $r['name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="select">
                    <select name="category_id">
                        <option value="">Seleccione Categoría...</option>
                        <?php foreach ($categoria as $c) { ?>
                            <option value="<?php echo $c['id'] ?>" <?php echo $v['category_id'] = $c['id'] ? "selected" : "" ?>><?php echo $c['name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <input type="file" name="photo" id="photo">
                <div class="select">
                    <select name="gender_id">
                        <option value="">Seleccione Genero...</option>
                        <?php foreach ($genero as $g) { ?>
                            <option value="<?php echo $g['id'] ?>" <?php echo $v['gender_id '] = $g['id'] ? "selected" : "" ?>><?php echo $g['name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <button class="update">Modificar</button>
                <input type="hidden" name="f" value="actualizar">
            </form>
        <?php } ?>

    </main>
</body>
</html>