@extends('layouts.panel')

@section('content')

 
<div class="panel">
					
    <!--Chart information-->
    <div class="panel-body">
        <div class="row mar-top">
            <div class="col-md-5">
                <h3 class="text-main text-normal text-2x mar-no">Clientes</h3>              
                <hr class="new-section-xs">
                <div class="row mar-top">
                    <div class="col-sm-5">
                        <div class="text-lg"><p class="text-5x text-thin text-main mar-no">520</p></div>
                        <p class="text-sm">Desde 2023, clientes registrados</p>
                    </div>
                   
                </div>
                <button class="btn btn-pink mar-ver">Ir a clientes</button>             
            </div>
            <div class="col-md-7">
                <div id="demo-bar-chart" style="height:250px"></div>
                <hr class="new-section-xs bord-no">
                <ul class="list-inline text-center">
                    <li><span class="label label-info">354</span> 2021</li>
                    <li><span class="label label-warning">74</span> 2022</li>
                    <li><span class="label label-default">25</span> 2023</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-sm-3 col-lg-6">

                <!--Tile-->
                <!--===================================================-->
                <div class="panel panel-primary panel-colorful">
                    <div class="pad-all text-center">
                        <span class="text-3x text-thin">C$52,000</span>
                        <p>Facturado</p>
                        <i class="demo-pli-shopping-bag icon-lg"></i>
                    </div>
                </div>
                <!--===================================================-->


                <!--Tile-->
                <!--===================================================-->
                <div class="panel panel-warning panel-colorful">
                    <div class="pad-all text-center">
                        <span class="text-3x text-thin">C$ 68,000</span>
                        <p>Cuentas por Cobrar</p>
                        <i class="demo-psi-mail icon-lg"></i>
                    </div>
                </div>
                <!--===================================================-->

            </div>
            <div class="col-sm-3 col-lg-6">

                <!--Tile-->
                <!--===================================================-->
                <div class="panel panel-purple panel-colorful">
                    <div class="pad-all text-center">
                        <span class="text-3x text-thin">32</span>
                        <p>Oordenes completadas</p>
                        <i class="demo-pli-coding"></i>
                    </div>
                </div>
                <!--===================================================-->


                <!--Tile-->
                <!--===================================================-->
                <div class="panel panel-dark panel-colorful">
                    <div class="pad-all text-center">
                        <span class="text-3x text-thin">12</span>
                        <p>Ordenes en proceso</p>
                        <i class="demo-psi-receipt-4 icon-lg"></i>
                    </div>
                </div>
                <!--===================================================-->

            </div>
           
        </div>
    </div>
    
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel">
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-vcenter mar-top">
                        <thead>
                            <tr>
                                <th class="min-w-td">#</th>                            
                                <th>Cliente</th>
                                <th>Tecnico</th>
                                <th>Tiempo en proceso</th>
                                <th>Etapa</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="min-w-td">1</td>                              
                                <td><a class="btn-link" href="#">Milagros Ruiz</a></td>
                                <td>Julian Lopez</td>
                                <td>30 minutos</td>
                                <td><span class="label label-table label-success">Trial</span></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a class="btn btn-sm btn-default btn-hover-success demo-psi-pen-5 add-tooltip" href="#" data-original-title="Edit" data-container="body"></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="min-w-td">1</td>                              
                                <td><a class="btn-link" href="#">Milagros Ruiz</a></td>
                                <td>Julian Lopez</td>
                                <td>30 minutos</td>
                                <td><span class="label label-table label-info">Bussiness</span></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a class="btn btn-sm btn-default btn-hover-success demo-psi-pen-5 add-tooltip" href="#" data-original-title="Edit" data-container="body"></a>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="min-w-td">1</td>                              
                                <td><a class="btn-link" href="#">Milagros Ruiz</a></td>
                                <td>Julian Lopez</td>
                                <td>30 minutos</td>
                                <td><span class="label label-table label-mint">Free</span></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a class="btn btn-sm btn-default btn-hover-success demo-psi-pen-5 add-tooltip" href="#" data-original-title="Edit" data-container="body"></a>
                                    </div>
                                </td>
                            </tr>
                            
                            <tr>
                                <td class="min-w-td">2</td>                            
                                <td><a class="btn-link" href="#">Milagros Ruiz</a></td>
                                <td>Julian Lopez</td>
                                <td>30 minutos</td>
                                <td><span class="label label-table label-purple">Free</span></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a class="btn btn-sm btn-default btn-hover-success demo-psi-pen-5 add-tooltip" href="#" data-original-title="Edit" data-container="body"></a>
                                    </div>
                                </td>
                            </tr>                         
                         
                        </tbody>
                    </table>
                    <hr>

                    <!--Pagination-->
                    <div class="text-right">
                        <ul class="pagination mar-no">
                            <li class="disabled"><a class="demo-pli-arrow-left-2" href="#"></a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><span>...</span></li>
                            <li><a href="#">20</a></li>
                            <li><a class="demo-pli-arrow-right-2" href="#"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
    @push('scripts')
   
    <script src="{{ asset('assets/plugins/flot-charts/jquery.flot.min.js')}}"></script>
	<script src="{{ asset('assets/plugins/flot-charts/jquery.flot.categories.min.js')}}"></script>
	<script src="{{ asset('assets/plugins/flot-charts/jquery.flot.orderBars.min.js')}}"></script>
	<script src="{{ asset('assets/plugins/flot-charts/jquery.flot.tooltip.min.js')}}"></script>
	<script src="{{ asset('assets/plugins/flot-charts/jquery.flot.resize.min.js')}}"></script>
    <script src="{{ asset('assets/js/demo/dashboard-2.js')}}"></script>

    @endpush

    

    @endsection




