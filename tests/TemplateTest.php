<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class TemplateTest extends TestCase
{
    public function testListAllCheklistTemplate()
    {
        $user = \App\user::where('id',1)->first();

        $response = $this->actingAs($user, 'api')
         ->get('/checklists/templates');

        $response->assertResponseOk();
        $response->seeJsonStructure([
            'data',
        ]);
    }

    public function testCreateCheklistTemplate()
    {
        $user = \App\user::where('id',1)->first();

        $response = $this->actingAs($user, 'api')
         ->post('/checklists/templates');

        $response->assertResponseStatus(201);
        $response->seeJsonStructure([
            'data',
        ]);
    }

    public function testGetCheklistTemplate()
    {
        $user = \App\user::where('id',1)->first();

        $response = $this->actingAs($user, 'api')
         ->get('/checklists/templates/1');

        $response->assertResponseOk();
        $response->seeJsonStructure([
            'data',
        ]);
    }

    public function testUpdateChecklistTemplate()
    {
        $user = \App\user::where('id',1)->first();

        $response = $this->actingAs($user, 'api')
         ->patch('/checklists/templates/1');

        $response->assertResponseOk();
        $response->seeJsonStructure([
            'data',
        ]);
    }

    public function testDeleteChecklistTemplate()
    {
        $user = \App\user::where('id',1)->first();

        $response = $this->actingAs($user, 'api')
         ->delete('/checklists/templates/1');

        $response->assertResponseStatus(204);
    }    

    public function testAssignChecklistTemplate()
    {
        $user = \App\user::where('id',1)->first();

        $response = $this->actingAs($user, 'api')
         ->post('/checklists/templates/1/assigns');

        $response->assertResponseStatus(201);
        $response->seeJsonStructure([
            'meta',
            'data',
            'include',
        ]);
    }
}
