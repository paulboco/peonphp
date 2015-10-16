<?php $this->view->make('layout/header') ?>

<h1 class="page-header">Bondservant Edit <small title="ID">(<?php echo $row['id'] ?>)</small></h1>

<div class="row">
    <div class="col-md-6">
        <form action="/bondservant/update/<?php echo $row['id'] ?>" method="post">
            <div class="form-group has-error">
                <label class="control-label" for="inputName">Name</label>
                <input type="text" name="name" class="form-control" id="inputName" aria-describedby="helpName">
                <span id="helpName" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>
            </div>
            <div class="form-group has-error">
                <label class="control-label" for="inputRating">Rating</label>
                <select name="rating" class="form-control" id="inputRating" aria-describedby="helpRating">
                    <?php foreach ($ratings as $value): ?>
                        <option value="<?php echo $value ?>"><?php echo $value ?></option>
                     <?php endforeach ?> ?>
                </select>
                <span id="helpRating" class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="/bondservant/index" class="btn btn-default">Cancel</a>
        </form>
    </div>
</div>

<?php $this->view->make('layout/footer') ?>
