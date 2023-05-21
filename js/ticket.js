const selectStatus = document.querySelector('.ticket-status');
const faqButton = document.getElementById("faq-button");
const attachmentButton = document.getElementById("attachment-button");

faqButton.addEventListener("click", (e) => {
  e.preventDefault();
});

attachmentButton.addEventListener("click", (e) => {
  e.preventDefault();
});

selectStatus.addEventListener('change', () => {
  const statusValue = selectStatus.value;

  if (statusValue === 'Open') {
    selectStatus.style.backgroundColor = '#4a7155';
  } else if (statusValue === 'Assigned') {
    selectStatus.style.backgroundColor = '#c59c69';
  } else if (statusValue === 'Closed') {
    selectStatus.style.backgroundColor = '#994A4C';
  }
});

function changeStatus() {
  document.getElementById("status-form").submit();
}

function showHistory() {
  const historyButton = document.getElementById("history-button");
  const history = document.getElementById("history");

  if (history.style.display === "none") {
    history.style.display = "block";
    historyButton.textContent = "Hide History";
  }
  else {
    history.style.display = "none";
    historyButton.textContent = "Show History";
  }
}

function showFaq() {
  var popup = document.getElementById("faq-popup");
  if (popup.style.display === "none") {
    popup.style.display = "block";
  } else {
    popup.style.display = "none";
  }
}

function updateURL() {
  var department = document.getElementById("dept_select").value;
  var currentURL = window.location.href;
  var ticket_id = currentURL.split("=")[1];

  if (department == "") {
    window.location.href = "ticket.php?ticket_id=" + ticket_id;
  }
  else {
    window.location.href = "ticket.php?ticket_id=" + ticket_id + "&faq_id=" + department;
  }
}

function chooseQuestion(question) {
  const answer = question.querySelector("p:nth-child(2)").textContent;
  const commentTextarea = document.querySelector(".comment-textarea");
  commentTextarea.value = answer;
}