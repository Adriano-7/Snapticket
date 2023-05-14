function updateURL() {
    var department = document.getElementById("dept_select").value;

    if (department == "") {
        window.location.href = "faq.php";
    }
    else {
        window.location.href = "faq.php?faq_id=" + department;
    }
}

function toggleAnswer(questionDiv) {
  const answer = questionDiv.querySelector(".answer");
  const downSign = questionDiv.querySelector(".down-sign");
  const answers = document.querySelectorAll(".answer");

  if (answer.style.display == "none") {
      answers.forEach((answer) => {
          answer.style.display = "none";
      });
      answer.style.display = "block";
      downSign.classList.add("rotate");
      downSign.classList.remove("initialPosition");
  }
  else {
      answers.forEach((answer) => {
          answer.style.display = "none";
      });
      downSign.classList.remove("rotate");
      downSign.classList.add("initialPosition");
  }
}
