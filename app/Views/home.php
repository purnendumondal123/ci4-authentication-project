
<?= $this->extend('template/main') ?>

<?= $this->section('content') ?>

<main class="home-container">

    <section class="hero-section">

        <div class="hero-left">

            <h1>
                Hi, I'm <span class="highlight-name">Purnendu Mondal</span>
            </h1>

            <h2>
                I am a <span id="element"></span>
            </h2>

            <p class="hero-text">
                Passionate Web Developer with experience in
                PHP, CodeIgniter 4, Django, MySQL, HTML, CSS and JavaScript.
                I enjoy building secure and user-friendly web applications.
            </p>

            <div class="hero-buttons">
                <a href="<?= route_to('about') ?>" class="btn-primary-custom"> About Me </a>

                <a href="<?= base_url('contact') ?>" class="btn-secondary-custom"> Contact Me </a>
            </div>

        </div>

        <div class="hero-right">

            <img
                src="<?= base_url('image/pg.png') ?>"
                alt="Developer Image">

        </div>

    </section>

    <section class="skills-section">

        <h2 class="section-title"> My Skills </h2>

        <div class="skill-grid">

            <div class="skill-card">
                <img src="<?= base_url('image/python.jpg') ?>">
                <h3 style="padding-top: 20px">Python</h3>
            </div>

            <div class="skill-card">
                <img src="<?= base_url('image/django.jpg') ?>">
                <h3 style="padding-top: 10px">Django</h3>
            </div>

            <div class="skill-card">
                <img src="<?= base_url('image/htmlCss.jpg') ?>">
                <h3 style="padding-top: 20px">HTML & CSS</h3>
            </div>

            <div class="skill-card">
                <img src="<?= base_url('image/javascript.png') ?>">
                <h3 style="padding-top: 10px">JavaScript</h3>
            </div>

            <div class="skill-card">
                <img src="<?= base_url('image/js.jpg') ?>">
                <h3 style="padding-top: 10px">MySQL</h3>
            </div>
            <div class="skill-card">
                <img src="<?= base_url('image/images.jpg') ?>">
                <h3 style="padding-top: 10px; width:200px">CodeIgniter 4</h3>
            </div>

        </div>

    </section>

</main>


<?= $this->endSection(); ?>

 