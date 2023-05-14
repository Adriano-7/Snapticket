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

if(!isset($_GET['faq_id'])) {
  header('Location: error_page.php');
  die();
}
$faq_id = htmlspecialchars($_GET['faq_id']);

if(!preg_match('/^[0-9]+$/', $faq_id)) {
  header('Location: error_page.php');
  die();
}

$faq_id = intval($faq_id);

if(!FAQ::exists($db, $faq_id)) {
  header('Location: error_page.php');
  die();
}

$departments = FAQ::getDepartments($db);
$questions = FAQ::getQuestions($db, $faq_id);

createHead('Notifications', ['style', 'faq'], ['faq']);
drawMenu($db, $client);
drawFAQHeader($faq_id, $departments, $client);
drawFAQ($questions);
?>