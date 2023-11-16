<?php
	if(!isset($_POST["total"])) exit;

	session_start();

	$total = $_POST["total"];
	include_once "base_de_datos.php";

	$ahora = date("Y-m-d H:i:s");

	$sentencia = $base_de_datos->prepare("INSERT INTO tbl_ventas(fecha, total) VALUES (?, ?);");
	$sentencia->execute([$ahora, $total]);

	$sentencia = $base_de_datos->prepare("SELECT id_venta FROM tbl_ventas ORDER BY id_venta DESC LIMIT 1;");
	$sentencia->execute();
	$resultado = $sentencia->fetch(PDO::FETCH_OBJ);

	$idVenta = $resultado === false ? 1 : $resultado->id_venta;

	$base_de_datos->beginTransaction();
	$sentencia = $base_de_datos->prepare("INSERT INTO tbl_articulos_vendidos(id_articulo, id_venta, litros) VALUES (?, ?, ?);");
	$sentenciaExistencia = $base_de_datos->prepare("UPDATE tbl_articulos SET existencia = existencia - ? WHERE idGasolina = ?;");

	foreach ($_SESSION["carrito"] as $producto) {
		$total += $producto->total;
		$sentencia->execute([$producto->idGasolina, $idVenta, $producto->litros]);
		$sentenciaExistencia->execute([$producto->litros, $producto->id]);
	}

	$base_de_datos->commit();
	unset($_SESSION["carrito"]);
	$_SESSION["carrito"] = [];
	header("Location: ./vender.php?estado=1");
?>