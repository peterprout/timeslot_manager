<?php
/**
 * Created by PhpStorm.
 * User: peter
 * Date: 12/08/2019
 * Time: 13:48
 */
$conn_id = new mysqli("localhost", "username", "password", "dbname");
mysqli_query($conn_id, "DROP TABLE IF EXISTS AWS;") or die(mysqli_error($conn_id));
mysqli_query($conn_id, "CREATE TABLE AWS(
sname VARCHAR(64),
weekday CHAR(1),
timeslot INT,
available CHAR(1) DEFAULT 'y',
PRIMARY KEY (sname,weekday,timeslot)
) ") or die(mysqli_error($conn_id));
echo "Timeslot table created successfully!";
