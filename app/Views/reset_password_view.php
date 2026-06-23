<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Reset Password</title>

    <link
        rel="stylesheet"
        href="<?= base_url('css/login.css') ?>">

    <link
        rel="stylesheet"
        href="<?= base_url('css/utility.css') ?>">

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet">
</head>

<body>

    <form method="post">
    
        <?= csrf_field() ?>
    
        <div class="box">
    
            <h1>Reset Password</h1>
    
            <p>
                Enter your new password.
            </p>
    
            <?php if (isset($validation)): ?>
                <div class="alert alert-danger">
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif; ?>
            
            <label for="password"> New Password </label>
            
            <input type="password" id="password" name="password" class="form-control" placeholder="Enter New Password">
            
            <br>
            
            <label for="confirm_password"> Confirm Password </label>
            
            <input type="password" id="confirm_password" name="confirm_password" class="form-control"   placeholder="Confirm New Password">
            
            <br>
            
            <input type="submit" value="Reset Password" class="btn btn-primary w-100">
            
        </div>
            
    </form>

</body>
</html>