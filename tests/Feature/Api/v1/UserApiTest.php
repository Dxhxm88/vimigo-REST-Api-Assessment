<?php

namespace Tests\Feature\Api\v1;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Tests\TestCase;

class UserApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_register()
    {
        // $this->withoutExceptionHandling();

        $response = $this->postJson('/api/register', [
            'name' => 'Test One',
            'email' => 'test@test.com',
            'password' => 'password',
            'password_confirmation' => 'password'
        ]);

        $response->assertStatus(201);
    }

    public function test_user_register_form_validation_errors()
    {
        $response = $this->postJson('/api/register', [
            'name' => '',
            'email' => '',
            'password' => '',
            'password_confirmation'  => ''
        ]);

        $response->assertStatus(422);
        $response->assertJson([
            'errors' => array()
        ]);
    }

    public function test_user_can_logout()
    {
        Passport::actingAs(User::factory()->create(), ['']);

        $response = $this->post('api/logout');

        $response->assertStatus(200);
    }

    public function test_authenticated_user_can_create_new_user()
    {
        Passport::actingAs(User::factory()->create(), ['']);

        $response = $this->postJson('/api/users', [
            'name' => 'Test User',
            'email' => 'test@test.com',
            'password' => 'password'
        ]);

        $response->assertStatus(201);
    }

    public function test_authenticated_user_can_access_all_users_filter_by_name_and_email()
    {
        Passport::actingAs(User::factory()->create(), ['']);

        $response = $this->get('/api/users');

        $response->assertStatus(200);
        // $response->assertJsonCount(5, 'data');
    }

    public function test_authenticated_user_can_update_a_user()
    {
        $user = User::factory()->create();
        Passport::actingAs($user, ['']);


        $response = $this->put('/api/users/' . $user->id, [
            'name' => 'John',
            'email' => 'john@test.com',
            'password' => 'password'
        ]);

        $response->assertStatus(200);
    }

    public function test_authenticated_user_can_delete_user()
    {
        User::factory(2)->create();
        $user = User::first();
        Passport::actingAs($user, ['']);

        $response = $this->delete('/api/users/' . ($user->id + 1));

        $response->assertStatus(200);
    }
}
