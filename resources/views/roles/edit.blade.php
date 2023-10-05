@extends('layouts.panel')

@section('content')
<div class="card shadow">
    <div class="card-header ">
      <div class="row align-items-center">
        <div class="col">
          <h5 class="mb-0">
            <span class="glyphicon glyphicon-lock"></span> Edicar rol</h5>
        </div>
        <div class="col text-right">
          <a href="{{url('/cargos')}}" class="btn btn-sm btn-default">
            <span class="demo-pli-arrow-left icon-fw"></span>
            Regresar
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
        <form action="{{url('/roles/'.$rol->id)}}" method="POST">       
          @csrf
          @method('PUT')
            <div class="form-group">
                <label for="name"> Nombre  </label>
                <input type="text" name="nombre" class="form-control" value="{{ $rol->nombre}}" require> 
            </div>

            <h5 class="m-t-lg with-border">Permisos a:</h5>
          
            <div class="form-group">
              <div class="" >
                <input type="checkbox" value="" id="seguridad" name="seguridad" @if($rol->seguridad) checked @endif />
                <label style="display: inline-block !important; font-size:1rem !important; line-height:18px !important; position: relative !important; " for="check-1">Seguridad</label>
              </div>
              <div class="">
                <input type="checkbox" id="configuracion" name="configuracion"@if($rol->configuracion) checked @endif>
                <label style="display: inline-block !important; font-size:1rem !important; line-height:18px !important; position: relative !important; " for="check-2">Configuracion</label>
              </div>
              <div class="">
                <input type="checkbox" id="catalogos" name="catalogos" @if($rol->catalogos) checked @endif>
                <label style="display: inline-block !important; font-size:1rem !important; line-height:18px !important; position: relative !important; " for="check-3">Catalogos</label>
              </div>
              <div class="">
                <input type="checkbox" id="inventario" name="inventario" @if($rol->inventario) checked @endif>
                <label style="display: inline-block !important; font-size:1rem !important; line-height:18px !important; position: relative !important; " for="check-4">Inventario</label>
              </div>
              <div class="">
                <input type="checkbox" id="facturacion" name="facturacion" @if($rol->facturacion) checked @endif>
                <label style="display: inline-block !important; font-size:1rem !important; line-height:18px !important; position: relative !important; " for="check-4">Facturacion</label>
              </div>
              <div class="">
                <input type="checkbox" id="ordentrabajo" name="ordentrabajo" @if($rol->ordentrabajo) checked @endif>
                <label style="display: inline-block !important; font-size:1rem !important; line-height:18px !important; position: relative !important; " for="check-4">Ordenes de trabajo</label>
              </div>
              <div class="">
                <input type="checkbox" id="cuentasporcobrar" name="cuentasporcobrar" @if($rol->cuentasporcobrar) checked @endif>
                <label style="display: inline-block !important; font-size:1rem !important; line-height:18px !important; position: relative !important; " for="check-4">Cuentas por pagar de trabajo</label>
              </div>
              <div class="">
                <input type="checkbox" id="cuentasporpagar" name="cuentasporpagar" @if($rol->cuentasporpagar) checked @endif>
                <label style="display: inline-block !important; font-size:1rem !important; line-height:18px !important; position: relative !important; " for="check-4">Cuentas por cobrar</label>
              </div>
              <div class="">
                <input type="checkbox" id="contabilidad" name="contabilidad" @if($rol->contabilidad) checked @endif>
                <label style="display: inline-block !important; font-size:1rem !important; line-height:18px !important; position: relative !important; " for="check-4">Contabilidad</label>
              </div>
            </div>
     

            <button type="submit" class="btn btn-sm btn-success" > Guardar rol</button>
        </form>
        </div>
    </div>
  </div>



@endsection