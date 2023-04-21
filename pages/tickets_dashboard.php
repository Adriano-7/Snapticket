<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>SnapTicket - Dashboard</title>  
    <link rel="icon" href="../assets/favicon.png">
    <link href="../css/style.css" rel="stylesheet">
  </head>
  <body>
    <header class="menu">
        <input type="checkbox" id="menu-toggle" />
        <label for="menu-toggle" class="menu-icon"></label>
        <img src="../assets/logo.png" alt="SnapTicket Logo" class="logo" />
        <nav>
          <a href="tickets_dashboard.php" class="tickets-menu">Tickets</a>
          <a href="faq.php" class="faq-menu">Faq</a>
          <a href="notifications.php" class="notifications-menu">Notifications</a>
        </nav>
        <div class="profile">
          <img src="../assets/profile_temp.jpg" alt="Profile image" />
          <span class="profile_name">Andrew Peterson</span>
        </div>      
    </header>
    <main class="main_content">
      <div class="tickets_search">
        <input type="text" placeholder="Search..." class="input_box">
        <button type="submit" class="input_box">Add Filter</button>
        <button type="submit" class="create_ticket">Create Ticket</button>
      </div>
      <table class="tickets_table">
        <thead class="tickets_table_header">
          <tr>
            <th>ID</th>
            <th>Assignee</th>
            <th>Description</th>
          </tr>
        </thead>
        <tbody>
          <tr class="tickets_row">
            <td class="tickets_id">AC540</td>
            <td class="tickets_assignee">JamesDavis</td>
            <td class="tickets_description">
              <div class="tickets_description_title">Need access to financial reports</div>
              <div class="tickets_description_details">
                <div class="tickets_description_department">Accounting</div>
                <div class="tickets_description_client">Andrew Peterson</div>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
  </body>
</html>