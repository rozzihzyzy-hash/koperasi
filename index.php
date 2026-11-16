<?php
require_once "Database.php";
require_once "Produk.php";

$db     = new Database();
$produk = new Produk($db->getConnection());

$kata = $_GET['cari'] ?? '';

if ($kata !== '') {
    $data = $produk->cariNama($kata);
} else {
    $data = $produk->semua();
}
?>

<a href="tambah.php">+ Tambah Produk</a>

<form method="get">
    <input type="text" name="cari" placeholder="Cari nama produk..." value="<?= htmlspecialchars($kata) ?>">
    <button type="submit">Cari</button>
    <a href="index.php">Reset</a>
</form>

<table border="1" cellpadding="6">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($data as $p): ?>
    <tr>
        <td><?= $p['id'] ?></td>
        <td><?= htmlspecialchars($p['nama']) ?></td>
        <td>Rp <?= number_format($p['harga'], 0, ',', '.') ?></td>
        <td><?= $p['stok'] ?></td>
        <td>
            <a href="edit.php?id=<?= $p['id'] ?>">Edit</a> |
            <a href="hapus.php?id=<?= $p['id'] ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>