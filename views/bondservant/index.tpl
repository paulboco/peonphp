<?php $this->view->make('layout/header') ?>

<h1 class="page-header">Bondservant Index</h1>

<div class="row">
    <div class="col-md-8">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Rating</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $row): ?>
                    <tr>
                        <td><?php e($row['id']) ?></td>
                        <td><?php e($row['name']) ?></td>
                        <td><?php e($row['rating']) ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<?php $this->view->make('layout/footer') ?>
