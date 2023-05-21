<?php function drawTicketForm($departments, $hashtags, $agents, $error){ ?>
    <main>
        <form action="../actions/ticket/createTicket.action.php" method="post">
            <div class="container">
                <h1>Ticket Name</h1>
                <div class="border"></div>
                <textarea id="name_textarea" placeholder="Name" name="title" <?php if ($error) {echo 'class="error_box"';} ?> required></textarea>
            </div>
            <div class="container">
                <h1>Department</h1>
                <div class="border"></div>
                <div class="options_row" onmousedown="scrollHorizontally(event)">
                    <?php foreach ($departments as $department) { ?>
                        <button class="option" type="button" onclick="select(this)"
                            value="<?=$department->department_id?>"><?=$department->name?></button>
                    <?php } ?>
                    <button class="create_btn option" type="button"
                        onclick="window.location.href='../pages/createDepartment.php'"> Create +
                    </button>
                </div>
            </div>
            <div class="container">
                <h1>Hashtag</h1>
                <div class="border"></div>
                <div class="options_row" onmousedown="scrollHorizontally(event)">
                <?php foreach ($hashtags as $hashtag) { ?>
                <button class="option" type="button" onclick="select(this)"><?=$hashtag->name?></button>
                <?php } ?>
                <button class="create_btn option" type="button" onclick="window.location.href='../pages/editHashtag.php'"> Create +</button> 
                </div>
            </div>
            <div class="container">
                <h1>Priority</h1>
                <div class="border"></div>
                <select class="select" name="priority">
                    <option value="Low">Low</option>
                    <option value="Medium">Medium</option>
                    <option value="High">High</option>
                </select>
            </div>
            <div class="container">
                <h1>Assignee</h1>
                <div class="border"></div>
                <select class="select" name="assignee">
                    <option value="">Assignee</option>
                    <?php foreach ($agents as $agent) { ?>
                        <option value="<?=$agent->user_id?>"><?=$agent->username?></option>
                    <?php } ?>
                </select>
            </div>
            <button id="submit_button" type="button" onclick="submitTicketForm()">Create</button>
            <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
        </form>
    </main>
    </body>

</html>
<?php } ?>

<?php function drawEditTicketForm($departments, $hashtags, $agents, $error, Ticket $ticket){ ?>
    <main>
        <form action="../actions/ticket/editTicket.action.php" method="post">
            <div class="container">
                <h1>Ticket Name</h1>
                <div class="border"></div>
                <textarea id="name_textarea" name="title" <?php if($error){echo 'class="error_box"';}?> required><?=$ticket->ticket_name?></textarea>
            </div>
            <div class="container">
                <h1>Department</h1>
                <div class="border"></div>
                <div class="options_row">
                <?php foreach($departments as $department) { ?>
                    <?php $isSelected = in_array($department->name, array_column($ticket->departments, 'name')) ?>
                    <button class="option <?php echo $isSelected ? 'selected' : '' ?>" type="button" onclick="select(this)" value="<?=$department->department_id ?>"><?=$department->name?></button>
                <?php } ?>
                    <button class="create_btn option" type="button" onclick="window.location.href='../pages/createDepartment.php'"> Create + </button> </button>
                </div>
            </div>
            <div class="container">
                <h1>Hashtag</h1>
                <div class="border"></div>
                <div class="options_row">
                <?php foreach($hashtags as $hashtag) { ?>
                    <?php $isSelected = in_array($hashtag->name, array_column($ticket->hashtags, 'name')) ?>
                    <button class="option <?php echo $isSelected ? 'selected' : '' ?>" type="button" onclick="select(this)" value="<?php echo $hashtag->name ?>"><?php echo $hashtag->name ?></button>
                <?php } ?>
                <button class="create_btn option" type="button" onclick="window.location.href='../pages/editHashtag.php'"> Create +</button> 
                </div>
            </div>
            <div class="container">
                <h1>Priority</h1>
                <div class="border"></div>
                <select class="select" name="priority">
                    <option value="">Priority</option>
                    <option value="Low" <?php if($ticket->priority==="Low"){echo 'selected';} ?>>Low</option>
                    <option value="Medium" <?php if($ticket->priority==="Medium"){echo 'selected';} ?>>Medium</option>
                    <option value="High" <?php if($ticket->priority==="High"){echo 'selected';} ?>>High</option>
                </select>
            </div>
            <div class="container">
                <h1>Assignee</h1>
                <div class="border"></div>
                <select class="select" name="assignee">
                    <option value="">Assignee</option>
                    <?php foreach($agents as $agent) { ?>
                    <option value="<?php echo $agent->user_id ?>" <?php if($ticket->assignee !== NULL && $agent->user_id===$ticket->assignee->user_id){echo 'selected';} ?>><?php echo $agent->username ?></option>
                    <?php } ?>
                </select>
            </div>
            <button id="submit_button" type="button" onclick="submitTicketForm()">Save</button>
            <input type="hidden" name="ticket_id" value="<?php echo $ticket->ticket_id ?>">
            <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
        </form>
    </main>
</body>
</html>
<?php } ?>


