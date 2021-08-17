<?php

session_start();

const USER_ID = 'user_id';
const ERROR_OCCURRED = 'error_occurred';
const ERROR_MESSAGE = 'error_message';

function IsLogin(): bool
{
    return isset($_SESSION[USER_ID]);
}

function AnyErrors(): bool
{
    return isset($_SESSION[ERROR_OCCURRED]);
}

function GetUserId()
{
    return $_SESSION[USER_ID];
}

function GetErrorMessage()
{
    return $_SESSION[ERROR_MESSAGE];
}

function SetUserId($user_id)
{
    $_SESSION[USER_ID] = $user_id;
}

function SetError($error_message)
{
    if (!isset($_SESSION[ERROR_OCCURRED]))
    {
        $_SESSION[ERROR_OCCURRED] = true;
    }
    $_SESSION[ERROR_MESSAGE] = $error_message;
}

function ClearError()
{
    $_SESSION[ERROR_OCCURRED] = null;
    $_SESSION[ERROR_MESSAGE] = null;
}

?>
