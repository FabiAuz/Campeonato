<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>FootBall - Sports Html Template</title>
	<!--BOOTSTRAP CSS-->
	<link href="{{url('css/bootstrap.css')}}" rel="stylesheet">'
	
	<!--SLICK SLIDER CSS-->
	<link rel="stylesheet" type="text/css" href="{{url('slick/slick-theme.css')}}"/>
	<link rel="stylesheet" type="text/css" href="{{url('slick/slick.css')}}"/>
	<!--BX SLIDER CSS-->
	<link rel="stylesheet" href="{{url('css/jquery.bxslider.css')}}">
	
	<!--OWL SLIDER CSS-->
	<link href="{{url('css/owl.carousel.css')}}" rel="stylesheet">
	<!--FLEX SLIDER CSS-->
	<link href="{{url('css/flexslider.css')}}" rel="stylesheet">
	<!--component CSS-->
	<link href="{{url('css/component.css')}}" rel="stylesheet">
	<!--PRETTY PHOTO CSS-->
	<link href="{{url('css/prettyphoto.css')}}" rel="stylesheet">
	<!--ICONS CSS-->
	<link href="{{url('css/font-awesome.css')}}" rel="stylesheet">
	<link href="{{url('svg-icon.css')}}" rel="stylesheet">
	<link href="{{url('css/jquery-ui.min.css')}}" rel="stylesheet">
	<!--THEME TYPO CSS-->
	<link href="{{url('css/themetypo.css')}}" rel="stylesheet">
	
	<link href="{{url('css/fullcalendar.css')}}" rel='stylesheet' />
	<!--WIDGET CSS-->
	<link rel="stylesheet" href="{{url('css/widget.css')}}">
	<!--CUSTOM STYLE CSS-->
	<link rel="stylesheet" href="{{url('style.css')}}">
	<!--component CSS-->
	<link href="{{url('css/component.css')}}" rel="stylesheet">
	<!--COLOR CSS-->
	<link rel="stylesheet" href="{{url('css/color.css')}}">
	<!--RESPONCIVE CSS-->
	<link rel="stylesheet" href="{{url('css/responsive.css')}}">
	
	
			
</head>

<body class="kode-football">
<!--// Wrapper //-->
<div class="kode-wrapper">
	<!--// Header //-->
	<header class="football">
		<div class="topbar4">
			<div class="container">
				<div class="pull-right">

					<div class="login-wraper3">

						<ul class="login-meta">
							@if(!Auth::check())
							<li><a href="#"></a></li>
							@endif
							@if(!Auth::check())
								<li>
									<a type="button" class="btn btn-primary" data-toggle="modal" data-target=".media01">LOGIN</a>

									<div class="modal fade bs-example-modal-lg media01" tabindex="-1" role="login" aria-labelledby="login">
										<div class="modal-dialog modal-lg" role="document">
											<div class="modal-content">
												<div class="kode_modal_body">
													<a href="#"><i class="fa fa-user"></i></a>
													<h2>Iniciar Sesión</h2>
													<form method="POST" action="{{ route('login') }}">
														@csrf

														<div class="kode_modal_field">
															<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>

															@if ($errors->has('email'))
																<span class="invalid-feedback">
                                      						<strong>Correo incorrecto o no esta registrado</strong>

                                    							</span>
															@endif

														</div>


														<div class="kode_modal_field">
															<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" name="password" required>

															@if ($errors->has('password'))
																<span class="invalid-feedback">
																	<strong>Contraseña incorrecta</strong>
																</span>
															@endif

														</div>


														<div class="kode_model_btn">
															<button type="submit" >
																Ingresar
															</button>
															<a class="btn btn-link" href="{{ url('/reset') }}">
																Recuperar contraseña
															</a>
														</div>


													</form>
												</div>
											</div>
										</div>
									</div>
								</li>

							@else
								<li>
									<a href="{{url('logout')}}" >Salir</a>
								</li>

							@endif


							<li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
							<li><a id="ftb_btn_link" ><i class="fa fa-search"></i></a></li>
						</ul>

						<div id="show-class"><form><input type="text" placeholder="your key word"></form></div>
						<ul class="social-style3">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="logo-wrap2">
			<div class="container">
				<div class="logo logo-3">
					<a href="#"><img src="images/logo2.png" alt=""></a>
				</div>
				<!--// SPB TICKER //-->

				<!--// SPB TICKER //-->
			</div>
		</div>

		<div class="nav4">
			<div class="container">
				<ul class="kode_nave">
					<li></li><li></li><li></li><li></li><li></li><li></li>

					<li><a href="#">Equipos</a>
						<ul>
							@if (	Auth::check() && Auth::user()->rol=='admin' )
							<li><a href="{{action('EquipoController@index')}}">Listado Admin</a></li>
							<li><a href="{{action('EquipoController@create')}}">Registrar </a></li>
							<li><a href="{{action('EquipoController@lista')}}">Listado</a></li>
						
							@endif
							

						</ul>
					</li>
					
						<li><a href="#">Jugadores</a>
							<ul>
								@if (	Auth::check() && Auth::user()->rol=='admin' )
								<li><a href="{{action('JugadorController@index')}}">Jugadores registrados</a></li>


								<li><a href="{{action('JugadorController@create')}}">Registrar</a></li>
								@endif
							</ul>
						</li>

					<li><a href="#">Campeonatos</a>
						<ul>
							@if (	Auth::check() && Auth::user()->rol=='admin' )

							<li><a href="{{action('CampeonatoController@index')}}">Campeonatos registrados</a></li>


							<li><a href="{{action('CampeonatoController@create')}}">Registrar</a></li>
							@endif
							
						</ul>
						
					</li>


				</ul>
				<!--DL Menu Start-->
				<div id="kode-responsive-navigation" class="dl-menuwrapper">
					<button class="dl-trigger">Open Menu</button>
					<ul class="dl-menu">
						<li class="active"><a class="active" href="#">Home</a>
							<ul class="dl-submenu">
								<li><a href="index.html">home</a></li>
								<li><a href="tennis.html">tennis </a></li>
								<li><a href="sport-news.html">sport news</a></li>
							</ul>
						</li>
						<li class="menu-item kode-parent-menu"><a href="about-us.html">About Us</a></li>
						<li class="menu-item kode-parent-menu"><a href="fixtures.html">fixtures</a>
							<ul class="dl-submenu">
								<li><a href="result.html">result</a></li>
								<li><a href="tickets.html">tickets</a></li>
								<li><a href="ticket-single.html">ticket single</a></li>
							</ul>
						</li>
						<li class="menu-item kode-parent-menu"><a href="#">Team & Player</a>
							<ul class="dl-submenu">
								<li><a href="our-team.html">our team</a></li>
								<li><a href="our-team-2.html">our team 2</a></li>
								<li><a href="single-player.html">single player</a></li>
								<li><a href="single-player-sidebar.html">single player sidebar</a></li>
							</ul>
						</li>

						<li><a href="contact-us.html">Contactanos</a></li>
					</ul>
				</div>
				<!--DL Menu END-->
				<div class="ticket-wrap">
					<a class="book-now" href="tickets.html"><i class="fa fa-ticket"></i>Buy Tickets</a>
					<div class="lung-link">
						<a href="#">en</a>
						<a href="#">fr</a>
					</div>
				</div>
			</div>

		</div>
	</header>

