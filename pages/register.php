<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../templates/common.tpl.php');
  require_once(__DIR__ . '/../templates/register.tpl.php');

  createHead('Register', ['register'], ['reg_password_errors']);
  drawLogo();
  drawIntroductionText();
  drawRegisterForm();
?>
