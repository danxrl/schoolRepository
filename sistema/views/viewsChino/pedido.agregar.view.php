<main role="main">

	<section class="content-form">

		<h2 class="sub-title">Formulario de pedido</h2>

		<form>
		  
			<div class="form-group width-12">
				 <div class="width-6">
				  <input type="text" placeholder="Nombre *" class="form-control" name="pedname" required /> 
				 </div> 
				 <div class="width-6">
				  <input type="text" placeholder="Apellidos *" class="form-control" name="pedapellidos" required="" /> 
				 </div>  
			</div>

			<div class="form-group">
				 <div class="width-12">
				 	<input type="text" placeholder="Dirección *" class="form-control" name="peddirec" required="" />
				 </div>
			</div>
			  
			 <div class="form-group width-12">
				 <div class="width-6">
				  <input type="text" placeholder="Teléfono *" class="form-control" name="pedtelefono" required="" /> 
				 </div> 
				 <div class="width-6">
				  <input type="text" placeholder="Almacen *" class="form-control"  name="pedalmacen" required="" />
				 </div>  
			 </div>
			<div class="form-group width-12">
			 <div class="width-6">
				  <input type="text" placeholder="ID *" class="form-control" name="pedid" required /> 
				 </div> 
				 <div class="width-6">
				  <input type="number" placeholder="partidas *" class="form-control" name="pedpartidas" required="" /> 
				 </div>  
			</div>
			    
			 <div class="form-group width-12">
				 <h3 class="sub-form">Fecha de solicitud</h3>
				  <input type="date" nombre="fecha" min="2018-06-08" max="2018-12-31" value="2018-06-08" step="1" class="form-control" name="pedsolicitud" /> 
			 </div>
			  
			 <div class="form-group width-12">
				 <h3 class="sub-form">Fecha de envio</h3>
				  <input type="date" nombre="fecha" min="2018-06-08" max="2018-12-31" value="2018-06-08" step="1" class="form-control" name="pedenvio" /> 
			 </div>

			 <div class="form-group width-12">
				  <h3 class="sub-form">Fecha de entrega</h3>
				  <input type="date" nombre="fecha" min="2018-06-08" max="2018-12-31" value="2018-06-08" step="1" class="form-control" name="pedentrega" /> 
			 </div>
			 <div class="form-group width-12">
			      <h3 class="sub-form">Observaciones</h3>
				  <textarea cols="22" rows="10" class="form-control"
				  name="pedobser">
				    
				  </textarea>
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