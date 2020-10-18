# Elastic Stack with Docker
![Build Elastic Stack](https://github.com/CodelyTV/elastic-stack-example/workflows/Build%20Elastic%20Stack/badge.svg)

## How to run the Stack

To initialize all the needed services.

```
docker-compose up -d 
```  

## How to run PHP sample app

Install needed PHP dependencies

```
cd app && composer install
```  

Execute the PHP sample application

```
php app/php/app.php -a fo1 -b bar
```

### Command for start elasticsearch
```
docker-compose up -d elasticsearch
```

### Check if elasticsearch is runng
```
curl http://localhost:9200
```

### Create document
```
URL: http://localhost:9200/codely/_doc/1
METHOD: PUT
BODY:
{
    "level": "ERROR",
    "message": "Algo ha fallado"
}
```

### Get document
```
URL: http://localhost:9200/codely/_doc/1
METHOD: GET
```

### Get index/mapping
```
URL: http://localhost:9200/codely/
METHOD: GET
```
### Simple query
```
URL: http://localhost:9200/codely/_search?q=level:ERROR
METHOD: GET
```

### Query with body
```
URL: http://localhost:9200/codely/_doc/_search
METHOD: GET
BODY:
{
    "query": {
        "query_string": {
            "fields": ["level"],
            "query": "ERROR or WARNING"
        }
    }
}
```
