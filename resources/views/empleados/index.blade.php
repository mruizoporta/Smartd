@extends('layouts.panel')

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="panel"> 
        <div class="panel-heading">
            <h5 class="panel-title"> <span class="glyphicon glyphicon-lock"></span> Empleados</h5>
        </div>
        <div class="panel-body">
                    <div class="pad-btm form-inline">
                      <div class="row">
                          <div class="col-sm-6 table-toolbar-left">
                            <a href="{{url('/empleados/create')}}"class="btn btn-primary " >
                              <i class="demo-pli-add icon-fw"></i>Nuevo empleado
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
                      <div class="bootstrap-table">                        
                        <table id="table-empleados" class="table table-bordered table-hover" >
                            <thead>
                              <tr>
                                  <th width="1">
                                      #
                                  </th>                                               
                                  <th>Identificacion</th>  
                                  <th>Nombre completo</th>    
                                  <th>Correo electrónico</th>                            
                                  <th>Telefono</th>  
                                  <th>Cargo</th>                      
                                  <th></th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($empleados as $empleado)

                                <tr>
                                    <td> {{$empleado-> id}} </td>                  
                                    <td> {{$empleado-> Persona->identificacion}} </td>              
                                    <td> {{$empleado-> Persona->nombres}} + ' ' + {{$empleado-> Persona->apellidos}} </td>                                   
                                    <td> {{$empleado-> Persona->correo}} </td> 
                                    <td> {{$cliente-> Persona->telefono}} </td>  
                                    <td> {{$cliente-> Cargo->descripcion}} </td>                           
                                    <td>
                                        <form action="{{url('/empleados/'.$empleado->id.'/inactivar')}}" method="POST">
                                          @csrf    
                                          <a href="{{url('/empleados/'.$empleado->id.'/edit')}}" class="tabledit-edit-button btn btn-sm btn-default">
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
</div>  
@endsection


