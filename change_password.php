<?php
session_start();
    if(isset($_SESSION["name"]) )
    {    
        $name= $_SESSION["name"];

?>

<fieldset>
    <legend><b>CHANGE PASSWORD</b></legend>
    <form>
        <table>
            <tr>
                <td><font size="3">Current Password</font></td>
				<td>:</td>
                <td><input type="password" /></td>
                <td></td>
            </tr>
            <tr>
                <td><font size="3" color="green">New Password</font></td>
				<td>:</td>
                <td><input type="password" /></td>
                <td></td>
            </tr>
            <tr>
                <td><font size="3" color="red">Retype New Password</font></td>
				<td>:</td>
                <td><input type="password" /></td>
                <td></td>
            </tr>
        </table>
        <hr />
        <input type="submit" value="Submit" />
    </form>
</fieldset>

<?php
        }
        else
        {
            echo "Please login first";
        }

?>  