<main role="main">

	<section class="content-form">

		<h2 class="sub-title">Formulario De inventario</h2>

		<form>
		  
			<div class="form-group width-12">
				 <div class="width-6">
				  <input type="text" placeholder="ID *" class="form-control" name="partid" required /> 
				 </div> 
				 <div class="width-6">
				  <input type="text" placeholder="Numero de piezas *" class="form-control"  name="partpiezas" required="" />
				 </div>
			</div>
			  
			 <div class="form-group width-12">
				 <div class="width-6">
				  <input type="number" placeholder="Volumen *" class="form-control" name="partvol" required="" /> 
				 </div> 
				 <div class="width-6">
				  <input type="text" placeholder="Peso del material *" class="form-control" name="partpeso" required="" /> 
				 </div> 
			</div>
			<div class="form-group width-12">
			<div class="width-6">
				  <input type="text" placeholder="Tipo de material *" class="form-control" name="parttipo" required="" /> 
				 </div>
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