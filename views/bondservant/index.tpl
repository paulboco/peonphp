<?php $this->inject('layout/header') ?>

<div class="container">
    <h1 class="page-header">Bondservant Index</h1>
    <div class="row">
        <div class="col-md-8">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th class="center">Rating</th>
                        <?php if (Peon\Auth::level(Peon\Auth::SUPER)): ?>
                            <th class="center">Deleted</th>
                        <?php endif ?>
                        <th class="right">
                            <a href="/bondservant/create">
                                <span class="glyphicon glyphicon-plus" title="Add new bondservant" aria-hidden="true"></span>
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($rows)): ?>
                        <td colspan="5">No records found! Click the plus sign to add some.</td>
                    <?php endif ?>
                    <?php foreach ($rows as $row): ?>
                        <?php if ($row['deleted'] and !Peon\Auth::level(Peon\Auth::SUPER)): ?>
                            <?php continue ?>
                        <?php endif ?>
                        <?php echo $row['deleted'] ? '<tr class="muted">' : '<tr>' ?>
                            <td><?php e($row['id']) ?></td>
                            <td><?php e($row['name']) ?></td>
                            <td class="center"><?php e($row['rating']) ?></td>
                            <?php if (Peon\Auth::level(Peon\Auth::SUPER)): ?>
                                <td class="center"><?php e($row['deleted'] ? 'Yes' : 'No') ?></td>
                            <?php endif ?>
                            <td class="right">
                                <?php if ($row['deleted']): ?>
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                <?php elseif (Peon\Auth::level(Peon\Auth::ADMIN)): ?>
                                    <a href="#" title="Delete" data-toggle="modal" data-target="#deleteModal" data-delete-id="<?php e($row['id']) ?>" data-delete-name="<?php e($row['name']) ?>">
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    </a>
                                <?php endif ?>
                                &nbsp;
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

<?php

$this->inject('shared/modal_delete', array(
    'label' => 'Bondservant',
    'name' => 'bondservant'
));

$this->inject('layout/footer') ;