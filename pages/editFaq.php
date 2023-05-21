<?php
declare(strict_types=1);

require_once(__DIR__ . '/../utils/session.php');
require_once(__DIR__ . '/../database/connection.db.php');

require_once(__DIR__ . '/../templates/common.tpl.php');
require_once(__DIR__ . '/../templates/form.tpl.php');

require_once(__DIR__ . '/../database/php_classes/faq.class.php');
require_once(__DIR__ . '/../database/php_classes/client.class.php');

$db = connectToDatabase();
$session = new Session();
$client = Client::getClient($db, $session->getUserId(), null);

if (!$session->isLoggedIn()) {
  header('Location: login.php');
  die();
}

if (!isset($_POST['faq_id']) || !$client->isAgent) {
    header('Location: ../../pages/error_page.php');
    die();
}

if($_SESSION['csrf'] !== $_POST['csrf']){
  header('Location: ../../pages/error_page.php?error=unhautorized');
  die();
}

$faq_id = htmlentities($_POST['faq_id']);

if (!preg_match('/^[0-9]+$/', $faq_id)) {
    header('Location: ../../pages/error_page.php');
    die();
}

$questions = FAQ::getQuestions($db, intval($faq_id));

createHead("Editing FAQ", ['style','form', 'editFaq'], ['editFaq']);
drawMenu($db, $client);
drawEditFaqForm($questions, $faq_id);
?>