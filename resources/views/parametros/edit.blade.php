@extends('layouts.panel')

@section('content')
<div class="row">
  <div class="col-xs-12">

    <div class="panel">
      <div class="panel-heading">
        <h5 class="panel-title"> <span class="glyphicon glyphicon-home"></span> Editar parametros</h5>
      </div>
   
    
      <div class="panel-body">
        
      @if($errors->any())
      @foreach($errors->all() as $error)
      <div class="alert alert-danger" role="alert">
        <i class="fas fa-exclamation-triangle"></i>
      <strong>Por favor!</strong> {{$error}}
      </div>
      @endforeach
      @endif
      
     <div class="box-typical box-typical-padding">
      <form action="{{url('/parametros/'.$parametro->id)}}" method="POST">    
          @csrf
          @method('PUT')
            <div class="form-group">
                <label for="name"> Porcentaje impuesto </label>
                <input type="number" name="porcentajeimpuesto" class="form-control" value="{{ $parametro->porcentajeimpuesto}}" require> </input>
            </div>     
            <div class="form-group">
              <label for="name"> Porcentaje / utilidad contado </label>
              <input type="number" name="porcentajeutilidadcontado" class="form-control" value="{{ $parametro->porcentajeutilidadcontado}}" require> </input>
          </div>
          <div class="form-group">
            <label for="name"> Porcentaje / utilidad credito </label>
            <input type="number" name="porcentajeutilidadcredito" class="form-control" value="{{ $parametro->porcentajeutilidadcredito}}" require> </input>
        </div>      

            <button type="submit" class="btn btn-sm btn-success" > Guardar parametros</button>
        </form>
        </div>
    </div>
  </div>
  </div>
</div>


@endsection