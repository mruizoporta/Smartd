@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header ">
      <div class="row align-items-center">
        <div class="col">
          <h5 class="mb-0">
            <span class="glyphicon glyphicon-book"></span> Nueva entrada a inventario</h5>          
        </div>
        <div class="col text-right">
          <a href="{{url('/entradas')}}" class="btn btn-sm btn-default">Regresar
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
       
        </div>
      </div>
    </div>
    
    <div class="card-body">
      @if($errors->any())
      @foreach($errors->all() as $error)
      <div class="alert alert-danger" role="alert">
        <i class="fas fa-exclamation-triangle"></i>
      <strong>Por favor!</strong> {{$error}}
      </div>
      @endforeach
      @endif
      
		<div class="box-typical box-typical-padding">
        <form action="{{url('/entradas')}}" method="POST">
          @csrf

          <div class="row">
       
            <div class="col-lg-6">
              <div class="input-group">  
                <div class="form-group">                
                  <label class="form-label" for="nombrecategoria">Proveedor</label>                
                  <select class="form-control" name="categoria_id">
                    <option value=""> --Seleccione el proveedor--</option>
                    @foreach ($proveedores as $proveedor)
                    <option value="{{ $proveedor -> id }}"> {{$proveedor -> razonsocial}} </option>
                    @endforeach  
                  </select>
                </div>         
              </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
           
            <div class="col-lg-6">
              <div class="input-group">  
                <div class="form-group">                
                  <label class="form-label" for="nombrecategoria">Tipo de entrada</label>                
                  <select class="form-control" name="tipoentrada_id">
                    <option value=""> --Seleccione el tipo de entrada--</option>
                    @foreach ($tiposentrada as $tipoentrada)
                    <option value="{{ $tipoentrada -> id }}"> {{$tipoentrada -> nombre}} </option>
                    @endforeach  
                  </select>
                </div>         
              </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
          </div>

          <div class="row">

            <div class="col-lg-6">              
              <div class="input-group"> 
                <fieldset class="form-group">
                  <label class="form-label" for="name"> Número de factura </label>
                  <input type="text" name="numerofactura" class="form-control" value="{{old('numerofactura')}}" require> 
                </fieldset>
              </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
       
            <div class="col-lg-6">
              <fieldset class="form-group">
								<label class="form-label" for="date-mask-input">Fecha de la entrada</label>
								<input type="text" class="form-control" id="date-mask-input">							
							</fieldset>  

            </div><!-- /.col-lg-6 -->

          </div>

          <div class="row">       
           

            <div class="col-lg-6">
              <div class="input-group"> 
                <fieldset class="form-group">
                  <label class="form-label" for="name"> Total compra </label>
                  <input readonly type="text" name="total" class="form-control" value="{{old('total')}}" require> 
                </fieldset>              
            </div><!-- /.col-lg-6 -->
          </div><!-- /.col-lg-6 -->

          </div><!-- /.col-lg-6 -->

      
      <h5 class="m-t-lg with-border">Detalle de los Productos</h5>

      <div class="row">
       
        <div class="col-lg-12">
          <div class="input-group">  
            <div class="form-group">                
              <label class="form-label" for="nombreproducto">Producto</label>                
              <select class="form-control" id ="producto_id" name="producto_id">
                <option value=""> --Seleccione el producto--</option>
                @foreach ($productos as $producto)
                <option value="{{ $producto -> id }}"> {{$producto -> nombre}} </option>
                @endforeach  
              </select>
            </div>         
          </div><!-- /input-group -->
        </div><!-- /.col-lg-6 -->
      </div>


      <div class="row">
         
        <div class="col-lg-6">
          <div class="input-group">  
            <fieldset class="form-group">
              <label class="form-label" for="lblpreciocontado">Cantidad</label>
              <input type="number" class="form-control" name="cantidad" id="cantidad"  >
            </fieldset>
          </div><!-- /input-group -->
        </div><!-- /.col-lg-6 -->

        <div class="col-lg-6">
          <div class="input-group">  
            <fieldset class="form-group">
              <label for="lblmargenutilidadcredito"> Costo </label>
              <input type="text" name="costo" id="costo" class="form-control"  >
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


      <div class="table-responsive">
        <table id="table-productos" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Cantidad</th>   
                <th>Precio</th>
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

            <button type="submit" class="btn btn-sm btn-success" > Registrar entrada</button>
            <br>
            <br>
        </form>
        </div>
    </div>
  </div>

  @push('scrips')

  <script>

    function agregar() {
      let producto_id = $("#producto_id option:selected").val();
      let producto_text = $("#producto_id option:selected").text();
      let cantidad = $("#cantidad").val();
      let costo = $("#costo").val();
    
      console.log(producto_id);
      console.log(producto_text);
      console.log(cantidad);
      console.log(costo);
      
      if (cantidad > 0 && costo > 0) {
    
          $("#tableproductos").append(`
                  <tr id="tr-${producto_id}">
                      <td>
                          <input type="hidden" name="producto_id[]" value="${producto_id}" />
                          <input type="hidden" name="cantidades[]" value="${cantidad}" />
                          ${producto_text}    
                      </td>
                      <td>${cantidad}</td>
                      <td>${costo}</td>
                      <td>${parseInt(cantidad) * parseInt(costo)}</td>
                      <td>
                          <button type="button" class="btn btn-danger" onclick="eliminar(${producto_id}, ${parseInt(cantidad) * parseInt(costo)})">X</button>    
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

@section('scripts')
    <script src="{{ asset('js/lib/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('js/lib/tether/tether.min.js')}}"></script>
    <script src="{{ asset('js/lib/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/plugins.js')}}"></script>
     <script src="{{ asset('js/app.js')}}"></script> 

    <script src="{{ asset('js/lib/jquery-tag-editor/jquery.caret.min.js')}}"></script>
    <script src="{{ asset('js/lib/jquery-tag-editor/jquery.tag-editor.min.js')}}"></script>
    <script src="{{ asset('js/lib/bootstrap-select/bootstrap-select.min.js')}}"></script>
    <script src="{{ asset('js/lib/select2/select2.full.min.js')}}"></script>

    <script>
      $(function() {
        $('#tags-editor-textarea').tagEditor();
      });
    </script>


 
@endsection

