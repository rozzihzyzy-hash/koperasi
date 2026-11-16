<?php
//hapus.php
require_once "Database.php"; 
require_once "Produk.php"; 
//1. Akses database
$db =new Database();
$produk=new Produk($db->getConnection());

// 2. Tangkap id
$id =$_GET['id'] ?? null;

//3.hpus
if ($id) {
    $produk->hapus($id);
}
header("Location: index.php");
exit;
?>