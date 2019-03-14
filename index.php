<html>
<body>
   	<?php 
     $name=$email=$gender="";
     $nameerr=$emailerr=$gendererr="";
     if($_SERVER["REQUEST_METHOD"]=="POST"){
     	if(empty($_POST["name"])){
         $nameerr="name is reqd field";
     	}
     	else{
            $name=test_input($_POST["name"]);
            if(!preg_match("/^[a-zA-Z ]*$/",$name)) {
                $nameerr = "Only letters and white space allowed";
                $name="";
            }
     	}
         if(empty($_POST["email"])){
             $emailerr="email is reqd field";
         }
         else{
             $email=test_input($_POST["email"]);
             if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                 $emailerr = "not valid email";
                 $email="";
             }
         }
         if(empty($_POST["gender"])){
             $gendererr="gender is reqd field";
         }
         else{
             $gender=test_input($_POST["gender"]);
         }
     }
    function test_input($data){
                $data=trim($data);
                $data=stripslashes($data);
                $data=htmlspecialchars($data);
                return $data;
                
    }
   	?>
   	<div>
   	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
   	NAME: <input type="text" name="name" value="<?php echo $name ;?>">
   	<div class="error"> * <?php echo $nameerr; ?></div>
   	<br><br>
    EMAIL: <input type="text" name="email" value="<?php echo $email ;?>">
    <div class="error"> * <?php echo $emailerr; ?></div>
    <br><br>
    GENDER: <input type="radio" name="gender" <?php if(isset($gender)&&$gender=="female"){
        echo "checked";}?>value="checked">Female
        <input type="radio" name="gender" <?php if(isset($gender)&&$gender=="male"){
        echo "checked";}?>value="checked">Male
         <input type="radio" name="gender" <?php if(isset($gender)&&$gender=="other"){
        echo "checked";}?>value="checked">Other
        <div class="error">* <?php echo $gendererr?></div>
        <br>
        <br>
        <input type="submit" name="submit" value="submit">
   </div>
<h2>your entries here<h2>
    <?php
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $gender;
?>
</body>
</html>
