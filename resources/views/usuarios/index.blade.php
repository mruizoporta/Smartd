@extends('layouts.panel')

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="panel"> 
      <div class="panel-heading">
        <h5 class="panel-title"> <span class="glyphicon glyphicon-lock"></span> Usuarios</h5>
      </div>

      <div class="panel-body">
        <div class="pad-btm form-inline">
            <div class="row">
                <div class="col-sm-6 table-toolbar-left">
                  <a href="{{url('/usuarios/create')}}"class="btn btn-primary " >
                    <i class="demo-pli-add icon-fw"></i>Nuevo usuario
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
                    <table id="table-empresas" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th width="1">
                                #
                            </th>
                            <th>Nombre</th>
                            <th>Usuario</th>  
                            <th>Correo</th>    
                            <th>Rol</th>     
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($usuarios as $usuario)

                            <tr>
                                <td> {{$usuario-> id}} </td>
                                <td> {{$usuario-> nombre}} </td>
                                <td> {{$usuario-> username}} </td>
                                <td> {{$usuario-> email}} </td> 
                                <td> {{$usuario-> rol->nombre}} </td>
                                <td>
                                    <form action="{{url('/usuarios/'.$usuario->id.'/inactivar')}}" method="POST">
                                      @csrf    
                                      <a href="{{url('/usuarios/'.$usuario->id.'/edit')}}" class="tabledit-edit-button btn btn-sm btn-default">
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


