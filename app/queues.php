<?php

Queue::failing(function($connection, $job, $data)
{
    # log
    \Log::info('Queue Event Fail Listener: Started Fail Job Detected');
    # log
    \Log::info('JOB CONNECTION');
    # log
    \Log::info($connection);
    # log
    \Log::info('JOB FAILED:');
    # log
    \Log::info(print_r($job));
    # log
    \Log::info('JOB DATA');
    # log
    \Log::info(json_encode($data));

});

//-->