function toggleEditForm(button) {
    const form = button.parentNode;
    const input = form.querySelector('input');
    const icon = button.querySelector('img');
    
    if (input.readOnly) {
      input.readOnly = false;
      icon.src = '../assets/icons/tick-icon.svg';
      button.type = 'button';
    } else {
      form.submit();
    }
}

const fileInput = document.getElementById('file-input');
const fileLabel = document.getElementById('file-label');

fileInput.addEventListener('change', function() {
  if (fileInput.value) {
    const filename = fileInput.value.split('\\').pop();
    fileLabel.innerText = filename;
  } 
});