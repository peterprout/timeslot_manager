<!DOCTYPE html>
<html lang='en'>
<head>
    <title> Animal Welfare Society</title>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <link rel='stylesheet' href='/aws/css/bootstrap.css'/>
    <link rel='stylesheet' type='text/css' href='/aws/css/aws.css'>
    <link rel="icon" href='/aws/img/favicon.ico'>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
</head>
<body class='awsbody'>
<header>
    <nav class="navbar-default">
        <div class="row" id="navigation">
            <div class="brand brand-name navbar-left">
                <a href="#" class="pull-left"><img src="/aws/img/logo.jpg" id="title"></a>
                <h1> UCC Animal Welfare Society</h1>
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-default">
        <div>
            <ul class="nav navbar-nav">
                <li><a href="/aws/" class="navbutton">Set Busy Times</a></li>
                <li><a href="/aws/setfree" class="navbutton">Unset Busy times</a></li>
                <li id="admin"><a href="#" class="navbutton">Admin</a>
                    <ul class="nav navbar-nav" id="adminnav">
                        <li><a href="/aws/newmem" class="navbutton">Insert new Member</a></li>
                        <li><a href="/aws/resone" class="navbutton">Reset a member</a></li>
                        <li><a href="/aws/remove" class="navbutton">Remove a member</a></li>
                        <li><a href="/aws/reset" class="navbutton">Reset All</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>