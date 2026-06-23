<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="<?= base_url('css/login.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/utility.css') ?>">
</head>

<body>

    <form method="post">
        <?= csrf_field() ?>

        <div class="box">

            <h1>Login</h1>

            <!-- Custom Errors -->
            <?php if (isset($flash_message)): ?>
                <div class="error-msg">
                    <?= esc($flash_message) ?>
                </div>
            <?php endif; ?>

            
            <?php if (isset($validation) && $validation->hasError('email')): ?>
                <div class="error-msg">
                    <?= $validation->getError('email') ?>
                </div>
            <?php endif; ?>

            <label for="Email">Email</label>

            <input type="email" id="Email" name="email" placeholder="Email" value="<?= set_value('email') ?>">



            <?php if (isset($validation) && $validation->hasError('password')): ?>
                <div class="error-msg">
                    <?= $validation->getError('password') ?>
                </div>
            <?php endif; ?>

            <label for="password">Password</label>

            <input type="password" id="password" name="password" placeholder="Password" value="<?= set_value('password') ?>">

            <div class="anc">
                <a href="<?= route_to('signup') ?>">Create Account</a>
            </div>

            <div class="forgot">
                <a href="<?= base_url('forgot_password') ?>">Forgot Password?</a>
            </div>

            <div>
                <input type="submit" value="Login">
            </div>

        </div>
    </form>

</body>

</html>