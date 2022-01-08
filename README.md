# PHP Url shortener
Just a simple example of using Redis
## Features
- Creating a field by PHP CLI, stored on Redis with site url and this url generated key
- Showing and Deleting url fields
- Redirect from PHP script if field key found on DataBase

## How to use

Open index.php file and format some variables:

Redis Server, by default it is like this:
```sh
$redis_server = '127.0.0.1';
```
Redis Port:
```sh
$redis_port = 6379;
```
And Site link to show to users
```sh
$site_link = 'http://localhost/index.php?key=';
```

#### Start Working

Just in CLI enter `create` command to create short version of url:

```sh
php index.php create http://google.com
```

Result will be:

```sh
Link to http://google.com created - http://localhost/urlshortener/index.php?key=ff7dd6cbe3031c5c
```

So, you can follow this link and http://google.com will be opened