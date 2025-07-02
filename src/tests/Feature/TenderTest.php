<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Tender;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TenderTest extends TestCase
{
    use RefreshDatabase;

    public function test_index(): void
    {
        Tender::factory(5)->create();
        $response = $this->get('/api/v1/tenders');
        $response->assertStatus(200)
        ->assertJson(fn (AssertableJson $json) =>
            $json
                ->has('data', 5)
                ->has('links')
                ->has('meta')
                ->has('data.0', fn (AssertableJson $json) =>
                    $json
                        ->whereAllType([
                            'id' => 'integer',
                            'external_code' => 'integer',
                            'number' => 'string',
                            'name' => 'string',
                            'status' => 'string',
                            'updated_at' => 'string',
                        ])
                        ->etc()
                )
        );
    }
    public function test_show(): void
    {

        $tender = Tender::factory()->create();
        $response = $this->get("/api/v1/tenders/$tender->id");
        $response
            ->assertStatus(200)
            ->assertJson(fn (AssertableJson $json) =>
                $json
                    ->whereAllType([
                            'id' => 'integer',
                            'external_code' => 'integer',
                            'number' => 'string',
                            'name' => 'string',
                            'status' => 'string',
                            'updated_at' => 'string',
                    ])
                    ->etc()
            );

    }
    public function test_store(): void
    {
        $response = $this->postJson('/api/v1/tenders', [
            'external_code' => 0,
            'number' => 'string',
            'status' => 'Открыто',
            'name' => 'string',
            'updated_at' => '2019-08-24 12:10:20'
        ]);
        // dd($response);
        $response
            ->assertStatus(201)
            ->assertJson([
                'id' => 1,
                'external_code' => 0,
                'number' => 'string',
                'status' => 'Открыто',
                'name' => 'string',
                'updated_at' => '2019-08-24 12:10:20'
            ]);
    }
}
