<?php function drawSearchBar(){ ?>
<main class="main_content">
  <div class="tickets_search">
    <input type="text" placeholder="Search..." id="search_bar">
    <button type="submit" class="add_filter">
      <select name="dept" id="dept_select">
        <option value="">Department</option>
        <option value="Accounting">Accounting</option>
        <option value="Legal">Legal</option>
        <option value="Human Resources">Human Resources</option>
        <option value="Sales">Sales</option>
      </select>
    </button>
    <button type="submit" class="add_filter">
      <select name="status" id="status_select">
        <option value="">Status</option>
        <option value="Open">Open</option>
        <option value="Assigned">Assigned</option>
        <option value="Closed">Closed</option>
      </select>
    </button>
    <button type="submit" class="add_filter">
      <select name="status" id="assignee_select">
        <option value="">Asssignee</option>
        <option value="Open">JMurphy</option>
        <option value="Assigned">APeterson12</option>
        <option value="Closed">JamesDavis</option>
      </select>
    </button>
    <button type="submit" class="add_filter">
      <select name="status" id="hashtag_select">
        <option value="">Hashtag</option>
      </select>
    </button>
    <button type="submit" class="create_ticket">Create Ticket</button>
  </div>
<?php } ?>

<?php function drawTicketsTable(array $tickets, PDO $db){ ?>
  <table class="tickets_table">
    <thead>
      <td>ID</td>
      <td>Assignee</td>
      <td>Description</td>
    </thead>
    <tbody>
      <?php foreach ($tickets as $ticket) { ?>
        <tr onclick="window.location.href='ticket.php?ticket_id=<?php echo $ticket->ticket_id; ?>'">
          <td class="tickets_id">
            <div style="display: flex; align-items: center;">
              <?php echo $ticket->ticket_id; ?>
              <?php if (strtolower($ticket->status) === 'open') { ?>
                <span class="tickets_status_open">•</span>
              <?php } else if (strtolower($ticket->status) === 'assigned') { ?>
                  <span class="tickets_status_assigned">•</span>
              <?php } else if (strtolower($ticket->status) === 'closed') { ?>
                    <span class="tickets_status_closed">•</span>
              <?php } ?>
          </td>
          </div>
          <td class="tickets_assignee">
            <?php if ($ticket->assignee === null) {
              echo '';
            } else {
              echo $ticket->assignee->username;
            } ?>
          </td>
          <td class="tickets_description">
            <div class="tickets_description_title">
              <?php echo $ticket->ticket_name; ?>
            </div>
            <div class="tickets_description_details">
              <div class="tickets_description_department">
                <?php foreach($ticket->departments as $department) { ?>
                  <?php echo $department['name_department']; ?>
                <?php } ?>
              </div>
              <div class="tickets_description_client">
                <?php echo $ticket->creator->name; ?>
              </div>
            </div>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
<?php } ?>
