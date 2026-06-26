<?php

class KoneksiDB {
    private static string $host = "127.0.0.1";// sesuaikan dengan laragonnya (saya pakai mariadb linux)
    private static string $db_name = "db_uas_pbo_trpl1a_tatagwilldanbaihaqy";
    private static string $username = "Baihaqy"; // Sesuaikan dengan username MySQL Anda
    private static string $password = "1023";     // Sesuaikan dengan password MySQL Anda
    private static ?PDO $koneksi = null;

    /**
     * Metode Statis untuk mendapatkan koneksi (Singleton Pattern)
     */
    public static function getKoneksi(): PDO {
        if (self::$koneksi === null) {
            try {
                $dsn = "mysql:host=" . self::$host . ";dbname=" . self::$db_name . ";charset=utf8mb4";
                
                // Membuat instance PDO
                self::$koneksi = new PDO($dsn, self::$username, self::$password);
                
                // Mengatur error mode ke Exception untuk mempermudah debugging
                self::$koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            } catch (PDOException $e) {
                die("Koneksi Database Gagal: " . $e->getMessage());
            }
        }
        return self::$koneksi;
    }
}