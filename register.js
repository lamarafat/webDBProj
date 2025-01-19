
document.addEventListener('DOMContentLoaded', function () {
    const signInForm = document.getElementById('signInForm');
    const inputEmail = document.getElementById('inputEmail');
    const inputPassword = document.getElementById('inputPassword');
    const emailHelp = document.getElementById('emailHelp');
    const passwordHelp = document.getElementById('passwordHelp');
   
    
    function validateEmail(email) {
        const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        return emailRegex.test(email);
    }
    function validatePassword(password) {
        const passwordRegex = /^.{8,20}$/; 
        return passwordRegex.test(password);
    }
    if (signInForm) {
        signInForm.addEventListener('submit', function (event) {
            event.preventDefault();  
            emailHelp.style.display = 'none';
            passwordHelp.style.display = 'none';

            const email = inputEmail.value;
            const password = inputPassword.value;

            let valid = true;
            if (!validateEmail(email)) {
                emailHelp.textContent = 'Please enter a valid email address.';
                emailHelp.style.display = 'block';
                valid = false;
            }
            if (!validatePassword(password)) {
                passwordHelp.textContent = 'Password must be 8-20 characters long.';
                passwordHelp.style.display = 'block';
                valid = false;
            }
            if (valid) {
              
                    window.location.href = "test.php";
            }
        });
    }
});

document.addEventListener('DOMContentLoaded', function () {
    const signUpForm = document.getElementById('signUpForm');
    const firstName = document.getElementById('firstName');
    const lastName = document.getElementById('lastName');
    const inputEmail = document.getElementById('inputEmail');
    const phoneNumber = document.getElementById('phoneNumber');
    const password = document.getElementById('password');
    const verifyPassword = document.getElementById('verifyPassword');
    const errorMessage = document.getElementById('error-message'); 
    
    function validateEmail(email) {
        const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        return emailRegex.test(email);
    }
    
    function validatePhoneNumber(phone) {
        const phoneRegex = /^[0-9]{10}$/;
        return phoneRegex.test(phone);
    }
    
    function validatePasswordStrength(password) {
        const passwordRegex = /^(?=.*[A-Z])(?=.*\d).{8,}$/; 
        return passwordRegex.test(password);
    }
    
    function validatePasswords(password, verifyPassword) {
        if (password !== verifyPassword) {
            errorMessage.textContent = "Passwords do not match.";
            errorMessage.style.display = "block";
            return false;
        }
        return true;
    }
    
    if (signUpForm) {
        signUpForm.addEventListener('submit', function (event) {
            event.preventDefault(); 
            errorMessage.style.display = 'none';  
            
            const email = inputEmail.value;
            const phone = phoneNumber.value;
            const pass = password.value;
            const verifyPass = verifyPassword.value;

            let valid = true;
            
            if (firstName.value.trim() === '' || lastName.value.trim() === '') {
                errorMessage.textContent = "First Name and Last Name are required.";
                errorMessage.style.display = "block";
                valid = false;
            }
            if (!validateEmail(email)) {
                errorMessage.textContent = 'Please enter a valid email address.';
                errorMessage.style.display = 'block';
                valid = false;
            }

            if (!validatePhoneNumber(phone)) {
                errorMessage.textContent = 'Please enter a valid 10-digit phone number.';
                errorMessage.style.display = 'block';
                valid = false;
            }

            if (!validatePasswordStrength(pass)) {
                errorMessage.textContent = 'Password must be at least 8 characters long and include a number and an uppercase letter.';
                errorMessage.style.display = 'block';
                valid = false;
            }

            if (!validatePasswords(pass, verifyPass)) {
                valid = false;
            }
            
            if (valid) {
                window.location.href = "signIn.php"; 
            }
        });
    }
});


document.addEventListener('DOMContentLoaded', function () {
    const forgetForm = document.getElementById('forgetForm');
    const inputPass = document.getElementById('inputpass');
    const inputCheckPass = document.getElementById('inputcheckPass');
    const passwordHelp = document.getElementById('passwordHelp');
    const matchHelp = document.getElementById('matchHelp');
    const forgetButton = document.getElementById('forgetButton');
    function validatePasswordStrength(password) {
        const passwordRegex = /^(?=.*[A-Z])(?=.*\d).{8,}$/;
        return passwordRegex.test(password);
    }
    function validatePasswords(password, confirmPassword) {
        if (password !== confirmPassword) {
            matchHelp.style.display = "block"; 
            return false;
        }
        matchHelp.style.display = "none";
        return true;
    }
    if (forgetForm) {
        forgetButton.addEventListener('click', function () {
            const password = inputPass.value;
            const confirmPassword = inputCheckPass.value;

            let valid = true;
            if (!validatePasswordStrength(password)) {
                passwordHelp.style.display = "block";  
                valid = false;
            } else {
                passwordHelp.style.display = "none"; 
            }
            if (!validatePasswords(password, confirmPassword)) {
                valid = false;
            }
            if (valid) {
                Swal.fire({
                    title: 'Confirmation Code Sent',
                    text: 'Please check your email for the confirmation code.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = "signIn.php";
                });
            }
        });
    }
});

