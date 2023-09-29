@extends('layouts.panel')

@section('content')

<div class="row">
    <div class="col-md-3">
        <div class="panel panel-warning panel-colorful media middle pad-all">
            <div class="media-left">
                <div class="pad-hor">
                    <i class="demo-pli-file-word icon-3x"></i>
                </div>
            </div>
            <div class="media-body">
                <p class="text-2x mar-no text-semibold">241</p>
                <p class="mar-no">>Ordenes de trabajo/ Mes actual</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-info panel-colorful media middle pad-all">
            <div class="media-left">
                <div class="pad-hor">
                    <i class="demo-pli-file-zip icon-3x"></i>
                </div>
            </div>
            <div class="media-body">
                <p class="text-2x mar-no text-semibold">241</p>
                <p class="mar-no">Facturas / Mes actual</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-mint panel-colorful media middle pad-all">
            <div class="media-left">
                <div class="pad-hor">
                    <i class="demo-pli-camera-2 icon-3x"></i>
                </div>
            </div>
            <div class="media-body">
                <p class="text-2x mar-no text-semibold">241</p>
                <p class="mar-no">Cuentas por pagar / Mes actual</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-danger panel-colorful media middle pad-all">
            <div class="media-left">
                <div class="pad-hor">
                    <i class="demo-pli-video icon-3x"></i>
                </div>
            </div>
            <div class="media-body">
                <p class="text-2x mar-no text-semibold">241</p>
                <p class="mar-no">Cuentas por cobrar / Mes actual</p>
            </div>
        </div>
    </div>

</div>


@endsection
