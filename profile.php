<?php
session_start();
	if(isset($_SESSION["name"]) )
	{    
    	$name= $_SESSION["name"];

?>

		<fieldset>
		    <legend><b>PROFILE</b></legend>
			<form>
				<br/>
				<table cellpadding="0" cellspacing="0">
					<tr>
						<td>Name</td>
						<td>:</td>
						<td>Bob</td>
						<td rowspan="7" align="center">
							<img width="128" src="../image/user.png"/>
		                    <br/>
		                    <a href="picture.php">Change</a>
						</td>
					</tr>		
					<tr><td colspan="3"><hr/></td></tr>
					<tr>
						<td>Email</td>
						<td>:</td>
						<td>bob@aiub.edu</td>
					</tr>		
					<tr><td colspan="3"><hr/></td></tr>			
					<tr>
						<td>Gender</td>
						<td>:</td>
						<td>Male</td>
					</tr>
					<tr><td colspan="3"><hr/></td></tr>
					<tr>
						<td>Date of Birth</td>
						<td>:</td>
						<td>19/09/1998</td>
					</tr>
				</table>	
		        <hr/>
		        <a href="#">Edit Profile</a>	
			</form>
		</fieldset>

<?php
		}
		else
		{
			echo "Please login first";
		}

?>	