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
                                                <th>Total Number Of Items Retrieved</th>
                                                <th>Number Of Relevant Items Retrieved</th>
                                                <th>Recall</th>
                                                <th>Precision</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; foreach ( $pola as $row ): ?>
                                            <tr>
                                                <?php 
                                                    $documents = json_decode($row->dokumen); 
                                                    $retrieved_documents = 0;
                                                    foreach ( $documents as $document ) {
                                                        if ( file_exists( $path . $document ) ) {

                                                            $pdf = $parser->parseFile( $path . $document );
                                                            $text = $pdf->getText();
                                                            $idx = $this->turbo_bm_m->search( strtolower( $text ), strtolower( $row->pola ) );
                                                            if ( $idx != -1 ) $retrieved_documents++;

                                                        }
                                                    }
                                                ?>
                                                <td><?= ++$i ?></td>
                                                <td><?= $row->pola ?></td>
                                                <td><?= count($documents) ?></td>
                                                <td><?= $retrieved_documents ?></td>
                                                <td>11</td>
                                                <td><?= $retrieved_documents / count( array_diff( scandir( $path ), [ '.', '..' ] ) ) ?></td>
                                                <td><?= $retrieved_documents / count( $documents ) ?></td>
                                            </tr>
                                            <?php endforeach; ?>
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