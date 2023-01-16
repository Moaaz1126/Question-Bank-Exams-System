<?php

require_once 'sessionInitializer.php';

require_once '../scripts/php/database_config.php';
require_once '../scripts/php/classes/MySQLHandler.class.php';
require_once '../scripts/php/classes/crud/classifications.class.php';

$c_id = isset( $_GET ['c_id'] ) ? $_GET ['c_id'] : 0;

$classifications = new Classifications();

$row = $classifications -> getRow( $c_id );

$c_name = @$row ['c_name' ];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Classification Form</title>

  <?php require_once './styleLinks.php'; ?>

  <link rel="stylesheet" type="text/css" href="../styles/formStyle.css">
</head>
<body>

  <!-- alert -->
	<?php require_once './alert.php'; ?>

  <main>
    <form action="../scripts/php/classificationsAction.php" methos="get">
      <!-- add hidden fields in case of update as references for classificationsAction.php -->
      <?php 
      if ( $c_id ) { ?>

        <input type="hidden" name="c_id" value="<?= $c_id; ?>">
        
      <?php } ?>

      <div class="input-box">
        <input id="c_name" type="text" name="c_name" value="<?= $c_name; ?>" required autofocus>
        <label for="c_name">Classification Name</label>
      </div>

      <a class="btn btn-primary" href="classifications.php">Back</a>
      <input class="btn btn-success" type="submit" name="submit" value="<?= $c_id ? 'Update' : 'Save'; ?>">
    </form>
  </main>

  <script type="text/javascript" src="../scripts/js/bootstrap.bundle.min.js"></script>
</body>
</html>