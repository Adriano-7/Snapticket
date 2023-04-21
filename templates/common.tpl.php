<?php 
  declare(strict_types = 1); 
  require_once(__DIR__ . '/../utils/session.php');
?>

<?php function createHead(string $title, array $stylesheets = []) { ?>
    <!DOCTYPE html>
    <html lang="en-US">
      <head>
        <title>SnapTicket - <?= $title ?></title>  
        <link rel="icon" href="../assets/favicon.png">
        <?php foreach ($stylesheets as $stylesheet) { ?>
          <link href="../css/<?= $stylesheet ?>.css" rel="stylesheet">
        <?php } ?>
      </head>
<?php } ?>