<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">detail transaksi</h2>
            <a href="<?php echo base_url()."index.php/".$target; ?>" class="au-btn au-btn-icon au-btn--blue">
                <i class="zmdi zmdi-plus"></i>Tambah Detail Transaksi
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 mt-5">
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3 text-center">
                <thead>
                    <tr>
                        <th>no resi</th>
                        <th>barang</th>
                        <th>jumlah</th>
                        <th>Harga</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                        <?php 
                        // $total = 0;
                        if (isset($detail_list)) {
                            foreach ($detail_list as $data => $key) {
                                // $total += $key->total;
                                echo "<tr>";
                                echo "<td>RES". sprintf("%05s", $key->no_resi)."</td>";
                                echo "<td>".$key->barang."</td>";
                                echo "<td>" .$key->jumlah."</td>";
                                echo "<td>" ."Rp " . number_format($key->harga,2,',','.')."</td>";
                                echo "<td>" ."Rp " . number_format($key->total,2,',','.')."</td>"; 
                                echo "<td class='text-center'><a href='".base_url()."index.php/home/del_resi_detail/".$key->no_resi."/".$key->barkod."'><i class='zmdi zmdi-delete zmdi-hc-2x' style='color:red;'></i></i></a></td>";
                            }
                        } else {
                            echo "<tr>";
                            echo "<td scope=\"row\" colspan=\"5\" class=\"text-center\">Belum ada data</td>";
                            echo "</tr>";
                        }
                    ?>
                    <tr>
                        <td colspan="4" style="font-size:  20px;">Total</td>
                        <td colspan="2" style="font-size:  20px;" class="text-center"><?php echo "Rp " . number_format($total,2,',','.'); ?></td>
                        <!-- <td colspan="2" style="font-size:  20px;" class="text-center"><?php //var_dump($total); ?></td> -->
                    </tr>


                </tbody>
            </table>

            

        </div>
    </div>
</div>
<div class="row">
    <div class="col text-center">
        <a class="au-btn au-btn-icon au-btn--blue mr-2" href="<?php echo base_url()."index.php/home/save_resi_final/".$no_resi; ?>">Save</a>
        <a class="au-btn au-btn-icon au-btn--blue" href="<?php echo base_url()."index.php/home/del_resi_master/".$no_resi; ?>">Cancel</a>
    </div>
</div>