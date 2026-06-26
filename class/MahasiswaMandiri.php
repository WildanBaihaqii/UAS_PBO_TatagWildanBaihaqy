<?php
require_once 'Mahasiswa.php';
require_once 'src/Koneksi.php';

class MahasiswaMandiri extends Mahasiswa {
    // Properti tambahan spesifik Tahap 4
    private string $golonganUkt;
    private string $namaWali;

    // Constructor Kelas Anak
    public function __construct(int $id_mahasiswa, string $nama_mahasiswa, string $nim, int $semester, float $tarifUktNominal, string $golonganUkt, string $namaWali) {
        parent::__construct($id_mahasiswa, $nama_mahasiswa, $nim, $semester, $tarifUktNominal);
        $this->golonganUkt = $golonganUkt;
        $this->namaWali = $namaWali;
    }

    /**
     * Metode dari Tahap 4: Query SELECT - WHERE untuk mengambil data tipe 'mandiri'
     */
    public static function dapatkanDataMandiri(): array {
        $db = KoneksiDB::getKoneksi();
        $sql = "SELECT * FROM table_mahasiswa WHERE jenis_pembayaran = 'mandiri'";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        
        $daftarMahasiswa = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $daftarMahasiswa[] = new self(
                $row['id_mahasiswa'],
                $row['nama_mahasiswa'],
                $row['nim'],
                $row['semester'],
                (float)$row['tarif_ukt_nominal'],
                $row['golongan_ukt'] ?? '',
                $row['nama_wali'] ?? ''
            );
        }
        return $daftarMahasiswa;
    }

    // Dikosongkan dulu, siap untuk di-override pada Tahap 5
    public function hitungTagihanSemester(): void {}
    public function tampilkanSpesifikasiAkademik(): void {}
}