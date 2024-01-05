<?php
namespace App\Constants;
class SqlQueriesConstant
{
    const SEARCH_USERS = 'SELECT * FROM users WHERE name LIKE :query OR email LIKE :query';
}
?>