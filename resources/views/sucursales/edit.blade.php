@extends('layouts.panel')

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="panel">

      <div class="panel-heading">
        <h5 class="panel-title"> <span class="glyphicon glyphicon-book"></span> Editar sucursal</h5>
      </div>

     <div class="panel-body">
        <div class="pad-btm form-inline">
            <div class="row">
                <div class="col-sm-12 table-toolbar-right">
                  <a href="{{url('/sucursales')}}"class="btn btn-primary " > 
                    <i class="demo-pli-arrow-left icon-fw"></i>
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
      <form action="{{url('/sucursales/'.$sucursal->id)}}" method="POST"> 
          @csrf
          @method('PUT')

        <fieldset class="form-group">
            <label class="form-label" for="name"> Nombre </label>
            <input type="text" name="nombre" class="form-control"value="{{$sucursal->nombre}}" require> </input>
        </fieldset>       
       
        <fieldset class="form-group">                
          <label class="form-label" for="nombreempresa">Empresa</label>
          <select class="form-control" name="empresa_id">
            <option value=""> --Seleccione la empresa--</option>
            @foreach ($empresas as $empresa)
            <option value="{{ $empresa -> id }}"
              @if ($empresa->id === $sucursal->empresa_id)
                      selected
                @endif
              > {{$empresa -> nombre}} </option>
            @endforeach  
          </select>
        </fieldset>

        <fieldset class="form-group">                
          <label class="form-label" for="nombrepais">Pais</label>
          <select class="form-control" name="pais_id">
            <option value=""> --Seleccione el pais--</option>
            @foreach ($paises as $pais)
            <option value="{{ $pais -> id }}"
              @if ($pais->id === $sucursal->pais_id)
                      selected
                @endif
              > {{$pais -> nombre}} </option>
            @endforeach  
          </select>
        </fieldset>

        <fieldset class="form-group">                
          <label class="form-label" for="nombreciudad">Ciudad</label>
          <select class="form-control" name="ciudad_id">
            <option value=""> --Seleccione la ciudad--</option>
            @foreach ($ciudades as $ciudad)
            <option value="{{ $ciudad -> id }}"
              @if ($ciudad->id === $sucursal->ciudad_id)
                      selected
                @endif
              > {{$ciudad -> nombre}} </option>
            @endforeach  
          </select>
        </fieldset>

        <fieldset class="form-group">                
          <label class="form-label" for="nombrealmacen">Almacen</label>
          <select class="form-control" name="almacen">
            <option value=""> --Seleccione el almacen--</option>
            @foreach ($almacenes as $almacen)
            <option value="{{ $almacen -> id }}"
              @if ($almacen->id === $sucursal->almacen_id)
                      selected
                @endif
              > {{$almacen -> nombre}} </option>
            @endforeach  
          </select>
        </fieldset>

        <fieldset class="form-group">
          <label class="form-label" for="lblruc">Número RUC</label>             
          <input type="text" name="ruc" class="form-control" value="{{$sucursal->ruc}}" require> </input>
        </fieldset>

        <fieldset class="form-group">
          <label class="form-label" for="lblcorreo">Correo electrónico</label>
          <input type="email" class="form-control" name="correo" placeholder="Correo" value="{{$sucursal->correo}}">
        </fieldset>

        <fieldset class="form-group">
          <label for="lbltelefono"> Teléfono </label>
          <input type="text" name="telefono" class="form-control"  value="{{$sucursal->telefono}}"> </input>
        </fieldset>

        <fieldset class="form-group">
          <label for="lbldireccion"> Dirección </label>
          <textarea rows="5"  name="direccion"  class="form-control" >{{$sucursal->direccion}}</textarea>
        
        </fieldset>  

        <button type="submit" class="btn btn-sm btn-success" > Guardar sucursal</button>
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
