function select(button) {
    if (button.classList.contains("selected")) {
        button.classList.remove("selected");
    } 
    else {
        button.classList.add("selected");
    }
}

function submitForm(){
    var form = document.querySelector('form');
    console.log(form);

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