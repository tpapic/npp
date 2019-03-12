---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)
<!-- END_INFO -->

#Bid

Bid controller

Bid controller is used to index
update information about Bids
<!-- START_3fd4cc163edfb00567c9ae890049a2f5 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET "api.client.airticketarena.com//api/bids" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "api.client.airticketarena.com//api/bids",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET /api/bids`

`HEAD /api/bids`


<!-- END_3fd4cc163edfb00567c9ae890049a2f5 -->

<!-- START_95ba31b6ebf9ba90a0fde94fb7cfe114 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "api.client.airticketarena.com//api/bids" \
-H "Accept: application/json" \
    -d "starting_point"="dolor" \
    -d "destination"="dolor" \
    -d "outbound_date"="dolor" \
    -d "inbound_date"="dolor" \
    -d "travel_class_type_id"="dolor" \
    -d "flight_type_id"="dolor" \
    -d "ticket_type_id"="dolor" \
    -d "airline_id"="dolor" \
    -d "adult_count"="dolor" \
    -d "children_count"="dolor" \
    -d "infant_count"="dolor" \
    -d "adult_bid"="dolor" \
    -d "children_bid"="dolor" \
    -d "infant_bid"="dolor" \
    -d "fellow_ids"="dolor" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "api.client.airticketarena.com//api/bids",
    "method": "POST",
    "data": {
        "starting_point": "dolor",
        "destination": "dolor",
        "outbound_date": "dolor",
        "inbound_date": "dolor",
        "travel_class_type_id": "dolor",
        "flight_type_id": "dolor",
        "ticket_type_id": "dolor",
        "airline_id": "dolor",
        "adult_count": "dolor",
        "children_count": "dolor",
        "infant_count": "dolor",
        "adult_bid": "dolor",
        "children_bid": "dolor",
        "infant_bid": "dolor",
        "fellow_ids": "dolor"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST /api/bids`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    starting_point | string |  required  | 
    destination | string |  required  | 
    outbound_date | string |  required  | 
    inbound_date | string |  required  | 
    travel_class_type_id | string |  required  | 
    flight_type_id | string |  required  | 
    ticket_type_id | string |  required  | 
    airline_id | string |  required  | 
    adult_count | string |  required  | 
    children_count | string |  required  | 
    infant_count | string |  required  | 
    adult_bid | string |  required  | 
    children_bid | string |  required  | 
    infant_bid | string |  required  | 
    fellow_ids | array |  required  | 

<!-- END_95ba31b6ebf9ba90a0fde94fb7cfe114 -->

<!-- START_b9b1837d10e01f8890555622f76f37b0 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "api.client.airticketarena.com//api/bids/{bid}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "api.client.airticketarena.com//api/bids/{bid}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE /api/bids/{bid}`


<!-- END_b9b1837d10e01f8890555622f76f37b0 -->

#City

City controller

