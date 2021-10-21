<?php require "partials/_nav.php" ?>
<?php require "partials/_dbconnect.php" ?>
<?php 
$sc="";
if($_SERVER['REQUEST_METHOD']=="POST"){
$nm=$_POST['name'];
$em=$_POST['email'];
$tx=$_POST['tx'];
$sql="INSERT INTO `contactus` (`Srno.`, `Email`, `Name`, `Enquiry`, `Dt`) VALUES (NULL, '$em', '$nm', '$tx', current_timestamp())";
$res=mysqli_query($conn,$sql);
if($res){
    echo '<div class="alert alert-success" role="alert">
        Your record successfully added!
  </div>';
}
else{
    echo '<div class="alert alert-warning" role="alert">
    Sorry !Try again contacting
  </div>';
}
}
?>
<form class="container my-mx-6 p-4" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" >
    <center><h2>Contact Us</h2></center>
    <div class="form-group my-2">
    <label >Name</label>
    <input type="text" class="form-control" name="name">
  </div>
  <div class="form-group my-2">
    <label for="exampleFormControlInput1">Email address</label>
    <input type="email" class="form-control" id="exampleFormControlInput1" name="email" >
  </div>
  <div class="form-group my-2">
    <label for="exampleFormControlTextarea1">Enquiry</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="tx"></textarea>
  </div>
  <center><input class="btn my-4"type="submit" value="Submit" style="border:#363a81 solid 2px !important;"></center>
</form>