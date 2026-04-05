<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h2 mb-1">Dashboard</h1>
        <p class="muted-text mb-0">Welcome back, <?= htmlspecialchars($user['name'] ?? 'member') ?>.</p>
    </div>
    <a href="/account/settings" class="btn btn-outline-dark">Account settings</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <h2 class="h4 mb-3">My reservations</h2>
        <?php if ($reservations === []): ?>
            <p class="mb-0">No reservations yet.</p>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                    <tr>
                        <th>Class</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($reservations as $reservation): ?>
                        <tr>
                            <td><?= htmlspecialchars($reservation['title']) ?></td>
                            <td><?= htmlspecialchars($reservation['class_date']) ?></td>
                            <td><?= htmlspecialchars($reservation['start_time']) ?></td>
                            <td><?= htmlspecialchars($reservation['status']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>
