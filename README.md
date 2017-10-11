## slim API

### server
```
composer install
```

### client(CORS)
```
http://127.0.0.1:5500/client/index.html
```

### API
```

GET http://127.0.0.1:7799/server/item/TEST_ABCD

GET    item/{param}


POST   item/
    {
        "name"  : "ABCD",
        "price" : 1234
    }


PUT    item/{param}
    {
        "price" : 1234
    }


DELETE item/{param}
```

> requirements
> * composer
> * slim
> * axios (client)