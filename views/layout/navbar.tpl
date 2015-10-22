<?php
$auth = Peon\App::getInstance()->make('auth');
// dd($auth);
?>
<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><?php e(config('app.name')) ?></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <?php if (Peon\Auth::check()): ?>
                <ul class="nav navbar-nav">
                    <li class="<?php echo segment(2, 'concepts', 'active') ?>"><a href="/page/concepts">Concepts</a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li class="<?php echo segment(2, 'helpers', 'active') ?>"><a href="/page/helpers">Helpers</a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li class="<?php echo segment(2, 'requirements', 'active') ?>"><a href="/page/requirements">Requirements</a></li>
                </ul>
                <?php if (Peon\Auth::user()->level == 1): ?>
                    <ul class="nav navbar-nav">
                        <li class="<?php echo segment(2, 'api', 'active') ?>"><a href="/page/api">API</a></li>
                    </ul>
                <?php endif ?>
                <ul class="nav navbar-nav">
                    <li class="<?php echo segment(2, 'bondservant', 'active') ?>"><a href="/bondservant/index">Bondservants</a></li>
                </ul>
            <?php endif ?>
            <ul class="nav navbar-nav navbar-right">
                <?php if (Peon\Auth::check()): ?>
                    <li><a href="/session/destroy">Logout <?php echo Peon\Auth::user()->username ?></a></li>
                <?php else: ?>
                    <li><a href="/session/create">Login</a></li>
                <?php endif ?>
            </ul>
        </div>
    </div>
</nav>