@extends('layouts.panel')

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="panel">
      <div class="panel-heading">
        <h5 class="panel-title"> <span class="glyphicon glyphicon-home"></span> Nueva plantilla</h5>
      </div>

      <div class="panel-body">
        <div class="pad-btm form-inline">
            <div class="row">
                <div class="col-sm-12 table-toolbar-right">
                  <a href="{{url('/empresas')}}"class="btn btn-primary " >
                    <i class="demo-pli-arrow-left icon-fw"></i>Regresar
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
            <form action="{{url('/plantillas')}}" method="POST">
              @csrf

              <div class="row">       
                <div class="col-lg-6">
                  <div class="input-group">  
                    <fieldset class="form-group">                
                      <label class="form-label" for="nombrecategoria">Nombre</label>                
                      <input type="text" name="nombre" class="form-control" value="{{old('nombre')}}" require/> 
                    </fieldset>         
                  </div><!-- /input-group -->
                </div><!-- /.col-lg-6 -->

                <div class="col-lg-6">                    
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="input-group">  
                        <fieldset class="form-group">                
                          <label class="form-label" for="nombrecategoria">Incluye insumos operativos</label>                
                          <input id="demo-sw-checked" name="insumosoperativos" type="checkbox" checked="">
                        </fieldset>         
                      </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->
                  </div>

                  <div class="row">
                    <div class="col-lg-12">              
                      <div class="input-group"> 
                        <fieldset class="form-group">
                          <label class="form-label" for="name"> Incluye horas extras </label>                  
                          <input id="demo-sw-unchecked" name="horasextras" type="checkbox" checked="">
                        </fieldset>
                      </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->          
                  </div>

                  <div class="row">              
                    <div class="col-lg-12">              
                      <div class="input-group"> 
                        <fieldset class="form-group">
                          <label class="form-label" for="name"> Incluye mano de obra externa </label>                  
                          <input id="demo-sw-clr1" name ="manoobraexterna" type="checkbox" checked="">
                        </fieldset>
                      </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->
                  </div>
                </div> 
              </div>

              <h5 class="m-t-lg with-border">Detalle de las tareas</h5>

              <div class="row">
              
                <div class="col-lg-6">
                  <div class="input-group">  
                    <div class="form-group">                
                      <label class="form-label" for="nombretarea">Tarea</label>                
                      <input type="text" id="tarea" name="tarea" class="form-control" require/> 
                    </div>         
                  </div><!-- /input-group -->
                </div><!-- /.col-lg-6 -->

                <div class="col-lg-6">
                  <div class="input-group">  
                    <fieldset class="form-group">
                      <label for="lblorden"> Orden </label>
                      <input type="number" name="orden" id="orden" class="form-control"  >
                    </fieldset>
                  </div><!-- /input-group -->
                </div><!-- /.col-lg-6 -->

              </div>

              <div class="row">                    
                    <fieldset class="form-group">
                      <label class="form-label" for="lblpreciocontado">Descripcion</label>
                      <textarea rows="5" id="descripcion"  name="descripcion"  class="form-control" ></textarea>
                    </fieldset>
              </div>
          
              <div class="row"> 
                <div class="col text-center">
                  <a onclick="agregar();"  class="btn btn-sm btn-default">
                    <span class="glyphicon glyphicon-plus"></span>
                  </a>
                </div>
                <br>
              </div>

              <div class="table-responsive">
                <table id="table-productos" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Tarea</th>
                        <th>Descripcion</th>   
                        <th>Orden</th>
                        <th>Opciones</th>                  
                    </tr>
                    </thead>
                    
                    <tbody id="tableproductos">

                    </tbody>                  
                </table>      
              </div> 

              <button type="submit" class="btn btn-sm btn-success" > Registrar plantilla</button>
              <br>
              <br>
            </form>
        </div>
      </div>
    </div>
    </div>
  </div>

  @push('scripts')

  <script src="{{ asset('assets/js/demo/form-component.js')}}"></script>
  <script src="{{ asset('assets/js/demo/nifty-demo.min.js')}}"></script>

  <script>

    function agregar() {
      let tarea =$("#tarea").val();
      let descripcion = $("#descripcion").val();
      let orden = $("#orden").val();     
    
      console.log(tarea);
      console.log(descripcion);
      console.log(orden);
      
      if (tarea.length > 0) {
    
          $("#tableproductos").append(`
                  <tr id="tr-${tarea}">
                      <td>
                          <input type="hidden" name="tarea[]" value="${tarea}" />
                          <input type="hidden" name="descripcion[]" value="${descripcion}" />
                          <input type="hidden" name="orden[]" value="${orden}" />
                          ${tarea}    
                      </td>
                      <td>${descripcion}</td>
                      <td>${orden}</td>                     
                      <td>
                          <button type="button" class="btn btn-danger" onclick="eliminar('${tarea}')">X</button>    
                      </td>
                  </tr>
              `);
        
      } else {
          alert("Se debe ingresar una tarea valida");
      }
    }
    
    
    function eliminar(id) {
      $("#tr-" + id).remove();     
    }
    
    
  </script>

  @endpush
      

@endsection



