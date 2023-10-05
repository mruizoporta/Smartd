@extends('layouts.panel')

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="panel"> 
      <div class="panel-heading">
          <h5 class="panel-title"> <span class="glyphicon glyphicon-lock"></span> Almacenes</h5>
        </div>

        <div class="panel-body">
          <div class="pad-btm form-inline">
            <div class="row">
                <div class="col-sm-6 table-toolbar-left">
                  <a href="{{url('/almacenes/create')}}"class="btn btn-primary " >
                    <i class="demo-pli-add icon-fw"></i>Nuevo almacen
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
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($almacenes as $almacen)

                            <tr>
                                <td> {{$almacen-> id}} </td>
                                <td> {{$almacen-> empresa -> nombre}} </td>
                                <td> {{$almacen-> nombre}} </td>                               
                                <td>
                                    <form action="{{url('/almacenes/'.$almacen->id.'/inactivar')}}" method="POST">
                                      @csrf    
                                      <a href="{{url('/almacenes/'.$almacen->id.'/edit')}}" class="tabledit-edit-button btn btn-sm btn-default">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                      </a>
                                     
                                      <button type="submit" class="tabledit-edit-button btn btn-sm btn-default">
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


