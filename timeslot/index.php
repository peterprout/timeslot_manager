
<?php
//Created by Peter Prout, Animal Welfare Society Chairperson 2017-18, 2018-19.
$conn_id = new mysqli("mysql", "user", "password", "db");
require 'header.php';

?>

<h1> Fill out Form below by selecting the timeslots you are NOT available. <br> Remember to include your Name. </h1>

<div class="bootstrap-iso">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-2 col-lg-4"></div>
            <div class="col-s-8 col-lg-4">
                <form action='/timeman/index.php' method='POST'>
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
                        </Select> <br>
                        <?php
                        $verified = false;
                        if (isset($_POST['pswd']) && isset($_POST['SName'])) {
                            $sqlprp = $conn_id->prepare("Select pswd from timeMan_user_auth WHERE user = ?");
                            $sqlprp->bind_param("s",$_POST['SName']);
                            $sqlprp->execute();
                            $result = $sqlprp->get_result();
                            $row = $result->fetch_assoc();
                            $verified = password_verify($_POST['pswd'], $row['pswd']);
                            if (!$verified) {
                                echo "<button class=\"btn btn-danger\">Incorrect Password </button>";
                            }
                        }
                        ?>
                    </fieldset>
                    <fieldset class="form-group" id="WeekSlots"> </td>
                        <legend> Busy Timeslots</legend>
                        <div style="display: inline-block; padding:25px 25px 25px 25px; background-color: lightgray;">
                            Free
                        </div>
                        <div style="display: inline-block; padding:25px 25px 25px 25px; background-color: lightcoral;">
                            Busy
                        </div>
                        <br>

                        <table class="text-center">
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
                                    <label class="whatever" for="m9">Busy</label></td>
                                <td><input type="checkbox" name="Tuesday[]" value="9" id="t9">
                                    <label class="whatever" for="t9">Busy</label></td>
                                <td><input type="checkbox" name="Wednesday[]" value="9" id="w9">
                                    <label class="whatever" for="w9">Busy</label></td>
                                <td><input type="checkbox" name="Thursday[]" value="9" id="r9">
                                    <label class="whatever" for="r9">Busy</label></td>
                                <td><input type="checkbox" name="Friday[]" value="9" id="f9">
                                    <label class="whatever" for="f9">Busy</label></td>
                            </tr>
                            <tr>
                                <th scope="row">10:00-11:00</th>
                                <td><input type="checkbox" name="Monday[]" value="10" id="m10">
                                    <label class="whatever" for="m10">Busy</label></td>
                                <td><input type="checkbox" name="Tuesday[]" value="10" id="t10">
                                    <label class="whatever" for="t10">Busy</label></td>
                                <td><input type="checkbox" name="Wednesday[]" value="10" id="w10">
                                    <label class="whatever" for="w10">Busy</label></td>
                                <td><input type="checkbox" name="Thursday[]" value="10" id="r10">
                                    <label class="whatever" for="r10">Busy</label></td>
                                <td><input type="checkbox" name="Friday[]" value="10" id="f10">
                                    <label class="whatever" for="f10">Busy</label></td>
                            </tr>
                            <tr>
                                <th scope="row">11:00-12:00</th>

                                <td><input type="checkbox" name="Monday[]" value="11" id="m11">
                                    <label class="whatever" for="m11">Busy</label></td>
                                <td><input type="checkbox" name="Tuesday[]" value="11" id="t11">
                                    <label class="whatever" for="t11">Busy</label></td>
                                <td><input type="checkbox" name="Wednesday[]" value="11" id="w11">
                                    <label class="whatever" for="w11">Busy</label></td>
                                <td><input type="checkbox" name="Thursday[]" value="11" id="r11">
                                    <label class="whatever" for="r11">Busy</label></td>
                                <td><input type="checkbox" name="Friday[]" value="11" id="f11">
                                    <label class="whatever" for="f11">Busy</label></td>
                            </tr>
                            <tr>
                                <th scope="row">12:00-13:00</th>

                                <td><input type="checkbox" name="Monday[]" value="12" id="m12">
                                    <label class="whatever" for="m12">Busy</label></td>
                                <td><input type="checkbox" name="Tuesday[]" value="12" id="t12">
                                    <label class="whatever" for="t12">Busy</label></td>
                                <td><input type="checkbox" name="Wednesday[]" value="12" id="w12">
                                    <label class="whatever" for="w12">Busy</label></td>
                                <td><input type="checkbox" name="Thursday[]" value="12" id="r12">
                                    <label class="whatever" for="r12">Busy</label></td>
                                <td><input type="checkbox" name="Friday[]" value="12" id="f12">
                                    <label class="whatever" for="f12">Busy</label></td>
                            </tr>
                            <tr>
                                <th scope="row">13:00-14:00</th>

                                <td><input type="checkbox" name="Monday[]" value="13" id="m13">
                                    <label class="whatever" for="m13">Busy</label></td>
                                <td><input type="checkbox" name="Tuesday[]" value="13" id="t13">
                                    <label class="whatever" for="t13">Busy</label></td>
                                <td><input type="checkbox" name="Wednesday[]" value="13" id="w13">
                                    <label class="whatever" for="w13">Busy</label></td>
                                <td><input type="checkbox" name="Thursday[]" value="13" id="r13">
                                    <label class="whatever" for="r13">Busy</label></td>
                                <td><input type="checkbox" name="Friday[]" value="13" id="f13">
                                    <label class="whatever" for="f13">Busy</label></td>
                            </tr>
                            <tr>
                                <th scope="row">14:00-15:00</th>

                                <td><input type="checkbox" name="Monday[]" value="14" id="m14">
                                    <label class="whatever" for="m14">Busy</label></td>
                                <td><input type="checkbox" name="Tuesday[]" value="14" id="t14">
                                    <label class="whatever" for="t14">Busy</label></td>
                                <td><input type="checkbox" name="Wednesday[]" value="14" id="w14">
                                    <label class="whatever" for="w14">Busy</label></td>
                                <td><input type="checkbox" name="Thursday[]" value="14" id="r14">
                                    <label class="whatever" for="r14">Busy</label></td>
                                <td><input type="checkbox" name="Friday[]" value="14" id="f14">
                                    <label class="whatever" for="f14">Busy</label></td>
                            </tr>
                            <tr>
                                <th scope="row">15:00-16:00</th>

                                <td><input type="checkbox" name="Monday[]" value="15" id="m15">
                                    <label class="whatever" for="m15">Busy</label></td>
                                <td><input type="checkbox" name="Tuesday[]" value="15" id="t15">
                                    <label class="whatever" for="t15">Busy</label></td>
                                <td><input type="checkbox" name="Wednesday[]" value="15" id="w15">
                                    <label class="whatever" for="w15">Busy</label></td>
                                <td><input type="checkbox" name="Thursday[]" value="15" id="r15">
                                    <label class="whatever" for="r15">Busy</label></td>
                                <td><input type="checkbox" name="Friday[]" value="15" id="f15">
                                    <label class="whatever" for="f15">Busy</label></td>
                            </tr>
                            <tr>
                                <th scope="row">16:00-17:00</th>

                                <td><input type="checkbox" name="Monday[]" value="16" id="m16">
                                    <label class="whatever" for="m16">Busy</label></td>
                                <td><input type="checkbox" name="Tuesday[]" value="16" id="t16">
                                    <label class="whatever" for="t16">Busy</label></td>
                                <td><input type="checkbox" name="Wednesday[]" value="16" id="w16">
                                    <label class="whatever" for="w16">Busy</label></td>
                                <td><input type="checkbox" name="Thursday[]" value="16" id="r16">
                                    <label class="whatever" for="r16">Busy</label></td>
                                <td><input type="checkbox" name="Friday[]" value="16" id="f16">
                                    <label class="whatever" for="f16">Busy</label></td>
                            </tr>
                            <tr>
                                <th scope="row">17:00-18:00</th>

                                <td><input type="checkbox" name="Monday[]" value="17" id="m17">
                                    <label class="whatever" for="m17">Busy</label></td>
                                <td><input type="checkbox" name="Tuesday[]" value="17" id="t17">
                                    <label class="whatever" for="t17">Busy</label></td>
                                <td><input type="checkbox" name="Wednesday[]" value="17" id="w17">
                                    <label class="whatever" for="w17">Busy</label></td>
                                <td><input type="checkbox" name="Thursday[]" value="17" id="r17">
                                    <label class="whatever" for="r17">Busy</label></td>
                                <td><input type="checkbox" name="Friday[]" value="17" id="f17">
                                    <label class="whatever" for="f17">Busy</label></td>
                            </tr>
                            <tr>
                                <th scope="row">18:00-19:00</th>

                                <td><input type="checkbox" name="Monday[]" value="18" id="m18">
                                    <label class="whatever" for="m18">Busy</label></td>
                                <td><input type="checkbox" name="Tuesday[]" value="18" id="t18">
                                    <label class="whatever" for="t18">Busy</label></td>
                                <td><input type="checkbox" name="Wednesday[]" value="18" id="w18">
                                    <label class="whatever" for="w18">Busy</label></td>
                                <td><input type="checkbox" name="Thursday[]" value="18" id="r18">
                                    <label class="whatever" for="r18">Busy</label></td>
                                <td><input type="checkbox" name="Friday[]" value="18" id="f18">
                                    <label class="whatever" for="f18">Busy</label></td>
                            </tr>
                            <tr>
                                <th scope="row">19:00-20:00</th>

                                <td><input type="checkbox" name="Monday[]" value="19" id="m19">
                                    <label class="whatever" for="m19">Busy</label></td>
                                <td><input type="checkbox" name="Tuesday[]" value="19" id="t19">
                                    <label class="whatever" for="t19">Busy</label></td>
                                <td><input type="checkbox" name="Wednesday[]" value="19" id="w19">
                                    <label class="whatever" for="w19">Busy</label></td>
                                <td><input type="checkbox" name="Thursday[]" value="19" id="r19">
                                    <label class="whatever" for="r19">Busy</label></td>
                                <td><input type="checkbox" name="Friday[]" value="19" id="f19">
                                    <label class="whatever" for="f19">Busy</label></td>
                            </tr>
                            <tr>
                                <th scope="row">20:00-21:00</th>
                                <td><input type="checkbox" name="Monday[]" value="20" id="m20">
                                    <label class="whatever" for="m20">Busy</label></td>
                                <td><input type="checkbox" name="Tuesday[]" value="20" id="t20">
                                    <label class="whatever" for="t20">Busy</label></td>
                                <td><input type="checkbox" name="Wednesday[]" value="20" id="w20">
                                    <label class="whatever" for="w20">Busy</label></td>
                                <td><input type="checkbox" name="Thursday[]" value="20" id="r20">
                                    <label class="whatever" for="r20">Busy</label></td>
                                <td><input type="checkbox" name="Friday[]" value="20" id="f20">
                                    <label class="whatever" for="f20">Busy</label></td>
                            </tbody>
                        </table>
                        <label class="control-label requiredField" for="pswd">
                            Password
                            <span class="asteriskField">
       </span>
                        </label>
                        <input class="form-control" id="pswd" name="pswd" type="password" required/><br>
                        <button class="btn btn-warning" type="submit">Insert Timetable Slots</button>
                        <br>

                        <?php
                        if (isset($_POST['SName']) && $_POST['SName'] != "" && $verified) {
                            $Sname = $_POST['SName'];
                            if (isset($_POST['Monday'])) {
                                $monday = $_POST['Monday'];
                                foreach ($monday as $time) {
                                    $sqlprp = $conn_id->prepare("UPDATE timeMan SET available  = 'n' WHERE sname = ? AND weekday ='m' AND timeslot = ?" );
                                    $sqlprp->bind_param("si", $Sname, $time);
                                    $sqlprp->execute();
                                }
                            }
                            if (isset($_POST['Tuesday'])) {
                                $Tuesday = $_POST['Tuesday'];
                                foreach ($Tuesday as $time) {
                                    $sqlprp = $conn_id->prepare("UPDATE timeMan SET available  = 'n' WHERE sname = ? AND weekday ='t' AND timeslot = ?" );
                                    $sqlprp->bind_param("si", $Sname, $time);
                                    $sqlprp->execute();
                                }
                            }
                            if (!empty($_POST['Wednesday'])) {
                                $Wednesday = $_POST['Wednesday'];
                                foreach ($Wednesday as $time) {
                                    $sqlprp = $conn_id->prepare("UPDATE timeMan SET available  = 'n' WHERE sname = ? AND weekday ='w' AND timeslot = ?" );
                                    $sqlprp->bind_param("si", $Sname, $time);
                                    $sqlprp->execute();
                                }
                            }
                            if (isset($_POST['Thursday'])) {
                                $Thursday = $_POST['Thursday'];
                                foreach ($Thursday as $time) {
                                    $sqlprp = $conn_id->prepare("UPDATE timeMan SET available  = 'n' WHERE sname = ? AND weekday ='r' AND timeslot = ?" );
                                    $sqlprp->bind_param("si", $Sname, $time);
                                    $sqlprp->execute();
                                }
                            }
                            if (isset($_POST['Friday'])) {
                                $Friday = $_POST['Friday'];
                                foreach ($Friday as $time) {
                                    $sqlprp = $conn_id->prepare("UPDATE timeMan SET available  = 'n' WHERE sname = ? AND weekday ='f' AND timeslot = ?" );
                                    $sqlprp->bind_param("si", $Sname, $time);
                                    $sqlprp->execute();
                                }
                            }
                            print("<button class=\"btn btn-success\">  Successfully added Timetable Slots  </button>");
                        } else if (!isset($_POST['SName'])) {
                            echo "<button class=\"btn btn-danger\">Please choose a name </button>";
                        }
                        ?>
                    </fieldset>
                </form>
            </div>
        </div>


        <script>
            var app = angular.module("myApp", []);
            app.controller("myCtrl", function ($scope) {
                $scope.timeslots = {
                    '9': 0,
                    '10': 1,
                    '11': 2,
                    '12': 3,
                    '13': 4,
                    '14': 5,
                    '15': 6,
                    '16': 7,
                    '17': 8,
                    '18': 9,
                    '19': 10,
                    '20': 11,
                };
                $scope.monday = [
                    [],
                    [],
                    [],
                    [],
                    [],
                    [],
                    [],
                    [],
                    [],
                    [],
                    [],
                    [],
                ];
                $scope.tuesday = [
                    [],
                    [],
                    [],
                    [],
                    [],
                    [],
                    [],
                    [],
                    [],
                    [],
                    [],
                    [],
                ];
                $scope.wednesday = [
                    [],
                    [],
                    [],
                    [],
                    [],
                    [],
                    [],
                    [],
                    [],
                    [],
                    [],
                    [],
                ];
                $scope.thursday = [
                    [],
                    [],
                    [],
                    [],
                    [],
                    [],
                    [],
                    [],
                    [],
                    [],
                    [],
                    [],
                ];
                $scope.friday = [
                    [],
                    [],
                    [],
                    [],
                    [],
                    [],
                    [],
                    [],
                    [],
                    [],
                    [],
                    [],
                ];

                <?php
                $result = mysqli_query($conn_id, "Select * from timeMan WHERE available = 'n'");
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['weekday'] == 'm') {
                        echo "\$scope.monday[\$scope.timeslots['" . $row['timeslot'] . "']].push('" . $row['sname'] . "');\n";
                    }
                    if ($row['weekday'] == 't') {
                        echo "\$scope.tuesday[\$scope.timeslots['" . $row['timeslot'] . "']].push('" . $row['sname'] . "');\n";
                    }
                    if ($row['weekday'] == 'w') {
                        echo "\$scope.wednesday[\$scope.timeslots['" . $row['timeslot'] . "']].push('" . $row['sname'] . "');\n";
                    }
                    if ($row['weekday'] == 'r') {
                        echo "\$scope.thursday[\$scope.timeslots['" . $row['timeslot'] . "']].push('" . $row['sname'] . "');\n";
                    }
                    if ($row['weekday'] == 'f') {
                        echo "\$scope.friday[\$scope.timeslots['" . $row['timeslot'] . "']].push('" . $row['sname'] . "');\n";
                    }
                }
                ?>
                $scope.names = function (e, x) {
                    let string = "-";
                    for (i = 0; i < x.length; i++) {
                        string += " " + x[i] + " -"
                    }
                    var div = $('#names');
                    div.show();
                    div.css({'top': e.pageY - 30, 'left': e.pageX, 'border': '1px solid black', 'padding': '5px'});
                    $('#nameslot').html('<span>' + string + '</span>');
                }
                console.log($scope.monday);
                console.log($scope.tuesday);
                console.log($scope.wednesday);
                console.log($scope.thursday);
                console.log($scope.friday);

            });

        </script>
        <div class="row">
            <div class="col-xs-12 col-lg-3"></div>
            <div class="col-s-12 col-lg-6">
                <table id="timetable" ng-app="myApp" ng-controller="myCtrl">
                    <tr>
                        <th> Day</th>
                        <th> 9-10</th>
                        <th> 10-11</th>
                        <th> 11-12</th>
                        <th> 12-13</th>
                        <th> 13-14</th>
                        <th> 14-15</th>
                        <th> 15-16</th>
                        <th> 16-17</th>
                        <th> 17-18</th>
                        <th> 18-19</th>
                        <th> 19-20</th>
                        <th> 20-21</th>
                    </tr>
                    <tr id="monrows">
                        <th scope="row">Monday</th>
                        <td ng-repeat="x in monday">
                    <span ng-click="names($event,x)" ng-style="x.length == 0 && {'background-color': 'lime'} || x.length == 1 &&
                    {'background-color': 'greenyellow'} || x.length == 2 && {'background-color': 'lightgreen'} ||
                     x.length > 4 && {'background-color': 'crimson'} ||
                    {'background-color': 'orange'}"> {{x.length}}</span></td>
                    </tr>
                    <tr id="tuesrows" r>
                        <th scope="row">Tuesday</th>
                        <td ng-repeat="x in tuesday">
                    <span ng-click="names($event,x)" ng-style="x.length == 0 && {'background-color': 'lime'} || x.length == 1 &&
                    {'background-color': 'greenyellow'} || x.length == 2 && {'background-color': 'lightgreen'} ||
                     x.length > 4 && {'background-color': 'crimson'} ||
                    {'background-color': 'orange'}">{{x.length}}</span></td>
                    </tr>
                    <tr id="wedrows">
                        <th scope="row">Wednesday</th>
                        <td ng-repeat="x in wednesday">
                    <span ng-click="names($event,x)" ng-style="x.length == 0 && {'background-color': 'lime'} || x.length == 1 &&
                    {'background-color': 'greenyellow'} || x.length == 2 && {'background-color': 'lightgreen'} ||
                     x.length > 4 && {'background-color': 'crimson'} ||
                    {'background-color': 'orange'}">{{x.length}}</span></td>
                    </tr>
                    <tr id="thurrows">
                        <th scope="row">Thursday</th>
                        <td ng-repeat="x in thursday">
                    <span ng-click="names($event,x)" ng-style="x.length == 0 && {'background-color': 'lime'} || x.length == 1 &&
                    {'background-color': 'greenyellow'} || x.length == 2 && {'background-color': 'lightgreen'} ||
                     x.length > 4 && {'background-color': 'crimson'} ||
                    {'background-color': 'orange'}">{{x.length}}</span></td>
                    </tr>
                    <tr id="frirows">
                        <th scope="row">Friday</th>
                        <td ng-repeat="x in friday">
                    <span ng-click="names($event,x)" ng-style="x.length == 0 && {'background-color': 'lime'} || x.length == 1 &&
                    {'background-color': 'greenyellow'} || x.length == 2 && {'background-color': 'lightgreen'} ||
                     x.length > 4 && {'background-color': 'crimson'} ||
                    {'background-color': 'orange'}">{{x.length}}</span></td>
                    </tr>
                </table>
            </div>
            <div id="names">
                <script>
                    $().ready(function () {
                        $('#closeButton').click(function (e) {
                            $(e.target).parent().hide();
                        });
                    });
                </script>
                <button id="closeButton">X</button>
                <div id="nameslot"></div>
            </div>

        </div>
    </div>
    <p> Site by Peter Prout </p>
</div>
</body>
</html>
