<!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header" style="text-align: left;">Edit Data User</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                <?= form_open('admin/edit_data_user/'.$user->nip, ['id' => 'form']) ?>
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1">
                            <div>
                                <?= $this->session->flashdata('msg') ?>
                            </div>
                            <div class="form-group">
                                <label>NIP</label>
                                <input type="text" class="form-control" name="nip" value="<?= $user->nip  ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <p style="color: darkred;">Update password, dengan password baru!</p>
                                <input type="password" class="form-control" name="password" value="" required>
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="nama" value="<?= $user->nama  ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Jabatan</label>
                                <input type="text" class="form-control" name="jabatan" value="<?= $user->jabatan  ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Bagian</label>
                                <input type="text" class="form-control" name="bagian" value="<?= $user->bagian  ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" value="<?= $user->email  ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Nomor HP</label>
                                <input type="number" class="form-control" name="no_hp" value="<?= $user->no_hp  ?>" required>
                            </div>
                            <!-- <div class="form-group">
                                <label></label>
                                <input type="file" name="doc">
                            </div> -->
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" name="alamat" required><?= $user->alamat  ?></textarea>
                            </div>

                            <div>
                                <input type="submit" onclick="submit_form();" name="simpan" value="Simpan" class="btn btn-success">
                            </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

            <?= form_close() ?>

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