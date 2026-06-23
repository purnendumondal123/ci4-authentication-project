<?= $this->extend('template/main') ?>

<?= $this->section('content') ?>

    <main class="about-container">
    
        <section class="about-hero">
    
            <div class="about-image">
                <img src="<?= base_url('image/mypic.jpg') ?>" alt="Purnendu Mondal">
            </div>
    
            <div class="about-info">
    
                <h1>About Me</h1>
    
                <p>
                    Hello, I am <span class="highlight-name">Purnendu Mondal</span>.
                    I am passionate about Web Development and enjoy building
                    dynamic web applications using PHP, CodeIgniter 4,
                    Django, MySQL, HTML, CSS and JavaScript.
                </p>
    
                <div class="info-grid">
    
                    <div class="info-item">
                        <strong>Name:</strong>
                        <span>Purnendu Mondal</span>
                    </div>
    
                    <div class="info-item">
                        <strong>Father's Name:</strong>
                        <span>Chitta Mondal</span>
                    </div>
    
                    <div class="info-item">
                        <strong>Gender:</strong>
                        <span>Male</span>
                    </div>
    
                    <div class="info-item">
                        <strong>Date of Birth:</strong>
                        <span>11/11/2000</span>
                    </div>
    
                </div>
    
            </div>
    
        </section>
    
        <section class="education-section">
    
            <h2 class="section-title">
                School Education
            </h2>
    
            <div class="table-wrapper">
    
                <table class="custom-table">
    
                    <thead>
                        <tr>
                            <th>Exam</th>
                            <th>Board</th>
                            <th>Passing Year</th>
                        </tr>
                    </thead>
    
                    <tbody>
                        <tr>
                            <td>Secondary</td>
                            <td>WBBSE</td>
                            <td>2016</td>
                        </tr>
    
                        <tr>
                            <td>Higher Secondary</td>
                            <td>WBSCTVE</td>
                            <td>2018</td>
                        </tr>
                    </tbody>
    
                </table>
    
            </div>
    
        </section>
    
        <section class="education-section">
    
            <h2 class="section-title">
                Technical Education
            </h2>
    
            <div class="table-wrapper">
    
                <table class="custom-table">
    
                    <thead>
                        <tr>
                            <th>College Name</th>
                            <th>Stream</th>
                            <th>Passing Year</th>
                            <th>Percentage</th>
                        </tr>
                    </thead>
    
                    <tbody>
                        <tr>
                            <td>Budge Budge Institute of Technology</td>
                            <td>Electronics & Telecommunication</td>
                            <td>2021</td>
                            <td>76%</td>
                        </tr>
                    </tbody>
    
                </table>
    
            </div>
    
        </section>
    
    </main>


<?= $this->endSection(); ?>