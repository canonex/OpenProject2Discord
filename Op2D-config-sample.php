<?php


$DEBUG = false; //True will use fake data from fakeData()


/** Retrieve the correct name association
/**	@return	arrays	the mapping between openproject usernames and discord nicknames
*/
function namesConvert(){

	$namesConvert = [
		'OpenProject User1' => '<@123456789123456789>', //Example user id, change with the appropriate one
		'OpenProject User2' => '<@321654987321654987>', // find it using slash before, ex. \@Janie
		'Johnny Doe' => '<@123456789123456789>',
		'Janie Doe' => '<@321654987321654987>'
	];

 return $namesConvert;
}



/** Retrieve the correct mapping project / channel
/** @param	string	the name of the channel
/**	@return	string	the url
*/
function urls($project){

	$urls = [
		'default' => 'https://discord.com/api/webhooks/             123456789123456789/qwertyuiopasdfghjklzxcvbnmqwertyuiasdfuiopsdfghjklxcbbnmsdfhjk346789',
		'OpenProject Project1' => 'https://discord.com/api/webhooks/123456789123456789/qwertyuiopasdfghjklzxcvbnmqwertyuiasdfuiopsdfghjklxcbbnmsdfhjk346789',
		'OpenProject Project2' => 'https://discord.com/api/webhooks/123456789123456789/qwertyuiopasdfghjklzxcvbnmqwertyuiasdfuiopsdfghjklxcbbnmsdfhjk346789',
		'New Website' => 'https://discord.com/api/webhooks/         123456789123456789/qwertyuiopasdfghjklzxcvbnmqwertyuiasdfuiopsdfghjklxcbbnmsdfhjk346789',
		'World Conquest' => 'https://discord.com/api/webhooks/      123456789123456789/qwertyuiopasdfghjklzxcvbnmqwertyuiasdfuiopsdfghjklxcbbnmsdfhjk346789',
		'Test OP' => 'https://discord.com/api/webhooks/      123456789123456789/qwertyuiopasdfghjklzxcvbnmqwertyuiasdfuiopsdfghjklxcbbnmsdfhjk346789' //Read below
	];


	$url = $urls['default'];

	if ( isset($project) ) {
		if ( isset($urls[$project])	) {
			$url = $urls[$project];		    
		}
	} elseif ($DEBUG) {
	    $url = $urls['Test OP']; //You can test it on a fake project, fake channel on Discord
	}

 return $url;
}



