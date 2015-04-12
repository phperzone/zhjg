<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Xenon Boostrap Admin Panel" />
	<meta name="author" content="" />
	
	<title>Xenon - Login</title>

	<link rel="stylesheet" href="<?php echo (C("theme")); ?>/common/assets/css/fonts/linecons/css/linecons.css">
	<link rel="stylesheet" href="<?php echo (C("theme")); ?>/common/assets/css/fonts/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo (C("theme")); ?>/common/assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo (C("theme")); ?>/common/assets/css/xenon-core.css">
	<link rel="stylesheet" href="<?php echo (C("theme")); ?>/common/assets/css/xenon-forms.css">
	<link rel="stylesheet" href="<?php echo (C("theme")); ?>/common/assets/css/xenon-components.css">
	<link rel="stylesheet" href="<?php echo (C("theme")); ?>/common/assets/css/xenon-skins.css">
	<link rel="stylesheet" href="<?php echo (C("theme")); ?>/common/assets/css/custom.css">

	<script src="<?php echo (C("theme")); ?>/common/assets/js/jquery-1.11.1.min.js"></script>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="<?php echo (C("theme")); ?>/common/assets/js/html5shiv.min.js"></script>
		<script src="<?php echo (C("theme")); ?>/common/assets/js/respond.min.js"></script>
	<![endif]-->
	
	
