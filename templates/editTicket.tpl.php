<?php function drawForm($departments, $hashtags, $agents, $error, Ticket $ticket){ ?>
    <main>
        <form action="../actions/ticket/edit_ticket.action.php" method="post">
            <div class="container">
                <h1>Ticket Name</h1>
                <div class="border"></div>
                <textarea id="name_textarea" name="title" <?php if($error){echo 'class="error_box"';}?>><?php echo $ticket->ticket_name ?></textarea>
            </div>
            <div class="container">
                <h1>Department</h1>
                <div class="border"></div>
                <div class="options_row">
                <?php foreach($departments as $department) { ?>
                    <?php $isSelected = in_array($department->name, array_column($ticket->departments, 'name')) ?>
                    <button class="option <?php echo $isSelected ? 'selected' : '' ?>" type="button" onclick="select(this)" value="<?php echo $department->department_id ?>"><?php echo $department->name ?></button>
                <?php } ?>
                    <button id="create_dept" class="option" type="button" onclick="window.location.href='../actions/department/create_department.action.php'"> Create + </button> </button>
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
                    <div id="create_hastag" class="option" contenteditable="true"> Create </div>
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
                    <option value="<?php echo $agent->user_id ?>" <?php if($agent->user_id===$ticket->assignee->user_id){echo 'selected';} ?>><?php echo $agent->username ?></option>
                    <?php } ?>
                </select>
            </div>
            <button id="submit_button" type="button" onclick="submitForm()">Save</button>
            <input type="hidden" name="ticket_id" value="<?php echo $ticket->ticket_id ?>">
        </form>
    </main>
</body>
</html>
<?php } ?>