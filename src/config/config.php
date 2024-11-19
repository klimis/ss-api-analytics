<?php

return [
    'enable_analytics' => true,
    'analytics_db_table' => 'analytics',
    'queue_connection' => 'redis',
    'query_param_log' => '_if', //Remove this line to log all requests if middleware is used
];
