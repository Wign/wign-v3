<?php

namespace Tests\Feature;

use App\Models\Sign;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViewTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if a video is played with a not logged in user, the count is incremented by one
     *
     * @return void
     */
    public function test_sign_view_increment_if_played()
    {
        $sign = Sign::factory()->create();
        $playings = $sign->playings;

        $response = $this->post('/played', ['signId' => $sign->id]);

        $response
            ->assertStatus(200)
            ->assertJson(['playings' => $playings + 1]);

        $sign->refresh();
        $this->assertEquals($playings + 1, $sign->playings);

        $this->assertCount(0, $sign->views()->get());
    }

    /**
     * Test if a video is played with a not logged in user, the count is incremented by one
     *
     * @return void
     */
    public function test_sign_view_increment_if_played_by_logged_in_user()
    {
        $this->actingAs($user = User::factory()->create());

        $sign = Sign::factory()->create();
        $playings = $sign->playings;

        $response = $this->post('/played', ['signId' => $sign->id]);

        $response
            ->assertStatus(200)
            ->assertJson(['playings' => $playings + 1]);

        $sign->refresh();

        $this->assertEquals($playings + 1, $sign->playings);

        $this->assertCount(1, $sign->views()->get());
        $this->assertCount(1, $user->views()->get());
        $this->assertEquals($user->name, $sign->views()->first()->name);
    }

    public function test_sign_view_increment_sign_not_exist()
    {
        $this->expectException(ModelNotFoundException::class);

        $response = $this->post('/played', ['signId' => 42]);

        $response
            ->assertStatus(404)
            ->assertSeeText("Ikke fundet")
            ->assertJson(['exception' => ModelNotFoundException::class]);
    }
}
