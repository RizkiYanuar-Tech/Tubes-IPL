<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>
    
    <div class="my-3">
        <table class="table table-bordered">
            <thead class="table-primary">
                <tr >           
                    <th style="color: white;" >ID_Pesanan</th>
                    <th style="color: white;" >ID_Menu</th>
                    <th style="color: white;">ID_Pelanggan</th>
                    <th style="color: white;">Tgl_Pesanan</th>
                    <th style="color: white;">Total Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "../AddMenu/koneksi.php";
                $sql = "SELECT * FROM pemesan ORDER BY ID_Pemesan ASC";
                $hasil = mysqli_query($kon, $sql);
       

                while ($data = mysqli_fetch_array($hasil)) {
                   
                ?>
             
                <tr>
    
                    <td><?php echo $data["ID_Pemesan"]; ?></td>
                    <td><?php echo $data["ID_Menu"]; ?></td>
                    <td><?php echo $data["ID_Pelanggan"]; ?></td>
                    <td><?php echo $data["Tanggal_Pemesanan"]; ?></td>
                    <td><?php echo $data["Total_Harga"]; ?></td>
                    

                </tr>
                <?php
                }
                ?>
            </tbody>
           
        </table>
    </div>
</body>
</html>
