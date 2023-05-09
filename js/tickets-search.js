const search = document.querySelector('#search_bar');
const dept = document.querySelector('#dept_select');
const status_ = document.querySelector('#status_select');
const assignee = document.querySelector('#assignee_select');
const hashtag = document.querySelector('#hashtag_select');

const idSort = document.querySelector('#id_sort');
const assigneeSort = document.querySelector('#assignee_sort');
const descriptionSort = document.querySelector('#description_sort');

let idSortValue = '';
let assigneeSortValue = '';
let descriptionSortValue = '';

function updateMembers() {
    fetch(`../api/api_tickets.php?search=${search.value}&dept=${dept.value}&status=${status_.value}&priority=&assignee=${assignee.value}&hashtag=${hashtag.value}&orderId=${idSortValue}&orderAssignee=${assigneeSortValue}&orderDescription=${descriptionSortValue}`)
        .then(response => response.json())
        .then(data => {
            clearTickets();
            const tbody = document.querySelector('tbody');
            tbody.innerHTML = '';
            data.forEach(member => {
                const row = createRow(member);
                tbody.appendChild(row);
            });
        });
}

if(search) {
    search.addEventListener('input', updateMembers);
    dept.addEventListener('change', updateMembers);
    status_.addEventListener('change', updateMembers);
    assignee.addEventListener('change', updateMembers);
    hashtag.addEventListener('change', updateMembers);
}

function toggleSortValue(sortValue, sortIcon) {
    if (sortValue === "") {
      sortValue = "ASC";
      sortIcon.src = "../assets/sort-up.svg";
    } else if (sortValue === "ASC") {
      sortValue = "DESC";
      sortIcon.src = "../assets/sort-down.svg";
    } else {
      sortValue = "";
      sortIcon.src = "../assets/sort.svg";
    }
    
    return sortValue;
}  

if(idSort) {
    idSort.addEventListener('click', () => {
        idSortValue = toggleSortValue(idSortValue, idSort);
        updateMembers();}
    );
}

if(assigneeSort) {
    assigneeSort.addEventListener('click', () => {
        assigneeSortValue = toggleSortValue(assigneeSortValue, assigneeSort);
        updateMembers();}
    );
}

if(descriptionSort) {
    descriptionSort.addEventListener('click', () => {
        descriptionSortValue = toggleSortValue(descriptionSortValue, descriptionSort);
        updateMembers();}
    );
}

function clearTickets() {
    const rows = document.querySelectorAll('tbody tr');
    rows.forEach(ticketRow => {ticketRow.remove();});
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