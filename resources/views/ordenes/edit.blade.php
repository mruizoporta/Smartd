@extends('layouts.panel')
@section('content')

<div class="row">
    <div class="col-xs-12">
        <div class="panel">
				<div class="panel-heading">
					<h4 class="h4 panel-title">Editar orden de trabajo </h4>
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
									<div class="row">
										<div class="col-md-10 col-lg-10">												
											<select class="selectpicker" name="cliente_id" data-live-search="true" data-width="100%">
												<option value=""> --Cliente genérico--</option>

												@foreach ($clientes as $cliente)
												<option value="{{ $cliente -> id }}"
												  @if ($cliente->id === $orden->cliente_id)
														  selected
													@endif
												  > {{$cliente -> nombrecompleto}} </option>
												@endforeach

											</select>
										</div>
										<div class="col-md-2 col-lg-2">
											<div class="col text-center">
												<a  data-target="#demo-default-modal" data-toggle="modal" id="modal-plantilla-h-form"  class="btn btn-sm btn-default">
													<span class="glyphicon glyphicon-plus"></span>
												</a>
											</div>
										</div>	
									</div>

								</div>
								<div class="panel">	
									<p class="text-main text-bold">Fecha</p>
									<div id="demo-dp-component">
										<div class="input-group date"  >
											<input name="fecha"  type="text" class="form-control" value="{{ \Carbon\Carbon::parse($orden->fechaorden)->format('m/d/Y') }}">
											<span class="input-group-addon"><i class="demo-pli-calendar-4"></i></span>
										</div>								
									</div>
								</div>
								<div class="panel">		
									<p class="text-main text-bold">Técnicos</p>	
									<select id="demo-cs-multiselect" name="tecnicos[]" data-placeholder="Seleccione el técnico..." multiple="" tabindex="4">
										@foreach ($tecnicos as $tecnico)
										<option value="{{ $tecnico -> id }}"
											@foreach ($ordenestecnicos as $ordentecnico)										
											@if ($tecnico->id === $ordentecnico->tecnico_id)
											selected
											@endif
											@endforeach										
										> {{$tecnico -> nombrecompleto}} </option>
										
										@endforeach 												
									</select>						              
								</div>
								<div class="panel">		
									<p class="text-main text-bold">Descripción de la orden</p>				
									<textarea rows="5" id="comentarios"  name="comentarios"  class="form-control" >{{ $orden->comentarios }}</textarea>					              
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
													@if ($tarea->estado_id ===17)
													<label class="label label-success">Pendiente</label>
													@else <label class="label label-warning">En progreso</label>
													@endif	
													</a>											
												</h4>
											</div>
							
											<!--Accordion content-->
											<div class="panel-collapse collapse off"  id="demo-acd-info-outline-{{ $tarea->id }}">
												<div class="panel-body">
													<input  type="hidden" name="tarea[]" value="{{ $tarea -> id }}" />
													<input  type="hidden" name="orden[]" value="{{ $tarea -> orden }}" />
													<input  type="hidden" name="nombretarea[]" value="{{ $tarea -> tarea }}" />
													<input  type="hidden" name="descripciontarea[]" value="{{ $tarea -> descripcion }}" />

													<p class="text-main text-bold">{{ $tarea->descripcion }}</p>
													<div class="row">
														<div class="col-md-12 col-lg-12">
															@if ($tarea->estado_id ===17)
															<a class="btn btn-sm btn-success"><i class="icon-lg demo-pli-arrow-right"></i> Iniciar </a>
															<br>
															@endif
															<div class="form-group">
																<br>
																<label for="lblintereses">Comentarios </label>
																<textarea rows="5"  name="comentariotarea[]"  class="form-control" ></textarea>          
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
							<div class="col-lg-4">								
								<fieldset class="form-group">                
									<label class="form-label" for="nombrecategoria">Incluye insumos operativos</label>  									
									<input id="demo-sw-insumosoperativos" name="insumosoperativos" type="checkbox"  @if($orden->insumosoperativos==1) checked @endif>  
									<input type="hidden" id="por_insumosoperativos" name="por_insumosoperativos" value="{{ $parametros[0] -> porcentajeinsumos }}" />
									
								</fieldset>   
							</div>	
							
							<div class="col-lg-4">
								<fieldset class="form-group">
									<label class="form-label" for="name"> Incluye horas extras </label>
									<input id="demo-sw-horasextras" name="horasextras" type="checkbox"  @if($orden->horasextras) checked @endif> 
									<input type="hidden" id="por_horasextras" value="{{ $parametros[0] -> porcentajehorasextras }}" />
								</fieldset> 
							</div>	

							<div class="col-lg-4">
								<fieldset class="form-group">
									<label class="form-label" for="name"> Incluye mano de obra externa </label>   
									<input id="demo-sw-manoobraexterna" name="manoobraexterna" type="checkbox"  @if($orden->manoobraexterna) checked @endif> 
									<input  type="hidden" id="por_manoobraexterna" value="{{ $parametros[0] -> porcentajemanoexterna }}" />
								</fieldset> 
							</div>								
						</div>
						<div class="row">       
							<div class="col-lg-12">						    
								<div class="form-group">                
									<p class="text-main text-bold">Material</p>
									<select class="selectpicker" data-live-search="true" data-width="100%" id="producto_id" name="producto_id"  >
										<option value=""> --Selecciones un material--</option>
										@foreach ($productos as $producto)
										<option value="{{ $producto -> id }}"> {{$producto -> nombre}} 										
										</option>
										
										@endforeach 
									</select>
									
									@foreach ($productos as $producto)
										<input type="hidden" id="precio_{{ $producto -> id }}" value="{{ $producto -> preciocontado }}" />
										<input type="hidden" id="unidad_{{ $producto -> id }}" value="{{ $producto -> medida -> nombre}}" />
									@endforeach								
															       
							</div><!-- /input-group -->
							</div><!-- /.col-lg-6 -->
						</div>
					
					
						<div class="row" id="infoproducto" style="display:none">         
							<div class="col-lg-6">
								<div class="row"> 
									<div class="col-lg-4">
										<p class="text-main text-bold">Unidad de medida</p>
									</div>	
									<div class="col-lg-6">
										<p id="lblunidadmedida"></p>
									</div>																		
								</div>

								<div class="row"> 
									<div class="col-lg-4">
										<p class="text-main text-bold">Precio</p>
									</div>	
									<div class="col-lg-6">
										<p id="lblprecio"></p>
									</div>																		
								</div>

							</div>
					
							<div class="col-lg-6">
								<div class="input-group">  
								<fieldset class="form-group">
									<p class="text-main text-bold">Cantidad</p>
									<input type="text" name="cantidad" id="cantidad" class="form-control"  >
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
						
						<fieldset  class="form-group" style="display:none">
							<label class="form-label" for="name"> Persona jurídica </label> 
							<input id="demo-sw-checked" name="notjuririco" type="checkbox" checked="">
						  </fieldset> 

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
								<th><h4 id ="total" >{{  number_format($orden->grantotalsinadicional,2) }}</h4></th>
								<th style="display:none"><h4 id ="totalsinadicionales" name ="grantotalsinadicional">{{ $orden->grantotal }}</h4></th>
								</tfoot>
								<tbody id="tableproductos">
					
									@foreach($ordenesmateriales as $ordenmaterial)
									<tr id="tr-{{$ordenmaterial->material_id}}">                               
										<td>
											<input type="hidden" name="material_id[]" value="${material_id}" />
											<input type="hidden" name="cantidades[]" value="${cantidad}" />
											<input type="hidden" name="precios[]" value="${precio_text}" />
											<input type="hidden" name="totales[]" value="${parseFloat(cantidad) * precio_text}" />
											{{$ordenmaterial-> nombre}}
										  </td>
										  <td>
											{{$ordenmaterial-> unidadmedida}}
										  </td>					
										  <td>{{$ordenmaterial-> precio}}</td>
										  <td>{{$ordenmaterial-> cantidad}}</td>
										  <td>{{$ordenmaterial-> total}}</td>
										  <td>
												<button type="button" class="btn btn-danger" onclick="eliminar(${material_id}, {{$ordenmaterial-> cantidad}} *{{$ordenmaterial-> precio}})">X</button>    
										  </td>
									</tr>

									@endforeach
									
								</tbody>
							
							</table>      
						</div>
						
						<input type="hidden" id="ordengrantotal" name="grantotal" value="" />
						<input type="hidden" id="ordentotalsinadicionales" name="totalsinadicionales" value="" />	

						<button type="submit" class="btn btn-sm btn-success" > Registrar orden</button>
						<br>
						<br>
					</form>
					<br>
                </div>
        </div>
    </div>        
