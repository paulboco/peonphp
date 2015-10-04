<?php view('layout/header') ?>

<h1 class="page-header">Prisoner Index</h1>

<div class="row">
    <div class="col-md-6">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php foreach($rows as $row): ?>
                        <td><?php e($row['name']) ?></td>
                    <?php endforeach ?>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php view('layout/footer') ?>


//                    <?php foreach($data as $row): ?>
//                        <option value="<?php e($row['id']) ?>">
//                            <?php e($row['name']) ?>
//                        </option>
//                    <?php endforeach ?>
