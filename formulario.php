<?php include_once "encabezado.php" ?>

<div class="col-xs-12">
	<h1>Nuevo producto</h1>
	<form method="post" action="nuevo.php">
		<label for="codigo">Código de barras:</label>
		<input class="form-control" name="codigo" required type="text" id="codigo" placeholder="Escribe el código">

		<label for="nombreGasolina">Gasolina:</label>
		<input class="form-control" name="nombreGasolina" required type="text" id="nombreGasolina" placeholder="Nombre de la Gasolina">

		<label for="precio">Precio:</label>
		<input class="form-control" name="precio" required type="number" id="precio" placeholder="Precio de Gasolina">

		<label for="octanaje">Octanaje:</label>
		<input class="form-control" name="octanaje" required type="text" id="octanaje" placeholder="Porcentaje de Octanaje">
		
		<label for="nivelEtanol">Nivel de Etanol:</label>
		<input class="form-control" name="nivelEtanol" required type="text" id="nivelEtanol" placeholder="Nivel de Etanol">

		<label for="nivelAzufre">Nivel de Azufre:</label>
		<input class="form-control" name="nivelAzufre" required type="text" id="nivelAzufre" placeholder="Nivel de Azufre">

		<label for="tipoAditivos">Tipo de Aditivos:</label>
		<input class="form-control" name="tipoAditivos" required type="text" id="tipoAditivos" placeholder="Nombre del Aditivo">

		<label for="existencia">Existencia:</label>
		<input class="form-control" name="existencia" required type="number" id="existencia" placeholder="Numero de litros en existencia">
		<br><br><input class="btn btn-info" type="submit" value="Guardar">
	</form>
</div>
<?php include_once "pie.php" ?>