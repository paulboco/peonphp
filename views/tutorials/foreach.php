<?php require_once(path() . '/views/layouts/header.php') ?>

<h1>Foreach Loop Tutorial</h1>
<h2>Create A List</h2>

<select>
    <option>--Please choose your cell-mate--</option>
    <?php foreach($items as $item): ?>
        <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
    <?php endforeach ?>
</select>

<?php require_once(path() . '/views/layouts/footer.php') ?>
