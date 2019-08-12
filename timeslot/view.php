<?php
//Created by Peter Prout, Animal Welfare Society Chairperson 2017-18, 2018-19.
$conn_id = new mysqli("localhost", "username", "password", "dbname");
$result = mysqli_query($conn_id, "Select * from AWS") or die(mysqli_error($conn_id));
while ($row = mysqli_fetch_row($result)) {
    echo $row[0] . "-" . $row[1] . "-" . $row[2] . "-" . $row[3] . "<br>";
}
