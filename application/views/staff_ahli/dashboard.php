MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                    <!-- OVERVIEW -->
                    <div class="panel panel-headline">
                        <div class="panel-heading">
                            <h3 class="panel-title">Dashboard Staff Ahli</h3>
                            <!--<p class="panel-subtitle">Period: Oct 14, 2016 - Oct 21, 2016</p>-->
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <a href="<?= base_url('staff_ahli/daftar-pengetahuan-tacit') ?>">
                                        <div class="metric">
                                            <span class="icon"><i class="lnr lnr-book"></i></span>
                                            <p>
                                                <span class="number"><?= count($tacit) ?></span>
                                                <span class="title">Tacit Knowledge</span>
                                            </p>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="<?= base_url('staff_ahli/daftar-pengetahuan-explicit') ?>">
                                        <div class="metric">
                                            <span class="icon"><i class="lnr lnr-book"></i></span>
                                            <p>
                                                <span class="number"><?= count($explicit) ?></span>
                                                <span class="title">Explicit Knowledge</span>
                                            </p>
                                        </div>
                                    </a>
                                </div>
                                <!-- <div class="col-md-3">
                                    <a href="<?= base_url('staff_ahli/data-komentar') ?>">
                                        <div class="metric">
                                            <span class="icon"><i class="lnr lnr-pencil"></i></span>
                                            <p>
                                                <span class="number"><?= count($komentar) ?></span>
                                                <span class="title">Komentar</span>
                                            </p>
                                        </div>
                                    </a>
                                </div> -->
                                <!-- <div class="col-md-3">
                                    <a href="<?= base_url('staff_ahli/data-user') ?>">
                                        <div class="metric">
                                            <span class="icon"><i class="fa fa-user fa-fw"></i></span>
                                            <p>
                                                <span class="number"><?= count($user) ?></span>
                                                <span class="title">Data User</span>
                                            </p>
                                        </div>
                                    </a>
                                </div> -->
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <a href="<?= base_url('staff_ahli/pencarian') ?>">
                                        <div class="metric">
                                            <span class="icon"><i class="fa fa-search"></i></span>
                                            <p>
                                                <span class="number">_</span>
                                                <span class="title">Searching</span>
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <!-- END OVERVIEW -->
                </div>
            </div>
            <!-- END MAIN CONTENT -->
        </div>
        <!-- END MAIN