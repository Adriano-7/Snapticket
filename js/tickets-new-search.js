/*
<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>SnapTicket -
        Dashboard </title>
    <link rel="icon" href="../assets/favicon.png">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/dashboard.css" rel="stylesheet">
    <script src="../js/tickets-search.js" defer></script>
</head>

<body>
    <header class="menu">
        <div class="menu_header">
            <a href="../pages/dashboard.php">
                <img src="../assets/logo.png" alt="SnapTicket Logo" class="logo" />
            </a>
        </div>
        <nav>
            <a href="dashboard.php" style="color:#FFFFFF">
                <img src="../assets/menu_icons/dashboard-white-icon.svg" alt="Dashboard" class="menu-icon" />
                Dashboard
            </a>
            <a href="faq.php" style="color:#808080">
                <img src="../assets/menu_icons/faq-gray-icon.svg" alt="Faq" class="menu-icon" />
                FAQ
            </a>
            <a href="notifications.php" style="color:#808080">
                <img src="../assets/menu_icons/notifications-gray-icon.svg" alt="Notifications" class="menu-icon" />
                Notifications
            </a>
            <a href="members.php" style="color:#808080">
                <img src="../assets/menu_icons/members-gray-icon.svg" alt="Members" class="menu-icon" />
                Members
            </a>
            <a href="departments.php" style="color:#808080">
                <img src="../assets/menu_icons/departments-gray-icon.svg" alt="Departments" class="menu-icon" />
                Departments
            </a>
        </nav>
        <a href="profile.php" class="profile_link">
            <div class="profile">
                <img src="../actions/display_pic.action.php?id=11" alt="Profile Photo" class="profile-photo"> <span
                    class="profile_name">
                    Jessica Murphy </span>
            </div>
        </a>
    </header>
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
        <table class="tickets_table">
            <thead>
                <td>ID <img src="../assets/sort.svg" id="id_sort" /></td>
                <td>Assignee<img src="../assets/sort.svg" id="assignee_sort" /></td>
                <td>Description</td>
            </thead>
            <tbody>
                <tr onclick="window.location.href='ticket.php?ticket_id=1'">
                    <td class="tickets_id">
                        <div style="display: flex; align-items: center;">
                            1 <span class="tickets_status_assigned">•</span>
                    </td>
                    </div>
                    <td class="tickets_assignee">
                        CChen </td>
                    <td class="tickets_description">
                        <div class="tickets_description_title">
                            Issue with recording credit card transactions in accounting system </div>
                        <div class="tickets_description_details">
                            <div class="tickets_description_department">
                                Accounting </div>
                            <div class="tickets_description_client">
                                Andrew Peterson </div>
                        </div>
                    </td>
                </tr>
                <tr onclick="window.location.href='ticket.php?ticket_id=2'">
                    <td class="tickets_id">
                        <div style="display: flex; align-items: center;">
                            2 <span class="tickets_status_assigned">•</span>
                    </td>
                    </div>
                    <td class="tickets_assignee">
                        APatel </td>
                    <td class="tickets_description">
                        <div class="tickets_description_title">
                            Request for clarification on revenue recognition policies for new product lines </div>
                        <div class="tickets_description_details">
                            <div class="tickets_description_department">
                                Accounting </div>
                            <div class="tickets_description_client">
                                Andrew Peterson </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
*/

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
    fetch(`../api/api_tickets.php?search=${search.value}&dept=${dept.value}&status=${status.value}&priority=${priority.value}&assignee=${assignee.value}&hashtag=${hashtag.value}&orderId=${idSortValue}&orderAssignee=${assigneeSortValue}&orderDescription=${descriptionSortValue}`)
        .then(response => response.json())
        .then(data => {
            clearMembers();
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

if(idSort) {
    idSort.addEventListener('click', () => {
        if(idSortValue === '') {
            idSortValue = 'ASC';
            idSort.src = '../assets/sort-asc.svg';
        } else if(idSortValue === 'ASC') {
            idSortValue = 'DESC';
            idSort.src = '../assets/sort-desc.svg';
        } else {
            idSortValue = '';
            idSort.src = '../assets/sort.svg';
        }
        updateMembers();
    });
}