<?php
//Created by Peter Prout, Animal Welfare Society Chairperson 2017-18, 2018-19.
$conn_id = new mysqli("mysql", "user", "password", "db");
require '../header.php';

?>
<script>
    $(function() {
        $("#sub").click(function (e) {
            e.preventDefault();
            let pswd1 = $("#pswd").val();
            let pswd2 = $("#pswd2").val();
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
                    $("#reset").submit();
                }
            }
            else {
                notice.text("The passwords do not match.")
            }

        })
    });
</script>
<h1> Admin Only. Use this to reset a members password and timetable slots.</h1>

<div class="bootstrap-iso">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-2 col-lg-4"></div>
            <div class="col-s-8 col-lg-4">
                <form method="post" id = "reset">
                    <fieldset class="form-group ">
                        <legend> Name</legend>
                        <Select name="SName" class="form-control" id="name" required>
                            <option value="">--Select Name --</option>
                            <?php
                            $result = mysqli_query($conn_id, "Select sname from timeMan GROUP BY sname");
                            while ($row = mysqli_fetch_assoc($result)) {
                                $name = $row['sname'];
                                echo "<option value='$name'> $name </option> \n";
                            }
                            ?>
                        </Select>
                    </fieldset>
                    <label class="control-label requiredField" for="pswd">
                        Password
                        <span class="asteriskField">
       </span>
                    </label>
                    <input class="form-control" id="pswd" name="pswd" type="password" autocomplete="new-password" required/> <br>
                    <label class="control-label requiredField" for="pswd2">
                        Confirm Password
                        <span class="asteriskField">
       </span>
                    </label>
                    <input class="form-control" id="pswd2"  type="password" autocomplete="new-password" required/><span style="color: darkred" id = "notice"></span><br>
                    <label class="control-label requiredField" for="admin_pswd">
                        Admin Password
                        <span class="asteriskField">
       </span>
                    </label>
                    <input class="form-control" id="admin_pswd" name="admin_pswd" type="password" required/><br>
                    <button id="sub"> Submit</button>
                </form>
            </div>
            <div class="col-s-8 col-lg-4"></div>
        </div>
        <?php
        if (isset($_POST['SName']) && isset($_POST['pswd'])  && isset($_POST['admin_pswd'])) {
        $result = mysqli_query($conn_id, "Select pswd from timeMan_auth WHERE user = 'admin'");
        $row = mysqli_fetch_assoc($result);
            if (password_verify($_POST['admin_pswd'], $row['pswd'])) {
                #if (!preg_match("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,})", $_POST['pswd'])) {
                #    echo "<h4> Password must have at least 8 characters, 1 number, 1 uppercase letter and 1 lowercase letter.</h4>";
               # } else {
                    $password = password_hash($_POST['pswd'], PASSWORD_BCRYPT);
                    $Sname = $_POST['SName'];
                    $sqlprp = $conn_id->prepare("UPDATE timeMan SET available  = 'y' WHERE sname = ?");
                    $sqlprp->bind_param("s", $Sname);
                    $sqlprp->execute();
                    $sqlprp = $conn_id->prepare("UPDATE timeMan_user_auth set pswd = ? WHERE user = ?");
                    $sqlprp->bind_param("ss", $password,$Sname);
                    $sqlprp->execute();
                    echo "<div class='row'>             <div class=\"col-xs-2 col-lg-4\"></div>
            <div class=\"col-s-8 col-lg-4\"> <h1> Successfully reset member: $Sname </h1> </div> </div>";
                }
           # }
            else {
                echo "<h4> Incorrect Admin Password! </h4>";
            }
        }
        ?>
    </div>
</div>
</body>
</html>

