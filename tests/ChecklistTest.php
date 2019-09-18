<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ChecklistTest extends TestCase
{
    public function testGetCheklist()
    {
        $user = \App\user::where('id',1)->first();

        $response = $this->actingAs($user, 'api')
         ->get('/checklists/1');

        $response->assertResponseOk();
        $response->seeJsonStructure([
            'data',
        ]);
    }

    public function testUpdateCheklist()
    {
        $user = \App\user::where('id',1)->first();

        $response = $this->actingAs($user, 'api')
         ->patch('/checklists/1');

        $response->assertResponseStatus(201);
        $response->seeJsonStructure([
            'data',
        ]);
    }


    public function testCreateCheklist()
    {
        $user = \App\user::where('id',1)->first();

        $response = $this->actingAs($user, 'api')
         ->post('/checklists');

        $response->assertResponseStatus(201);
        $response->seeJsonStructure([
            'data',
        ]);
    }

    public function testDeleteCheklist()
    {
        $user = \App\user::where('id',1)->first();

        $response = $this->actingAs($user, 'api')
         ->delete('/checklists/1');

        $response->assertResponseStatus(204);
    }

    public function testGetListChecklist()
    {
        $user = \App\user::where('id',1)->first();

        $response = $this->actingAs($user, 'api')
         ->get('/checklists');

        $response->assertResponseOk();
        $response->seeJsonStructure([
            'meta',
            'links',
            'data',
        ]);
    }

    public function testHistoryChecklist()
    {
        $user = \App\user::where('id',1)->first();

        $response = $this->actingAs($user, 'api')
         ->get('/checklist/histories');

        $response->assertResponseOk();
        $response->seeJsonStructure([
            'data',
        ]);
    }

    public function testHistoryByIdChecklist()
    {
        $user = \App\user::where('id',1)->first();

        $response = $this->actingAs($user, 'api')
         ->get('/checklist/histories/1');

        $response->assertResponseOk();
        $response->seeJsonStructure([
            'data',
        ]);
    }


}
