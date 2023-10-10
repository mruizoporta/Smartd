<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>SMARTD</title>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/nifty.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/pace/pace.min.css')}}" rel="stylesheet">
    <script src="{{ asset('assets/plugins/pace/pace.min.js')}}"></script>  
    <link href="{{ asset('assets/plugins/dropzone/dropzone.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/switchery/switchery.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/chosen/chosen.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet">

    <link href="{{ asset('assets/css/demo/nifty-demo-icons.min.css')}}" rel="stylesheet">   
    <link href="{{ asset('assets/plugins/noUiSlider/nouislider.min.css')}}" rel="stylesheet">

    {{-- Custom CSS Theme --}}
    <link href="{{ asset('assets/css/template-custom.css')}}" rel="stylesheet">
    

</head>


<body>
     <div id="container" class="effect aside-float aside-bright mainnav-lg">       
       
        <header id="navbar">
            <div id="navbar-container" class="boxed">
                <div class="navbar-header">
                    <a href="index.html" class="navbar-brand">
                        <img src="{{ asset('assets/img/icon-menu_dashboard-white.png') }}" alt="Smartd Logo" class="brand-icon">
                        <div class="brand-title">
                            <span class="brand-text">SMARTD</span>
                        </div>
                    </a>
                </div>               
				@include('includes.userOptions')	
            </div>
        </header>       

        <div class="boxed">
            <div id="content-container">
                <div id="page-head">                    
					<div class="pad-all text-center">
						<h3>Publicidad Inteligente</h3>
					</div>
                </div>                
                
                <div id="page-content">

                    <div class="container-fluid">
                        @yield('content')	       
                     </div><!--.container-fluid-->
                </div>              

            </div>
         
			@include('includes.menu')

        </div>
      
        <footer id="footer">           
           
            <p class="pad-rgt">&#0169; 2023 Smartd</p>

        </footer>  
    </div>   


    <script src="{{ asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/js/nifty.min.js')}}"></script>  
    
  

   {{-- 
    <script src="{{ asset('assets/plugins/switchery/switchery.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-select/bootstrap-select.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/chosen/chosen.jquery.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script> 

    <script src="{{ asset('assets/js/demo/form-component.js')}}"></script>
    <script src="{{ asset('assets/js/demo/nifty-demo.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/dropzone/dropzone.min.js')}}"></script> --}} 

    {{-- <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>       
   
    <script src="{{ asset('assets/js/demo/form-component.js')}}"></script> 
    <script src="{{ asset('assets/js/demo/nifty-demo.min.js')}}"></script>

    <script src="{{ asset('assets/js/demo/dashboard-2.js')}}"></script>     
      
     --}}

     
    
    

    @stack('scripts')
 

</body>
</html>
