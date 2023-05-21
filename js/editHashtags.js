function addHashtag(){
    let container = document.createElement("div")
    container.className = "container"

    const h1 = document.createElement("h1")
    h1.innerHTML = ""

    const border = document.createElement("div")
    border.className = "border"

    const hashtag_textarea = document.createElement("textarea")
    hashtag_textarea.name = "H[]"
    hashtag_textarea.className = "textarea"
    hashtag_textarea.required = true

    container.appendChild(h1)
    container.appendChild(border)
    container.appendChild(hashtag_textarea)

    let lastContainer = document.getElementsByClassName("container")
    lastContainer = lastContainer[lastContainer.length - 2]

    lastContainer.parentNode.insertBefore(container, lastContainer.nextSibling)
}