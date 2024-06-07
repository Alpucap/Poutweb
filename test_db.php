<?php
try {
    $pdo = new PDO('sqlite:C:/Users/HansC/Documents/Coding/PoutWeb/database/database.sqlite');
    $result = $pdo->query('SELECT name FROM sqlite_master WHERE type="table" AND name="sessions"');
    if ($result->fetch()) {
        echo "Table 'sessions' exists.";
    } else {
        echo "Table 'sessions' does not exist.";
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}