<?php

namespace Tests\Feature;

use App\Models\Sign;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LikeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if a video is liked by a logged in user, the video is liked
     *
     * @return void
     */
    public function test_sign_liked_by_logged_user()
    {
        $this->actingAs($user = User::factory()->create());

        $sign = Sign::factory()->create();

        $likings = $sign->likes->count();
        $this->assertEquals(0, $likings);

        $response = $this->post('/liked', ['signId' => $sign->id]);

        $response
            ->assertStatus(200)
            ->assertJson(['likes' => 1, 'liked' => true]);

        $sign->refresh();
        $this->assertCount(1, $sign->likes()->get());
        $this->assertCount(1, $user->likes()->get());
    }

    /**
     * Test if a video is liked by a logged in user, the video is liked
     *
     * @return void
     */
    public function test_sign_liked_by_non_logged_user()
    {
        $sign = Sign::factory()->create();

        $likings = $sign->likes->count();
        $this->assertEquals(0, $likings);

        $response = $this->post('/liked', ['signId' => $sign->id]);

        $response
            ->assertStatus(400);

        $sign->refresh();
        $this->assertCount(0, $sign->likes()->get());
    }

    public function test_liked_sign_not_exist()
    {
        $this->expectException(ModelNotFoundException::class);

        $response = $this->post('/liked', ['signId' => 42]);

        $response
            ->assertStatus(404)
            ->assertSeeText("Ikke fundet")
            ->assertJson(['exception' => ModelNotFoundException::class]);
    }

    public function test_like_wrong_input()
    {
        $response = $this->post('/liked', ['signId' => 'lol!']);
        $response->assertRedirect('/')->assertSessionHasErrors('signId');
    }
}
