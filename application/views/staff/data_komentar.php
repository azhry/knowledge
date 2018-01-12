<!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Data Komentar <a href="<?= base_url('staff/tambah_data_komentar') ?>" class="btn btn-success"><i class="fa fa-plus"></i></a></h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Daftar Komentar 
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
                                                <th>ID Tacit</th>
                                                <th>ID Explicit</th>
                                                <th>NIP</th>
                                                <th>Waktu</th>
                                                <th>Komentar</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; foreach($data as $row): ?>
                                            <tr>
                                                <td style="width: 20px !important;" ><?= $i ?></td>
                                                <td><?= $row->id_tacit ?></td>
                                                <td><?= $row->id_explicit ?></td>
                                                <td><?= $row->nip ?></td>
                                                <td><?= $row->waktu ?></td>
                                                <td style="text-align: left !important;"><?= substr($row->komentar, 0,150).'...' ?></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                                        Aksi <span class="caret"></span></button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <?php if ($row->nip == $nip): ?>
                                                            <li><a href="<?= base_url('staff/edit_data_komentar/'.$row->id_komentar) ?>"><i class="lnr lnr-pencil"></i> Edit</a></li>
                                                            <?php endif; ?>
                                                            <li><a href="<?= base_url('staff/detail_data_komentar/'.$row->id_komentar) ?>"><i class="fa fa-eye"></i> Detail</a></li>
                                                            <?php if ($row->nip == $nip): ?>
                                                            <li><a href="" onclick="delete_komentar(<?= $row->id_komentar ?>)"><i class="lnr lnr-trash"></i> Hapus </a></li>
                                                            <?php endif; ?>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php $i++; endforeach; ?>
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

                function delete_komentar(id_komentar) {
                    $.ajax({
                        url: '<?= base_url('staff/data-komentar') ?>',
                        type: 'POST',
                        data: {
                            delete: true,
                            id_komentar: id_komentar
                        },
                        success: function(response) {
                            var json = $.parseJSON(response);
                            window.location = '<?= base_url('staff/data-komentar') ?>';
                        },
                        error: function(e) {
                            console.log(e.responseText);
                        }
                    });
                    return false;
                }
            </script>