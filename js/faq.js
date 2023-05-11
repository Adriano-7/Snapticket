//Redirect to the department's FAQ page
function updateURL() {
    var department = document.getElementById("dept_select").value;

    if (department == "") {
        window.location.href = "faq.php";
    }
    else {
        window.location.href = "faq.php?department=" + department;
    }
}

//Open the answer to the faq question
function toggleAnswer(questionDiv) {
    const answer = questionDiv.nextElementSibling;
    const plus = questionDiv.querySelector('.plus-sign');
    if (answer.style.display === 'none') {
      answer.style.display = 'block';
      plus.textContent = '-';
    } 
    else {
      answer.style.display = 'none';
      plus.textContent = '+';
    }
}