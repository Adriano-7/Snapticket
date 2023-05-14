<?php function drawTicketForm($departments, $hashtags, $agents, $error){ ?>
    <main>
        <form action="../actions/ticket/create_ticket.action.php" method="post">
            <div class="container">
                <h1>Ticket Name</h1>
                <div class="border"></div>
                <textarea id="name_textarea" placeholder="Name" name="title" <?php if ($error) {echo 'class="error_box"';} ?>></textarea>
            </div>
            <div class="container">
                <h1>Department</h1>
                <div class="border"></div>
                <div class="options_row" onmousedown="scrollHorizontally(event)">
                    <?php foreach ($departments as $department) { ?>
                        <button class="option" type="button" onclick="select(this)"
                            value="<?=$department->department_id?>"><?=$department->name?></button>
                    <?php } ?>
                    <button id="create_dept" class="option" type="button"
                        onclick="window.location.href='../actions/department/create_department.action.php'"> Create +
                    </button> </button>
                </div>
            </div>
            <div class="container">
                <h1>Hashtag</h1>
                <div class="border"></div>
                <div class="options_row" onmousedown="scrollHorizontally(event)">
                <?php foreach ($hashtags as $hashtag) { ?>
                <button class="option" type="button" onclick="select(this)"><?=$hashtag->name?></button>
                <?php } ?>
                <div id="create_hastag" class="option" contenteditable="true"> Create </div>
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
        </form>
    </main>
    </body>

</html>
<?php } ?>

<?php function drawDepartmentForm($clients, $error){ ?>
    <main>
        <form action="../actions/department/create_department.action.php" method="post" enctype="multipart/form-data">
            <div class="container" >
                <h1>Department Name</h1>
                <div class="border"></div>
                <textarea id="name_textarea" placeholder="Name" name="title" <?php if ($error) {echo 'class="error_box"';} ?>></textarea>
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
                    <?php foreach($clients as $client){ ?>
                        <button class="option" type="button" onclick="select(this)" value="<?=$client->user_id?>"><?=$client->username?></button>
                    <?php } ?>
                </div>
            </div>
            </div>
            <button id="submit_button" type="button" onclick="submitDepartmentForm()">Create</button>
        </form>
    </main>
    </body>

    </html>
<?php } ?>