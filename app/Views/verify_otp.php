<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>

    <link rel="stylesheet" href="<?= base_url('css/login.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/utility.css') ?>">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <form method="post">
        <?= csrf_field() ?>

        <div class="box">

            <h1>Email Verification</h1>

            <p>
                Enter the OTP sent to your email.
            </p>

            <?php if (isset($error)): ?>
                <div class="alert alert-danger">
                    <?= esc($error) ?>
                </div>
            <?php endif; ?>

            <label for="otp">OTP</label>

            <input
                type="text"
                id="otp"
                name="otp"
                class="form-control"
                placeholder="Enter 6 Digit OTP"
                maxlength="6"
                value="<?= old('otp') ?>"
                required>

            <br>

            <input
                type="submit"
                value="Verify OTP"
                class="btn btn-primary w-100">

        </div>
    </form>

</body>

</html>