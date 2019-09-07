<?php
/**
 * Created by PhpStorm.
 * User: peter
 * Date: 12/08/2019
 * Time: 13:48
 */
$conn_id = new mysqli("mysql", "user", "password", "db");
mysqli_query($conn_id, "DROP TABLE IF EXISTS timeMan_auth;") or die(mysqli_error($conn_id));
mysqli_query($conn_id, "CREATE TABLE timeMan_auth(
user VARCHAR(64),
pswd VARCHAR (64),
PRIMARY KEY (user)
) ") or die(mysqli_error($conn_id));

mysqli_query($conn_id, "DROP TABLE IF EXISTS timeMan_user_auth;") or die(mysqli_error($conn_id));
mysqli_query($conn_id, "CREATE TABLE timeMan_user_auth(
user VARCHAR(64),
pswd VARCHAR (64),
PRIMARY KEY (user)
) ") or die(mysqli_error($conn_id));


//ADMIN PASSWORD ADDING
$admin = password_hash("adminPASSWORD", PASSWORD_BCRYPT);
mysqli_query($conn_id,"INSERT INTO timeMan_auth (user,pswd) VALUES ('admin','$admin')") or die(mysqli_error($conn_id));


echo "Authorization table created successfully!";
