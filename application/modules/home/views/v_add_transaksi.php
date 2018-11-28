<div class="card">
    <div class="card-header">
        <strong>Form</strong> Penjualan
    </div>
    <div class="card-body card-block">
        <form action="<?php echo base_url() . "index.php/".$target; ?>" method="post" class="form-horizontal" name="thisForm">
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="resi" class=" form-control-label">No Resi</label>
                </div>
                <div class="col-12 col-md-9">
                        <input type="text" id="resi" name="resi" class="form-control" value="<?php echo "RES". sprintf("%05s", $no_resi); ?>" required readonly>
                </div>
            </div>

            <!-- Input Barang -->
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="input_barang" class=" form-control-label">Barang</label>
                </div>
                <div class="col-12 col-md-9">
                    <div class="input-group">
                        <input type="text" id="input_barang" name="input_barang" placeholder="Input Barang" class="form-control" required readonly>
                        <div class="input-group-btn">
                            <a class="btn btn-primary" href="#" onclick="openPopUpWindow(document.thisForm.barang_kode, document.thisForm.input_barang)"> 
                            <!-- <a class="btn btn-primary" href="#" onclick="alert(document.thisForm.input_barang)">  -->
                                <i class="fa fa-search"></i> Cari
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Input Quantity -->
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="quantity" class=" form-control-label">Quantity</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="quantity" name="quantity" placeholder="Input Jumlah..." class="form-control" required>
                </div>
            </div>

            <!-- INPUT HIDDEN -->
            <input type="hidden" name="barang_kode">
            <input type="hidden" name="no_resi" value="<?php echo $no_resi; ?>"> 
            <input type="hidden" name="tanggal" value="<?php echo date("Y-m-d"); ?>"> 
            <input type="hidden" name="jumlah" value=0>
            <input type="hidden" name="kasir" value="1">
    </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Simpan
                </button>
                <a href="<?php echo base_url() . "index.php/home"; ?>" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Batal
                </a>
            </div>
        </form>
</div>

