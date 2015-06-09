<?php 
    $errors = $clients->getErrors();
    foreach ( $errors as $error ):
?>

<div class="alert alert-danger" role="alert">
    <strong>Błąd! </strong><?php echo $error->faultString ?> 
</div>

<?php endforeach; ?>
