const form = document.getElementById('myForm');
   // console.log(form);

    const showError = (input, message) => {
      const errorElement = document.getElementById(`${input.id}Error`);
      errorElement.textContent = message;
    };

    const showSuccess = (input) => {
      const errorElement = document.getElementById(`${input.id}Error`);
      errorElement.textContent = '';
    };

    const checkName = () => {

      const name = document.getElementById('name');
      const nameRegex = /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/;
     // console.log(name);
      if (name.value.trim() === '') {
        showError(name, 'Name is required');
      } else if (name.value.trim().length < 3) {
        showError(name, 'name must be at least 3 characters');
      }else if (!nameRegex.test(name.value.trim())) {
        showError(name, 'name is valid');
      }

      else {
        showSuccess(name);
      }
    };

    const checkPhone = () => {
      const phone = document.getElementById('phone');
      const phoneRegex = /^\d{10}$/;
      if (!phoneRegex.test(phone.value.trim())) {
        showError(phone, 'Enter a valid 10-digit phone number');
      } else {
        showSuccess(phone);
      }
    };

    const checkEmail = () => {
      const email = document.getElementById('email');
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(email.value.trim())) {
        showError(email, 'Enter a valid email address');
      } else {
        showSuccess(email);
      }
    };

    const checkPassword = () => {
      const password = document.getElementById('password');
      if (password.value.trim().length < 6) {
        showError(password, 'Password must be at least 6 characters');
      } else {
        showSuccess(password);
      }
    };

    const checkConfirmPassword = () => {
      const confirmPassword = document.getElementById('confirmPassword');
      const password = document.getElementById('password');
      if (confirmPassword.value.trim() !== password.value.trim()) {
        showError(confirmPassword, 'Passwords do not match');
      } else {
        showSuccess(confirmPassword);
      }
    };

    



    form.addEventListener('keyup', function (e) {
      if (e.target.id === 'name') {
        checkName();
      }
      if (e.target.id === 'phone') {
        checkPhone();
      }
      if (e.target.id === 'email') {
        checkEmail();
      }
      if (e.target.id === 'password') {
        checkPassword();
      }
      if (e.target.id === 'confirmPassword') {
        checkConfirmPassword();
      }
    });



    const validateForm = (e) => {
      e.preventDefault();
     // e.preventDefault();

      checkName();
      checkPhone();
      checkEmail();
      checkPassword();
      checkConfirmPassword();
      const errorElements = document.querySelectorAll('.error');
      if (!Array.from(errorElements).some((el) => el.textContent !== '')) {
        form.submit(); // Submit the form if no errors are found
      }
    };
     form.addEventListener('submit', validateForm);
  
    // window.location.href = 'http://localhost/loginsystem/login.php';
    //   return true;


 src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js";
 src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js";