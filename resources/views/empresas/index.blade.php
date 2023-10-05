@extends('layouts.panel')

@section('content')

<div class="row">
    <div class="col-xs-12">
        <div class="panel">
            <div class="panel-heading">
              <h5 class="panel-title"> <span class="glyphicon glyphicon-home"></span> Empresas</h5>
            </div>

            <!--Data Table-->
            <!--===================================================-->
            <div class="panel-body">
                <div class="pad-btm form-inline">
                    <div class="row">
                        <div class="col-sm-6 table-toolbar-left">
                          <a href="{{url('/empresas/create')}}"class="btn btn-primary " >
                            <i class="demo-pli-add icon-fw"></i>Nueva empresa
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
                    <table class="table table-striped">
                        <thead>
                            <tr>
                              <th width="1">
                                #
                            </th>
                            <th>Nombre</th>
                            <th>Pais</th>  
                            <th>Número RUC</th>    
                            <th>Teléfono</th>  
                            <th>Dirección</th>    
                            <th></th>                               
                            </tr>
                        </thead>
                        
                        <tbody>
                          @foreach($empresas as $empresa)
    
                          <tr>
                              <td> {{$empresa-> id}} </td>
                              <td> {{$empresa-> pais -> nombre}} </td>
                              <td> {{$empresa-> nombre}} </td>
                              <td> {{$empresa-> ruc}} </td>   
                              <td> {{$empresa-> telefono}} </td>
                              <td> {{$empresa-> direccion}} </td>
                              <td>
                                  <form action="{{url('/empresas/'.$empresa->id.'/inactivar')}}" method="POST">
                                    @csrf    
                                    <a href="{{url('/empresas/'.$empresa->id.'/edit')}}" class="tabledit-edit-button btn btn-sm btn-default">
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
                <hr class="new-section-xs">
                
            </div>
          

        </div>
    </div>
</div>






@endsection


