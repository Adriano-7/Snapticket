document.addEventListener('DOMContentLoaded', () => {
    const registerContainer = document.querySelector('.register_container');
    const form = document.querySelector('form');
    const errorContainer = document.createElement('div');
    registerContainer.insertBefore(errorContainer, form);
  
    form.addEventListener('submit', (event) => {
      event.preventDefault();
      let isValid = true;

      document.querySelectorAll('.error_msg').forEach((message) => message.remove());

      const password = document.querySelector('input[name="password"]');
      const confirmPassword = document.querySelector('input[name="confirm password"]');
      const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;

      if (password.value !== confirmPassword.value) {
        isValid = false;
        password.classList.add('error_box');
        confirmPassword.classList.add('error_box');

        const errorMessage = document.createElement('p');
        errorMessage.classList.add('error_msg');
        errorMessage.innerHTML = 'The passwords do not match';
        errorContainer.appendChild(errorMessage);
      } 
      else if (!passwordRegex.test(password.value)) {
        isValid = false;
        const errorMessage = document.createElement('p');
        errorMessage.classList.add('error_msg');
        errorMessage.innerHTML = 'The password must contain at least 8 characters, one uppercase letter and one number';
        errorContainer.appendChild(errorMessage);
      } 
  
      if (isValid) {
        form.submit();
      } 
    });
  });
  