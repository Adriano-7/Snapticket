<?php
declare(strict_types=1);
require_once(__DIR__ . '/../utils/session.php');
require_once(__DIR__ . '/../database/php_classes/department.class.php');
?>

<?php function drawCreateDept(){ ?>
<main>
    <div class="create_department">
        <a href="../pages/createDepartment.php">
            <img src="../assets/icons/plus-icon.svg" alt="Create Department">
            <span>Create Department</span>
        </a>
    </div>
<?php } ?>

<?php function drawCards($departments){ ?>
    <?php foreach ($departments as $department) { ?>
        <div class="department_card" onclick="window.location.href = '../pages/members.php?department=<?=$department->department_id?>'">
            <div class="department_actions">
                <a href="../pages/editDepartment.php?department=<?=$department->department_id?>">
                    <img src="../assets/icons/edit-icon.svg" alt="Edit Department" style="width: 1em;">
                </a>
                <a href="../actions/department/remove_department.action.php?department=<?=$department->department_id?>" class="confirm-action">
                    <img src="../assets/icons/delete-icon.svg" alt="Delete Department" style="width: 1em;">
                </a>
            </div>
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