/** Retrieve fake data
/**	@return	json	the fake data
*/
function fakeData(){


	$data = '{ "action": "work_package:updated",
		  "work_package": {
			"_type": "WorkPackage",
			"id": 13,
			"lockVersion": 8,
			"subject": "Publish",
			"description": {
			  "format": "markdown",
			  "raw": "A Penrose tiling is an example of an aperiodic tiling. Here, a tiling is a covering of the plane by non-overlapping polygons or other shapes, and aperiodic means that shifting any tiling with these shapes by any finite distance, without rotation, cannot produce the same tiling. However, despite their lack of translational symmetry, Penrose tilings may have both reflection symmetry and fivefold rotational symmetry. Penrose tilings are named after mathematician and physicist Roger Penrose, who investigated them in the 1970s.",
			  "html": ""
			},
			"date": "2020-11-09",
			"estimatedTime": "PT16H",
			"derivedEstimatedTime": null,
			"percentageDone": 0,
			"createdAt": "2017-09-22T05:42:39Z",
			"updatedAt": "2020-09-30T16:47:54Z",
			"remainingTime": "PT16H",
			"_embedded": {
			  "attachments": {
				"_type": "Collection",
				"total": 0,
				"count": 0,
				"_embedded": {
				  "elements": [
				    
				  ]
				},
				"_links": {
				  "self": {
				    "href": "\/api\/v3\/work_packages\/13\/attachments"
				  }
				}
			  },
			  "relations": {
				"_type": "Collection",
				"total": 0,
				"count": 0,
				"_embedded": {
				  "elements": [
				    
				  ]
				},
				"_links": {
				  "self": {
				    "href": "\/api\/v3\/work_packages\/13\/relations"
				  }
				}
			  },
			  "type": {
				"_type": "Type",
				"id": 2,
				"name": "Milestone",
				"color": "#35C53F",
				"position": 2,
				"isDefault": true,
				"isMilestone": true,
				"createdAt": "2017-09-20T12:00:59Z",
				"updatedAt": "2017-09-20T12:00:59Z",
				"_links": {
				  "self": {
				    "href": "\/api\/v3\/types\/2",
				    "title": "Milestone"
				  }
				}
			  },
			  "priority": {
				"_type": "Priority",
				"id": 8,
				"name": "Normal",
				"position": 2,
				"color": null,
				"isDefault": true,
				"isActive": true,
				"_links": {
				  "self": {
				    "href": "\/api\/v3\/priorities\/8",
				    "title": "Normal"
				  }
				}
			  },
			  "project": {
				"_type": "Project",
				"id": 2,
				"identifier": "testproject",
				"name": "TestProject",
				"active": true,
				"public": false,
				"description": {
				  "format": "markdown",
				  "raw": "Et si omnes ego non.",
				  "html": "Et si omnes ego non.<\/p>"
				},
				"createdAt": "2017-09-21T13:28:57Z",
				"updatedAt": "2020-02-04T11:36:42Z",
				"status": "off track",
				"statusExplanation": {
				  "format": "markdown",
				  "raw": "",
				  "html": ""
				},
				"_links": {
				  "self": {
				    "href": "\/api\/v3\/projects\/2",
				    "title": "TestProject"
				  },
				  "createWorkPackage": {
				    "href": "\/api\/v3\/projects\/2\/work_packages\/form",
				    "method": "post"
				  },
				  "createWorkPackageImmediately": {
				    "href": "\/api\/v3\/projects\/2\/work_packages",
				    "method": "post"
				  },
				  "workPackages": {
				    "href": "\/api\/v3\/projects\/2\/work_packages"
				  },
				  "categories": {
				    "href": "\/api\/v3\/projects\/2\/categories"
				  },
				  "versions": {
				    "href": "\/api\/v3\/projects\/2\/versions"
				  },
				  "memberships": {
				    "href": "\/api\/v3\/memberships?filters=%5B%7B%22project%22%3A%7B%22operator%22%3A%22%3D%22%2C%22values%22%3A%5B%222%22%5D%7D%7D%5D"
				  },
				  "types": {
				    "href": "\/api\/v3\/projects\/2\/types"
				  },
				  "update": {
				    "href": "\/api\/v3\/projects\/2\/form",
				    "method": "post"
				  },
				  "updateImmediately": {
				    "href": "\/api\/v3\/projects\/2",
				    "method": "patch"
				  },
				  "delete": {
				    "href": "\/api\/v3\/projects\/2",
				    "method": "delete"
				  },
				  "schema": {
				    "href": "\/api\/v3\/projects\/schema"
				  },
				  "parent": {
				    "href": null,
				    "title": null
				  }
				}
			  },
			  "status": {
				"_type": "Status",
				"id": 1,
				"name": "New",
				"isClosed": false,
				"color": null,
				"isDefault": true,
				"isReadonly": false,
				"defaultDoneRatio": null,
				"position": 1,
				"_links": {
				  "self": {
				    "href": "\/api\/v3\/statuses\/1",
				    "title": "New"
				  }
				}
			  },
			  "author": {
				"_type": "User",
				"id": 1,
				"name": "OpenProject Doe",
				"createdAt": "2017-09-20T12:01:49Z",
				"updatedAt": "2020-09-30T16:59:43Z",
				"login": "admin",
				"admin": true,
				"firstName": "OpenProject",
				"lastName": "Doe",
				"email": "info@doe.com",
				"avatar": "https:\/\/secure.gravatar.com\/avatar\/1234d186b12105f873858d06a8725b56?default=404&secure=true",
				"status": "active",
				"identityUrl": null,
				"_links": {
				  "self": {
				    "href": "\/api\/v3\/users\/1",
				    "title": "OpenProject Doe"
				  },
				  "memberships": {
				    "href": "\/api\/v3\/memberships?filters=%5B%7B%22principal%22%3A%7B%22operator%22%3A%22%3D%22%2C%22values%22%3A%5B%221%22%5D%7D%7D%5D",
				    "title": "Membri"
				  },
				  "showUser": {
				    "href": "\/users\/1",
				    "type": "text\/html"
				  },
				  "updateImmediately": {
				    "href": "\/api\/v3\/users\/1",
				    "title": "Update admin",
				    "method": "patch"
				  },
				  "lock": {
				    "href": "\/api\/v3\/users\/1\/lock",
				    "title": "Set lock on admin",
				    "method": "post"
				  },
				  "delete": {
				    "href": "\/api\/v3\/users\/1",
				    "title": "Delete admin",
				    "method": "delete"
				  }
				}
			  },
			  "responsible": {
				"_type": "User",
				"id": 8,
				"name": "John Doe",
				"createdAt": "2017-09-21T14:09:53Z",
				"updatedAt": "2020-09-30T16:17:39Z",
				"login": "john",
				"admin": false,
				"firstName": "John",
				"lastName": "Doe",
				"email": "john@doe.com",
				"avatar": "https:\/\/doe.com\/users\/8\/avatar",
				"status": "active",
				"identityUrl": null,
				"_links": {
				  "self": {
				    "href": "\/api\/v3\/users\/8",
				    "title": "John Doe"
				  },
				  "memberships": {
				    "href": "\/api\/v3\/memberships?filters=%5B%7B%22principal%22%3A%7B%22operator%22%3A%22%3D%22%2C%22values%22%3A%5B%228%22%5D%7D%7D%5D",
				    "title": "Membri"
				  },
				  "showUser": {
				    "href": "\/users\/8",
				    "type": "text\/html"
				  },
				  "updateImmediately": {
				    "href": "\/api\/v3\/users\/8",
				    "title": "Update john",
				    "method": "patch"
				  },
				  "lock": {
				    "href": "\/api\/v3\/users\/8\/lock",
				    "title": "Set lock on john",
				    "method": "post"
				  },
				  "delete": {
				    "href": "\/api\/v3\/users\/8",
				    "title": "Delete john",
				    "method": "delete"
				  }
				}
			  },
			  "assignee": {
				"_type": "User",
				"id": 7,
				"name": "Jane Doe",
				"createdAt": "2017-09-21T13:26:53Z",
				"updatedAt": "2020-09-30T14:53:54Z",
				"login": "jane_P",
				"admin": false,
				"firstName": "Jane",
				"lastName": "Doe",
				"email": "jane@doe.com",
				"avatar": "https:\/\/secure.gravatar.com\/avatar\/abcdeaf878a698b925272747f5fe35k3?default=404&secure=true",
				"status": "active",
				"identityUrl": null,
				"_links": {
				  "self": {
				    "href": "\/api\/v3\/users\/7",
				    "title": "Jane Doe"
				  },
				  "memberships": {
				    "href": "\/api\/v3\/memberships?filters=%5B%7B%22principal%22%3A%7B%22operator%22%3A%22%3D%22%2C%22values%22%3A%5B%227%22%5D%7D%7D%5D",
				    "title": "Membri"
				  },
				  "showUser": {
				    "href": "\/users\/7",
				    "type": "text\/html"
				  },
				  "updateImmediately": {
				    "href": "\/api\/v3\/users\/7",
				    "title": "Update jane_P",
				    "method": "patch"
				  },
				  "lock": {
				    "href": "\/api\/v3\/users\/7\/lock",
				    "title": "Set lock on jane_P",
				    "method": "post"
				  },
				  "delete": {
				    "href": "\/api\/v3\/users\/7",
				    "title": "Delete jane_P",
				    "method": "delete"
				  }
				}
			  },
			  "customActions": [
				
			  ]
			},
			"_links": {
			  "attachments": {
				"href": "\/api\/v3\/work_packages\/13\/attachments"
			  },
			  "addAttachment": {
				"href": "\/api\/v3\/work_packages\/13\/attachments",
				"method": "post"
			  },
			  "self": {
				"href": "\/api\/v3\/work_packages\/13",
				"title": "Publish"
			  },
			  "update": {
				"href": "\/api\/v3\/work_packages\/13\/form",
				"method": "post"
			  },
			  "schema": {
				"href": "\/api\/v3\/work_packages\/schemas\/2-2"
			  },
			  "updateImmediately": {
				"href": "\/api\/v3\/work_packages\/13",
				"method": "patch"
			  },
			  "delete": {
				"href": "\/api\/v3\/work_packages\/13",
				"method": "delete"
			  },
			  "logTime": {
				"href": "\/work_packages\/13\/time_entries\/new",
				"type": "text\/html",
				"title": "Log time on Publish"
			  },
			  "move": {
				"href": "\/work_packages\/13\/move\/new",
				"type": "text\/html",
				"title": "Move Publish"
			  },
			  "copy": {
				"href": "\/work_packages\/13\/copy",
				"title": "Copy Publish"
			  },
			  "pdf": {
				"href": "\/work_packages\/13.pdf",
				"type": "application\/pdf",
				"title": "Export as PDF"
			  },
			  "atom": {
				"href": "\/work_packages\/13.atom",
				"type": "application\/rss+xml",
				"title": "Atom feed"
			  },
			  "availableRelationCandidates": {
				"href": "\/api\/v3\/work_packages\/13\/available_relation_candidates",
				"title": "Potential work packages to relate to"
			  },
			  "customFields": {
				"href": "\/projects\/testproject\/settings\/custom_fields",
				"type": "text\/html",
				"title": "Custom fields"
			  },
			  "configureForm": {
				"href": "\/types\/2\/edit?tab=form_configuration",
				"type": "text\/html",
				"title": "Configure form"
			  },
			  "activities": {
				"href": "\/api\/v3\/work_packages\/13\/activities"
			  },
			  "availableWatchers": {
				"href": "\/api\/v3\/work_packages\/13\/available_watchers"
			  },
			  "relations": {
				"href": "\/api\/v3\/work_packages\/13\/relations"
			  },
			  "revisions": {
				"href": "\/api\/v3\/work_packages\/13\/revisions"
			  },
			  "watchers": {
				"href": "\/api\/v3\/work_packages\/13\/watchers"
			  },
			  "addWatcher": {
				"href": "\/api\/v3\/work_packages\/13\/watchers",
				"method": "post",
				"payload": {
				  "user": {
				    "href": "\/api\/v3\/users\/{user_id}"
				  }
				},
				"templated": true
			  },
			  "removeWatcher": {
				"href": "\/api\/v3\/work_packages\/13\/watchers\/{user_id}",
				"method": "delete",
				"templated": true
			  },
			  "addRelation": {
				"href": "\/api\/v3\/work_packages\/13\/relations",
				"method": "post",
				"title": "Add relation"
			  },
			  "changeParent": {
				"href": "\/api\/v3\/work_packages\/13",
				"method": "patch",
				"title": "Change parent of Publish"
			  },
			  "addComment": {
				"href": "\/api\/v3\/work_packages\/13\/activities",
				"method": "post",
				"title": "Add comment"
			  },
			  "previewMarkup": {
				"href": "\/api\/v3\/render\/markdown?context=\/api\/v3\/work_packages\/13",
				"method": "post"
			  },
			  "timeEntries": {
				"href": "\/work_packages\/13\/time_entries",
				"type": "text\/html",
				"title": "Time entries"
			  },
			  "ancestors": [
				
			  ],
			  "category": {
				"href": null
			  },
			  "type": {
				"href": "\/api\/v3\/types\/2",
				"title": "Milestone"
			  },
			  "priority": {
				"href": "\/api\/v3\/priorities\/8",
				"title": "Normal"
			  },
			  "project": {
				"href": "\/api\/v3\/projects\/2",
				"title": "TestProject"
			  },
			  "status": {
				"href": "\/api\/v3\/statuses\/1",
				"title": "New"
			  },
			  "author": {
				"href": "\/api\/v3\/users\/1",
				"title": "OpenProject Doe"
			  },
			  "responsible": {
				"href": "\/api\/v3\/users\/8",
				"title": "John Doe"
			  },
			  "assignee": {
				"href": "\/api\/v3\/users\/7",
				"title": "Jane Doe"
			  },
			  "version": {
				"href": null
			  },
			  "parent": {
				"href": null,
				"title": null
			  },
			  "customActions": [
				
			  ],
			  "logCosts": {
				"href": "\/work_packages\/13\/cost_entries\/new",
				"type": "text\/html",
				"title": "Log costs on Publish"
			  },
			  "showCosts": {
				"href": "\/work_packages\/13\/cost_entries",
				"type": "text\/html",
				"title": "Show cost entries"
			  },
			  "convertBCF": {
				"href": "\/api\/bcf\/2.1\/projects\/testproject\/topics",
				"title": "Convert to BCF",
				"payload": {
				  "reference_links": [
				    "\/api\/v3\/work_packages\/13"
				  ]
				},
				"method": "post"
			  }
			}
		  }
		}';




 return $data;
}

?>
