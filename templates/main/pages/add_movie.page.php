<?php
connectionDB();
$zanrai = addFilm();
?>

<?php
$validation_errors=[];
if (isset($_POST['submit'])){
    if (!preg_match('/\w{1,30}$/',
        trim(htmlspecialchars($_POST['pavadinimas']))) ){
        $validation_errors[] = "pavadinimas negali virsyti 30 simboliu ir trumpesnis uz 1";
    } else {
        $_POST['pavadinimas'] = trim(htmlspecialchars( $_POST['pavadinimas']));
    }
    if (!preg_match('/[\w\s{50,1000}]/i',
        trim(htmlspecialchars($_POST['aprasymas'])))) {
        $validation_errors[] = "netinkamas aprasymo formatas";
    } else {
        $_POST['aprasymas'] = trim(htmlspecialchars($_POST['aprasymas']));
    }

    if (!preg_match('/\w{1,30}$/',
        trim(htmlspecialchars($_POST['rezisierius']))) ){
        $validation_errors[] = "pavadinimas negali virsyti 30 simboliu ir trumpesnis uz 1";
    } else {
        $_POST['rezisierius'] = trim(htmlspecialchars( $_POST['rezisierius']));
    }
    if (!preg_match('/\d\.\d/',
        trim(htmlspecialchars($_POST['imdb'])))){
        $validation_errors[] = "ivertinimai - netinkamas formatas";
    } else {
        $_POST['imdb'] = trim(htmlspecialchars($_POST['imdb']));
    }
}
?>

<?php
if($validation_errors) :?>
    <div class="errors">
        <ul>
            <?php foreach($validation_errors as $error) :?>
                <li><?= $error; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>

<?php endif; ?>

<?php
addFilm2();
?>

<div class = "container">
<form method="post">
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
    <button type="submit" class="btn btn-primary" id="submit" name="submit">Patvirtinti</button>
</form>
</div>