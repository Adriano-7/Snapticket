const fileInput = document.getElementById('file-input');
const fileLabel = document.getElementById('file-label');

fileInput.addEventListener('change', function() {
  if (fileInput.value) {
    const filename = fileInput.value.split('\\').pop();
    fileLabel.innerText = filename;
  } 
});