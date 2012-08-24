<?php

return array(
  'connections' => array(
    'mysql' => array(
      'driver'   => 'mysql',
      'host'     => getenv('SOWCOMPOSER_DB_HOST'),
      'database' => getenv('SOWCOMPOSER_DB_NAME'),
      'username' => getenv('SOWCOMPOSER_DB_USERNAME'),
      'password' => getenv('SOWCOMPOSER_DB_PASSWORD'),
      'charset'  => 'utf8',
      'prefix'   => '',
    )
  )
);