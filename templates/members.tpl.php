<?php
declare(strict_types=1);
require_once(__DIR__ . '/../database/php_classes/department.class.php');
function drawSearchFilters(array $departments, $roles)
{ ?>
    <main class="main_content">
        <div class="search">
            <input type="text" placeholder="Search..." id="search_bar">
            <button type="submit" class="add_filter">
                <select name="dept" id="dept_select">
                    <option value="">Department</option>
                    <?php foreach ($departments as $department) { ?>
                        <option value="<?php echo $department->name ?>"><?php echo $department->name ?></option>
                    <?php } ?>
                </select>
            </button>
            <button type="submit" class="add_filter">
                <select name="role" id="role_select">
                    <option value="">User Role</option>
                    <?php foreach ($roles as $role) { ?>
                        <option value="<?php echo $role ?>"><?php echo $role ?></option>
                    <?php } ?>
                </select>
            </button>
        </div>
    <?php } ?>

    <?php function drawMembersTable(array $members)
    { ?>
        <table class="members_table">
            <thead>
                <td>Name</td>
                <td>Username</td>
                <td>Role</td>
                <td>Department</td>
                <td>Action</td>
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
                                <img src="../assets/edit-icon.svg" alt="Edit" class="action_icons" />
                            </a>
                            <a href="delete_member.php">
                                <img src="../assets/delete-icon.svg" alt="Delete" class="action_icons" />
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