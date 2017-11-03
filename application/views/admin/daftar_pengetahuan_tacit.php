<!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Data Pengetahuan Tacit <!-- <button class="btn btn-success" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i></button> --></h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Daftar Pengetahuan Tacit 
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <style type="text/css">
                                        tr th, tr td {text-align: center; padding: 1%;}
                                    </style>
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Judul</th>
                                                <th style="text-align: justify;">Deskripsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                            <tr>
                                                <td style="width: 20px !important;" >1</td>
                                                <td>738.D.06.06.16</td>
                                                <td>T1.1 (2000)</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                                        Aksi <span class="caret"></span></button>
                                                        <ul class="dropdown-menu" role="menu">
                                                          <li><a href="#" data-toggle="modal" data-target="#edit"><i class="lnr lnr-pencil"></i> Edit</a></li>
                                                          <!-- <li><a href="<?= base_url('admin') ?>"><i class="fa fa-eye"></i> Detail</a></li> -->
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
                        <?= form_open('admin/daftar_pengetahuan_tacit') ?>
                       <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Tambah Data</h4>
                          </div>
                          <div class="modal-body">
                                <div class="form-group">
                                    <label for="Judul">Judul</label>
                                    <textarea class="form-control" name="judul" id="" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="Deskripsi">Deskripsi</label>
                                    <textarea class="form-control" name="deskripsi" id="" required></textarea>
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
                        <?= form_open('admin/daftar_pengetahuan_tacit') ?>
                       <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Edit Data</h4>
                          </div>
                          <div class="modal-body">
                                <input type="hidden" name="" id="">
                                <div class="form-group">
                                    <label for="Judul">Judul</label>
                                    <textarea class="form-control" name="judul" id="" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="Deskripsi">Deskripsi</label>
                                    <textarea class="form-control" name="deskripsi" id="" required></textarea>
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