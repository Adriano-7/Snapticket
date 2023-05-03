<?php function drawSearchFilters()
{ ?>
    <main class="main_content">
        <div class="search">
            <input type="text" placeholder="Search..." id="search_bar">
            <button type="submit" class="add_filter">Department</button>
            <button type="submit" class="add_filter">User Role</button>
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
                            <img src="/../actions/display_profile_pic.action.php?username=<?php echo $member->username ?>"
                                alt="Profile image" class="table_profile_pic" />

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
                                echo $department; ?>
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