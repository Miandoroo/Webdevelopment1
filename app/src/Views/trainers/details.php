<?php if ($trainer === null): ?>
    <p>Trainer not found.</p>
<?php else: ?>
    <article class="card shadow-sm">
        <div class="card-body p-4">
            <h1 class="h2"><?= htmlspecialchars($trainer['name']) ?></h1>
            <p><?= htmlspecialchars($trainer['biography']) ?></p>
            <p><strong>Certifications:</strong> <?= htmlspecialchars($trainer['certifications']) ?></p>
            <p class="mb-0"><strong>Specializations:</strong> <?= htmlspecialchars($trainer['specializations']) ?></p>
        </div>
    </article>
<?php endif; ?>
