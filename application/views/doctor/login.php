<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?= $title ?></title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Favicon icon -->
	<link rel="icon" href="<?= base_url('uploads/logo-2.jpg') ?>" type="image/x-icon">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css') ?>">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="<?= base_url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css') ?>">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="javascript:void(0);"><b><i class="fas fa-user-md text-success"></i> <?= $show_title ?> </b></a>
		</div>
		<!-- /.login-logo -->
		<div class="card">
			<div class="card-body login-card-body">
				<p class="login-box-msg" style="color: red;"><?= $this->session->flashdata('message') ?></p>
				<p class="login-box-msg">Sign in to start your session</p>

				<form action="doctor/login" id="quickForm" method="post">
					<div class="form-group mb-3">
						<div class="input-group">
							<input type="text" name="doctor_email_id" value="<?php echo set_value('doctor_email_id'); ?>" autocomplete='off' class="form-control" placeholder="Email">
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fas fa-envelope"></span>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group mb-3">
						<div class="input-group">
							<input type="password" name="doctor_password" class="form-control" placeholder="Password">
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fas fa-lock"></span>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-7">
							<div class="icheck-primary">
								<input type="checkbox" id="remember">
								<label for="remember">
									Remember Me
								</label>
							</div>
						</div>
						<!-- /.col -->
						<div class="col-5">
							<button type="submit" id="btnSubmit" class="btn btn-primary btn-block">Login<span id="refresh_button2">... <i class="fa fa-spinner fa-spin"></i></span></button>
						</div>
						<!-- /.col -->
					</div>
				</form>
			</div>
			<!-- /.login-card-body -->
		</div>
	</div>
	<!-- /.login-box -->
	<!-- jQuery -->
	<script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
	<!-- Bootstrap 4 -->
	<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
	<!-- AdminLTE App -->
	<script src="<?= base_url('assets/dist/js/adminlte.min.js') ?>"></script>
	<!-- jquery-validation -->
	<script src="<?= base_url('assets/plugins/jquery-validation/jquery.validate.min.js') ?>"></script>
	<script src="<?= base_url('assets/plugins/jquery-validation/additional-methods.min.js') ?>"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$("#refresh_button2").hide();
			$.validator.setDefaults({
				submitHandler: function() {
					// $("#quickForm").submit(function();
					$("#refresh_button2").show();
					$("#btnSubmit").prop('disabled', true);
					document.getElementById("quickForm").submit();
				}
			});
			$('#quickForm').validate({
				rules: {
					doctor_password: "required",
					doctor_email_id: {
						required: true,
						email: true
					},
				},
				messages: {},
				errorElement: 'span',
				errorPlacement: function(error, element) {
					error.addClass('invalid-feedback');
					element.closest('.form-group').append(error);
				},
				highlight: function(element, errorClass, validClass) {
					$(element).addClass('is-invalid');
				},
				unhighlight: function(element, errorClass, validClass) {
					$(element).removeClass('is-invalid');
				}
			});
		});
	</script>
</body>

</html>