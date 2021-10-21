<?php require "partials/_nav.php" ?>
<?php require "partials/_dbconnect.php" ?>
<?php
$sd=$rc=$am="";
$err=$sc=false;
if($_SERVER['REQUEST_METHOD']=="POST"){
    $sd=$_POST['sender'];
    $rc=$_POST['receiver'];
    $am=$_POST['amount'];
    $s1="SELECT `Name` FROM `user` WHERE (`user`.`Name` = '$sd')";
    $s2="SELECT `Name` FROM `user` WHERE (`user`.`Name` = '$rc')";
    $a=mysqli_query($conn,$s1);
    $b=mysqli_query($conn,$s2);
    $a1=mysqli_num_rows($a);
    $b1=mysqli_num_rows($b);
    if($a1>=1 && $b1>=1){
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

  $sc=true;
  }
  else{
      $err=True;
  }
}

?>
<?php
if($err==True){
  echo '<div class="alert alert-warning" role="alert">
  <strong>Warning</strong>Receiver does not not exist!
</div>';
}
if($sc==True){
  echo '<div class="alert alert-success" role="alert">
  <strong>Success</strong>Transaction Successfull!
</div>';
}
?>
<?php
$sql = "SELECT * FROM `user`";
$res = mysqli_query($conn, $sql);
$i = 0;
echo '
<div class="container my-5">
<table class="table" id="Table">
<th>Srno.</th>
<th>Name</th>
<th>EmailID</th>
<th>Balance</th>
<th>Action</th>
';
while ($rows = mysqli_fetch_assoc($res)) {
  $i = $i + 1;
  $nm = $rows['Name'];
  $em = $rows['EmailID'];
  $bl = $rows['Balance'];
  echo '<tr><td>' . $i . '</td>
    <td>' . $nm . '</td>
    <td>' . $em . '</td>
    <td>' . $bl . '</td>
    <td>
    <div class="d-flex">
    <button name="' . $rows['ID'] . '" type="button" class="viewbtn btn  mx-2" data-bs-toggle="modal" data-bs-target="#ViewCustomer" style="background-color:#363a81!important; color:white!important;">
      View
    </button>
    
    <!-- Modal -->
    <div>
    <div>
    <div class="modal fade" id="ViewCustomer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ViewCustomerLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="ViewCustomerLabel">ID:<span id="iv"></span></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Name:<span id="nv"></span><br><hr>
            Email:<span id="ev"></span><br><hr>
            Balance:<span id="bv"></span>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
</div>
<div>

<button name="' . $rows['ID'] . '" type="button" class="transferbtn btn btn-primary" data-bs-toggle="modal" data-bs-target="#transfer" style="background-color:#363a81!important; color:white!important;">
  Transfer Money
</button>

<!-- Modal -->
<div>
<div class="modal fade" name="transfer" id="transfer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ViewCustomerLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ViewCustomerLabel">ID:<input type="text" id="it" style="border:transparent;"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="'. htmlspecialchars($_SERVER["PHP_SELF"]).'">
      <div class="modal-body">
        Name:<input type="text" id="nt" name="sender" style="border:transparent;"><br><hr>
        Balance:<input type="text" id="bt" name="bal" style="border:transparent;"><br><hr>
      To:  <input type="text" id="receiver" name="receiver" style="border:transparent;"><br><hr>
      Amount: <input type="text" id="amount" name="amount" style="border:transparent;" >
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

</div>
</td>
</tr>';
}
echo '
</table>
</div>';
?>

<script>
  view = document.getElementsByClassName('viewbtn');
  Array.from(view).forEach((element) => {
    element.addEventListener("click", (e) => {
      //console.log("view",e.target.parentNode.parentNode);
      id = e.target.name;
      //console.log(id);
      console.log(e.target)
      t = e.target.parentNode.parentNode.parentNode;
      name = t.getElementsByTagName("td")[1].innerHTML;
      em = t.getElementsByTagName("td")[2].innerHTML;
      bal = t.getElementsByTagName("td")[3].innerHTML;
      document.getElementById("iv").innerHTML = id;
      document.getElementById("nv").innerHTML = name;
      document.getElementById("ev").innerHTML = em;
      document.getElementById("bv").innerHTML = bal;
      
    })
  })
</script>
<script>
  transfer = document.getElementsByClassName("transferbtn");
  Array.from(transfer).forEach((elem) => {
    elem.addEventListener("click", (el) => {
      //console.log(el.target);
      t=el.target.parentNode.parentNode.parentNode.parentNode.parentNode;
      //console.log(t);
      id=el.target.name;
      name=t.getElementsByTagName("td")[1].innerHTML;
      bal = t.getElementsByTagName("td")[3].innerHTML;
      document.getElementById("it").value=id;
      document.getElementById("nt").value=name;
      document.getElementById("bt").value=bal;
      $('#transfer').modal('toggle');

    })
  })
</script>
