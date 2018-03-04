<!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header" style="text-align: left;">Pengujian</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Pengujian
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <style type="text/css">
                                        tr th, tr td {text-align: center; padding: 1%;}
                                    </style>
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th style="width: 20px !important;">No</th>
                                                <th style="width: 120px !important;">Pattern</th>
                                                <th>Total Number Of Relevant Items in Collection</th>
                                                <th>Total Number Of Items Retrivied</th>
                                                <th>Number Of Relevant Items Retrivied</th>
                                                <th>Recall</th>
                                                <th>Presicion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Kelapa Sawit</td>
                                                <td>278</td>
                                                <td>110</td>
                                                <td>11</td>
                                                <td>12</td>
                                                <td>11</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>pH</td>
                                                <td>278</td>
                                                <td>110</td>
                                                <td>11</td>
                                                <td>12</td>
                                                <td>11</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Rendah</td>
                                                <td>278</td>
                                                <td>110</td>
                                                <td>11</td>
                                                <td>12</td>
                                                <td>11</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Tinggi</td>
                                                <td>278</td>
                                                <td>110</td>
                                                <td>11</td>
                                                <td>12</td>
                                                <td>11</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Umur</td>
                                                <td>278</td>
                                                <td>110</td>
                                                <td>11</td>
                                                <td>12</td>
                                                <td>11</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Tanah</td>
                                                <td>278</td>
                                                <td>110</td>
                                                <td>11</td>
                                                <td>12</td>
                                                <td>11</td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>Tanaman</td>
                                                <td>278</td>
                                                <td>110</td>
                                                <td>11</td>
                                                <td>12</td>
                                                <td>11</td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>Tahun</td>
                                                <td>278</td>
                                                <td>110</td>
                                                <td>11</td>
                                                <td>12</td>
                                                <td>11</td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td>Analisis</td>
                                                <td>278</td>
                                                <td>110</td>
                                                <td>11</td>
                                                <td>12</td>
                                                <td>11</td>
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td>Pupuk</td>
                                                <td>278</td>
                                                <td>110</td>
                                                <td>11</td>
                                                <td>12</td>
                                                <td>11</td>
                                            </tr>
                                        </tbody>
                                    </table>
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
                    })
                });
            </script>