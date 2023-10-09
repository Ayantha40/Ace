<?php

namespace Tests\Unit;

use Illuminate\Foundation\Auth\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function testUserRetrieval(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    // public function test_user_duplication(): void
    // {
    //    $user1 = User::make([
    //     'name' => 'Ayantha Seneviratne',
    //     'email' => 'ayantha1004@gmail.com'
    //    ]);

    //    $user2 = User::make([
    //     'name' => 'Bashini Seneviratne',
    //     'email' => 'bashii@gmail.com'
    //    ]);

    //    $this->assertTrue($user1->name != $user2->name);
    // }

    // public function test_delete_user()
    // {
    //     $user = User::factory()->count(1)->make();

    //     $user = User::first();

    //     if($user){
    //         $user-> delete();
    //     }
    //     $this->assertTrue(true);
    // }
    // public function test_it_stores_new_users()
    // {
    //     $response = $this-> post('/register', [
    //         'name' => 'Bashini Seneviratne',
    //         'email' => 'bashii@gmail.com',
    //         'password' => 'capybara12',
    //         'password_confirmation' => 'capybara12'
    //     ]);
    //     $response->assertRedirect('/home');
    // // }
    // public function testUserUpdate()
    // {
    //     $user = User::factory()->create();

    //     $user->update([
    //         'name' => 'Kanchana Senadheera',
    //         'email' => 'kanchanas@gmail.com',
    //     ]);

    //     $this->assertEquals('Updated Name', $user->fresh()->name);
    //     $this->assertEquals('updated@example.com', $user->fresh()->email);
    // }
    // public function testUser_Retrieval()
    // {
    //     $user = User::factory()->create();

    //     $retrievedUser = User::find($user->id);

    //     $this->assertInstanceOf(User::class, $retrievedUser);
    //     $this->assertEquals($user->name, $retrievedUser->name);
    //     $this->assertEquals($user->email, $retrievedUser->email);
    // }
}
