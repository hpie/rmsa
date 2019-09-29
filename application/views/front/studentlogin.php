<!-- content -->
<div class="col-md-6 col-sm-8  col-12">
    <div class="middle-area">
        <h1 class="heading">RMSA: &nbsp;Student Login Screen</h1>
        <form method="post" class="form-horizontal border p-2" action="<?php echo STUDENT_LOGIN_LINK; ?>">
            <h2 class="second-heading text-center">Authorized login</h2>
            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="username">User Name:</label>
                    <div class="col-sm-8 col-xs-12">
                        <input id="username" name="username" type="text" class="form-control" placeholder="User Name">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="password">Password:</label>
                    <div class="col-sm-8 col-xs-12">
                        <input id="password" name="password" type="password" class="form-control" placeholder="">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="verification">Verification:</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="password" class="form-control" placeholder="">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="m-auto text-center">
                    <button type="submit" class="btn primary_btn">Login</button>
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