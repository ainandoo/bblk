<?php  
	$servername = "localhost";
	$username = "root";
	$password = "";
	$nama_db = "bblk_latihan_php";

	$koneksi = new mysqli($servername, $username, $password, $nama_db);
	if ($koneksi -> connect_error) {
		die("Gagal terhubung ke database <br>" . $koneksi -> connect_error);
	}

	$kueri = "INSERT INTO Pegawai (nama_depan, nama_belakang, email)
			 VALUES ('Mister', 'Ainan', 'ainan@email.com')";

	if ($koneksi -> query($kueri) === TRUE){
		echo "Record data berhasil ditambahkan";
	} else {
		echo "Ada error saat menambahkan record data <br>" . $kueri . "<br>" . $koneksi -> error;
	}
?>