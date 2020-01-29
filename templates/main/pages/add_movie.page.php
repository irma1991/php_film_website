<?php session_start();
if($_SESSION['vardas'] == "admin"):
?>

<?php $validation_errors= formFilmValidation();?>

<?php
connectionDB();
$zanrai = addFilm();
?>

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

<?php addFilm2();?>
<h2>Pridekite nauja filma</h2>
<div class = "container add-film">
<form method="post" class = "add-film-form">
    <div class="form-group">
        <label>Filmo pavadinimas</label>
        <input class="form-control" id="pavadinimas" name="pavadinimas">
    </div>
    <div class="form-group">
        <label>Aprasymas</label>
        <input class="form-control" id="aprasymas" name="aprasymas">
    </div>
    <div class="form-group">
        <label>Metai</label>
        <select id="metai" name="metai" class="form-control">
            <option selected>Pasirinkite...</option>
            <?php $metai=1996; ?>
            <?php for($i=0; $i<25; $i++) : ?>
                <option value="<?= $metai; ?>"><?= $metai; ?></option>
                <?php $metai++; ?>
            <?php endfor; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Rezisierius</label>
        <input class="form-control" id="rezisierius" name="rezisierius">
    </div>
    <div class="form-group">
        <label>IMDB</label>
        <input class="form-control" id="imdb" name="imdb">
    </div>
        <div class="form-group">
            <label>Zanras</label>
            <select id="zanras" name="zanras" class="form-control">
                <option selected>Pasirinkite...</option>
                <?php foreach ($zanrai as $zanras):?>
                <option value="<?=$zanras['id'];?>"><?= $zanras['pavadinimas'];?></option>
                <?php endforeach;?>
            </select>
        </div>
    <div class = "add-film-button">
        <button type="submit" class="btn btn-secondary" id="submit" name="submit">Patvirtinti</button>
    </div>
</form>
</div>
<?php else:?>
    <?php header('Location:'.path.'?page=prisijungti'); ?>
<?php endif;?>