<?php
session_start();
session_unset();
session_destroy();
echo 'You are logged out <br>
<a href="/arp/login.html">Log In</a><br>
<a href="/arp/index.html">Home</a>
';
?>