<?php

if (php_sapi_name() != "cli") {
    require(__DIR__ . '/../../../config.php');
}

return new \Phalcon\Config(array(
    'database' => array(
        'adapter'     => 'Mysql',
        'host'        => isset($CFG) ? $CFG->dbhost : '127.0.0.1',
        'username'    => isset($CFG) ? $CFG->dbuser : 'root',
        'password'    => isset($CFG) ? $CFG->dbpass : '',
        'dbname'      => isset($CFG) ? $CFG->dbname : 'moodle',
        'charset'     => 'utf8',
    ),
    'application' => array(
        'controllersDir' => __DIR__ . '/../../app/controllers/',
        'modelsDir'      => __DIR__ . '/../../app/models/',
        'viewsDir'       => __DIR__ . '/../../app/views/',
        'partialsDir'    => __DIR__ . '/../../app/views/partials',        
        'pluginsDir'     => __DIR__ . '/../../app/plugins/',
        'libraryDir'     => __DIR__ . '/../../app/library/',
        'cacheDir'       => __DIR__ . '/../../app/cache/',
        'baseUri'        => '/bhthcs/',
    ),
    'banhang' => array (
        'timeBegin' => mktime(0,0,0,05,23, 2014),
        'pageLimit' => 20
    )
));
