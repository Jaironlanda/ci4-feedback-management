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
      <h1>User Feedback</h1>
        <?php if (! empty($errors)) : ?>
          <div class="alert alert-danger">
            <ul>
              <?php foreach ($errors as $field => $error) : ?>
                  <li><?= $field ?> <?= $error ?></li>
              <?php endforeach ?>
            </ul>
          </div>
        <?php endif ?>
        <?= form_open() ?>
          <div class="mb-3">
            <label for="">Name</label>
            <input type="text"
              class="form-control" name="sender_name" placeholder="John" value="<?= set_value('sender_name') ?>">
          </div>
          <div class="mb-3">
            <label for="">Email</label>
            <input type="text"
              class="form-control" name="sender_email" placeholder="myemail@domain.com" value="<?= set_value('sender_email') ?>">
          </div>
          <div class="mb-3">
            <label for="">Feedback</label>
            <textarea class="form-control" name="feedback_body" rows="3"><?= set_value('feedback_body') ?></textarea>
          </div>
          
          <button type="submit" class="btn btn-primary">Submit</button>
         
        <?= form_close() ?>
      </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    -->
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    
  </body>
</html>