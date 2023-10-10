<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu mejor amigo en casa - Dashboard</title>
    <link rel="stylesheet" href="vista/css/master.css">
</head>
<body>
    <main class="dashboard">
        <header>
            <h2>Administrar Mascotas</h2>
            <a href="index.php?l=logout" class="close"></a>
        </header>
       <a href="index.php?m=nuevo" class="add"></a>
       <table>
           <?php foreach ($mascota as $value) { ?>
               <tr>
                   <td>
                       <figure class="photo">
                           <img src="vista/imgs/<?php echo $value['photo'] ?>" alt="">
                       </figure>
                       <div class="info">
                           <h3><?php echo $value['nombre'] ?></h3>
                           <h4><?php echo $value['raza'] ?></h4>
                       </div>
                       <div class="controls">
                           <a href="index.php?m=show&id=<?php echo $value['id'] ?>" class="show"></a>
                           <a href="index.php?m=editar&id=<?php echo $value['id'] ?>" class="edit"></a>
                           <a href="index.php?m=eliminar&id=<?php echo $value['id'] ?>" class="delete"></a>
                       </div>
                   </td>
               </tr>
           <?php }?>
       </table>
    </main>
</body>
</html>