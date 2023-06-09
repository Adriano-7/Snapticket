<?php function drawSearchBar($departments, $status, $assignee, $hashtags)
{ ?>
  <main>
    <div id="tickets_search">
      <input type="text" placeholder="Search..." id="search_bar">
      <button onclick="showFilters()" id="show_filter"><img src="../assets/icons/filters-icon.svg" alt="Filter the results"></button>
      <button onclick="window.location.href='../pages/createTicket.php'" id="create_ticket">Create Ticket</button>
    </div>
    <div id="filter_row" style="display: none;">
        <select name="dept" class="add_filter" id="dept_select">
          <option value="">Department</option>
          <?php foreach ($departments as $department) { ?>
            <option value="<?= $department ?>"><?= $department ?></option>
          <?php } ?>
        </select>
        <select name="status" class="add_filter" id="status_select">
          <option value="">Status</option>
          <?php foreach ($status as $stat) { ?>
            <option value="<?= $stat ?>"><?= $stat ?></option>
          <?php } ?>
        </select>
        <select name="status" class="add_filter" id="assignee_select">
          <option value="">Assignee</option>
          <?php foreach ($assignee as $assign) { ?>
            <option value="<?= $assign ?>"><?= $assign ?></option>
          <?php } ?>
        </select>
        <select name="status" class="add_filter" id="hashtag_select">
          <option value="">Hashtag</option>
          <?php foreach ($hashtags as $hashtag) { ?>
            <option value="<?= $hashtag ?>"><?= $hashtag ?></option>
          <?php } ?>
        </select>
    </div>
  <?php } ?>

  <?php function drawTicketsTable(array $tickets, PDO $db)
  { ?>
    <table class="tickets_table">
      <thead>
        <tr>
          <td>ID <img src="../assets/icons/sort.svg" id="id_sort" alt="Sort by id"></td>
          <td>Assignee <img src="../assets/icons/sort.svg" id="assignee_sort" alt="Sort by assignee"></td>
          <td>Description <img src="../assets/icons/sort.svg" id="description_sort" alt="Sort by description"></td>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($tickets as $ticket) { ?>
          <tr onclick="window.location.href='ticket.php?ticket_id=<?=$ticket->ticket_id?>'">
            <td class="tickets_id"><?=$ticket->ticket_id?>
                <?php if (strtolower($ticket->status) === 'open') { ?>
                  <span class="tickets_status_open">•</span>
                <?php } else if (strtolower($ticket->status) === 'assigned') { ?>
                    <span class="tickets_status_assigned">•</span>
                <?php } else if (strtolower($ticket->status) === 'closed') { ?>
                      <span class="tickets_status_closed">•</span>
                <?php } ?>
            </td>
            <td class="tickets_assignee">
              <?php if ($ticket->assignee === null) {echo '';} 
              else {echo $ticket->assignee->username;} ?>
            </td>
            <td class="tickets_description">
              <div class="tickets_description_title">
                <?=$ticket->ticket_name?>
              </div>
              <div class="tickets_description_details">
                <div class="ticket_description_priority"><?=$ticket->priority  . " Priority • "?></div>
                <div class="tickets_description_department">
                  <?php foreach ($ticket->departments as $department) { ?>
                    <?= $department['name']  . " • "?>
                  <?php } ?>
                </div>
                <div class="tickets_description_client">
                  <?=$ticket->creator->username?>
                </div>
              </div>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </main>
  </body>

  </html>
<?php } ?>