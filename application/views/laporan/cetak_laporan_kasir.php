<html lang="en" moznomarginboxes mozdisallowselectionprint>
    <head>
        <title>Laporan Penjualan</title>
        <meta charset="utf-8">
    </head>
    <body onload="window.print()">
        <div id="laporan">
            <table align="center" style="width:900px; border-bottom:3px double;border-top:none;border-right:none;border-left:none;margin-top:5px;margin-bottom:20px;">
            <!-- <tr>
                <td><img src="<?= base_url('assets/')?>bijikopi5.jpg"/></td>
            </tr> -->
            </table>

        <table border="0" align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:0px;">
            <tr>
                <td colspan="2" style="width:800px;paddin-left:20px;"><center><h4>LAPORAN PENJUALAN BARANG</h4></center><br/></td>
            </tr>           
        </table>
        
        <table border="0" align="center" style="width:900px;border:none;">
            <tr>
                <th style="text-align:left"></th>
            </tr>
        </table>
        
        <table border="1" align="center" style="width:900px;margin-bottom:20px;">
            <?php
            if(isset($_GET['tgl_awal']))
            {
                $tgl_awal = $_GET['tgl_awal'];
                $tgl_akhir = $_GET['tgl_akhir'];
                $tgl_awal = date("Y-m-d 00:00:00", strtotime($tgl_awal));
				$tgl_akhir = date("Y-m-d 23:59:59", strtotime($tgl_akhir));
                $penjualan = $_GET['penjualan'];
            ?>
            <thead>
                <tr>
                    <th style="width:px">Invoice</th>
                    <th style="width:100px">Tanggal</th>
                    <th>Customer</th>
                    <th style="width:100px">Sub Total</th>
                    <th style="width:100px">Diskon</th>
                    <th style="width:100px">Grand Total</th>
                    <th style="width:100px">Cash</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if($penjualan == "semua"){
                    $query = $this->db->query("SELECT kd.*, k.invoice as kasir_invoice, k.created as kasir_created, c.name as customer_name, k.discount as kasir_discount, k.final_price as kasir_final_price, k.cash as kasir_cash, i.name as item_name, k.total_price as kasir_total_price FROM kasir_detail kd JOIN kasir k ON kd.kasir_id = k.kasir_id JOIN customer c ON k.customer_id = c.customer_id JOIN item i ON kd.item_id = i.item_id WHERE k.created >= '$tgl_awal' AND k.created <= '$tgl_akhir'")->result();
                }else{
                    $query = $this->db->query("SELECT kd.*, k.invoice as kasir_invoice, k.created as kasir_created, c.name as customer_name, k.discount as kasir_discount, k.final_price as kasir_final_price, k.cash as kasir_cash, i.name as item_name, k.total_price as kasir_total_price FROM kasir_detail kd JOIN kasir k ON kd.kasir_id = k.kasir_id JOIN customer c ON k.customer_id = c.customer_id JOIN item i ON kd.item_id = i.item_id WHERE k.created >= '$tgl_awal' AND k.created <= '$tgl_akhir' AND i.item_id = '$penjualan'")->result();
                }
                foreach($query as $data)
                {
                ?>
                <tr>
                    <td style="text-align:center;"><?= $data->kasir_invoice ?></td>
                    <td style="text-align:center;"><?= indo_date($data->kasir_created)?></td>
                    <td style="text-align:left;"><?= $data->customer_name ?></td>
                    <td style="text-align:center;"><?= $data->total?></td>
                    <td style="text-align:center;"><?= $data->kasir_discount?></td>
                    <td style="text-align:center;"><?= $data->kasir_final_price?></td>
                    <td style="text-align:center;"><?= $data->kasir_cash?></td>
                </tr>
                <tr>
                <th colspan="7">Produk</th>
                </tr>
                <tr>
                    <th colspan="3">Nama Item</th>
                    <th>Harga Item</th>
                    <th>Qty</th>
                    <th>Diskon Item</th>
                    <th>Total</th>
                </tr>
                <tr>
                    <td colspan="3" style="text-align:center;"><?= $data->item_name?></td>
                    <td style="text-align:center;"><?= $data->price?></td>
                    <td style="text-align:center;"><?= $data->qty?></td>
                    <td style="text-align:center;"><?= $data->discount_item?></td>
                    <td style="text-align:center;"><?= $data->total?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
            <?php
            }
            ?>
        </table>

        <table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
            <tr>
                <td></td>
        </table>
        <table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
            <tr>
                <td align="right">Bandung, <?php echo date('d-M-Y')?></td>
            </tr>
            <tr>
                <td align="right"></td>
            </tr>
        
            <tr>
            <td><br/><br/><br/><br/></td>
            </tr>    
            <tr>
                <td align="right">( <?= $this->fungsi->user_login()->name?> )</td>
            </tr>
            <tr>
                <td align="center"></td>
            </tr>
        </table>

        <table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
            <tr>
                <th><br/><br/></th>
            </tr>
            <tr>
                <th align="left"></th>
            </tr>
        </table>

        </div>
    </body>
</html>