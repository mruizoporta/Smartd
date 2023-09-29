@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header ">
      <div class="row align-items-center">
        <div class="col">
          <h5 class="mb-0">
            <span class="glyphicon glyphicon-lock"></span> Nuevo cargo</h5>
        </div>
        <div class="col text-right">
          <a href="{{url('/cargos')}}" class="btn btn-sm btn-default">Regresar
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
        <form action="{{url('/roles')}}" method="POST">
          @csrf
            <div class="form-group">
                <label for="name"> Nombre </label>
                <input type="text" name="nombre" class="form-control" value="{{old('nombre')}}" require> </input>
            </div>           
            <h5 class="m-t-lg with-border">Permisos a:</h5>

            <div class="form-group">
              <div class="checkbox">
                <input type="checkbox" id="seguridad" name="seguridad">                
                <label for="check-1">Seguridad</label>
              </div>
              <div class="checkbox">
                <input type="checkbox" id="configuracion" name="configuracion"  >
                <label for="check-2">Configuracion</label>
              </div>
              <div class="checkbox">
                <input type="checkbox" id="catalogos" name="catalogos" >
                <label for="check-3">Catalogos</label>
              </div>
              <div class="checkbox">
                <input type="checkbox" id="inventario" name="inventario" >
                <label for="check-4">Inventario</label>
              </div>
              <div class="checkbox">
                <input type="checkbox" id="facturacion" name="facturacion">
                <label for="check-4">Facturacion</label>
              </div>
              <div class="checkbox">
                <input type="checkbox" id="ordentrabajo" name="ordentrabajo"  >
                <label for="check-4">Ordenes de trabajo</label>
              </div>
              <div class="checkbox">
                <input type="checkbox" id="cuentasporcobrar" name="cuentasporcobrar"  >
                <label for="check-4">Cuentas por pagar de trabajo</label>
              </div>
              <div class="checkbox">
                <span>
                  <input type="checkbox" id="cuentasporpagar" name="cuentasporpagar"  >
                  <label for="check-4">Cuentas por cobrar</label>
                </span>
                
              </div>
            
              <div class="checkbox">
                <input type="checkbox" id="contabilidad" name="contabilidad"  >
                <label for="check-5">Contabilidad</label>
              </div>
            </div>
           
            <button type="submit" class="btn btn-sm btn-success" > Crear rol</button>
        </form>
        </div>
    </div>
  </div>
@endsection