<?php function drawForm($departments, $hashtags, $agents, $empty){ ?>
    <main>
        <form action="../actions/ticket/create_ticket.action.php" method="post">
            <div class="container">
                <h1>Ticket Name</h1>
                <div class="border"></div>
                <textarea id="name_textarea" placeholder="Name" name="title" <?php if($empty){echo 'class="error_box"';}?>></textarea>
            </div>
            <div class="container">
                <h1>Department</h1>
                <div class="border"></div>
                <div class="options_row">
                    <?php foreach($departments as $department) { ?>
                    <button class="option" type="button" onclick="select(this)" value="<?php echo $department->department_id?>"><?php echo $department->name ?></button>
                    <?php } ?>
                    <button id="create_dept" class="option" type="button" onclick="window.location.href='../actions/createDepartment.php'"> Create + </button> </button>
                </div>
            </div>
            <div class="container">
                <h1>Hashtag</h1>
                <div class="border"></div>
                <div class="options_row">
                    <?php foreach($hashtags as $hashtag) { ?>
                    <button class="option" type="button" onclick="select(this)"><?php echo $hashtag->name ?></button>
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
                    <?php foreach($agents as $agent) { ?>
                    <option value="<?php echo $agent->user_id ?>"><?php echo $agent->username ?></option>
                    <?php } ?>
                </select>
            </div>
            <button id="submit_button" type="button" onclick="submitForm()">Create</button>
        </form>
    </main>
</body>
</html>
<?php } ?>