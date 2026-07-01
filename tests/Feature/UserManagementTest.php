<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserManagementTest extends TestCase
{
    use RefreshDatabase;

    protected $adminUser;
    protected $petugasUser;

    protected function setUp(): void
    {
        parent::setUp();

        // Create standard roles
        $this->adminUser = User::create([
            'name' => 'Super Admin',
            'email' => 'admin@ppid.test',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);

        $this->petugasUser = User::create([
            'name' => 'Petugas PPID',
            'email' => 'petugas@ppid.test',
            'password' => bcrypt('password'),
            'role' => 'petugas'
        ]);
    }

    public function test_non_admin_cannot_access_user_management()
    {
        // 1. Unauthenticated guest
        $response = $this->get('/admin/users');
        $response->assertRedirect('/login');

        // 2. Authenticated Petugas (should return 403 Forbidden)
        $this->actingAs($this->petugasUser);
        $response2 = $this->get('/admin/users');
        $response2->assertStatus(403);
    }

    public function test_super_admin_can_view_users_list()
    {
        $this->actingAs($this->adminUser);

        $response = $this->get('/admin/users');
        $response->assertStatus(200)
                 ->assertSee('Super Admin')
                 ->assertSee('Petugas PPID');
    }

    public function test_super_admin_can_create_new_user()
    {
        $this->actingAs($this->adminUser);

        $response = $this->postJson('/admin/users', [
            'name' => 'Operator Baru',
            'email' => 'operator.baru@ppid.test',
            'password' => 'password123',
            'role' => 'petugas'
        ]);

        $response->assertStatus(200)
                 ->assertJsonFragment(['success' => true]);

        $this->assertDatabaseHas('users', [
            'name' => 'Operator Baru',
            'email' => 'operator.baru@ppid.test',
            'role' => 'petugas'
        ]);
    }

    public function test_super_admin_can_update_user_without_changing_password()
    {
        $this->actingAs($this->adminUser);

        $targetUser = User::create([
            'name' => 'User Lama',
            'email' => 'user.lama@ppid.test',
            'password' => bcrypt('password'),
            'role' => 'pimpinan'
        ]);

        $response = $this->postJson("/admin/users/{$targetUser->id}/update", [
            'name' => 'User Baru Diupdate',
            'email' => 'user.update@ppid.test',
            'role' => 'petugas'
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('users', [
            'id' => $targetUser->id,
            'name' => 'User Baru Diupdate',
            'email' => 'user.update@ppid.test',
            'role' => 'petugas'
        ]);
    }

    public function test_super_admin_cannot_delete_themselves()
    {
        $this->actingAs($this->adminUser);

        $response = $this->deleteJson("/admin/users/{$this->adminUser->id}");

        $response->assertStatus(400)
                 ->assertJsonFragment(['success' => false]);

        $this->assertDatabaseHas('users', ['id' => $this->adminUser->id]);
    }

    public function test_super_admin_can_delete_other_user()
    {
        $this->actingAs($this->adminUser);

        $targetUser = User::create([
            'name' => 'Akan Dihapus',
            'email' => 'delete.me@ppid.test',
            'password' => bcrypt('password'),
            'role' => 'petugas'
        ]);

        $response = $this->deleteJson("/admin/users/{$targetUser->id}");

        $response->assertStatus(200)
                 ->assertJsonFragment(['success' => true]);

        $this->assertDatabaseMissing('users', ['id' => $targetUser->id]);
    }
}
