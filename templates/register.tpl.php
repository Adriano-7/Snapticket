<?php 
  declare(strict_types = 1); 
  require_once(__DIR__ . '/../utils/session.php');
?>

<?php function drawLogo() { ?>
    <body>
    <header>
        <img src="../assets/logo.png" alt="SnapTicket logo" height="65">
    </header>
<?php } ?>

<?php function drawIntroductionText() { ?>
    <div class="register_container">
    <h1>You're a step closer</h1>
<?php } ?>

<?php function drawRegisterForm() { ?>
    <form action="../actions/register.action.php" method="post">
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
<?php } ?>
