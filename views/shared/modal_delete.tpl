<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="modal-title" id="deleteModalLabel">Confirm <?php echo $label ?> Deletion</h3>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this <?php echo $name ?>?
            </div>
            <div class="modal-footer">
                <form id="deleteForm" action="/<?php echo $name ?>/destroy/" method="post">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete <?php echo $label ?></button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
$this->share(array('javascript' => <<<JS
<script type="text/javascript">
$(document).ready(function () {
    $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var deleteId = button.data('delete-id');
        var deleteName = button.data('delete-name');

        var modal = $(this);
        modal.find('.modal-body').html('Are you sure you want to delete the $name: <strong>' + deleteName + '</strong>?');
        $('#deleteForm').attr('action', '/$name/destroy/' + deleteId);
    })
});
</script>
JS
));
