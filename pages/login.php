<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>SnapTicket</title>    
    <link rel="icon" href="../assets/favicon.png">
    <link href="../css/login.css" rel="stylesheet">
  </head>
  <body>
    <div class="login_container">
      <div class="left">
        <header>
          <img src="../assets/logo.png" alt="SnapTicket logo" height="65">
          <img src="../assets/introductory_image.png" alt="Introductory image" height="339">
        </header>
        <h1>Get ahead of support requests and <br>manage tickets with ease using our platform.</h1>
      </div>
      <div class="right">
        <h1>Welcome back!</h1>
        <h2>Improve your productivity with our ticket management solution!</h2>
        <form action="../actions/login.action.php" method="post">
          <input type="text" name="username" placeholder="username">
          <br>
          <input type="password" name="password" placeholder="password">
          <button type="submit">Login</button>
          <p>Don't you have an account? <a href="register.php">Sign Up</a></p>
        </form>
      </div>
    </div>
  </body>
</html>
