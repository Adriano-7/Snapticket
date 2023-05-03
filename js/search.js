const search = document.querySelector('#search_bar');

if (search) {
  search.addEventListener('input', async function() {
    clearTickets();
    const response = await fetch('../api/api_tickets.php?search=' + this.value);
    const tickets = await response.json();

    const tbody = document.querySelector('tbody');
    tbody.innerHTML = '';

    tickets.forEach(ticket => {
        const ticketRow = createRow(ticket);
        tbody.appendChild(ticketRow);
    });
  });
}

function createRow(ticket) {
  const row = document.createElement('tr');
  row.addEventListener('click', function() {
    window.location.href = 'ticket.php?ticket_id=' + ticket.ticket_id;
  });

  const idCell = createIdCell(ticket);
  const assigneeCell = createAssigneeCell(ticket);
  const descriptionCell = createDescriptionCell(ticket);

  row.appendChild(idCell);
  row.appendChild(assigneeCell);
  row.appendChild(descriptionCell);

  return row;
}

function createIdCell(ticket) {
  const idCell = document.createElement('td');
  idCell.classList.add('tickets_id');
  const ticketIdText = document.createTextNode(ticket.ticket_id);
  idCell.appendChild(ticketIdText);

  if (ticket.status.toLowerCase() === 'open') {
    const openStatus = createStatus('tickets_status_open');
    idCell.appendChild(openStatus);
  } else if (ticket.status.toLowerCase() === 'assigned') {
    const assignedStatus = createStatus('tickets_status_assigned');
    idCell.appendChild(assignedStatus);
  } else if (ticket.status.toLowerCase() === 'closed') {
    const closedStatus = createStatus('tickets_status_closed');
    idCell.appendChild(closedStatus);
  }

  return idCell;
}

function createStatus(statusClass) {
  const status = document.createElement('span');
  status.classList.add(statusClass);
  status.appendChild(document.createTextNode('•'));
  return status;
}

function createAssigneeCell(ticket) {
  const assigneeCell = document.createElement('td');
  assigneeCell.classList.add('tickets_assignee');
  assigneeCell.appendChild(document.createTextNode(ticket.assignee === null ? '' : ticket.assignee.username));
  return assigneeCell;
}

function createDescriptionCell(ticket) {
  const descriptionCell = document.createElement('td');
  descriptionCell.classList.add('tickets_description');

  const title = createTitle(ticket.ticket_name);
  let departmentText = '';
  ticket.departments.forEach(department => {
    departmentText += department.name_department + ' ';
  });

  console.log(departmentText);

  const details = createDetails(departmentText, ticket.creator.username);

  descriptionCell.appendChild(title);
  descriptionCell.appendChild(details);

  return descriptionCell;
}

function createTitle(titleText) {
  const title = document.createElement('div');
  title.classList.add('tickets_description_title');
  title.appendChild(document.createTextNode(titleText));
  return title;
}

function createDetails(departmentText, clientText) {
  const descriptionDetails = document.createElement('div');
  descriptionDetails.classList.add('tickets_description_details');

  const department = createDepartment(departmentText);
  const client = createClient(clientText);

  descriptionDetails.appendChild(department);
  descriptionDetails.appendChild(client);

  return descriptionDetails;
}

function createDepartment(departmentText) {
  const department = document.createElement('div');
  department.classList.add('tickets_description_department');
  department.appendChild(document.createTextNode(departmentText));
  return department;
}

function createClient(clientText) {
  const client = document.createElement('div');
  client.classList.add('tickets_description_client');
  client.appendChild(document.createTextNode(clientText));
  return client;
}

function clearTickets() {
  const rows = document.querySelectorAll('tbody tr');
  rows.forEach(ticketRow => {
    ticketRow.remove();
  });
}