<?php require_once(__DIR__ . '/../database/php_classes/ticket.class.php');
    require_once(__DIR__ . '/../database/php_classes/comment.class.php');

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

function drawTitle(Ticket $ticket, PDO $db) { ?>
    <main class="main_content">
    <div class="ticket-header">
        <h1 class="ticket-title"> <?php echo $ticket->getTitle(); ?> </h1>
        <div class="ticket-info">
            <p><?php echo $ticket->getDepartment($db);?> • <?php echo $ticket->getClientName(); ?> • <?php echo $ticket->getDate(); ?> • <?php echo $ticket->getId(); ?></p>
            <p>Assignees: <?php echo $ticket->getAssignee(); ?> </p>
        </div>
    </div>
    <?php
}

function drawComments(Ticket $ticket, PDO $db) {
    $comments = getCommentsFromTicket($db, $ticket->getId());
    //print comments log
    var_dump($comments);
    foreach($comments as $comment) {
        drawComment($comment);
    }
}

function drawComment(Comment $comment) { ?>
    <div class="comment">
        <div class="comment-header">
            <img src="../assets/profile_pics_examples/sarah_johnson.jpg" alt="Profile image" class="comment-profile-pic" />
            <p class="comment-author"> <?php echo $comment->getClientName(); ?> </p>
            <p class="comment-date"> <?php echo $comment->getDate(); ?> </p>
        </div>
        <p class="comment-text"> <?php echo $comment->getContent(); ?> </p>
    </div>
    <?php
}



