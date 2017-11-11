<!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header" style="text-align: left;">Edit Data Pengetahuan Explicit</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                <?= form_open('admin/edit_data_explicit/'.$explicit->id_explicit, ['id' => 'form']) ?>
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1">
                            <div>
                                <?= $this->session->flashdata('msg') ?>
                            </div>
                            <div class="form-group">
                                <label>NIP</label>
                                <input type="text" class="form-control" name="nip" value="<?= $explicit->nip  ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" class="form-control" name="judul" value="<?= $explicit->judul  ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <input type="text" class="form-control" name="kategori" value="<?= $explicit->kategori  ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Waktu</label>
                                <div class="input-group date">
                                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                      <input type="text" name="waktu" id="waktu" class="form-control" placeholder="YYYY-MM-DD" value="<?= $explicit->waktu  ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <input type="text" class="form-control" name="status" value="<?= $explicit->status  ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Dokumen</label>
                                <input type="file" name="doc">
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <textarea id="tinymce" class="form-control" name="kategori" required><?= $explicit->kategori  ?></textarea>
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