<!doctype html>

<html>

	<head>
		<title>PHP Form</title>
		<meta charset="utf-8">	

		<style>
		.error {
			color: red;
		}
		</style>
		
	</head>

<body>
<?php
// we are creating all the variables first that will be filled in the form, all the variable names come from
//the name section of the input names.
$name = $website = $position =$experiance =$estatus =$comments = "";


if($_SERVER["REQUEST_METHOD"]=="POST"){
  if(empty($_POST["name"])){
    echo "enter your name";
  }elseif(!preg_match("/^[a-zA-z]*$/",$_POST["name"])){ //name 
    echo "Name can only have letters";
  }elseif(empty($_POST["website"])){
    echo "Enter your website";
  }elseif(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$_POST["website"])){
    echo "website, wrong format";
  }
  else{
    $name = val ($_POST["name"]);
    $website = val ($_POST["website"]);
    $position = val ($_POST["position"]);
    $experiance = val ($_POST["experiance"]);
    $estatus = val ($_POST["estatus"]);
    $comments  = val ($_POST["comments"]);
  }
}


function val($data){
  $data =trim($data);
  $data =stripcslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>






<form name="employment" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"> 
 <table width="600" border="0" cellspacing="1" cellpadding="1">
    <tr>
      <td><h2>Employment Application</h2></td>
      <td></td>
    </tr>
    <tr>
      <td>Name</td>
      <td><input type="text" name="name" maxlength="50" />
	  </td>
    </tr>
    <tr>
      <td>Website</td>
      <td><input type="text" name="website" maxlength="50" /></td>
    </tr>
    <tr>
      <td>Position</td>
      <td>
	  
			  <select name="position">
			  
				<option value="Accountant">Accountant</option>
				<option value="Receptionist">Receptionist</option>
				<option value="Administrator">Administrator</option>
				<option value="Supervisor">Supervisor</option>
			  
			  </select>
			  	  
	  </td>
    </tr>
    <tr>
      <td>Experience Level</td>
      <td>
	  
			<select name="experiance">
			  
				<option value="Entry Level">Entry Level</option>
				<option value="Some Experience">Some Experience</option>
				<option value="Very Experienced">Very Experienced</option>
			  
			</select>
	  
	  </td>
    </tr>
    <tr>
      <td>Employment Status</td>
      <td>
	  
	  <input type="radio" name="estatus" value="Employed" checked />Employed
	  <input type="radio" name="estatus" value="Unemployed" />Unemployed
	  <input type="radio" name="estatus" value="Student" />Student
	  
	  </td>
    </tr>
    <tr>
      <td>Additional Comments</td>
      <td>
	  
	  <textarea name="comments" cols="45" rows="5"></textarea>
	  
	  </td>
    </tr>
    <tr>
      <td></td>
      <td>
	  
	  <input type="submit" name="submit" value="Submit" />
	  <input type="reset" name="reset" value="Reset" />
	  
	  </td>
    </tr>
  </table>
</form>
<?php
echo "<h2> User input:</h2>";
echo "Name: " . $name;
echo "<br>";
echo "Website: ", $website;
echo "<br>";

echo "Position: " ,$position;
echo "<br>";

echo  "Experience: " , $experiance;
echo "<br>";

echo  "Employment Status: " , $estatus;
echo "<br>";

echo  "Comments: ", $comments;

?>
</body>
</html>