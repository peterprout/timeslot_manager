<!DOCTYPE html>
<html lang='en'>
<head>
    <title> TimeMan</title>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <link rel='stylesheet' href='/timeman/css/bootstrap.css'/>
    <link rel='stylesheet' type='text/css' href='/timeman/css/timeman.css'>
    <link rel="icon" href='/timeman/img/favicon.ico'>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
</head>
<body class='timemanbody'>
<header>
    <nav class="navbar-default">
        <div class="row" id="navigation">
            <div class="brand brand-name navbar-left">
                <a href="#" class="pull-left"><img src="/timeman/img/logo.png" id="title"></a>
                <h1> TimeMan Showcase Project</h1>
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-default">
        <div>
            <ul class="nav navbar-nav">
                <li><a href="/timeman/" class="navbutton">Set Busy Times</a></li>
                <li><a href="/timeman/setfree" class="navbutton">Unset Busy times</a></li>
                <li id="admin"><a href="#" class="navbutton">Admin</a>
                    <ul class="nav navbar-nav" id="adminnav">
                        <li><a href="/timeman/newmem" class="navbutton">Insert new Member</a></li>
                        <li><a href="/timeman/resone" class="navbutton">Reset a member</a></li>
                        <li><a href="/timeman/remove" class="navbutton">Remove a member</a></li>
                        <li><a href="/timeman/reset" class="navbutton">Reset All</a></li>
                        <li><a href="/timeman/adminreset" class="navbutton">Reset Admin Password</a></li>
                        <li><a href="/timeman/resetdefault" class="navbutton">Reset Default Password</a></li>

                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>