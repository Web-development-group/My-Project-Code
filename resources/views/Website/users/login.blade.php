
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<title>User Login</title>
	<!-- Favicon-->
	<link rel="icon" href="{{asset('assets/images/favicon.ico')}}" type="image/x-icon">
	<!-- Plugins Core Css -->
	<link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet">
	<!-- Custom Css -->
	<link href="{{asset('assets/css/style.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/css/pages/extra_pages.css')}}" rel="stylesheet" />
</head>
<body class="light">
	<div class="loginmain">
		<div class="loginCard">
			<div class="login-btn splits">
				<p>Are you a Doctor?</p>
				<button class="active">Doctor Login</button>
			</div>
			<div class="rgstr-btn splits">
				<p>Are you a Patient?</p>
				<button>Patient Login</button>
			</div>
			<div class="wrapper">
				<form method="POST" action="{{ route('doctor.login')}}" enctype="multipart/form-data" id="login" tabindex="500">
                    @csrf
					<h3>Doctor SignIn</h3>
					<div class="mail">
						<input type="email" name="username">
						<label>Mail or Username</label>
					</div>
					<div class="passwd">
						<input type="password" name="password">
						<label>Password</label>
					</div>
					<div class="text-right p-t-8 p-b-31">
						<a href="#">
							Forgot password?
						</a>
					</div>
					<div class="submit">
						<button class="dark">Sign In</button>
					</div>
					<div class="flex-c p-b-112">

					</div>
				</form>
				<form method="POST" action="{{ route('patient.login')}}" enctype="multipart/form-data" id="register" tabindex="502">
					@csrf
                    <h3>Patient SignIn</h3>
					<div class="email">
						<input name="username" type="email">
						<label>Username</label>
					</div>
					<div class="password">
						<input name="password" type="password">
						<label>Password</label>
					</div>
					<div class="submit">
						<button class="dark">Sign In</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Plugins Js -->
	<script src="{{asset('assets/js/app.min.js')}}"></script>
	<!-- Extra page Js -->
	<script src="{{asset('assets/js/pages/examples/login-register.js')}}"></script>
</body>
</html>
