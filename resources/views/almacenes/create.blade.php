@extends('layouts.panel')

@section('content')

<div class="row">
  <div class="col-xs-12">
      <div class="panel">
          <div class="panel-heading">
            <h5 class="panel-title"> <span class="glyphicon glyphicon-home"></span> Nuevo almacen</h5>
          </div>

          <!--Data Table-->
          <!--===================================================-->
          <div class="panel-body">
              <div class="pad-btm form-inline">
                  <div class="row">
                      <div class="col-sm-12 table-toolbar-right">
                        <a href="{{url('/almacenes')}}"class="btn btn-primary " >
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
        <form action="{{url('/almacenes')}}" method="POST">
          @csrf            

            <div class="form-group">                
              <label class="form-label" for="nombreempresa">Empresa</label>                
              <select class="form-control" name="empresa_id">
                <option value=""> --Seleccione la empresa--</option>
                @foreach ($empresas as $empresa)
                <option value="{{ $empresa -> id }}"> {{$empresa -> nombre}} </option>
                @endforeach  
              </select>
            </div>

            <fieldset class="form-group">
              <label class="form-label" for="name"> Nombre </label>
              <input type="text" name="nombre" class="form-control" value="{{old('nombre')}}" require> 
          </fieldset>  

            <button type="submit" class="btn btn-sm btn-success" > Crear almacen</button>
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
    <script src="{{ asset('js/lib/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('js/lib/tether/tether.min.js')}}"></script>
    <script src="{{ asset('js/lib/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/plugins.js')}}"></script>
    {{-- <script src="{{ asset('js/app.js')}}"></script> --}}

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


