<?php function drawSearchBar() { ?>
  <main class="main_content">
      <div class="tickets_search">
        <input type="text" placeholder="Search..." class="input_box">
        <button type="submit" class="input_box">Add Filter</button>
        <button type="submit" class="create_ticket">Create Ticket</button>
      </div>
<?php } ?>
<?php function drawTicketsTable(array $tickets, PDO $db) { ?>
    <table class="tickets_table">
        <tr class="tickets_header">
          <td>ID</td>
          <td>Assignee</td>
          <td>Description</td>
        </tr>
      <?php foreach ($tickets as $ticket) { ?>
        <tr class="ticket_row" onclick="window.location.href='ticket.php?id=<?php echo $ticket->getId(); ?>'">
          <td class="tickets_id">
          <div style="display: flex; align-items: center;">
            <?php echo $ticket->getId(); ?>
            <?php if (strtolower($ticket->getStatus()) === 'open') { ?>
              <span class="tickets_status_open">•</span>
            <?php } else if (strtolower($ticket->getStatus()) === 'assigned') { ?>
              <span class="tickets_status_assigned">•</span>
            <?php } else if (strtolower($ticket->getStatus()) === 'closed') { ?>
              <span class="tickets_status_closed">•</span>
            <?php } ?>
          </td>
          </div>
          <td class="tickets_assignee"><?php echo $ticket->getAssignee(); ?></td>
          <td class="tickets_description">
            <div class="tickets_description_title"><?php echo $ticket->getTitle(); ?></div>
            <div class="tickets_description_details">
              <div class="tickets_description_department"><?php echo $ticket->getDepartment($db); ?></div>
              <div class="tickets_description_client"><?php echo $ticket->getClientName(); ?></div>
            </div>
          </td>
        </tr>
      <?php } ?>
    </table>
    </body>
  </html>
<?php } ?>
