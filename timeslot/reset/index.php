<?php
//Created by Peter Prout, Animal Welfare Society Chairperson 2017-18, 2018-19.
//Use this to create table and insert values. MAKE SURE AWS is not already in DB for another purpose.
$conn_id = new mysqli("localhost", "username", "password", "dbname");
require '../header.php';
?>

<h1> Admin Only. Use this to reset the timeslots and set default members.</h1>

<div class="bootstrap-iso">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-2 col-lg-4"></div>
            <div class="col-s-8 col-lg-4">
                <form method="post">
                    <label class="control-label requiredField" for="mems">
                        Members (seperate by a comma)
                        <span class="asteriskField">
       </span>
                    </label>
                    <input class="form-control" type="text" name="mems" id="mems"
                           value="Peter,Michelle,Aoife,Aysha,Kinga,Roisin,Shannon,Laila,Marian"/>
                    <label class="control-label requiredField" for="pswd">
                        Password
                        <span class="asteriskField">
       </span>
                    </label>
                    <input class="form-control" id="pswd" name="pswd" type="password" required/><br>
                    <button type="submit"> Reset</button>
                </form>
            </div>
            <div class="col-s-8 col-lg-4"></div>
        </div>


        <?php
        if (isset($_POST['pswd'])) {
            $result = mysqli_query($conn_id, "Select pswd from AWS_auth WHERE user = 'admin'");
            $row = mysqli_fetch_assoc($result);
            if (password_verify($_POST['pswd'], $row['pswd'])) {
                $Sname = $_POST['SName'];                mysqli_query($conn_id, "TRUNCATE TABLE AWS") or die(mysqli_error($conn_id));
                echo "<H4> Reset database! </H4> <br>";
                if (isset($_POST['mems'])) {
                    $members = explode(",", $_POST['mems']);
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
                        echo "<H4> Inserted members! </H4> <br>";
                    }

                }
            }else {
                echo "<h4> Incorrect Password! </h4>";
            }
        }
        ?>
    </div>
</div>
</body>
</html>

