<?= $this->extend('template/main.php') ?>

<?= $this->Section('content') ?>

    <form method="post" enctype="multipart/form-data">
    
        <input type="file" name="profile_image">
    
        <button type="submit">
            Upload Image
        </button>
    
    </form>

<?php if (isset($validation)): ?>
    <?= $validation->listErrors() ?>
<?php endif; ?>

<?= $this->endSection(); ?>