<?php function drawDepartmentForm($clients, $error){ ?>
    <main>
        <form action="../actions/department/createDepartment.action.php" method="post" enctype="multipart/form-data">
            <div class="container" >
                <h1>Department Name</h1>
                <div class="border"></div>
                <textarea id="name_textarea" required placeholder="Name" name="title" <?php if ($error) {echo 'class="error_box"';} ?> ></textarea>
            </div>
            <div class="container">
                <h1>Icon</h1>
                <div class="border"></div>
                <input type="file" id="file-input" name="image" accept="image/*" style="display:none" required>
                <button id="upload-btn" class="option" onclick="submitDeptIcon()">Submit Image</button>
            </div>
            <div class="container">
                <h1>Members</h1>
                <div class="border"></div>
                <div class="options_row" onmousedown="scrollHorizontally(event)">
                    <?php foreach($clients as $client){ ?>
                        <button class="option" type="button" onclick="select(this)" value="<?=$client->user_id?>"><?=$client->username?></button>
                    <?php } ?>
                </div>
            </div>
            </div>
            <button id="submit_button" type="button" onclick="submitDepartmentForm()">Create</button>
            <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
        </form>
    </main>
    </body>

    </html>
<?php } ?>


<?php function drawEditDepartmentForm(Department $department, array $allClients){ ?>
    <main>
        <form action="../actions/department/editDepartment.action.php" method="post" enctype="multipart/form-data">
            <div class="container" >
                <h1>Department Name</h1>
                <div class="border"></div>
                <textarea id="name_textarea" name="title" required><?=$department->name?></textarea>
            </div>
            <div class="container">
                <h1>Icon</h1>
                <div class="border"></div>
                <input type="file" id="file-input" name="image" accept="image/*" style="display:none">
                <button id="upload-btn" class="option" onclick="submitDeptIcon()">Submit Image</button>
            </div>
            <div class="container">
                <h1>Members</h1>
                <div class="border"></div>
                <div class="options_row" onmousedown="scrollHorizontally(event)">
                    <?php foreach($allClients as $client){ ?>
                        <?php $isMember = in_array($client->user_id, array_column($department->members, 'user_id')) ?>
                        <button class="option <?php echo $isMember ? 'selected' : '' ?>" type="button" onclick="select(this)" value="<?=$client->user_id?>"><?=$client->username?></button>
                    <?php } ?>
                </div>
            </div>
            </div>
            <input type="hidden" name="department_id" value="<?=$department->department_id?>">
            <button id="submit_button" type="button" onclick="submitDepartmentForm()">Create</button>
            <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
        </form>
    </main>
    </body>

    </html>
<?php } ?>

<?php function drawEditFaqForm($questions, $faq_id){ ?>
    <main>
        <form action="../actions/faq/editFaq.action.php" method="post">
            <?php foreach($questions as $question) { ?>
            <div class="container">
                <h1>Question <?php echo $question->num ?></h1>
                <div class="border"></div>
                <textarea class="textarea" name="Q[]" required><?php echo $question->title ?></textarea>
                <textarea class="textarea" name="A[]" rows="3" required><?php echo $question->content ?></textarea>
            </div>
            <?php } ?>
            <div class="container">
                <h1></h1>
                <div class="border"></div>
                <button id="add_button" type="button" onclick="addQuestion()">Add Question</button>
            </div>
            <button id="submit_button" type="submit">Save</button>
            <input type="hidden" name="faq_id" value="<?php echo $faq_id?>">
            <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
        </form>
    </main>
</body>
</html>
<?php } ?>

<?php function drawHashtagsForm($hashtags){ ?>
    <main>
        <form action="../actions/hashtags/editHashtag.action.php" method="post">
            <?php $i = 0; foreach($hashtags as $hashtag){ ?>
            <div class="container">
                <h1></h1>
                <a href="../actions/hashtags/removeHashtag.action.php?hashtag_name=<?php echo $hashtag->name?>" class="delete-hashtag">Delete Hashtag</a>
                <div class="border"></div>
                <textarea class="textarea" name="H[]" required><?php echo $hashtag->name ?></textarea>
            </div>
            <?php $i++; } ?>
            <div class="container">
                <h1></h1>
                <div class="border"></div>
                <button id="add_button" type="button" onclick="addHashtag()">Add Hashtag</button>
            </div>
            <button id="submit_button" type="submit">Save</button>"
            <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
        </form>
    </main>
</body>
</html>
<?php } ?>


<?php function drawEditPasswordForm(){ ?>
    <main>
        <?php if(isset($_GET['error']) && htmlentities($_GET['error']) == 'wrong_password') { ?>
                <p style="text-align: center; padding-top: 1em; color: #9d2219;">Wrong password</p>
            <?php } ?>
        <form action="../actions/profile/editPassword.action.php" method="post">
            <div class="container">
                <h1>Old Password</h1>
                <div class="border"></div>
                <input type="password" name="old_password" required>
            </div>
            <div class="container">
                <h1>New Password</h1>
                <div class="border"></div>
                <input type="password" name="new_password" required>
            </div>
            <button id="submit_button" type="button" onclick="submitChangePassword()">Save</button>
            <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
        </form>
    </main>
<?php } ?>

