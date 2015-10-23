<?php $this->inject('layout/header') ?>

<div class="container">
    <h1 class="page-header">Bondservant Create</small></h1>
    <div class="row">
        <div class="col-md-6">
            <?php Peon\Form::open('/bondservant/store') ?>

                <?php Peon\Form::text('Name', 'name', null, true) ?>
                <?php Peon\Form::select('Rating', 'rating', null, $ratings) ?>

                <button type="submit" class="btn btn-primary btn-lg">Create New Bondservant</button>
                <a href="/bondservant/index" class="btn btn-default btn-lg">Cancel</a>
            </form>
        </div>
    </div>
</div>

<?php $this->inject('layout/footer') ?>
