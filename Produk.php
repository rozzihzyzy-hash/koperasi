<?php
class Produk{
    private $pdo;
    public function __construct($pdo){
        $this->pdo=$pdo;
    }

    //R
    public function semua(){
        return $this->pdo->query("SELECT * FROM produk ORDER BY id ")->fetchAll();
    }
    public function cari ($id) {
        $stmt= $this->pdo->prepare("SELECT * FROM produk WHERE id =?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
      // (lanjutan di dalam class Produk) 
  
    // C: tambah barang 
    public function tambah($nama, $harga, $stok) { 
        $stmt = $this->pdo->prepare( 
            "INSERT INTO produk (nama, harga, stok) VALUES (?, ?, ?)" 
        ); 
        return $stmt->execute([$nama, $harga, $stok]); 
    } 
  
    // U: ubah barang 
    public function ubah($id, $nama, $harga, $stok) { 
        $stmt = $this->pdo->prepare( 
            "UPDATE produk SET nama = ?, harga = ?, stok = ? WHERE id = ?" 
        ); 
        return $stmt->execute([$nama, $harga, $stok, $id]); 
    } 
  
    // D: hapus barang 
    public function hapus($id) { 
        $stmt = $this->pdo->prepare("DELETE FROM produk WHERE id = ?"); 
        return $stmt->execute([$id]); 
    } 
    public function cariNama($kata) {
        $stmt = $this->pdo->prepare("SELECT * FROM produk WHERE nama LIKE ?");
        $stmt->execute(["%$kata%"]);
        return $stmt->fetchAll();
    }
}
?>