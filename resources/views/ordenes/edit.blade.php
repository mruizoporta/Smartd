@extends('layouts.panel')
@section('content')

<div class="row">
    <div class="col-xs-12">
        <div class="panel">
				<div class="panel-heading">
					<h4 class="h4 panel-title">Nueva orden de trabajo </h4>
				</div>
                <div id="page-content">
					<div class="pad-btm form-inline">
						<div class="row">
							<div class="col-sm-12 table-toolbar-right">
							  <a href="{{url('/ordenes')}}"class="btn btn-primary " >
								<i class="demo-pli-arrow-left icon-fw"></i>Regresar
							  </a>
							</div>                
						</div>
					</div>

					<form action="{{url('/ordenes')}}" method="POST">
						@csrf
						<div class="row">
							<div class="col-md-6 col-lg-6">
								<h4 class="text-main pad-btm bord-btm">Especificaciones</h4>
								<div class="panel">	
									<p class="text-main text-bold">Cliente</p>
									<select class="selectpicker" data-live-search="true" data-width="100%">
										<option value=""> --Cliente genérico--</option>
										@foreach ($clientes as $cliente)
										<option value="{{ $cliente -> id }}"> {{$cliente -> nombrecompleto}} </option>
										@endforeach 
									</select>
								</div>
								<div class="panel">	
									<p class="text-main text-bold">Fecha</p>
									<div id="demo-dp-component">
										<div class="input-group date">
											<input type="text" class="form-control">
											<span class="input-group-addon"><i class="demo-pli-calendar-4"></i></span>
										</div>								
									</div>
								</div>
								<div class="panel">		
									<p class="text-main text-bold">Técnicos</p>	
									<select id="demo-cs-multiselect" data-placeholder="Seleccione el técnico..." multiple="" tabindex="4">
										@foreach ($tecnicos as $tecnico)
										<option value="{{ $tecnico -> id }}"> {{$tecnico -> nombrecompleto}} </option>
										@endforeach  							
									</select>						              
								</div>
								<div class="panel">		
									<p class="text-main text-bold">Descripción</p>				
									<textarea rows="5" id="comentarios"  name="comentarios"  class="form-control" ></textarea>					              
								</div>
						
							</div>
							<div class="col-md-6 col-lg-6">
								<h4 class="text-main pad-btm bord-btm">Archivos</h4>
								<div class="panel">		
										<span class="btn btn-success fileinput-button dz-clickable">
											<i class="fa fa-plus"></i>
											<span>Agregar...</span>
										</span>
							
										<div class="btn-group pull-right">
											
											<button id="dz-remove-btn" class="btn btn-danger cancel" type="reset" disabled="">
												<i class="demo-psi-trash"></i>
											</button>
										</div>					
								
										<div id="dz-previews">
											<div id="dz-template" class="pad-top bord-top">
												<div class="media">
													<div class="media-body">
														<!--This is used as the file preview template-->
														<div class="media-block">
															<div class="media-left">
																<img class="dz-img" data-dz-thumbnail="">
															</div>
															<div class="media-body">
																<p class="text-main text-bold mar-no text-overflow" data-dz-name="">
																<span class="dz-error text-danger text-sm" data-dz-errormessage=""></span>
																<p class="text-sm" data-dz-size="">
																<div id="dz-total-progress" style="opacity:0">
																	<div class="progress progress-xs active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
																		<div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress=""></div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="media-right">
														<button data-dz-remove="" class="btn btn-xs btn-danger dz-cancel"><i class="demo-psi-trash"></i></button>
													</div>
												</div>
											</div>
										</div>
								</div>
								<h4 class="text-main pad-btm bord-btm">Produccion</h4>
								<!--Bordered Accordion-->
								<!--===================================================-->
								<div class="panel-group accordion" id="demo-acc-info-outline">								
									@foreach($tareas as $tarea)
										<div class="panel panel-bordered panel-info">					
											<!--Accordion title-->
											<div class="panel-heading">
												<h4 class="panel-title">
													<a data-parent="#demo-acc-info-outline" data-toggle="collapse" href="#demo-acd-info-outline-{{ $tarea->id }}"  >
													{{ $tarea->tarea }}
													<label class="label label-success">Pendiente</label>	
													</a>											
												</h4>
											</div>
							
											<!--Accordion content-->
											<div class="panel-collapse collapse off" id="demo-acd-info-outline-{{ $tarea->id }}">
												<div class="panel-body">
													<p class="text-main text-bold">{{ $tarea->descripcion }}</p>
													<div class="row">
														<div class="col-md-12 col-lg-12">
															<div class="form-group">
																<label for="lblintereses">Comentarios </label>
																<textarea rows="5"  name="direccion"  class="form-control" ></textarea>          
															</div>  
															<div class="form-group">
																<label for="lblintereses">Inicio </label>
																<div class="input-group date">																		
																	<input id="demo-tp-com" type="text" class="form-control">
																	<span class="input-group-addon"><i class="demo-pli-clock"></i></span>
																</div>
															</div>
															<br>
														</div>	
														<a class="btn btn-sm btn-primary"><i class="icon-lg demo-pli-like"></i> Completar </a>
													</div>	
												</div>
											</div>
										</div>
									@endforeach
								
								</div>
								<!--===================================================-->
								<!--End Bordered Accordion-->
						
							</div>
						
						</div>
						
						<div class="row">
						</div>	

						<h4 class="text-main pad-btm bord-btm">Detalle de los materiales</h4>

						<div class="row">       
							<div class="col-lg-12">						    
								<div class="form-group">                
									<p class="text-main text-bold">Material</p>
									<select class="selectpicker" data-live-search="true" data-width="100%" id="producto_id" name="producto_id"  >
										<option value=""> --Selecciones un material--</option>
										@foreach ($productos as $producto)
										<option value="{{ $producto -> id }}"> {{$producto -> nombre}} </option>
										@endforeach 
									</select>							       
							</div><!-- /input-group -->
							</div><!-- /.col-lg-6 -->
						</div>
					
					
						<div class="row">         
							<div class="col-lg-6">
								<p class="text-main text-bold">Unidad de medida</p>
								<select class="selectpicker" data-live-search="true" data-width="100%">
									<option value=""> --Selecciones la unidad de medida--</option>
									@foreach ($medidas as $medida)
									<option value="{{ $medida -> id }}"> {{$medida -> descripcion}} </option>
									@endforeach 
								</select>	
							</div>
					
							<div class="col-lg-6">
								<div class="input-group">  
								<fieldset class="form-group">
									<p class="text-main text-bold">Cantidad</p>
									<input type="text" name="costo" id="cantidad" class="form-control"  >
								</fieldset>
								</div><!-- /input-group -->
							</div><!-- /.col-lg-6 -->
						</div>
					
						<div class="row">  
							<div class="col text-center">
							<a onclick="agregar();"  class="btn btn-sm btn-default">
								<span class="glyphicon glyphicon-plus"></span>
							</a>
							</div><!-- /.col-lg-6 -->
						</div>
						<br>
					
						<div class="table-responsive">
							<table id="table-productos" class="table table-bordered table-hover">
								<thead>
								<tr>
									<th>Nombre</th>
									<th>Und de medida</th>   
									<th>Precio</th>
									<th>Cantidad</th>
									<th>Sub Total</th>
									<th>Opciones</th>                  
								</tr>
								</thead>
								<tfoot>
								<th>Total</th>
								<th></th>
								<th></th>
								<th></th>
								<th><h4 id ="total">$ 0.00</h4></th>
								</tfoot>
								<tbody id="tableproductos">
					
								</tbody>
							
							</table>      
						</div>
						
						<button type="submit" class="btn btn-sm btn-success" > Registrar orden</button>
					</form>
                </div>
        </div>
    </div>        