</div>
 
@include('clientes.modal')

@push('scripts')
 
	<script src="{{ asset('assets/js/demo/nifty-demo.min.js')}}"></script>
	<script src="{{ asset('assets/plugins/switchery/switchery.min.js')}}"></script>
	<script src="{{ asset('assets/plugins/bootstrap-select/bootstrap-select.min.js')}}"></script>
	<script src="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js')}}"></script>
	<script src="{{ asset('assets/plugins/chosen/chosen.jquery.min.js')}}"></script>
	<script src="{{ asset('assets/plugins/noUiSlider/nouislider.min.js')}}"></script>
	<script src="{{ asset('assets/plugins/select2/js/select2.min.js')}}"></script>
	<script src="{{ asset('assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.js')}}"></script>
	<script src="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{ asset('assets/js/demo/nifty-demo.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/dropzone/dropzone.min.js')}}"></script>
    <script src="{{ asset('assets/js/demo/form-file-upload.js')}}"></script>
    <script src="{{ asset('assets/js/demo/form-component.js')}}"></script> 

	
<script>

$(document).ready(function(){
	$('#demo-sw-unchecked').change(function(){

		if($(this).is(':checked'))
		{
   			$('#natural').css('display', 'none');
			$('#juridico').css('display', 'block');
  		}else
		{
   			$('#natural').css('display', 'block');
			$('#juridico').css('display', 'none')
  		}  
  });

  $('#demo-sw-insumosoperativos').change(function(){	
		calculartotal();
	});

	$('#demo-sw-horasextras').change(function(){	
		calculartotal();
	});

	$('#demo-sw-manoobraexterna').change(function(){	
		calculartotal();
	});

  	new Switchery(document.getElementById('demo-sw-insumosoperativos'));
    new Switchery(document.getElementById('demo-sw-horasextras'));
    new Switchery(document.getElementById('demo-sw-manoobraexterna'));

});

