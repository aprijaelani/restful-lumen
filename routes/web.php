<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('/register','AuthController@register');
$router->post('/login','AuthController@login');


$router->group(['prefix' => 'checklists','middleware' =>'auth'],function() use ($router){
	
	$router->post('/complete','ItemController@complete_item');
	$router->post('/incomplete','ItemController@incomplete_item');
	$router->get('/{checklistId}/items','ItemController@list_all_item');
	$router->post('/{checklistId}/items','ItemController@create_checklist_item');
	$router->get('/{checklistId}/items/{itemId}','ItemController@get_checklist_item');
	$router->patch('/{checklistId}/items/{itemId}','ItemController@update_checklist_item');
	$router->delete('/{checklistId}/items/{itemId}','ItemController@delete_checklist_item');
	$router->post('/{checklistId}/items/_bulk','ItemController@update_bulk_checklist');
	$router->get('/items/summaries','ItemController@item_summaries');


	$router->get('/templates','TemplateController@list_all_cheklist_template');
	$router->post('/templates','TemplateController@create_checklist_template');
	$router->get('/templates/{templateId}','TemplateController@get_checklist_template');
	$router->patch('/templates/{templateId}','TemplateController@update_checklist_template');
	$router->delete('/templates/{templateId}','TemplateController@delete_checklist_template');
	$router->post('/templates/{templateId}/assigns','TemplateController@assign_checklist_template');


	$router->get('/{checklistId}','ChecklistController@get_checklist');
	$router->patch('/{checklistId}','ChecklistController@update_checklist');
	$router->delete('/{checklistId}','ChecklistController@delete_checklist');
	$router->post('/','ChecklistController@create_checklist');
	$router->get('/','ChecklistController@get_list_checklist');

});

$router->group(['prefix' => 'checklist','middleware' =>'auth'],function() use ($router){
$router->get('/histories','ChecklistController@histories_checklist');
$router->get('/histories/{historyId}','ChecklistController@histories_byid_checklist');
	
});
