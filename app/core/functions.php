<?php

defined('ROOTPATH') or exit('Access Denied!');

/* Check that required extensions in the project are loaded */
check_extension();
function check_extension()
{
    $required_extension = [
        'pdo',
    ];

    $not_loaded = [];

    foreach ($required_extension as $ext) {
        if (!extension_loaded($ext)) {
            $not_loaded[] = $ext;
        }
    }

    if (!empty($not_loaded)) {
        show("Please load the following extension in your php.ini file: <br>" . implode("<br>", $not_loaded));
        die;
    }
}

/* Print some stuff on screen */
function show($stuff)
{
    echo '<pre>';
    print_r($stuff);
    echo '</pre>';
}

/* Convert predefined characters to HTML entities */
function esc($str)
{
    return htmlspecialchars($str);
}

/* Redirect to a specific location in the project */
function redirect($path)
{
    header("Location: " . ROOT . "/" . $path);
    die;
}

/* Return a user readable date format */
// 
// turns 2023-4-19 to 19th April, 2023
// 
function get_date($date)
{
    return date("jS M, Y", strtotime($date));
}

/* Load images */
function get_image(string $file, string $type = 'post'): string
{
    $file = $file ?? '';
    if (file_exists($file)) {
        return ROOT . '/' . $file;
    }

    if ($type == 'user') {
        return ROOT . '/assets/images/user.png';
    } else {
        return ROOT . '/assets/images/no_image.png';
    }
}

// TODO:
// /* Create absolute path for images */
// function URL($key): mixed
// {
//     switch ($key) {
//         case 'page':
//         case 0:
//             return APP('URL')[0] ?? null;
//             break;

//         default:
//             # code...
//             break;
//     }
// }

/* Return pagination links */
function get_pagination_var(): array
{
    $vars               = [];
    $vars['page']       = $_GET["page"] ?? 1;
    $vars['page']       = (int)$vars['page'];
    $vars['prev_page']  = $vars['page'] <= 1 ? 1 : $vars['page'] - 1;
    $vars['next_page']  = $vars['page'] + 1;

    return $vars;
}

// TODO: Core\Session()... use namespace
/* Save or display a saved message to the user */
// function message(string $msg = null, bool $clear = false)
// {
//     $ses = new Core\Session();

//     if (!empty($msg)) {
//         $ses->set('message', $msg);
//     } else
//     if (!empty($ses->get('message'))) {
//         $msg = $ses->get('message');

//         if ($clear) {
//             $ses->pop('message');
//         }

//         return $msg;
//     }

//     return false;
// }

/* Retain the old text values */
// 
// <input value="old_value('email', 'ex@mail.com')">
// 
function old_value(string $key, mixed $default = "", string $mode = 'post'): mixed
{
    $POST = ($mode == 'post') ? $_POST : $_GET;
    if (isset($POST[$key])) {
        return $POST[$key];
    }
    return $default;
}

/* Retain the old checked values */
function old_check(string $key, mixed $value, mixed $default = ""): string
{
    if (isset($POST[$key])) {
        if ($POST[$key] == $value) {
            return ' checked ';
        } else
        if ($_SERVER["REQUEST_METHOD"] && $default == $value) {
            return ' checked ';
        }
        return "";
    }
}

/* Retain the old selection values */
function old_select(string $key, mixed $value, mixed $default = "", string $mode = 'post'): mixed
{
    $POST = ($mode == 'post') ? $_POST : $_GET;
    if (isset($POST[$key])) {
        if ($POST[$key] == $value) {
            return ' selected ';
        } else
        if ($default == $value) {
            return ' selected ';
        }
        return "";
    }
}
