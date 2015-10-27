<?php $this->inject('layout/header') ?>

<div class="container">
    <div class="row">
        <div class="col-md-offset-4 col-md-4">
            <h1 class="page-header">Login</h1>
            <?php Peon\Form::open('/session/store') ?>
                <?php Peon\Form::text('Username', 'username', null, true) ?>
                <?php Peon\Form::password('Password', 'password') ?>
                <button type="submit" class="btn btn-primary btn-lg">Login</button>
            </form>
        </div>
    </div>
</div>

<?php $this->inject('layout/footer') ?>
