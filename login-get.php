<?php
session_start();
if(!empty($_SESSION['logged_in'])) {
    echo '<script>window.location = "welcome.php";</script>';
    exit();
}
$message = (!empty($_SESSION['login-error']) ? $_SESSION['login-error'] : '');
$_SESSION['login-error'] = '';
    include "master.php";
?>
 <script>
        function sendContact() {
            var valid;
            valid = validateContact();
            if (valid) {
                $('#login-form').submit();
            }
        }

        function validateContact() {
            var valid = true;
            $(".demoInputBox").css('background-color', '');
            var inputs = ['username', 'password'];
            $("#login-status").html('');
            for (var i = 0; i < inputs.length ; i++) {
                if (!$("#" + inputs[i]).val()) {
                    $("#" + inputs[i]).css('background-color', '#FFFFDF');
                    valid = false;
                    $("#login-status").html('<p class="error">Required Parameter is missing.</p>');
                }
            }
            return valid;
        }
    </script>

<div class="login">
    <div class="box-header">
        <h3 class="login-heading">Log In</h3>
    </div>

    <div class="login-body">
        <form id="login-form" method="post" action="login-post.php" class="form-horizontal form-login">
            <div class="form-group ">
                <div id="login-status" class="col-sm-12">
                    <?php echo $message; ?>
                </div>
            </div>
            <div class="form-group ">
                <div class="col-sm-12">
                    <label class="control-label mb10" for="username">
                        Username
                        <em class="required-asterik">*</em>
                    </label>
                    <input id="username" class="form-control" placeholder="Username" name="username" type="text" value="" required>
                    <span class="error-message"></span>
                </div>
            </div>
            <div class="form-group ">
                <div class="col-sm-12">
                    <label class="control-label mb10" for="password">
                        Password
                        <em class="required-asterik">*</em>
                    </label>
                    <input id="password" class="form-control" placeholder="Password" name="password" type="password" value="" required>
                    <span class="error-message"></span>
                </div>
            </div>
            <!--<div class="form-group ">
                <div class="col-sm-12">
                    <label class="control-label mb10" for="captcha">
                        Captcha
                        <em class="required-asterik">*</em>
                    </label>
                    <input id="captcha" class="form-control" placeholder="Captcha" name="captcha" type="password" value="" required>
                </div>
            </div>

            --><?php /*include "captcha.php" */?>
            <div class="form-group" style="margin-bottom: 40px;">
                <div class="col-sm-12">
                    <input type="button" class="btn btn-global btn-global-thin text-uppercase" onclick="sendContact()" value="Log In">
                </div>
            </div>
        </form>
    </div>
</div>

<?php include "footer.php" ?>
