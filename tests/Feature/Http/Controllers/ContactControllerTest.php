<?php

namespace Tests\Feature\Http\Controllers;

use App\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ContactController
 */
class ContactControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $contacts = factory(Contact::class, 3)->create();

        $response = $this->get(route('contact.index'));

        $response->assertOk();
        $response->assertViewIs('contacts.index');
        $response->assertViewHas('contacts');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('contact.create'));

        $response->assertOk();
        $response->assertViewIs('contacts.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ContactController::class,
            'store',
            \App\Http\Requests\ContactStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $name = $this->faker->name;
        $email = $this->faker->safeEmail;
        $message = $this->faker->text;

        $response = $this->post(route('contact.store'), [
            'name' => $name,
            'email' => $email,
            'message' => $message,
        ]);

        $contacts = Contact::query()
            ->where('name', $name)
            ->where('email', $email)
            ->where('message', $message)
            ->get();
        $this->assertCount(1, $contacts);
        $contact = $contacts->first();

        $response->assertRedirect(route('contacts.thanks'));
    }
}
