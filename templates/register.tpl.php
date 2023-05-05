<?php
declare(strict_types=1);
require_once(__DIR__ . '/../utils/session.php');
?>

<?php function drawLogo(){ ?>
<body>
    <header>
        <img src="../assets/logo.png" alt="SnapTicket logo" height="65">
    </header>
<?php } ?>

<?php function drawIntroductionText(){ ?>
<div class="register_container">
    <h1>You're a step closer</h1>
<?php } ?>

<?php function drawRegisterForm($usernameExists){ ?>
<div class="error_box">
    <?php if ($usernameExists) { ?>
        <p class="error">Username already exists</p>
    <?php } ?>
</div>
<form action="../actions/register.action.php" method="post">
    <input type="text" name="name" placeholder="name" required>
    <input type="text" name="username" placeholder="username" required>
    <input type="text" name="email" placeholder="email" required>
    <input type="password" name="password" placeholder="password" required>
    <input type="password" name="confirm password" placeholder="confirm password" required>
    <button type="submit">Register</button>
</form>
<p>Already have an account? <a href="login.php">Login</a></p>
</div>
</body>
</html>
<?php } ?>