City controller is used to index
update information about cities
<!-- START_8e717950417f4b0c04343483848261a1 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET "api.client.airticketarena.com//api/cities" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "api.client.airticketarena.com//api/cities",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "exception": null,
    "headers": {},
    "original": {
        "cities": {
            "current_page": 1,
            "data": [
                {
                    "id": 3615,
                    "name": "Aachen",
                    "ZIP": null,
                    "country_id": 15,
                    "created_at": "2018-05-15 09:09:38",
                    "updated_at": "2018-05-15 09:09:38"
                },
                {
                    "id": 592,
                    "name": "Aalborg",
                    "ZIP": null,
                    "country_id": 25,
                    "created_at": "2018-05-15 09:09:26",
                    "updated_at": "2018-05-15 09:09:26"
                },
                {
                    "id": 364,
                    "name": "Aalen-heidenheim",
                    "ZIP": null,
                    "country_id": 15,
                    "created_at": "2018-05-15 09:09:25",
                    "updated_at": "2018-05-15 09:09:25"
                },
                {
                    "id": 573,
                    "name": "Aarhus",
                    "ZIP": null,
                    "country_id": 25,
                    "created_at": "2018-05-15 09:09:26",
                    "updated_at": "2018-05-15 09:09:26"
                },
                {
                    "id": 3486,
                    "name": "Aasiaat",
                    "ZIP": null,
                    "country_id": 2,
                    "created_at": "2018-05-15 09:09:38",
                    "updated_at": "2018-05-15 09:09:38"
                },
                {
                    "id": 1922,
                    "name": "Abadan",
                    "ZIP": null,
                    "country_id": 133,
                    "created_at": "2018-05-15 09:09:32",
                    "updated_at": "2018-05-15 09:09:32"
                },
                {
                    "id": 2639,
                    "name": "Abakan",
                    "ZIP": null,
                    "country_id": 186,
                    "created_at": "2018-05-15 09:09:34",
                    "updated_at": "2018-05-15 09:09:34"
                },
                {
                    "id": 1278,
                    "name": "Abbeville",
                    "ZIP": null,
                    "country_id": 82,
                    "created_at": "2018-05-15 09:09:29",
                    "updated_at": "2018-05-15 09:09:29"
                },
                {
                    "id": 166,
                    "name": "Abbotsford",
                    "ZIP": null,
                    "country_id": 4,
                    "created_at": "2018-05-15 09:09:25",
                    "updated_at": "2018-05-15 09:09:25"
                },
                {
                    "id": 1947,
                    "name": "Abe-ali",
                    "ZIP": null,
                    "country_id": 133,
                    "created_at": "2018-05-15 09:09:32",
                    "updated_at": "2018-05-15 09:09:32"
                },
                {
                    "id": 934,
                    "name": "Abeche",
                    "ZIP": null,
                    "country_id": 52,
                    "created_at": "2018-05-15 09:09:28",
                    "updated_at": "2018-05-15 09:09:28"
                },
                {
                    "id": 503,
                    "name": "Aberdeen",
                    "ZIP": null,
                    "country_id": 18,
                    "created_at": "2018-05-15 09:09:26",
                    "updated_at": "2018-05-15 09:09:26"
                },
                {
                    "id": 1887,
                    "name": "Abha",
                    "ZIP": null,
                    "country_id": 132,
                    "created_at": "2018-05-15 09:09:31",
                    "updated_at": "2018-05-15 09:09:31"
                },
                {
                    "id": 236,
                    "name": "Abidjan",
                    "ZIP": null,
                    "country_id": 9,
                    "created_at": "2018-05-15 09:09:25",
                    "updated_at": "2018-05-15 09:09:25"
                },
                {
                    "id": 3269,
                    "name": "Abilene",
                    "ZIP": null,
                    "country_id": 216,
                    "created_at": "2018-05-15 09:09:37",
                    "updated_at": "2018-05-15 09:09:37"
                },
                {
                    "id": 4194,
                    "name": "Ablow",
                    "ZIP": null,
                    "country_id": 126,
                    "created_at": "2018-05-15 09:09:41",
                    "updated_at": "2018-05-15 09:09:41"
                },
                {
                    "id": 1891,
                    "name": "Abqaiq",
                    "ZIP": null,
                    "country_id": 132,
                    "created_at": "2018-05-15 09:09:31",
                    "updated_at": "2018-05-15 09:09:31"
                },
                {
                    "id": 1984,
                    "name": "Abu Dhabi",
                    "ZIP": null,
                    "country_id": 138,
                    "created_at": "2018-05-15 09:09:32",
                    "updated_at": "2018-05-15 09:09:32"
                },
                {
                    "id": 1053,
                    "name": "Abu Simbel",
                    "ZIP": null,
                    "country_id": 70,
                    "created_at": "2018-05-15 09:09:28",
                    "updated_at": "2018-05-15 09:09:28"
                },
                {
                    "id": 243,
                    "name": "Abuja",
                    "ZIP": null,
                    "country_id": 10,
                    "created_at": "2018-05-15 09:09:25",
                    "updated_at": "2018-05-15 09:09:25"
                }
            ],
            "first_page_url": "http:\/\/localhost\/api.client.airticketarena.com\/api\/cities?page=1",
            "from": 1,
            "last_page": 232,
            "last_page_url": "http:\/\/localhost\/api.client.airticketarena.com\/api\/cities?page=232",
            "next_page_url": "http:\/\/localhost\/api.client.airticketarena.com\/api\/cities?page=2",
            "path": "http:\/\/localhost\/api.client.airticketarena.com\/api\/cities",
            "per_page": 20,
            "prev_page_url": null,
            "to": 20,
            "total": 4621
        },
        "success": true
    }
}
```

### HTTP Request
`GET /api/cities`

`HEAD /api/cities`


<!-- END_8e717950417f4b0c04343483848261a1 -->

#Country

Country controller

Country controller is used to index
update information about Countries
<!-- START_c050f66dd3f01da1c83fa26ad4ce3db2 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET "api.client.airticketarena.com//api/countries" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "api.client.airticketarena.com//api/countries",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "exception": null,
    "headers": {},
    "original": {
        "countries": {
            "current_page": 1,
            "data": [
                {
                    "id": 130,
                    "iso": null,
                    "name": "Afghanistan",
                    "nice_name": null,
                    "iso3": null,
                    "num_code": null,
                    "phone_code": null,
                    "created_at": "2018-05-15 09:09:31",
                    "updated_at": "2018-05-15 09:09:31"
                },
                {
                    "id": 78,
                    "iso": null,
                    "name": "Albania",
                    "nice_name": null,
                    "iso3": null,
                    "num_code": null,
                    "phone_code": null,
                    "created_at": "2018-05-15 09:09:28",
                    "updated_at": "2018-05-15 09:09:28"
                },
                {
                    "id": 5,
                    "iso": null,
                    "name": "Algeria",
                    "nice_name": null,
                    "iso3": null,
                    "num_code": null,
                    "phone_code": null,
                    "created_at": "2018-05-15 09:09:25",
                    "updated_at": "2018-05-15 09:09:25"
                },
                {
                    "id": 124,
                    "iso": null,
                    "name": "American Samoa",
                    "nice_name": null,
                    "iso3": null,
                    "num_code": null,
                    "phone_code": null,
                    "created_at": "2018-05-15 09:09:31",
                    "updated_at": "2018-05-15 09:09:31"
                },
                {
                    "id": 47,
                    "iso": null,
                    "name": "Angola",
                    "nice_name": null,
                    "iso3": null,
                    "num_code": null,
                    "phone_code": null,
                    "created_at": "2018-05-15 09:09:27",
                    "updated_at": "2018-05-15 09:09:27"
                },
                {
                    "id": 179,
                    "iso": null,
                    "name": "Anguilla",
                    "nice_name": null,
                    "iso3": null,
                    "num_code": null,
                    "phone_code": null,
                    "created_at": "2018-05-15 09:09:34",
                    "updated_at": "2018-05-15 09:09:34"
                },
                {
                    "id": 129,
                    "iso": null,
                    "name": "Antarctica",
                    "nice_name": null,
                    "iso3": null,
                    "num_code": null,
                    "phone_code": null,
                    "created_at": "2018-05-15 09:09:31",
                    "updated_at": "2018-05-15 09:09:31"
                },
                {
                    "id": 167,
                    "iso": null,
                    "name": "Antigua and Barbuda",
                    "nice_name": null,
                    "iso3": null,
                    "num_code": null,
                    "phone_code": null,
                    "created_at": "2018-05-15 09:09:34",
                    "updated_at": "2018-05-15 09:09:34"
                },
                {
                    "id": 154,
                    "iso": null,
                    "name": "Argentina",
                    "nice_name": null,
                    "iso3": null,
                    "num_code": null,
                    "phone_code": null,
                    "created_at": "2018-05-15 09:09:33",
                    "updated_at": "2018-05-15 09:09:33"
                },
                {
                    "id": 219,
                    "iso": null,
                    "name": "Armenia",
                    "nice_name": null,
                    "iso3": null,
                    "num_code": null,
                    "phone_code": null,
                    "created_at": "2018-05-15 09:09:38",
                    "updated_at": "2018-05-15 09:09:38"
                },
                {
                    "id": 177,
                    "iso": null,
                    "name": "Aruba",
                    "nice_name": null,
                    "iso3": null,
                    "num_code": null,
                    "phone_code": null,
                    "created_at": "2018-05-15 09:09:34",
                    "updated_at": "2018-05-15 09:09:34"
                },
                {
                    "id": 210,
                    "iso": null,
                    "name": "Australia",
                    "nice_name": null,
                    "iso3": null,
                    "num_code": null,
                    "phone_code": null,
                    "created_at": "2018-05-15 09:09:36",
                    "updated_at": "2018-05-15 09:09:36"
                },
                {
                    "id": 91,
                    "iso": null,
                    "name": "Austria",
                    "nice_name": null,
                    "iso3": null,
                    "num_code": null,
                    "phone_code": null,
                    "created_at": "2018-05-15 09:09:30",
                    "updated_at": "2018-05-15 09:09:30"
                },
                {
                    "id": 185,
                    "iso": null,
                    "name": "Azerbaijan",
                    "nice_name": null,
                    "iso3": null,
                    "num_code": null,
                    "phone_code": null,
                    "created_at": "2018-05-15 09:09:34",
                    "updated_at": "2018-05-15 09:09:34"
                },
                {
                    "id": 116,
                    "iso": null,
                    "name": "Bahamas",
                    "nice_name": null,
                    "iso3": null,
                    "num_code": null,
                    "phone_code": null,
                    "created_at": "2018-05-15 09:09:31",
                    "updated_at": "2018-05-15 09:09:31"
                },
                {
                    "id": 131,
                    "iso": null,
                    "name": "Bahrain",
                    "nice_name": null,
                    "iso3": null,
                    "num_code": null,
                    "phone_code": null,
                    "created_at": "2018-05-15 09:09:31",
                    "updated_at": "2018-05-15 09:09:31"
                },
                {
                    "id": 195,
                    "iso": null,
                    "name": "Bangladesh",
                    "nice_name": null,
                    "iso3": null,
                    "num_code": null,
                    "phone_code": null,
                    "created_at": "2018-05-15 09:09:35",
                    "updated_at": "2018-05-15 09:09:35"
                },
                {
                    "id": 168,
                    "iso": null,
                    "name": "Barbados",
                    "nice_name": null,
                    "iso3": null,
                    "num_code": null,
                    "phone_code": null,
                    "created_at": "2018-05-15 09:09:34",
                    "updated_at": "2018-05-15 09:09:34"
                },
                {
                    "id": 188,
                    "iso": null,
                    "name": "Belarus",
                    "nice_name": null,
                    "iso3": null,
                    "num_code": null,
                    "phone_code": null,
                    "created_at": "2018-05-15 09:09:34",
                    "updated_at": "2018-05-15 09:09:34"
                },
                {
                    "id": 14,
                    "iso": null,
                    "name": "Belgium",
                    "nice_name": null,
                    "iso3": null,
                    "num_code": null,
                    "phone_code": null,
                    "created_at": "2018-05-15 09:09:25",
                    "updated_at": "2018-05-15 09:09:25"
                }
            ],
            "first_page_url": "http:\/\/localhost\/api.client.airticketarena.com\/api\/countries?page=1",
            "from": 1,
            "last_page": 12,
            "last_page_url": "http:\/\/localhost\/api.client.airticketarena.com\/api\/countries?page=12",
            "next_page_url": "http:\/\/localhost\/api.client.airticketarena.com\/api\/countries?page=2",
            "path": "http:\/\/localhost\/api.client.airticketarena.com\/api\/countries",
            "per_page": 20,
            "prev_page_url": null,
            "to": 20,
            "total": 234
        },
        "success": true
    }
}
```

