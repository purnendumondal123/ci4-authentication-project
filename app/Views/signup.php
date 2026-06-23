<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url('css/utility.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>


    <form action="/signup" method="post">
        <?= csrf_field() ?>
        <div class="box">
            <h1>Sign Up</h1>

            <?php if (isset($flash_message)): ?>
                <div class="alert alert-danger">
                    <?= esc($flash_message) ?>
                </div>
            <?php endif; ?>

            <?php if (validation_show_error('firstname')): ?>
                <div class="error-msg"><?= validation_show_error('firstname') ?></div>
            <?php endif; ?>
            <label for="firstname">First Name</label>
            <input type="text" id="firstname" name="firstname" placeholder="First Name" value="<?= set_value('firstname') ?>">


            <?php if (validation_show_error('lastname')): ?>
                <div class="error-msg"><?= validation_show_error('lastname') ?></div>
            <?php endif; ?>

            <label for="lastname">Last Name</label>
            <input type="text" id="lastname" name="lastname" placeholder="Last Name" value="<?= set_value('lastname') ?>">


            <?php if (validation_show_error('email')): ?>
                <div class="error-msg"><?= validation_show_error('email') ?></div>
            <?php endif; ?>
            <label for="Email">Email</label>
            <input type="email" id="Email" name="email" placeholder="Email" value="<?= set_value('email') ?>">


            <?php if (validation_show_error('password')): ?>
                <div class="error-msg"><?= validation_show_error('password') ?></div>
            <?php endif; ?>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Password" value="<?= set_value('password') ?>">


            <?php if (validation_show_error('conf-password')): ?>
                <div class="error-msg"><?= validation_show_error('conf-password') ?></div>
            <?php endif; ?>

            <label for="conf-password">Confirm Password</label>
            <input type="password" id="conf-password" name="conf-password" placeholder="Confirm Password" value="<?= set_value('password_confirm') ?>">

            <div class="anc">
                <span>Already have account</span>
                <a href="<?= route_to('login') ?>">Login</a>
            </div>
            <input type="submit" value="submit">
        </div>
    </form>
</body>

</html>