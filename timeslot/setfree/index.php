<!DOCTYPE html>
<?php
//Created by Peter Prout, Animal Welfare Society Chairperson 2017-18, 2018-19.
$conn_id = new mysqli("localhost", "username", "password", "dbname");
require '../header.php';
?>

<h1> This form is only to reset timeslots you accidentally set as Busy. Use this page to reset them as Free. </h1>
<div class="bootstrap-iso">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-2 col-lg-4"></div>
            <div class="col-s-8 col-lg-4">
                <form action='/aws/setfree/index.php' method='POST'>
                    <fieldset class="form-group ">
                        <legend> Name</legend>
                        <Select name="SName" class="form-control" id="name" required>
                            <option value="">--Select Name --</option>
                            <?php
                            $result = mysqli_query($conn_id, "Select sname from AWS GROUP BY sname");
                            while ($row = mysqli_fetch_assoc($result)) {
                                $name = $row['sname'];
                                echo "<option value='$name'> $name </option> \n";
                            }
                            ?>
                        </Select> <br>
                        <?php
                        $verified = false;
                        if (isset($_POST['pswd'])) {
                            $result = mysqli_query($conn_id, "Select pswd from auth WHERE user = 'user'");
                            $row = mysqli_fetch_assoc($result);
                            $verified = password_verify($_POST['pswd'], $row['pswd']);
                            if (!$verified) {
                                echo "<button class=\"btn btn-danger\">Incorrect Password </button>";
                            }
                        }
                        ?>
                    </fieldset>
                    <fieldset class="form-group" id="WeekSlots"> </td>
                        <legend> Free Timeslots</legend>
                        <div style="display: inline-block; padding:25px 25px 25px 25px; background-color: lightgreen;">
                            Free
                        </div>
                        <br>

                        <table class="text-center" id="freetable">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">TimeSlot</th>
                                <th scope="col">Monday</th>
                                <th scope="col">Tuesday</th>
                                <th scope="col">Wednesday</th>
                                <th scope="col">Thursday</th>
                                <th scope="col">Friday</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">09:00-10:00</th>
                                <td><input type="checkbox" name="Monday[]" value="9" id="m9">
                                    <label class="free" for="m9">Free</label></td>
                                <td><input type="checkbox" name="Tuesday[]" value="9" id="t9">
                                    <label class="free" for="t9">Free</label></td>
                                <td><input type="checkbox" name="Wednesday[]" value="9" id="w9">
                                    <label class="free" for="w9">Free</label></td>
                                <td><input type="checkbox" name="Thursday[]" value="9" id="r9">
                                    <label class="free" for="r9">Free</label></td>
                                <td><input type="checkbox" name="Friday[]" value="9" id="f9">
                                    <label class="free" for="f9">Free</label></td>
                            </tr>
                            <tr>
                                <th scope="row">10:00-11:00</th>
                                <td><input type="checkbox" name="Monday[]" value="10" id="m10">
                                    <label class="free" for="m10">Free</label></td>
                                <td><input type="checkbox" name="Tuesday[]" value="10" id="t10">
                                    <label class="free" for="t10">Free</label></td>
                                <td><input type="checkbox" name="Wednesday[]" value="10" id="w10">
                                    <label class="free" for="w10">Free</label></td>
                                <td><input type="checkbox" name="Thursday[]" value="10" id="r10">
                                    <label class="free" for="r10">Free</label></td>
                                <td><input type="checkbox" name="Friday[]" value="10" id="f10">
                                    <label class="free" for="f10">Free</label></td>
                            </tr>
                            <tr>
                                <th scope="row">11:00-12:00</th>

                                <td><input type="checkbox" name="Monday[]" value="11" id="m11">
                                    <label class="free" for="m11">Free</label></td>
                                <td><input type="checkbox" name="Tuesday[]" value="11" id="t11">
                                    <label class="free" for="t11">Free</label></td>
                                <td><input type="checkbox" name="Wednesday[]" value="11" id="w11">
                                    <label class="free" for="w11">Free</label></td>
                                <td><input type="checkbox" name="Thursday[]" value="11" id="r11">
                                    <label class="free" for="r11">Free</label></td>
                                <td><input type="checkbox" name="Friday[]" value="11" id="f11">
                                    <label class="free" for="f11">Free</label></td>
                            </tr>
                            <tr>
                                <th scope="row">12:00-13:00</th>

                                <td><input type="checkbox" name="Monday[]" value="12" id="m12">
                                    <label class="free" for="m12">Free</label></td>
                                <td><input type="checkbox" name="Tuesday[]" value="12" id="t12">
                                    <label class="free" for="t12">Free</label></td>
                                <td><input type="checkbox" name="Wednesday[]" value="12" id="w12">
                                    <label class="free" for="w12">Free</label></td>
                                <td><input type="checkbox" name="Thursday[]" value="12" id="r12">
                                    <label class="free" for="r12">Free</label></td>
                                <td><input type="checkbox" name="Friday[]" value="12" id="f12">
                                    <label class="free" for="f12">Free</label></td>
                            </tr>
                            <tr>
                                <th scope="row">13:00-14:00</th>

                                <td><input type="checkbox" name="Monday[]" value="13" id="m13">
                                    <label class="free" for="m13">Free</label></td>
                                <td><input type="checkbox" name="Tuesday[]" value="13" id="t13">
                                    <label class="free" for="t13">Free</label></td>
                                <td><input type="checkbox" name="Wednesday[]" value="13" id="w13">
                                    <label class="free" for="w13">Free</label></td>
                                <td><input type="checkbox" name="Thursday[]" value="13" id="r13">
                                    <label class="free" for="r13">Free</label></td>
                                <td><input type="checkbox" name="Friday[]" value="13" id="f13">
                                    <label class="free" for="f13">Free</label></td>
                            </tr>
                            <tr>
                                <th scope="row">14:00-15:00</th>

                                <td><input type="checkbox" name="Monday[]" value="14" id="m14">
                                    <label class="free" for="m14">Free</label></td>
                                <td><input type="checkbox" name="Tuesday[]" value="14" id="t14">
                                    <label class="free" for="t14">Free</label></td>
                                <td><input type="checkbox" name="Wednesday[]" value="14" id="w14">
                                    <label class="free" for="w14">Free</label></td>
                                <td><input type="checkbox" name="Thursday[]" value="14" id="r14">
                                    <label class="free" for="r14">Free</label></td>
                                <td><input type="checkbox" name="Friday[]" value="14" id="f14">
                                    <label class="free" for="f14">Free</label></td>
                            </tr>
                            <tr>
                                <th scope="row">15:00-16:00</th>

                                <td><input type="checkbox" name="Monday[]" value="15" id="m15">
                                    <label class="free" for="m15">Free</label></td>
                                <td><input type="checkbox" name="Tuesday[]" value="15" id="t15">
                                    <label class="free" for="t15">Free</label></td>
                                <td><input type="checkbox" name="Wednesday[]" value="15" id="w15">
                                    <label class="free" for="w15">Free</label></td>
                                <td><input type="checkbox" name="Thursday[]" value="15" id="r15">
                                    <label class="free" for="r15">Free</label></td>
                                <td><input type="checkbox" name="Friday[]" value="15" id="f15">
                                    <label class="free" for="f15">Free</label></td>
                            </tr>
                            <tr>
                                <th scope="row">16:00-17:00</th>

                                <td><input type="checkbox" name="Monday[]" value="16" id="m16">
                                    <label class="free" for="m16">Free</label></td>
                                <td><input type="checkbox" name="Tuesday[]" value="16" id="t16">
                                    <label class="free" for="t16">Free</label></td>
                                <td><input type="checkbox" name="Wednesday[]" value="16" id="w16">
                                    <label class="free" for="w16">Free</label></td>
                                <td><input type="checkbox" name="Thursday[]" value="16" id="r16">
                                    <label class="free" for="r16">Free</label></td>
                                <td><input type="checkbox" name="Friday[]" value="16" id="f16">
                                    <label class="free" for="f16">Free</label></td>
                            </tr>
                            <tr>
                                <th scope="row">17:00-18:00</th>

                                <td><input type="checkbox" name="Monday[]" value="17" id="m17">
                                    <label class="free" for="m17">Free</label></td>
                                <td><input type="checkbox" name="Tuesday[]" value="17" id="t17">
                                    <label class="free" for="t17">Free</label></td>
                                <td><input type="checkbox" name="Wednesday[]" value="17" id="w17">
                                    <label class="free" for="w17">Free</label></td>
                                <td><input type="checkbox" name="Thursday[]" value="17" id="r17">
                                    <label class="free" for="r17">Free</label></td>
                                <td><input type="checkbox" name="Friday[]" value="17" id="f17">
                                    <label class="free" for="f17">Free</label></td>
                            </tr>
                            <tr>
                                <th scope="row">18:00-19:00</th>

                                <td><input type="checkbox" name="Monday[]" value="18" id="m18">
                                    <label class="free" for="m18">Free</label></td>
                                <td><input type="checkbox" name="Tuesday[]" value="18" id="t18">
                                    <label class="free" for="t18">Free</label></td>
                                <td><input type="checkbox" name="Wednesday[]" value="18" id="w18">
                                    <label class="free" for="w18">Free</label></td>
                                <td><input type="checkbox" name="Thursday[]" value="18" id="r18">
                                    <label class="free" for="r18">Free</label></td>
                                <td><input type="checkbox" name="Friday[]" value="18" id="f18">
                                    <label class="free" for="f18">Free</label></td>
                            </tr>
                            <tr>
                                <th scope="row">19:00-20:00</th>

                                <td><input type="checkbox" name="Monday[]" value="19" id="m19">
                                    <label class="free" for="m19">Free</label></td>
                                <td><input type="checkbox" name="Tuesday[]" value="19" id="t19">
                                    <label class="free" for="t19">Free</label></td>
                                <td><input type="checkbox" name="Wednesday[]" value="19" id="w19">
                                    <label class="free" for="w19">Free</label></td>
                                <td><input type="checkbox" name="Thursday[]" value="19" id="r19">
                                    <label class="free" for="r19">Free</label></td>
                                <td><input type="checkbox" name="Friday[]" value="19" id="f19">
                                    <label class="free" for="f19">Free</label></td>
                            </tr>
                            <tr>
                                <th scope="row">20:00-21:00</th>
                                <td><input type="checkbox" name="Monday[]" value="20" id="m20">
                                    <label class="free" for="m20">Free</label></td>
                                <td><input type="checkbox" name="Tuesday[]" value="20" id="t20">
                                    <label class="free" for="t20">Free</label></td>
                                <td><input type="checkbox" name="Wednesday[]" value="20" id="w20">
                                    <label class="free" for="w20">Free</label></td>
                                <td><input type="checkbox" name="Thursday[]" value="20" id="r20">
                                    <label class="free" for="r20">Free</label></td>
                                <td><input type="checkbox" name="Friday[]" value="20" id="f20">
                                    <label class="free" for="f20">Free</label></td>
                            </tbody>
                        </table>
                        <label class="control-label requiredField" for="pswd">
                            Password
                            <span class="asteriskField">
       </span>
                        </label>
                        <input class="form-control" id="pswd" name="pswd" type="password" required/><br>

                        <button class="btn btn-warning" type="submit" onclick="confirm">'Insert Timetable Slots'
                        </button>
                        <br>
                        <?php
                        if (isset($_POST['SName']) && $_POST['SName'] != "" && $verified) {
                            $SName = $_POST['SName'];
                            if (isset($_POST['Monday'])) {
                                $monday = $_POST['Monday'];
                                foreach ($monday as $time) {
                                    $sqlprp = $conn_id->prepare("UPDATE AWS SET available  = 'y' WHERE sname = ? AND weekday ='m' AND timeslot = ?" );
                                    $sqlprp->bind_param("si", $Sname, $time);
                                    $sqlprp->execute();
                                }
                            }
                            if (isset($_POST['Tuesday'])) {
                                $Tuesday = $_POST['Tuesday'];
                                foreach ($Tuesday as $time) {
                                    $sqlprp = $conn_id->prepare("UPDATE AWS SET available  = 'y' WHERE sname = ? AND weekday ='t' AND timeslot = ?" );
                                    $sqlprp->bind_param("si", $Sname, $time);
                                    $sqlprp->execute();
                                }
                            }
                            if (!empty($_POST['Wednesday'])) {
                                $Wednesday = $_POST['Wednesday'];
                                foreach ($Wednesday as $time) {
                                    $sqlprp = $conn_id->prepare("UPDATE AWS SET available  = 'y' WHERE sname = ? AND weekday ='w' AND timeslot = ?" );
                                    $sqlprp->bind_param("si", $Sname, $time);
                                    $sqlprp->execute();
                                }
                            }
                            if (isset($_POST['Thursday'])) {
                                $Thursday = $_POST['Thursday'];
                                foreach ($Thursday as $time) {
                                    $sqlprp = $conn_id->prepare("UPDATE AWS SET available  = 'y' WHERE sname = ? AND weekday ='r' AND timeslot = ?" );
                                    $sqlprp->bind_param("si", $Sname, $time);
                                    $sqlprp->execute();
                                }
                            }
                            if (isset($_POST['Friday'])) {
                                $Friday = $_POST['Friday'];
                                foreach ($Friday as $time) {
                                    $sqlprp = $conn_id->prepare("UPDATE AWS SET available  = 'y' WHERE sname = ? AND weekday ='f' AND timeslot = ?" );
                                    $sqlprp->bind_param("si", $Sname, $time);
                                    $sqlprp->execute();
                                }
                            }
                            print("<button class=\"btn btn-success\">  Successfully updated Timetable Slots  </button>");
                        }

                        ?>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
