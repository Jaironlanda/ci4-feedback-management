<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">

    <title><?= $title ?></title>
  </head>
  <body>
    <div class="container py-5">
    
    <!-- Alert  -->
    <?php if(isset($_SESSION['message_noti'])): ?>
      <div class="alert alert-success" role="alert">
          <?= $_SESSION['message_noti']; ?>
    </div>
    <?php elseif(isset($_SESSION['message_error'])): ?>
        <div class="alert alert-danger" role="alert">
            <?= $_SESSION['message_error']; ?>
        </div>
    <?php endif ?>
    <!-- Alert -->

    <h2>Welcome back <?= $_SESSION['logged_in']['username'] ?>!</h2> 
    <div class="float-end">
      <a class="btn btn-primary" href="<?= base_url('/logout') ?>" role="button">Logout</a> 
    </div>
   
    <div class="row py-5">
        <div class="col-md-4">
            <div class="card my-2">
                <div class="card-body">
                    <h4 class="card-title">Feedback(s)</h4>
                    <h3 class="card-text"><?= $total_feedback ?></h3>
                </div>
            </div>
        </div>
    </div>

    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>Email</th>
                <th>Feedback</th>
                <th>Date Created</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no = 0;
                foreach ($feedback_list as $row) {
                    $no++;
                    echo '<tr>';
                        echo '<td class="text-center">'.$no.'</td>';
                        echo '<td>'.$row['sender_email'].'</td>';
                        echo '<td>'.character_limiter($row['feedback_body'], 50).'</td>';
                        echo '<td>'.date("d/m/Y", strtotime($row['created_at'])).'</td>';
                        echo '<td>
                                <a class="btn btn-primary" href="/dashboard/view/'.$row['feedback_id'].'" role="button">View</a>
                                <a class="btn btn-danger" onClick="return confirm(\'Confirm delete feedback? You will not be able to recover it.\')" href="'.base_url('dashboard/delete/'.$row['feedback_id']).'" role="button">Delete</a>
                            </td>';
                    echo '</tr>';
                }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>No.</th>
                <th>Email</th>
                <th>Feedback</th>
                <th>Date Created</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
    <!-- Datatable here -->
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    -->
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready(function() {
    $('#example').DataTable();
} );
    </script>
  </body>
</html>