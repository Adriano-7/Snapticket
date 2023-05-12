<?php
declare(strict_types=1);
require_once(__DIR__ . '/../database/php_classes/ticket.class.php');
require_once(__DIR__ . '/../database/php_classes/comment.class.php');
?>

<?php function drawTitle(Ticket $ticket, PDO $db, Client $client){ ?>
<main>
    <div class="ticket-header">
        <div class="ticket-info">
            <h1 class="ticket-title">
                <?php echo $ticket->ticket_name; ?>
            </h1>
            <p>
                <?php foreach ($ticket->departments as $department) {echo $department['name'] . " ";} ?> ·
                <?php echo $ticket->creator->name; ?> ·
                <?php echo $ticket->getFormattedDate(); ?> ·
                <?php echo $ticket->ticket_id; ?>
            </p>
            <?php if ($ticket->assignee !== null) { ?>
            <p>Assignees:<?php echo $ticket->assignee->name; ?></p>
            <?php } ?>
            <div class="ticket-hashtag">
                <?php foreach ($ticket->hashtags as $tag) { ?>
                    <div class="hashtag">#
                        <?php echo $tag['name']; ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php if ($client->isAgent) { ?>
        <form action="../actions/ticket/change_status.action.php" id="status-form" method="post">
            <input type="hidden" name="ticket_id" value="<?php echo $ticket->ticket_id; ?>">
            <select class="ticket-status" name="status" onchange="changeStatus()" style="background-color: <?php if($ticket->status==="Open"){echo '#4a7155';} elseif($ticket->status==="Assigned"){echo '#c59c69';}elseif($ticket->status==="Closed"){echo '#994A4C';}?>">
                <option value="Open" <?php if ($ticket->status === "Open")
                    echo "selected"; ?>>Open</option>
                <option value="Assigned" <?php if ($ticket->status === "Assigned")
                    echo "selected"; ?>>Assigned</option>
                <option value="Closed" <?php if ($ticket->status === "Closed")
                    echo "selected"; ?>>Closed</option>
            </select>
        </form>
    <?php } else { ?>
        <div class="ticket-status" style="background-color: <?php if($ticket->status==="Open"){echo '#4a7155';} elseif($ticket->status==="Assigned"){echo '#c59c69';}elseif($ticket->status==="Closed"){echo '#994A4C';}?>">
            <?php echo $ticket->status; ?>
        </div>
    <?php } ?>
    </div>
<?php } ?>

<?php function drawComments(Ticket $ticket, PDO $db){  ?>
        <div class="comments">
        <?php foreach ($ticket->comments as $comment) { ?>
            <div class="comment">
                <div class="comment-header">
                    <?php $comment->sender->displayProfilePhoto("comment-profile-pic") ?>
                    <p class="comment-author"><?php echo $comment->sender->name; ?></p>
                    <p class="comment-date"><?php echo $comment->getformattedDate(); ?></p>
                </div>
                <p class="comment-text"><?php echo $comment->content; ?></p>
            </div>
            <?php
        } ?>
        </div>
<?php } ?>

<?php function drawTextContainer(){  ?>
            <div class="comment-container">
                <div class="comment-bar">
                    <textarea class="comment-textarea" placeholder="Your reply"></textarea>
                    <button class="faq-button">FAQ</button>
                    <button class="attachment-button"><img src=../assets/attachment-icon.svg alt="Attach Files"></button>
                </div>
                <div class="send-button-container">
                    <button class="send-button">Send</button>
                </div>
        </div>
    </main>
</body>

</html>
<?php } ?>