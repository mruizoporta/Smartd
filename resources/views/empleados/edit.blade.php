@extends('layouts.panel')

@section('content')
<div class="row">
  <div class="col-xs-12">
      <div class="panel">
          <div class="panel-heading">
            <h5 class="panel-title"> <span class="glyphicon glyphicon-home"></span> Editar proveedor</h5>
          </div>

          <!--Data Table-->
          <!--===================================================-->
          <div class="panel-body">
              <div class="pad-btm form-inline">
                  <div class="row">
                      <div class="col-sm-12 table-toolbar-right">
                        <a href="{{url('/proveedores')}}"class="btn btn-primary " >
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
         
          <h5 class="m-t-lg with-border">Informacion del contacto</h5>

          <fieldset class="form-group">
            <label class="form-label" for="lblnombrecontacto"> Nombre </label>
            <input type="text" name="nombrecontacto" class="form-control" value="{{$proveedor->nombrecontacto}}" require> 
          </fieldset>
          <div class="row">
          <div class="col-lg-6">
            <fieldset class="form-group">
              <label class="form-label" for="lblcorreocontacto">Correo electrónico </label>
              <input type="correo" class="form-control" name="correocontacto" placeholder="correo electrónico" value="{{$proveedor->correocontacto}}">
            </fieldset>
          </div> 
          <div class="col-lg-6">
          <fieldset class="form-group">
            <label for="lbltelefonocontacto"> Telefono / Movil </label>
            <input type="text" name="telefonocontacto" class="form-control"  value="{{$proveedor->telefonocontacto}}"> 
          </fieldset>  
        </div>
      </div>
            <button type="submit" class="btn btn-sm btn-success" > Actualizar proveedor</button>
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

