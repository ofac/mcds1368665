<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
</head>
<body>
	<div class="container">
		@yield('content')
	</div>

	<script src="{{ asset('js/app.js') }}"></script>
	<script>
		$(document).ready(function() {
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