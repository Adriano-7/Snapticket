<?php
declare(strict_types=1);
require_once(__DIR__ . '/../database/php_classes/department.class.php');
function drawSearchFilters(array $departments, $roles)
{ ?>
    <main>
        <div class="search">
            <input type="text" placeholder="Search..." id="search_bar">
            <select name="dept" class="add_filter" id="dept_select">
                <option value="">Department</option>
                <?php foreach ($departments as $department) { ?>
                    <option value="<?php echo $department->name ?>"><?php echo $department->name ?></option>
                <?php } ?>
            </select>
            <select name="role" class="add_filter" id="role_select">
                <option value="">User Role</option>
                <?php foreach ($roles as $role) { ?>
                    <option value="f<?php echo $role ?>"><?php echo $role ?></option>
                <?php } ?>
            </select>
        </div>
    <?php } ?>

    <?php function drawMembersTable(PDO $db, array $members)
    { ?>
        <table class="members_table">
            <thead>
                <tr>
                    <td>Name <img src="../assets/sort.svg" id="name_sort" alt="Sort by name"></td>
                    <td>Username <img src="../assets/sort.svg" id="username_sort" alt="Sort by username"></td>
                    <td>Role <img src="../assets/sort.svg" id="role_sort" alt="Sort by role"></td>
                    <td>Department <img src="../assets/sort.svg" id="department_sort" alt="Sort by department"> </td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($members as $member) { ?>
                    <tr>
                        <td class="member_name">
                            <?php $member->displayProfilePhoto("table_profile_pic") ?>
                            <div class="user_details">
                                <?php echo $member->name; ?>
                                <a href="mailto:<?php echo $member->email ?>"><?php echo $member->email ?></a>
                            </div>
                        </td>
                        <td class="member_username">
                            <?php echo $member->username; ?>
                        </td>
                        <td class="member_role">
                            <?php if ($member->isAdmin)
                                echo "Admin";
                            elseif ($member->isAgent)
                                echo "Agent";
                            else
                                echo "User"; ?>
                        </td>
                        <td class="member_department">
                            <?php foreach ($member->departments as $department)
                                echo $department . "<br>"; ?>
                        </td>
                        <td class="member_action">
                            <a href="edit_member.php">
                                <img src="../assets/edit-icon.svg" class="action_icons" alt="Edit member">
                            </a>
                            <a href="delete_member.php">
                                <img src="../assets/delete-icon.svg" class="action_icons" alt="Delete member">
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>
    </body>

    </html>
<?php } ?>