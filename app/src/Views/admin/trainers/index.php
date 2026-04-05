<div class="mb-4">
    <h1 class="h2 mb-1">Admin: trainers</h1>
    <p class="muted-text mb-0">Manage trainer records here.</p>
</div>

<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Certifications</th>
            <th>Specializations</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($trainers as $trainer): ?>
            <tr>
                <td><?= htmlspecialchars($trainer['name']) ?></td>
                <td><?= htmlspecialchars($trainer['certifications']) ?></td>
                <td><?= htmlspecialchars($trainer['specializations']) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
