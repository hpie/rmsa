<!-- content -->
<div class="col-md-9 col-sm-9">
    <div class="middle-area">
        <h1 class="heading">Forget password request</h1>
        <form class="form-horizontal border p-2" method="post" action="<?php echo FORGET_PASSWORD_LINK.$user_type; ?>">                                 
            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="userName">Email:</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="email" name="username" class="form-control" placeholder="User Name" required="">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <script nonce='S51U26wMQz' type="text/javascript" src="https://www.google.com/recaptcha/api.js" async defer></script>
                    <script nonce='S51U26wMQz' type="text/javascript">function enableLogin() {
                        $("#btnLogin").removeClass('btn_disabled');
                        document.getElementById("btnLogin").disabled = false;
                    }</script>
                    <label class="control-label col-sm-4 col-xs-12" for="ptsp"></label>
                    <div class="col-sm-8 col-xs-12">
                        <div class="g-recaptcha" style="" data-sitekey="6LdnvCQUAAAAAGmHBukXVzjs5NupVLlaIHJdpFWo" data-callback="enableLogin"></div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="m-auto text-center">
                    <button type="submit" class="btn primary_btn btn_disabled" disabled="true" id="btnLogin">Request </button>
                </div>
            </div>            
        </form>
        <div class="form-group">
            <a href="#">New Registration: Please contact the Portal Admin</a>
        </div>
        <p class="bg-light-blue  p-2">Please enter your Registered email as your User Name and your
            password set by you as your Password. The account will be locked after 3 unsuccesful attempts
            and you'll have to contact the administrator to have it unlocked.
        </p>
    </div>
</div>
