<?php
/**
 * Created by PhpStorm.
 * User: peter
 * Date: 12/08/2019
 * Time: 13:48
 */
$conn_id = new mysqli("localhost", "username", "password", "dbname");
mysqli_query($conn_id, "DROP TABLE IF EXISTS AWS_auth;") or die(mysqli_error($conn_id));
mysqli_query($conn_id, "CREATE TABLE AWS_auth(
user VARCHAR(64),
pswd VARCHAR (64),
PRIMARY KEY (user)
) ") or die(mysqli_error($conn_id));

//ADMIN PASSWORD ADDING
$admin = password_hash("adminPASSWORD", PASSWORD_BCRYPT);
$user = password_hash("userPASSWORD", PASSWORD_BCRYPT);
mysqli_query($conn_id,"INSERT INTO AWS_auth (user,pswd) VALUES ('admin','$admin'), ('user','$user')") or die(mysqli_error($conn_id));


echo "Authorization table created successfully!";
