<div class="mb-4">
    <h1 class="h2 mb-1">Admin: classes</h1>
    <p class="muted-text mb-0">This page is ready for full CRUD expansion.</p>
</div>

<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th>Title</th>
            <th>Date</th>
            <th>Level</th>
            <th>Trainer</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($classes as $item): ?>
            <tr>
                <td><?= htmlspecialchars($item['title']) ?></td>
                <td><?= htmlspecialchars($item['class_date']) ?></td>
                <td><?= htmlspecialchars($item['level']) ?></td>
                <td><?= htmlspecialchars($item['trainer_name'] ?? 'TBA') ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
