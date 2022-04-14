<?php
function getBtnClass($page)
{
    if (isset($_COOKIE['user-id-cookie']) && str_contains($page, 'my_account')) {
        return 'btn-outline-danger';
    } else {
        return "btn-primary";
    }
}

function getBtnLink($page)
{
    if (isset($_COOKIE['user-id-cookie']) && str_contains($page, 'my_account')) {
        return '?page=logout';
    } else if (isset($_COOKIE['user-id-cookie'])) {
        return "?page=my_account";
    } else {
        return "?page=login";
    }
}

function getBtnInnerText($page)
{
    if (isset($_COOKIE['user-id-cookie'])) {
        if (str_contains($page, 'my_account')) {
            return 'Log out';
        } else {
            return "My account";
        }
    } else {
        return "Login";
    }
}

$navBrandLink = '?page=home';

$btnClass = getBtnClass($page);

$btnLink = getBtnLink($page);

$btnInnerText = getBtnInnerText($page);
