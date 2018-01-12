<!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Pengetahuan Saya</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Jumlah pengetahuan yang anda bagikan berjumlah <?= count($tacit) + count($explicit) ?> buah
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <style type="text/css">
                                        tr th, tr td {text-align: center; padding: 1%;}
                                    </style>
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Judul</th>
                                                <th>Waktu</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; foreach($tacit as $row): ?>
                                                <tr>
                                                    <td><?= ++$i ?></td>
                                                    <td><?= $row->judul ?></td>
                                                    <td><?= $row->waktu ?></td>
                                                    <td><a href="<?= base_url('staff-ahli/detail-data-tacit/' . $row->id_tacit) ?>">Lihat</a></td>
                                                </tr>
                                            <?php endforeach; ?>
                                            <?php foreach($explicit as $row): ?>
                                                <tr>
                                                    <td><?= ++$i ?></td>
                                                    <td><?= $row->judul ?></td>
                                                    <td><?= $row->waktu ?></td>
                                                    <td><a href="<?= base_url('staff-ahli/detail-data-explicit/' . $row->id_explicit) ?>">Lihat</a></td>
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

        <script type="text/javascript">
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                    responsive: true
                });
            });
        </script>