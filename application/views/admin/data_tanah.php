<!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Data Tanah Lab FP Kecil <button class="btn btn-success" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i></button></h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Data Tanah Lab FP Kecil
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <style type="text/css">
                                        tr th, tr td {text-align: center; padding: 1%;}
                                    </style>
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" style="width: 20px !important;">No</th>
                                                <th rowspan="2">Kode Lab</th>
                                                <th rowspan="2">Kode Sampel</th>
                                                <th rowspan="2">pH h20 (1:1)</th>
                                                <th>C-Organik</th>
                                                <th>N-Total</th>
                                                <th rowspan="2">P-tersedia mg/Kg</th>
                                                <th>K-dd</th>
                                                <th>Na</th>
                                                <th>Ca</th>
                                                <th>Mg</th>
                                                <th>KTK</th>
                                                <th>Al-dd</th>
                                                <th colspan="3">% Fraksi Tekstur</th>
                                                <th rowspan="2"></th>
                                            </tr>
                                            <tr>
                                                <th colspan="2">g/Kg</th>
                                                <th colspan="6">g/Kg</th>
                                                <th>Pasir</th>
                                                <th>Debu</th>
                                                <th>Liat</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                            <tr>
                                                <td style="width: 20px !important;" >1</td>
                                                <td>738.D.06.06.16</td>
                                                <td>T1.1 (2000)</td>
                                                <td>6.3</td>
                                                <td>36.495</td>
                                                <td>2.55</td>
                                                <td>54</td>
                                                <td>0.51</td>
                                                <td>0.01</td>
                                                <td>666</td>
                                                <td>3.33</td>
                                                <td>26.1</td>
                                                <td>ttu</td>
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
                                    <label for="Kode Lab">Kode Lab</label>
                                    <input type="text" class="form-control" name="kode_lab" required>
                                </div>
                                <div class="form-group">
                                    <label for="Jenis Sampel">Jenis Sampel</label>
                                    <input type="text" class="form-control" name="jenis_sampel" required>
                                </div>
                                <div class="form-group">
                                    <label for="Kode Sampel">Kode Sampel</label>
                                    <input type="text" class="form-control" name="kode_sampel" required>
                                </div>
                                <div class="form-group">
                                    <label for="pH H20 (1:1)">pH H20 (1:1)</label>
                                    <input type="number" class="form-control" name="pH" required>
                                </div>
                                <div class="form-group">
                                    <label for="C-Organik">C-Organik</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="c_organik" required>
                                        <span class="input-group-addon">g/Kg</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="N-Total">N-Total</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="n_total" required>
                                        <span class="input-group-addon">g/Kg</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="P-Tersedia">P-tersedia</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="p_tersedia" required>
                                        <span class="input-group-addon">mg/Kg</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="K-dd">K-dd</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="k-dd" required>
                                        <span class="input-group-addon">g/Kg</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Na">Na</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="na" required>
                                        <span class="input-group-addon">g/Kg</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Ca">Ca</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="ca" required>
                                        <span class="input-group-addon">g/Kg</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Mg">Mg</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="mg" required>
                                        <span class="input-group-addon">g/Kg</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="KTK">KTK</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="ktk" required>
                                        <span class="input-group-addon">g/Kg</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Al-dd">Al-dd</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="al_dd" required>
                                        <span class="input-group-addon">g/Kg</span>
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="% Fraksi Tekstur">% Fraksi Tekstur</label>
                                </div>
                                <div class="form-group">
                                    <label for="Pasir">Pasir</label>
                                    <input type="number" class="form-control" name="pasir" required>
                                </div>
                                <div class="form-group">
                                    <label for="Debu">Debu</label>
                                    <input type="number" class="form-control" name="debu" required>
                                </div>
                                <div class="form-group">
                                    <label for="Liat">Liat</label>
                                    <input type="number" class="form-control" name="liat" required>
                                </div> -->

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
                                    <label for="Kode Lab">Kode Lab</label>
                                    <input type="text" class="form-control" name="kode_lab" id="" required>
                                </div>
                                <div class="form-group">
                                    <label for="Jenis Sampel">Jenis Sampel</label>
                                    <input type="text" class="form-control" name="jenis_sampel" id="" required>
                                </div>
                                <div class="form-group">
                                    <label for="Kode Sampel">Kode Sampel</label>
                                    <input type="text" class="form-control" name="kode_sampel" id="" required>
                                </div>
                                <div class="form-group">
                                    <label for="pH H20 (1:1)">pH H20 (1:1)</label>
                                    <input type="number" class="form-control" name="pH" id="" required>
                                </div>
                                <div class="form-group">
                                    <label for="C-Organik">C-Organik</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="c_organik" id="" required>
                                        <span class="input-group-addon">g/Kg</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="N-Total">N-Total</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="n_total" id="" required>
                                        <span class="input-group-addon">g/Kg</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="P-Tersedia">P-tersedia</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="p_tersedia" id="" required>
                                        <span class="input-group-addon">mg/Kg</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="K-dd">K-dd</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="k-dd" id="" required>
                                        <span class="input-group-addon">g/Kg</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Na">Na</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="na" id="" required>
                                        <span class="input-group-addon">g/Kg</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Ca">Ca</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="ca" id="" required>
                                        <span class="input-group-addon">g/Kg</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Mg">Mg</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="mg" id="" required>
                                        <span class="input-group-addon">g/Kg</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="KTK">KTK</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="ktk" id="" required>
                                        <span class="input-group-addon">g/Kg</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Al-dd">Al-dd</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="al_dd" id="" required>
                                        <span class="input-group-addon">g/Kg</span>
                                    </div>
                                </div>
                               <!--  <div class="form-group">
                                    <label for="% Fraksi Tekstur">% Fraksi Tekstur</label>
                                </div>
                                <div class="form-group">
                                    <label for="Pasir">Pasir</label>
                                    <input type="number" class="form-control" name="pasir" id="" required>
                                </div>
                                <div class="form-group">
                                    <label for="Debu">Debu</label>
                                    <input type="number" class="form-control" name="debu" id="" required>
                                </div>
                                <div class="form-group">
                                    <label for="Liat">Liat</label>
                                    <input type="number" class="form-control" name="liat" id="" required>
                                </div> -->
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