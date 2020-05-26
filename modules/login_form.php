        <div id="login" class="modal section">
            <form action="includes/form-handlers/login.inc.php" id='login_form' method="POST">
                <div class="modal-content">
                    <a href="#!" class="right modal-close btn btn-small red lighten-1">x</a>
                    <div class="row">
                        <div class="col s12">
                            <h4>Login</h4>
                            <p class="center-align red-text">
                                <b id="fallback-error">
                                <?php
                                if (isset($_SESSION['login_errors_array'])) {
                                    if (!empty($_SESSION['login_errors_array'])) {
                                        foreach ($_SESSION['login_errors_array'] as $error) {
                                            echo $error;
                                        }
                                    }
                                }
                                ?>
                                </b>
                            </p>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="text" id="login_email" name="login_email" />
                                    <label for="login_email">E-mail</label>
                                    <span class="helper-text red-text right" id='email-error'></span>
                                </div>
                                <div class="col s12 input-field">
                                    <input type="password" id="login_password" name="login_password" />
                                    <label for="login_password">Password</label>
                                    <span class="helper-text right" id='password-error'>Never share your password with anyone!</span>
                                </div>
                                <div class="col s12 center-align">
                                    <input type="submit" id='login_button' class="btn green darken-1 login-btn" name="login_button" value="LOGIN" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <p class="center-align grey-text text-darken-1">
                                        OR
                                    </p>
                                </div>
                            </div>
                            <div class="row center-align">
                                <div class="col s12">
                                    <a href="signup.php" class="helper-text btn create-account-btn">Create an account?</a>
                                </div>
                            </div>
                            <div class="row center-align">
                                <div class="col s12">
                                    <button class="btn facebook-login-btn">Login using Facebook</button>
                                </div>
                            </div>
                            <div class="row center-align">
                                <div class="col s12">
                                    <button class="btn google-login-btn">Login using Google</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row" id='login_loader'>
                <div class="col s12 center-align">
                    <h3 class="flow-text">Please wait!</h3>
                </div>
                <div class="col s6 offset-s3">
                    <div class="progress">
                        <div class="indeterminate"></div>
                    </div>
                </div>
            </div>
        </div>