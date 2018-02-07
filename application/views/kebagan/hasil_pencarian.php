	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mark.js/7.0.2/jquery.mark.js"></script>
	<style type="text/css">
		span{padding: 2%;}
		h3, .tags a{color: blue;}
		h5{color: green;}
		.highlight{
		    background: yellow;
		    color: black;
		}
		.keterangan span {
			margin: 0;
			padding: 0;
		}
	</style>	

	<!-- MAIN -->
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
	
    <!-- WRAPPER -->
    <div id="wrapper">
		<div class="container">
			<h2>Cari Pengetahuan</h2>
			<div class="row" style="margin-top: 5%;">
				<div class="col-md-8">
					<div class="form-group">
						<label for="kategori">Kategori</label>
						<select name="kategori" id="kategori" class="form-control">
							<option value="0">Tacit</option>
							<option value="1">Explicit</option>
						</select>
					</div>
					<div class="form-group">
						<label for="query">Kata kunci</label>
						<div class="input-group">
							<input type="text" name="query" id="query" placeholder="Kata kunci" class="form-control">
							<span class="input-group-addon" id="search"><i class="fa fa-search"></i></span>			
						</div>
					</div>
					<div style="padding: 2%;" id="time-elapsed"></div>
				</div>
			</div>

			<div id="result-container">
				
			</div>
		</div>

	</div>
	<!-- end WRAPPER -->

		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#query').on('keypress', function(e) {
			if (e.which == 13) {
				$('#search').click();
				return false;
			}
		});

		$('#search').on('click', function() {
			$.ajax({
				url: '<?= base_url('kebagan/pencarian') ?>',
				type: 'POST',
				data: {
					cari: true,
					query: $('#query').val(),
					kategori: $('#kategori').val()
				},
				success: function(response) {
					$('#result-container').html('');
					var html = '';
					var json = $.parseJSON(response);
					var kategori = $('#kategori').val();
					var nama_kategori = kategori == 0 ? 'tacit' : 'explicit';
					for (var i = 0; i < json.result.length; i++) {
						var keterangan = nama_kategori == 'tacit' ? json.result[i].knowledge.masalah : json.result[i].knowledge.keterangan;
						html += '<div class="row" style="margin-top: 1%;">' +
							'<div class="col-md-8 hasil">' +
								'<a href="<?= base_url('kebagan/detail-data-') ?>' + nama_kategori + '/' + (nama_kategori == 'tacit' ? json.result[i].knowledge.id_tacit : json.result[i].knowledge.id_explicit) + '"><h3><i class="fa fa-file-o"></i> ' + json.result[i].knowledge.judul + '</h3></a>' +
								'<h5><i>Oleh <a href="<?= base_url('kebagan/detail-profile') ?>/' + json.result[i].knowledge.nip +  '">' + json.result[i].knowledge.nama + '</a> pada ' + json.result[i].knowledge.waktu + '</i></h5>' + 
								'<div class="keterangan" style="text-align: justify;">' + keterangan + '</div>' +
							'</div>' +
						'</div>';
					}

					$('#result-container').html(html);
					$('div.keterangan').mark($('#query').val(), {
						element: 'span',
						className: 'highlight'
					});
					$('#time-elapsed').text(json.num_rows + ' results (' + json.elapsed.toFixed(4) + 's)');
				},
				error: function(err) {
					console.error(err.responseText);
				}
			});
		});
	});
</script>