</head>
<body class="page-body login-page">

	
	<div class="login-container">
	
		<div class="row">
		
			<div class="col-sm-6">
			
				<script type="text/javascript">
					jQuery(document).ready(function($)
					{
						// Reveal Login form
						setTimeout(function(){ $(".fade-in-effect").addClass('in'); }, 1);
						
						
						// Validation and Ajax action
						$("form#login").validate({
							rules: {
								username: {
									required: true,
									
								},
								
								passwd: {
									required: true,
									// min:6,
									// max:16
								},
								age: {
									required: true,
									digits:true,
									min:15,
									max:80
								},
								address: {
									required: true,

								},
								identity: {
									required: true,
									digits:true,
								},
								alipay: {
									required: true
								},
								phone: {
									required: true
								}

							},
							
							messages: {
								username: {
									required: 'Please enter your username.'
								},
								
								passwd: {
									required: 'Please enter your password.'
								},
								age: {
									required: 'Please enter your age.'
								},
								address: {
									required: 'Please enter your address.'
								},
								identity: {
									required: 'Please enter your identity.'
								},
								alipay: {
									required: 'Please enter your alipay.'
								},
								phone: {
									required: 'Please enter your phone.'
								}
							},
							
							// Form Processing via AJAX
							submitHandler: function(form)
							{
								show_loading_bar(70); // Fill progress bar to 70% (just a given value)
								
								var opts = {
									"closeButton": true,
									"debug": false,
									"positionClass": "toast-top-full-width",
									"onclick": null,
									"showDuration": "300",
									"hideDuration": "1000",
									"timeOut": "5000",
									"extendedTimeOut": "1000",
									"showEasing": "swing",
									"hideEasing": "linear",
									"showMethod": "fadeIn",
									"hideMethod": "fadeOut"
								};
									
								$.ajax({
									url: "<?php echo U('Home/Login/register');?>",
									method: 'POST',
									dataType: 'json',
									data: {
										do_login: true,
										username: $(form).find('#username').val(),
										passwd: $(form).find('#passwd').val(),
									},
									success: function(resp){
										show_loading_bar({
											delay: .5,
											pct: 100,
											finish: function(){
												
												// Redirect after successful login page (when progress bar reaches 100%)
												if(resp.accessGranted){
													window.location.href = "<?php echo U('Home/Login/');?>";
												}else{
													toastr.error("You have entered wrong password, please try again. User and password is <strong>demo/demo</strong> :)", "Invalid Login!", opts);
													$passwd.select();
												}
											}
										});
										
									}
								});
								
							}
						});
						
						// Set Form focus
						$("form#login .form-group:has(.form-control):first .form-control").focus();
					});
				</script>
				
				<!-- Errors container -->
				<div class="errors-container">
				
									
				</div>
				
				<!-- Add class "fade-in-effect" for login form effect -->
				<form method="post" role="form" id="login" class="login-form fade-in-effect">
					
					<div class="login-header">
						<a href="dashboard-1.html" class="logo">
							<!-- <img src="<?php echo (C("theme")); ?>/common/assets/images/logo@2x.png" alt="" width="80" /> -->
							<span>log in</span>
						</a>
						
						<p>Dear user, log in to access the admin area!</p>
					</div>
	
					
					<div class="form-group">
						<label class="control-label" for="username">Username</label>
						<input type="text" class="form-control input-dark" name="username" id="username" autocomplete="off" />
					</div>
					<div class="form-group">
						<label class="control-label" for="passwd">Password</label>
						<input type="password" class="form-control input-dark" name="passwd" id="passwd" autocomplete="off" />
					</div>
					<div class="form-group">
						<label class="control-label" for="age">Age</label>
						<input type="text" class="form-control input-dark" name="age" id="age" autocomplete="off" />
					</div>
					<div class="form-group">
						<label class="control-label" for="phone">Phone</label>
						<input type="text" class="form-control input-dark" name="phone" id="phone" autocomplete="off" />
					</div>
					<div class="form-group">
						<label class="control-label" for="address">address</label>
						<input type="text" class="form-control input-dark" name="address" id="address" autocomplete="off" />
					</div>
					<div class="form-group">
						<label class="control-label" for="identity">identity code</label>
						<input type="text" class="form-control input-dark" name="identity" id="identity" autocomplete="off" />
					</div>
					<div class="form-group">
						<label class="control-label" for="alipay">alipay</label>
						<input type="text" class="form-control input-dark" name="alipay" id="alipay" autocomplete="off" />
					</div>
					
					
					<div class="form-group">
						<button type="submit" class="btn btn-dark  text-left">
							<!-- <i class="fa-lock"></i> -->
							Register 
						</button>
						<button type="link" class="btn btn-dark  text-left">
							<i class="fa-lock"></i>
							Login in 
						</button>
					</div>
					
					<!-- <div class="login-footer">
						<a href="#">Forgot your password?</a>
						
						<div class="info-links">
							<a href="#">ToS</a> -
							<a href="#">Privacy Policy</a>
						</div>
						
					</div> -->
					
				</form>
				
				<!-- External login -->
				<div class="external-login">
					<!-- <a href="#" class="facebook">
						<i class="fa-facebook"></i>
						Facebook Login
					</a> -->
					
					<!-- 
					<a href="#" class="twitter">
						<i class="fa-twitter"></i>
						Login with Twitter
					</a>
					
					<a href="#" class="gplus">
						<i class="fa-google-plus"></i>
						Login with Google Plus
					</a>
					 -->
				</div>
				
			</div>
			
		</div>
		
	</div>



	<!-- Bottom Scripts -->
	<script src="<?php echo (C("theme")); ?>/common/assets/js/bootstrap.min.js"></script>
	<script src="<?php echo (C("theme")); ?>/common/assets/js/TweenMax.min.js"></script>
	<script src="<?php echo (C("theme")); ?>/common/assets/js/resizeable.js"></script>
	<script src="<?php echo (C("theme")); ?>/common/assets/js/joinable.js"></script>
	<script src="<?php echo (C("theme")); ?>/common/assets/js/xenon-api.js"></script>
	<script src="<?php echo (C("theme")); ?>/common/assets/js/xenon-toggles.js"></script>
	<script src="<?php echo (C("theme")); ?>/common/assets/js/jquery-validate/jquery.validate.min.js"></script>
	<script src="<?php echo (C("theme")); ?>/common/assets/js/toastr/toastr.min.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="<?php echo (C("theme")); ?>/common/assets/js/xenon-custom.js"></script>

</body>
</html>