<?php

namespace Tests\Feature\Http\Controllers;

use App\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PostController
 */
class PostControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $posts = factory(Post::class, 3)->create();

        $response = $this->get(route('post.index'));

        $response->assertOk();
        $response->assertViewIs('posts.index');
        $response->assertViewHas('posts');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('post.create'));

        $response->assertOk();
        $response->assertViewIs('posts.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PostController::class,
            'store',
            \App\Http\Requests\PostStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $title = $this->faker->sentence(4);
        $contents = $this->faker->text;

        $response = $this->post(route('post.store'), [
            'title' => $title,
            'contents' => $contents,
        ]);

        $posts = Post::query()
            ->where('title', $title)
            ->where('contents', $contents)
            ->get();
        $this->assertCount(1, $posts);
        $post = $posts->first();

        $response->assertRedirect(route('posts.show', [$post]));
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $post = factory(Post::class)->create();

        $response = $this->get(route('post.show', $post));

        $response->assertOk();
        $response->assertViewIs('posts.show');
        $response->assertViewHas('post');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $post = factory(Post::class)->create();

        $response = $this->get(route('post.edit', $post));

        $response->assertOk();
        $response->assertViewIs('posts.edit');
        $response->assertViewHas('post');
    }


    /**
     * @test
     */
    public function update_redirects()
    {
        $post = factory(Post::class)->create();

        $response = $this->put(route('post.update', $post));

        $post->refresh();

        $response->assertRedirect(route('posts.show', [$post]));
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $post = factory(Post::class)->create();

        $response = $this->delete(route('post.destroy', $post));

        $response->assertRedirect(route('posts.index'));

        $this->assertDeleted($post);
    }
}
