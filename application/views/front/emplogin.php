<!-- content -->
<div class="col-md-9 col-sm-9">
    <div class="middle-area">
        <h1 class="heading">RMSA: &nbsp;Employee Login Screen</h1>
        <form class="form-horizontal border p-2" method="post" action="<?php echo EMPLOYEE_LOGIN_LINK ?>">
            <h2 class="second-heading text-center">Authorized login</h2>
            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="userName">User
                        Name:</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" name="username" class="form-control" placeholder="User Name">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="password">Password:</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="password" name="password" class="form-control" placeholder="">
                    </div>
                </div>
            </div>
<!--            <div class="form-group">
                <div class="row">
                    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                    <script>function enableLogin() {
                            document.getElementById("btnLogin").disabled = false;
                        }</script>
                    <label class="control-label col-sm-4 col-xs-12" for="ptsp"></label>
                    <div class="col-sm-8 col-xs-12">
                        <div class="g-recaptcha" style="" data-sitekey="6LdnvCQUAAAAAGmHBukXVzjs5NupVLlaIHJdpFWo" data-callback="enableLogin"></div>
                    </div>
                </div>
            </div>-->
            <div class="form-group">
                <div class="m-auto text-center">
                    <button type="submit" class="btn primary_btn"  id="btnLogin">Login</button>
                </div>
            </div>            
        </form>
        <div class="form-group">
            <a href="#">New Registration</a>
        </div>
        <p class="bg-light-blue  p-2">Please enter your Registration No. as your User Name and your
            Date of Birth in YYYYMMDD format as your Password.
        </p>
    </div>
</div>
