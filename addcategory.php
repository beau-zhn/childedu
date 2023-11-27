<?php
session_start();
require("config.php");
if(isset($_SESSION['usr_id'])) {
	//header("Location: addcategory.php");
}

include_once 'dbconnect.php';

//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['addcat'])) {
	$name = mysqli_real_escape_string($con, $_POST['name']);
	//name can contain only alpha characters and space
	if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
		$error = true;
		$name_error = " category Name must contain only alphabets and space";
	}
	if (!$error) {
		if(mysqli_query($con, "INSERT INTO categories(name) VALUES('" . $name . "')")) {
			$successmsg = " Category has been added Successfully ! <a href='addproduct.php'>Click here to add product</a>";
		} else {
			$errormsg = "Error in adding category..Please try again later!";
		}


}
}
?>

<!DOCTYPE html>
<html>
<head> Add Category</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" >
</head>
<body>

		<!-- add header -->
			<a href="index.php"> Home</a>
		<!-- menu items -->
	
			

		<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="addcategory">
				<fieldset>
					<legend>Add Category</legend>

						<label for="name">category Name</label>
						<input type="text" name="name" placeholder="Enter Full Name" required value="<?php if($error) echo $name; ?>" />
						<span"><?php if (isset($name_error)) echo $name_error; ?></span>
						<input type="submit" name="addcat" value="ADD CATEGORY" />
				</fieldset>
			</form>
				<span ><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
			<span ><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
			
</body>
</html>