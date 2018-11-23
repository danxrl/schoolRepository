<main role="main">

	<section class="content-form">

		<h2 class="sub-title">Formulario De inventario</h2>

		<form>
		  
			<div class="form-group width-12">
				 <div class="width-6">
				  <input type="text" placeholder="ID *" class="form-control" name="invid" required /> 
				 </div> 
				 <div class="width-6">
				  <input type="text" placeholder="Tipo de material *" class="form-control" name="invmaterial" required="" /> 
				 </div>  
			</div>
			  
			 <div class="form-group width-12">
				 <div class="width-6">
				  <input type="number" placeholder="Cantidad *" class="form-control" name="invcantidad" required="" /> 
				 </div> 
				 <div class="width-6">
				  <input type="text" placeholder="Tipo de movimiento " class="form-control"  name="invmovimiento" required="" />
				 </div>  
			 </div>

			<div class="form-group width-12">
				 <h3 class="sub-form">Fecha de moviento</h3>
				  <input type="date" nombre="fecha" min="2018-06-08" max="2018-12-31" value="2018-06-08" step="1" class="form-control" name="invfecha" /> 
			 </div>
			  
			 <div class="form-group width-12">
					<input type="submit" value="Agregar" class="form-control btn btn-principal" id="btn-agregar"/>
					<input type="submit" value="Buscar" class="form-control btn btn-principal" id="btn-buscar"/>
					<div class="form-group width-12">
					<input type="submit" value="Actualizar" class="form-control btn btn-principal" id="btn-actualizar"/>
					<input type="submit" value="Eliminar" class="form-control btn btn-principal" id="btn-eliminar"/>
					<input type="submit" value="Aceptar" class="form-control btn btn-principal" id="btn-aceptar"/>
					<input type="submit" value="Cancelar" class="form-control btn btn-principal" id="btn-cancelar"/>
			</div>
	  
		</form>

	</section>
</main>
<footer>
</footer>
	
</body>
</html>