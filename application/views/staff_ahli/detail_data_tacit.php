<!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header" style="text-align: left;"><?= $tacit->judul ?></h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-md-offset-9 col-md-3">
                            <a class="btn btn-primary" href="<?= base_url('staff-ahli/edit-data-tacit/' . $tacit->id_tacit) ?>"><i class="lnr lnr-pencil"></i> Edit</a>
                            <a class="btn btn-danger" href="" onclick="delete_tacit(<?= $tacit->id_tacit ?>)"><i class="lnr lnr-trash"></i> Hapus</a>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <style type="text/css">
                                        tr th, tr td {text-align: left;}
                                    </style>
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <tbody>
                                            <tr>
                                                <th>Pengirim</th>
                                                <td>
                                                    <?php 
                                                        $user = $this->user_m->get_row(['nip' => $tacit->nip]);
                                                        echo $user ? '<a href="' . base_url('staff-ahli/detail-data-user/' . $tacit->nip) . '">' . $user->nama . '</a>' : '-';
                                                    ?>
                                                </td>
                                            </tr>
                                                <th>Kategori</th>
                                                <td><?= $tacit->kategori ?></td>
                                            </tr>
                                            <tr>
                                                <th>Diterbitkan pada</th>
                                                <td><?= $tacit->waktu ?></td>
                                            </tr>
                                            <tr>
                                                <th>Status</th>
                                                <td><?= $tacit->status ? 'Valid' : 'Belum Valid' ?></td>
                                            </tr>
                                            <tr>
                                                <th>Masalah</th>
                                                <td>
                                                    <p style="text-align: justify;">
                                                        <?= $tacit->masalah ?>
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Solusi</th>
                                                <td>
                                                    <p style="text-align: justify;">
                                                        <?= $tacit->solusi ?>
                                                    </p>
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

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <?= form_open('staff-ahli/detail-data-tacit/' . $id_tacit) ?>
                                        <textarea rows="5" class="form-control" placeholder="Komentar anda.." name="komentar"></textarea>
                                        <input type="submit" name="submit" value="Kirim" class="btn btn-success">
                                    <?= form_close() ?>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->

                    <?php foreach ($komentar as $row): ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <p><?= $row->komentar ?></p>
                                </div>
                                <!-- /.panel-body -->

                                <div class="panel-footer">
                                    <small> 
                                        <?php  
                                            $user = $this->user_m->get_row(['nip' => $row->nip]);
                                            echo $user ? '<a href="' . base_url('staff-ahli/detail-data-user/' . $row->nip) . '">' . $user->nama . '</a>' : '-';
                                        ?> mengomentari pada <?= $row->waktu ?> 
                                    </small>
                                </div>
                                <!-- /.panel-footer -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <?php endforeach; ?>

                </div>
            </div>
        </div>


            <script type="text/javascript">
                $(document).ready(function() {
                    $('#dataTables-example').DataTable({
                        responsive: true
                    })
                });

                function delete_tacit(id_tacit) {
                    $.ajax({
                        url: '<?= base_url('staff-ahli/daftar-pengetahuan-tacit') ?>',
                        type: 'POST',
                        data: {
                            delete: true,
                            id_tacit: id_tacit,
                            nip: '<?= $nip ?>'
                        },
                        success: function(response) {
                            // var json = $.parseJSON(response);
                            window.location = '<?= base_url( 'staff_ahli/knowledge_base' ) ?>';
                        },
                        error: function(e) {
                            console.log(e.responseText);
                        }
                    });
                    return false;
                }
            </script>