<?php
$data = session()->get();
// print_r($data);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1{
            display:'inline';
            color:'red';
        }
    </style>
</head>
<body>
    <p>Welcome <?= $data['firstname']," ", $data['lastname'] ?> | <a href='/logout'>LogOut</a> </p> 
</body>
</html>