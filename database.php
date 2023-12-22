<?php
class DB {
    private $con = null;

    private function connect() {
        $config = $this->loadConfigs();

        $this->con = new mysqli(
            $config['host'],
            $config['user'],
            $config['password'],
            $config['database'],
            $config['port']
        );

        if ($this->con->connect_error) {
            die("Failed to connect: " . $this->con->connect_error);
        }
    }

    private function loadConfigs() {
        $configFile = __DIR__ . '/config.json'; // Path to file config.json
        if (!file_exists($configFile)) {
            die("Configuration file not found.");
        }

        $configJson = file_get_contents($configFile);
        $config = json_decode($configJson, true);

        if (json_last_error() != JSON_ERROR_NONE) {
            die("Error decoding the JSON configuration file.");
        }

        return $config;
    }

    public function getCon() {
        if ($this->con == null) {
            $this->connect();
        }
        return $this->con;
    }
}
?>
