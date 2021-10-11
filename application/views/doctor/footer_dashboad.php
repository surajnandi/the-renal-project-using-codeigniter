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

<!-- jQuery -->
<!-- <? //=base_url('assets/js/bootstrap.min.js')
		?> -->
<script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
	$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- jquery-validation -->
<script src="<?= base_url('plugins/jquery-validation/jquery.validate.min.js') ?>"></script>
<script src="<?= base_url('plugins/jquery-validation/additional-methods.min.js') ?>"></script>
<!-- ChartJS -->
<script src="<?= base_url('assets/plugins/chart.js/Chart.min.js') ?>"></script>
<!-- Sparkline -->
<script src="<?= base_url('assets/plugins/sparklines/sparkline.js') ?>"></script>
<!-- JQVMap -->
<script src="<?= base_url('assets/plugins/jqvmap/jquery.vmap.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url('assets/plugins/jquery-knob/jquery.knob.min.js') ?>"></script>
<!-- daterangepicker -->
<script src="<?= base_url('assets/plugins/moment/moment.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/daterangepicker/daterangepicker.js') ?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>"></script>
<!-- Summernote -->
<script src="<?= base_url('assets/plugins/summernote/summernote-bs4.min.js') ?>"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/dist/js/adminlte.js') ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url('assets/dist/js/pages/dashboard.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/dist/js/demo.js') ?>"></script>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<!-- <script type="text/javascript">
	$(function() {

		var data_click = <?php echo $click; ?>;
		 var data_viewer = <?php echo $viewer; ?>;

		$('#container').highcharts({
			chart: {
				type: 'column'
			},
			title: {
				text: 'Yearly Website Ratio'
			},
			xAxis: {
				categories: ['2016', '2017', '2018', '2019']
			},
			yAxis: {
				title: {
					text: 'Rate'
				}
			},
			series: [{
				name: 'Click',
				data: data_click
			}, {
				name: 'View',
				data: data_viewer
			}]
		});
	});
</script> -->


<!-- <script>
	document.addEventListener('DOMContentLoaded', function() {
		var data_click = <?php echo $row; ?>;
		const chart = Highcharts.chart('container', {
			chart: {
				type: 'column'
			},
			title: {
				text: "Doctor's Graph"
			},
			xAxis: {
				categories: ['2020', '2021', '2022', '2023', '2024', '2025']
			},
			yAxis: {
				title: {
					text: 'No. of Patients'
				}
			},
			series: [{
				name: 'Patients',
				data: data_click
			}]
		});
	});
</script> -->


<!-- <script>
	Highcharts.chart('container', {

		title: {
			text: "Doctor's Graph"
		},

		yAxis: {
			title: {
				text: 'Number of Patients'
			}
		},

		xAxis: {
			accessibility: {
				rangeDescription: 'Range: 2020 to 2030'
			}
		},

		legend: {
			layout: 'vertical',
			align: 'right',
			verticalAlign: 'middle'
		},

		plotOptions: {
			series: {
				label: {
					connectorAllowed: false
				},
				pointStart: 2020
			}
		},

		series: [{
			name: 'Patients',
			data: [35, 33, 50, 73, 77]
		}],

		responsive: {
			rules: [{
				condition: {
					maxWidth: 500
				},
				chartOptions: {
					legend: {
						layout: 'horizontal',
						align: 'center',
						verticalAlign: 'bottom'
					}
				}
			}]
		}

	});
</script> -->



<!-- <script>
	var ctx = document.getElementById('myChart').getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ['01.07.2020', '02.07.2020', '03.07.2020', '04.07.2020', '05.07.2020'],
			datasets: [{
				label: 'Patients',
				data: [35, 33, 50, 73, 77],
				backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(153, 102, 255, 0.2)',
					'rgba(255, 159, 64, 0.2)'
				],
				borderColor: [
					'rgba(255, 99, 132, 1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)'
				],
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				y: {
					beginAtZero: true
				}
			}
		}
	});
</script> -->



<script>
	$(function() {
		//get the bar chart canvas
		var cData = JSON.parse(`<?php echo $chart_data; ?>`);
		var ctx = $("#myChart");

		//bar chart data
		var data = {
			labels: cData.label,
			datasets: [{
				label: cData.label,
				data: cData.data,
				backgroundColor: [
					"#DEB887",
					"#A9A9A9",
					"#DC143C",
					"#F4A460",
					"#2E8B57",
					"#1D7A46",
					"#CDA776",
					"#CDA776",
					"#989898",
					"#CB252B",
					"#E39371",
				],
				borderColor: [
					"#CDA776",
					"#989898",
					"#CB252B",
					"#E39371",
					"#1D7A46",
					"#F4A460",
					"#CDA776",
					"#DEB887",
					"#A9A9A9",
					"#DC143C",
					"#F4A460",
					"#2E8B57",
				],
				borderWidth: [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1]
			}]
		};

		//options
		var options = {
			responsive: true,
			title: {
				display: true,
				position: "top",
				text: "Patients Registered Per Day",
				fontSize: 18,
				fontColor: "#111"
			},
			legend: {
				display: false,
				position: "bottom",
				labels: {
					fontColor: "#333",
					fontSize: 16
				}
			}
		};

		//create bar Chart class object
		var chart1 = new Chart(ctx, {
			type: "bar",
			data: data,
			options: options
		});

	});
</script>







</body>

</html>