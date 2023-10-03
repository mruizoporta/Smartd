@extends('layouts.panel')

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="panel">
    <div class="panel-heading">
      <h5 class="panel-title"> <span class="glyphicon glyphicon-home"></span> Nuevo usuario</h5>
    </div>

    <div class="panel-body">
      <div class="pad-btm form-inline">
        <div class="row">
            <div class="col-sm-12 table-toolbar-right">
              <a href="{{url('/usuarios')}}"class="btn btn-primary " > 
                <span class="glyphicon glyphicon-chevron-left"></span>
                Regresar
              </a>
            </div>            
        </div>
      </div>
  
      @if($errors->any())
      @foreach($errors->all() as $error)
      <div class="alert alert-danger" role="alert">
        <i class="fas fa-exclamation-triangle"></i>
      <strong>Por favor!</strong> {{$error}}
      </div>
      @endforeach
      @endif
      
      <div class="box-typical box-typical-padding">
        <form action="{{url('/usuarios')}}" method="POST">      
            @csrf

            <fieldset class="form-group">
              <label for="name" class="col-md-4 col-form-label text-md-end">Nombre</label>
              <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>
              @error('nombre')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </fieldset>

            <div class="form-group">                
              <label class="form-label" for="nombrerol">Rol</label>                
              <select class="form-control" name="rol_id">
                <option value=""> --Seleccione el rol--</option>
                @foreach ($roles as $rol)
                <option value="{{ $rol -> id }}"> {{$rol -> nombre}} </option>
                @endforeach  
              </select>
            </div>


              <fieldset class="form-group">
                <label for="email" class="col-md-4 col-form-label text-md-end">Correo electrónico</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </fieldset>

              
              <fieldset class="form-group">
                <label for="password" class="col-md-4 col-form-label text-md-end">Contraseña </label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </fieldset>

              <fieldset class="form-group">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirmar contraseña</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">                         
              </fieldset>            

            <section class="tabs-section">   

              <div class="panel-heading">
                <h5 class="panel-title"> <span class="glyphicon glyphicon-home"></span>  Asignar permiso a sucursal</h5>
              </div>

                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane fade in active" id="tabs-1-tab-1">
                    <div class="row">       
                      <div class="col-lg-6">
                        <div class="input-group">  
                          <div class="form-group">                
                          
                            <div class="row">
                              <div class="col-lg-10">                                      
                                <select class="form-control" name="sucursal_id" id="sucursal_id">
                                  <option value=""> --Seleccione la sucursal--</option>
                                  @foreach ($sucursales as $sucursal)
                                  <option value="{{ $sucursal -> id }}"> {{$sucursal -> nombre}} </option>
                                  @endforeach  
                                </select>
                              </div>
                              <div class="col-lg-2">
                                <a onclick="agregar();" class="btn btn-primary " >
                                  <i class="demo-pli-add icon-fw"></i>
                                </a>                               
                              </div>
                            </div>

                           
                          </div>         
                        </div><!-- /input-group -->
            
                      </div><!-- /.col-lg-6 -->

                      <div class="col-lg-6">
                        <div class="table-responsive">
                          <table id="table-sucursales" class="table table-bordered table-hover">
                              <thead>
                              <tr>
                                  <th>Nombre</th>                                
                                  <th>Opciones</th>                  
                              </tr>
                              </thead>
                             
                              <tbody id="tablesucursales">
                  
                              </tbody>
                            
                          </table>      
                      </div> 

                    </div>
                  
                  </div><!--.tab-pane-->
                
              </section><!--.tabs-section-->   

              <button type="submit" class="btn btn-sm btn-success">
                Crear usuario
            </button>
              <br>
              <br>
        </form>
      </div>

    </div>

    </div>
  </div>
</div>
@endsection

@push('scripts')

<script>

  function agregar() {
    let sucursal_id = $("#sucursal_id option:selected").val();
    let sucursal_text = $("#sucursal_id option:selected").text();    
    if (sucursal_text.length > 0) {
      console.log(sucursal_text);
        $("#tablesucursales").append(`
                <tr id="tr-${sucursal_id}">
                    <td>
                        <input type="hidden" name="sucursal_id[]" value="${sucursal_id}" />                       
                        ${sucursal_text}    
                    </td>                  
                    <td>
                      <button type="button" onclick="eliminar(${sucursal_id})" class="tabledit-edit-button btn btn-sm btn-default" >
                                      <span class="glyphicon glyphicon-trash"></span>
                                    </button>

                     
                    </td>
                </tr>

            `);

            $("#sucursal_id").val("0");
      
    } else {
        alert("Se sebe seleccionar una sucursal");
    }
  }    
  
  function eliminar(id) {
    $("#tr-" + id).remove();
   
  }    
  </script>



@endpush



@section('scripts')
   {{--  <script src="{{ asset('js/lib/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('js/lib/tether/tether.min.js')}}"></script>
    <script src="{{ asset('js/lib/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/plugins.js')}}"></script>
    {{-- <script src="{{ asset('js/app.js')}}"></script> 

    <script src="{{ asset('js/lib/jquery-tag-editor/jquery.caret.min.js')}}"></script>
    <script src="{{ asset('js/lib/jquery-tag-editor/jquery.tag-editor.min.js')}}"></script>
    <script src="{{ asset('js/lib/bootstrap-select/bootstrap-select.min.js')}}"></script>
    <script src="{{ asset('js/lib/select2/select2.full.min.js')}}"></script>
 --}}
    <script>
      $(function() {
        $('#tags-editor-textarea').tagEditor();
      });
    </script>

@endsection



