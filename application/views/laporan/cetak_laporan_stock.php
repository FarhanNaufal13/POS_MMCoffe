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
                <td colspan="2" style="width:800px;paddin-left:20px;"><center><h4>LAPORAN STOCK BARANG</h4></center><br/></td>
            </tr>           
        </table>
        
        <table border="0" align="center" style="width:900px;border:none;">
            <tr>
                <th style="text-align:left"></th>
            </tr>
        </table>
        
        <table border="1" align="center" style="width:900px;margin-bottom:20px;">
            <?php
            if(isset($_GET['stock_barang']))
            {
                $stock_barang = $_GET['stock_barang'];
            ?>
            <thead>
                <tr></tr>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nama Item</th>
                    <th>Kategori</th>
                    <th>Satuan</th>
                    <th>Harga</th>
                    <th>Stock</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;
                if ($stock_barang == "semua"){
                    $query = $this->db->query("SELECT i.*, c.name as category_name, u.name as unit_name FROM item i JOIN category c ON i.category_id = c.category_id JOIN unit u ON i.unit_id = u.unit_id")->result();
                }
                else{
                    $query = $this->db->query("SELECT i.*,  c.name as category_name, u.name as unit_name FROM item i JOIN category c ON i.category_id = c.category_id JOIN unit u ON i.unit_id = u.unit_id WHERE i.item_id = '$stock_barang'")->result();
                }
                foreach($query as $key => $data)
                {
                ?>
                <tr>
                    <td style="text-align:center;"><?= $no++ ?></td>
                    <td style="text-align:center;"><?= indo_date($data->created) ?></td>
                    <td style="text-align:left;"><?= $data->name ?></td>
                    <td style="text-align:left;"><?= $data->category_name?></td>
                    <td style="text-align:center;"><?= $data->unit_name?></td>
                    <td style="text-align:center;"><?= indo_currency($data->price)?></td>
                    <td style="text-align:center;"><?= $data->stock?></td>
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