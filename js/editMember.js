function changeRole(){
    var role_form = document.getElementById("role-form");
    for (var i = 0; i < role_form.length; i++) {
        if (role_form[i].selected) {
            var input = document.createElement("input");
            input.setAttribute("type", "hidden");
            input.setAttribute("name", "role");
            input.setAttribute("value", role_form[i].value);
            role_form.appendChild(input);
        }
    }

    document.getElementById("role-form").submit();
}