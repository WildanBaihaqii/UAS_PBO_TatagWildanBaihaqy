<?php
// Memaksa PHP untuk mengeluarkan teks jika terjadi error/salah tipe data database
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Memuat semua berkas komponen OOP yang diperlukan
require_once __DIR__ . '/class/MahasiswaMandiri.php';
require_once __DIR__ . '/class/MahasiswaBidikmisi.php';
require_once __DIR__ . '/class/MahasiswaPrestasi.php';

// Mengambil seluruh data mahasiswa berdasarkan jalurnya
$dataMandiri = MahasiswaMandiri::dapatkanDataMandiri();
$dataBidikmisi = MahasiswaBidikmisi::dapatkanDataBidikmisi();
$dataPrestasi = MahasiswaPrestasi::dapatkanDataPrestasi();

// Menghitung statistik sederhana
$countMandiri = count($dataMandiri);
$countBidikmisi = count($dataBidikmisi);
$countPrestasi = count($dataPrestasi);
$totalMahasiswa = $countMandiri + $countBidikmisi + $countPrestasi;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Akademik & Kategori Kelompok Mahasiswa</title>
    <!-- Google Fonts for modern design aesthetics -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="dashboard-container">
    <!-- Sidebar Menu Left -->
    <aside class="sidebar">
        <div class="sidebar-brand">
            <div class="logo-circle">
                <span>🎓</span>
            </div>
            <div class="brand-name">
                <h3>SIAKAD</h3>
                <small>Akademik Portal</small>
            </div>
        </div>
        
        <nav class="sidebar-menu">
            <ul>
                <li>
                    <a href="#overview" class="menu-item active" data-tab="overview">
                        <span class="menu-icon">📊</span>
                        <span class="menu-label">Overview</span>
                    </a>
                </li>
                <li>
                    <a href="#mandiri" class="menu-item" data-tab="mandiri">
                        <span class="menu-icon">💼</span>
                        <span class="menu-label">Mahasiswa Mandiri</span>
                    </a>
                </li>
                <li>
                    <a href="#bidikmisi" class="menu-item" data-tab="bidikmisi">
                        <span class="menu-icon">🌱</span>
                        <span class="menu-label">Mahasiswa Bidikmisi</span>
                    </a>
                </li>
                <li>
                    <a href="#prestasi" class="menu-item" data-tab="prestasi">
                        <span class="menu-icon">🏆</span>
                        <span class="menu-label">Mahasiswa Prestasi</span>
                    </a>
                </li>
            </ul>
        </nav>
        
        <div class="sidebar-footer">
            <p>Admin Akademik</p>
            <p class="role">Sistem PBO v1.0</p>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="main-content">
        <!-- Header -->
        <header class="main-header">
            <div class="header-title">
                <h1>Sistem Informasi Kategori Mahasiswa</h1>
                <p class="subtitle">Spesifikasi Akademik & Perhitungan Tagihan Semester secara Otomatis</p>
            </div>
            <div class="system-time">
                <span class="time-badge">📅 <?php echo date('d F Y'); ?></span>
            </div>
        </header>

        <!-- Content Body wrapper -->
        <div class="content-body">
            
            <!-- OVERVIEW TAB -->
            <section id="overview-tab" class="tab-pane active">
                <div class="welcome-banner">
                    <h2>Selamat Datang di SIAKAD, Admin!</h2>
                    <p>Sistem ini membagi klasifikasi mahasiswa berdasarkan jalur masuk untuk menentukan tarif tagihan semester secara otomatis menggunakan konsep Polymorphism OOP PHP. Klik menu di sidebar untuk melihat daftar tabel.</p>
                </div>
                
                <!-- Stat Cards -->
                <div class="stats-grid">
                    <div class="stat-card total">
                        <div class="card-icon">👥</div>
                        <div class="card-info">
                            <span class="card-title">Total Mahasiswa</span>
                            <span class="card-value"><?php echo $totalMahasiswa; ?></span>
                        </div>
                    </div>
                    
                    <div class="stat-card mandiri">
                        <div class="card-icon">💼</div>
                        <div class="card-info">
                            <span class="card-title">Jalur Mandiri</span>
                            <span class="card-value"><?php echo $countMandiri; ?></span>
                        </div>
                    </div>
                    
                    <div class="stat-card bidikmisi">
                        <div class="card-icon">🌱</div>
                        <div class="card-info">
                            <span class="card-title">Jalur Bidikmisi</span>
                            <span class="card-value"><?php echo $countBidikmisi; ?></span>
                        </div>
                    </div>
                    
                    <div class="stat-card prestasi">
                        <div class="card-icon">🏆</div>
                        <div class="card-info">
                            <span class="card-title">Jalur Prestasi</span>
                            <span class="card-value"><?php echo $countPrestasi; ?></span>
                        </div>
                    </div>
                </div>
                
                <!-- Quick Info section -->
                <div class="quick-info-section">
                    <div class="info-card">
                        <h3>⚙️ Arsitektur PBO (Pemrograman Berorientasi Objek)</h3>
                        <p>Proyek ini mengimplementasikan konsep-konsep inti OOP:</p>
                        <ul>
                            <li><strong>Abstract Class & Method:</strong> Kelas induk <code>Mahasiswa</code> tidak dapat diinstansiasi secara langsung dan mewajibkan kelas anak mengimplementasikan metode abstrak perhitungan tagihan dan spesifikasi akademik.</li>
                            <li><strong>Inheritance (Pewarisan):</strong> Subclass mewarisi seluruh properti dasar dari kelas induk <code>Mahasiswa</code> seperti NIM, Nama, dan Semester.</li>
                            <li><strong>Encapsulation (Enkapsulasi):</strong> Variabel sensitif disembunyikan menggunakan akses modifier <code>private</code> dan <code>protected</code> dengan *getter* publik untuk pembacaan data.</li>
                            <li><strong>Singleton Pattern:</strong> Koneksi database dibungkus menggunakan kelas <code>KoneksiDB</code> yang menjamin hanya ada satu objek koneksi PDO aktif selama runtime.</li>
                        </ul>
                    </div>
                </div>
            </section>

            <!-- MANDIRI TAB -->
            <section id="mandiri-tab" class="tab-pane">
                <div class="section-card">
                    <div class="section-header mandiri">
                        <h2>Kelompok Mahasiswa Jalur Mandiri</h2>
                        <span class="badge mandiri-badge"><?php echo $countMandiri; ?> Mahasiswa</span>
                    </div>
                    <div class="table-responsive">
                        <table class="table-custom">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th>NIM</th>
                                    <th>Nama Lengkap</th>
                                    <th class="text-center">Semester</th>
                                    <th>Nama Wali</th>
                                    <th class="text-center">Golongan UKT</th>
                                    <th class="text-right">UKT Dasar</th>
                                    <th class="text-right">Biaya Ops Flat</th>
                                    <th class="text-right">Wajib Bayar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($dataMandiri)): ?>
                                    <tr>
                                        <td colspan="9" class="empty-row">Tidak ada data mahasiswa mandiri di database.</td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($dataMandiri as $mhs): ?>
                                        <?php $total = $mhs->getTarifUktNominal() + 100000; ?>
                                        <tr>
                                            <td class="text-center"><?php echo $mhs->getIdMahasiswa(); ?></td>
                                            <td><code><?php echo htmlspecialchars($mhs->getNim()); ?></code></td>
                                            <td class="font-bold"><?php echo htmlspecialchars($mhs->getNamaMahasiswa()); ?></td>
                                            <td class="text-center"><span class="semester-tag"><?php echo $mhs->getSemester(); ?></span></td>
                                            <td><?php echo htmlspecialchars($mhs->getNamaWali()); ?></td>
                                            <td class="text-center"><span class="ukt-badge"><?php echo htmlspecialchars($mhs->getGolonganUkt()); ?></span></td>
                                            <td class="text-right">Rp <?php echo number_format($mhs->getTarifUktNominal(), 0, ',', '.'); ?></td>
                                            <td class="text-right">Rp 100.000</td>
                                            <td class="text-right font-bold text-mandiri">Rp <?php echo number_format($total, 0, ',', '.'); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <!-- BIDIKMISI TAB -->
            <section id="bidikmisi-tab" class="tab-pane">
                <div class="section-card">
                    <div class="section-header bidikmisi">
                        <h2>Kelompok Mahasiswa Jalur Bidikmisi / KIP-Kuliah</h2>
                        <span class="badge bidikmisi-badge"><?php echo $countBidikmisi; ?> Mahasiswa</span>
                    </div>
                    <div class="table-responsive">
                        <table class="table-custom">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th>NIM</th>
                                    <th>Nama Lengkap</th>
                                    <th class="text-center">Semester</th>
                                    <th>Nomor KIP Kuliah</th>
                                    <th class="text-right">Dana Saku / bln</th>
                                    <th class="text-center">Status Biaya</th>
                                    <th class="text-right">Wajib Bayar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($dataBidikmisi)): ?>
                                    <tr>
                                        <td colspan="8" class="empty-row">Tidak ada data mahasiswa bidikmisi di database.</td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($dataBidikmisi as $mhs): ?>
                                        <tr>
                                            <td class="text-center"><?php echo $mhs->getIdMahasiswa(); ?></td>
                                            <td><code><?php echo htmlspecialchars($mhs->getNim()); ?></code></td>
                                            <td class="font-bold"><?php echo htmlspecialchars($mhs->getNamaMahasiswa()); ?></td>
                                            <td class="text-center"><span class="semester-tag"><?php echo $mhs->getSemester(); ?></span></td>
                                            <td><span class="kip-tag"><?php echo htmlspecialchars($mhs->getNomorKipKuliah()); ?></span></td>
                                            <td class="text-right text-success font-bold">Rp <?php echo number_format($mhs->getDanaSakuSubsidi(), 0, ',', '.'); ?></td>
                                            <td class="text-center"><span class="status-free">Subsidi Negara</span></td>
                                            <td class="text-right font-bold text-free">Rp 0 (Gratis)</td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <!-- PRESTASI TAB -->
            <section id="prestasi-tab" class="tab-pane">
                <div class="section-card">
                    <div class="section-header prestasi">
                        <h2>Kelompok Mahasiswa Jalur Prestasi</h2>
                        <span class="badge prestasi-badge"><?php echo $countPrestasi; ?> Mahasiswa</span>
                    </div>
                    <div class="table-responsive">
                        <table class="table-custom">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th>NIM</th>
                                    <th>Nama Lengkap</th>
                                    <th class="text-center">Semester</th>
                                    <th>Instansi Beasiswa</th>
                                    <th class="text-center">Minimal IPK Syarat</th>
                                    <th class="text-right">UKT Asli</th>
                                    <th class="text-center">Diskon Beasiswa</th>
                                    <th class="text-right">Wajib Bayar (25%)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($dataPrestasi)): ?>
                                    <tr>
                                        <td colspan="9" class="empty-row">Tidak ada data mahasiswa prestasi di database.</td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($dataPrestasi as $mhs): ?>
                                        <?php $wajibBayar = $mhs->getTarifUktNominal() * 0.25; ?>
                                        <tr>
                                            <td class="text-center"><?php echo $mhs->getIdMahasiswa(); ?></td>
                                            <td><code><?php echo htmlspecialchars($mhs->getNim()); ?></code></td>
                                            <td class="font-bold"><?php echo htmlspecialchars($mhs->getNamaMahasiswa()); ?></td>
                                            <td class="text-center"><span class="semester-tag"><?php echo $mhs->getSemester(); ?></span></td>
                                            <td><?php echo htmlspecialchars($mhs->getNamaInstitusiBeasiswa()); ?></td>
                                            <td class="text-center"><span class="ipk-badge"><?php echo number_format($mhs->getMinimalIpkSyarat(), 2); ?></span></td>
                                            <td class="text-right">Rp <?php echo number_format($mhs->getTarifUktNominal(), 0, ',', '.'); ?></td>
                                            <td class="text-center"><span class="discount-badge">75%</span></td>
                                            <td class="text-right font-bold text-prestasi">Rp <?php echo number_format($wajibBayar, 0, ',', '.'); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

        </div>
    </main>
</div>

<!-- Tab Navigation Script -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const menuItems = document.querySelectorAll(".menu-item");
        const tabPanes = document.querySelectorAll(".tab-pane");

        // Helper function to switch tabs
        function switchTab(tabName) {
            const targetTabId = tabName + "-tab";
            const targetTab = document.getElementById(targetTabId);
            const targetMenu = document.querySelector(`[data-tab="${tabName}"]`);
            
            if (targetTab && targetMenu) {
                menuItems.forEach(item => item.classList.remove("active"));
                tabPanes.forEach(pane => pane.classList.remove("active"));
                
                targetMenu.classList.add("active");
                targetTab.classList.add("active");
            }
        }

        // Check hash on load
        const hash = window.location.hash;
        if (hash) {
            switchTab(hash.replace("#", ""));
        }

        // Add event listeners to sidebar menu items
        menuItems.forEach(item => {
            item.addEventListener("click", function(e) {
                e.preventDefault();
                const tabName = this.getAttribute("data-tab");
                switchTab(tabName);
                history.pushState(null, null, "#" + tabName);
            });
        });
    });
</script>
</body>
</html>