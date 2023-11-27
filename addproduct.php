<?php

	error_reporting( ~E_NOTICE ); // avoid notice
	
	require_once 'dbconfig.php';
	include_once 'dbconnect.php';

	
	if(isset($_POST['btnsave']))
	{
		$pname = $_POST['p_name'];
		$pprice = $_POST['p_price'];
		$pdesc=  $_POST['p_desc'];
		$cid=$_POST['cid'];
		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
		
		
		if(empty($pname)){
			$errMSG = "Please Enter Product name.";
		}
		else if(empty($pprice)){
			$errMSG = "Please Enter Amount";
		}
		else if(empty($pdesc)){
			$errMSG = "Please FILL description";
		}
		
		else if(empty($imgFile)){
			$errMSG = "Please Select Image File.";
		}
		else
		{
			$upload_dir = 'productimages/'; // upload directory
	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
			// rename uploading image
			$userpic = rand(1000,1000000).".".$imgExt;
				
			// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){			
				// Check file size '5MB'
				if($imgSize < 5000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$userpic);
				}
				else{
					$errMSG = "Sorry, your file is too large.";
				}
			}
			else{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}
		}
		
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO products(name,description,price,cat_id,image) VALUES(:pname,:pdesc, :pprice,:cid, :upic)');
			$stmt->bindParam(':pname',$pname);
			$stmt->bindParam(':pprice',$pprice);
			$stmt->bindParam(':pdesc',$pdesc);
			$stmt->bindParam(':cid',$cid);
			$stmt->bindParam(':upic',$userpic);
			
			if($stmt->execute())
			{
				$successMSG = "new record succesfully inserted ...";
				header("refresh:5;index.php"); // redirects image view page after 5 seconds.
			}
			else
			{
				$errMSG = "error while inserting....";
			}
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">

</head>
<body>



<div class="container">


	<div class="page-header">
    	<h1 class="h2">add new product.</h1>
    </div>
    

	<?php
	if(isset($errMSG)){
			?>
            <div class="alert alert-danger">
            	<span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
            </div>
            <?php
	}
	else if(isset($successMSG)){
		?>
        <div class="alert alert-success">
              <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
        </div>
        <?php
	}
	?>   

<form method="post" enctype="multipart/form-data" class="form-horizontal">
	    
	<table class="table table-bordered table-responsive">
	<tr>
<td><label class="control-label">Category ID.</label></td>
        <td><select name="cid">
 <?php
// Establish Connection with Database
$con = mysql_connect("localhost","root","");
// Select Database
mysql_select_db("go4shop", $con);
// Specify the query to execute
$sql = "select * from categories";
// Execute query
$result = mysql_query($sql,$con);
// Loop through each records 
while($row = mysql_fetch_array($result))
{
$Id=$row['id'];
$service_name=$row['name'];
?>

	<option value="<?php echo $Id;?>"><?php echo $service_name;?></option>
	<?php
}
// Retrieve Number of records returned
$records = mysql_num_rows($result);
?>
</select></td>
	</tr>
    <tr>
    	<td><label class="control-label">Product name.</label></td>
        <td><input class="form-control" type="text" name="p_name" placeholder="Enter Product Name" value="<?php echo $pname; ?>" /></td>
    
    	<td><label class="control-label">Product Description.</label></td>
		 <td><input class="form-control" type="text" name="p_desc" placeholder="product description" value="<?php echo $pdesc; ?>" /></td>
      
   
    	<td><label class="control-label">Product Price.</label></td>
        <td><input class="form-control" type="text" name="p_price" placeholder="Product Price" value="<?php echo $pprice; ?>" /></td>
   
    	<td><label class="control-label">Upload Product Image.</label></td>
        <td><input class="input-group" type="file" name="user_image" accept="image/*" /></td>
    </tr>
	
    
    <tr>
        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> &nbsp; save
        </button>
        </td>
    </tr>
    
    </table>
    
</form>



<div class="alert alert-info">
   <!-- <strong>tutorial link !</strong> <a href="http://www.codingcage.com/2016/02/upload-insert-update-delete-image-using.html">Coding Cage</a>!-->
</div>

    

</div>



	


<!-- Latest compiled and minified JavaScript -->
<script src="bootstrap/js/bootstrap.min.js"></script>


</body>
</html>