<?php

return [
    /**
     * MySQL table name to store analytics data
     */
    'enable_analytics' => true,
    'analytics_db_table' => 'analytics',
    'queue_connection' => 'redis',
    'log_only_if_param_true' => '_if',
];
