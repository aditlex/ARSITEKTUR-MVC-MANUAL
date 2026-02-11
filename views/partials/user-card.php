<!-- views/partials/user-card.php -->
<div class="user-card">
    <img src="<?= htmlspecialchars($avatar ?? '/default-avatar.png') ?>" alt="<?= htmlspecialchars($name) ?>">
    <h3><?= htmlspecialchars($name) ?></h3>
    <p><?= htmlspecialchars($email) ?></p>
    <?php if (isset($showButton) && $showButton): ?>
        <a href="/users/<?= $id ?>" class="btn">Lihat Profil</a>
    <?php endif; ?>
</div>