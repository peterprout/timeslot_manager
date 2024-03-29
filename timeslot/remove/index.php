<?php
//Created by Peter Prout, Animal Welfare Society Chairperson 2017-18, 2018-19.
$conn_id = new mysqli("mysql", "user", "password", "db");
require '../header.php';

?>
<h1> Admin Only. Use this to remove one member.</h1>

<div class="bootstrap-iso">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-2 col-lg-4"></div>
            <div class="col-s-8 col-lg-4">
                <form method="post">
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
                        Admin Password
                        <span class="asteriskField">
       </span>
                    </label>
                    <input class="form-control" id="pswd" name="pswd" type="password" required/><br>
                    <button type="submit"> Remove member</button>
                </form>
            </div>
            <div class="col-s-8 col-lg-4"></div>
        </div>
        <?php
        if (isset($_POST['SName']) && isset($_POST['pswd'])) {
            $result = mysqli_query($conn_id, "Select pswd from timeMan_auth WHERE user = 'admin'");
            $row = mysqli_fetch_assoc($result);
            if (password_verify($_POST['pswd'], $row['pswd'])) {
                $Sname = $_POST['SName'];                $Sname = $_POST['SName'];
                $sqlprp = $conn_id->prepare("DELETE FROM timeMan WHERE sname = ?" );
                $sqlprp->bind_param("s", $Sname);
                $sqlprp->execute();
                echo "<div class='row'>             <div class=\"col-xs-2 col-lg-4\"></div>
            <div class=\"col-s-8 col-lg-4\"> <h1> Successfully removed member: $Sname </h1> </div> </div>";
            } else {
                echo "<h4> Incorrect Password! </h4>";
            }
        }
        ?>
    </div>
</div>
</body>
</html>

