<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CustomCommandsTest extends TestCase
{
    use RefreshDatabase;

    public function testAssignAdminRoleCommand()
    {
        $user = User::factory()->create();

        $this->artisan("assign:admin $user->email" )
            ->expectsOutput("User with email $user->email now has admin permission")
            ->assertSuccessful();

        $adminRoleNumber = 1;
        $this->assertNotNull( User::where('email',$user->email)->where('is_admin',$adminRoleNumber)->first());
    }
}