// document.addEventListener('DOMContentLoaded', function () {
//     const signInForm = document.getElementById('signInForm');
//     const inputEmail = document.getElementById('inputEmail');
//     const inputPassword = document.getElementById('inputPassword');
//     const emailHelp = document.getElementById('emailHelp');
//     const passwordHelp = document.getElementById('passwordHelp');
   
    
//     function validateEmail(email) {
//         const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
//         return emailRegex.test(email);
//     }
//     function validatePassword(password) {
//         const passwordRegex = /^.{8,20}$/; 
//         return passwordRegex.test(password);
//     }
//     if (signInForm) {
//         signInForm.addEventListener('submit', function (event) {
//             event.preventDefault();  
//             emailHelp.style.display = 'none';
//             passwordHelp.style.display = 'none';

//             const email = inputEmail.value;
//             const password = inputPassword.value;

//             let valid = true;
//             if (!validateEmail(email)) {
//                 emailHelp.textContent = 'Please enter a valid email address.';
//                 emailHelp.style.display = 'block';
//                 valid = false;
//             }
//             if (!validatePassword(password)) {
//                 passwordHelp.textContent = 'Password must be 8-20 characters long.';
//                 passwordHelp.style.display = 'block';
//                 valid = false;
//             }
//             if (valid) {
              
//                     window.location.href = "test.php";
//             }
//         });
//     }
// });

// document.addEventListener('DOMContentLoaded', function () {
//     const signUpForm = document.getElementById('signUpForm');
//     const firstName = document.getElementById('firstName');
//     const lastName = document.getElementById('lastName');
//     const inputEmail = document.getElementById('inputEmail');
//     const phoneNumber = document.getElementById('phoneNumber');
//     const password = document.getElementById('password');
//     const verifyPassword = document.getElementById('verifyPassword');
//     const errorMessage = document.getElementById('error-message');
    
//     function validateEmail(email) {
//         const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
//         return emailRegex.test(email);
//     }
//     function validatePhoneNumber(phone) {
//         const phoneRegex = /^[0-9]{10}$/;
//         return phoneRegex.test(phone);
//     }
//     function validatePasswordStrength(password) {
//         const passwordRegex = /^(?=.*[A-Z])(?=.*\d).{8,}$/; 
//         return passwordRegex.test(password);
//     }
//     function validatePasswords(password, verifyPassword) {
//         if (password !== verifyPassword) {
//             errorMessage.textContent = "Passwords do not match.";
//             errorMessage.style.display = "block";
//             return false;
//         }
//         return true;
//     }
//     if (signUpForm) {
//         signUpForm.addEventListener('submit', function (event) {
//             event.preventDefault(); 
//             errorMessage.style.display = 'none';
//             const email = inputEmail.value;
//             const phone = phoneNumber.value;
//             const pass = password.value;
//             const verifyPass = verifyPassword.value;

//             let valid = true;
//             if (firstName.value.trim() === '' || lastName.value.trim() === '') {
//                 errorMessage.textContent = "First Name and Last Name are required.";
//                 errorMessage.style.display = "block";
//                 valid = false;
//             }
//             if (!validateEmail(email)) {
//                 errorMessage.textContent = 'Please enter a valid email address.';
//                 errorMessage.style.display = 'block';
//                 valid = false;
//             }
//             if (!validatePhoneNumber(phone)) {
//                 errorMessage.textContent = 'Please enter a valid 10-digit phone number.';
//                 errorMessage.style.display = 'block';
//                 valid = false;
//             }
//             if (!validatePasswordStrength(pass)) {
//                 errorMessage.textContent = 'Password must be at least 8 characters long and include a number and an uppercase letter.';
//                 errorMessage.style.display = 'block';
//                 valid = false;
//             }
//             if (!validatePasswords(pass, verifyPass)) {
//                 valid = false;
//             }
//             if (valid) {
               
//                     window.location.href = "signIn.php";
              
//             }
//         });
//     }
// });

// document.addEventListener('DOMContentLoaded', function () {
//     const forgetForm = document.getElementById('forgetForm');
//     const inputPass = document.getElementById('inputpass');
//     const inputCheckPass = document.getElementById('inputcheckPass');
//     const passwordHelp = document.getElementById('passwordHelp');
//     const matchHelp = document.getElementById('matchHelp');
//     const forgetButton = document.getElementById('forgetButton');
//     function validatePasswordStrength(password) {
//         const passwordRegex = /^(?=.*[A-Z])(?=.*\d).{8,}$/;
//         return passwordRegex.test(password);
//     }
//     function validatePasswords(password, confirmPassword) {
//         if (password !== confirmPassword) {
//             matchHelp.style.display = "block"; 
//             return false;
//         }
//         matchHelp.style.display = "none";
//         return true;
//     }
//     if (forgetForm) {
//         forgetButton.addEventListener('click', function () {
//             const password = inputPass.value;
//             const confirmPassword = inputCheckPass.value;

//             let valid = true;
//             if (!validatePasswordStrength(password)) {
//                 passwordHelp.style.display = "block";  
//                 valid = false;
//             } else {
//                 passwordHelp.style.display = "none"; 
//             }
//             if (!validatePasswords(password, confirmPassword)) {
//                 valid = false;
//             }
//             if (valid) {
//                 Swal.fire({
//                     title: 'Confirmation Code Sent',
//                     text: 'Please check your email for the confirmation code.',
//                     icon: 'success',
//                     confirmButtonText: 'OK'
//                 }).then(() => {
//                     window.location.href = "signIn.php";
//                 });
//             }
//         });
//     }
// });

