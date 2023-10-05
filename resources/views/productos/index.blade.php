@extends('layouts.panel')

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="panel"> 
      <div class="panel-heading">
          <h5 class="panel-title"> <span class="glyphicon glyphicon-lock"></span> Materiales</h5>
        </div>

        <div class="panel-body">
          <div class="pad-btm form-inline">
            <div class="row">
                <div class="col-sm-6 table-toolbar-left">
                  <a href="{{url('/productos/create')}}"class="btn btn-primary " >
                    <i class="demo-pli-add icon-fw"></i>Nuevo material
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
                    <table id="table-productos" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th width="1">
                                #
                            </th>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Categoria</th>  
                            <th>Marca</th>  
                            <th>Precio</th>     
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($productos as $producto)

                            <tr>
                                <td> {{$producto-> id}} </td>                              
                                <td> {{$producto-> codigo}} </td>
                                <td> {{$producto-> nombre}} </td>
                                <td> {{$producto-> categoria -> nombre}} </td>
                                <td> {{$producto-> marca -> nombre}} </td>
                                <td> {{$producto-> preciocontado}} </td>  
                                <td>
                                    <form action="{{url('/productos/'.$producto->id.'/inactivar')}}" method="POST">
                                      @csrf    
                                      <a href="{{url('/productos/'.$producto->id.'/edit')}}" class="tabledit-edit-button btn btn-sm btn-default">
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


