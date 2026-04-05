<div class="mb-4">
    <h1 class="h2 mb-1">Trainers</h1>
    <p class="muted-text mb-0">Meet the coaching team behind the classes.</p>
</div>

<div class="row g-4">
    <?php foreach ($trainers as $trainer): ?>
        <div class="col-md-6">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h2 class="h5"><?= htmlspecialchars($trainer['name']) ?></h2>
                    <p class="mb-2"><?= htmlspecialchars($trainer['biography']) ?></p>
                    <p class="small muted-text mb-3"><?= htmlspecialchars($trainer['specializations']) ?></p>
                    <a href="/trainers/<?= (int) $trainer['id'] ?>" class="btn btn-outline-dark btn-sm">View profile</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
