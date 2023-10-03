@extends('layouts.panel')

@section('content')
<div class="row">
  <div class="col-xs-12">

  <div class="panel">
      <div class="panel-heading">
        <h5 class="panel-title"> <span class="glyphicon glyphicon-home"></span> Nuevo rol</h5>
      </div>
      <div class="panel-body">      

        <div class="pad-btm form-inline">
          <div class="row">
            <div class="col-sm-12 table-toolbar-right">
              <a href="{{url('/roles')}}"class="btn btn-primary " > 
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
          <form action="{{url('/roles')}}" method="POST">
            @csrf
            <div class="form-group">
              <label for="name"> Nombre </label>
              <input type="text" name="nombre" class="form-control" value="{{old('nombre')}}" require> </input>
            </div>           

            <h5 class="m-t-lg with-border">Permisos a:</h5>
            <div class="form-group">

              <input id="demo-sw-checked" type="checkbox" checked="">
              
   
            
          </div>
          </form>   
        </div> 



      </div>  
  
 
  </div>

  </div>
</div> 

@push('scripts')
<script src="{{ asset('assets/js/demo/form-component.js')}}"></script>
<script src="{{ asset('assets/js/demo/nifty-demo.min.js')}}"></script>
@endpush

@endsection



