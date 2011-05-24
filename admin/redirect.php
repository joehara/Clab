<html>
<head>


<title>Welcome to SiamDev.com</title>
<meta http-equiv="Content-Type" content="text/html; charset=TIS-620">
<? //<meta http-equiv="Refresh" content="5; URL=../index.html"> ?>

</head>
<body>
<center><h2><?php

/* set the cache limiter to 'private' */

session_cache_limiter('private');
$cache_limiter = session_cache_limiter();

/* set the cache expire to 30 minutes */
session_cache_expire(30);
$cache_expire = session_cache_expire();

/* start the session */

session_start();

echo "The cache limiter is now set to $cache_limiter<br />";
echo "The cached session pages expire after $cache_expire minutes";
?>&nbsp;</h2>
</center>
</body>
</html>