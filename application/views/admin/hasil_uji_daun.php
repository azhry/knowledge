<!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Hasil Uji Laboratorium Pb Terhadap Daun Sawit <button class="btn btn-success" data-toggle="modal" data-target="#add"><i class="fa fa-plus"> </i></button></h1> 
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Data Hasil Uji Laboratorium Pb Terhadap Daun Sawit
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <style type="text/css">
                                        tr th, tr td {text-align: center;}
                                    </style>
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Sampel</th>
                                                <th>Tahun Tanam</th>
                                                <th>Jenis Sampel</th>
                                                <th>Tanggal Analisa</th>
                                                <th>Kondisi Sampel</th>
                                                <th>Kode Lab</th>
                                                <th>Parameter</th>
                                                <th>Satuan</th>
                                                <th>Hasil Analisa</th>
                                                <th>Metode</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                            <tr>
                                                <td>1</td>
                                                <td>D1.1 (2000)</td>
                                                <td>2000</td>
                                                <td>Padat</td>
                                                <td>9-16 Juni2016</td>
                                                <td>Daun Sawit</td>
                                                <td>T1593.LPT.090616</td>
                                                <td>Pb</td>
                                                <td>mg/Kg</td>
                                                <td>ttd</td>
                                                <td>IK-03-LPT-FMIPA</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                                        Aksi <span class="caret"></span></button>
                                                        <ul class="dropdown-menu" role="menu">
                                                          <li><a href="#" data-toggle="modal" data-target="#edit"><i class="lnr lnr-pencil"></i> Edit</a></li>
                                                          <li><a href="<?= base_url('admin') ?>"><i class="fa fa-eye"></i> Detail</a></li>
                                                          <li><a href="" onclick="delete_data()"><i class="lnr lnr-trash"></i> Hapus </a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->


                    <div class="modal fade" tabindex="-1" role="dialog" id="add">
                      <div class="modal-dialog" role="document">
                        <?= form_open('admin/data_pelamar') ?>
                       <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Tambah Data</h4>
                          </div>
                          <div class="modal-body">
                                <div class="form-group">
                                    <label for="Nama Sampel">Nama Sampel</label>
                                    <input type="text" class="form-control" name="nama_sampel" required>
                                </div>
                                <div class="form-group">
                                    <label for="Tahun Tanam">Tahun Tanam</label>
                                    <input type="number" class="form-control" name="tahun_tanam" required>
                                </div>
                                <div class="form-group">
                                    <label for="Jenis Sampel">Jenis Sampel</label>
                                    <input type="text" class="form-control" name="jenis_sampel" required>
                                </div>
                                <div class="form-group">
                                    <label for="Tanggal Analisa">Tanggal Analisa</label>
                                     <div class="input-group date">
                                          <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                          <input type="text" name="tgl_analisa" id="tgl_awal" class="form-control" placeholder="YYYY-MM-DD" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Kondisi Sampel">Kondisi Sampel</label>
                                    <input type="text" class="form-control" name="kondisi_sampel" required>
                                </div>
                                <div class="form-group">
                                    <label for="Kode Lab">Kode Lab</label>
                                    <input type="text" class="form-control" name="kode_lab" required>
                                </div>
                                <div class="form-group">
                                    <label for="Parameter">Parameter</label>
                                    <input type="text" class="form-control" name="parameter" required>
                                </div>
                                <div class="form-group">
                                    <label for="Satuan">Satuan</label>
                                    <input type="text" class="form-control" name="satuan" required>
                                </div>
                                <div class="form-group">
                                    <label for="Hasil Analisa">Hasil Analisa</label>
                                    <input type="text" class="form-control" name="hasil_analisa" required>
                                </div>
                                <div class="form-group">
                                    <label for="Metode">Metode</label>
                                    <input type="text" class="form-control" name="metode" required>
                                </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                          </div>
                          <?= form_close() ?>
                        </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->


                    <div class="modal fade" tabindex="-1" role="dialog" id="edit">
                      <div class="modal-dialog" role="document">
                        <?= form_open('admin/') ?>
                       <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Edit Data</h4>
                          </div>
                          <div class="modal-body">
                                <input type="hidden" name="" id="">
                               <div class="form-group">
                                    <label for="Nama Sampel">Nama Sampel</label>
                                    <input type="text" class="form-control" name="nama_sampel" id="" required>
                                </div>
                                <div class="form-group">
                                    <label for="Tahun Tanam">Tahun Tanam</label>
                                    <input type="number" class="form-control" name="tahun_tanam" id="" required>
                                </div>
                                <div class="form-group">
                                    <label for="Jenis Sampel">Jenis Sampel</label>
                                    <input type="text" class="form-control" name="jenis_sampel" id="" required>
                                </div>
                                <div class="form-group">
                                    <label for="Tanggal Analisa">Tanggal Analisa</label>
                                     <div class="input-group date">
                                          <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                          <input type="text" name="tgl_analisa" id="tgl_awal" class="form-control" placeholder="YYYY-MM-DD" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Kondisi Sampel">Kondisi Sampel</label>
                                    <input type="text" class="form-control" name="kondisi_sampel" id="" required>
                                </div>
                                <div class="form-group">
                                    <label for="Kode Lab">Kode Lab</label>
                                    <input type="text" class="form-control" name="kode_lab" id="" required>
                                </div>
                                <div class="form-group">
                                    <label for="Parameter">Parameter</label>
                                    <input type="text" class="form-control" name="parameter" id="" required>
                                </div>
                                <div class="form-group">
                                    <label for="Satuan">Satuan</label>
                                    <input type="text" class="form-control" name="satuan" id="" required>
                                </div>
                                <div class="form-group">
                                    <label for="Hasil Analisa">Hasil Analisa</label>
                                    <input type="text" class="form-control" name="hasil_analisa" id="" required>
                                </div>
                                <div class="form-group">
                                    <label for="Metode">Metode</label>
                                    <input type="text" class="form-control" name="metode" id="" required>
                                </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                          </div>
                          <?= form_close() ?>
                        </div><!-- /.modal-content -->
                      </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->


                </div>
            </div>
        </div>


            <script>
                $(document).ready(function() {
                    $('.input-group.date').datepicker({format: "yyyy-mm-dd"});
                    
                    $('#dataTables-example').DataTable({
                        responsive: true
                    });
                });

                function delete_bahan_baku(id_bahan_baku) {
                    $.ajax({
                        url: '<?= base_url('kasir/bahan-baku') ?>',
                        type: 'POST',
                        data: {
                            id_bahan_baku: id_bahan_baku,
                            delete: true
                        },
                        success: function() {
                            window.location = '<?= base_url('kasir/bahan-baku') ?>';
                        },
                        error: function(err) {
                            console.log(err.responseText);
                        }
                    });
                }
            </script>