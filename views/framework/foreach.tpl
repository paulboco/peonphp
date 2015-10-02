<?php require_once(path() . '/views/layout/header.tpl') ?>

<h1 class="page-header">Framework</h1>

<h2>Foreach Loop</h2>

<pre><?php echo htmlentities(
'<select>
    <option>--Please choose your cell-mate--</option>
    <?php foreach($items as $item): ?>
        <option value="<?php echo $item[\'id\'] ?>">
            <?php echo $item[\'name\'] ?>
        </option>
    <?php endforeach ?>
</select>'
) ?>
</pre>

<select>
    <option>--Please choose your cell-mate--</option>
    <?php foreach($items as $item): ?>
        <option value="<?php echo $item['id'] ?>">
            <?php echo $item['name'] ?>
        </option>
    <?php endforeach ?>
</select>

<?php require_once(path() . '/views/layout/footer.tpl') ?>
