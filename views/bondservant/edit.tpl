<?php $this->view->make('layout/header') ?>

<h1 class="page-header">Bondservant Edit <small title="ID">(<?php echo $row['id'] ?>)</small></h1>

<div class="row">
    <div class="col-md-6">
        <form action="/bondservant/update/<?php echo $row['id'] ?>" method="post">
            <div class="form-group<?php echo isset($errors['name']) ? ' has-error' : '' ?>">
                <label class="control-label" for="inputName">Name</label>
                <input type="text" name="name" value="<?php e($row['name']) ?>" class="form-control" id="inputName" aria-describedby="helpName">
                <span id="helpName" class="help-block"><?php echo isset($errors['name']) ? $errors['name'] : '' ?></span>
            </div>
            <div class="form-group<?php echo isset($errors['rating']) ? ' has-error' : '' ?>">
                <label class="control-label" for="inputRating">Rating</label>
                <select name="rating" class="form-control" id="inputRating" aria-describedby="helpRating">
                    <?php foreach ($ratings as $rating): ?>
                        <option<?php echo $row['rating'] == $rating ? ' selected' : '' ?> value="<?php echo $rating ?>"><?php echo $rating ?></option>
                     <?php endforeach ?> ?>
                </select>
                <span id="helpRating" class="help-block"><?php echo isset($errors['rating']) ? $errors['rating'] : '' ?></span>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="/bondservant/index" class="btn btn-default">Cancel</a>
        </form>
    </div>
</div>

<?php $this->view->make('layout/footer') ?>
