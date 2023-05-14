function getNextNum(){
    let containers = document.getElementsByClassName("container")
    return containers.length
}

function addQuestion(){
    let container = document.createElement("div")
    container.className = "container"
    
    const questNum = getNextNum();

    const h1 = document.createElement("h1")
    h1.innerHTML = "Question " + questNum

    const border = document.createElement("div")
    border.className = "border"

    const question_textarea = document.createElement("textarea")
    question_textarea.className = "question_textarea textarea"
    question_textarea.name = "Q[]"
    question_textarea.placeholder = "Question"
    question_textarea.required = true

    const answer_textarea = document.createElement("textarea")
    answer_textarea.className = "answer_textarea textarea"
    answer_textarea.name = "A[]"
    answer_textarea.rows = "3"
    answer_textarea.placeholder = "Answer"
    answer_textarea.required = true

    container.appendChild(h1)
    container.appendChild(border)
    container.appendChild(question_textarea)
    container.appendChild(answer_textarea)

    let lastContainer = document.getElementsByClassName("container")
    lastContainer = lastContainer[lastContainer.length - 2]
    lastContainer.parentNode.insertBefore(container, lastContainer.nextSibling)
}

