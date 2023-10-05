@extends('layouts.panel')

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="panel">

      <div class="panel-heading">
        <h5 class="panel-title"> <span class="glyphicon glyphicon-home"></span> Sucursales</h5>
      </div>

      <div class="panel-body">
        <div class="pad-btm form-inline">
            <div class="row">
                <div class="col-sm-6 table-toolbar-left">
                  <a href="{{url('/sucursales/create')}}"class="btn btn-primary " >
                    <i class="demo-pli-add icon-fw"></i>Nueva sucursal
                  </a>
                </div>
                
            </div>
        </div>
        <div class="card-body">
          @if(session('notification'))
          <div class="alert alert-success" role="alert">
            {{session('notification')}}
          </div>
          @endif
        </div>  
          
                    <div class="table-responsive">
                    <table id="table-sucursales" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th width="1">
                                #
                            </th>
                            <th>Empresa</th>
                            <th>Nombre</th>
                            <th>Pais</th>  
                            <th>Ciudad</th>  
                            <th>Número RUC</th>    
                            <th>Teléfono</th>  
                            <th>Dirección</th>    
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($sucursales as $sucursal)

                            <tr>
                                <td> {{$sucursal-> id}} </td>
                                <td> {{$sucursal-> empresa -> nombre}} </td>
                                <td> {{$sucursal-> nombre}} </td>
                                <td> {{$sucursal-> pais -> nombre}} </td>
                                <td> {{$sucursal-> ciudad -> nombre}} </td>                              
                                <td> {{$sucursal-> ruc}} </td>   
                                <td> {{$sucursal-> telefono}} </td>
                                <td> {{$sucursal-> direccion}} </td>
                                <td>
                                    <form action="{{url('/sucursales/'.$sucursal->id.'/inactivar')}}" method="POST">
                                      @csrf    
                                      <a href="{{url('/sucursales/'.$sucursal->id.'/edit')}}" class="tabledit-edit-button btn btn-sm btn-default">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                      </a>
                                     
                                      <button type="submit" class="tabledit-edit-button btn btn-sm btn-danger">
                                        <span class="glyphicon glyphicon-trash"></span>
                                      </button>

                                    </form>
                                   
                                  </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>       

                </div>
            </div>
        </div>
    </div>

    
</div>


@endsection


