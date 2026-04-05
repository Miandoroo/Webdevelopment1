<div class="mb-4">
    <h1 class="h2 mb-1">Admin: users</h1>
    <p class="muted-text mb-0">Overview of registered accounts.</p>
</div>

<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Theme</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= htmlspecialchars($user['name']) ?></td>
                <td><?= htmlspecialchars($user['email']) ?></td>
                <td><?= htmlspecialchars($user['role']) ?></td>
                <td><?= htmlspecialchars($user['theme_preference']) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
