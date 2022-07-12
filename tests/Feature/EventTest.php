<?php

namespace Tests\Feature;

use App\Models\Event;
use Tests\TestCase;

class EventTest extends TestCase
{
    /**
     * @test
     * @return void
     */
    public function shouldReturnAllEvents()
    {
        Event::factory()->count(3)->create();
        $response = $this->getJson('/api/events');

        $response->assertJsonStructure([
            '*' => [
                'name',
                'slug'
            ]
        ]);
        $response->assertStatus(200);
    }

    /**
     * @test
     * @return void
     */
    public function shouldFindEventById()
    {
        $event = Event::factory()->create();
        $response = $this->getJson('/api/events/' . $event->id);
        $response->assertJson($event->toArray());
        $response->assertStatus(200);
    }

    /**
     * @test
     * @return void
     */
    public function shouldCreateEvent()
    {
        $event = Event::factory()->make()->toArray();
        $response = $this->postJson('/api/events', $event);
        $response->assertStatus(201);
    }

    /**
     * @test
     * @return void
     */
    public function shouldUpdateEvent()
    {
        $event = Event::factory()->create();
        $response = $this->putJson('/api/events/' . $event->id, $event->toArray());
        $response->assertStatus(200);
    }

    /**
     * @test
     * @return void
     */
    public function shouldDeleteEvent()
    {
        $event = Event::factory()->create();
        $response = $this->deleteJson('/api/events/' . $event->id);
        $response->assertStatus(200);
    }
}
