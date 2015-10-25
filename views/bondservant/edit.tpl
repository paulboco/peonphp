<?php $this->inject('layout/header') ?>

<div class="container">
    <h1 class="page-header">Bondservant Edit <small title="ID">(<?php echo $row['id'] ?>)</small></h1>
    <div class="row">
        <div class="col-md-6">
            <?php Peon\Form::open('/bondservant/update', array($row['id'])) ?>

                <?php Peon\Form::text('Name', 'name', $row['name'], true) ?>
                <?php Peon\Form::select('Rating', 'rating', $row['rating'], $ratings) ?>
                <?php if (Peon\Auth::level(Peon\Auth::SUPER) and $row['deleted']): ?>
                    <?php Peon\Form::radio('Deleted', 'deleted', $row['deleted'], $no_yes) ?>
                <?php endif ?>

                <button type="submit" class="btn btn-primary btn-lg">Save changes</button>
                <a href="/bondservant/index" class="btn btn-default btn-lg">Cancel</a>
            </form>
        </div>
    </div>
</div>

<?php $this->inject('layout/footer') ?>
