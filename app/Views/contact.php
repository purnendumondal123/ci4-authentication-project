<?= $this->extend('template/main') ?>

<?= $this->section('content') ?>



<main class="contact-container">

    <section class="contact-header">

        <h1>Contact Me</h1>

        <p>
            Feel free to contact me for web development projects,
            freelance work, collaboration or any professional discussion.
        </p>

    </section>

    <section class="contact-content">

        <div class="contact-card">

            <h2>Personal Information</h2>

            <div class="contact-info">

                <div class="contact-item">
                    <strong>Name</strong>
                    <span>Purnendu Mondal</span>
                </div>

                <div class="contact-item">
                    <strong>Phone</strong>
                    <span>9635433390</span>
                </div>

                <div class="contact-item">
                    <strong>Email</strong>
                    <span>purnendu.india123@gmail.com</span>
                </div>

                <div class="contact-item">
                    <strong>Date of Birth</strong>
                    <span>11/11/2000</span>
                </div>

            </div>

        </div>

    </section>

    <section class="address-section">

        <h2 class="section-title">Address</h2>

        <div class="address-card">

            <div class="address-grid">

                <div class="address-item">
                    <strong>Country</strong>
                    <span>India</span>
                </div>

                <div class="address-item">
                    <strong>State</strong>
                    <span>West Bengal</span>
                </div>

                <div class="address-item">
                    <strong>District</strong>
                    <span>East Medinipur</span>
                </div>

                <div class="address-item">
                    <strong>Block</strong>
                    <span>Kolaghat</span>
                </div>

                <div class="address-item">
                    <strong>Village + PO</strong>
                    <span>Chapda</span>
                </div>

                <div class="address-item">
                    <strong>PIN</strong>
                    <span>721154</span>
                </div>

            </div>

        </div>

    </section>

</main>

<?= $this->endsection() ?>