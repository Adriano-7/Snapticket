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
    drawEditPassword();
    drawEditEmail($client);
}
?>

<?php function drawEditName(Client $client){ ?>
    <div class="edit-forms">
        <div class="edit-form">
            <form action="../actions/profile/editName.action.php" method="post">
                <input type="text" name="name" value="<?php echo $client->name ?>" readonly required>
                <button type="submit" class="edit-icon" onclick="toggleEditForm(this)"><img src="../assets/icons/edit-icon.svg"alt="edit-button"></button>
                <input type="hidden" name="user_id" value="<?php echo $client->user_id ?>">
                <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
            </form>
        </div>
    <?php } ?>
    
<?php function drawEditUsername(Client $client){ ?>
    <div class="edit-form">
        <form action="../actions/profile/editUsername.action.php" method="post">
            <input type="text" name="username" value=<?php echo $client->username ?> readonly required>
            <button type="submit" class="edit-icon" onclick="toggleEditForm(this)"><img src="../assets/icons/edit-icon.svg"alt="edit-button"></button>
            <input type="hidden" name="user_id" value="<?php echo $client->user_id ?>">
            <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
        </form>
    </div>
<?php } ?>

<?php function drawEditEmail(Client $client){ ?>
    <div class="edit-form">
        <form action="../actions/profile/editEmail.action.php" method="post">
            <input type="email" name="email" value=<?php echo $client->email ?> readonly required>
            <button type="submit" class="edit-icon" onclick="toggleEditForm(this)"><img src="../assets/icons/edit-icon.svg"alt="edit-button"></button>
            <input type="hidden" name="user_id" value="<?php echo $client->user_id ?>">
            <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
        </form>
    </div>
</div>
<?php } ?>

<?php function drawEditPassword(){ ?>
    <div class="edit-form">
        <span id="password-placeholder">**********</span>
        <button class="edit-icon" onclick="window.location.href='editPassword.php'"><img src="../assets/icons/edit-icon.svg"alt="edit-button"></button>
    </div>
<?php } ?>

<?php function drawChangeProfilePic($client){ ?>
    <div class="change-profile-pic">
        <form action="../actions/profile/editProfilePhoto.php" method="post" enctype="multipart/form-data">
            <input type="file" id="file-input" name="image" style="display:none">
            <label for="file-input" id="file-label">Change profile image</label>
            <button id="upload-btn">Upload</button>
            <input type="hidden" name="user_id" value="<?php echo $client->user_id ?>">
            <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
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

<?php function drawRole(Client $client){ ?>
    <div class="edit-form">
        <form action="../actions/profile/changeRole.action.php" id="role-form" method="post">
            <select class="client-role" name="role" onchange="changeRole()">
                <option value="Client" <?php if (!$client->isAdmin && !$client->isAgent) echo "selected"; ?>>Client</option>
                <option value="Agent" <?php if ($client->isAgent && !$client->isAdmin) echo "selected"; ?>>Agent</option>
                <option value="Admin" <?php if ($client->isAdmin) echo "selected"; ?>>Admin</option>
            </select>
            <input type="hidden" name="id" value="<?php echo $client->user_id ?>">
            <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
        </form>
    </div>
<?php } ?>