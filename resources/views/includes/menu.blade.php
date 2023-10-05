	
	 <nav id="mainnav-container">
		<div id="mainnav">


			<!--Menu-->
			<!--================================-->
			<div id="mainnav-menu-wrap">
				<div class="nano">
					<div class="nano-content">

						<!--Profile Widget-->
						<!--================================-->
						<div id="mainnav-profile" class="mainnav-profile">
							<div class="profile-wrap text-center">
								<div class="pad-btm">
									<img class="img-circle img-md" src="{{ asset('assets/img/profile-photos/1.png') }}" alt="Profile Picture">
								</div>
								<a href="#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
									<span class="pull-right dropdown-toggle">
										<i class="dropdown-caret"></i>
									</span>
									<p class="mnp-name">Milagros Ruiz</p>
									<span class="mnp-desc">mruiz@gmail.com</span>
								</a>
							</div>
							<div id="profile-nav" class="collapse list-group bg-trans">	
								<a href="#" class="list-group-item">
									<i class="demo-pli-unlock icon-lg icon-fw"></i> Salir
								</a>
							</div>
						</div>


						<!--Shortcut buttons-->
						<!--================================-->
						<div id="mainnav-shortcut" class="hidden">
							<ul class="list-unstyled shortcut-wrap">
								<li class="col-xs-3" data-content="My Profile">
									<a class="shortcut-grid" href="#">
										<div class="icon-wrap icon-wrap-sm icon-circle bg-mint">
										<i class="demo-pli-male"></i>
										</div>
									</a>
								</li>
								<li class="col-xs-3" data-content="Messages">
									<a class="shortcut-grid" href="#">
										<div class="icon-wrap icon-wrap-sm icon-circle bg-warning">
										<i class="demo-pli-speech-bubble-3"></i>
										</div>
									</a>
								</li>
								<li class="col-xs-3" data-content="Activity">
									<a class="shortcut-grid" href="#">
										<div class="icon-wrap icon-wrap-sm icon-circle bg-success">
										<i class="demo-pli-thunder"></i>
										</div>
									</a>
								</li>
								<li class="col-xs-3" data-content="Lock Screen">
									<a class="shortcut-grid" href="#">
										<div class="icon-wrap icon-wrap-sm icon-circle bg-purple">
										<i class="demo-pli-lock-2"></i>
										</div>
									</a>
								</li>
							</ul>
						</div>
						<!--================================-->
						<!--End shortcut buttons-->


						<ul id="mainnav-menu" class="list-group">
							<li>
								<a href="{{ url('/home') }}">
									<i class="demo-pli-inbox-full"></i>
									<span class="menu-title">Dashboard</span>
								</a>
							</li> 
				
							<li>
								<a href="#">
									<i class="demo-pli-boot-2"></i>
									<span class="menu-title">Seguridad</span>
									<i class="arrow"></i>
								</a>
				
								<!--Submenu-->
								<ul class="collapse">
									<li><a href="{{ url('/roles') }}">Roles</a></li>
									<li><a href="{{ url('/usuarios') }}">Usuarios</a></li>									
								</ul>
							</li>						
							
							<li class="list-divider"></li>			
							
							<!--Menu list item-->
							<li>
								<a href="#">
									<i class="demo-pli-boot-2"></i>
									<span class="menu-title">Configuracion</span>
									<i class="arrow"></i>
								</a>
				
								<!--Submenu-->
								<ul class="collapse">
									<li><a href="{{ url('/empresas') }}">Empresas</a></li>
									<li><a href="{{ url('/parametros/1/edit') }}">Parametros</a></li>
									<li><a href="{{ url('/sucursales') }}">Sucursales</a></li>
									<li><a href="{{ url('/catalogos') }}">Catálogos</a></li>
								</ul>
							</li>
				
							<!--Menu list item-->
						{{-- 	<li>
								<a href="#">
									<i class="demo-pli-pen-5"></i>
									<span class="menu-title">Catálogos</span>
									<i class="arrow"></i>
								</a>
				
								<!--Submenu-->
								<ul class="collapse">
									<li><a href="{{ url('/cargos') }}">Cargos</a></li>
									<li><a href="{{ url('/marcas') }}">Marcas</a></li>
									<li><a href="{{ url('/medidas') }}">Unidades de medida</a></li>
									<li><a href="{{ url('/categorias') }}">Categorias</a></li>
									<li><a href="{{ url('/tipossalidas') }}">Tipos de salidas</a></li>
									<li><a href="{{ url('/tiposentradas') }}">Tipos de entrada</a></li>
									
								</ul>
							</li>
				 --}}
							<!--Menu list item-->
							<li>
								<a href="#">
									<i class="demo-pli-receipt-4"></i>
									<span class="menu-title">Inventario</span>
									<i class="arrow"></i>
								</a>
				
								<!--Submenu-->
								<ul class="collapse">
									<li><a href="{{ url('/almacenes') }}">Almacenes</a></li>
									<li><a href="{{ url('/productos') }}">Materiales</a></li>
									<li><a href="{{ url('/proveedores') }}">Proveedores</a></li>
									<li><a href="{{ url('/entradas') }}">Entradas</a></li>
									<li><a href="{{ url('/salidas') }}">Salidas</a></li>
									<li><a href="{{ url('/existencias') }}">Existencia</a></li>
									<li><a href="{{ url('/kardex') }}">Kardex</a></li>
								</ul>
							</li>
				
							<!--Menu list item-->
							<li>
								<a href="#">
									<i class="demo-pli-bar-chart"></i>
									<span class="menu-title">Facturacion</span>
									<i class="arrow"></i>
								</a>
				
								<!--Submenu-->
								<ul class="collapse">
									<li><a href="{{ url('/empleados') }}">Empleados</a></li>
									<li><a href="{{ url('/facturas') }}">Factura</a></li>
									<li><a href="{{ url('/candidatos') }}">Devoluciones</a></li>
									<li><a href="{{ url('/cotizaciones') }}">Cotizaciones</a></li>
									<li><a href="{{ url('/descuentos') }}">Manejo de descuentos</a></li>
								</ul>
							</li>
				
							<!--Menu list item-->
							<li>
								<a href="#">
									<i class="demo-pli-repair"></i>
									<span class="menu-title">Produccion</span>
									<i class="arrow"></i>
								</a>
				
								<!--Submenu-->
								<ul class="collapse">
									<li><a href="{{ url('/plantillas') }}">Plantillas</a></li>
								</ul>
								<ul class="collapse">
									<li><a href="{{ url('/ordenes') }}">Ordenes de trabajo</a></li>
								</ul>
							</li>
				
							<!--Menu list item-->
							<li>
								<a href="#">
									<i class="demo-pli-warning-window"></i>
									<span class="menu-title">Cuentas por pagar</span>
									<i class="arrow"></i>
								</a>
				
								<!--Submenu-->
								<ul class="collapse">
									<li><a href="grid-bootstrap.html">Facturas de compras</a></li>
									<li><a href="grid-liquid-fixed.html">Notas de crédito a proveedores</a></li>
									<li><a href="grid-match-height.html">Estados de cuenta</a></li>								
									
								</ul>
							</li>
				
							<li class="list-divider"></li>			
						
							<!--Menu list item-->
							<li>
								<a href="#">
									<i class="demo-pli-computer-secure"></i>
									<span class="menu-title">Cuentas por cobrar</span>
									<i class="arrow"></i>
								</a>
				
								<!--Submenu-->
								<ul class="collapse">
									<li><a href="app-file-manager.html">Clientes</a></li>
									<li><a href="app-users.html">Notas de crédito</a></li>
									<li><a href="app-users-2.html">Notas de debito</a></li>
									<li><a href="app-profile.html">Recibos</a></li>
									<li><a href="app-calendar.html">Estados de cuenta</a></li>	
								</ul>
							</li>
				
							<!--Menu list item-->
							<li>
								<a href="#">
									<i class="demo-pli-speech-bubble-5"></i>
									<span class="menu-title">Contabilidad</span>
									<i class="arrow"></i>
								</a>
				
								<!--Submenu-->
								<ul class="collapse">
									<li><a href="blog.html">Parametros contables</a></li>
									<li><a href="blog-list.html">Cuentas contables</a></li>
									<li><a href="blog-list-2.html">Comprobantes</a></li>
									<li><a href="blog-details.html">Balance general</a></li>
									<li><a href="blog-details.html">Estado de resultado</a></li>								
									
								</ul>
							</li>			
				
				
							<li class="list-divider"></li>
				
							<!--Category name-->
							<li class="list-header">Reportes</li>
				
							
							<!--Menu list item-->
							<li>
								<a href="helper-classes.html">
									<i class="demo-pli-inbox-full"></i>
									<span class="menu-title">Ventas</span>
								</a>
							</li>                                
						</ul>


					

					</div>
				</div>
			</div>
			<!--================================-->
			<!--End menu-->

		</div>
	</nav>
	
	