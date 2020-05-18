        <div id="login" class="modal">
            <form action="includes/user-login.inc.php">
                <div class="modal-content">
                    <a href="#!" class="right modal-close btn btn-small red lighten-1">x</a>
                    <div class="row">
                        <div class="col s12">
                            <h4>Login</h4>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="text" id="user_email" name="user_email" />
                                    <label for="user_email">E-mail</label>
                                </div>
                                <div class="col s12 input-field">
                                    <input type="password" id="user_password" name="user_password" />
                                    <label for="user_password">Password</label>
                                    <span class="helper-text">Never share your password with anyone!</span>
                                </div>
                                <div class="col s12 center-align">
                                    <input type="submit" class="btn green darken-1 login-btn" name="user-login" value="LOGIN" />
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
        </div>