<!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Data Pengetahuan Tacit <a href="<?= base_url('staff/tambah-data-tacit') ?>" class="btn btn-success"><i class="fa fa-plus"></i></a></h1>
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
                                                <th>Kategori</th>
                                                <th>Pengunggah</th>
                                                <th>Waktu</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; foreach ($tacit as $row): ?>
                                            <tr>
                                                <td style="width: 20px !important;" ><?= ++$i ?></td>
                                                <td><?= $row->judul ?></td>
                                                <td><?= $row->kategori ?></td>
                                                <td><?= $row->nama ?></td>
                                                <td><?= $row->waktu ?></td>
                                                <td><?= $row->status ? 'Valid' : 'Belum Valid' ?></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                                        Aksi <span class="caret"></span></button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li><a href="<?= base_url('staff/detail-data-tacit/' . $row->id_tacit) ?>"><i class="fa fa-eye"></i> Detail</a></li>
                                                            <li><a href="<?= base_url('staff/edit-data-tacit/' . $row->id_tacit) ?>"><i class="lnr lnr-pencil"></i> Edit</a></li>
                                                            <?php if ($nip == $row->nip): ?>
                                                            <li><a href="" onclick="delete_tacit(<?= $row->id_tacit ?>)"><i class="lnr lnr-trash"></i> Hapus</a></li>
                                                            <?php endif; ?>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
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
                    $('#dataTables-example').DataTable({
                        responsive: true
                    });
                });

                function delete_tacit(id_tacit) {
                    $.ajax({
                        url: '<?= base_url('staff/daftar-pengetahuan-tacit') ?>',
                        type: 'POST',
                        data: {
                            delete: true,
                            id_tacit: id_tacit,
                            nip: '<?= $nip ?>'
                        },
                        success: function(response) {
                            var json = $.parseJSON(response);
                        },
                        error: function(e) {
                            console.log(e.responseText);
                        }
                    });
                    return false;
                }
            </script>