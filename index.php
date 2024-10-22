<?php
include("includes/conexion.php");
conectar();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Layout</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <header>
        <h1>Mi Página</h1>
    </header>
    
    <div class="container">
        <nav class="menu">
            <ul>
                <li><a href="index.php" style="color:white;">Inicio</a></li>
                    <?php
                    $sql = "SELECT * FROM menu ORDER BY nombre_item";//armo la cadena SQL
                    $sql = mysqli_query($con, $sql);//ejecuto la consulta
                    if(mysqli_num_rows($sql) != 0)//pregunto si tiene datos
                    {
                        while ($r = mysqli_fetch_array($sql))//recorro todos los registros
                        {
                            ?>
                            <li><a href="index.php?modulo=<?php echo $r['nombre_modulo']?>" style="color:white;"><?php echo $r['nombre_item']?></a></li>
                            <?php
                        }
                    }
                    ?>
            </ul>
        </nav>
        
        <main class="content">
        <?php
            if(isset($_GET['modulo']))
            {
                include ('modulos/'.$_GET['modulo'].'.php');
            }
            else
            {
                ?>
                <h2>Bienvenido a nuestra página</h2>
                <p>Este es el contenido principal de la página. Aquí puedes colocar cualquier información relevante.</p>
                <?php
            }
            ?>
        </main>
    </div>

    <footer>
        <p>© 2024 Mi Página. Todos los derechos reservados.</p>
    </footer>
</body>
</html>