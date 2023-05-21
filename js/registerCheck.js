document.addEventListener('DOMContentLoaded', () => {
  const form = document.querySelector('form');
  
  form.addEventListener('submit', (event) => {
    event.preventDefault();
    let isValid = true;

    const errorBox = document.querySelector('.error_box');
    errorBox.innerHTML = '';

    const username = document.querySelector('input[name="username"]');
    const usernameRegex = /^[a-zA-Z][a-zA-Z0-9._]+$/;
    if (!usernameRegex.test(username.value)) {
      isValid = false;
      const errorMessage = document.createElement('p');
      errorMessage.innerHTML = 'The username must start with a letter and contain only letters, numbers, dots and underscores';
      errorBox.appendChild(errorMessage);
    }

    const email = document.querySelector('input[name="email"]');
    const emailRegex = /^[a-zA-Z0-9._]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]+$/;
    if (!emailRegex.test(email.value)) {
      isValid = false;
      const errorMessage = document.createElement('p');
      errorMessage.innerHTML = 'The email you entered is not valid';
      errorBox.appendChild(errorMessage);
    }

    const password = document.querySelector('input[name="password"]');
    const confirmPassword = document.querySelector('input[name="confirm password"]');
    const passwordRegex = /^(?=.*[A-Z])(?=.*[0-9]).{8,}$/;
    if (password.value !== confirmPassword.value) {
      isValid = false;

      const errorMessage = document.createElement('p');
      errorMessage.innerHTML = 'The passwords do not match';
      errorBox.appendChild(errorMessage);
    } 

    else if (!passwordRegex.test(password.value)) {
      isValid = false;
      const errorMessage = document.createElement('p');
      errorMessage.innerHTML = 'The password must contain at least 8 characters, one uppercase letter and one number';
      errorBox.appendChild(errorMessage);
    } 

    if (isValid) {
      form.submit();
    } 
  });
});
