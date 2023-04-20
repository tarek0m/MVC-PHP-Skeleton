<?php
/*
* Session class
* Save or read data from current session
*/

namespace Core;

defined('ROOTPATH') or exit('Access Denied!');

class Session
{
    public $mainKey = 'APP';

    private function start_session(): int
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        return 1;
    }

    public function set(mixed $keyOrArray, mixed $value = ''): int
    {
        $this->start_session();
        if (is_array($keyOrArray)) {
            foreach ($keyOrArray as $key => $value) {
                $_SESSION[$this->mainKey][$key] = $value;
            }

            return 1;
        }

        $_SESSION[$this->mainKey][$keyOrArray] = $value;

        return 1;
    }

    public function get(string $key, mixed $default = ''): mixed
    {
        $this->start_session();

        if (isset($_SESSION[$this->mainKey][$key])) {
            return $_SESSION[$this->mainKey][$key];
        }

        return $default;
    }

    public function auth(mixed $user_row): int
    {
        $this->start_session();

        $_SESSION["USER"] = $user_row;

        return 0;
    }

    public function pop(string $key, mixed $default = ''): mixed
    {
        $this->start_session();

        if (!empty($_SESSION[$this->mainKey][$key])) {
            $value = $_SESSION[$this->mainKey][$key];
            unset($_SESSION[$this->mainKey][$key]);

            return $value;
        }

        return $default;
    }
}
