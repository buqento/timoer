<?php

// $con = mysqli_connect("localhost","dpmptspk_timoer","manggureb3","dpmptspk_timoer");
$con = mysqli_connect("localhost","root","","timoer");
if (mysqli_connect_errno()){echo "Failed to connect to MySQL: " . mysqli_connect_error();}

function tglIndo($tgl){
	$tanggal = substr($tgl,8,2);
	$bulan = getBulan(substr($tgl,5,2));
	$tahun = substr($tgl,0,4);
	return $tanggal.' '.$bulan.' '.$tahun;		 
}	

function getBulan($bln){
	switch ($bln){
		case 1: 
			return "Jan";
			break;
		case 2:
			return "Feb";
			break;
		case 3:
			return "Mar";
			break;
		case 4:
			return "Apr";
			break;
		case 5:
			return "Mei";
			break;
		case 6:
			return "Jun";
			break;
		case 7:
			return "Jul";
			break;
		case 8:
			return "Agu";
			break;
		case 9:
			return "Sep";
			break;
		case 10:
			return "Okt";
			break;
		case 11:
			return "Nov";
			break;
		case 12:
			return "Des";
			break;
	}
} 

function getKategori($id, $con){
	$sql = "SELECT name FROM kategori WHERE id=$id";
	$result = $con->query($sql);
	if ($result) {
	  $row = $result->fetch_assoc();
	}

	return $row['name'];
}

function getJmlKategori($kategori_id, $con){
	$sql = "SELECT COUNT(id) AS jumlah FROM artikel WHERE kategori_id=$kategori_id";
	$result = $con->query($sql);
	if ($result) {
	  $row = $result->fetch_assoc();
	}

	return $row['jumlah'];
}

function seo_title($s) {
    $c = array (' ');
    $d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');

    $s = str_replace($d, '', $s); // Hilangkan karakter yang telah disebutkan di array $d
    
    $s = strtolower(str_replace($c, '-', $s)); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
    return $s;
}