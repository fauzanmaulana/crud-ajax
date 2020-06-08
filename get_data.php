<?php
session_start();
include 'koneksi.php';

$id = $_POST['id'];
$querysql = "SELECT * FROM `siswa` WHERE `siswa`.`id` = ?";
$prepare = $conn->prepare($querysql);
$prepare->bind_param('i', $id);
$prepare->execute();
$result = $prepare->get_result();
while ($row = $result->fetch_assoc()) {
    $data['id'] = $row["id"];
    $data['nama'] = $row["nama"];
    $data['jurusan'] = $row["jurusan"];
    $data['jenis_kelamin'] = $row["jenis_kelamin"];
    $data['tanggal_masuk'] = $row["tanggal_masuk"];
    $data['alamat'] = $row["alamat"];
}

echo json_encode($data);

$conn->close();