### HTTP Request
`GET /api/countries`

`HEAD /api/countries`


<!-- END_c050f66dd3f01da1c83fa26ad4ce3db2 -->

#Itinerary

Itinerary controller

Itinerary controller is used to index
update information about Itineraries
<!-- START_a0cfb3b0539b4b492b36c31d3cdc2a0b -->
## Display a listing of the resource.

> Example request:

```bash
curl -X POST "api.client.airticketarena.com//api/intineraries" \
-H "Accept: application/json" \
    -d "origin"="voluptate" \
    -d "destination"="voluptate" \
    -d "departure_date"="voluptate" \
    -d "return_date"="2018-05-15" \
    -d "adults"="voluptate" \
    -d "children"="voluptate" \
    -d "infants"="voluptate" \
    -d "travel_class"="voluptate" \
    -d "flight_type"="voluptate" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "api.client.airticketarena.com//api/intineraries",
    "method": "POST",
    "data": {
        "origin": "voluptate",
        "destination": "voluptate",
        "departure_date": "voluptate",
        "return_date": "2018-05-15",
        "adults": "voluptate",
        "children": "voluptate",
        "infants": "voluptate",
        "travel_class": "voluptate",
        "flight_type": "voluptate"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST /api/intineraries`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    origin | string |  required  | 
    destination | string |  required  | 
    departure_date | string |  required  | 
    return_date | date |  optional  | Date format: `Y-m-d`
    adults | string |  required  | 
    children | string |  optional  | 
    infants | string |  optional  | 
    travel_class | string |  required  | 
    flight_type | string |  required  | 

