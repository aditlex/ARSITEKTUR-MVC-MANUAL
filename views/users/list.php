<!-- views/users/list.php -->
<div class="users-container">
    <h1>Direktori Pengguna</h1>
    <p>Total pengguna: <?= count($users) ?></p>

    <div class="user-grid">
        <?php foreach ($users as $user): ?>
            <div class="user-card">
                <h3><?= htmlspecialchars($user['name']) ?></h3>
                <p><?= htmlspecialchars($user['email']) ?></p>
                <a href="/users/<?= $user['id'] ?>" class="btn">Lihat Profil</a>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<style>
    .users-container { padding: 2rem; }
    .user-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 1.5rem;
        margin-top: 2rem;
    }
    .user-card {
        background: white;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 1.5rem;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        transition: transform 0.2s;
    }
    .user-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.15);
    }
    .user-card h3 { margin-bottom: 0.5rem; color: #333; }
    .user-card p { color: #666; margin-bottom: 1rem; }
    .btn {
        display: inline-block;
        padding: 0.5rem 1rem;
        background: #667eea;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        transition: background 0.2s;
    }
    .btn:hover { background: #5568d3; }
</style>