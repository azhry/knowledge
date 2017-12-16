<!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header" style="text-align: left;">Tambah Data Pengetahuan Tacit</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                <?= form_open('staff_ahli/tambah-data-tacit', ['id' => 'form']) ?>
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1">
                            <div>
                                <style type="text/css">.required{color: red;}</style>
                                <?= $this->session->flashdata('msg') ?>
                            </div>
                            <!-- <div class="form-group">
                                <label>NIP<span class="required">*</span></label>
                                <input type="text" class="form-control" name="nip" required>
                            </div> -->
                            <div class="form-group">
                                <label>Judul<span class="required">*</span></label>
                                <input type="text" class="form-control" name="judul" required>
                            </div>
                            <div class="form-group">
                                <label>Kategori<span class="required">*</span></label>
                                <input type="text" class="form-control" name="kategori" required>
                            </div>
                            <!-- <div class="form-group">
                                <label>Waktu<span class="required">*</span></label>
                                <div class="input-group date">
                                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                      <input type="text" name="waktu" id="waktu" class="form-control" placeholder="YYYY-MM-DD H:i:s" required>
                                </div>
                            </div> -->
                            <div class="form-group">
                                <label>Masalah<span class="required">*</span></label>
                                <textarea id="tinymce" class="form-control" name="masalah" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Solusi<span class="required">*</span></label>
                                <textarea id="tinymce" class="form-control" name="solusi" required></textarea>
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

                    $('.input-group.date').datetimepicker({format: "yyyy-mm-dd H:i:s"});
                    
                    $('#dataTables-example').DataTable({
                        responsive: true
                    })
                });
            </script>