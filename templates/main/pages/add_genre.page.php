<?php
addGenre();
?>

<?php
$validation_errors=[];
if (isset($_POST['submit'])){
    if (!preg_match('/[\w\s{50,1000}]/i',
        trim(htmlspecialchars($_POST['pavadinimas'])))) {
        $validation_errors[] = "netinkamas formatas";
    } else {
        $_POST['pavadinimas'] = trim(htmlspecialchars($_POST['pavadinimas']));
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

<div class = "container">
    <form method="post">
        <div class="form-group">
            <label>Zanro pavadinimas</label>
            <input class="form-control" id="pavadinimas" name="pavadinimas">
        </div>
        <button type="submit" class="btn btn-primary" id="submit" name="submit">Patvirtinti</button>
    </form>
</div>