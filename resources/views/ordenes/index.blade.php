@extends('layouts.panel')

@section('content')

<div class="row">
       
        <div class="col-xs-12">

            <div class="panel"> 
                <div class="panel-heading">     
                    <br>    
                    <div class="text-center pad-btm">
                        <h3>Ordenes de trabajo </h3>
                        <p>Puede cambiar la prioridad de la orden <strong class="text-main">arrastrando y soltando </strong>en el el orden que desee.</p>
                    </div>
                    <div class="text-center pad-ver">                      
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
                        <button class="btn btn-default">Filtrar</button>
                    </div>
                </div>
                 <br>
              

                <div class="panel-body">
                    <div class="pad-btm form-inline">
                        <div class="row">
                            <div class="col-sm-6 table-toolbar-left">
                              <a href="{{url('/ordenes/create')}}"class="btn btn-primary " >
                                <i class="demo-pli-add icon-fw"></i>Nueva orden 
                              </a>
                            </div>                
                        </div>
                      </div>

                        <hr class="new-section-md bord-no">
					    <div class="row">
					        <div class="col-sm-4">
					
					
					            <!-- Upcoming Tasklist -->
					            <!---------------------------------->
					            <div>					              
					                <h4 class="text-main">Pendiente</h4>					                
					                <hr>
					                <ul id="demo-tasklist-upcoming" class="sortable-list tasklist list-unstyled">
					                    
                                        <li id="demo-tasklist-7" class="task-info">                                            
					                        <p class="text-bold text-main text-sm">#68464</p>
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
                                        <li id="demo-tasklist-7" class="task-info">                                            
					                        <p class="text-bold text-main text-sm">#68464</p>
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
					                    <li id="demo-tasklist-7" class="task-info">                                            
					                        <p class="text-bold text-main text-sm">#68464</p>
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
					        <div class="col-sm-4">
					            <div>
					                <h4 class="text-main header-title m-t-0">En progreso</h4>					               
					                <hr>					
					                <ul id="demo-tasklist-inprogress" class="sortable-list tasklist list-unstyled">
                                        <li id="demo-tasklist-7" class="task-info">                                            
					                        <p class="text-bold text-main text-sm">#68464</p>
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
					                    <li id="demo-tasklist-7" class="task-info">                                            
					                        <p class="text-bold text-main text-sm">#68464</p>
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
					                    <li id="demo-tasklist-7" class="task-info">                                            
					                        <p class="text-bold text-main text-sm">#68464</p>
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
					        <div class="col-sm-4">
					            <div>
					                <h4 class="text-main header-title m-t-0">Completada</h4>					              
					                <hr>					
					                <ul id="demo-tasklist-completed" class="sortable-list tasklist list-unstyled">					                  
					                    <li id="demo-tasklist-7" class="task-info">                                            
					                        <p class="text-bold text-main text-sm">#68464</p>
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
					                    <li id="demo-tasklist-7" class="task-info">                                            
					                        <p class="text-bold text-main text-sm">#68464</p>
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
                                        <li id="demo-tasklist-7" class="task-info">                                            
					                        <p class="text-bold text-main text-sm">#68464</p>
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

@endsection

@push('scripts')
<script src="{{ asset('assets/js/jquery.min.js')}}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('assets/js/nifty.min.js')}}"></script>
<script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

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