<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
</head>
<body>
<nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                        	<li><img class="img-circle img-thumbnail" src="{{ asset(Auth::user()->photo) }}" width="40px"></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
	<div class="container">
		@yield('content')
	</div>

	<script src="{{ asset('js/app.js') }}"></script>
	<script>
		$(document).ready(function() {
			$('#loading').hide();
			/*$('#doUpload').click(function(event) {
				$('#upload').click();
			});*/
			$('form').on('click', '.btn-delete', function(event) {
				event.preventDefault();
				if(confirm('Realmente desea eliminar este Usuario?')) {
					$(this).parent().submit();
				}
			});
			// - - - - - - - - - - - - - - - - - - - - - - - - - -
			$('form').on('keyup', '#email', function(event) {
				event.preventDefault();
				$email = $(this).val();
				$token = $('input[name="_token"]').val();

				$.post('checkmail', {email: $email, _token: $token}, function(data) {
					if(data == 'ok') {
						$('#email').parent()
						           .removeClass('has-error has-feedback')
						           .addClass('has-success has-feedback');
						$('#check').removeClass('fa-times').addClass('fa-check');
					} else {
						$('#email').parent()
								   .removeClass('has-success has-feedback')
								   .addClass('has-error has-feedback');
					   $('#check').removeClass('fa-check').addClass('fa-times');
					}
				});
			});
			// - - - - - - - - - - - - - - - - - - - - - - - - - -
			$('form').on('change', '#departments', function(event) {
				event.preventDefault();
				$id_dep = $(this).val();
				$token = $('input[name="_token"]').val();

				$('#loading').show();
				$('#municipalities').hide();

				$.post('loadmuns', {id_dep: $id_dep, _token: $token}, function(data) {
					setTimeout(function() {
						$('#municipalities').removeAttr('readonly');
						$('#municipalities').html(data);
						$('#municipalities').show();
						$('#loading').hide();
					}, 1200);
					
				});
			});

		});
		new Vue({
			el: '#appUpload',
			methods: {
				openBrowser: function() {
					upload.click();
				}
			}
		});
	</script>

</body>
</html>