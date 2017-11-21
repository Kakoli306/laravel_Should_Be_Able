<div class="top_bg">
    <div class="container">
        <div class="header_top">
            <div class="top_left">
                <h2><a href="#">50%off</a> use coupon code "big61" and get extra 33% off on orders above rs 2,229 </h2>
            </div>
            <div class="top_right">
                <ul>
                    <li><a href="#">Recently viewed</a></li>|
                    <li><a href="contact.html">Contact</a></li>|
                    <?php
                    $customer_id = Session::get('customer_id');
                    if($customer_id == null) { ?>

                    <li class="login" >
                        <div id="loginContainer"><a href="#" id="loginButton"><span>Login</span></a>
                            <div id="loginBox">
                                <form id="loginForm">
                                    <fieldset id="body">
                                        <fieldset>
                                            <label for="email">Email Address</label>
                                            <input type="text" name="email" id="email">
                                        </fieldset>
                                        <fieldset>
                                            <label for="password">Password</label>
                                            <input type="password" name="password" id="password">
                                        </fieldset>
                                        <input type="submit" id="login" value="Sign in">
                                        <label for="checkbox"><input type="checkbox" id="checkbox"> <i>Remember me</i></label>
                                    </fieldset>
                                    <span><a href="#">Forgot your password?</a></span>
                                </form>
                            </div>
                        </div>
                    </li>
                  <?php } else { ?>
                    <li><a href="{{ url('/user-logout') }}">Logout</a></li>|
                              <?php } ?>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
