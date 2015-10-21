<?php $this->inject('layout/header') ?>

<h1 class="page-header">Bondservant Edit <small title="ID">(<?php echo $row['id'] ?>)</small></h1>

<div class="row">
    <div class="col-md-6">
        <?php Peon\Form::open('/bondservant/update', array($row['id'])) ?>

            <?php Peon\Form::text('Name', 'name', $row['name']) ?>
            <?php Peon\Form::select('Rating', 'rating', $row['rating'], $ratings) ?>

            <button type="submit" class="btn btn-primary">Save</button>
            <a href="/bondservant/index" class="btn btn-default">Cancel</a>
        </form>
    </div>
</div>

<?php $this->inject('layout/footer') ?>
