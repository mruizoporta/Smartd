@extends('layouts.panel')

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="panel">
      <div class="panel-heading">
        <h5 class="panel-title"> <span class="glyphicon glyphicon-home"></span> Editar plantilla</h5>
      </div>

      <div class="panel-body">
        <div class="pad-btm form-inline">
            <div class="row">
                <div class="col-sm-12 table-toolbar-right">
                  <a href="{{url('/plantillas')}}"class="btn btn-primary " >
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
           
            <form action="{{url('/plantillas/'.$plantilla->id)}}" method="POST">
              @csrf
              @method('PUT')
              <div class="row">       
                <div class="col-lg-6">
                  <div class="input-group">  
                    <fieldset class="form-group">                
                      <label class="form-label" for="nombrecategoria">Nombre</label>                
                      <input type="text" name="nombre" class="form-control" value="{{$plantilla->nombre}}" require/> 
                    </fieldset>         
                  </div><!-- /input-group -->
                </div><!-- /.col-lg-6 -->

                <div class="col-lg-6">                    
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="input-group">  
                        <fieldset class="form-group">                
                          <label class="form-label" for="nombrecategoria">Incluye insumos operativos</label>  
                          <input type="checkbox" id="demo-sw-checked" name="insumosoperativos" @if($plantilla->insumosoperativos) checked @endif>                              
                        </fieldset>         
                      </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->
                  </div>

                  <div class="row">
                    <div class="col-lg-12">              
                      <div class="input-group"> 
                        <fieldset class="form-group">
                          <label class="form-label" for="name"> Incluye horas extras </label>
                          <input type="checkbox" id="demo-sw-unchecked" name="horasextras" @if($plantilla->horasextras) checked @endif>                   
                  
                        </fieldset>
                      </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->          
                  </div>

                  <div class="row">              
                    <div class="col-lg-12">              
                      <div class="input-group"> 
                        <fieldset class="form-group">
                          <label class="form-label" for="name"> Incluye mano de obra externa </label>  
                          <input type="checkbox" id="demo-sw-clr1" name="manoobraexterna" @if($plantilla->manoobraexterna) checked @endif>                 
                         
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
                        @foreach($detalles as $detalle)
                        <tr id="tr-{{strtr($detalle->tarea,' ','-')}}">                               
                            <td>
                              <input  type="hidden" name="detalle_id[]" value="{{$detalle->id}}" />  
                              {{$detalle-> tarea}} </td>
                              <td>
                                {{$detalle-> descripcion}} </td>
                                <td>
                                    {{$detalle-> orden}} </td>
                                <td>
                                <button type="button" onclick="eliminar('{{strtr($detalle->tarea,' ','-')}}')" class="tabledit-edit-button btn btn-sm btn-default" >
                                                <span class="glyphicon glyphicon-trash"></span>
                                              </button>                         
                              </td>
                        </tr>
                        @endforeach
                    </tbody>                  
                </table>      
              </div> 

              <button type="submit" class="btn btn-sm btn-success" > Guardar plantilla</button>
              <br>
              <br>
            </form>
        </div>
      </div>
    </div>
    </div>
  </div>

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
  <script src="{{ asset('assets/js/demo/form-component.js')}}"></script>

  <script>

    function agregar() {
      let tarea =$("#tarea").val().replace(' ','-');
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
        
        let nombreliminar = "#tr-" + id;        
      $(nombreliminar).remove();     
    }
    
    
  </script>

  @endpush
      

@endsection



