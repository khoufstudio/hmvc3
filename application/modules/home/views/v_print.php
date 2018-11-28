<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kwintasi</title>
    <style>
        body {
            margin: 0px;
            padding: 0px;
            font-family: Arial, Helvetica, sans-serif;
        }

        .parent {
            height: 1005px;
            border: 2px solid black;
        }

        .container {
            box-sizing: border-box;
            margin: 0px;
            padding: 30px;;
            height: 500px;
        }

        .kop-surat em {
            font-size: 12px;
            color: blue;
        }

        /* CSS Table */
        table.blueTable {
            border: 1px solid #1C6EA4;
            background-color: #EEEEEE;
            width: 100%;
            text-align: center;
            border-collapse: collapse;
        }
        table.blueTable td, table.blueTable th {
            border: 1px solid #AAAAAA;
            padding: 3px 2px;
        }
        table.blueTable tbody td {
            font-size: 13px;
             padding: 8px 6px;
        }
        table.blueTable tr:nth-child(even) {
            background: #D0E4F5;
        }
        table.blueTable thead {
            background: #1C6EA4;
            background: -moz-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
            background: -webkit-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
            background: linear-gradient(to bottom, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
            border-bottom: 2px solid #444444;
        }
        table.blueTable thead th {
            font-size: 15px;
            font-weight: bold;
            color: #FFFFFF;
            border-left: 2px solid #D0E4F5;
        }
        table.blueTable thead th:first-child {
            border-left: none;
        }

        .footer td {
            /* font-weight: 700; */
            font-size: 20px !important;
            color: blue;
        }

        /* Akhir CSS table */

        .table-kwitansi {
            margin-top: 30px;
        }


    </style>
</head>
<body>
    <div class="parent">
        <div class="container">
            <div class="kop-surat">
                <span>
                    <strong>PT MEGALOMAN EMBEDED SYSTEM</strong> <br>
                    Komplek Griya Prima Asri <br> 
                    Baleendah, Kab. Bandung 40375 <br> 
                    Phone: (022) 484-6829 <br><br>
                    <em>NO RESI: <?php echo "RS". sprintf("%05s", $no_resi);; ?></em>
                </span>
            </div>

            <div class="table-kwitansi">
                <table class="blueTable">
                    <thead>
                        <tr>
                            <th>Barang</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($detail_list)) {
                            foreach ($detail_list as $data => $key) {
                                // $total += $key->total;
                                echo "<tr>";
                                echo "<td>".$key->barang."</td>";
                                echo "<td>" .$key->jumlah."</td>";
                                echo "<td>" ."Rp " . number_format($key->harga,2,',','.')."</td>";
                                echo "<td>" ."Rp " . number_format($key->total,2,',','.')."</td>";
                            }
                        }

                        ?>
                       
                        <tr class="footer">
                            <td colspan="3">Total</td>
                            <td><strong><?php echo "Rp " . number_format($total,2,',','.'); ?></strong></td>
                        </tr>
                    </tbody>
                </table>
            
            </div>


        </div>
    </div>
</body>
</html>