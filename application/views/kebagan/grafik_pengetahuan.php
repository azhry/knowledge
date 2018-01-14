<script src="<?= base_url('assets/scripts/chart.min.js') ?>"></script>
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<h1 class="text-center">Grafik Jumlah Pengetahuan</h1>
			<canvas id="chart-area"></canvas>
		</div>
	</div>
</div>

<script type="text/javascript">
	var ctx = document.getElementById("chart-area").getContext("2d");
	var myPieChart = new Chart(ctx,{
	    type: 'pie',
	    data: {
	    	datasets: [{
	    		data: [
	    			<?= count($tacit) + count($tacit_validasi) ?>,
	    			<?= count($explicit) + count($explicit_validasi) ?>
	    		],
	    		backgroundColor: [
	    			'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)'
	    		],
	    		label: 'Jumlah Pengetahuan'
	    	}],
	    	labels: ['Tacit', 'Explicit']
	    },
	    options: {
	    	responsive: true
	    }
	});
</script>