<!-- END_a0cfb3b0539b4b492b36c31d3cdc2a0b -->

#User

User controller

User controller is used to dispatch, store, show,
update information about users
<!-- START_cbfd199091581edc388bf23f13627701 -->
## /api/auth/me

> Example request:

```bash
curl -X GET "api.client.airticketarena.com//api/auth/me" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "api.client.airticketarena.com//api/auth/me",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET /api/auth/me`

`HEAD /api/auth/me`


<!-- END_cbfd199091581edc388bf23f13627701 -->

<!-- START_137085c7c94208a2955bd895226c55e7 -->
## /api/users/add_phone

> Example request:

```bash
curl -X POST "api.client.airticketarena.com//api/users/add_phone" \
-H "Accept: application/json" \
    -d "country_id"="repellendus" \
    -d "phone"="repellendus" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "api.client.airticketarena.com//api/users/add_phone",
    "method": "POST",
    "data": {
        "country_id": "repellendus",
        "phone": "repellendus"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST /api/users/add_phone`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    country_id | string |  required  | 
    phone | string |  required  | 

<!-- END_137085c7c94208a2955bd895226c55e7 -->

<!-- START_afee03005cc4f51be2493e9ef60eefd2 -->
## /api/users/verify_sms_token

> Example request:

```bash
curl -X POST "api.client.airticketarena.com//api/users/verify_sms_token" \
-H "Accept: application/json" \
    -d "token"="delectus" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "api.client.airticketarena.com//api/users/verify_sms_token",
    "method": "POST",
    "data": {
        "token": "delectus"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST /api/users/verify_sms_token`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    token | string |  required  | 

<!-- END_afee03005cc4f51be2493e9ef60eefd2 -->

#general
<!-- START_03d29f415a921367ef8611a608633ffb -->
## /api/auth/signup

