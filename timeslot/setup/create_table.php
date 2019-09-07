<?php
/**
 * Created by PhpStorm.
 * User: peter
 * Date: 12/08/2019
 * Time: 13:48
 */
echo "abc";
$conn_id = new mysqli("mysql", "user", "password", "db");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
mysqli_query($conn_id, "DROP TABLE IF EXISTS timeMan;") or die("help  " . mysqli_error($conn_id));
echo"hhh";
mysqli_query($conn_id, "CREATE TABLE timeMan(
sname VARCHAR(64),
weekday CHAR(1),
timeslot INT,
available CHAR(1) DEFAULT 'y',
PRIMARY KEY (sname,weekday,timeslot)
) ") or die(mysqli_error($conn_id));
echo "Timeslot table created successfully!";
