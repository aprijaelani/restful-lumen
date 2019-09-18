<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function list_all_cheklist_template(Request $request)
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

        $meta = '{
                  "count": 10,
                  "total": 100
                }';

        $links = ' {
                    "first": "https://kong.command-api.kw.com/api/v1/checklists/templates?page[limit]=10&page[offset]=0",
                    "last": "https://kong.command-api.kw.com/api/v1/checklists/templates?page[limit]=10&page[offset]=10",
                    "next": "https://kong.command-api.kw.com/api/v1/checklists/templates?page[limit]=10&page[offset]=10",
                    "prev": "null"
                  }';

        $data = '[
                        {
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
                      ]';
        $meta = json_decode($meta);
        $links = json_decode($links);
        $data = json_decode($data);
        
        return response()->json([
                'meta'    => $meta,
                'links'    => $links,
                'data'    => $data,
            ],200);

    }

    public function create_checklist_template()
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
                      "id": 1,
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

        $data = json_decode($response);
        
        return response()->json([
                'data'    => $data,
            ],201);
    }

    public function get_checklist_template(Request $request,$templateId)
    {

        $response = '{
                    "type": "templates",
                    "id": "2",
                    "attributes": {
                      "name": "foo template",
                      "items": [
                        {
                          "urgency": 2,
                          "due_unit": "minute",
                          "description": "my foo item",
                          "due_interval": 40
                        },
                        {
                          "urgency": 3,
                          "due_unit": "minute",
                          "description": "my bar item",
                          "due_interval": 30
                        }
                      ],
                      "checklist": {
                        "due_unit": "hour",
                        "description": "my checklist",
                        "due_interval": 3
                      }
                    },
                    "links": {
                      "self": "http://localhost:8000/api/v1/templates/2"
                    }
                  }';

        $data = json_decode($response);
        
        return response()->json([
                'data'    => $data,
            ],200);
    }

    public function update_checklist_template(Request $request)
    {
        $request = '{
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
                  }';
        
        $response = '{
                      "id": 1,
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

        $data = json_decode($response);
        
        return response()->json([
                'data'    => $data,
            ],200);
    }

    public function delete_checklist_template(Request $request,$templateId)
    {
        
        $response = 'The 204 response';

        
        return response()->json([
            'data' => $response
            ],204    );
    }

    public function assign_checklist_template(Request $request,$templateId)
    {

        $request = '[
                      {
                        "attributes": {
                          "object_id": 1,
                          "object_domain": "deals"
                        }
                      },
                      {
                        "attributes": {
                          "object_id": 2,
                          "object_domain": "deals"
                        }
                      },
                      {
                        "attributes": {
                          "object_id": 3,
                          "object_domain": "deals"
                        }
                      }
                    ]';

        $meta = '{
                  "count": 3,
                  "total": 3
                }';

        $data = '[
                  {
                    "type": "checklists",
                    "id": "509",
                    "attributes": {
                      "object_domain": "deals",
                      "object_id": 1,
                      "description": "my checklist",
                      "is_completed": false,
                      "due": "2019-02-16T03:07:10+00:00",
                      "urgency": 0,
                      "completed_at": null,
                      "updated_by": null,
                      "created_by": 556396,
                      "created_at": "2019-02-16T00:07:10+00:00",
                      "updated_at": "2019-02-16T00:07:10+00:00"
                    },
                    "links": {
                      "self": "http://localhost:8000/api/v1/checklists/509"
                    },
                    "relationships": {
                      "items": {
                        "links": {
                          "self": "http://localhost:8000/api/v1/checklists/509/relationships/items",
                          "related": "http://localhost:8000/api/v1/checklists/509/items"
                        },
                        "data": [
                          {
                            "type": "items",
                            "id": "839"
                          },
                          {
                            "type": "items",
                            "id": "840"
                          }
                        ]
                      }
                    }
                  },
                  {
                    "type": "checklists",
                    "id": "510",
                    "attributes": {
                      "object_domain": "deals",
                      "object_id": 2,
                      "description": "my checklist",
                      "is_completed": false,
                      "due": "2019-02-16T03:07:10+00:00",
                      "urgency": 0,
                      "completed_at": null,
                      "updated_by": null,
                      "created_by": 556396,
                      "created_at": "2019-02-16T00:07:10+00:00",
                      "updated_at": "2019-02-16T00:07:10+00:00"
                    },
                    "links": {
                      "self": "http://localhost:8000/api/v1/checklists/510"
                    },
                    "relationships": {
                      "items": {
                        "links": {
                          "self": "http://localhost:8000/api/v1/checklists/510/relationships/items",
                          "related": "http://localhost:8000/api/v1/checklists/510/items"
                        },
                        "data": [
                          {
                            "type": "items",
                            "id": "841"
                          },
                          {
                            "type": "items",
                            "id": "842"
                          }
                        ]
                      }
                    }
                  },
                  {
                    "type": "checklists",
                    "id": "511",
                    "attributes": {
                      "object_domain": "deals",
                      "object_id": 3,
                      "description": "my checklist",
                      "is_completed": false,
                      "due": "2019-02-16T03:07:10+00:00",
                      "urgency": 0,
                      "completed_at": null,
                      "updated_by": null,
                      "created_by": 556396,
                      "created_at": "2019-02-16T00:07:10+00:00",
                      "updated_at": "2019-02-16T00:07:10+00:00"
                    },
                    "links": {
                      "self": "http://localhost:8000/api/v1/checklists/511"
                    },
                    "relationships": {
                      "items": {
                        "links": {
                          "self": "http://localhost:8000/api/v1/checklists/511/relationships/items",
                          "related": "http://localhost:8000/api/v1/checklists/511/items"
                        },
                        "data": [
                          {
                            "type": "items",
                            "id": "843"
                          },
                          {
                            "type": "items",
                            "id": "844"
                          }
                        ]
                      }
                    }
                  }
                ]';
        
        $include = '[
                    {
                      "type": "items",
                      "id": "839",
                      "attributes": {
                        "description": "my foo item",
                        "is_completed": false,
                        "completed_at": null,
                        "due": "2019-02-16T00:47:10+00:00",
                        "urgency": 2,
                        "updated_by": null,
                        "user_id": 556396,
                        "checklist_id": 509,
                        "deleted_at": null,
                        "created_at": "2019-02-16T00:07:10+00:00",
                        "updated_at": "2019-02-16T00:07:10+00:00"
                      },
                      "links": {
                        "self": "http://localhost:8000/api/v1/items/839"
                      }
                    },
                    {
                      "type": "items",
                      "id": "840",
                      "attributes": {
                        "description": "my bar item",
                        "is_completed": false,
                        "completed_at": null,
                        "due": "2019-02-16T00:37:10+00:00",
                        "urgency": 3,
                        "updated_by": null,
                        "user_id": 556396,
                        "checklist_id": 509,
                        "deleted_at": null,
                        "created_at": "2019-02-16T00:07:10+00:00",
                        "updated_at": "2019-02-16T00:07:10+00:00"
                      },
                      "links": {
                        "self": "http://localhost:8000/api/v1/items/840"
                      }
                    },
                    {
                      "type": "items",
                      "id": "841",
                      "attributes": {
                        "description": "my foo item",
                        "is_completed": false,
                        "completed_at": null,
                        "due": "2019-02-16T00:47:10+00:00",
                        "urgency": 2,
                        "updated_by": null,
                        "user_id": 556396,
                        "checklist_id": 510,
                        "deleted_at": null,
                        "created_at": "2019-02-16T00:07:10+00:00",
                        "updated_at": "2019-02-16T00:07:10+00:00"
                      },
                      "links": {
                        "self": "http://localhost:8000/api/v1/items/841"
                      }
                    },
                    {
                      "type": "items",
                      "id": "842",
                      "attributes": {
                        "description": "my bar item",
                        "is_completed": false,
                        "completed_at": null,
                        "due": "2019-02-16T00:37:10+00:00",
                        "urgency": 3,
                        "updated_by": null,
                        "user_id": 556396,
                        "checklist_id": 510,
                        "deleted_at": null,
                        "created_at": "2019-02-16T00:07:10+00:00",
                        "updated_at": "2019-02-16T00:07:10+00:00"
                      },
                      "links": {
                        "self": "http://localhost:8000/api/v1/items/842"
                      }
                    },
                    {
                      "type": "items",
                      "id": "843",
                      "attributes": {
                        "description": "my foo item",
                        "is_completed": false,
                        "completed_at": null,
                        "due": "2019-02-16T00:47:10+00:00",
                        "urgency": 2,
                        "updated_by": null,
                        "user_id": 556396,
                        "checklist_id": 511,
                        "deleted_at": null,
                        "created_at": "2019-02-16T00:07:10+00:00",
                        "updated_at": "2019-02-16T00:07:10+00:00"
                      },
                      "links": {
                        "self": "http://localhost:8000/api/v1/items/843"
                      }
                    },
                    {
                      "type": "items",
                      "id": "844",
                      "attributes": {
                        "description": "my bar item",
                        "is_completed": false,
                        "completed_at": null,
                        "due": "2019-02-16T00:37:10+00:00",
                        "urgency": 3,
                        "updated_by": null,
                        "user_id": 556396,
                        "checklist_id": 511,
                        "deleted_at": null,
                        "created_at": "2019-02-16T00:07:10+00:00",
                        "updated_at": "2019-02-16T00:07:10+00:00"
                      },
                      "links": {
                        "self": "http://localhost:8000/api/v1/items/844"
                      }
                    }
                  ]';
        $meta = json_decode($meta);
        
        $data = json_decode($data);

        $include = json_decode($include);
        
        return response()->json([
                'meta'    => $meta,
                'data'    => $data,
                'include'    => $include,
            ],201);
    }

    public function assign_bulk_checklist_template(Request $request,$checklistId,$itemId)
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
}
