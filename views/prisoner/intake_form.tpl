<?php view('layout/header') ?>

<h1 class="page-header">Prisoner</h1>

<h2>Forms</h2>

<h3>Prisoner Intake Form</h3>

<div class="row">
    <div class="col-md-6">
        <form action="/prisoner/store" method="post">
            <!-- name -->
            <div class="form-group">
                <label for="prisonerName">Name</label>
                <input type="text" class="form-control" id="prisonerName" placeholder="Name">
            </div>

            <!-- alias -->
            <div class="form-group">
                <label for="prisonerAlias">Alias</label>
                <input type="text" class="form-control" id="prisonerAlias" placeholder="Alias">
            </div>

            <!-- cell mate -->
            <div class="form-group">
                <label for="prisonerCellmate">Cell mate</label>
                <select class="form-control" id="prisonerCellmate">
                    <option>-Choose your cell mate-</option>
                    <?php foreach($data as $item): ?>
                        <option value="<?php e($item['id']) ?>">
                            <?php e($item['name']) ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>

            <!-- support group -->
            <div class="checkbox">
                <label>
                    <input type="checkbox"> Yes, sign me up for the support group.
                </label>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default">Submit</button>
            </div>
        </form>
    </div>
</div>

<?php view('layout/footer') ?>
