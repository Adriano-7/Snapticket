
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
        <tr>
          <td class="tickets_id"><?php echo $ticket->getId(); ?></td>
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
