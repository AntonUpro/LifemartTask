<?php

return [
    'class' => yii\db\Connection::class,
    'dsn' => 'mysql:host=127.0.0.1;port=3306;dbname=test_task',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
