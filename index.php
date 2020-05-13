<html>
<body>
<p>Le Quang Sang</p>
<br /><a href="setup.php">Create database</a>
<br /><a href="add_account.php">Add account</a>
<br /><a href="list_account.php">List account</a>

<form action="welcome.php" method="post">
Ho va ten: <input type="text" name="name" id="name"><br />
E-mail: <input type="text" name="email" id="email"><br />
<input type="submit" />
</form>

<script>
	window.onload = function() {
		var name = document.getElementById("name")
		var email = document.getElementById("email")

		email.value = ""
		name.value = ""
	}
</script>

</body>
</html>
