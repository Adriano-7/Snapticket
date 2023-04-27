<?php
declare(strict_types=1);

require_once(__DIR__ . '/../templates/common.tpl.php');
require_once(__DIR__ . '/../templates/register.tpl.php');
require_once(__DIR__ . '/../database/connection.db.php');

$session = new Session();

createHead('Register', ['register'], ['register-check']);
drawLogo();
drawIntroductionText();
drawRegisterForm($session->getDuplicateUsername());
?>