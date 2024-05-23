<?php 
$servidor = "127.0.0.1";
$usuario = "root";
$clave = "root";
$base = "stackJs";

$conexion = new mysqli($servidor, $usuario, $clave, $base);
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
$data= json_decode(file_get_contents("php://input"));
if ($data){
    $titulo = json_encode($data->titulo);
    $datos = json_encode($data->datos);
    $sql = "INSERT INTO miTabla (title, dates) VALUES ('$titulo', '$datos')";
    $conexion->query($sql);
    echo "ok";

}
$conexion->close();
?>