let select = document.querySelector('#producto_id');
let resultunidad = document.querySelector('#lblunidadmedida');
let resultadoprecio = document.querySelector('#lblprecio');

select.addEventListener('change', function () {

	$('#infoproducto').css('display', 'block');
	let producto_select = "unidad_" + $("#producto_id option:selected").val();
	let precio_select = "precio_" + $("#producto_id option:selected").val();	
	resultunidad.textContent = $("#"+producto_select ).val();
	resultadoprecio.textContent = $("#"+precio_select).val();	
});

function calculartotal()
{
	let resultadototalsinadicional =$("#totalsinadicionales").text();
	console.log(resultadototalsinadicional);
	let resultadototal =document.querySelector('#total');

	let porinsumos = $("#por_insumosoperativos").val();
	let pormanoobra = $("#por_manoobraexterna").val();
	let porhorasextras = $("#por_horasextras").val();

	let totalporcentaje = 0.0;
	let totaladicionales = 0.0;

	if( $('#demo-sw-insumosoperativos').is(':checked') ) 
	{
    	totalporcentaje = parseFloat(totalporcentaje) +  parseFloat(porinsumos);			
	}

	if( $('#demo-sw-manoobraexterna').is(':checked') ) 
	{
    	totalporcentaje = parseFloat(totalporcentaje) +  parseFloat(pormanoobra);				
	}

	if( $('#demo-sw-horasextras').is(':checked') ) 
	{
		totalporcentaje = parseFloat(totalporcentaje) +  parseFloat(porhorasextras); 				   			
	}
	
	totaladicionales = (totalporcentaje * ((resultadototalsinadicional)/100));
	resultadototal.textContent = parseFloat(resultadototalsinadicional) + totaladicionales ;

	$("#ordengrantotal").val(totaladicionales);
	$("#ordentotalsinadicionales").val(resultadototalsinadicional);

}

  function agregar() {
	let producto_id = $("#producto_id option:selected").val();
	let producto_text = $("#producto_id option:selected").text();	
	let unidad_text = $("#lblunidadmedida").text();
	let precio_text = $("#lblprecio").text();
	let cantidad = $("#cantidad").val();
	let total_linea = parseFloat(cantidad) * parseFloat(precio_text);

	let resultadototalsinadicionales =document.querySelector('#totalsinadicionales');
	let resultadototal =document.querySelector('#total');
	
	let totalanterior = parseFloat($('#total').text());	
	let totalanteriorsinadicionales = parseFloat($('#totalsinadicionales').text());
	
	//Obtener porcentajes
	let porinsumos = $("#por_insumosoperativos").val();
	let pormanoobra = $("#por_manoobraexterna").val();
	let porhorasextras = $("#por_horasextras").val();

	let totalporcentaje = 0.0;
	let totaladicionales = 0.0;
	let grantotal = 0.0;
	let grantotalsinadicional = 0.0;

	if (cantidad > 0 ) {
  
		$("#tableproductos").append(`
				<tr id="tr-${producto_id}">
					<td>
						<input type="hidden" name="producto_id[]" value="${producto_id}" />
						<input type="hidden" name="cantidades[]" value="${cantidad}" />
						<input type="hidden" name="precios[]" value="${precio_text}" />
						<input type="hidden" name="totales[]" value="${parseFloat(cantidad) * precio_text}" />
						${producto_text}    
					</td>
					<td>
						${unidad_text}
					</td>					
					<td>${precio_text}</td>
					<td>${cantidad}</td>
					<td>${parseFloat(cantidad) * precio_text}</td>
					<td>
						<button type="button" class="btn btn-danger" onclick="eliminar(${producto_id}, ${parseFloat(cantidad) * parseFloat(precio_text)})">X</button>    
					</td>
				</tr>
			`);

			grantotal = parseFloat(totalanterior) + parseFloat(total_linea);
			grantotalsinadicional = parseFloat(totalanteriorsinadicionales) + parseFloat(total_linea);

			if( $('#demo-sw-insumosoperativos').is(':checked') ) 
			{
    			totalporcentaje = parseFloat(totalporcentaje) +  parseFloat(porinsumos);			
			}

			if( $('#demo-sw-manoobraexterna').is(':checked') ) 
			{
    			totalporcentaje = parseFloat(totalporcentaje) +  parseFloat(pormanoobra);				
			}

			if( $('#demo-sw-horasextras').is(':checked') ) 
			{
				totalporcentaje = parseFloat(totalporcentaje) +  parseFloat(porhorasextras); 				   			
			}
			
			totaladicionales = (totalporcentaje * ((grantotal)/100));

			resultadototal.textContent = (parseFloat(grantotal) + totaladicionales).toFixed(2) ;
			resultadototalsinadicionales.textContent =  parseFloat(grantotalsinadicional) ;

			$("#ordengrantotal").val((parseFloat(grantotal) + totaladicionales).toFixed(2));
			$("#ordentotalsinadicionales").val(parseFloat(grantotalsinadicional));

			$('#infoproducto').css('display', 'none');
			$("#cantidad").val("");
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
   






