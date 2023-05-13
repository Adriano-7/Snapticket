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
    header('Location: ../../pages/error_page.php');
    die();
}

$title = htmlspecialchars($_POST['title']);
$department = htmlspecialchars($_POST['departments']  ?? '');
$hashtag = htmlspecialchars($_POST['hashtags']  ?? '');
$priority = htmlspecialchars($_POST['priority']  ?? '');
$assignee = htmlspecialchars($_POST['assignee']  ?? '');
$ticket_id = htmlspecialchars($_POST['ticket_id']  ?? '');

if($title == ''){
    header('Location: ../../pages/createTicket.php?error=emptyTitle');
    die();
}

/*
if(!preg_match('/^[0-9]+$/', $ticket_id) || !preg_match('/^[0-9,]*$/', $department) || !preg_match('/^(Low|Medium|High)$/', $priority) || !preg_match('/^[0-9]*$/', $assignee)){
    var_dump($title, $department, $hashtag, $priority, $assignee);
    var_dump(preg_match('/^[0-9,]*$/', $department), preg_match('/^(Low|Medium|High)$/', $priority), preg_match('/^[0-9]*$/', $assignee));
    die();
    
    header('Location: ../../pages/error_page.php');
    die();
    
}
*/

if($department != ''){
    $department = explode(',', $department);
}
else{
    $department = [];
}

if($hashtag != ''){
    $hashtag = explode(',', $hashtag);
    foreach($hashtag as $tag){
        if(!Hashtag::hashtagExists($db, $tag)){
            Hashtag::createHashtag($db, $tag);
        }
    }
}
else{
    $hashtag = [];
}

$ticket = Ticket::getTicket($db, intval($ticket_id));
$ticket->alterTicket($db, $title, $department, $priority, intval($assignee), $hashtag);

header('Location: ../../pages/ticket.php?ticket_id=' . $ticket_id);
?>