> Example request:

```bash
curl -X POST "api.client.airticketarena.com//api/auth/signup" \
-H "Accept: application/json" \
    -d "first_name"="sit" \
    -d "last_name"="sit" \
    -d "email"="kaia.terry@example.com" \
    -d "password"="sit" \
    -d "date_of_birth"="sit" \
    -d "gender_id"="sit" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "api.client.airticketarena.com//api/auth/signup",
    "method": "POST",
    "data": {
        "first_name": "sit",
        "last_name": "sit",
        "email": "kaia.terry@example.com",
        "password": "sit",
        "date_of_birth": "sit",
        "gender_id": "sit"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST /api/auth/signup`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    first_name | string |  required  | 
    last_name | string |  required  | 
    email | email |  required  | 
    password | string |  required  | 
    date_of_birth | string |  required  | 
    gender_id | string |  required  | 

<!-- END_03d29f415a921367ef8611a608633ffb -->

<!-- START_94e7e65d96f7f0f3cc464c18e7810699 -->
## /api/auth/confirm_signup/{verifiedToken}

> Example request:

```bash
curl -X GET "api.client.airticketarena.com//api/auth/confirm_signup/{verifiedToken}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "api.client.airticketarena.com//api/auth/confirm_signup/{verifiedToken}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET /api/auth/confirm_signup/{verifiedToken}`

`HEAD /api/auth/confirm_signup/{verifiedToken}`


<!-- END_94e7e65d96f7f0f3cc464c18e7810699 -->

<!-- START_8ab1916e24535ebc89f3b22d16ca5535 -->
## /api/auth/confirm_email

> Example request:

```bash
curl -X POST "api.client.airticketarena.com//api/auth/confirm_email" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "api.client.airticketarena.com//api/auth/confirm_email",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST /api/auth/confirm_email`


<!-- END_8ab1916e24535ebc89f3b22d16ca5535 -->

<!-- START_7ba029714012cd9c08cc50ae4dee9d7a -->
## Log the user in

> Example request:

```bash
curl -X POST "api.client.airticketarena.com//api/auth/login" \
-H "Accept: application/json" \
    -d "email"="walter.lonny@example.org" \
    -d "password"="non" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "api.client.airticketarena.com//api/auth/login",
    "method": "POST",
    "data": {
        "email": "walter.lonny@example.org",
        "password": "non"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST /api/auth/login`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    email | email |  required  | 
    password | string |  required  | 

<!-- END_7ba029714012cd9c08cc50ae4dee9d7a -->

<!-- START_b706911fc2143359a27a47586522c8c7 -->
## /api/auth/recovery

> Example request:

```bash
curl -X POST "api.client.airticketarena.com//api/auth/recovery" \
-H "Accept: application/json" \
    -d "email"="malvina.lockman@example.org" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "api.client.airticketarena.com//api/auth/recovery",
    "method": "POST",
    "data": {
        "email": "malvina.lockman@example.org"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST /api/auth/recovery`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    email | email |  required  | 

<!-- END_b706911fc2143359a27a47586522c8c7 -->

<!-- START_722e69795448b75b8d6c3807a35fab93 -->
## /api/auth/mobile_recovery

> Example request:

```bash
curl -X POST "api.client.airticketarena.com//api/auth/mobile_recovery" \
-H "Accept: application/json" \
    -d "email"="wisozk.rickie@example.net" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "api.client.airticketarena.com//api/auth/mobile_recovery",
    "method": "POST",
    "data": {
        "email": "wisozk.rickie@example.net"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST /api/auth/mobile_recovery`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    email | email |  required  | 

<!-- END_722e69795448b75b8d6c3807a35fab93 -->

<!-- START_bac19b6778c34ade7c9006a863aed43c -->
## /api/auth/reset

> Example request:

```bash
curl -X POST "api.client.airticketarena.com//api/auth/reset" \
-H "Accept: application/json" \
    -d "token"="occaecati" \
    -d "email"="adolf69@example.com" \
    -d "password"="occaecati" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "api.client.airticketarena.com//api/auth/reset",
    "method": "POST",
    "data": {
        "token": "occaecati",
        "email": "adolf69@example.com",
        "password": "occaecati"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST /api/auth/reset`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    token | string |  required  | 
    email | email |  required  | 
    password | string |  required  | 

<!-- END_bac19b6778c34ade7c9006a863aed43c -->

<!-- START_5868c9422bc3266cef6569c8b841eb06 -->
## Log the user out (Invalidate the token)

> Example request:

```bash
curl -X POST "api.client.airticketarena.com//api/auth/logout" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "api.client.airticketarena.com//api/auth/logout",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST /api/auth/logout`


<!-- END_5868c9422bc3266cef6569c8b841eb06 -->

