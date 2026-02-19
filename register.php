<?php
header("Content-Type: application/json");

function bad($msg, $code=400){
  http_response_code($code);
  echo json_encode(["ok"=>false, "error"=>$msg]);
  exit;
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") bad("POST only", 405);

$name  = trim($_POST["name"] ?? "");
$email = trim($_POST["email"] ?? "");

if ($name === "" || mb_strlen($name) > 120) bad("Invalid name");
if (!filter_var($email, FILTER_VALIDATE_EMAIL) || mb_strlen($email) > 254) bad("Invalid email");

$dbDir  = "/var/www/db";
$dbPath = $dbDir . "/visitors.sqlite";

try {
  if (!is_dir($dbDir)) {
    // try to create the db dir (works only if permissions allow)
    @mkdir($dbDir, 0750, true);
  }

  $db = new PDO("sqlite:" . $dbPath);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $db->exec("CREATE TABLE IF NOT EXISTS visitors (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    email TEXT NOT NULL,
    created_at TEXT NOT NULL DEFAULT (datetime('now'))
  );");

  $stmt = $db->prepare("INSERT INTO visitors(name, email) VALUES(:name, :email)");
  $stmt->execute([":name"=>$name, ":email"=>strtolower($email)]);

  echo json_encode(["ok"=>true]);
} catch (Exception $e) {
  bad("Server error: " . $e->getMessage(), 500);
}
