$(document).ready(function() {
    $('#login_form').submit(function(event) {
        event.preventDefault();

        var email = $('#login_email');
        var password = $('#login_password');
        var emailError = $('#email-error');
        var passwordError = $('#password-error');
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

        email.css('border', '');
        email.css('border-bottom', '1px solid #9e9e9e');
        password.css('border', '');
        password.css('border-bottom', '1px solid #9e9e9e');
        emailError.html('');
        passwordError.html('Never share your password with anyone!');
        if (passwordError.hasClass('red-text')) {
            passwordError.toggleClass('red-text');
        }


        if ((email.val() == '' || email.val() == null) && (password.val() == '' || password.val() == null)) {
            email.css('border', '1px solid red');
            emailError.html('E-mail cannot be empty!');
            password.css('border', '1px solid red');
            passwordError.html('Password cannot be empty!');
            passwordError.toggleClass('red-text');
        } else if (email.val() == '' || email.val() == null) {
            email.css('border', '1px solid red');
            emailError.html('E-mail cannot be empty!');
        } else if (password.val() == '' || password.val() == null) {
            password.css('border', '1px solid red');
            passwordError.html('Password cannot be empty!');
            passwordError.toggleClass('red-text');
        } else if (!emailReg.test(email.val())) {
            email.css('border', '1px solid red');
            emailError.html('Please enter a valid email!');
        } else {
            $('#login_form').hide();
            $('#login_loader').show();
            $.ajax({
                url: 'includes/form-handlers/login.inc.php',
                type: 'POST',
                data: {
                    login_email: email.val(),
                    login_password: password.val(),
                    login_button: true
                },
                cache: false,
    
                success: function(data) {
                    
                }
            });
        }
    });
});