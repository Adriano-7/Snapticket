<?php
declare(strict_types=1);

require_once(__DIR__ . '/../../utils/session.php');
$session = new Session();

require_once(__DIR__ . '/../../database/connection.db.php');
require_once(__DIR__ . '/../../database/php_classes/faq.class.php');
require_once(__DIR__ . '/../../database/php_classes/question.class.php');
require_once(__DIR__ . '/../../database/php_classes/client.class.php');

$db = connectToDatabase();
$client = Client::getClient($db, $session->getUserId(), NULL);

if(!$client->isAgent || $_SESSION['csrf'] !== $_POST['csrf']){
    header('Location: ../../pages/errorPage.php?error=unauthorized');
    die();
}

if (!isset($_POST['Q']) || !isset($_POST['A']) || !isset($_POST['faq_id'])) {
    header('Location: ../../pages/errorPage.php?error=missing_data');
    die();
}

$faq_id = htmlentities($_POST['faq_id']);
if(preg_match('/^[0-9]+$/', $faq_id) === 0){
    header('Location: ../../pages/errorPage.php?error=invalid_data');
    die();
}

$questions = array();
$answers = array();

foreach ($_POST['Q'] as $question) {
    array_push($questions, htmlentities($question));
}

foreach ($_POST['A'] as $answer) {
    array_push($answers, htmlentities($answer));
}

Faq::editFaq($db, intval($faq_id), $questions, $answers);
header('Location: ../../pages/faq.php?faq_id=' . $faq_id);
?>