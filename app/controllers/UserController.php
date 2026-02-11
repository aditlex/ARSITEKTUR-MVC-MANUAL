<?php
// app/Controllers/UserController.php
namespace App\Controllers;

use App\View;

class UserController
{
    // Ubah (int $id) menjadi (array $params)
    public function show(array $params)
    {
        // Ambil ID dari dalam array params
        $id = $params['id'] ?? 0;

        // Mock data user
        $user = [
            'id' => $id,
            'name' => 'John Doe',
            'username' => 'johndoe',
            'email' => 'john@example.com',
            'avatar' => 'https://via.placeholder.com/120',
            'bio' => "Saya seorang web developer yang suka membangun aplikasi yang bersih dan efisien.",
            'created_at' => '2024-01-15',
            'last_login' => '2025-02-09 10:30:00'
        ];

        return View::make('users/profile')
            ->layout('layouts/main')
            ->with([
                'pageTitle' => $user['name'] . ' - Profil',
                'user' => $user
            ])
            ->render();
    }

    public function list()
    {
        $users = [
            ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com'],
            ['id' => 2, 'name' => 'Jane Smith', 'email' => 'jane@example.com'],
            ['id' => 3, 'name' => 'Bob Johnson', 'email' => 'bob@example.com'],
        ];

        return View::make('users/list')
            ->layout('layouts/main')
            ->with([
                'pageTitle' => 'Daftar Pengguna',
                'users' => $users
            ])
            ->render();
    }
}