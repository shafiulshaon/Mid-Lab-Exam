<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{


	$name = test_input($_POST["name"]);
  $email = $_POST["email"];
  $uname = test_input($_POST["userName"]);
  $pass = test_input($_POST["password"]);
  $gender;
  $dob =$_POST['dd'].'/'.$_POST['mm'].'/'.$_POST['yyyy'];

  $nameok=0;
  $emailok=0;
  $unameok=0;
  $passok=0;
  $genderok=0;
  $dobok=0;
  $confirmpass = test_input($_POST["confirmPassword"]);

  if (empty($_POST["name"])) 
  {
	 echo "Name is required</br>";
   $nameok=0;
  } 
  elseif(!preg_match("/^[a-zA-Z ]*$/",$name))
  {
		echo "Only letters and white space allowed in Name</br>";
      $nameok=0;
  }
   
  else
  {
	if (str_word_count($name)<2)
  {
			echo "Name should contain at least 2 words</br>";
        $nameok=0;
  }
	else
  {
      $nameok=1;
  }
  }  
 


  if (empty($_POST["email"])) 
  {
	 echo "Email is required</br>";
     $emailok=0;
  } 
  elseif(!preg_match("/^[a-zA-Z0-9-_.]+@[a-zA-Z-]+\.[a-zA-Z.]{2,5}$/",$_POST["email"]))
  {
		echo "Email not valid</br>";
      $emailok=0;
  }
   
  else
  {
		  $emailok=1;
  }  
 

	
  if (empty($_POST["userName"])) 
  {
	 echo "User name is required</br>";
     $unameok=0;
  }    
  else
  {
		  $unameok=1;
  }  
 

	
  if (empty($_POST["password"])) 
  {
	 echo "Password is required</br>";
     $passok=0;
  } 
	elseif(($_POST["confirmPassword"])!==($_POST["password"]))
  {
		echo "Password did not match</br>";
     $passok=0;
  }
  else
  {
		  $passok=1;
  }  
 

		if(empty($_POST['gender']))
    {
	   	echo "Please select Gender</br>";
        $genderok=0;
    }
	 else
   {
      if($_POST['gender']=="Male")
        {
          $gender="Male";
          $genderok=1;
        }
      else
        {
         $gender="Female";
         $genderok=1;
  
        }
   }


		if(isset($_POST['dd']) || isset($_POST['mm']) || isset($_POST['yyyy']))
	{
	if(empty($_POST['dd']) || empty($_POST['mm']) || empty($_POST['yyyy']))
	{
    echo "invalid date format</br>";
    $dobok=0;
  }
	else
	{	
		$dobok=1;
	}
	}

  if ($nameok==1 && $emailok==1 && $unameok==1 && $passok==1 && $genderok==1 && $dobok==1) 
  {
      $servername   ="localhost";
      $username   ="root";
      $password   ="";
      $dbname       ="midlabexam";

      $conn = mysqli_connect($servername, $username, $password, $dbname);
  
      if(!$conn)
       {
          die("Connection Error!".mysqli_connect_error());
       }
      else
       {

            $sql = "insert into user values ('$name','$email','$uname','$pass','$gender','$dob')";
            if(mysqli_query($conn, $sql))
              {
                echo "<br/> Data Inserted!";
                header("Location: login.php");
              }
            else
              {
                echo "<br/> SQL Error".mysqli_error($conn);
              }
              mysqli_close($conn);
       }
  }
  else
  {}


}
function test_input($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>