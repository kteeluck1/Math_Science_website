
<?php
require __DIR__ . '/auth.php';
require_login();
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Learning Page | 3MedTech</title>
  <style>
    :root{
      --bg:#ffffff;
      --text:#0f172a;
      --muted:#64748b;
      --line:#e5e7eb;
      --soft:#f8fafc;
      --shadow: 0 10px 30px rgba(2,8,23,.08);
      --radius:18px;
    }
    *{box-sizing:border-box}
    body{
      margin:0;
      font-family: system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
      color:var(--text);
      background:var(--soft);
      min-height:100vh;
    }
    header{
      border-bottom:1px solid var(--line);
      background:#fff;
    }
    .nav{
      max-width:1120px;
      margin:0 auto;
      padding:14px 18px;
      display:flex;
      align-items:center;
      justify-content:space-between;
      gap:14px;
    }
    .brand{
      display:flex;
      align-items:center;
      gap:10px;
      text-decoration:none;
      color:var(--text);
      font-weight:900;
    }
    .logo{
      width:32px;height:32px;border-radius:10px;
      background: linear-gradient(135deg,#38bdf8,#2563eb);
      box-shadow:var(--shadow);
    }
    .actions a{
      text-decoration:none;
      font-weight:700;
      color:var(--text);
      padding:8px 12px;
      border-radius:999px;
      border:1px solid var(--line);
      background:#fff;
    }
    main{
      max-width:1120px;
      margin:0 auto;
      padding:26px 18px 32px;
    }
    .card{
      background:#fff;
      border-radius:var(--radius);
      border:1px solid var(--line);
      box-shadow:var(--shadow);
      padding:22px 22px 20px;
    }
    h1{
      margin:0 0 6px;
      font-size:24px;
    }
    p.sub{
      margin:0 0 18px;
      color:var(--muted);
      font-weight:600;
    }
  </style>
</head>
<body>
  <header>
    <div class="nav">
      <a class="brand" href="index.html">
        <div class="logo" aria-hidden="true"></div>
        <div>3MedTech</div>
      </a>
      <div class="actions">
        <a href="index.html">Home</a>
        <a href="logout.php">Log out</a>
      </div>
    </div>
  </header>

  <main>
    <div class="card">
      <h1>Learning Page</h1>
      <p class="sub">You are logged in and can now access this page.</p>
      <p>Put your learning resources, links, and content here.</p>
    </div>
  </main>
</body>
</html>
