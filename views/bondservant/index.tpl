<?php $this->inject('layout/header') ?>

<div class="container">
    <h1 class="page-header">Bondservant Index</h1>
    <div class="row">
        <div class="col-md-8">
            <ul class="nav nav-tabs">
                <li role="presentation"><a href="/bondservant/create"><span class="glyphicon glyphicon-plus" title="Add new bondservant" aria-hidden="true"></span></a></li>
            </ul>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th class="center">Rating</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rows as $row): ?>
                        <tr>
                            <td><?php e($row['id']) ?></td>
                            <td><?php e($row['name']) ?></td>
                            <td class="center"><?php e($row['rating']) ?></td>
                            <td class="right">
                                <a href="/bondservant/edit/<?php echo $row['id'] ?>" title="Edit">
                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $this->inject('layout/footer') ?>
