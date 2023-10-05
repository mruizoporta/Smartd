@extends('layouts.panel')

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="panel">      
      <div class="panel-heading">
        <h5 class="panel-title"> <span class="glyphicon glyphicon-lock"></span> Roles</h5>
      </div>

      <div class="panel-body">
        <div class="pad-btm form-inline">
            <div class="row">
                <div class="col-sm-6 table-toolbar-left">
                  <a href="{{url('/roles/create')}}"class="btn btn-primary " >
                    <i class="demo-pli-add icon-fw"></i>Nuevo rol
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
                    <table id="table-roles" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th width="1">
                                #
                            </th>
                            <th>Nombre </th>  
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $rol)

                            <tr>
                                <td> {{$rol-> id}} </td>
                                <td> {{$rol-> nombre}} </td>
                                <td>
                                  <form action="{{url('/roles/'.$rol->id.'/inactivar')}}" method="POST">
                                      @csrf 
                                      <a href="{{url('/roles/'.$rol->id.'/edit')}}" class="tabledit-edit-button btn btn-sm btn-default">
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

@section('scripts')
<script 
    src="{{ asset('js/per/categorias.js')}}">
</script>
@endsection
