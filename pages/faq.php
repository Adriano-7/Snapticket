<?php
declare(strict_types=1);

require_once(__DIR__ . '/../utils/session.php');
require_once(__DIR__ . '/../database/connection.db.php');

require_once(__DIR__ . '/../templates/common.tpl.php');
require_once(__DIR__ . '/../templates/faq.tpl.php');

require_once(__DIR__ . '/../database/php_classes/client.class.php');
require_once(__DIR__ . '/../database/php_classes/faq.class.php');

$db = connectToDatabase();
$session = new Session();
$client = Client::getClient($db, $session->getUserId(), null);

if (!$session->isLoggedIn()) {
  header('Location: login.php');
  die();
}

$department = isset($_GET['department']) ? intval($_GET['department']) : null;
$departments = FAQ::getDepartments($db);
$questions = FAQ::getQuestions($db, $department);


if(!FAQ::exists($db, $department)) {
  header('Location: error_page.php');
  die();
}


createHead('Notifications', ['style', 'faq'], ['faq']);
drawMenu($db, $client);
drawFAQHeader($department, $departments, $client);
drawFAQ($questions);
?>