<?php
include('../config/database.php');

$tanggal = $_POST['tanggal'];
$sales = $_POST['sales'];
$produk = $_POST['produk'];
$no_wa = $_POST['no_wa'];
$nama_lead = $_POST['nama_lead'];
$kota = $_POST['kota'];

$id_leads = $_POST['id_leads'] ?? null;
if ($id_leads) {
    $query = "
        UPDATE leads 
        SET tanggal = '$tanggal', id_sales = '$sales', id_produk = '$produk', no_wa = '$no_wa', nama_lead = '$nama_lead', kota = '$kota' 
        WHERE id_leads = '$id_leads'
    ";
    if ($mysqli->query($query) === TRUE) {
        header("Location: index.php?status=updated");
    } else {
        echo "Error: " . $query . "<br>" . $mysqli->error;
    }
} else {
    $query = "
        INSERT INTO leads (tanggal, id_sales, id_produk, no_wa, nama_lead, kota) 
        VALUES ('$tanggal', '$sales', '$produk', '$no_wa', '$nama_lead', '$kota')
    ";
    if ($mysqli->query($query) === TRUE) {
        header("Location: index.php?status=added");
    } else {
        echo "Error: " . $query . "<br>" . $mysqli->error;
    }
}

$mysqli->close();
?>
