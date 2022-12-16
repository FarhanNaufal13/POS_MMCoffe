<html lang="en" moznomarginboxes mozdisallowselectionprint>
    <head>
        <title>Laporan Stock Barang Keluar</title>
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
                <td colspan="2" style="width:800px;paddin-left:20px;"><center><h4>LAPORAN STOCK BARANG KELUAR</h4></center><br/></td>
            </tr>           
        </table>
        
        
        
        <table border="1" align="center" style="width:900px;margin-bottom:20px;">
            <?php
            if(isset($_GET['stock_keluar']))
            {
                $stock_brg = $_GET['stock_keluar'];
            ?>
            <thead>
                <tr></tr>
                <tr>
                    <th>No</th>
                    <th style="width: 150px; text-align:center;">Tanggal</th>
                    <th>Nama Item</th>
                    <th>Detail</th>
                    <th>Qty</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;
                if ($stock_brg == "semua"){
                    $query = $this->db->query("SELECT s.*, i.name as item_name FROM stock s JOIN item i ON s.item_id = i.item_id WHERE s.type = 'out'")->result();
                }
                else{
                    $query = $this->db->query("SELECT s.*, i.name as item_name FROM stock s JOIN item i ON s.item_id = i.item_id WHERE s.type = 'out' AND s.item_id = '$stock_brg'")->result();
                }
                foreach($query as $key => $data)
                {
                ?>
                <tr>
                    <td align="center" style="width:25px"><?= $no++ ?></td>
                    <td align="center"><?= indo_date($data->created) ?></td>
                    <td><?= $data->item_name ?></td>
                    <td><?= $data->detail ?></td>
                    <td align="center"><?= $data->qty ?></td>
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