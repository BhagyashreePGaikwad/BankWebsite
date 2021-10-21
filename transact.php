<?php require "partials/_nav.php" ?>
<?php require "partials/_dbconnect.php" ?>
<div class="container my-5">
    <table class="table" id="myTable">
      <thead>
        <tr>
          <th>Srno</th>
          <th>Sender</th>
          <th>Receiver</th>
          <th>Amount</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM `transaction`";
        $res = mysqli_query($conn, $sql);
        $sno = 0;
        while ($row = mysqli_fetch_assoc($res)) {
          $sno = $sno + 1;
          echo "
          <tr>
            <th>" . $sno . "</th>
            <td>" . $row["Sender"] . "</td>
            <td>" . $row["Receiver"] . "</td>
            <td>" . $row["Amount"] . "</td>
            <td>" . $row["Dt"] . "</td>
          </tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
  <hr>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable();

    });
  </script>