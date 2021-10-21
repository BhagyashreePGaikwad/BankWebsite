<?php require "partials/_nav.php" ?>
<?php require "partials/_dbconnect.php" ?>
<?php
$sd=$rc=$am="";
if($_SERVER['REQUEST_METHOD']=='POST'){
    $sd=$_POST['sender'];
    $rc=$_POST['receiver'];
    $am=$_POST['amount'];
    echo $sd;
    $sql1="INSERT INTO `transaction` (`ID`, `Sender`, `Receiver`, `Amount`, `Dt`) VALUES (NULL,'$sd', '$rc', '$am', current_timestamp());";
    $r1=mysqli_query($conn,$sql1);
  
    $sql2="SELECT * FROM `user` WHERE (`user`.`Name` = '$sd')";
    $r2=mysqli_query($conn,$sql2);
    while($t=mysqli_fetch_assoc($r2)){
        $am1=$t['Balance'];
    }
    $sql3="SELECT * FROM `user` WHERE (`user`.`Name` = '$rc')";
    $r3=mysqli_query($conn,$sql3);
    while($t=mysqli_fetch_assoc($r3)){
        $am2=$t['Balance'];
    }
   $sa=$am1-$am;
    $ra=$am2+$am;
    $sql4="UPDATE `user` SET `Balance` = '$sa' WHERE `user`.`Name` = '$sd'";
    $r4=mysqli_query($conn,$sql4);
    $sql5="UPDATE `user` SET `Balance` = '$ra' WHERE `user`.`Name` = '$rc'";
    $r5=mysqli_query($conn,$sql5);
}
?>
<div class="container my-4">
    <h2>
        <center>Make Transaction</center>
    </h2>
    <hr>
    <div class="d-flex justify-content-center  container ">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Sender</label>
                <input type="text" class="form-control" id="sd" name="sender">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Receiver</label>
                <input type="text" class="form-control" id="rc" name="receiver">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Amount</label>
                <input type="text" class="form-control" id="am" name="amount">
            </div>
            <div><center>
                <input type="submit" class="btn" value="Submit" style="border:#363a81 solid 2px !important;"></center>
            </div>
        </form>
    </div>
</div>
