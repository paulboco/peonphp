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
                        <th class="right">
                            <a href="/bondservant/create">
                                <span class="glyphicon glyphicon-plus" title="Add new bondservant" aria-hidden="true"></span>
                            </a>
                        </th>
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
                                &nbsp;
                                <a href="#" title="Delete" data-toggle="modal" data-target="#deleteModal" data-bondservant-id="<?php e($row['id']) ?>" data-bondservant-name="<?php e($row['name']) ?>">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="deleteModalLabel">Delete Bondservant</h3>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this Bondservant?
            </div>
            <div class="modal-footer">
                <form id="deleteForm" action="/bondservant/destroy/" method="post">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete Bondservant</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $javascript = <<<JS
<script type="text/javascript">
$(document).ready(function () {
    $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var bondservantId = button.data('bondservant-id');
        var bondservantName = button.data('bondservant-name');
console.log(bondservantId);
        var modal = $(this);
        modal.find('.modal-body').html('Are you sure you want to delete the bondservant: <strong>' + bondservantName + '</strong>?');
        $('#deleteForm').attr('action', '/bondservant/destroy/' + bondservantId);
    })
});
</script>
JS;
?>

<?php $this->inject('layout/footer', array('javascript' => $javascript)) ?>
