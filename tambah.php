<?php 
// tambah.php 
require_once "Database.php"; 
require_once "Produk.php"; 
  
if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    $db     = new Database(); 
    $produk = new Produk($db->getConnection()); 
  
    $produk->tambah($_POST['nama'], $_POST['harga'], $_POST['stok']); 
  
    header("Location: index.php");   // kembali ke daftar 
    exit; 
} 
?> 
<h2>Tambah Produk</h2> 
<form method="post"> 
  Nama  : <input type="text"   name="nama"  required><br> 
  Harga : <input type="number" name="harga" required><br> 
  Stok  : <input type="number" name="stok"  required><br> 
  <button type="submit">Simpan</button> 
</form>