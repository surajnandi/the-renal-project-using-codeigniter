<?php
$suf_message_status = $this->session->flashdata('message_status');
$suf_message = $this->session->flashdata('message');
?>
<footer style="text-align: center;" class="main-footer">
	<strong>Copyright &copy; <?= date("Y"); ?> <a href="javascript:void(0);">The Renal Project</a>.</strong>
	All rights reserved.
	<div class="float-right d-none d-sm-inline-block">
		<!-- <b>Version</b> 3.0.5 -->
	</div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url('assets/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
<!-- Toastr -->
<script src="<?= base_url('assets/plugins/toastr/toastr.min.js') ?>"></script>
<!-- jquery-validation -->
<script src="<?= base_url('assets/plugins/jquery-validation/jquery.validate.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/jquery-validation/additional-methods.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/dist/js/adminlte.min.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/dist/js/demo.js') ?>"></script>
<!-- DataTables -->
<script src="<?= base_url('assets/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<!-- Select2 -->
<script src="<?= base_url('assets/plugins/select2/js/select2.full.min.js') ?>"></script>

<script type="text/javascript">
	var suf_message_status = '<?= $suf_message_status ?>';
	var suf_message = '<?= $suf_message ?>';
	$(function() {
		const Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 3000
		});
		if (suf_message != '') {
			if (suf_message_status) {
				Toast.fire({
					icon: 'success',
					title: suf_message
				});
			} else {
				Toast.fire({
					icon: 'warning',
					title: suf_message
				});
			}
		}
	});
</script>
</body>

</html>