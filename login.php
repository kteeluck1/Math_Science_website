<?php
session_start();

// Very simple single-account login.
// Change these to whatever credentials you want.
const VALID_USERNAME = 'student';
const VALID_PASSWORD = 'math123';

$error   = '';
$redirect = $_GET['redirect'] ?? 'learning.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $redirect = $_POST['redirect'] ?? $redirect;

    if ($username === VALID_USERNAME && $password === VALID_PASSWORD) {
        $_SESSION['user'] = $username;
        header('Location: ' . $redirect);
        exit;
    } else {
        $error = 'Invalid username or password.';
    }
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login | 3MedTech</title>
  <style>
    :root{
      --bg:#f1f5f9;
      --text:#0f172a;
      --muted:#64748b;
      --line:#e5e7eb;
      --blue:#2563eb;
      --shadow: 0 10px 30px rgba(2,8,23,.08);
      --radius:18px;
    }
    *{box-sizing:border-box}
    body{
      margin:0;
      font-family: system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
      color:var(--text);
      background:var(--bg);
      min-height:100vh;
      display:flex;
      align-items:center;
      justify-content:center;
      padding:20px;
    }
    .card{
      width:100%;
      max-width:400px;
      background:#fff;
      border-radius:var(--radius);
      border:1px solid var(--line);
      box-shadow:var(--shadow);
      padding:24px 22px 22px;
    }
    h1{
      margin:0 0 4px;
      font-size:24px;
    }
    p.sub{
      margin:0 0 18px;
      color:var(--muted);
      font-size:14px;
      font-weight:600;
    }
    label{
      display:block;
      font-size:13px;
      font-weight:800;
      margin-bottom:4px;
    }
    input[type="text"],
    input[type="password"]{
      width:100%;
      padding:10px 11px;
      border-radius:12px;
      border:1px solid var(--line);
      font-size:14px;
      outline:none;
    }
    input:focus{
      border-color:rgba(37,99,235,.6);
      box-shadow:0 0 0 3px rgba(37,99,235,.18);
    }
    button[type="submit"]{
      width:100%;
      margin-top:14px;
      padding:11px 12px;
      border-radius:999px;
      border:0;
      background:linear-gradient(135deg,#38bdf8,#2563eb);
      color:#fff;
      font-weight:800;
      cursor:pointer;
    }
    button[type="submit"]:hover{
      box-shadow:0 8px 20px rgba(15,23,42,.18);
    }
    .error{
      margin-top:10px;
      min-height:1.2em;
      color:#b91c1c;
      font-size:13px;
      font-weight:700;
    }
    .hint{
      margin-top:10px;
      color:var(--muted);
      font-size:12px;
    }
    a{
      color:var(--blue);
      text-decoration:none;
      font-weight:600;
    }
  </style>
</head>
<body>
  <div class="card">
    <h1>Log in</h1>
    <p class="sub">Access the Learning Page with your credentials.</p>

    <form method="post">
      <input type="hidden" name="redirect" value="<?php echo htmlspecialchars($redirect, ENT_QUOTES); ?>">

      <div style="margin-bottom:10px;">
        <label for="username">Username</label>
        <input id="username" name="username" type="text" autofocus required>
      </div>

      <div>
        <label for="password">Password</label>
        <input id="password" name="password" type="password" required>
      </div>

      <button type="submit">Log in</button>
    </form>

    <div class="error"><?php echo htmlspecialchars($error, ENT_QUOTES); ?></div>

    <div class="hint">
      Demo credentials: <strong>student</strong> / <strong>math123</strong>.<br>
      <a href="index.html">Back to home</a>
    </div>
  </div>
</body>
</html>