@yield('contenido')
<!--// Contact Footer //-->
	<footer class="football-footer">
		<div class="container">
			<div class="row">
				<!--// TEXT WIDGET //-->
			
				<!--// TEXT WIDGET //-->
				<!--// POPULAR WIDGET //-->
	
			<!--// COPY RIGHT //-->
			<div class="spb-copyright">
				<ul class="sbp-ftnav">
					<li><a href="#">home</a></li>
					<li><a href="#">News</a></li>
					<li><a href="#">Topics</a></li>
					<li><a href="#">Stats</a></li>
					<li><a href="#">Videos</a></li>
					<li><a href="#">post</a></li>
				</ul>
				<p>All Rights Reserved</p>
				<a id="kode-topbtn" href="#"><i class="fa fa-angle-double-up"></i></a>
			</div>
			<!--// COPY RIGHT //-->
		</div>
	</footer>
	<!--// Contact Footer //-->
</div>
<!--JavaScript-->
			<script src="{{url('js/jquery.js')}}"></script>
			<script src="{{url('js/jquery-3.2.1.min.js')}}"></script>

			<script src="{{url('dist/jQuery-2.1.4.min.js')}}"></script>
			<link rel="stylesheet" href="{{url('dist/sweetalert.css')}}">
			<script src="{{url('dist/sweetalert.min.js')}}"></script>
			<!--BOOTSTRAP JavaScript-->
			<script src="{{url('js/bootstrap.min.js')}}"></script>
			<!--BOOTSTRAP PROGRESS BAR JavaScript-->
			<script src="{{url('js/bootstrap-progressbar.js')}}"></script>
			<!--FLEX SLIDER JavaScript-->
			<script src="{{url('js/jquery.flexslider.js')}}"></script>
			<!--OWL SLIDER JavaScript-->
			<script src="{{url('js/owl.carousel.min.js')}}"></script>
			<!--BX SLIDER JavaScript-->
			<script src="{{url('js/jquery.bxslider.min.js')}}"></script>
			<!--SLICK SLIDER JavaScript-->
			<script src="{{url('slick/slick.min.js')}}"></script>
			<script src="{{url('js/moment.min.js')}}"></script>
			<!--ACCORDIAN JavaScript--> 
			<script src="{{url('js/jquery.accordion.js')}}"></script>
			<!--PRETTY PHOTO JavaScript-->
			<script src="{{url('js/jquery.prettyphoto.js')}}"></script>
			<script src="{{url('js/kode_pp.js')}}"></script>
			<!--Number Count (Waypoints) JavaScript-->
			<script src="{{url('js/jquery.countdown.js')}}"></script>

			<script src="{{url('js/jquery-ui.min.js')}}"></script>
			<script src="{{url('js/jquery.downCount.js')}}"></script>
			<script src="{{url('js/modernizr.custom.js')}}"></script>
			<script src="{{url('js/jquery.dlmenu.js')}}"></script>
			<script src="{{url('js/waypoints-min.js')}}"></script>
			<script src="{{url('js/fullcalendar.min.js')}}"></script>
			<!--CUSTOM JavaScript-->
			<script src="{{url('js/functions.js')}}"></script>

			<script type="text/javascript" src="{{url('js/bootstrap-filestyle.min.js')}}"> </script>
			<!-- Latest compiled and minified CSS -->


</body>
</html>
