<!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                	<div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Pengetahuan Tacit</h1>
                            <?php  
                                $msg = $this->session->flashdata('msg');
                                echo isset($msg) ? $msg : '';
                            ?>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                    <?= form_open('admin/pengetahuan_tacit') ?>
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Pengetahuan Tacit
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                	<div class="form-group">
	                                    <label for="Judul">Judul</label>
	                                    <input type="text" class="form-control" name="judul" required>
	                                </div>
	                                <div class="form-group">
	                                    <label for="Deskripsi">Deskripsi</label>
	                                    <textarea class="form-control" name="deskripsi" required></textarea>
	                                </div>
                                    <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                                </div>
                            </div>
                        </div>
                    <?= form_close() ?>
                    </div>
                </div>
            </div>
        </div>
