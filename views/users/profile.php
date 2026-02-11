<!-- views/users/profile.php -->
<div class="user-profile">
    <div class="user-header">
        <img src="<?= htmlspecialchars($user['avatar'] ?? '/default-avatar.png') ?>" 
             alt="<?= htmlspecialchars($user['name']) ?>">
        <h1><?= htmlspecialchars($user['name']) ?></h1>
        <p class="user-email"><?= htmlspecialchars($user['email']) ?></p>
    </div>

    <div class="user-details">
        <h2>Informasi Profil</h2>
        <table>
            <tr>
                <td><strong>ID Pengguna:</strong></td>
                <td><?= htmlspecialchars($user['id']) ?></td>
            </tr>
            <tr>
                <td><strong>Username:</strong></td>
                <td><?= htmlspecialchars($user['username']) ?></td>
            </tr>
            <tr>
                <td><strong>Bergabung Sejak:</strong></td>
                <td><?= htmlspecialchars($user['created_at']) ?></td>
            </tr>
            <tr>
                <td><strong>Login Terakhir:</strong></td>
                <td><?= htmlspecialchars($user['last_login']) ?></td>
            </tr>
        </table>
    </div>

    <?php if (!empty($user['bio'])): ?>
    <div class="user-bio">
        <h2>Tentang</h2>
        <p><?= nl2br(htmlspecialchars($user['bio'])) ?></p>
    </div>
    <?php endif; ?>
</div>

<style>
    .user-profile { padding: 2rem; }
    .user-header {
        text-align: center;
        padding: 2rem;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 10px;
        margin-bottom: 2rem;
    }
    .user-header img {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        border: 4px solid white;
        margin-bottom: 1rem;
    }
    .user-email { opacity: 0.9; }
    .user-details, .user-bio {
        background: #f9f9f9;
        padding: 2rem;
        border-radius: 5px;
        margin-bottom: 1rem;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    table td {
        padding: 0.8rem;
        border-bottom: 1px solid #ddd;
    }
</style>

