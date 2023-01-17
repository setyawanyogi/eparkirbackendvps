<?php 
    require "../conn.php";
    
    $data       = mysqli_query($con, "SELECT parkir.id_parkir, kendaraan.jenis_kendaraan, parkir.plat_nomor, parkir.jam_masuk, parkir.jam_keluar, parkir.tgl, parkir.image, parkir.status, parkir.addedby, kendaraan.biaya, ((FLOOR((TIME_TO_SEC(parkir.jam_keluar) - TIME_TO_SEC(parkir.jam_masuk))/60)*1000)+ kendaraan.biaya) AS karcis FROM parkir INNER JOIN kendaraan ON parkir.id_kendaraan=kendaraan.id_kendaraan WHERE parkir.status = 'Selesai' ORDER BY parkir.id_parkir DESC");
    $data       = mysqli_fetch_all($data, MYSQLI_ASSOC);

    echo json_encode($data);

?>
