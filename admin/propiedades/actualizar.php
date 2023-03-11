<?php

require '../../includes/funciones.php';

$auth = estaAutenticado();

if(!$auth){
    header("Location: /");
}


$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);
intval($id);
if(!$id){
    header('Location: /admin');
}

  //Base de datos

  require '../../includes/config/database.php';
  $db=conectarDB();

//Obtener los datos de la propiedad

$consulta = "SELECT * FROM propiedades WHERE id= ${id}";
$resultado = mysqli_query($db, $consulta);
$propiedad = mysqli_fetch_assoc($resultado);

var_dump($propiedad);
    //Consultar para obtener los vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

    //Arreglo con mensajes de errores
    $errores= [];

    $titulo = $propiedad['titulo'];
    $precio =$propiedad['precio'];
    $descripcion = $propiedad['descripcion'];
    $habitaciones = $propiedad['habitaciones'];
    $wc = $propiedad['wc'];
    $estacionamiento = $propiedad['estacionamiento'];
    $vendedores_id = $propiedad['vendedores_id'];
    $imagenPropiedad = $propiedad['imagen'];

//Ejecuta el codigo despues de que el usuario envia el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
    $precio = mysqli_real_escape_string($db, $_POST['precio']);
    $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
    $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
    $wc = mysqli_real_escape_string($db, $_POST['wc']);
    $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
    $vendedores_id = mysqli_real_escape_string($db, $_POST['vendedores_id']);
    $creado = date('y/m/d');


    //asignar files a una imagen

    $imagen = $_FILES['imagen'];

    if(!$titulo){
        $errores[] = "Debes de añadir un titulo";
    }

    if(!$precio){
        $errores[] = "El precio es obligatorio";
    }

    if(strlen( $descripcion) < 30){
        $errores[] = "La descripcion es obligatoria y debe tener al menos 30 caracteres";
    }

    if(!$habitaciones){
        $errores[] = "El numero de habitaciones es obligatorio";
    }

    if(!$wc){
        $errores[] = "El numero de baños es obligatorio";
    }

    if(!$estacionamiento){
        $errores[] = "El numero de lugares estacionamientos es obligatorio";
    }

    if(!$vendedores_id){
        $errores[] = "Elige un vendedor";
    }
    //Validar por tamano (maximo 1 M)
        $medida = 1000*1000;
    if($imagen['size']> $medida){
        $errores = "La imagen es muy grande";
    }
    // echo '<pre>';
    //     var_dump($errores);
    // echo '<pre>';


    if(empty($errores)){
        // //Crear carpetas

        $carpetaImagenes = '../../imagenes/';
        if(!is_dir($carpetaImagenes)){
            mkdir($carpetaImagenes);
        }
        $nombreImagen = '';
        // //Subida de archivos
        if ($imagen['name']){
            //Eliminar la imagen previa
            unlink($carpetaImagenes . $propiedad['imagen']);
            // //Generar nombre unico a los archivos
            $nombreImagen = md5(uniqid(rand(),true)) . ".jpg";

            // //Subir la imagen 
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
        } else{
            $nombreImagen = $propiedad['imagen'];
        }

        
        

        

        
        //Insertar en la base de datos
    $query = " UPDATE propiedades SET titulo = '${titulo}', precio = ${precio}, imagen = '${nombreImagen}', descripcion = '${descripcion}',
    habitaciones = ${habitaciones}, wc = ${wc}, estacionamiento = ${estacionamiento}, vendedores_id = ${vendedores_id} WHERE id = ${id}";

    // echo $query;
       
    $resultado = mysqli_query($db, $query);

    if ($resultado) {
        //Redireccionar al usuario
            header('Location: /admin?resultado=2');//Solo se puede hacer antes de escribir html....Usar poco
        }
    }
}

incluirTemplate('header');
?>


    <main class="contenedor seccion">
        <h1>Actualizar Propiedad</h1>
        <a href="/admin" class="boton boton-verde">Volver</a>


        <?php foreach($errores as $error): ?>
            <div class="alerta error">

            
        <?php   echo $error; ?> 
            </div>
        <?php endforeach; ?>


        <form class="formulario" method="POST"  enctype="multipart/form-data">
            <fieldset>
                <legend>Informacion General</legend>

                <label for="titulo">Titulo:</label>
                <input type="text" name="titulo" id="titulo" placeholder="Titulo Propiedad" value="<?php echo $titulo; ?>">

                <label for="precio">Precio:</label>
                <input type="number" name="precio" id="precio" placeholder="Precio" value="<?php echo $precio; ?>">

                <label for="imagen">Imagen:</label>
                <input type="file" name="imagen" id="imagen" accept="image/jpeg, image/png">

                <img class="imagen-small" src="/imagenes/<?php echo $imagenPropiedad;?>" alt="">

                <label for="descripcion">Descripción:</label>
                <textarea name="descripcion" id="descripcion"><?php echo $descripcion; ?></textarea>

            </fieldset>

            <fieldset>
                <legend>Información Propiedad</legend>

                <label for="habitaciones">Habitaciones:</label>
                <input type="number" name="habitaciones" id="habitaciones" placeholder="Ej. 3" min="1" max="9" value="<?php echo $habitaciones; ?>">
                
                <label for="baños">Baños:</label>
                <input type="number" name="wc" id="baños" placeholder="Ej. 3" min="1" max="9" value="<?php echo $wc; ?>">
                
                <label for="estacionamiento">Estacionamiento:</label>
                <input type="number" name="estacionamiento" id="estacionamiento" placeholder="Ej. 3" min="1" max="9" value="<?php echo $estacionamiento; ?>">
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>
                <select name="vendedores_id">
                    <option value="" >--Seleccione un vendedor--</option>
                    <?php while($vendedor = mysqli_fetch_assoc($resultado)):?>
                        <option <?php echo $vendedores_id === $vendedor ? 'select' : '';?>        value="<?php echo $vendedor['id'];?>"><?php echo $vendedor['nombre'] . " " . $vendedor['apellido']; ?></option>
                    <?php endwhile;?>
                </select>
            </fieldset>

            <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
        </form>

    </main>

    <?php
    incluirTemplate('footer');
    ?>