<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function complete_item()
    {
        $request = '[
                    {
                      "item_id": 1
                    },
                    {
                      "item_id": 2
                    },
                    {
                      "item_id": 3
                    },
                    {
                      "item_id": 4
                    }
                  ]';
        $response = '[
                        {
                          "id": 1,
                          "item_id": 1,
                          "is_completed": true,
                          "checklist_id": 1
                        },
                        {
                          "id": 2,
                          "item_id": 2,
                          "is_completed": true,
                          "checklist_id": 1
                        },
                        {
                          "id": 3,
                          "item_id": 3,
                          "is_completed": true,
                          "checklist_id": 1
                        },
                        {
                          "id": 4,
                          "item_id": 4,
                          "is_completed": true,
                          "checklist_id": 1
                        }
                      ]';
        $data = json_decode($response);
        
        return response()->json([
                'data'    => $data,
            ],200);

    }

    public function incomplete_item()
    {
        $request = ' [
                        {
                          "item_id": 1
                        },
                        {
                          "item_id": 2
                        }
                      ]';
        $response = '[
                        {
                          "id": 1,
                          "item_id": 1,
                          "is_completed": false,
                          "checklist_id": 1
                        },
                        {
                          "id": 2,
                          "item_id": 2,
                          "is_completed": false,
                          "checklist_id": 1
                        },
                        {
                          "id": 3,
                          "item_id": 3,
                          "is_completed": false,
                          "checklist_id": 1
                        },
                        {
                          "id": 4,
                          "item_id": 4,
                          "is_completed": false,
                          "checklist_id": 1
                        }
                      ]';

        $data = json_decode($response);
        
        return response()->json([
                'data'    => $data,
            ],200);
    }

    public function list_all_item(Request $request,$checklistId)
    {
        if (!$request->page_limit) {
            $request->page_limit = 10;
        }
        if (!$request->page_limit) {
            $request->page_offset = 0;
        }

        $query_paramaters = array(
            'filter'        => $request->filter,
            'sort'          => $request->sort,
            'fields'        => $request->fields,
            'page_limit'    => $request->page_limit,
            'page_offset'   => $request->page_offset,
                );

        $response = '{
                        "type": "checklists",
                        "id": 1,
                        "attributes": {
                          "object_domain": "contact",
                          "object_id": "1",
                          "description": "Need to verify this guy house.",
                          "is_completed": false,
                          "due": null,
                          "urgency": 0,
                          "completed_at": null,
                          "last_update_by": null,
                          "update_at": null,
                          "created_at": "2018-01-25T07:50:14+00:00",
                          "items": [
                            {
                              "id": "1",
                              "name": "Sample",
                              "user_id": "1",
                              "is_completed": false,
                              "due": null,
                              "urgency": 0,
                              "checklist_id": 13,
                              "assignee_id": 123,
                              "task_id": "123",
                              "completed_at": null,
                              "last_update_by": null,
                              "update_at": null,
                              "created_at": "2018-01-25T07:50:14+00:00"
                            },
                            {
                              "id": "2",
                              "name": "Sample 2",
                              "user_id": "1",
                              "is_completed": false,
                              "due": null,
                              "urgency": 0,
                              "checklist_id": 13,
                              "assignee_id": 123,
                              "task_id": "123",
                              "completed_at": null,
                              "last_update_by": null,
                              "update_at": null,
                              "created_at": "2018-01-25T07:50:14+00:00"
                            }
                          ]
                        },
                        "links": {
                          "self": "https://dev-kong.command-api.kw.com/checklists/50127"
                        }
                      }';

        $data = json_decode($response);
        
        return response()->json([
                'data'    => $data,
            ],200);
    }

    public function create_checklist_item(Request $request)
    {
        if (!$request->page_limit) {
            $request->page_limit = 10;
        }
        if (!$request->page_limit) {
            $request->page_offset = 0;
        }

        $query_paramaters = array(
            'filter'        => $request->filter,
            'sort'          => $request->sort,
            'fields'        => $request->fields,
            'page_limit'    => $request->page_limit,
            'page_offset'   => $request->page_offset,
                );
        
        $response = '{
            "type": "checklists",
            "id": 1,
            "attributes": {
              "description": "Example Item.",
              "is_completed": false,
              "completed_at": null,
              "due": null,
              "urgency": 0,
              "updated_by": null,
              "updated_at": null,
              "created_at": "2018-01-25T07:50:14+00:00"
            },
            "links": {
              "self": "https://dev-kong.command-api.kw.com/checklists/50127"
            }
        }';

        $data = json_decode($response);
        
        return response()->json([
                'data'    => $data,
            ],200);
    }

    public function get_checklist_item(Request $request,$checklistId,$itemId)
    {
        
        $response = '{
                        "type": "checklists",
                        "id": 1,
                        "attributes": {
                          "description": "Need to verify this guy house.",
                          "is_completed": false,
                          "completed_at": null,
                          "due": "2019-01-19T18:34:51+00:00",
                          "urgency": 2,
                          "updated_by": null,
                          "created_by": 556396,
                          "checklist_id": 1547,
                          "assignee_id": 123,
                          "task_id": "123",
                          "deleted_at": null,
                          "created_at": "2019-04-12T16:50:47+00:00",
                          "updated_at": "2019-04-12T16:50:47+00:00"
                        },
                        "links": {
                          "self": "https://dev-kong.command-api.kw.com/checklists/50127"
                        }
                      }';

        $data = json_decode($response);
        
        return response()->json([
                'data'    => $data,
            ],200);
    }

    public function update_checklist_item(Request $request,$checklistId,$itemId)
    {

        $request = '{
                      "data": {
                        "attribute": {
                          "description": "Need to verify this guy house.",
                          "due": "2019-01-19 18:34:51",
                          "urgency": "2",
                          "assignee_id": 123
                        }
                      }
                    }';
        
        $response = '{
                        "type": "checklists",
                        "id": 1,
                        "attributes": {
                          "description": "Need to verify this guy house.",
                          "is_completed": false,
                          "completed_at": null,
                          "due": "2019-01-19T18:34:51+00:00",
                          "urgency": 2,
                          "updated_by": null,
                          "created_by": 556396,
                          "checklist_id": 1547,
                          "assignee_id": 123,
                          "task_id": "123",
                          "deleted_at": null,
                          "created_at": "2019-04-12T16:50:47+00:00",
                          "updated_at": "2019-04-12T16:50:47+00:00"
                        },
                        "links": {
                          "self": "https://dev-kong.command-api.kw.com/checklists/50127"
                        }
                      }';

        $data = json_decode($response);
        
        return response()->json([
                'data'    => $data,
            ],200);
    }

    public function delete_checklist_item(Request $request,$checklistId,$itemId)
    {
        
        $response = '{
                        "type": "checklists",
                        "id": 1,
                        "attributes": {
                          "description": "Need to verify this guy house.",
                          "is_completed": false,
                          "completed_at": null,
                          "due": "2019-01-19T18:34:51+00:00",
                          "urgency": 2,
                          "updated_by": null,
                          "created_by": 556396,
                          "checklist_id": 1547,
                          "assignee_id": 123,
                          "task_id": "123",
                          "deleted_at": null,
                          "created_at": "2019-04-12T16:50:47+00:00",
                          "updated_at": "2019-04-12T16:50:47+00:00"
                        },
                        "links": {
                          "self": "https://dev-kong.command-api.kw.com/checklists/50127"
                        }
                      }';

        $data = json_decode($response);
        
        return response()->json([
                'data'    => $data,
            ],200);
    }

    public function update_bulk_checklist(Request $request)
    {
        $request = '[
                        {
                          "id": "64",
                          "action": "update",
                          "attributes": {
                            "description": "",
                            "due": "2019-01-19 18:34:51",
                            "urgency": "2"
                          }
                        },
                        {
                          "id": "205",
                          "action": "update",
                          "attributes": {
                            "description": "{{data.attributes.description}}",
                            "due": "2019-01-19 18:34:51",
                            "urgency": "2"
                          }
                        }
                      ]';
        
        $response = '[
                        {
                          "id": "1",
                          "action": "update",
                          "status": 200
                        },
                        {
                          "id": "2",
                          "action": "update",
                          "status": 404
                        },
                        {
                          "id": "3",
                          "action": "update",
                          "status": 403
                        }
                    ]';

        $data = json_decode($response);
        
        return response()->json([
                'data'    => $data,
            ],200);
    }

    public function item_summaries()
    {        
        $response = '{
                    "today": 0,
                    "past_due": 0,
                    "this_week": 2,
                    "past_week": 0,
                    "this_month": 2,
                    "past_month": 0,
                    "total": 2
                  }';

        $data = json_decode($response);
        
        return response()->json([
                'data'    => $data,
            ],200);
    }
}
