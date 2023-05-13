function select(button) {
    if (button.classList.contains("selected")) {
        button.classList.remove("selected");
    } 
    else {
        button.classList.add("selected");
    }
}

function scrollHorizontally(event) {
    event.preventDefault();
    const container = event.currentTarget;
    let startX = event.clientX;
    let scrollLeft = container.scrollLeft;
  
    function onMouseMove(event) {
      const distanceX = event.clientX - startX;
      container.scrollLeft = scrollLeft - distanceX;
    }
  
    function onMouseUp() {
      container.removeEventListener('mousemove', onMouseMove);
      container.removeEventListener('mouseup', onMouseUp);
    }
  
    container.addEventListener('mousedown', function(event) {
      startX = event.clientX;
      scrollLeft = container.scrollLeft;
      container.addEventListener('mousemove', onMouseMove);
      container.addEventListener('mouseup', onMouseUp);
    });
}

function submitTicketForm(){
    var form = document.querySelector('form');

    var deptButtons = document.querySelectorAll('.container:nth-child(2) .option');
    var selectedDepts = [];
    for (var i = 0; i < deptButtons.length; i++) {
        if (deptButtons[i].classList.contains("selected")) {
            selectedDepts.push(deptButtons[i].value);
        }
    }

    var deptInput = document.createElement('input');
    deptInput.type = 'hidden';
    deptInput.name = 'departments';
    deptInput.value = selectedDepts.join(',');
    form.appendChild(deptInput);

    var hashtagButtons = document.querySelectorAll('.container:nth-child(3) .option');
    var selectedHashtags = [];
    for (var i = 0; i < hashtagButtons.length; i++) {
        if (hashtagButtons[i].classList.contains("selected")) {
            selectedHashtags.push(hashtagButtons[i].innerHTML);
        }
    }

    var hashtagInput = document.createElement('input');
    hashtagInput.type = 'hidden';
    hashtagInput.name = 'hashtags';
    hashtagInput.value = selectedHashtags.join(',');
    form.appendChild(hashtagInput);

    form.submit();
}

function submitDepartmentForm(){
    if (!uploadClicked) {return;}

    var form = document.querySelector('form');

    var memberButtons = document.querySelectorAll('.container:nth-child(3) .option');
    var selectedMembers = [];
    for (var i = 0; i < memberButtons.length; i++) {
        if (memberButtons[i].classList.contains("selected")) {
            selectedMembers.push(memberButtons[i].value);
        }
    }

    var memberInput = document.createElement('input');
    memberInput.type = 'hidden';
    memberInput.name = 'members';
    memberInput.value = selectedMembers.join(',');
    form.appendChild(memberInput);

    form.submit();
}


function submitDeptIcon(){
    event.preventDefault();
    var fileInput = document.getElementById('file-input');
    fileInput.click();
    fileInput.addEventListener('change', function() {
        var uploadButton = document.getElementById('upload-btn');
        uploadButton.innerHTML = fileInput.files[0].name;
        uploadClicked = true;
    }
    );
}
