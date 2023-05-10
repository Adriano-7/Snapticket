<?php
declare(strict_types=1);
require_once(__DIR__ . '/../database/php_classes/ticket.class.php');
require_once(__DIR__ . '/../database/php_classes/comment.class.php');
?>

<?php
function drawTitle(Ticket $ticket, PDO $db){?>
<main class="main_content">
    <div class="ticket-header">
        <h1 class="ticket-title">
            <?php echo $ticket->ticket_name; ?>
        </h1>
        <div class="ticket-info">
            <p>
                <?php foreach ($ticket->departments as $department) {
                    echo $department['name'] . " ";
                } ?> •
                <?php echo $ticket->creator->name; ?> •
                <?php echo $ticket->date; ?> •
                <?php echo $ticket->ticket_id; ?>
            </p>
            <p>Assignees:
                <?php echo $ticket->assignee->name; ?>
            </p>
        </div>
    </div>
<?php } ?>

<?php
function drawComments(Ticket $ticket, PDO $db){
foreach ($ticket->comments as $comment) {
    ?>
    <div class="comment">
        <div class="comment-header">
            <?php $comment->client->displayProfilePhoto("comment-profile-pic") ?>
            <p class="comment-author">
                <?php echo $comment->client->name; ?>
            </p>
            <p class="comment-date">
                <?php echo $comment->date; ?>
            </p>
        </div>
        <p class="comment-text">
            <?php echo $comment->content; ?>
        </p>
    </div>
    <?php
}
?>
</main>
</body>
</html>
<?php }?>