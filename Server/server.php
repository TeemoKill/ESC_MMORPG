<html>
<body>
	<?
    $my_mysqli = new mysqli("127.0.0.1:3306", "root", "", "MMOGame");

    if (mysqli_connect_error()) {
        die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
    }
    echo 'Connect success... '.$my_mysqli->host_info.PHP_EOL;
    echo "<br><br>";

	$username = $_POST["username"];
	$password = $_POST["password"];
	echo "<br>Your username: ".$username;
	echo "<br>Your password: ".$password;

	echo "<br><br>";

	//mysqli_query($my_mysqli, "set names 'utf-8");
	//if ($username) {
        $user_exist_result = mysqli_query($my_mysqli, "select 1 from user_data where username='$username';");
        $user_exist = mysqli_fetch_assoc($user_exist_result)["1"];
        if ($user_exist) {
            $result = mysqli_query($my_mysqli, "select * from user_data where username='$username';");
            $row = mysqli_fetch_assoc($result);
            if ($password != $row["password"]) {
                echo "Wrong password.";
                exit();
            }
        } else {
            echo "User not exist.".PHP_EOL;
            exit();
        }
    /*} else {
	    echo "Username is empty.".PHP_EOL;
	    exit();
    }*/

	echo "<br>ID: ".$row["id"].PHP_EOL;
	echo "<br>Username: ".$row["username"].PHP_EOL;
	echo "<br>Password: ".$row["password"].PHP_EOL;
    echo "<br>Level: ".$row["level"].PHP_EOL;
    echo "<br>Bio: ".$row["bio"].PHP_EOL;


	?>
</body>
</html>
