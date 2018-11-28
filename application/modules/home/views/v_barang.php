<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">    
    

    <title>datatables</title>
</head>
<body>
    <div class="container-fluid p-5">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Diskon</th>
                    <th>Stok</th>
                    <th>Pilih</th>
                </tr>
            </thead>
            <tbody id="show_data"></tbody>
        </table>
    </div>
   
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
         // return the value to the parent window
        function returnYourChoice(choice, choice2) {
            opener.setSearchResult(targetField, targetField2, choice, choice2);
            window.close();
        }

        $(document).ready(function () {

            tampil_data_barang();

            $('#example').DataTable();

            // fungsi tampil barang
            function tampil_data_barang() {
                $.ajax({
                    tipe    : 'ajax',
                    url     : '<?php echo base_url(); ?>index.php/home/data_barang',
                    async   : false,
                    dataType    : 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        for (let i = 0; i < data.length; i++) {
                            html += '<tr>'+
                                    '<td>'+data[i].barang_nama+'</td>'+
                                    '<td>'+data[i].barang_harga+'</td>'+
                                    '<td>'+data[i].barang_diskon+'</td>'+
                                    '<td>'+data[i].barang_stok+'</td>'+
                                    '<td style="text-align:right;">'+
                                        '<a href="#" onclick="returnYourChoice(\''+data[i].barang_kode+'\', \''+data[i].barang_nama+'\')"  class="btn btn-info btn-xs item_edit">Pilih</a>'+
                                    '</td>'+
                                    '</tr>';
                        }
                        $('#show_data').html(html);
                    } 
                });
            }

          

        });
    </script>
</body>
</html>