@extends('layouts.panel')

@section('content')

<div class="row">
       
        <div class="col-xs-12">

            <div class="panel panel-body">

                <div class="panel-heading text-center mar-btm">     

                    <div class="sd-header pad-btm">
                        <h3>Ordenes de trabajo</h3>
                        
                        <span class="label label-default mar-rgt">Pendientes
                            <span class="badge sd-badges-pendents mar-lft">2</span>
                        </span>

                        <span class="label label-default mar-rgt">En progreso
                            <span class="badge sd-badges-process mar-lft">3</span>
                        </span>

                        <span class="label label-default ">Completadas
                            <span class="badge sd-badges-complete mar-lft">4</span>
                        </span>
                      
                    </div>
                    
                </div>

                <div class="panel-body">
                    <div class="pad-btm text-center form-inline">
                        <div class="row">
                            <div class="col-lg-12">
                                <a data-target="#demo-default-modal" data-toggle="modal" id="bootbox-plantilla-h-form" class="btn btn-primary" >
                                    <i class="demo-pli-add icon-fw"></i> Nueva orden 
                                </a>  
                            </div>
                            <div class="col-lg-12">
                                <div class="pad-ver">                 
                                    <div class="select">
                                        <select id="demo-ease">
                                            <option value="date-created" selected="">-Tenico-</option>
                                            <option value="date-modified">Date Modified</option>
                                            <option value="frequency-used">Frequency Used</option>
                                            <option value="alpabetically">Alpabetically</option>
                                            <option value="alpabetically-reversed">Alpabetically Reversed</option>
                                        </select>
                                    </div>
                                    <div class="select">
                                        <select id="demo-ease">
                                            <option value="date-created" selected="">-Priority-</option>
                                            <option value="date-modified">Success</option>
                                            <option value="frequency-used">Info</option>
                                            <option value="alpabetically">Warning</option>
                                            <option value="alpabetically-reversed">Danger</option>
                                        </select>
                                    </div>
                                    <button class="btn btn-default">
                                        Filtrar
                                    </button>
                                </div>
                            </div>
                            
                        </div>
                      </div>
					    <div class="row">
					        <div class="col-sm-4">
					
					
					            <!-- Upcoming Tasklist -->
					            <!---------------------------------->
					            <div>					              
					                <h4 class="title-pendents header-title">Pendiente</h4>					                
					                <hr>
					                <ul id="demo-tasklist-upcoming" class="sortable-list tasklist list-unstyled">
                                        @foreach ($ordenespendientes as $ordenpendiente)
                                        <li id="demo-tasklist-7" class="task-pendents">                                            
					                        <p><span class="text-bold sd-badges sd-badges-pendents">#{{ $ordenpendiente->id }}</span></p>
                                            <p class="text-bold text-main text-sm">Cliente: {{$ordenpendiente->nombrecompleto }}</p>
                                            <p class="text-bold text-main text-sm">Fecha orden: {{ $ordenpendiente->fechaorden }}</p>
					                        <p class="pad-btm bord-btm">{{ $ordenpendiente->comentarios }} </p>
                                            <span class="text-sm"><i class="demo-pli-shopping-bag icon-lg text-main"></i>C${{ number_format($ordenpendiente->grantotalsinadicional,2) }} </span>
					                        <br>
                                            <p class="pad-btm bord-btm">{{ $ordenpendiente->Tecnicos }} </p>
                                           
                                            <a href="#" class="task-footer">	
                                                <a href="{{url('/ordenes/'.$ordenpendiente->id.'/edit')}}"
                                                    class="btn btn-sm btn-success"><i class="icon-lg demo-pli-arrow-right"></i> Iniciar </a>					                       
					                        </a>
					                    </li>
                                        @endforeach  
                                      
					                </ul>
					            </div>					
					
					        </div>
					        <div class="col-sm-4">
					            <div>
					                <h4 class="title-process header-title">En progreso</h4>					               
					                <hr>					
					                <ul id="demo-tasklist-inprogress" class="sortable-list tasklist list-unstyled">
                                        @foreach ($ordenesprogreso as $ordenprogreso)                                        
                                        <li id="demo-tasklist-7" class="task-process">                                            
					                        <p><span class="text-bold sd-badges sd-badges-process">#{{ $ordenprogreso->id }}</span></p>
                                            <p class="text-bold text-main text-sm">Cliente: {{$ordenprogreso->nombrecompleto }}</p>
                                            <p class="text-bold text-main text-sm">Fecha inicio: {{ $ordenprogreso->fechaorden }}</p>
					                        <p class="pad-btm bord-btm"> {{ $ordenprogreso->comentarios }} </p>
                                            <span class="text-sm"><i class="demo-pli-shopping-bag icon-lg text-main"></i>C${{ number_format($ordenprogreso->grantotalsinadicional,2) }} </span>
					                        <span class="box-inline">
                                                <label class="label label-success">En Impresion</label>				                               
                                            </span> 
                                            <p class="pad-btm bord-btm">{{ $ordenprogreso->Tecnicos }} </p>
					                        
                                            <a href="#" class="task-footer">
                                                <a href="{{url('/ordenes/'.$ordenprogreso->id.'/edit')}}"
                                                    class="btn btn-sm btn-primary"><i class="icon-lg demo-pli-arrow-right"></i> Trabajar </a>                                              
                                                                                          
					                        </a>
                                           
					                    </li>
                                        @endforeach 					                 
					                   
					                </ul>
					            </div>					
					        </div>
					        <div class="col-sm-4">
					            <div>
					                <h4 class="title-complete header-title">Completada</h4>					              
					                <hr>					
					                <ul id="demo-tasklist-completed" class="sortable-list tasklist list-unstyled">					                  
					                    <li id="demo-tasklist-7" class="task-complete">                                            
					                        <p><span class="text-bold sd-badges sd-badges-complete">#68464</span></p>
                                            <p class="text-bold text-main text-sm">Cliente: Milagros Ruiz</p>
                                            <p class="text-bold text-main text-sm">Fecha inicio: Milagros Ruiz</p>
					                        <p class="pad-btm bord-btm">To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words. </p>
                                            <p class="pad-btm bord-btm">Francisco Urbina </p>
					                       
                                            <a href="#" class="task-footer">
					                            <span class="box-inline">
					                                <label class="label label-success">En Impresion</label>					                               
					                            </span>
                                                <span class="text-sm"><i class="demo-pli-clock icon-fw text-main"></i>9:25</span>
					                       
					                        </a>
					                    </li>
					                    <li id="demo-tasklist-7" class="task-complete">                                            
					                        <p><span class="text-bold sd-badges sd-badges-complete">#68464</span></p>
                                            <p class="text-bold text-main text-sm">Cliente: Milagros Ruiz</p>
                                            <p class="text-bold text-main text-sm">Fecha inicio: Milagros Ruiz</p>
					                        <p class="pad-btm bord-btm">To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words. </p>
                                            <p class="pad-btm bord-btm">Francisco Urbina </p>
					                       
                                            <a href="#" class="task-footer">
					                            <span class="box-inline">
					                                <label class="label label-success">En Impresion</label>					                               
					                            </span>
                                                <span class="text-sm"><i class="demo-pli-clock icon-fw text-main"></i>9:25</span>
					                       
					                        </a>
					                    </li>
                                        <li id="demo-tasklist-7" class="task-complete">                                            
					                        <p><span class="text-bold sd-badges sd-badges-complete">#68464</span></p>
                                            <p class="text-bold text-main text-sm">Cliente: Milagros Ruiz</p>
                                            <p class="text-bold text-main text-sm">Fecha inicio: Milagros Ruiz</p>
					                        <p class="pad-btm bord-btm">To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words. </p>
                                            <p class="pad-btm bord-btm">Francisco Urbina </p>
					                       
                                            <a href="#" class="task-footer">
					                            <span class="box-inline">
					                                <label class="label label-success">En Impresion</label>					                               
					                            </span>
                                                <span class="text-sm"><i class="demo-pli-clock icon-fw text-main"></i>9:25</span>
					                       
					                        </a>
					                    </li>
					                </ul>
					            </div>
					
					        </div>
					    </div>
                </div>
            </div>   
        </div>
    </div>  

    
