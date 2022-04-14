<?php
function get($name, $default = '')
{
    return isset($_REQUEST[$name]) ? $_REQUEST[$name] : $default;
}
