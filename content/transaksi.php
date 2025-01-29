<?php

include "system/proses.php";

$tgl = date('Y-m-d');
// Nomot
$connect = mysqli_connect("127.0.0.1", "root", "", "sale");
$query = "SELECT max(id_transaksi) as maxKode FROM transaksi";
$hasil = mysqli_query($connect, $query);
$data = mysqli_fetch_array($hasil);
$kodebarang = $data['maxKode'];
$nourut = (int)substr($kodebarang, 3, 3);
$nourut++;
$char = "TR";
$nomot = $char . sprintf("%03s", $nourut);
$id_ptg = $_SESSION['login_id'];

?>


<body onload="buka_tab()">
<div class="judul-content">
    <h1>Transaksi</h1>
</div>
<div class="isi-content">
    <form action="crud/simpan_transaksi.php" method="POST">
        <input type="hidden" name="id_user" value="<?php echo $id_ptg; ?>">
        <br>
        <table>
            <tr>
                <td><label>ID Transaksi</label></td>
                <td><br></td>
                <td><input type="text" name="id_transaksi" id="id_transaksi" class="text disable" readonly
                           value="<?= $nomot; ?>"></td>
            </tr>
            <tr>
                <td><label>Tanggal Transaksi</label></td>
                <td><br></td>
                <td><input type="text" name="tanggal" id="tanggal" class="text disable" value="<?= $tgl; ?>" readonly>
                </td>

            </tr>

        </table>


        <br>
        <table>
            <tr>
                <td><label>
                        <center>Kategori</center>
                    </label></td>
                <td><label id="id_plgn">ID Pelanggan</label></td>
                <td><label id="nm_plgn">Nama Pelanggan</label></td>
            </tr>
            <tr>

                <td>
                    <select class="textkecil" name="kategori" id="kategori" onchange="plgn()">
                        <option disabled selected>--Pilih--</option>
                        <option>Pelanggan</option>
                        <option>Non Pelanggan</option>
                    </select>
                </td>

                <td>
                    <input type="text" name="idplgnn" id="id_pelanggan" onkeyup="idp()" class="textkecil"
                           autocomplete="off">
                </td>
                <td>
                    <input type="text" name="nama_pelanggan" id="nama_pelanggan" class="textkecil disable" readonly>
                </td>
            </tr>
        </table>


        <br>
        <table>
            <tr>
                <td>
                    <center><label>ID Barang</label></center>
                </td>
                <td>
                    <center><label>Nama Barang</label></center>
                </td>
                <td>
                    <center><label>Harga</label></center>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="id_barang" class="textkecil" id="id_barang" required="" autocomplete="off"
                           onkeyup="idb()" required="">
                </td>


                <td>
                    <input type="text" name="nama_barang" id="nama_barang" class="textkecil disable" readonly>
                </td>


                <td>
                    <input type="text" name="harga" id="harga" class="textkecil disable" readonly>
                </td>
            </tr>
            <tr>

                <td>
                    <center><label>Jumlah</label></center>
                </td>
                <td>
                    <center><label>total</label></center>
                </td>
                <td></td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="jumlah" id="jumlah" class="textkecil" required="" autocomplete="off"
                           onkeyup="t()">
                </td>
                <td>
                    <input type="text" name="total" id="total" class="textkecil disable" readonly>
                </td>
                <td>
                    <center><input type="button" name="simpan" class="simpantrans btn-biru" value="Simpan"
                                   onclick="simpan_detail()"></center>
                </td>
            </tr>

        </table>


        <!-- Table -->
        <div id="kotak-detail">

        </div>


        <br>
        <table>
            <tr>
                <td>
                    <center><label for="subtotal">Sub Total</label></center>
                </td>
                <td>
                    <center><label for="diskon">Diskon</label></center>
                </td>
                <td>
                    <center><label for="totalbayar">Total Bayar</label></center>
                </td>


            </tr>
            <tr>
                <td><input type="text" name="subtotal" id="subtotal" class="textkecil disable" readonly></td>
                <td><input type="text" name="diskon" id="diskon" class="textkecil disable" readonly></td>


                <td><input type="text" name="totalbayar" id="totalbayar" class="textkecil disable" readonly></td>
            </tr>


            <tr>
                <td>
                    <center><label for="bayar">Bayar</label></center>
                </td>
                <td>
                    <center><label for="kembali">Kembali</label></center>
                </td>
            </tr>


            <tr>


                <td><input type="text" name="bayar" id="bayar" class="textkecil" onkeyup="byr()" required=""></td>

                <td><input type="text" name="kembali" id="kembali" class="textkecil disable" readonly></td>

                <td><input type="submit" name="simpan" value="Transaksi" class="simpantrans"></td>
            </tr>
        </table>
    </form>
</div>
</body>













