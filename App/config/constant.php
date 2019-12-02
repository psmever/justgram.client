<?php

defined('BASE_URL') OR define('BASE_URL', 'http://localhost:8000');

//-----------------------------------------------------------------------------------------------------
defined('CLIENT_ID') OR define('CLIENT_ID', '2');
defined('CLIENT_SECRET') OR define('CLIENT_SECRET', 'honEdQ2KcW3Gj5VAMq4Hk1DsfhS5h2jIVUmNT0G9');
//-----------------------------------------------------------------------------------------------------

defined('ACCESS_TOKEN_FILE') OR define('ACCESS_TOKEN_FILE', 'App/Storage/access_token.txt');
defined('REFRESH_TOKEN_FILE') OR define('REFRESH_TOKEN_FILE', 'App/Storage/refresh_token.txt');

if(file_exists ( ACCESS_TOKEN_FILE ))
{
    $tmp_AccessToken = file_get_contents(ACCESS_TOKEN_FILE);
    defined('ACCESS_TOKEN') OR define('ACCESS_TOKEN', $tmp_AccessToken);
    unset($tmp_AccessToken);
}
else
{
    defined('ACCESS_TOKEN') OR define('ACCESS_TOKEN', '');
}

if(file_exists ( REFRESH_TOKEN_FILE ))
{
    $tmp_refresh_token = file_get_contents(REFRESH_TOKEN_FILE);
    defined('REFRESH_TOKEN') OR define('REFRESH_TOKEN', $tmp_refresh_token);
    unset($tmp_refresh_token);
}
else
{
    defined('REFRESH_TOKEN') OR define('REFRESH_TOKEN', '');
}