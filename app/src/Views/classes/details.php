<?php if ($class === null): ?>
    <p>Class not found.</p>
<?php else: ?>
    <article class="card shadow-sm">
        <div class="card-body p-4">
            <p class="text-uppercase fw-semibold accent-text"><?= htmlspecialchars($class['training_type']) ?></p>
            <h1 class="h2"><?= htmlspecialchars($class['title']) ?></h1>
            <p class="lead"><?= htmlspecialchars($class['description']) ?></p>
            <div class="row g-3">
                <div class="col-md-3"><strong>Date:</strong> <?= htmlspecialchars($class['class_date']) ?></div>
                <div class="col-md-3"><strong>Time:</strong> <?= htmlspecialchars($class['start_time']) ?></div>
                <div class="col-md-3"><strong>Level:</strong> <?= htmlspecialchars($class['level']) ?></div>
                <div class="col-md-3"><strong>Booked:</strong> <?= (int) $class['active_reservations'] ?> / <?= (int) $class['max_participants'] ?></div>
            </div>
        </div>
    </article>
<?php endif; ?>
