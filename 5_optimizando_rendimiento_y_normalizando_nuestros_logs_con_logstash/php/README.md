### Command for run application
```
php app.php -a warning -b info
```
- It should create a file in var/logs/... with the logs
- It should put the logs in elasticsearch, index: coldelytv
- URL for show logs in elastic search:
```
URL: http://localhost:9200/codelytv/_search
METHOD: GET
```

### Delete index if it already exists, for start with clean environment
```
URL: http://localhost:9200/codelytv
METHOD: DELETE
```