<div class="modal fade" id="demo-default-modal" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
  
            <!--Modal header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title">Orden de trabajo</h4>
            </div>
  
            <!--Modal body-->
            <div class="modal-body">
                <form action="{{url('/ordenes/create')}}" method="POST">
                    @csrf
                   
                    <label class="form-label" for="nombreplantilla">Plantilla</label>                
                    <select class="form-control" name="plantilla_id">
                    <option value=""> --Seleccione la plantilla--</option>
                    @foreach ($plantillas as $plantilla)
                    <option value="{{ $plantilla -> id }}"> {{$plantilla -> nombre}} </option>
                    @endforeach  
                    </select>
                    <br>
                    <br>
                    <button type="submit" class="btn btn-sm btn-success" > Aceptar</button>
      
              </form>
            </div>
  
           
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="{{ asset('assets/js/jquery.min.js')}}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('assets/js/nifty.min.js')}}"></script>
<script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

<script src="{{ asset('assets/js/demo/ui-modals.js')}}"></script>
<script src="{{ asset('assets/plugins/bootbox/bootbox.min.js')}}"></script>

<script>
    $(document).on('nifty.ready', function () {
        
        $("#demo-tasklist-upcoming, #demo-tasklist-inprogress, #demo-tasklist-completed").sortable({
            connectWith: ".tasklist",
            placeholder: "task-placeholder",
            forcePlaceholderSize: true,
            update: function (event, ui) {
                var upcoming = $("#demo-tasklist-upcoming").sortable("toArray");
                var inprogress = $("#demo-tasklist-inprogress").sortable("toArray");
                var completed = $("#demo-tasklist-completed").sortable("toArray");
                $("#demo-output").html("Upcoming: " + window.JSON.stringify(upcoming) + "<br/>" + "In Progress: " + window.JSON.stringify(inprogress) + "<br/>" + "Completed: " + window.JSON.stringify(completed));
        
            }
        }).disableSelection();
            
    });
</script>
@endpush