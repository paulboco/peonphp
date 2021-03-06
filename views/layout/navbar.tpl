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
                    <li class="<?php echo activate_if(2, 'concepts', 'active') ?>"><a href="/page/concepts">Concepts</a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li class="<?php echo activate_if(2, 'helpers', 'active') ?>"><a href="/page/helpers">Helpers</a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li class="<?php echo activate_if(2, 'requirements', 'active') ?>"><a href="/page/requirements">Requirements</a></li>
                </ul>

                <!-- Don't show API and code coverage in production -->
                <?php if (Peon\Application\App::environment() == 'dev'): ?>
                    <ul class="nav navbar-nav">
                        <li class="<?php echo activate_if(2, 'api', 'active') ?>"><a href="/page/api">API</a></li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li class="<?php echo activate_if(2, 'coverage', 'active') ?>"><a href="/page/coverage">Coverage</a></li>
                    </ul>
                <?php endif ?>

                <!-- Show Bondservants link only to admins -->
                <?php if (Peon\Auth::user()->level <= Peon\Auth::ADMIN): ?>
                    <ul class="nav navbar-nav">
                        <li class="<?php echo activate_if(1, 'bondservant', 'active') ?>"><a href="/bondservant/index">Bondservants</a></li>
                    </ul>
                <?php endif ?>
            <?php endif ?>

            <!-- Navbar right -->
            <ul class="nav navbar-nav navbar-right">
                <?php if (Peon\Auth::check()): ?>
                    <li>
                        <a href="/session/destroy">
                            <span class="glyphicon glyphicon-log-out" title="Logout <?php echo Peon\Auth::user()->username ?>" aria-hidden="true"></span>
                        </a>
                    </li>
                <?php else: ?>
                    <li>
                        <a href="/session/create">
                            <span class="glyphicon glyphicon-log-in" title="Login" aria-hidden="true"></span>
                        </a>
                    </li>
                <?php endif ?>
            </ul>
        </div>
    </div>
</nav>