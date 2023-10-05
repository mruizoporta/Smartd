@extends('layouts.panel')

@section('content')
<div class="row">
  <div class="col-xs-12">

  <div class="panel">
    <div class="panel-heading">
      <h5 class="panel-title"> <span class="glyphicon glyphicon-home"></span> Editar almacenes</h5>
    </div>
    
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
      <form action="{{url('/almacenes/'.$almacen->id)}}" method="POST"> 
          @csrf
          @method('PUT')

          <fieldset class="form-group">                
            <label class="form-label" for="nombreempresa">Empresa</label>
            <select class="form-control" name="empresa_id">
              <option value=""> --Seleccione la empresa--</option>
              @foreach ($empresas as $empresa)
              <option value="{{ $empresa -> id }}"
                @if ($empresa->id === $almacen->empresa_id)
                        selected
                  @endif
                > {{$empresa -> nombre}} </option>
              @endforeach  
            </select>
        </fieldset>

          <fieldset class="form-group">
            <label class="form-label" for="name"> Nombre </label>
            <input type="text" name="nombre" class="form-control"value="{{$almacen->nombre}}" require> </input>
        </fieldset>      
 
 
            <button type="submit" class="btn btn-sm btn-success" > Guardar almacen</button>
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

    <script src="{{ asset('js/lib/jquery-tag-editor/jquery.caret.min.js')}}"></script>
    <script src="{{ asset('js/lib/jquery-tag-editor/jquery.tag-editor.min.js')}}"></script>
    <script src="{{ asset('js/lib/bootstrap-select/bootstrap-select.min.js')}}"></script>

@endsection
