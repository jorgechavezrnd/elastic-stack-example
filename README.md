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

### Check if elasticsearch is running
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

### For load example data in elasticsearch
- Download data from: https://www.elastic.co/guide/en/kibana/6.8/tutorial-load-dataset.html
- Unzip the file
- Command for load data (for windows, execute with WSL if has some error in cmd): `curl -H 'Content-Type: application/x-ndjson' -XPOST 'localhost:9200/_bulk?pretty' --data-binary @logs.jsonl`

### Command for start logstash (elasticsearch should be started before this command)
```
docker-compose up -d logstash
```

### Check if logstash is running
```
curl http://localhost:9600/\?pretty
```

### Command for start kibana (elasticsearch should be started before this command)
```
docker-compose up -d kibana
```

### URL for kibana dashboard
- http://localhost:5601
