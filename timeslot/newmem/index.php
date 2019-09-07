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
                    $("#newmem").submit();
                }
            }
            else {
                notice.text("The passwords do not match.")
            }

        })
    });
</script>
<h1> Admin Only. Use this to enter new members.</h1>

<div class="bootstrap-iso">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-2 col-lg-4"></div>
            <div class="col-s-8 col-lg-4">
                <form method="post" id="newmem">
                    <label class="control-label requiredField" for="newmem">
                        Enter the new member name.
                        <span class="asteriskField">
       </span>
                    </label>
                    <input class="form-control" type="text" name="newmem" id="newmem" required/>
                    <label class="control-label requiredField" for="pswd">
                        Password
                        <span class="asteriskField">
       </span>
                    </label>
                    <input class="form-control" id="pswd" name="pswd" type="password"   autocomplete="new-password" required/> <br>
                    <label class="control-label requiredField" for="pswd2">
                        Confirm Password
                        <span class="asteriskField">
       </span>
                    </label>
                    <input class="form-control" id="pswd2"  type="password"  autocomplete="new-password" required/><span style="color: darkred" id = "notice"></span><br>
                    <label class="control-label requiredField" for="admin_pswd">
                        Admin Password
                        <span class="asteriskField">
       </span>
                    </label>
                    <input class="form-control" id="admin_pswd" name="admin_pswd" type="password" required/><br>
                    <button id="sub"> Submit new member</button>
                </form>
            </div>
            <div class="col-s-8 col-lg-4"></div>
        </div>
        <?php
        if (isset($_POST['newmem']) && isset($_POST['pswd']) && isset($_POST['admin_pswd'])) {

            $result = mysqli_query($conn_id, "Select pswd from timeMan_auth WHERE user = 'admin'");
            $row = mysqli_fetch_assoc($result);
            if (password_verify($_POST['admin_pswd'], $row['pswd'])) {
                $name = $_POST['newmem'];
                $sqlprp = $conn_id->prepare("Select sname from timeMan WHERE sname = ?");
                $sqlprp->bind_param("s", $name);
                $sqlprp->execute();
                $sqlprp->store_result();

                if ($sqlprp->num_rows != 0) {
                    echo "<h4> Someone with the name '" . $name . "' already exists. Please use an alternative/extended name. </h4>";
                    }
                    else{
                    $sqlprp -> free_result();
                #if (!preg_match("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,})", $_POST['pswd'])) {
                 #   echo "<h4> Password must have at least 8 characters, 1 number, 1 uppercase letter and 1 lowercase letter.</h4>";
                #} else {
                    $password = password_hash($_POST['pswd'], PASSWORD_BCRYPT);

                    $times = [9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20];
                    $days = ["m", "t", "w", "r", "f"];
                    foreach ($days as $day) {
                        foreach ($times as $time) {
                            $sqlprp = $conn_id->prepare("INSERT into timeMan (sname,weekday,timeslot) VALUES (?,?,?)");
                            $sqlprp->bind_param("ssi", $name, $day, $time);
                            $sqlprp->execute();
                        }
                    }
                        $sqlprp = $conn_id->prepare("INSERT into timeMan_user_auth (user,pswd) VALUES (?,?)");
                        $sqlprp->bind_param("ss", $name, $password);
                        $sqlprp->execute();

                        echo "<div class='row'>             <div class=\"col-xs-2 col-lg-4\"></div>
            <div class=\"col-s-8 col-lg-4\"> <h1> Successfully entered members! </h1> </div> </div>";
                    }
               # }
            }else {
                echo "<h4> Incorrect Password! </h4>";
            }
        }
        ?>
    </div>
</div>
</body>
</html>

