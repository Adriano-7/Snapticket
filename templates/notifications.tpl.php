<?php function drawNotifications($db, $notifications){ ?>
<main class="main_content">
    <div id="notification_container">
    <?php foreach($notifications as $notification){ ?>
        <div class="notification">
            <a class="notification_details" href="../actions/notification_redirect.action.php?notification_id=<?php echo $notification->notification_id ?>">
                <?php if(!$notification->isVisited){ ?><div class="notification_unread"></div><?php } ?>
                <?php $notification->sender->displayProfilePhoto($db, "notification_profile_pic") ?>
                <span class="notification_name"> <?php echo $notification->sender->name ?> </span>
                <span class="notification_text"> <?php echo $notification->content ?> </span>
                <span class="notification_time"> <?php echo Notification::getNiceDate($notification) ?> </span>
            </a>
            <a class="notification_delete" href="../actions/eliminate_notification.action.php?notification_id=<?php echo $notification->notification_id ?>"> <img src="../assets/cross-icon.svg" alt="Remove notification"> </a>
        </div>
    <?php } ?>
    </div>
</main>
</body>
</html>
<?php } ?>