<?php view('layout/header') ?>

<div class="row">
    <div class="col-md-8">
        <h1>Peon Index <small>(<?php e($count) ?> total)</small></h1>
    </div>
    <div class="col-md-4">
        <a href="/peon/create" class="btn btn-primary pull-right">Add Peon</a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($rows as $row): ?>
                    <tr class="<?php echo $id == $row['id'] ? 'info' : '' ?>">
                        <td><?php e($row['id']) ?></td>
                        <td><?php e($row['name']) ?></td>
                        <td><a href="/peon/edit/<?php e($row['id']) ?>">Edit</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<?php view('layout/footer') ?>
