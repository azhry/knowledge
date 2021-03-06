<!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header" style="text-align: left;"><?= $explicit->judul ?></h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <style type="text/css">
                                        tr th, tr td {text-align: left;}
                                    </style>
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <tbody>
                                            <tr>
                                                <th>Pengunggah</th>
                                                <td>
                                                    <?php 
                                                        $user = $this->user_m->get_row(['nip' => $explicit->nip]);
                                                        echo $user ? '<a href="' . base_url('kebagan/detail-data-user/' . $explicit->nip) . '">' . $user->nama . '</a>' : '-';     
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Kategori</th>
                                                <td><?= $explicit->kategori ?></td>
                                            </tr>
                                            <tr>
                                                <th>Diterbitkan pada</th>
                                                <td><?= $explicit->waktu ?></td>
                                            </tr>
                                            <tr>
                                                <th>Status</th>
                                                <td><?= $explicit->status ? 'Valid' : 'Belum Valid' ?></td>
                                            </tr>
                                            <tr>
                                                <th>Dokumen</th>
                                                <td><a href="<?= base_url('assets/dokumen/' . $explicit->dokumen) ?>"><?= $explicit->dokumen ?></a></td>
                                            </tr>
                                            <tr>
                                                <th>Keterangan</th>
                                                <td>
                                                    <p style="text-align: justify;">
                                                        <?= $explicit->keterangan ?>
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
                                    <?= form_open('kebagan/detail-data-explicit/' . $id_explicit) ?>
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
                                            echo $user ? '<a href="' . base_url('kebagan/detail-data-user/' . $row->nip) . '">' . $user->nama . '</a>' : '-';
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
            </script>