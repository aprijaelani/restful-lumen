<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    public function get_checklist(Request $request,$checklistId)
    {

      if (!$request->page_limit) {
            $request->page_limit = 10;
        }
        if (!$request->page_offset) {
            $request->page_offset = 0;
        }

        $query_paramaters = array(
            'include'       => $request->include,
            'filter'        => $request->filter,
            'sort'          => $request->sort,
            'fields'        => $request->fields,
            'page_limit'    => $request->page_limit,
            'page_offset'   => $request->page_offset,
        );

        $data = '{
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
                    "created_at": "2018-01-25T07:50:14+00:00"
                  },
                  "links": {
                    "self": "https://dev-kong.command-api.kw.com/checklists/50127"
                  }
                }';

        $data = json_decode($data);
        if ($checklistId==1) {
          return response()->json([
                  'data'    => $data,
              ],200);
        }else{
              return response()->json([
                  'status'    => 404,
                  'error'    => 'Not Found',
              ],200);      
        }

    }

    public function update_checklist(Request $request,$checklistId)
    {
        $request = ' {
                      "attributes": {
                        "name": "foo template",
                        "checklist": {
                          "description": "my checklist",
                          "due_interval": 3,
                          "due_unit": "hour"
                        },
                        "items": [
                          {
                            "description": "my foo item",
                            "urgency": 2,
                            "due_interval": 40,
                            "due_unit": "minute"
                          },
                          {
                            "description": "my bar item",
                            "urgency": 3,
                            "due_interval": 30,
                            "due_unit": "minute"
                          }
                        ]
                      }
                    }';

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
                        "created_at": "2018-01-25T07:50:14+00:00"
                      },
                      "links": {
                        "self": "https://dev-kong.command-api.kw.com/checklists/50127"
                      }
                    }';

        $data = json_decode($response);

        if (!$request) {
          return response()->json([
                  'status'    => '500',
                  'error'    => 'Server Error',
              ],500);

        }elseif ($checklistId != 1) {
          return response()->json([
                  'status'    => '404',
                  'error'    => 'Not Found',
              ],404);
        }{        
          return response()->json([
                  'data'    => $data,
              ],201);
        }
    }

    public function delete_checklist(Request $request,$checklistId)
    {
      $response = 'The 204 response';

        if ($checklistId != 1) {
          return response()->json([
                  'status'    => '404',
                  'error'    => 'Not Found',
              ],404);

        }else{        

            return response()->json([
            'data' => $response
            ],204    );
        
        }

    }

    public function create_checklist(Request $request)
    {

      $request = ' {
                  "attributes": {
                    "object_domain": "contact",
                    "object_id": "1",
                    "due": "2019-01-25T07:50:14+00:00",
                    "urgency": 1,
                    "description": "Need to verify this guy house.",
                    "items": [
                      "Visit his house",
                      "Capture a photo",
                      "Meet him on the house"
                    ],
                    "task_id": "123"
                  }
                }';
        
        $response = '{
                      "type": "checklists",
                      "id": "1547",
                      "attributes": {
                        "object_domain": "contact",
                        "object_id": "1",
                        "task_id": "123",
                        "description": "Need to verify this guy house.",
                        "is_completed": false,
                        "due": "2019-01-19T18:34:51+00:00",
                        "urgency": "2",
                        "completed_at": null,
                        "updated_by": null,
                        "created_by": 556396,
                        "created_at": "2019-04-12T14:13:42+00:00",
                        "updated_at": "2019-04-12T14:13:42+00:00"
                      },
                      "links": {
                        "self": "http://localhost:8000/api/v1/checklists/1547"
                      }
                    }';

        $data = json_decode($response);
        
        if (!$request) {
          return response()->json([
                  'status'    => '500',
                  'error'    => 'Server Error',
              ],500);

        }else{        
          return response()->json([
                  'data'    => $data,
              ],201);
        }
    }

    public function get_list_checklist(Request $request)
    {
        if (!$request->page_limit) {
            $request->page_limit = 10;
        }
        if (!$request->page_offset) {
            $request->page_offset = 0;
        }

        $query_paramaters = array(
            'include'       => $request->include,
            'filter'        => $request->filter,
            'sort'          => $request->sort,
            'fields'        => $request->fields,
            'page_limit'    => $request->page_limit,
            'page_offset'   => $request->page_offset,
        );

        $meta = '{
                  "count": 10,
                  "total": 100
                }';
        $links = '{
                    "first": "https://kong.command-api.kw.com/api/v1/checklists?page[limit]=10&page[offset]=0",
                    "last": "https://kong.command-api.kw.com/api/v1/checklists?page[limit]=10&page[offset]=10",
                    "next": "https://kong.command-api.kw.com/api/v1/checklists?page[limit]=10&page[offset]=10",
                    "prev": "null"
                  }';
        $response = '{
                      "type": "checklists",
                      "id": "1",
                      "attributes": {
                        "object_domain": "contact",
                        "object_id": "1",
                        "description": "Need to verify this guy house.",
                        "is_completed": false,
                        "due": null,
                        "task_id": 1,
                        "urgency": null,
                        "completed_at": null,
                        "last_update_by": null,
                        "update_at": null,
                        "created_at": "2018-01-25T07:50:14+00:00"
                      },
                      "links": {
                        "self": "https://kong.command-api.kw.com/api/v1/checklists/1/"
                      }
                    }';

        $meta = json_decode($meta);
        $links = json_decode($links);
        $data = json_decode($response);

        if ($request->page_limit == '' && $request->page_offset == '') {
          return response()->json([
                  'status'    => '500',
                  'error'    => 'Server Error',
              ],500);

        }else{        
          return response()->json([
                  'meta'    => $meta,
                  'links'    => $links,
                  'data'    => $data,
              ],200);
        }
    }


    public function histories_checklist()
    {
        $meta = '{
                  "count": 1,
                  "total": 1
                }';
        $response = '[
                      {
                        "type": "history",
                        "id": "270",
                        "attributes": {
                          "loggable_type": "items",
                          "loggable_id": 791,
                          "action": "assign",
                          "kwuid": 556396,
                          "value": "123",
                          "created_at": "2019-04-26T15:10:32+00:00",
                          "updated_at": "2019-04-26T15:10:32+00:00"
                        },
                        "links": {
                          "self": "http://localhost:8000/api/v1/history/270"
                        }
                      }
                    ]';

        $links = '{
                    "first": "http://localhost:8000/api/v1/history?page[limit]=10&page[offset]=0",
                    "last": "http://localhost:8000/api/v1/history?page[limit]=10&page[offset]=0",
                    "next": null,
                    "prev": null
                  }';

        $meta = json_decode($meta);
        $links = json_decode($links);
        $data = json_decode($response);

          return response()->json([
                  'meta'    => $meta,
                  'links'    => $links,
                  'data'    => $data,
              ],200);
    }


    public function histories_byid_checklist($id)
    {
        $response = '{
                      "type": "history",
                      "id": "54",
                      "attributes": {
                        "loggable_type": "items",
                        "loggable_id": 133,
                        "action": "assign",
                        "kwuid": 556396,
                        "value": "123",
                        "created_at": "2019-04-26T16:46:56+00:00",
                        "updated_at": "2019-04-26T16:46:56+00:00"
                      },
                      "links": {
                        "self": "http://localhost:8000/api/v1/history/54"
                      }
                    }';


        $data = json_decode($response);

          return response()->json([
                  'data'    => $data,
              ],200);
    }
}