</div>
 
@push('scripts')

<script>

  function agregar() {
	let producto_id = $("#producto_id option:selected").val();
	let producto_text = $("#producto_id option:selected").text();
	let unidad_text = $("#unidad_id option:selected").text();	

	let cantidad = $("#cantidad").val();
	
	if (cantidad > 0 ) {
  
		$("#tableproductos").append(`
				<tr id="tr-${producto_id}">
					<td>
						<input type="hidden" name="producto_id[]" value="${producto_id}" />
						<input type="hidden" name="cantidades[]" value="${cantidad}" />
						${producto_text}    
					</td>
					<td>
						${unidad_text}    
					</td>					
					<td>${cantidad}</td>
					<td>${cantidad}</td>
					<td>${parseInt(cantidad) * 25.00}</td>
					<td>
						<button type="button" class="btn btn-danger" onclick="eliminar(${producto_id}, ${parseInt(cantidad) * parseInt(25.00)})">X</button>    
					</td>
				</tr>
			`);
	  
	} else {
		alert("Se debe ingresar una cantidad o precio valido");
	}
  }
  
  
  function eliminar(id, subtotal) {
	$("#tr-" + id).remove();
	let precio_total = $("#precio_total").val() || 0;
	$("#precio_total").val(parseInt(precio_total) - subtotal);
  }
  
  
  </script>

@endpush

@endsection  
   






