@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header ">
      <div class="row align-items-center">
        <div class="col">
          <h5 class="mb-0">
            <span class="glyphicon glyphicon-book"></span> Editar proveedor</h5>          
        </div>
        <div class="col text-right">
          <a href="{{url('/proveedores')}}" class="btn btn-sm btn-default">Regresar
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
      <form action="{{url('/proveedores/'.$proveedor->id)}}" method="POST"> 
        @csrf
        @method('PUT')
            <fieldset class="form-group">
                <label class="form-label" for="lblrazonsocial"> Razon Social </label>
                <input type="text" name="razonsocial" class="form-control" value="{{$proveedor->persona->razonsocial}}" require> 
            </fieldset>

            <fieldset class="form-group">
							<label class="form-label" for="lblidentificacion">Número RUC</label>             
              <input type="text" name="identificacion" class="form-control" value="{{$proveedor->persona->identificacion}}" require> 
            </fieldset>  

            <fieldset class="form-group">
							<label class="form-label" for="lblcorreo">Correo electrónico</label>
							<input type="correo" class="form-control" name="correo" placeholder="correo electrónico" value="{{$proveedor->persona->correo}}">
						</fieldset>

            <fieldset class="form-group">
              <label for="lbltelefono"> Telefono / Movil </label>
              <input type="text" name="telefono" class="form-control"  value="{{$proveedor->persona->telefono}}"> 
            </fieldset>

           

          <fieldset class="form-group">
            <label for="lblintereses">Direccion </label>
            <textarea rows="5"  name="direccion"  class="form-control" >{{$proveedor->persona->direccion}}</textarea>
          
          </fieldset>      
         
            <button type="submit" class="btn btn-sm btn-success" > Actualizar proveedor</button>
            <br>
            <br>
        </form>
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

