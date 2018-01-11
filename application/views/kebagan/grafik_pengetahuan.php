<script src="<?= base_url('assets/scripts/chartist.min.js') ?>"></script>
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			<h1 class="text-center">Grafik Jumlah Pengetahuan</h1>
			<div class="ct-chart ct-perfect-fourth" style="height: 400px;"></div>
		</div>
	</div>
</div>

<script type="text/javascript">
		var chart = new Chartist.Bar('.ct-chart', {
		  labels: ['Tacit Knowledge', 'Explicit Knowledge'],
		  series: [
		    [<?= count($tacit) ?>, <?= count($explicit) ?>],
		    [<?= count($tacit_validasi) ?>, <?= count($explicit_validasi) ?>],
		  ]
		}, {
		  stackBars: true,
		  axisY: {
		  	onlyInteger: true
		  }
		}).on('draw', function(data) {
		  if(data.type === 'bar') {
		    data.element.attr({
		      style: 'stroke-width: 30px'
		    });
		  }
		});

</script>