<!-- START_c4738b8f9d87493a71d28c323a50e0dc -->
## Refresh a token.

> Example request:

```bash
curl -X POST "api.client.airticketarena.com//api/auth/refresh" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "api.client.airticketarena.com//api/auth/refresh",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST /api/auth/refresh`


<!-- END_c4738b8f9d87493a71d28c323a50e0dc -->

<!-- START_6b8ff9b56f0c9bcc0fa89d258d7da3ea -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET "api.client.airticketarena.com//api/fellowship" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "api.client.airticketarena.com//api/fellowship",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET /api/fellowship`

`HEAD /api/fellowship`


<!-- END_6b8ff9b56f0c9bcc0fa89d258d7da3ea -->

<!-- START_99705c861229536a7235b52039b2d836 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST "api.client.airticketarena.com//api/fellowship" \
-H "Accept: application/json" \
    -d "first_name"="voluptatibus" \
    -d "last_name"="voluptatibus" \
    -d "email"="dbarton@example.org" \
    -d "date_of_birth"="2018-05-15" \
    -d "gender_id"="voluptatibus" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "api.client.airticketarena.com//api/fellowship",
    "method": "POST",
    "data": {
        "first_name": "voluptatibus",
        "last_name": "voluptatibus",
        "email": "dbarton@example.org",
        "date_of_birth": "2018-05-15",
        "gender_id": "voluptatibus"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST /api/fellowship`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    first_name | string |  required  | Maximum: `255`
    last_name | string |  required  | Maximum: `255`
    email | email |  optional  | 
    date_of_birth | date |  optional  | Date format: `Y-m-d`
    gender_id | string |  required  | 

<!-- END_99705c861229536a7235b52039b2d836 -->

<!-- START_cb9e6a407697f4fd98f183c089e95188 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET "api.client.airticketarena.com//api/fellowship/{fellowship}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "api.client.airticketarena.com//api/fellowship/{fellowship}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET /api/fellowship/{fellowship}`

`HEAD /api/fellowship/{fellowship}`


<!-- END_cb9e6a407697f4fd98f183c089e95188 -->

