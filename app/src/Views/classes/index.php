<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h2 mb-1">Class schedule</h1>
        <p class="muted-text mb-0">Filter the schedule without refreshing the page.</p>
    </div>
</div>

<form class="row g-3 mb-4" data-schedule-filters>
    <div class="col-md-4">
        <label class="form-label" for="level">Level</label>
        <select id="level" name="level" class="form-select">
            <option value="">All levels</option>
            <option value="beginner">Beginner</option>
            <option value="intermediate">Intermediate</option>
        </select>
    </div>
    <div class="col-md-4">
        <label class="form-label" for="training_type">Training type</label>
        <select id="training_type" name="training_type" class="form-select">
            <option value="">All types</option>
            <option value="HIIT">HIIT</option>
            <option value="Strength">Strength</option>
        </select>
    </div>
</form>

<div class="row g-4" data-schedule-results>
    <?php foreach ($classes as $item): ?>
        <div class="col-md-6">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between gap-3">
                        <div>
                            <h2 class="h5"><?= htmlspecialchars($item['title']) ?></h2>
                            <p class="mb-1"><?= htmlspecialchars($item['class_date']) ?> at <?= htmlspecialchars($item['start_time']) ?></p>
                            <p class="mb-1"><?= htmlspecialchars($item['training_type']) ?> · <?= htmlspecialchars($item['level']) ?></p>
                            <p class="mb-3">Trainer: <?= htmlspecialchars($item['trainer_name'] ?? 'TBA') ?></p>
                        </div>
                        <div class="text-end">
                            <span class="badge text-bg-light"><?= (int) $item['max_participants'] ?> spots</span>
                        </div>
                    </div>
                    <p data-booking-status class="small muted-text">Ready to book.</p>
                    <div class="d-flex gap-2">
                        <a href="/classes/<?= (int) $item['id'] ?>" class="btn btn-outline-dark btn-sm">Details</a>
                        <button type="button" class="btn btn-dark btn-sm" data-book-class="<?= (int) $item['id'] ?>">Book with AJAX</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
