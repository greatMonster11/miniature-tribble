<!DOCTYPE html>
<html>
<head>
<style>
    .error {
        color: #FF0001;
    }
    input[type=submit] {
 	padding: 5px 10px;
    }
</style>
</head>
<body>
<nav> 
	<a href="/index.php">HOME</a>
</nav>
<h2>PHP Form validation example</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Username: <input type="text" name="username" value="<?php echo $username;?>" /> <br />    
    Password: <input type="password" name="password" value="<?php echo $password;?>" /> <br />    
    <input type="submit" name="submit" value="Submit" />
</form>
<?php
    $username=$_POST["username"];
    $password=$_POST["password"];

    function pg_connection_string_from_database_url() {
        extract(parse_url($_ENV["DATABASE_URL"]));
        return "user=$user password=$pass host=$host dbname=" . substr($path, 1); 
        # <- You may want to add sslmode=require there too    
    }

    $db = pg_connect(pg_connection_string_from_database_url());
    if (!$db) {
        echo "Error: Unable to open database\n";
    } else {
        echo "Opened database successfully\n";
    }

    $sql = "INSERT INTO MyAccounts (username, password) VALUES ('$username', '$password')";
    print "<br />$sql<br />";

    $ret = pg_query($db, $sql);
    if (!$ret) {
        echo pg_last_error($db);
    } else {
        echo "Insert successfully";
    }

    pg_close($db);
?>  
</body>
</html>
