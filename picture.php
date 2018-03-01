<?php
session_start();
	if(isset($_SESSION["name"]) )
	{    
    	$name= $_SESSION["name"];

?>

		<fieldset>
		    <legend><b>PROFILE PICTURE</b></legend>
		    <form>
		        <img width="128" src="../image/user.png" />
		        <br />
		        <input type="file">
		        <hr />
		        <input type="submit" value="Submit">
		    </form>
		</fieldset>

<?php
		}
		else
		{
			echo "Please login first";
		}

?>	