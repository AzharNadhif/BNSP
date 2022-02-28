<?php
require 'koneksi.php';
// $users = read("SELECT * FROM tbl_barang");

    if (isset($_POST["simpan"])) {

        //cek data berhasil atau tidak
        if (register($_POST) > 0) {
            echo "
                <script>
                    alert('Terima Kasih Data Anda Berhasil ditambahkan !');
                    document.location.href = 'index.html';
                </script>
            ";
        } else {
            echo "
            <script>
                alert('data gagal ditambahkan !');
                document.location.href = 'index.html';
            </script>
            ";
        }
    }
?>


<<!DOCTYPE html>
<html lang="en">
<head>
    <!-- bootsrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- css -->
    <link rel="stylesheet" href="style.css ">
    <title>wisata kota Bogor</title>
</head>
<body>
<div class="wrap">
    <div class="header">			
		<img src="img/logo.png" alt="" >
		<h1><b>Pembelian Tiket</b></h1>
	</div>
		<div class="menu">
			<ul>
				<li><a href="tampilan.php">Home</a></li>
				<li><a href="wisata.php">Wisata</a></li>
				<li><a href="index.php">Pesan Tiket</a></li>			
			</ul>
		</div>
    <div class="badan">
    <table style="margin-left:auto;margin-right:auto">
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="get">
        <div class="form-group">
            <table>
                <tr>
                <td>Nama Pemesan</td>
                <td>:</td>
                <td><input type="text" name="nama"></td>
                </tr>
                <tr>
                <td>Masukkan NIK Anda</td>
                <td>:</td>
                <td><input type="text" name="nik"></td>
                </tr>
                <tr>
                <td>Nomor Telepon</td>
                <td>:</td>
                <td><input type="text" name="nohp"></td>
                </tr>
                <tr>
                    <td>Pilih Tiket</td>
                    <td>:</td>
                    <td>
                        <select name="id">
                            <?php

                            //perintah untuk menampilkan semua data barang
                            $sql = "select id, tiketwisata from tbl_tiket";
                            $hasil = mysqli_query($conn, $sql);
                            $no = 0;
                            while ($data = mysqli_fetch_array($hasil)) {
                                $no++;
                                $ket = "";
                                if (isset($_GET['id'])) {
                                    $id = trim($_GET['id']);

                                    if ($id == $data['id']) {

                                        $ket = "selected";
                                    }
                                }
                            ?>
                                <option <?php echo $ket; ?> value="<?php echo $data['id'] ?>">
                                    <?php echo $data['id'] ?>-
                                    <?php echo $data['tiketwisata'] ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                    <td>
                        <input type="submit" name="submit" value="pilih">
                    </td>
                </tr>

            </table>

    </form>
    </table>
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM tbl_tiket where id=$id";
        $hasil = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($hasil);
    }
    ?>
    <table >
        <form action="" method="post">
        <tr>
            <td>Tempat Wisata</td>
            <td>:</td>
            <td><input type="text" name="tiketwisata" value="<?php echo $data['tiketwisata']; ?>"></td>
        </tr>
        <tr>
            <td>Harga </td>
            <td>:</td>
            <td><input type="text" name="harga" value="<?php echo $data['harga']; ?>"></td>
        </tr>
        <!--operasi hitung -->
        <?php
            if (isset($_POST['hitung'])){
                $harga =$_POST['harga'];
                $jumlah =$_POST['jumlah'];
                // $anak =$total-$harga;
                $total =$harga*$jumlah-$harga;
                
            }
        ?>
        <tr>
            <td>Tanggal Pemesanan</td>
            <td>:</td>
            <td><input type="date" name="nama"></td>
        </tr>
        <tr>
            <td>Jumlah Pengunjung</td>
            <td>:</td>
            <td><input type="number" name="jumlah" value="<?php echo $jumlah ?>"></td>
        </tr>
        <tr>
            <td>Pengunjung Anak-anak</td>
            <td>:</td>
            <td><input type="number" name="anak" ></td>
        </tr>
        <tr>
            <td>Harga Total</td>
            <td>:</td>
            <td><input type="number" name="total" value="<?php echo $total ?>"></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>
                <input type="submit" name="hitung" value="Hitung">
                <input type="submit" name="simpan" value="Simpan">
                <input type="submit" name="batal" value="Batal">
            </td>
        </tr>

    </form>
    </table>
    </div>

    <div class="clear"></div>
		<div class="footer">
			Copyright @ Azhar Nadhif 2022
		</div>
 </div>
 
</body>

</html>