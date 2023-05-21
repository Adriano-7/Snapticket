<?php
declare(strict_types=1);

require_once(__DIR__ . '/../../utils/session.php');
$session = new Session();

require_once(__DIR__ . '/../../database/connection.db.php');

require_once(__DIR__ . '/../../database/php_classes/ticket.class.php');
require_once(__DIR__ . '/../../database/php_classes/comment.class.php');
require_once(__DIR__ . '/../../database/php_classes/client.class.php');
require_once(__DIR__ . '/../../database/php_classes/hashtag.class.php');

$db = connectToDatabase();
$client = Client::getClient($db, $session->getUserId(), NULL);

if (!isset($_POST['title'])) {
    header('Location: ../../pages/errorPage.php?error=missing_data');
    die();
}

if($_SESSION['csrf'] !== $_POST['csrf']){
    header('Location: ../../pages/errorPage.php?error=unhautorized');
    die();
}

$title = htmlspecialchars($_POST['title']);
$department = htmlspecialchars($_POST['departments']  ?? '');
$hashtag = htmlspecialchars($_POST['hashtags']  ?? '');
$priority = htmlspecialchars($_POST['priority']  ?? '');
$assignee = htmlspecialchars($_POST['assignee']  ?? '');

if(!preg_match('/^[0-9,]*$/', $department) || !preg_match('/^(Low|Medium|High|)$/', $priority) || !preg_match('/^[0-9]*$/', $assignee)){
    header('Location: ../../pages/errorPage.php?error=invalid_data');
    die();
}

$department = $department != '' ? explode(',', $department) : [];
$hashtags = $hashtag != '' ? explode(',', $hashtag) : [];

$ticket_id = Ticket::createTicket($db, $title, $client->user_id, $department, $priority, intval($assignee), $hashtags);
header('Location: ../../pages/ticket.php?ticket_id=' . $ticket_id);
?>
