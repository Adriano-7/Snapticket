<?php function drawUserInfo(PDO $db, Client $client){ ?>
<main>
    <div class="user-info">
        <div class="profile-pic">
            <?php $client->displayProfilePhoto("") ?>
        </div>
        <div class="user-details">
            <h2>
                <?php echo $client->name ?>
            </h2>
            <h3>
                <?php echo $client->username ?>
            </h3>
        </div>
    </div>
<?php } ?>

<?php function drawUserForms(Client $client){
    drawEditName($client);
    drawEditUsername($client);
    drawEditEmail($client);
    drawEditPassword();
}
?>

<?php function drawEditName(Client $client){ ?>
    <div class="edit-forms">
        <div class="edit-form">
            <form action="../actions/edit_name.action.php" method="post">
                <input type="text" name="name" value="<?php echo $client->name ?>">
                <button type="submit" class="edit-icon"><img src="../assets/edit-icon.svg" alt="edit-button"></button>
            </form>
        </div>
    <?php } ?>
    
<?php function drawEditUsername(Client $client){ ?>
    <div class="edit-form">
        <form action="../actions/edit_username.action.php" method="post">
            <input type="text" name="username" value=<?php echo $client->username ?>>
            <button type="submit" class="edit-icon"><img src="../assets/edit-icon.svg" alt="edit-button"></button>
        </form>
    </div>
<?php } ?>

<?php function drawEditEmail(Client $client){ ?>
    <div class="edit-form">
        <form action="../actions/edit_email.action.php" method="post">
            <input type="email" name="email" value=<?php echo $client->email ?>>
            <button type="submit" class="edit-icon"><img src="../assets/edit-icon.svg" alt="edit-button"></button>
        </form>
    </div>
<?php } ?>

<?php function drawEditPassword(){ ?>
    <div class="edit-form">
        <form action="../actions/edit_password.action.php" method="post">
            <input type="password" name="password" placeholder="**********">
            <button type="submit" class="edit-icon"><img src="../assets/edit-icon.svg" alt="edit-button"></button>
        </form>
    </div>
</div>
<?php } ?>

<?php function drawChangeProfilePic(){ ?>
    <div class="change-profile-pic">
        <form action="../actions/edit_profile_photo.php" method="post" enctype="multipart/form-data">
            <input type="file" id="file-input" name="image" style="display:none">
            <label for="file-input" id="file-label">Change profile image</label>
            <button id="upload-btn">Upload</button>
        </form>
    </div>
<?php } ?>

<?php function drawLogOut(){ ?>
    <div class="logout">
        <form action="../actions/logout.action.php" method="post">
            <button type="submit">Log Out</button>
        </form>
    </div>
</main>
</body>
</html>
<?php } ?>