<!-- START_e45d829ba28f42aeb62cca4554d21408 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT "api.client.airticketarena.com//api/fellowship/{fellowship}" \
-H "Accept: application/json" \
    -d "first_name"="facilis" \
    -d "last_name"="facilis" \
    -d "email"="christine90@example.com" \
    -d "date_of_birth"="2018-05-15" \
    -d "gender_id"="facilis" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "api.client.airticketarena.com//api/fellowship/{fellowship}",
    "method": "PUT",
    "data": {
        "first_name": "facilis",
        "last_name": "facilis",
        "email": "christine90@example.com",
        "date_of_birth": "2018-05-15",
        "gender_id": "facilis"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT /api/fellowship/{fellowship}`

`PATCH /api/fellowship/{fellowship}`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    first_name | string |  required  | Maximum: `255`
    last_name | string |  required  | Maximum: `255`
    email | email |  optional  | 
    date_of_birth | date |  optional  | Date format: `Y-m-d`
    gender_id | string |  required  | 

<!-- END_e45d829ba28f42aeb62cca4554d21408 -->

<!-- START_b92c6a8048b6229ee4230c742d655fa0 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "api.client.airticketarena.com//api/fellowship/{fellowship}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "api.client.airticketarena.com//api/fellowship/{fellowship}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE /api/fellowship/{fellowship}`


<!-- END_b92c6a8048b6229ee4230c742d655fa0 -->

<!-- START_65049a6817ea22c3223662e41d7fc663 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET "api.client.airticketarena.com//api/airports" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "api.client.airticketarena.com//api/airports",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "exception": null,
    "headers": {},
    "original": {
        "success": true,
        "airports": {
            "current_page": 1,
            "data": [
                {
                    "id": 732,
                    "name": "[Duplicate] Giebelstadt Army Air Field",
                    "iata_code": "GHF",
                    "city_id": 702,
                    "created_at": "2018-05-15 09:09:27",
                    "updated_at": "2018-05-15 09:09:27"
                },
                {
                    "id": 2263,
                    "name": "A 511 Airport",
                    "iata_code": "NO",
                    "city_id": 2150,
                    "created_at": "2018-05-15 09:09:32",
                    "updated_at": "2018-05-15 09:09:32"
                },
                {
                    "id": 1183,
                    "name": "A Coruña Airport",
                    "iata_code": "LCG",
                    "city_id": 1139,
                    "created_at": "2018-05-15 09:09:28",
                    "updated_at": "2018-05-15 09:09:28"
                },
                {
                    "id": 3906,
                    "name": "Aachen-Merzbrück Airport",
                    "iata_code": "AAH",
                    "city_id": 3615,
                    "created_at": "2018-05-15 09:09:38",
                    "updated_at": "2018-05-15 09:09:38"
                },
                {
                    "id": 614,
                    "name": "Aalborg Airport",
                    "iata_code": "AAL",
                    "city_id": 592,
                    "created_at": "2018-05-15 09:09:26",
                    "updated_at": "2018-05-15 09:09:26"
                },
                {
                    "id": 376,
                    "name": "Aalen-Heidenheim\/Elchingen Airport",
                    "iata_code": "NO",
                    "city_id": 364,
                    "created_at": "2018-05-15 09:09:25",
                    "updated_at": "2018-05-15 09:09:25"
                },
                {
                    "id": 594,
                    "name": "Aarhus Airport",
                    "iata_code": "AAR",
                    "city_id": 573,
                    "created_at": "2018-05-15 09:09:26",
                    "updated_at": "2018-05-15 09:09:26"
                },
                {
                    "id": 3760,
                    "name": "Aasiaat Airport",
                    "iata_code": "JEG",
                    "city_id": 3486,
                    "created_at": "2018-05-15 09:09:38",
                    "updated_at": "2018-05-15 09:09:38"
                },
                {
                    "id": 1082,
                    "name": "Aba Tenna Dejazmach Yilma International Airport",
                    "iata_code": "DIR",
                    "city_id": 1041,
                    "created_at": "2018-05-15 09:09:28",
                    "updated_at": "2018-05-15 09:09:28"
                },
                {
                    "id": 2020,
                    "name": "Abadan Airport",
                    "iata_code": "ABD",
                    "city_id": 1922,
                    "created_at": "2018-05-15 09:09:32",
                    "updated_at": "2018-05-15 09:09:32"
                },
                {
                    "id": 2794,
                    "name": "Abakan Airport",
                    "iata_code": "ABA",
                    "city_id": 2639,
                    "created_at": "2018-05-15 09:09:34",
                    "updated_at": "2018-05-15 09:09:34"
                },
                {
                    "id": 1331,
                    "name": "Abbeville",
                    "iata_code": "NO",
                    "city_id": 1278,
                    "created_at": "2018-05-15 09:09:29",
                    "updated_at": "2018-05-15 09:09:29"
                },
                {
                    "id": 172,
                    "name": "Abbotsford Airport",
                    "iata_code": "YXX",
                    "city_id": 166,
                    "created_at": "2018-05-15 09:09:25",
                    "updated_at": "2018-05-15 09:09:25"
                },
                {
                    "id": 3669,
                    "name": "Abdul Rachman Saleh Airport",
                    "iata_code": "MLG",
                    "city_id": 3405,
                    "created_at": "2018-05-15 09:09:38",
                    "updated_at": "2018-05-15 09:09:38"
                },
                {
                    "id": 969,
                    "name": "Abeche Airport",
                    "iata_code": "AEH",
                    "city_id": 934,
                    "created_at": "2018-05-15 09:09:28",
                    "updated_at": "2018-05-15 09:09:28"
                },
                {
                    "id": 1151,
                    "name": "Abeid Amani Karume International Airport",
                    "iata_code": "ZNZ",
                    "city_id": 1107,
                    "created_at": "2018-05-15 09:09:28",
                    "updated_at": "2018-05-15 09:09:28"
                },
                {
                    "id": 1852,
                    "name": "Abel Santamaria Airport",
                    "iata_code": "SNU",
                    "city_id": 1735,
                    "created_at": "2018-05-15 09:09:31",
                    "updated_at": "2018-05-15 09:09:31"
                },
                {
                    "id": 521,
                    "name": "Aberdeen Dyce Airport",
                    "iata_code": "ABZ",
                    "city_id": 503,
                    "created_at": "2018-05-15 09:09:26",
                    "updated_at": "2018-05-15 09:09:26"
                },
                {
                    "id": 4375,
                    "name": "Aberdeen Regional Airport",
                    "iata_code": "ABR",
                    "city_id": 503,
                    "created_at": "2018-05-15 09:09:40",
                    "updated_at": "2018-05-15 09:09:40"
                },
                {
                    "id": 1984,
                    "name": "Abha Regional Airport",
                    "iata_code": "AHB",
                    "city_id": 1887,
                    "created_at": "2018-05-15 09:09:31",
                    "updated_at": "2018-05-15 09:09:31"
                }
            ],
            "first_page_url": "http:\/\/localhost\/api.client.airticketarena.com\/api\/airports?page=1",
            "from": 1,
            "last_page": 249,
            "last_page_url": "http:\/\/localhost\/api.client.airticketarena.com\/api\/airports?page=249",
            "next_page_url": "http:\/\/localhost\/api.client.airticketarena.com\/api\/airports?page=2",
            "path": "http:\/\/localhost\/api.client.airticketarena.com\/api\/airports",
            "per_page": 20,
            "prev_page_url": null,
            "to": 20,
            "total": 4979
        }
    }
}
```

### HTTP Request
`GET /api/airports`

`HEAD /api/airports`


<!-- END_65049a6817ea22c3223662e41d7fc663 -->

<!-- START_4a60d784fa63adf6e0e12d4ba31e14cd -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET "api.client.airticketarena.com//api/currencies" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "api.client.airticketarena.com//api/currencies",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "exception": null,
    "headers": {},
    "original": {
        "currencies": {
            "current_page": 1,
            "data": [],
            "first_page_url": "http:\/\/localhost\/api.client.airticketarena.com\/api\/currencies?page=1",
            "from": null,
            "last_page": 1,
            "last_page_url": "http:\/\/localhost\/api.client.airticketarena.com\/api\/currencies?page=1",
            "next_page_url": null,
            "path": "http:\/\/localhost\/api.client.airticketarena.com\/api\/currencies",
            "per_page": 20,
            "prev_page_url": null,
            "to": null,
            "total": 0
        },
        "success": true
    }
}
```

