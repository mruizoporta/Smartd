<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Smartd</title>

	<link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' type='text/css'>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}" >
    <link rel="stylesheet" href="{{ asset('assets/css/nifty.min.css')}}" >
    <link rel="stylesheet" href="{{ asset('assets/css/demo/nifty-demo-icons.min.css')}}" >
    <link rel="stylesheet" href="{{ asset('assets/plugins/pace/pace.min.css')}}" >  
    <link rel="stylesheet" href="{{ asset('assets/css/demo/nifty-demo.min.css')}}" >
    <script src="{{ asset('assets/plugins/pace/pace.min.js')}}"></script>           
</head>


<body>
    <div id="container" class="effect aside-float aside-bright mainnav-lg">        
       
        <header id="navbar">
            <div id="navbar-container" class="boxed">
                <div class="navbar-header">
                    <a href="index.html" class="navbar-brand">
                        <img src="assets/img/LOGOCORTADO.png" alt="Smartd Logo" class="brand-icon">
                        <div class="brand-title">
                            <span class="brand-text">Smartd</span>
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
						<h3>Bienvenido.</h3>
					</div>
                </div>                
                
                <div id="page-content">

					@include('includes.home')

					    
                </div>              

            </div>
         
			@include('includes.menu')	           

        </div>
      
        <footer id="footer">           
           
            <p class="pad-lft">&#0169; 2023 Smartd</p>

        </footer>       
    
       
    </div>
  


    <script src="{{ asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/js/nifty.min.js')}}"></script>
{{--     
    <script src="{{ asset('js\demo\nifty-demo.min.js')}}"></script>
    <script src="{{ asset('plugins\flot-charts\jquery.flot.min.js')}}"></script>
	<script src="{{ asset('plugins\flot-charts\jquery.flot.resize.min.js')}}"></script>
	<script src="{{ asset('plugins\flot-charts\jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{ asset('plugins\sparkline\jquery.sparkline.min.js')}}"></script>
    --}}


    

</body>
</html>
