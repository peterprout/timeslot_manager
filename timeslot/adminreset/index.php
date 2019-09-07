<?php
//Created by Peter Prout, Animal Welfare Society Chairperson 2017-18, 2018-19.
$conn_id = new mysqli("mysql", "user", "password", "db");
require '../header.php';
?>
<script>
    $(function() {
        $("#sub").click(function (e) {
            e.preventDefault();
            let pswd1 = $("#new_pswd").val();
            let pswd2 = $("#new_pswd2").val();
            let notice = $("#notice");

            if (pswd1 === pswd2) {
                if (!RegExp("^(?=.{8,})").test(pswd1)) { //RegEx to see if the password is atleast 8 characters long.
                    notice.text("The password must be atleast 8 characters long")
                }
                else if (!RegExp("^(?=.*[a-z])").test(pswd1)) { //RegEx to see if the password has  at least 1 lowercase letter.
                    notice.text("The password must have at least 1 lowercase letter.")
                }
                else if (!RegExp("^(?=.*[A-Z])").test(pswd1)) { //RegEx to see if the password has  at least 1 uppercase letter.
                    notice.text("The password must have at least 1 uppercase letter.")
                }
                else if (!RegExp("^(?=.*[0-9])").test(pswd1)) { //RegEx to see if the password has at least one number.
                    notice.text("The password must have at least 1 number.")
                }
                else {
                    console.log("Hereeee");
                    $("#pswd_change").submit();
                }
            }
            else {
                notice.text("The passwords do not match.")
            }

        })
    });
</script>
<h1> Admin Only. Use this change the admin password. </h1>

<div class="bootstrap-iso">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-2 col-lg-4"></div>
            <div class="col-s-8 col-lg-4">
                <form method="post" id ="pswd_change">
                    <label class="control-label requiredField" for="pswd">
                        Current Password
                        <span class="asteriskField">
       </span>
                    </label>
                    <input class="form-control" id="pswd" name="pswd" type="password" autocomplete="current-password" required/><br>

                    <label class="control-label requiredField" for="new_pswd">
                        New Password
                        <span class="asteriskField">
       </span>
                    </label>
                    <input class="form-control" id="new_pswd" name="new_pswd" type="password" autocomplete="new-password" required/><br>
                    <label class="control-label requiredField" for="new_pswd2">
                        Confirm New Password
                        <span class="asteriskField">
       </span>
                    </label>
                    <input class="form-control" id="new_pswd2" type="password" autocomplete="new-password" required/> <span style="color: darkred" id = "notice"></span><br>
                    <button id ="sub"> Change Password</button>
                </form>
            </div>
            <div class="col-s-8 col-lg-4"></div>
        </div>
        <?php
        if (isset($_POST['new_pswd']) && isset($_POST['pswd'])) {
            $result = mysqli_query($conn_id, "Select pswd from timeMan_auth WHERE user = 'admin'");
            $row = mysqli_fetch_assoc($result);
            echo $_POST['new_pswd'];
            if (password_verify($_POST['pswd'], $row['pswd'])) {
                echo "<span>" . preg_match("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{7,})", "aB012345bbc") . "</span>";
                #if (!preg_match("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{7,})", $_POST['new_pswd'])) {
                if(1==2){
                    echo "<h4> Password must have at least 8 characters, 1 number, 1 uppercase letter and 1 lowercase letter.</h4>";
                } else {
                    $admin = password_hash($_POST['new_pswd'], PASSWORD_BCRYPT);
                    $sqlprp = $conn_id->prepare("UPDATE timeMan_auth set pswd = ? WHERE user = 'admin'");
                    $sqlprp->bind_param("s", $admin);
                    $sqlprp->execute();
                    echo "<div class='row'>             <div class=\"col-xs-2 col-lg-4\"></div>
            <div class=\"col-s-8 col-lg-4\"> <h1> Successfully changed password! </h1> </div> </div>";
                }
                }
            else {
                    echo "<h4> Incorrect Password! </h4>";
                }
        }
        ?>
    </div>
</div>
</body>
</html>

