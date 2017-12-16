<!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header" style="text-align: left;">Tambah Data User</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                <?= form_open_multipart('staff_ahli/tambah_data_user', ['id' => 'form']) ?>
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1">
                            <div>
                                <style type="text/css">.required{color: red;}</style>
                                <?= $this->session->flashdata('msg') ?>
                            </div>
                            <div class="form-group">
                                <label>NIP<span class="required">*</span></label>
                                <input type="text" class="form-control" name="nip" required>
                            </div>
                            <div class="form-group">
                                <label>Password<span class="required">*</span></label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <div class="form-group">
                                <label>Nama<span class="required">*</span></label>
                                <input type="text" class="form-control" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label>Jabatan<span class="required">*</span></label>
                                <select class="form-control" name="jabatan">
                                    <option>Pilih Jabatan</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Kebagan">Kepala Bagian</option>
                                    <option value="Staff">Staff</option>
                                    <option value="Staff Ahli">Staff Ahli</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Bagian<span class="required">*</span></label>
                                <input type="text" class="form-control" name="bagian" required>
                            </div>
                            <div class="form-group">
                                <label>Email<span class="required">*</span></label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="form-group">
                                <label>Nomor HP<span class="required">*</span></label>
                                <input type="text" class="form-control" name="no_hp" required>
                            </div>
                            <!-- <div class="form-group">
                                <label>Upload Dokumen</label>
                                <p style="color: darkred;">Dokumen dalam bentuk pdf!</p>
                                <input type="file" name="doc">
                            </div> -->
                            <div class="form-group">
                                <label>Alamat<span class="required">*</span></label>
                                <textarea class="form-control" name="alamat" required></textarea>
                            </div>

                            <div>
                                <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
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
                $(document).ready(function() {
                    //  tinymce.init({
                    //     selector: 'textarea',
                    //     height: 500,
                    //     plugins: [
                    //         'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    //         'searchreplace wordcount visualblocks visualchars code fullscreen',
                    //         'insertdatetime media nonbreaking save table contextmenu directionality',
                    //         'emoticons template paste textcolor colorpicker textpattern imagetools'
                    //     ],
                    //     toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                    //     toolbar2: 'print preview media | forecolor backcolor emoticons',
                    //     image_advtab: true
                    // })

                    $('.input-group.date').datepicker({format: "yyyy-mm-dd"});
                    
                    $('#dataTables-example').DataTable({
                        responsive: true
                    })
                });
            </script>