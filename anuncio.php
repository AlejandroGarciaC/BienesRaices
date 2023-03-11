<?php
$id = $_GET['resultado'] ?? null;
$id = filter_var($id, FILTER_VALIDATE_INT);

if(!$id){
    header("Location: /");
}

// Importar la conexion
require 'includes/config/database.php';
$db=conectarDB();

// Escribir el query
$query = "SELECT * FROM propiedades WHERE id = ${id}";
// Consultar la BD
$consulta = mysqli_query($db, $query);
$resultados = mysqli_fetch_assoc($consulta); 


    require 'includes/funciones.php';
    incluirTemplate('header')
    
?>


    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $resultados['titulo'];?></h1>

            <img src="/imagenes/<?php echo $resultados['imagen'];?>" alt="imagen propiedad">
      

        <div class="resumen-propiedad">
            <p class="precio"><?php echo $resultados['precio'];?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p><?php echo $resultados['wc'];?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono_estacionamiento">
                    <p><?php echo $resultados['estacionamiento'];?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                    <p><?php echo $resultados['habitaciones'];?></p>
                </li>
            </ul>

            <p><?php echo $resultados['descripcion'];?></p>
        </div>
    </main>

    <?php
    mysqli_close($db);
    incluirTemplate('footer');
    ?>