<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url('css/login.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/utility.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <form method="post"> 
        <?= csrf_field() ?> 
        <div class="box">
            <h1>Forgot Password</h1> 
            <?php if (isset($error_message)): ?> 
                <div class="alert alert-danger"> 
                    <?= esc($error_message) ?> 
                </div> 
            <?php endif; ?> 

            <?php if (isset($success_message)): ?> 
                <div class="alert alert-success"> 
                    <?= esc($success_message) ?> 
                </div> 
            <?php endif; ?> 

            <?php if (isset($validation)): ?> 
                <div class="alert alert-danger"> 
                    <?= $validation->listErrors() ?> 
                </div> 
            <?php endif; ?> 
            
            <label for="email"> Enter Your Email Address </label> 
            <input type="email" id="email" name="email" class="form-control" placeholder="Enter Email Address" value="<?= old('email') ?>"> 
            
            <br> 
            
            <input type="submit" value="Send Reset Link" class="btn btn-primary w-100">
        </div>
    </form>
</body>

</html>