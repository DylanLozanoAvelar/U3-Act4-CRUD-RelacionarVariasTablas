<?php
#Salir si alguno de los datos no está presente
if(!isset($_POST["codigo"]) || !isset($_POST["nombreGasolina"]) || !isset($_POST["precio"]) || !isset($_POST["octanaje"]) || !isset($_POST["nivelEtanol"]) || !isset($_POST["nivelAzufre"]) || !isset($_POST["tipoAditivos"]) || !isset($_POST["existencia"])) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$codigo = $_POST["codigo"];
$nombreGasolina = $_POST["nombreGasolina"];
$precio = $_POST["precio"];
$octanaje = $_POST["octanaje"];
$nivelEtanol = $_POST["nivelEtanol"];
$nivelAzufre = $_POST["nivelAzufre"];
$tipoAditivos = $_POST["tipoAditivos"];
$existencia = $_POST["existencia"];

$sentencia = $base_de_datos->prepare("INSERT INTO tbl_articulos(codigo, nombreGasolina, precio, octanaje, nivelEtanol, nivelAzufre, tipoAditivos, existencia) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
$resultado = $sentencia->execute([$codigo, $nombreGasolina, $precio, $octanaje, $nivelEtanol, $nivelAzufre, $tipoAditivos, $existencia]);

if($resultado === TRUE){
	header("Location: ./listar.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista";


?>
<?php include_once "pie.php" ?>