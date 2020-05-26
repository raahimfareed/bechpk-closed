$(document).ready(function() {
    $('#signup_form').submit(function(event) {
        event.preventDefault();

        var firstName = $('#signup_first_name');
        var lastName = $('#signup_last_name');
        var email = $('#signup_email');
        var password = $('#signup_password');
        var confirmPassword = $('#signup_confirm_password');
        var fallbackError = $('#signupFallbackError');

        var firstNameError = $('#firstNameError');
        var lastNameError = $('#lastNameError');
        var emailError = $('#emailError');
        var passwordError = $('#passwordError');
        var confirmPasswordError = $('#confirmPasswordError');

        var regexName = /^[A-Za-z]*$/;
        var regexEmail = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;


        firstName.css('border', '');
        firstName.css('border-bottom', '1px solid #9e9e9e');
        lastName.css('border', '');
        lastName.css('border-bottom', '1px solid #9e9e9e');
        email.css('border', '');
        email.css('border-bottom', '1px solid #9e9e9e');
        password.css('border', '');
        password.css('border-bottom', '1px solid #9e9e9e');
        confirmPassword.css('border', '');
        confirmPassword.css('border-bottom', '1px solid #9e9e9e');
        firstNameError.html('');
        lastNameError.html('');
        emailError.html('');
        passwordError.html('');
        confirmPasswordError.html('');
        fallbackError.html('');

        if (((firstName.val() == '') || (lastName.val() == '') || (email.val() == '') || (password.val() == '') || (confirmPassword.val() == '')) || ((firstName.val() == null) || (lastName.val() == null) || (email.val() == null) || (password.val() == null) || (confirmPassword.val() == null))) {
            if (firstName.val() == '' || firstName.val() == null) {
                firstName.css('border', '1px solid red');
                firstNameError.html('Please enter a first name');
            }
            if (lastName.val() == '' || lastName.val() == null) {
                lastName.css('border', '1px solid red');
                lastNameError.html('Please enter a last name');
            }
            if (email.val() == '' || email.val() == null) {
                email.css('border', '1px solid red');
                emailError.html('Please enter an email');
            }
            if (password.val() == '' || password.val() == null) {
                password.css('border', '1px solid red');
                passwordError.html('Please enter a password');
            }
            if (confirmPassword.val() == '' || confirmPassword.val() == null) {
                confirmPassword.css('border', '1px solid red');
                confirmPasswordError.html('Please confirm your password');
            }
            return;
        } else if ((!regexName.test(firstName.val())) || (!regexName.test(lastName.val())) || (!regexEmail.test(email.val()))) {
            if (!regexName.test(firstName.val())) {
                firstName.css('border', '1px solid red');
                firstNameError.html('Your name can only consist of english alphabets (A-Z/a-z)');
            }
            if (!regexName.test(lastName.val())) {
                lastName.css('border', '1px solid red');
                lastNameError.html('Your name can only consist of english alphabets (A-Z/a-z)');
            }
            if (!regexEmail.test(email.val())) {
                email.css('border', '1px solid red');
                emailError.html('Please enter a valid email!');
            }
            return;
        } else if ((firstName.val().length > 32) || (lastName.val().length > 32)) {
            if (firstName.val().length > 32) {
                firstName.css('border', '1px solid red');
                firstNameError.html('Your name should be less than 32 characters!');
            }
            if (lastName.val().length > 32) {
                lastName.css('border', '1px solid red');
                lastNameError.html('Your name should be less than 32 characters!');
            }
            return;
        } else {
            $.ajax({
                url: 'ajax/signup-handler/user_check.ajax.php',
                type: 'POST',
                data: {
                    signup_email: email.val(),
                    signup_button: true
                },
                cache: false,

                success: function(data) {
                    if (data == 1) {
                        email.css('border', '1px solid red');
                        emailError.html('This email is already taken!');
                        return;
                    } else {
                        if (password.val() != confirmPassword.val()) {
                            password.css('border', '1px solid red');
                            confirmPassword.css('border', '1px solid red');
                            confirmPasswordError.html('Passwords don\'t match');
                            return;
                        } else {
                            $.ajax({
                                url: 'ajax/signup-handler/user_insertion.ajax.php',
                                type: 'POST',
                                data: {
                                    signup_first_name: firstName.val(),
                                    signup_last_name: lastName.val(),
                                    signup_email: email.val(),
                                    signup_password: password.val(),
                                    signup_button: true
                                },
                                cache: false,

                                success: function(data) {
                                    if (data == 'email') {
                                        email.css('border', '1px solid red');
                                        emailError.html('Invalid email!');
                                        return;
                                    } else if (data == 'error') {
                                        fallbackError.html('An error occurred!');
                                        return;
                                    } else if (data == 'success') {
                                        location = 'init_signup.php';
                                        return;
                                    }
                                }
                            });
                        }
                    }
                }
            });
        }
    });
});