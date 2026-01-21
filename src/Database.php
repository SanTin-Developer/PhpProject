<?php
class Database {
    private static $pdo = null;

    public static function getConnect() {
        if (self::$pdo === null) {
            try {
                self::$pdo = new PDO(
                    "pgsql:host=ep-solitary-meadow-a1h6v1pb-pooler.ap-southeast-1.aws.neon.tech;port=5432;dbname=testBackend;sslmode=require;channel_binding=require",
                    "neondb_owner",
                    "npg_W6bl4hqdRQks",
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    ]
                );

            } catch (PDOException $e) {
                die("Database connection failed: " . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}
?>
