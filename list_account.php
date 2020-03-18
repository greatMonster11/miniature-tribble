<!DOCTYPE html>
<html>
    <head>
        <style>
            .error {
                color: #FF0000;
            }
        </style>
    </head>
    <body>
        <?php
            function pg_connection_string_from_database_url() {
                extract(parse_url($EVN["DATABASE_URL"]));
                return "user=$user password=$password host=$host dbname=" . substr($path, 1);
                # <- you may want to add sslmode=require there too
            }

            $db = pg_connect(pg_connection_string_from_database_url());
            if (!$db) {
                echo "Error: Unable to open database\n";
            } else {
                echo "Opened database successfully\n";
            }

            $sql = "Select * from MyAccounts";
            print "<br />$sql  <br />";
            $ret = pg_query($db, $sql);
            if (!$ret) {
                echo pg_last_error($db);
                exit();
            }
        ?>
    
        <table border="1" cellspacing="2" cellpadding="2">
            <tr>
                <td>Username</td>
                <td>Password</td>
            </tr>
            <?php
                while($my_row = pg_fetch_assoc($ret)) {
                    printf("<tr><td>%s</td><td>%s</td></tr>", $my_row['username'], $my_row['password']);
                }
                pg_close($db);
            ?>
        </table> 
        <br /> 
        <a href="index.php">HOME</a>
</body>
</html>
