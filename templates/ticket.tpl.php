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
                <?php if ($client->isAgent) { ?>
                    <a href="../pages/editTicket.php?ticket_id=<?php echo $ticket->ticket_id; ?>"><img src="../assets/icons/edit-icon.svg" id="ticket-edit-button" alt="Edit ticket"></a>
                    <a href="../actions/ticket/removeTicket.action.php?ticket_id=<?php echo  $ticket->ticket_id;?>" class="confirm-action">
                        <img src="../assets/icons/delete-icon.svg" id="ticket-delete-button" alt="Delete ticket" >
                    </a>
                <?php } ?>
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
            <div id="history-button" onclick="showHistory()">Show History</div>
            <div id="history" style="display: none;">
                <?php foreach($ticket->history as $history_row){ ?>
                    <div class="history-row">
                        <?php $history_row->user->displayProfilePhoto("") ?>
                        <span class="history-creator"><?php echo $history_row->user->name?></span>
                        <span class="history-text"><?php echo $history_row->content; echo $history_row->getNiceDate() ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php if ($client->isAgent) { ?>
        <form action="../actions/ticket/changeStatus.action.php" id="status-form" method="post">
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

<?php function drawTextContainer($ticket){  ?>
            <form action = "../actions/ticket/submitComment.action.php" id="comment-container" method="post">
                <input type="hidden" name="ticket_id" value="<?php echo $ticket->ticket_id; ?>">
                <div class="comment-bar">
                    <textarea class="comment-textarea" placeholder="Your reply" name="comment" required></textarea>
                    <button id="faq-button">FAQ</button>
                    <button id="attachment-button"><img src=../assets/icons/attachment-icon.svg alt="Attach Files"></button>
                </div>
                <div id="send-button-container">
                    <button id="send-button">Send</button>
                </div>
            </form>
    </main>
</body>

</html>
<?php } ?>