<?php

namespace Tests\Unit;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        //Given I have two records in the database that are posts,
        // and each one is posted a month apart

        $first = factory(Post::class)->create();

        $second = factory(Post::class)->create([
            'created_at' => \Carbon\Carbon::now()->subMonth()
        ]);

        //When I fetch the archives.
        $posts = Post::archives();

        //The response should be in the proper format.

        $this->assertEquals([
            [
                'year' => $first->created_at->year,
                'month' => $first->created_at->format('F'),
                'published' => 1
            ],

            [
                'year' => $second->created_at->year,
                'month' => $second->created_at->format('F'),
                'published' => 1
            ],

        ], $posts);
    }
}
