const selectStatus = document.querySelector('.ticket-status');

selectStatus.addEventListener('change', () => {
  const statusValue = selectStatus.value;

  if (statusValue === 'Open') {
    selectStatus.style.backgroundColor = '#84C596';
  } else if (statusValue === 'Assigned') {
    selectStatus.style.backgroundColor = '#FFC277';
  } else if (statusValue === 'Closed') {
    selectStatus.style.backgroundColor = '#994A4C';
  }
});