<?php
declare(strict_types=1);
require_once(__DIR__ . '/../utils/session.php');
require_once(__DIR__ . '/../database/php_classes/department.class.php');
?>

<?php function drawCreateDept(){ ?>
<main>
    <div class="create_department">
        <a href="../pages/createDepartment.php">
            <img src="../assets/plus-icon.svg" alt="Create Department">
            <span>Create Department</span>
        </a>
    </div>
<?php } ?>

<?php function drawCards($departments){ ?>
    <?php foreach ($departments as $department) { ?>
        <div class="department_card" onclick="window.location.href = '../pages/members.php?department=<?=$department->department_id?>'">
                <a href="../pages/edit_department.php?department=<?=$department->department_id?>">
                    <img src="../assets/three-dots-vertical.svg" alt="More Options" class="more_options">
                </a>
            <a href="../pages/members.php?department=<?=$department->department_id?>" class="card_anchor">
                <div class="department_name">
                    <span><?=$department->name?></span>
                    <?php $department->displayIcon('department_icon'); ?>
                </div>
                <div class="members">
                    <span><?=count($department->members)?> Members</span>
                    <div class="members_photos">
                        <?php if (count($department->members) > 6) { ?>
                            <?php for ($i = 0; $i < 6; $i++) { ?>
                                <?php $department->members[$i]->displayProfilePhoto('member_photo'); ?>
                            <?php } ?>
                            <span class="more_members">+<?=count($department->members) - 6?></span>
                        <?php } 
                        else { ?>
                            <?php foreach ($department->members as $member) { ?>
                                <?=$member->displayProfilePhoto('member_photo');?>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </a>
        </div>
    <?php } ?>
</main>
</body>
</html>
<?php } ?>