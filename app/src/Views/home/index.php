<section class="hero-panel mb-5">
    <div class="row g-4 align-items-center">
        <div class="col-lg-7">
            <p class="text-uppercase fw-semibold accent-text">Scoped assignment MVP</p>
            <h1 class="display-5 fw-bold">Book gym classes with a clean MVC structure.</h1>
            <p class="lead muted-text">This project focuses on the features that match the course: authentication, class booking, trainers, admin pages, JSON endpoints and AJAX updates.</p>
            <div class="d-flex gap-3">
                <a href="/classes" class="btn btn-dark">View schedule</a>
                <a href="/register" class="btn btn-outline-dark">Create account</a>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h2 class="h4">What is included</h2>
                    <ul class="mb-0">
                        <li>Sessions and role-based access</li>
                        <li>PDO repositories with prepared statements</li>
                        <li>Bootstrap responsive views</li>
                        <li>Fetch-based class filtering and booking</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mb-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h3 mb-0">Upcoming classes</h2>
        <a href="/classes" class="link-dark">Full schedule</a>
    </div>
    <div class="row g-4">
        <?php foreach ($featuredClasses as $item): ?>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h3 class="h5"><?= htmlspecialchars($item['title']) ?></h3>
                        <p class="mb-1"><?= htmlspecialchars($item['class_date']) ?> at <?= htmlspecialchars($item['start_time']) ?></p>
                        <p class="mb-0 muted-text"><?= htmlspecialchars($item['training_type']) ?> · <?= htmlspecialchars($item['level']) ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<section>
    <h2 class="h3 mb-3">Featured trainers</h2>
    <div class="row g-4">
        <?php foreach ($trainers as $trainer): ?>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h3 class="h5"><?= htmlspecialchars($trainer['name']) ?></h3>
                        <p class="muted-text mb-0"><?= htmlspecialchars($trainer['specializations']) ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