### HTTP Request
`GET /api/currencies`

`HEAD /api/currencies`


<!-- END_4a60d784fa63adf6e0e12d4ba31e14cd -->

<!-- START_ae17d72fb1b8dfbb51cdcccabee427dc -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET "api.client.airticketarena.com//api/flights" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "api.client.airticketarena.com//api/flights",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "exception": null,
    "headers": {},
    "original": {
        "success": false
    }
}
```

### HTTP Request
`GET /api/flights`

`HEAD /api/flights`


<!-- END_ae17d72fb1b8dfbb51cdcccabee427dc -->

<!-- START_df2d176a85c92ce49d5aefd8f2639513 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET "api.client.airticketarena.com//api/genders" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "api.client.airticketarena.com//api/genders",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "exception": null,
    "headers": {},
    "original": {
        "genders": {
            "current_page": 1,
            "data": [
                {
                    "id": 1,
                    "name": "Male",
                    "created_at": "2018-05-15 09:09:19",
                    "updated_at": "2018-05-15 09:09:19"
                },
                {
                    "id": 2,
                    "name": "Female",
                    "created_at": "2018-05-15 09:09:19",
                    "updated_at": "2018-05-15 09:09:19"
                },
                {
                    "id": 3,
                    "name": "Other",
                    "created_at": "2018-05-15 09:09:19",
                    "updated_at": "2018-05-15 09:09:19"
                }
            ],
            "first_page_url": "http:\/\/localhost\/api.client.airticketarena.com\/api\/genders?page=1",
            "from": 1,
            "last_page": 1,
            "last_page_url": "http:\/\/localhost\/api.client.airticketarena.com\/api\/genders?page=1",
            "next_page_url": null,
            "path": "http:\/\/localhost\/api.client.airticketarena.com\/api\/genders",
            "per_page": 20,
            "prev_page_url": null,
            "to": 3,
            "total": 3
        },
        "success": true
    }
}
```

### HTTP Request
`GET /api/genders`

`HEAD /api/genders`


<!-- END_df2d176a85c92ce49d5aefd8f2639513 -->

<!-- START_f099581a3fa917201a5d09014c017b2c -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET "api.client.airticketarena.com//api/travel_class_types" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "api.client.airticketarena.com//api/travel_class_types",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "exception": null,
    "headers": {},
    "original": {
        "travel_class_types": {
            "current_page": 1,
            "data": [
                {
                    "id": 1,
                    "name": "Economy",
                    "created_at": "2018-05-15 09:09:42",
                    "updated_at": "2018-05-15 09:09:42"
                },
                {
                    "id": 2,
                    "name": "Premium",
                    "created_at": "2018-05-15 09:09:42",
                    "updated_at": "2018-05-15 09:09:42"
                },
                {
                    "id": 3,
                    "name": "Business",
                    "created_at": "2018-05-15 09:09:42",
                    "updated_at": "2018-05-15 09:09:42"
                },
                {
                    "id": 4,
                    "name": "First",
                    "created_at": "2018-05-15 09:09:42",
                    "updated_at": "2018-05-15 09:09:42"
                }
            ],
            "first_page_url": "http:\/\/localhost\/api.client.airticketarena.com\/api\/travel_class_types?page=1",
            "from": 1,
            "last_page": 1,
            "last_page_url": "http:\/\/localhost\/api.client.airticketarena.com\/api\/travel_class_types?page=1",
            "next_page_url": null,
            "path": "http:\/\/localhost\/api.client.airticketarena.com\/api\/travel_class_types",
            "per_page": 20,
            "prev_page_url": null,
            "to": 4,
            "total": 4
        },
        "success": true
    }
}
```

### HTTP Request
`GET /api/travel_class_types`

`HEAD /api/travel_class_types`


<!-- END_f099581a3fa917201a5d09014c017b2c -->

