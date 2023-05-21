<?php function drawNotifications($db, $notifications){ ?>
<main>
    <div id="notification_container">
    <?php foreach($notifications as $notification){ ?>
        <div class="notification">
            <a class="notification_details" href="../actions/notification/notification_redirect.action.php?notification_id=<?php echo $notification->notification_id ?>">
                <?php if(!$notification->isVisited){ ?><div class="notification_unread"></div><?php } ?>
                <?php $notification->sender->displayProfilePhoto("notification_profile_pic") ?>
                <span class="notification_name"> <?php echo $notification->sender->name ?> </span>
                <span class="notification_text"> <?php echo $notification->content ?> </span>
                <div class="notification_final">
                <span class="notification_time"> <?php echo Notification::getNiceDate($notification) ?> </span>
                <a class="notification_delete" href="../actions/notification/eliminate_notification.action.php?notification_id=<?php echo $notification->notification_id ?>"> <img src="../assets/icons/cross-icon.svg" alt="Remove notification"> </a>
            </div>
            </a>
        </div>
    <?php } ?>
    </div>
</main>
</body>
</html>
<?php } ?>