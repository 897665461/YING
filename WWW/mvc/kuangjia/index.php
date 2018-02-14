<?php


function get_apple()
{
    return '苹果';
}
function get_orange()
{
    return '橘子';
}
function print_str($bianliang)
{
    echo $bianliang();
}

print_str('get_apple');