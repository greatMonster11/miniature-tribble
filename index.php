<html>
<head>
<sytle>
a {
  position: relative;
  display: inline-block;
   width: 150px;
   text-decoration: none;
   padding: 5px 10px;
   background: black;
   color: white; 
   border: 4px solid mediumseagreen;
   border-radius: 5px;
   text-align: center;
   font-weight: 600;
   box-shadow: 1px 2px 2px #888888;
}

a:hover {
  transform: translateY(2px);
}

a:active {
  box-shadow: 1px 2px 2px black;
}
</style>
</head>
<body>
<p>Le Quang Sang</p>

<a href="setup.php">Create database</a>
<a href="add_account.php">Add account</a>
<a href="list_account.php">List account</a>

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
