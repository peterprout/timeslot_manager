<?php
//Created by Peter Prout, Animal Welfare Society Chairperson 2017-18, 2018-19.
$conn_id = new mysqli("localhost", "username", "password", "dbname");
require '../header.php';
?>

<h1> Admin Only. Use this to enter new members.</h1>

<div class="bootstrap-iso">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-2 col-lg-4"></div>
            <div class="col-s-8 col-lg-4">
                <form method="post">
                    <label class="control-label requiredField" for="newmem">
                        Enter member names, seperated by a comma (,).
                        <span class="asteriskField">
       </span>
                    </label>
                    <input class="form-control" type="text" name="newmem" id="newmem" required/>
                    <label class="control-label requiredField" for="pswd">
                        Password
                        <span class="asteriskField">
       </span>
                    </label>
                    <input class="form-control" id="pswd" name="pswd" type="password" required/><br>
                    <button type="submit"> Submit new member</button>
                </form>
            </div>
            <div class="col-s-8 col-lg-4"></div>
        </div>
        <?php
        if (isset($_POST['newmem']) && isset($_POST['pswd'])) {
            $result = mysqli_query($conn_id, "Select pswd from AWS_auth WHERE user = 'admin'");
            $row = mysqli_fetch_assoc($result);
            if (password_verify($_POST['pswd'], $row['pswd'])) {
                $Sname = $_POST['SName'];                $members = explode(",", $_POST['newmem']);
        $times = [9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20];
        $days = ["m", "t", "w", "r", "f"];
        foreach ($members as $name) {
            if (strlen(trim($name)) != 0) {
                foreach ($days as $day) {
                    foreach ($times as $time) {
                        $sqlprp = $conn_id->prepare("INSERT into AWS (sname,weekday,timeslot) VALUES (?,?,?)");
                        $sqlprp->bind_param("ssi", $name, $day, $time);
                        $sqlprp->execute();
                    }
                }
            }
        }
                echo "<div class='row'>             <div class=\"col-xs-2 col-lg-4\"></div>
            <div class=\"col-s-8 col-lg-4\"> <h1> Successfully entered members! </h1> </div> </div>";
            } else {
                echo "<h4> Incorrect Password! </h4>";
            }
        }
        ?>
    </div>
</div>
</body>
</html>

