<?php $this->inject('layout/header') ?>

<div class="row">
    <div class="col-md-offset-3 col-md-6">
        <h1 class="page-header">Login</h1>
        <?php Peon\Form::open('/session/store') ?>
            <?php Peon\Form::text('Username', 'username', null) ?>
            <?php Peon\Form::text('Password', 'password', null) ?>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</div>

<?php $this->inject('layout/footer') ?>
