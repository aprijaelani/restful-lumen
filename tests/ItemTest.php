<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ItemTest extends TestCase
{
    public function testComplete()
    {
        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user, 'api')
         ->post('/checklists/complete');

        $response->assertResponseOk();
        $response->seeJsonStructure([
            'data',
        ]);
    }

    public function testIncomplete()
    {
        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user, 'api')
         ->post('/checklists/incomplete');

        $response->assertResponseOk();
        $response->seeJsonStructure([
            'data',
        ]);
    }

    public function testListAllItems()
    {
        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user, 'api')
         ->get('/checklists/1/items',[
            'filter' => 'test',
            'sort' => 'test',
            'urgency' => 'test',
            'fields' => 'test',
            'page_limit' => '10',
            'page_offset' => '0',
        ]);

        $response->assertResponseOk();
        $response->seeJsonStructure([
            'data',
        ]);
    }

    public function testCreateChecklistItem()
    {
        $user = \App\user::where('id',1)->first();

        $response = $this->actingAs($user, 'api')
         ->post('/checklists/1/items');

        $response->assertResponseOk();
        $response->seeJsonStructure([
            'data',
        ]);
    }

    public function testGetChecklistItem()
    {
        $user = \App\user::where('id',1)->first();

        $response = $this->actingAs($user, 'api')
         ->get('/checklists/1/items/1');

        $response->assertResponseOk();
        $response->seeJsonStructure([
            'data',
        ]);
    }

    public function testUpdateChecklistItem()
    {
        $user = \App\user::where('id',1)->first();

        $response = $this->actingAs($user, 'api')
         ->get('/checklists/1/items/1');

        $response->assertResponseOk();
        $response->seeJsonStructure([
            'data',
        ]);
    }

    public function testDeleteChecklistItem()
    {
        $user = \App\user::where('id',1)->first();

        $response = $this->actingAs($user, 'api')
         ->delete('/checklists/1/items/1');

        $response->assertResponseOk();
        $response->seeJsonStructure([
            'data',
        ]);
    }

    public function testUpdateBulkChecklist()
    {
        $user = \App\user::where('id',1)->first();

        $response = $this->actingAs($user, 'api')
         ->post('/checklists/1/items/_bulk');

        $response->assertResponseOk();
        $response->seeJsonStructure([
            'data',
        ]);
    }

    public function testItemsSummaries()
    {
        $user = \App\user::where('id',1)->first();

        $response = $this->actingAs($user, 'api')
         ->get('/checklists/items/summaries');

        $response->assertResponseOk();
        $response->seeJsonStructure([
            'data',
        ]);
    }

}
