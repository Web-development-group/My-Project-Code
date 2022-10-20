
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width , initial-scale=1.0">
	<title>Naweed Khpulwak Medical Complex</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('website/assets/css/lib/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('website/assets/css/main-style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('website/fonts/font-awesome/css/font-awesome.min.css')}}">
</head>
<body>

		<!-- Start Header -->
		<header class="header">
			<!-- Start Tob bar -->
			<div class="top-bar hidden-sm hidden-xs">
				<div class="container">
					<div class="row">
						<div class="top-bar-content">
							<div class="top-bar-items">
                                <select name="" id="" onchange="localizeSite(this.value)">
                                    <option value="en">English</option>
                                    <option value="pa">Pashto</option>
                                    <option value="dr">Dari</option>
                                </select>
                            </div>
							<div class="top-bar-items"><a href="#" class="localize" key="request">Request an Appointment</a></div>
							<div class="top-bar-items emergencies">For Emergency: +93(0) 789 158 510</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Top bar  -->

			<!-- Start Menu -->
			<section class="main_menu">
	            <nav class="navbar ">
	                <div class="container">
	                   	<div class="navbar-header">
	                   		<a class="navbar-brand logo_h" href="index.html">
	                    		<img src="{{ asset('website/images/logo.png')}}" alt="">
	                    	</a>
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
	                    <div class="collapse navbar-collapse offset" id="menu">
	                        <ul class="nav navbar-nav">
	                            <li class="nav-item"><a class="nav-link localize" key="home" href="index.html">Home</a></li>
	                            <li class="nav-item"><a class="nav-link localize" key="services" href="services.html">Services</a></li>
	                            <li class="nav-item"><a class="nav-link localize" key="blog" href="blog.html">Blog</a></li>
	                            <li class="nav-item"><a class="nav-link localize" key="about" href="about.html">About</a></li>
	                            <li class="nav-item"><a class="nav-link localize" key="contact" href="contact.html">Contact</a></li>
	                            <li class="nav-item"><a class="nav-link localize" key="manage" href="login.html">Manage</a></li>
	                        </ul>
	                    </div>
	                </div>
	            </nav>
			</section>
			<!-- End Menu -->
		</header>
	<!-- End Header -->
    <main>
        @yield('content')
    </main>



<!-- /*Start Footer*/ -->

	<footer>
		<div class="footer-container">
			<div class="container">
				<div class="row">

					<div class="col-md-3 col-sm-3 lists">
						<h2>Featured Services</h2>
						<ul>
							<li><a href="#">Free Checkup</a></li>
							<li><a href="#">Dentistry</a></li>
							<li><a href="#">RMI Services</a></li>
							<li><a href="#">Screen Exam</a></li>
						</ul>
					</div>

					<div class="col-md-3 col-sm-3 lists">
						<h2>Resources </h2>
						<ul>
							<li><a href="#">Guides</a></li>
							<li><a href="#">Research</a></li>
							<li><a href="#">Experts</a></li>
							<li><a href="#">Agencies</a></li>
						</ul>
					</div>

					<div class="col-md-3 col-sm-3 lists">
						<h2>Expert Doctors</h2>
						<ul>
							<li><a href="#">Dr. Muhammad Essa Muhammadi</a></li>
							<li><a href="#">Dr. Mrs. Muhammadi</a></li>
							<li><a href="#">Dr. Fardin</a></li>
							<li><a href="#">Dr. Muhammad Haris</a></li>
						</ul>
					</div>

					<div class="col-md-3 lists">
						<h2>Top Products</h2>
						<ul>
							<li><a href="#">Manage Reputaion</a></li>
							<li><a href="#">Power Tools</a></li>
							<li><a href="#">Best Services</a></li>
							<li><a href="#">Screen Exam</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-xs-12">
						<div class="rights">
							Copyright &copy;<script> document.write(new Date().getFullYear());</script>
							All Rights Reserved | This Template is made with <span class="fa fa-heart"></span>
							by <a href="mailto:muhammadhares11@gmail.com">Hares</a>
						</div>
					</div>
					<div class="col-md-6 col-xs-12 icons">
						<ul>
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
							<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</footer>


	<!-- start modal  -->
	<div id="about-readmore" class="modal fade" role="dialog">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title text-center">A great medical team to help your needs</h4>
	      </div>
	      <div class="modal-body">
	        <div class="container-fluit">
	        	<div class="row">
	        		<div class="col-lg-5 col-sm-5">
	        			<img src="images/doctors/about.png" class="img img-responsive">
	        		</div>
	        		<div class="col-lg-7 col-sm-7">
	        			<h3>Medical Team is responsible</h3>
	        			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	        			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	        			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	        			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	        			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	        			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br>
	        			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	        			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	        			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	        			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	        			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	        			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	        		</div>
	        	</div>
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>

	  </div>
	</div>
	<!-- end about modal -->

	<!-- Start Reques Plan Modal  -->
	<div id="request-plan" class="modal fade" role="dialog">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title text-center">Fill The Form and get your Health Plan!</h4>
	      </div>
	      <div class="modal-body">
	        	<div class="forms">
	        		<br>
					<form method="POST" onsubmit="return vlaidate();">
					  <div class="form-group">
					    <label for="firstname">Firstname:</label>
					    <input type="text" class="form-control" id="firstname" placeholder="Firstname">
					    <span class="msg" id="msg1"></span>
					  </div>

					  <div class="form-group">
					    <label for="lastname">Lastname:</label>
					    <input type="text" class="form-control" id="lastname" placeholder="Lastname">
					    <span class="msg" id="msg2"></span>
					  </div>

					  <div class="form-group">
					    <label for="dob">Date of Birth:</label>
					    <input type="date" class="form-control" id="dob" placeholder="Date of Birth">
					    <span class="msg" id="msg3"></span>
					  </div>

					  <div class="form-group">
					    <label for="gender">Gender: &nbsp;</label>
					    <label class="radio-inline"><input type="radio" checked name="gender">Male</label>
						<label class="radio-inline"><input type="radio" name="gender">Female</label>
					  </div>

					  <div class="form-group">
					    <label for="gender">Maritul Status: &nbsp;</label>
					    <label class="radio-inline"><input type="radio" checked name="m_status">Single </label>
						<label class="radio-inline"><input type="radio" name="m_status">Married</label>
					  </div>

					  <div class="form-group">
					    <label for="email">Email address:</label>
					    <input type="email" class="form-control" id="email" placeholder="Email">
					  </div>

					   <div class="form-group">
					    <label for="msg">Your Message:</label>
					    <textarea class="form-control" id="msg" rows="3"></textarea>
					    <span class="msg" id="msg4"></span>
					  </div>

					  <button type="submit" class="btn btn-success pull-right">Submit</button>
					</form>
					<br>
	        	</div>
	      </div>
	      <div class="modal-footer text-left">
	      	<p align="left">Please Fill The form Correctly and check your email for plan!</p>
	        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
	      </div>
	    </div>
	  </div>
	</div>

	<script type="text/javascript" src="{{ asset('website/assets/js/lib/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('website/assets/js/lib/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('website/assets/js/validation.js') }}"></script>
    <script src="{{ asset('assets/js/localization.js')}}"></script>
</body>
</html>
