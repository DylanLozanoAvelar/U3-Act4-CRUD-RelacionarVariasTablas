<?php
if(!isset($_GET["id"])) exit();
$idGasolina = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM tbl_articulos WHERE idGasolina = ?;");
$sentencia->execute([$idGasolina]);
$producto = $sentencia->fetch(PDO::FETCH_OBJ);
if($producto === FALSE){
	echo "¡No existe algún producto con ese ID!";
	exit();
}

?>
<?php include_once "encabezado.php" ?>
	<div class="col-xs-12">
		<h1>Editar producto con el ID <?php echo $producto->idGasolina; ?></h1>
		<form method="post" action="guardarDatosEditados.php">
			<input type="hidden" name="idGasolina" value="<?php echo $producto->idGasolina; ?>">
	
			<label for="codigo">Código de barras:</label>
			<input value="<?php echo $producto->codigo ?>" class="form-control" name="codigo" required type="text" id="codigo" placeholder="Escribe el código">

			<label for="nombreGasolina">Gasolina:</label>
			<input value="<?php echo $producto->nombreGasolina ?>" class="form-control" name="nombreGasolina" required type="text" id="nombreGasolina" placeholder="Nombre de la Gasolina">

			<label for="precio">Precio:</label>
			<input value="<?php echo $producto->precio ?>" class="form-control" name="precio" required type="number" id="precio" placeholder="Precio de Gasolina">

			<label for="octanaje">Octanaje:</label>
			<input value="<?php echo $producto->octanaje ?>" class="form-control" name="octanaje" required type="text" id="octanaje" placeholder="Porcentaje de Octanaje">
			
			<label for="nivelEtanol">Nivel de Etanol:</label>
			<input value="<?php echo $producto->nivelEtanol ?>" class="form-control" name="nivelEtanol" required type="text" id="nivelEtanol" placeholder="Nivel de Etanol">

			<label for="nivelAzufre">Nivel de Azufre:</label>
			<input value="<?php echo $producto->nivelAzufre ?>" class="form-control" name="nivelAzufre" required type="text" id="nivelAzufre" placeholder="Nivel de Azufre">

			<label for="tipoAditivos">Tipo de Aditivos:</label>
			<input value="<?php echo $producto->tipoAditivos ?>" class="form-control" name="tipoAditivos" required type="text" id="tipoAditivos" placeholder="Nombre del Aditivo">
			
			<label for="existencia">Existencia:</label>
			<input value="<?php echo $producto->existencia ?>" class="form-control" name="existencia" required type="number" id="existencia" placeholder="Numero de litros en existencia">

			<br><br><input class="btn btn-info" type="submit" value="Guardar">
			<a class="btn btn-warning" href="./listar.php">Cancelar</a>
		</form>
	</div>
<?php include_once "pie.php" ?>
