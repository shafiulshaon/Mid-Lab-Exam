<?php
error_reporting(0);
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
if(isset($_POST['name'])&&isset($_POST['pass']))
{
        $name=$_POST['name'];
        $pass=$_POST['pass'];

    $servername ="localhost";
    $username   ="root";
    $password   ="";
    $dbname     ="midlabexam";
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    if(!$conn){
        die("Connection Error!".mysqli_connect_error());
    }
    
    $sql = "select * from user";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result)>0){
        
        while($row=mysqli_fetch_assoc($result)){

            if ($name==$row['username']&&$pass==$row['password']) 
            {
                $_SESSION["name"] = $name;
                if (isset($_POST['remember'])) 
                {
                    setcookie("name", $name, time() + (86400 * 30), "/");
                    setcookie("pass", $pass, time() + (86400 * 30), "/");
                }
                header("Location: loggedin_layout.php?name=$name");
                //header("Location: loggedin_layout.php");
            }
            else
            {
                //header("Location: login.php?ret=error");
                echo "User name or password didnot match</br>";    
            }
        }
        
    }else{
        echo "Result not found!";
    }

    mysqli_close($conn);
}
}
?>

<?php  

if(isset($_COOKIE['name']) && isset($_COOKIE['pass']))
{
    $name=$_COOKIE['name'];
    header("Location: loggedin_layout.php?name=$name");
}
else
{
?>

<fieldset>
    <legend><b>LOGIN</b></legend>
    <form action="#" method="POST">
        <table>
            <tr>
                <td>User Name</td>
				<td>:</td>
                <td><input name="name" type="text"></td>
            </tr>
            <tr>
                <td>Password</td>
				<td>:</td>
                <td><input name="pass" type="password"></td>
            </tr>
        </table>
        <hr />
		<input name="remember" type="checkbox">Remember Me
		<br/><br/>
        <input name="submit" type="submit" value="Submit">        
		<a href="forgot_password.html">Forgot Password?</a>
    </form>
</fieldset>

<?php
}
?>