<?php session_start();
if($_SESSION['vardas'] == "admin"):
?>

<?php $validation_errors = formGenreValidation();?>
<?php connectionDB(); ?>

<?php
if($validation_errors) :?>
    <div class="container errors">
        <ul>
            <?php foreach($validation_errors as $error) :?>
                <li><i class="fas fa-exclamation"></i> <?= $error; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>

<?php endif; ?>

<?php addGenre(); ?>
    <h2>Pridekite nauja zanra</h2>
<div class = "container add-genre">
    <form method="post" class = "add-genre-form">
        <div class="form-group">
            <label>Zanro pavadinimas</label>
            <input class="form-control" id="pavadinimas" name="pavadinimas">
        </div>
        <div class = "add-genre-button">
            <button type="submit" class="btn btn-secondary" id="submit" name="submit">Patvirtinti</button>
        </div>
    </form>
</div>
<?php else:?>
    <?php header('Location:'.path.'?page=prisijungti'); ?>
<?php endif;?>