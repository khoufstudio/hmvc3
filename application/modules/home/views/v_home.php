<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">data transaksi</h2>
            <a href="<?php echo base_url()."index.php/home/add"; ?>" class="au-btn au-btn-icon au-btn--blue">
                <i class="zmdi zmdi-plus"></i>Tambah Transaksi
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 mt-5">
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>no resi</th>
                        <th>tanggal</th>
                        <th>jumlah</th>
                        <th>kasir</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                        <?php 
                        if (isset($transaksi)) {
                            foreach ($transaksi as $data => $key) {
                                echo "<tr>";
                                echo "<td>RES". sprintf("%05s", $key->no_resi)."</td>";
                                echo "<td>".date('d M Y', strtotime($key->tanggal))."</td>";
                                echo "<td>"."Rp " . number_format($key->jumlah,2,',','.')."</td>";
                                echo "<td>".$key->kasir_users."</td>";
                                echo "<td class='text-center'>
                                        <a href='".base_url()."index.php/home/laporan/".$key->no_resi."' alt='Export PDF'>
                                            <i class='zmdi zmdi-collection-pdf zmdi-hc-2x' style='color:red;'></i></i>
                                        </a>
                                        <a href='".base_url()."index.php/home/print/".$key->no_resi."' alt='Export PDF'>
                                            <i class='zmdi zmdi-print zmdi-hc-2x ml-2' style='color:blue;'></i></i>
                                        </a>
                                      </td>";
                            }
                        } else {
                            echo "<tr>";
                            echo "<td scope=\"row\" colspan=\"5\" class=\"text-center\">Belum ada data</td>";
                            echo "</tr>";
                        }
                    
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>