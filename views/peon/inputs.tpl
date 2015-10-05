<div class="form-group <?php echo isset($errors['name']) ? 'has-error' : '' ?>">
    <label for="peonName" class="control-label">Name</label>
    <input type="name" value="<?php echo $row['name'] ?>" class="form-control" id="peonName">
</div>
<div class="form-group">
    <label for="peonRating" class="control-label">Performance Rating</label>
    <div>
        <select lass="form-control" id="peonRating">
            <option>-Select Rating-</option>
            <?php foreach($ratings as $rating): ?>
                <option value="<?php echo $rating ?>" <?php echo $rating == $row['rating'] ? ' selected' : '' ?> >
                    <?php echo $rating ?>
                </option>
            <?php endforeach ?>
        </select>
    </div>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="/peon/index" class="btn btn-default">Cancel</a>
</div>
