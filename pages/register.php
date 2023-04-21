<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>SnapTicket</title>    
    <link rel="icon" href="../assets/favicon.png">
    <link href="../css/register.css" rel="stylesheet">
  </head>
  <body>
    
        <header>
            <img src="../assets/logo.png" alt="SnapTicket logo" height="65">
        </header>
        <div class="register_container">
        <h1>You're a step closer</h1>
        <form action="register.php" method="post">
            <input type="text" name="name" placeholder="name">
            <input type="password" name="username" placeholder="username">
            <input type="password" name="email" placeholder="email">
            <input type="text" name="password" placeholder="password">
            <input type="text" name="confirm password" placeholder="confirm password">
            <button type="submit">Register</button>
            <p>Already have an account? <a href="login.php">Login</a></p>
        </div>
  </body>
</html>