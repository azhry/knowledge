<!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header" style="text-align: left;">Detail Data User</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Detail Data User
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="<?= base_url('assets/img/user/' . $user->nip . '.jpg') ?>" width="220" height="240">
                                        </div>
                                        <div class="col-md-8">
                                            <style type="text/css">
                                                tr th, tr td {text-align: left;}
                                            </style>
                                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                <tbody>
                                                    <tr>
                                                        <th>NIP</th>
                                                        <td><?= $user->nip ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <td><?= $user->nama ?></td>
                                                    <tr>
                                                        <th>Jabatan</th>
                                                        <td><?= $user->jabatan ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Bagian</th>
                                                        <td><?= $user->bagian ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Email</th>
                                                        <td><?= $user->email ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Nomor HP</th>
                                                        <td><?= $user->no_hp ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Alamat</th>
                                                        <td>
                                                            <p style="text-align: justify;">
                                                                <?= $user->alamat ?>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!-- /.table-responsive -->
                                        </div>
                                    </div>
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
                function submit_form() {
                    $('#form').submit();
                }

                $(document).ready(function() {
                     tinymce.init({
                        selector: 'textarea',
                        height: 500,
                        plugins: [
                            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                            'searchreplace wordcount visualblocks visualchars code fullscreen',
                            'insertdatetime media nonbreaking save table contextmenu directionality',
                            'emoticons template paste textcolor colorpicker textpattern imagetools'
                        ],
                        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                        toolbar2: 'print preview media | forecolor backcolor emoticons',
                        image_advtab: true
                    })

                    $('.input-group.date').datepicker({format: "yyyy-mm-dd"});
                    
                    $('#dataTables-example').DataTable({
                        responsive: true
                    })
                });
            </script>