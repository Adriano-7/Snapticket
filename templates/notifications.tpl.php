<?php function drawNotifications($notifications){ ?>
<main class="main_content">
    <div id="notification_container">
    <?php foreach($notifications as $notification){ ?>
        <a href="../actions/action_mark_notification_as_read.php?notification_id=<?php echo $notification->notification_id ?>" class="notification">
            <img src="../actions/display_profile_pic.action.php?username=<?php echo $notification->sender->username ?>" alt="Profile image" />
            <span class="notification_name"> <?php echo $notification->sender->name ?> </span>
            <span class="notification_text"> <?php echo $notification->content ?> </span>
            <span class="notification_time"> <?php echo date('d M Y', strtotime($notification->date)) ?> </span>
        </a>
    <?php } ?>
    </div>
</main>
</body>

</html>
<?php } ?>