
<div class="navbar-content">
    <ul class="nav navbar-top-links">
        <li class="tgl-menu-btn">
            <a class="mainnav-toggle" href="#">
                <i class="demo-pli-list-view"></i>
            </a>
        </li>
    </ul>
    <ul class="nav navbar-top-links">    
       
        <li id="dropdown-user" class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                <span class="ic-user pull-right">                                   
                    <i class="demo-pli-male"></i>
                </span>                             
            </a>


            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right panel-default">
                <ul class="head-list">                 
                    
                    <li>
                        <a href="{{ route('logout') }}"><i class="demo-pli-unlock icon-lg icon-fw"
                        onclick="event.preventDefault(); document.getElementById('formlogout').submit();"></i>                             
                        Salir</a>                       
                        <form action="{{ route('logout') }}" method="POST" style="display: :none" id="formlogout">
                        @csrf</form>
                        
                    </li>
                </ul>
            </div>
        </li>
       
    </ul>
</div>
