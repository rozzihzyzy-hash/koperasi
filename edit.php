<?php
// edit.php
require_once "Database.php";
require_once "Produk.php";

// 1. Akses database
$db     = new Database();
$produk = new Produk($db->getConnection());

// 2. Tangkap angka ID dari URL (misalnya: edit.php?id=5)
$id = $_GET['id'] ?? null;

// 3. Cari data produk di database berdasarkan ID tersebut
$data = $produk->cari($id);

// 4. Jika ID tidak ada, balik ke index.php
if (!$data) {
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $produk->ubah($_POST['id'], $_POST['nama'], $_POST['harga'], $_POST['stok']);
    header("Location: index.php");
    exit;
}
?>
<h2>Edit Produk</h2>
<form method="post">
    <input type="hidden" name="id" value="<?= $data['id'] ?>" required><br>
    Nama  : <input type="text"   name="nama"  value="<?= $data['nama'] ?>" required><br>
    Harga : <input type="number" name="harga" value="<?= $data['harga'] ?>" required><br>
    Stok  : <input type="number" name="stok"  value="<?= $data['stok'] ?>" required><br>
    <button type="submit">Simpan</button>
</form>