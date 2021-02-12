<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title><?= $title ?></title>
  </head>
  <body>
    <div class="container py-5">
    
    <div class="card">
      <div class="card-body">
      <h1>Feedback</h1>
        <!-- Validation alert -->
        <?php if(isset($validation)): ?>
            <div class="alert alert-danger" role="alert">
                <i class="fa fa-times-circle" aria-hidden="true"></i> Error: <?= $validation->listErrors(); ?>
            </div>
        <?php endif ?>
        <!-- Validation alert -->
        <?php if(isset($_SESSION['message_noti'])): ?>
          <div class="alert alert-success" role="alert">
              <?= $_SESSION['message_noti']; ?>
        </div>
        <?php elseif(isset($_SESSION['message_error'])): ?>
            <div class="alert alert-danger" role="alert">
                <?= $_SESSION['message_error']; ?>
            </div>
        <?php endif ?>
        
        <?= form_open() ?>
          <div class="mb-3">
            <label for="">Sender Name</label>
            <input type="text"
              class="form-control" name="sender_name" placeholder="John" value="<?= $feedback['sender_name'] ?>" disabled>
          </div>
          <div class="mb-3">
            <label for="">Sender Email</label>
            <input type="text"
              class="form-control" name="sender_email" value="<?= $feedback['sender_email'] ?>" disabled>
          </div>
          <div class="mb-3">
            <label for="">Feedback</label>
            <textarea class="form-control" name="feedback_body" rows="6" disabled><?= $feedback['feedback_body'] ?></textarea>
          </div>

          <div class="mb-3">
            <label for="">Created/Received</label>
            <input type="text"
              class="form-control" name="created_at" value="<?= date("d/m/Y h:i A", strtotime($feedback['created_at'])) ?>" disabled>
          </div>
          <a class="btn btn-danger" onClick="return confirm('Confirm delete feedback? You will not be able to recover it.')" href="<?= base_url('dashboard/delete/' . $feedback['feedback_id']) ?>" role="button">Delete</a>
          <a class="btn btn-secondary float-end" href="/dashboard" role="button">Exit</a>
        <?= form_close() ?>
      </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    -->
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    
  </body>
</html>