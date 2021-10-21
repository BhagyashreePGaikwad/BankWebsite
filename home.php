<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>
<style>
  body {
    margin: 0;
    padding: 0;

  }
  header::before{
            background: url('https://image.freepik.com/free-vector/isometric-money-saving-concept-background_52683-6820.jpg') no-repeat center center;
            content: "";
            position: absolute;
            top:0;
            left:-1500px;
            width: 100%;
            height: 100%;
            z-index: -1;
            animation: mymove 1s linear;
            animation-fill-mode: forwards;
        }
 @keyframes mymove {
   from {left:-1500px; opacity:0.0;}
   to {left:200px; opacity:1;}
 }
 header{
   height: 100vh;
 }
.button{
display: flex;
flex-direction: column;
margin: 100px;
position: absolute;
left: -1500px;
animation: btns 2s linear;
animation-fill-mode: forwards;
}
.btn{
  margin: 10px;
  padding: 6px !important;
  border-radius: 140px !important;
}
@keyframes btns {
  from {left:-1500px;}
   to {left:100px;}
}
a{
  text-decoration: none !important;
  color: blue!important;;
}
</style>

<body>
  <header>
    <?php require "partials/_nav.php" ?>
    <div class="button">
    <button type="button" class="btn btn-outline my-3 p-3" style="border:#363a81 solid 2px !important;"><a href="viewC.php">View all Customer</a></button>
    <button type="button" class="btn btn-outline my-3 p-3" style="border:#363a81 solid 2px !important;"><a href="transact.php">Transaction History</a></button>
    <button type="button" class="btn btn-outline my-3 p-3" style="border:#363a81 solid 2px !important;"><a href="transfer.php">Make Transaction</a></button>
    </div>
    </div>
  </header>


  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.min.js" integrity="sha384-PsUw7Xwds7x08Ew3exXhqzbhuEYmA2xnwc8BuD6SEr+UmEHlX8/MCltYEodzWA4u" crossorigin="anonymous"></script>
    -->
   <?php require "partials/_footer.php";?>
</body>

</html>