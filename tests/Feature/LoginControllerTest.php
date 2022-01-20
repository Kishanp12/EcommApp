<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_going_to_login_view()
    {
        $response = $this->get('/auth/login');

        $response->assertStatus(200);
    }

    public function test_successful_login() {

        $user = User::factory()->create([
            'email' => 'testing@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $response = $this->post(route('auth.check'), [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertRedirect(route('user.dashboard'));

    }

    public function test_unsuccessful_login() {
        $user = User::factory()->create([
            'email' => 'testing@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $response = $this->post(route('auth.check'), [
            'email' => $user->email,
            'password' => 'pass',
        ]);

        $response->assertSessionHasErrors('email');

        $response->assertRedirect(route('auth.login'));

    }

    public function test_validation_errors_for_email() {
        $response = $this->post(route('auth.check'), [
            'email' => '',
            'password' => 'password',
        ]);

        $response->assertSessionHasErrors('email');
    }

    public function test_validation_errors_for_password() {
        $response = $this->post(route('auth.check'), [
            'email' => 'testing@gmail.com',
            'password' => '',
        ]);

        $response->assertSessionHasErrors('password');
    }


}
