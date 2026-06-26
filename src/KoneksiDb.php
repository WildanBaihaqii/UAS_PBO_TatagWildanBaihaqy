<?php

class KoneksiDB {
    private static string $host = "127.0.0.1";
    private static string $db_name = "DB_UAS_TRPL1A_TatagWildanBaihaqy";
    private static string $username = "Baihaqy"; 
    private static string $password = "1023";     
    private static ?PDO $koneksi = null;

    /**
     * Metode Statis untuk mendapatkan koneksi PDO (Singleton Pattern)
     */
    public static function getKoneksi(): ?PDO {
        if (self::$koneksi === null) {
            try {
                $dsn = "mysql:host=" . self::$host . ";dbname=" . self::$db_name . ";charset=utf8mb4";
                self::$koneksi = new PDO($dsn, self::$username, self::$password);
                self::$koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "<div style='color: red; padding: 10px; border: 1px solid red; background: #fff5f5; margin: 10px 0;'>";
                echo "<strong>Koneksi Database Gagal:</strong> " . $e->getMessage() . "<br>";
                echo "</div>";
                return null;
            }
        }
        return self::$koneksi;
    }
}