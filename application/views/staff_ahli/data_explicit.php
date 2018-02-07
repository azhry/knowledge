<!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Data Pengetahuan Explicit <a href="<?= base_url('staff_ahli/tambah-data-explicit') ?>" class="btn btn-success"><i class="fa fa-plus"></i></a></h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Daftar Pengetahuan Explicit 
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <style type="text/css">
                                        tr th, tr td {text-align: center; padding: 1%;}
                                    </style>
                                    <?= $this->session->flashdata('msg') ?>
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Judul</th>
                                                <th>Kategori</th>
                                                <th>Pengunggah</th>
                                                <th>Waktu</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; foreach($data as $row): ?>
                                            <tr>
                                                <td style="width: 20px !important;" ><?= $i ?></td>
                                                <td><?= $row->judul ?></td>
                                                <td><?= $row->kategori ?></td>
                                                <td><?= $row->nama ?></td>
                                                <td><?= $row->waktu ?></td>
                                                <td>
                                                    <div id="btn-<?= $row->id_explicit ?>">
                                                        <?php if ($row->status == 1): ?>
                                                            <button onclick="changeStatus(<?= $row->id_explicit ?>)" class="btn btn-success"><i class="fa fa-check"></i> Valid</button>
                                                        <?php else: ?>
                                                            <button onclick="changeStatus(<?= $row->id_explicit ?>)" class="btn btn-danger"><i class="fa fa-close"></i> Belum Valid</button>
                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                                        Aksi <span class="caret"></span></button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <!-- <?php if ($row->nip == $nip): ?>
                                                            <li><a href="<?= base_url('staff_ahli/edit-data-explicit/'.$row->id_explicit) ?>"><i class="lnr lnr-pencil"></i> Edit</a></li>
                                                            <?php endif; ?> -->
                                                            <li><a href="<?= base_url('staff_ahli/detail-data-explicit/'.$row->id_explicit) ?>"><i class="fa fa-eye"></i> Detail</a></li>
                                                            <!-- <?php if ($row->nip == $nip): ?>
                                                            <li><a href="" onclick="delete_explicit(<?= $row->id_explicit ?>)"><i class="lnr lnr-trash"></i> Hapus </a></li>
                                                            <?php endif; ?> -->
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
                    $('#dataTables-example').DataTable({
                        responsive: true
                    });
                });

                function delete_explicit(id_explicit) {
                    $.ajax({
                        url: '<?= base_url('staff_ahli/daftar-pengetahuan-explicit') ?>',
                        type: 'POST',
                        data: {
                            delete: true,
                            id_explicit: id_explicit
                        },
                        success: function(response) {
                            var json = $.parseJSON(response);
                            window.location = '<?= base_url('staff_ahli/daftar-pengetahuan-explicit') ?>';
                        },
                        error: function(e) {
                            console.log(e.responseText);
                        }
                    });
                    return false;
                }

                function changeStatus(id_explicit) {
                    $.ajax({
                        url: '<?= base_url('staff_ahli/daftar-pengetahuan-explicit') ?>',
                        type: 'POST',
                        data: {
                            id_explicit: id_explicit
                        },
                        success: function(response) {
                            $('#btn-' + id_explicit).html(response);
                            window.location = '<?= base_url('staff-ahli/daftar-pengetahuan-explicit') ?>';
                        },
                        error: function (e) {
                            console.log(e.responseText);
                        }
                    });
                }
            </script>