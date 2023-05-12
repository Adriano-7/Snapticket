const selectStatus = document.querySelector('.ticket-status');

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

function changeStatus(){
  document.getElementById("status-form").submit();
}