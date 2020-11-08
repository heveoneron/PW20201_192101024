<!DOCTYPE html>
<html>
<head>
	<title>UTS Type Genap - 192101024 - Muhammad Hafiz Yusuf</title>
</head>
<?php
    function getKursus($kd)
    {
        $Kode = "";
        $Kelas = "";
        $Hari = "";
        $NoUrut = "";
        $LmPer = "";
        $Biaya = 0;
        $JenisK = "";
        $a = Substr($kd, 0, 2);
        if($a == "VB"){
            $Kode = $a;
            $Hari = Substr($kd, 3,1);
            $NoUrut = Substr($kd, 4,3);
            $LmPer = Substr($kd, 8,2);
            $Kelas = "Visual Basic";
            $Biaya = 750000;
            $JenisK = "Pemrograman";
        }elseif($a == "DP"){
            $Kode = $a;
            $Hari = Substr($kd, 3,1);
            $NoUrut = Substr($kd, 4,3);
            $LmPer = Substr($kd, 8,2);
            $Kelas = "Delphi";
            $Biaya = 650000;
            $JenisK = "Pemrograman";
        }elseif($a == "LX"){
            $Kode = $a;
            $Hari = Substr($kd, 3,1);
            $NoUrut = Substr($kd, 4,3);
            $LmPer = Substr($kd, 8,2);
            $Kelas = "Linux";
            $Biaya = 800000;
            $JenisK = "Sistem Operasi";
        }
        return array($Kode, $Hari, $NoUrut, $LmPer, $Kelas, $Biaya, $JenisK);
    }
    if(isset($_POST['formSubmit']) )
    {
        $kdDaftar = $_POST['slcKdDaftar'];
        $valKursus = getKursus($kdDaftar);
        $nama = $_POST['Nama'];
        $JenisKursus = $valKursus[6];
        $valKelas = $valKursus[4];
        $JenisKelas = $_POST['slcKdKelas'];
        $NomorUrut = $valKursus[2];
        $TestAwal = $_POST['slcHasilTest'];
        $Hari = $valKursus[1];
        if($Hari == 'K'){
            $Hari = "Kamis";
        }elseif($Hari == 'J'){
            $Hari = "Jumat";
        }elseif($Hari == 'M'){
            $Hari = "Minggu";
        }
        $jmlpeserta = $_POST['jmlPeserta'];
        $jmlPertemuan = $valKursus[3];
        $BiayaK = $valKursus[5];
        $BiayaT = 0;
        $BiayaS = 0;
        $BiayaB = 0;
        if($JenisKelas == "P"){
            if($jmlpeserta > 5){
                $BiayaT = 75000 * floatval($jmlpeserta);
            }else{
                $BiayaT = 200000 * floatval($jmlpeserta);
            }
        }else{
            if($jmlpeserta < 10){
                $BiayaT = 50000 * floatval($jmlpeserta);
            }else{
                $BiayaT = 0;
            }
        }

        if($TestAwal == 'A'){
            $BiayaS = $BiayaK * 0.05;
        }elseif($TestAwal == 'B'){
            $BiayaS = $BiayaK * 0.02;
        }else{
            $BiayaS = 0;
        }

        $BiayaB = $BiayaK + $BiayaT - $BiayaS;
    }
        
    if(isset($_POST['formHapus']) )
    {
        $kdDaftar = "";
        $nama = "";
        $valKelas = "";
        $TestAwal = "";
        $Hari = "";
        $JenisKursus = "";
        $NomorUrut = "";
        $jmlpeserta = 0;
        $jmlPertemuan = 0;
        $BiayaK = 0;
        $BiayaT = 0;
        $BiayaS = 0;
        $BiayaB = 0;
    }
    ?>
<body>
    <form method="POST" action="<?php ($_SERVER["PHP_SELF"]);?>">
    <table>
        <tr>
            <td>Nama</td>
            <td><input type="text" name="Nama" id="txtName"></td>
        </tr>
        <tr>
            <td>Kode Pendaftaran</td>
            <td>
                <select name="slcKdDaftar">
                    <option value="">Select...</option>
                    <option value="VBSK00108">VBSK00108</option>
                    <option value="DPSJ00210">DPSJ00210</option>
                    <option value="LXSM10105">LXSM10105</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td>
                <select name="slcKdKelas">
                    <option value="">Select...</option>
                    <option value="R">Reguler</option>
                    <option value="P">Private</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Jumlah Pertemuan</td>
            <td><input type="number" name="jmlPertemuan" id="txtjmlPertemuan"></td>
        </tr>
        <tr>
            <td>Jumlah Peserta</td>
            <td><input type="number" name="jmlPeserta" id="txtjmlPeserta"></td>
        </tr>
        <tr>
            <td>Hasil Test Awal</td>
            <td>
                <select name="slcHasilTest">
                    <option value="">Select...</option>
                    <option value="A">Grade A</option>
                    <option value="B">Grade B</option>
                    <option value="C">Grade C</option>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="formSubmit" value="Submit" > <input type="submit" name="formHapus" value="Hapus" ></td>
        </tr>
    </table>
    
    <center>
    <table width = 50%>
     <tr>
        <td colspan="2"><center><h1>Nusantara Computer</h1></center></td>
     </tr>
     <tr>
        <td colspan="2"><center><h3>Kode Pendaftaran : <?php echo $kdDaftar?></h3></center></td>
     </tr>
     <tr>
        <td>Nama: <?php echo $nama?></td>
        <td>Jenis Kursus : <?php echo $JenisKursus?></td>
     </tr>
     <tr>
        <td>Kelas : <?php echo $valKelas?></td>
        <td>No. Urut : <?php echo $NomorUrut?></td>
     </tr>
     <tr>
        <td>Hasil test awal : <?php echo $TestAwal?></td>
        <td>Hari : <?php echo $Hari?></td>
     </tr>
     <tr>
        <td>Jumlah Peserta : <?php echo $jmlpeserta?> Orang</td>
        <td>Jumlah Pertemuan : <?php echo $jmlPertemuan?>  Kali</td>
     </tr>
     <tr>
        <td>Biaya Kursus : <?php echo $BiayaK?> </td>
        <td>Biaya Tambahan : <?php echo $BiayaT?> </td>
     </tr>
     <tr>
        <td>Biaya Subsidi : <?php echo $BiayaS?> </td>
        <td>Biaya yang Dibayar : <?php echo $BiayaB?> </td>
     </tr>
    </table>
    </center>
    </form>
</body>
</html>