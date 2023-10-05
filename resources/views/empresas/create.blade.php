@extends('layouts.panel')

@section('content')

<div class="row">
  <div class="col-xs-12">
      <div class="panel">
          <div class="panel-heading">
            <h5 class="panel-title"> <span class="glyphicon glyphicon-home"></span> Empresas</h5>
          </div>

          <!--Data Table-->
          <!--===================================================-->
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
             
              @if($errors->any())
              @foreach($errors->all() as $error)
              <div class="alert alert-danger" role="alert">
                <i class="fas fa-exclamation-triangle"></i>
              <strong>Por favor!</strong> {{$error}}
              </div>
              @endforeach
              @endif

              <div class="box-typical box-typical-padding">    
                <form action="{{url('/empresas')}}" method="POST">
                  @csrf
                    <fieldset class="form-group">
                        <label class="form-label" for="name"> Nombre </label>
                        <input type="text" name="nombre" class="form-control" value="{{old('nombre')}}" require> </input>
                    </fieldset>
    
                    <fieldset class="form-group">
                      <label class="form-label" for="lblruc">Número RUC</label>             
                      <input type="text" name="ruc" class="form-control" value="{{old('ruc')}}" require> </input>
                    </fieldset>
    
                    <div class="form-group">                
                        <label class="form-label" for="nombrepais">Pais</label>                
                        <select class="form-control" name="pais_id">
                          <option value=""> --Seleccione el pais--</option>
                          @foreach ($paises as $pais)
                          <option value="{{ $pais -> id }}"> {{$pais -> nombre}} </option>
                          @endforeach  
                        </select>
                      </div>
    
                    <fieldset class="form-group">
                      <label class="form-label" for="lblcorreo">Correo electrónico</label>
                      <input type="email" class="form-control" name="correo" placeholder="Correo" value="{{old('correo')}}">
                    </fieldset>
    
                    <fieldset class="form-group">
                      <label for="lbltelefono"> Teléfono </label>
                      <input type="text" name="telefono" class="form-control"  value="{{old('telefono')}}"> </input>
                    </fieldset>
    
                    <fieldset class="form-group">
                      <label for="lbldireccion"> Dirección </label>
                      <textarea rows="5"  name="direccion"  class="form-control"  value="{{old('direccion')}}" ></textarea>
                    
                    </fieldset>  
    
                    <button type="submit" class="btn btn-sm btn-success" > Guardar empresa</button>
                    <br>
                    <br>
                </form>

              </div>   
          </div>      
      </div>
  </div>
</div>

  @endsection

@section('scripts')
    <script src="{{ asset('assets/js/lib/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/js/lib/tether/tether.min.js')}}"></script>
    <script src="{{ asset('assets/js/lib/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/js/plugins.js')}}"></script>
    {{-- <script src="{{ asset('js/app.js')}}"></script> --}}

    <script src="{{ asset('assets/js/lib/jquery-tag-editor/jquery.caret.min.js')}}"></script>
    <script src="{{ asset('assets/js/lib/jquery-tag-editor/jquery.tag-editor.min.js')}}"></script>
    <script src="{{ asset('assets/js/lib/bootstrap-select/bootstrap-select.min.js')}}"></script>
    <script src="{{ asset('assets/js/lib/select2/select2.full.min.js')}}"></script>

    <script>
      $(function() {
        $('#tags-editor-textarea').tagEditor();
      });
    </script>

@endsection


