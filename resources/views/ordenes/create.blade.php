@extends('layouts.panel')

@section('content')

<div class="row">
       
        <div class="col-xs-12">

            <div class="panel"> 
                <div class="panel-heading">     
                    <br>    
                    <div class="text-center pad-btm">
                        <h3>Nueva orden de trabajo </h3>
                    </div>                   
                </div>
                 <br>
              

                <div class="panel-body">
                    <div class="pad-btm form-inline">
                        <div class="row">
                            <div class="col-sm-12 table-toolbar-right">
                              <a href="{{url('/ordenes')}}"class="btn btn-primary " >
                                <i class="demo-pli-arrow-left icon-fw"></i>Regresar
                              </a>
                            </div>                            
                        </div>
                    </div>

                     
					    <div class="row">
					        <div class="col-sm-6">		
					            <div>
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
					        <div class="col-sm-6">
					            <div class="panel panel-bordered panel-info">
					
					                <!--Accordion title-->
					                <div class="panel-heading">
					                    <h4 class="panel-title">
					                        <a data-parent="#demo-acc-info-outline" data-toggle="collapse" href="#demo-acd-info-outline-1">Collapsible Group Item #1</a>
					                    </h4>
					                </div>
					
					                <!--Accordion content-->
					                <div class="panel-collapse collapse in" id="demo-acd-info-outline-1">
					                    <div class="panel-body">
					                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.
					                    </div>
					                </div>
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
<script src="{{ asset('assets/js/demo/nifty-demo.min.js')}}"></script>
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