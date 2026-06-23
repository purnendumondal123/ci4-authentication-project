<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?= base_url('css/global.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/navbar.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/footer.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/home.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/about.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/contact.css') ?>">
    <style>

    </style>
</head>

<body>
    <header>
        <nav>

            <div class="left">
                Purnendu Portfolio
            </div>

            <div class="right">

                <?php $uri = service('uri'); ?>

                <ul class="nav-menu">

                    <li ><a href="<?= route_to('home') ?>" class="<?= ($uri->getSegment(1) =='home')? 'active' :'' ?>"> Home </a></li>

                    <li ><a href="<?= route_to('about') ?>" class="<?= ($uri->getSegment(1) =='about')? 'active' : "" ?>"> About </a></li>

                    <li ><a href="<?= route_to('contact') ?>" class="<?= ($uri->getSegment(1) =='contact')? 'active' : "" ?>">Contact</a></li>

                </ul>

                <div class="nav-actions">

                    <a href="<?= route_to('upload-image') ?>"
                        class="upload-btn">
                        Upload Image
                    </a>

                    <a href="<?= base_url('logout') ?>"
                        class="logout-btn">
                        Logout
                    </a>

                </div>

            </div>

        </nav>
    </header>


    <?= $this->renderSection('content') ?>

    <footer>
        <div class="footer">
            <div class="footer-right">
                <h3>Purnendu Developer Portfolio</h3>
            </div>
            <div class="footer-first">
                <ul>
                    <a href="<?= route_to('home') ?>">
                        <li>Home</li>
                    </a>
                    <a href="<?= route_to('about') ?>">
                        <li>About</li>
                    </a>
                    <a href="<?= route_to('contact') ?>">
                        <li>Contact us</li>
                    </a>
                </ul>
            </div>
            <div class="footer-second">
                <ul>
                    <a href="<?= route_to('home') ?>">
                        <li>Home</li>
                    </a>
                    <a href="<?= route_to('about') ?>">
                        <li>About</li>
                    </a>
                    <a href="<?= route_to('contact') ?>">
                        <li>Contact us</li>
                    </a>
                </ul>
            </div>
            <div class="footer-third">
                <ul>
                    <a href="<?= route_to('home') ?>">
                        <li>Home</li>
                    </a>
                    <a href="<?= route_to('about') ?>">
                        <li>About</li>
                    </a>
                    <a href="<?= route_to('contact') ?>">
                        <li>Contact us</li>
                    </a>
                </ul>
            </div>
        </div>
        <div class="text-center">
            Copyright &copy; purnenduportfolio.com | All rights reserved
        </div>
    </footer>

    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>

    <script>
        var typed = new Typed('#element', {
            strings: ['Web developer'],
            typeSpeed: 100,
        });
    </script>

</body>

</html>