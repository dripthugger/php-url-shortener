<?php
$redis_server = '127.0.0.1';
$redis_port = 6379;

$redis = new Redis();
$redis->connect($redis_server, $redis_port);

$site_link = 'http://localhost/urlshortener/index.php?key=';

if(isset($argv)){
    echo "\n";

    $command = $argv[1];
    $url = filter_var($argv[2], FILTER_SANITIZE_URL);

    if(preg_match('/^(create)|(show)|(delete)$/', $command, $match) === 0)
        die("Command $command not found \n");

    if (filter_var($url, FILTER_VALIDATE_URL)) {
        
        switch($command){
            case 'show':
                echo $site_link . $redis->get("$url");
                break;
            case 'create':
                $redis->set("$url", bin2hex(random_bytes(8)));
                echo "Link to $url created";
                break;
            case 'delete':
                $redis->delete("$url");
                echo "Link to $url deleted";
                break;
        }

    } else {
        dir("$url is not a valid URL \n");
    }
    echo "\n";
}else if( isset($_GET['key']) ){
    $list = $redis->keys("*");

    foreach ($list as $k)
	    if($redis->get($k) === $_GET['key'])
            header("Location: $k");
}