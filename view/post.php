<?php $title = "test"; ?>
<?php ob_start(); ?>
<h1><?php echo $title; ?></h1>

<div class="date"> <?php echo $date; ?> </div>
<div class="body"> <?php echo $body; ?> </div>
<?php $content = ob_get_clean(); ?>

<?php require 'layout.php'; ?>