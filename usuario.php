<?php 
//Importar la conexion
require 'includes/config/database.php';
$db = conectarDB();

//Crear un email y password
$email = "correo@correo.com";
$password = "123456";

$passwordHash = password_hash($password, PASSWORD_DEFAULT);


//Query para el usuario
$query = " INSERT INTO usuarios (email, password) VALUES ('${email}', '${passwordHash}') ";


//Agregar a la BD
mysqli_query($db, $query);
?>