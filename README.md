# distance_calculator_service-api
Distance Calculator Service Api

### Before you begin
1. Interface (it will help frontend guys to integrate)
2. Mock response (frontend guys will be able to send request and it will help them work)
3. Testes (I have mock of response so when I wrote the code I will know if it still works)
4. Write code (finally)
5. Final refactor (clean-up)

## Serving application
`php -S localhost:8000 -t public`

## Interface
### Example request payload
POST: `/api/v1/distance/add`

BODY: 
```
{
	"input": [
		{"meters": 5},
		{"yards": 3}
	],
	"output": "meters"
}
```

Input: distances you want to sum (can be more than two)

Output: `meters` or `yards`

Example Curl request:
```curl -X POST \
     http://localhost:8000/api/v1/distance/add \
     -H 'Content-Type: application/json' \
     -d '{
   	"input": [
   		{"meters": 5},
   		{"yards": 3}
   	],
   	"output": "meters"
   }'
```

### Example response
BODY:
```
{
    "meta": {
        "status": "success",
        "version": "1.0"
    },
    "data": {
    	"meters": 7.73
    }
}
```
Error response:
```
{
       "meta": {
           "status": "failure",
           "msg": "Error message"
       }
   }
```
