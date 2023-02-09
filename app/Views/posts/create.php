<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>

<form action="/posts/create" method="post" class="container d-flex align-items-center justify-content-center">
    <?= csrf_field() ?>

    <div class="mt-3">
        <div class="form-group">
            <label for="title">Title</label>
            <input class="form-control" type="input" name="title" value="<?= set_value('title') ?>">
            <br>
        </div>
    
        <div class="form-group">
            <label for="body">Description</label>
            <textarea class="form-control" name="body" cols="45" rows="4"><?= set_value('body') ?></textarea>
            <br>
        </div>
    
        <div class="form-group">
            <label for="img_url">Image address</label>
            <input class="form-control" type="input" name="img_url" value="<?= set_value('img_url') ?>">
            <br>
        </div>
        
        <div class="form-group">
            <label for="tags">Tags (Please seperate with commas ",")</label>
            <input class="form-control" type="input" name="tags" value="<?= set_value('tags') ?>">
            <br>
        </div>

        <div class="form-group">
            <label for="author">Author</label>
            <input class="form-control"type="input" name="author" value="<?= set_value('author') ?>">
            <br>
        </div>

        <input class="btn btn-primary" type="submit" name="submit" value="Create post item">
    </div>
    
</form>