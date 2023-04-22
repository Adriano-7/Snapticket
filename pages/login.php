<?php
  declare(strict_types = 1);

  require_once(__DIR__ . '/../templates/login.tpl.php');
  require_once(__DIR__ . '/../templates/common.tpl.php');

  createHead('Login', ['login']);
  drawImages();
  drawLeftText();
  drawRightText();
  drawLoginForm();
?>
