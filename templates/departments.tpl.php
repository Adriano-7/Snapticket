<?php function drawCreateDept(){ ?>
<main>
    <div class="create_department">
        <a href="../actions/create_department.php">
            <img src="../assets/plus-icon.svg" alt="Create Department">
            <span>Create Department</span>
        </a>
    </div>
<?php } ?>

<?php function drawCards($departments){ ?>
    <?php foreach ($departments as $department) { ?>
        <div class="department_card">
            <a href="../pages/members.php?department=<?php echo $department->department_id; ?>">
                <img src="../assets/three-dots-vertical.svg" alt="More Options" class="more_options">
                <div class="department_name">
                    <span>
                        <?php echo $department->name; ?>
                    </span>
                    <?php $department->displayIcon('department_icon'); ?>
                </div>
                <div class="members">
                    <span>
                        <?php echo count($department->members); ?> Members
                    </span>
                    <div class="members_photos">
                        <?php if (count($department->members) > 5) { ?>
                            <?php for ($i = 0; $i < 5; $i++) { ?>
                                <?php $department->members[$i]->displayIcon('member_photo'); ?>
                            <?php } ?>
                            <span class="more_members">+
                                <?php echo count($department->members) - 5; ?>
                            </span>
                        <?php } else { ?>
                            <?php foreach ($department->members as $member) { ?>
                                <?php $member->displayIcon('member_photo'); ?>
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