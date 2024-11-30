<?php

/*
 * Pheditor
 * PHP file editor
 * Hamid Samak
 * https://github.com/pheditor/pheditor
 * Release under MIT license
 */

define('PASSWORD', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec');
define('DS', DIRECTORY_SEPARATOR);
define('MAIN_DIR', realpath(__DIR__));
define('VERSION', '2.0.1');
define('LOG_FILE', MAIN_DIR . DS . '.phedlog');
define('SHOW_PHP_SELF', false);
define('SHOW_HIDDEN_FILES', false);
define('ACCESS_IP', '');
define('HISTORY_PATH', MAIN_DIR . DS . '.phedhistory');
define('MAX_HISTORY_FILES', 5);
define('WORD_WRAP', true);
define('PERMISSIONS', 'newfile,newdir,editfile,deletefile,deletedir,renamefile,renamedir,changepassword,uploadfile,terminal'); // empty means all
define('PATTERN_FILES', '/^[A-Za-z0-9-_.\/]*\.(txt|php|htm|html|js|css|tpl|md|xml|json)$/i'); // empty means no pattern
define('PATTERN_DIRECTORIES', '/^((?!backup).)*$/i'); // empty means no pattern
define('TERMINAL_COMMANDS', 'ls,ll,cp,rm,mv,whoami,pidof,pwd,whereis,kill,php,date,cd,mkdir,chmod,chown,rmdir,touch,cat,git,find,grep,echo,tar,zip,unzip,whatis,df,help,locate,pkill,du,updatedb,composer,exit');
define('EDITOR_THEME', ''); // e.g. monokai
define('DEFAULT_DIR_PERMISSION', 0755);
define('DEFAULT_FILE_PERMISSION', 0644);
define('LOCAL_ASSETS', false); // if true you should run `npm i` to download required libraries

$assets = [
    'cdn' => [
        'css' => [
            'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.2/css/bootstrap.min.css',
            'https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.15/themes/default/style.min.css',
            'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.14/codemirror.min.css',
            'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.14/addon/lint/lint.min.css',
            'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.14/addon/dialog/dialog.min.css',
            'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.14/theme/monokai.css',
            empty(EDITOR_THEME) ? '' : 'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.14/theme/' . EDITOR_THEME . '.css',
            'https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css',
            'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css',
        ],
        'js' => [
            'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js',
            'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js',
            'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.2/js/bootstrap.min.js',
            'https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.15/jstree.min.js',
            'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.14/codemirror.min.js',
            'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.14/mode/javascript/javascript.min.js',
            'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.14/mode/css/css.min.js',
            'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.14/mode/php/php.min.js',
            'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.14/mode/xml/xml.min.js',
            'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.14/mode/htmlmixed/htmlmixed.js',
            'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.14/mode/markdown/markdown.js',
            'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.14/mode/clike/clike.min.js',
            'https://cdnjs.cloudflare.com/ajax/libs/jshint/2.13.6/jshint.min.js',
            'https://cdnjs.cloudflare.com/ajax/libs/jsonlint/1.6.0/jsonlint.min.js',
            'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.14/addon/lint/lint.min.js',
            'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.14/addon/lint/javascript-lint.min.js',
            'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.14/addon/lint/json-lint.min.js',
            'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.14/addon/lint/css-lint.min.js',
            'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.14/addon/search/search.min.js',
            'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.14/addon/search/searchcursor.min.js',
            'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.14/addon/search/jump-to-line.min.js',
            'https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.14/addon/dialog/dialog.min.js',
            'https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js',
            'https://cdnjs.cloudflare.com/ajax/libs/js-sha512/0.8.0/sha512.min.js'
        ],
    ],
    'local' => [
        'css' => [
            'node_modules/bootstrap/dist/css/bootstrap.min.css',
            'node_modules/jstree/dist/themes/default/style.min.css',
            'node_modules/codemirror/lib/codemirror.css',
            'node_modules/codemirror/addon/lint/lint.css',
            'node_modules/codemirror/addon/dialog/dialog.css',
            'node_modules/codemirror//theme/monokai.css',
            empty(EDITOR_THEME) ? '' : 'node_modules/codemirror/theme/' . EDITOR_THEME . '.css',
            'node_modules/izitoast/dist/css/iziToast.min.css',
            'node_modules/@fortawesome/fontawesome-free/css/all.min.css',
        ],
        'js' => [
            'node_modules/jquery/dist/jquery.min.js',
            'node_modules/bootstrap/dist/js/bootstrap.bundle.min.js',
            'node_modules/jstree/dist/jstree.min.js',
            'node_modules/codemirror/lib/codemirror.js',
            'node_modules/codemirror/mode/javascript/javascript.js',
            'node_modules/codemirror/mode/css/css.js',
            'node_modules/codemirror/mode/php/php.js',
            'node_modules/codemirror/mode/xml/xml.js',
            'node_modules/codemirror/mode/htmlmixed/htmlmixed.js',
            'node_modules/codemirror/mode/markdown/markdown.js',
            'node_modules/codemirror/mode/clike/clike.js',
            'node_modules/jshint/dist/jshint.js',
            // 'node_modules/jsonlint/lib/jsonlint.js',
            'node_modules/codemirror/addon/lint/lint.js',
            'node_modules/codemirror/addon/lint/javascript-lint.js',
            // 'node_modules/codemirror/addon/lint/json-lint.js',
            'node_modules/codemirror/addon/lint/css-lint.js',
            'node_modules/codemirror/addon/search/search.js',
            'node_modules/codemirror/addon/search/searchcursor.js',
            'node_modules/codemirror/addon/search/jump-to-line.js',
            'node_modules/codemirror/addon/dialog/dialog.js',
            'node_modules/izitoast/dist/js/iziToast.min.js',
            'node_modules/js-sha512/build/sha512.min.js'
        ],
    ],
];

if (empty(ACCESS_IP) === false && ACCESS_IP != $_SERVER['REMOTE_ADDR']) {
    die('Your IP address is not allowed to access this page.');
}

if (file_exists(LOG_FILE)) {
    $log = unserialize(file_get_contents(LOG_FILE));

    if (empty($log)) {
        $log = [];
    }

    if (isset($log[$_SERVER['REMOTE_ADDR']]) && $log[$_SERVER['REMOTE_ADDR']]['num'] > 3 && time() - $log[$_SERVER['REMOTE_ADDR']]['time'] < 86400) {
        die('This IP address is blocked due to unsuccessful login attempts.');
    }

    foreach ($log as $key => $value) {
        if (time() - $value['time'] > 86400) {
            unset($log[$key]);

            $log_updated = true;
        }
    }

    if (isset($log_updated)) {
        file_put_contents(LOG_FILE, serialize($log));
    }
}

session_set_cookie_params(86400, dirname($_SERVER['REQUEST_URI']));
session_name('pheditor');
session_start();

if (empty(PASSWORD) === false && (isset($_SESSION['pheditor_admin'], $_SESSION['pheditor_password']) === false || $_SESSION['pheditor_admin'] !== true || $_SESSION['pheditor_password'] != PASSWORD)) {
    if (isset($_POST['pheditor_password']) && empty($_POST['pheditor_password']) === false) {
        $password_hash = hash('sha512', $_POST['pheditor_password']);

        if ($password_hash === PASSWORD) {
            session_regenerate_id(true);

            $_SESSION['pheditor_admin'] = true;
            $_SESSION['pheditor_password'] = $password_hash;

            redirect();
        } else {
            $error = 'The entry password is not correct.';

            $log = file_exists(LOG_FILE) ? unserialize(file_get_contents(LOG_FILE)) : array();

            if (isset($log[$_SERVER['REMOTE_ADDR']]) === false) {
                $log[$_SERVER['REMOTE_ADDR']] = array('num' => 0, 'time' => 0);
            }

            $log[$_SERVER['REMOTE_ADDR']]['num'] += 1;
            $log[$_SERVER['REMOTE_ADDR']]['time'] = time();

            file_put_contents(LOG_FILE, serialize($log));
        }
    } else if (isset($_POST['action'])) {
        header('HTTP/1.0 403 Forbidden');

        die('Your session has expired.');
    }

    die('<title>Pheditor</title><form method="post"><div style="text-align:center"><h1><a href="http://github.com/pheditor/pheditor" target="_blank" title="PHP file editor" style="color:#444;text-decoration:none" tabindex="3">Pheditor</a></h1>' . (isset($error) ? '<p style="color:#dd0000">' . $error . '</p>' : null) . '<input id="pheditor_password" name="pheditor_password" type="password" value="" placeholder="Password&hellip;" tabindex="1"><br><br><input type="submit" value="Login" tabindex="2"></div></form><script type="text/javascript">document.getElementById("pheditor_password").focus();</script>');
}

if (isset($_GET['logout'])) {
    if ($_GET['logout'] == $_SESSION['pheditor_token']) {
        unset($_SESSION['pheditor_admin']);

        session_destroy();
    }

    redirect();
}

$permissions = explode(',', PERMISSIONS);
$permissions = array_map('trim', $permissions);
$permissions = array_filter($permissions);

if (count($permissions) < 1) {
    $permissions = explode(',', 'newfile,newdir,editfile,deletefile,deletedir,renamefile,renamedir,changepassword,uploadfile');
}

if (isset($_GET['path'])) {
    header('Content-Type: application/json');

    $dir = realpath(rtrim(MAIN_DIR . DS . trim($_GET['path'], '/'), '/'));

    if ($dir === false || check_path($dir) !== true) {
        die('[]');
    }

    $files = array_slice(scandir($dir), 2);
    $list = [];

    asort($files);

    foreach ($files as $key => $file) {
        if (substr($file, 0, 1) === '.' || (SHOW_PHP_SELF === false && $dir . DS . $file == __FILE__)) {
            continue;
        }

        if (is_dir($dir . DS . $file) && (empty(PATTERN_DIRECTORIES) || preg_match(PATTERN_DIRECTORIES, $file))) {
            $dir_path = str_replace([MAIN_DIR, DS], ['', '/'], $dir . DS . $file . DS);

            $list[] = [
                'text' => $file,
                'icon' => 'far fa-folder',
                'children' => true,
                'a_attr' => [
                    'href' => '#' . $dir_path,
                    'data-dir' => $dir_path
                ],
                'state' => [
                    'selected' => false,
                ],
            ];
        } else if (empty(PATTERN_FILES) || preg_match(PATTERN_FILES, $file)) {
            $file_path = str_replace([MAIN_DIR, DS], ['', '/'], $dir . DS . $file);

            $list[] = [
                'text' => $file,
                'icon' => 'far fa-file',
                'a_attr' => [
                    'href' => '#' . $file_path,
                    'data-file' => $file_path
                ],
                'state' => [
                    'selected' => false,
                ],
            ];
        }
    }

    if (empty($_GET['path'])) {
        $list = [
            'text' => '/',
            'icon' => 'far fa-folder',
            'children' => $list,
            'a_attr' => [
                'href' => '#/',
                'data-dir' => '/',
            ],
            'state' => [
                'selected' => false,
            ],
        ];
    }

    die(json_encode($list, JSON_UNESCAPED_UNICODE));
} else if (isset($_POST['action'])) {
    header('Content-Type: application/json');

    $post_token = $_POST['token'] ?? null;
    $session_token = $_SESSION['pheditor_token'] ?? null;

    if (empty($post_token) || $post_token != $session_token) {
        die(json_error('Invalid token. Please reload the page.'));
    }

    if (isset($_POST['file']) && empty($_POST['file']) === false) {
        $_POST['file'] = base64_decode($_POST['file']);

        if (empty(PATTERN_FILES) === false && !preg_match(PATTERN_FILES, basename($_POST['file']))) {
            die(json_error('Invalid file pattern'));
        }
    }

    foreach (['file', 'dir', 'path', 'name', 'destination'] as $value) {
        if (isset($_POST[$value]) && empty($_POST[$value]) === false) {
            $value = urldecode($_POST[$value]);

            if (strpos($value, '../') !== false || strpos($value, '..\\') !== false) {
                die(json_error('Invalid path'));
            }
        }
    }

    switch ($_POST['action']) {
        case 'open':
            if (isset($_POST['file']) && file_exists(MAIN_DIR . $_POST['file'])) {
                die(json_success('OK', [
                    'data' => file_get_contents(MAIN_DIR . $_POST['file']),
                ]));
            }
            break;

        case 'save':
            $file = MAIN_DIR . $_POST['file'];

            if (isset($_POST['file']) && isset($_POST['data']) && (file_exists($file) === false || is_writable($file))) {
                if (file_exists($file) === false) {
                    if (in_array('newfile', $permissions) !== true) {
                        die(json_error('Permission denied', true));
                    }

                    file_put_contents($file, $_POST['data']);

                    if (function_exists('chmod')) {
                        chmod($file, DEFAULT_FILE_PERMISSION);
                    }

                    echo json_success('File saved successfully');
                } else if (is_writable($file) === false) {
                    echo json_error('File is not writable');
                } else {
                    if (in_array('editfile', $permissions) !== true) {
                        die(json_error('Permission denied'));
                    }

                    if (file_exists($file)) {
                        file_to_history($file);
                    }

                    file_put_contents($file, $_POST['data']);

                    echo json_success('File saved successfully');
                }
            }
            break;

        case 'make-dir':
            if (in_array('newdir', $permissions) !== true) {
                die(json_error('Permission denied'));
            }

            $dir = MAIN_DIR . $_POST['dir'];

            if (file_exists($dir) === false) {
                mkdir($dir, DEFAULT_DIR_PERMISSION);

                if (function_exists('chmod')) {
                    chmod($dir, DEFAULT_DIR_PERMISSION);
                }

                echo json_success('Directory created successfully');
            } else {
                echo json_error('Directory already exists');
            }
            break;

        case 'reload':
            echo json_success('OK', [
                'data' => files(MAIN_DIR),
            ]);
            break;

        case 'password':
            if (in_array('changepassword', $permissions) !== true) {
                die(json_error('Permission denied'));
            }

            if (isset($_POST['password']) && empty($_POST['password']) === false) {
                $contents = file(__FILE__);
                $password_hash = hash('sha512', $_POST['password']);

                foreach ($contents as $key => $line) {
                    if (strpos($line, 'define(\'PASSWORD\'') !== false) {
                        $contents[$key] = "define('PASSWORD', '" . $password_hash . "');\n";

                        break;
                    }
                }

                if (is_writable(__FILE__) === false) {
                    die(json_error('File is not writable'));
                }

                file_put_contents(__FILE__, implode($contents));

                $_SESSION['pheditor_password'] = $password_hash;

                session_regenerate_id(true);

                echo json_success('Password changed successfully');
            }
            break;

        case 'delete':
            if (isset($_POST['path']) && file_exists(MAIN_DIR . $_POST['path']) && check_path(MAIN_DIR . $_POST['path'])) {
                $path = MAIN_DIR . $_POST['path'];

                if ($_POST['path'] == '/') {
                    echo json_error('Unable to delete main directory');
                } else if (is_dir($path)) {
                    if (count(scandir($path)) !== 2) {
                        echo json_error('Directory is not empty');
                    } else if (is_writable($path) === false) {
                        echo json_error('Unable to delete directory');
                    } else {
                        if (in_array('deletedir', $permissions) !== true) {
                            die(json_error('Permission denied'));
                        }

                        rmdir($path);

                        echo json_success('Directory deleted successfully');
                    }
                } else {
                    if (empty(PATTERN_FILES) === false && !preg_match(PATTERN_FILES, basename($_POST['path']))) {
                        die(json_error('Invalid file patterna'));
                    }

                    file_to_history($path);

                    if (is_writable($path)) {
                        if (in_array('deletefile', $permissions) !== true) {
                            die(json_error('Permission denied'));
                        }

                        unlink($path);

                        echo json_success('File deleted successfully');
                    } else {
                        echo json_error('Unable to delete file');
                    }
                }
            }
            break;

        case 'rename':
            if (isset($_POST['path']) && file_exists(MAIN_DIR . $_POST['path']) && isset($_POST['name']) && empty($_POST['name']) === false) {
                $path = MAIN_DIR . $_POST['path'];
                $new_path = str_replace(basename($path), '', dirname($path)) . DS . $_POST['name'];

                if ($_POST['path'] == '/') {
                    echo json_error('Unable to rename main directory');
                } else if (is_dir($path)) {
                    if (in_array('renamedir', $permissions) !== true) {
                        die(json_error('Permission denied'));
                    }

                    if (is_writable($path) === false) {
                        echo json_error('Unable to rename directory');
                    } else {
                        rename($path, $new_path);

                        echo json_success('Directory renamed successfully');
                    }
                } else {
                    if (in_array('renamefile', $permissions) !== true) {
                        die(json_error('Permission denied'));
                    } else if (empty(PATTERN_FILES) === false && !preg_match(PATTERN_FILES, $_POST['name'])) {
                        die(json_error('Invalid file pattern: ' . htmlspecialchars($_POST['name'])));
                    }

                    file_to_history($path);

                    if (is_writable($path)) {
                        rename($path, $new_path);

                        echo json_success('File renamed successfully');
                    } else {
                        echo json_error('Unable to rename file');
                    }
                }
            }
            break;

        case 'upload-file':
            $files = isset($_FILES['uploadfile']) ? $_FILES['uploadfile'] : [];
            $destination = isset($_POST['destination']) ? rtrim($_POST['destination']) : null;

            if (empty($destination) === false && (strpos($destination, '/..') !== false || strpos($destination, '\\..') !== false)) {
                die(json_error('Invalid file destination'));
            }

            $destination = MAIN_DIR . $destination;

            if (file_exists($destination) === false || is_dir($destination) === false) {
                die(json_error('File destination does not exists'));
            }

            if (is_writable($destination) !== true) {
                die(json_error('File destination is not writable'));
            }

            if (is_array($files) && count($files) > 0) {
                for ($i = 0; $i < count($files['name']); $i += 1) {
                    if (empty(PATTERN_FILES) === false && !preg_match(PATTERN_FILES, $files['name'][$i])) {
                        die(json_error('Invalid file pattern: ' . htmlspecialchars($files['name'][$i])));
                    }

                    move_uploaded_file($files['tmp_name'][$i], $destination . '/' . $files['name'][$i]);
                }

                echo json_success('File' . (count($files['name']) > 1 ? 's' : null) . ' uploaded successfully');
            }
            break;

        case 'terminal':
            if (in_array('terminal', $permissions) !== false && isset($_POST['command'], $_POST['dir'])) {
                if (function_exists('shell_exec') === false) {
                    echo json_error("shell_exec function is disabled\n");

                    exit;
                }

                set_time_limit(15);

                $command  = $_POST['command'];
                $dir = $_POST['dir'];

                if (strpos($command, '&') !== false || strpos($command, ';') !== false || strpos($command, '||') !== false) {
                    echo json_error("Illegal character(s) in command (& ; ||)\n");

                    exit;
                }

                $command_found = false;
                $terminal_commands = explode(',', TERMINAL_COMMANDS);

                foreach ($terminal_commands as $value) {
                    $value = trim($value);

                    if (strlen($command) >= strlen($value) && substr($command, 0, strlen($value)) == $value) {
                        $command_found = true;

                        break;
                    }
                }

                if ($command_found === false) {
                    foreach ($terminal_commands as $key => $value) {
                        $commands[$key % 3] = isset($commands[$key % 3]) ? $commands[$key % 3] . "\t" . $value : $value;
                    }

                    echo json_error("<span class=\"text-danger\">Command not allowed</span>\n<span class=\"text-success\">Available commands:</span>\n" . implode("\n", $commands) . "\n");

                    exit;
                }

                $output = shell_exec((empty($dir) ? null : 'cd ' . $dir . ' && ') . $command . ' && echo \ ; pwd');
                $output = trim($output);

                if (empty($output)) {
                    $output = null;
                    $dir = null;
                } else {
                    $output = explode("\n", $output);
                    $dir = end($output);

                    unset($output[count($output) - 1]);

                    $output = implode("\n", $output);
                    $output = trim($output) . "\n";
                    $output = htmlspecialchars($output);
                }

                echo json_success('OK', ['result' => $output, 'dir' => $dir]);
            }
            break;
    }

    exit;
}

function redirect($address = null)
{
    if (empty($address)) {
        $address = $_SERVER['SCRIPT_NAME'];
    }

    header('Location: ' . $address);
    exit;
}

function file_to_history($file)
{
    if (is_numeric(MAX_HISTORY_FILES) && MAX_HISTORY_FILES > 0) {
        $file_dir = dirname($file);
        $file_name = basename($file);
        $file_history_dir = HISTORY_PATH . str_replace(MAIN_DIR, '', $file_dir);

        foreach ([HISTORY_PATH, $file_history_dir] as $dir) {
            if (file_exists($dir) === false || is_dir($dir) === false) {
                mkdir($dir, 0777, true);
            }
        }

        $history_files = scandir($file_history_dir);

        foreach ($history_files as $key => $history_file) {
            if (in_array($history_file, ['.', '..', '.DS_Store'])) {
                unset($history_files[$key]);
            }
        }

        $history_files = array_values($history_files);

        if (count($history_files) >= MAX_HISTORY_FILES) {
            foreach ($history_files as $key => $history_file) {
                if ($key < 1) {
                    unlink($file_history_dir . DS . $history_file);
                    unset($history_files[$key]);
                } else {
                    rename($file_history_dir . DS . $history_file, $file_history_dir . DS . $file_name . '.' . ($key - 1));
                }
            }
        }

        copy($file, $file_history_dir . DS . $file_name . '.' . count($history_files));
    }
}

function json_error($message, $params = [])
{
    return json_encode(array_merge([
        'error' => true,
        'message' => $message,
    ], $params), JSON_UNESCAPED_UNICODE);
}

function json_success($message, $params = [])
{
    return json_encode(array_merge([
        'error' => false,
        'message' => $message,
    ], $params), JSON_UNESCAPED_UNICODE);
}

function check_path($path, $check_existence = true)
{
    if ($check_existence === false) {
        $path = dirname($path);
    }

    $real_path = realpath($path);

    if (strpos($real_path, MAIN_DIR) === 0) {
        return true;
    }

    return false;
}

$_SESSION['pheditor_token'] = bin2hex(random_bytes(32));

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pheditor</title>
    <link id="favicon" rel="shortcut icon" type="image/png" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAaVBMVEUAAAAoLTgqLzckLzsmLDUrMDYpLzcqMDooLjcqLjgpLjUpLjcpLTYkLDgrMTYiKS8pMDonKzopMTYxNjwmKzkiJzkjJjMmKzgmLzgnLjUwMTktNDYnKj8pLzcaHCIWGRwnLjkoLjgeJD+rVehhAAAAI3RSTlMAbUFbDldiTVAnc19ZVEUFempkYx0UCYd1PDcwC5RORyMjGhuz37YAAACISURBVBjTbcxXCsMwEATQsb1SrO4muabe/5BZGQKC+P0MDLuDP6SrwjJB9nWhMRgIpRvki+MT4H3MA1woKG0CRnp2G6iFJDlPwD4CtOjAF7Gu/AGhENbhkc4XjH0cAKGPc+MNtm/IctEnlFq4rmHONS5nZbmzQoh7Z2YOK9LvUmFFgUzr7YRLXy5UBfV2oz6WAAAAAElFTkSuQmCC">

    <?php foreach ($assets[LOCAL_ASSETS ? 'local' : 'cdn']['css'] as $value) : ?>
        <?php if (empty($value) === false) : ?>
            <link rel="stylesheet" href="<?= $value ?>">
        <?php endif; ?>
    <?php endforeach; ?>

    <style type="text/css">
        h1,
        h1 a,
        h1 a:hover {
            margin: 0;
            padding: 0;
            color: #444;
            cursor: default;
            text-decoration: none;
        }

        #files {
            padding: 20px 10px;
            margin-bottom: 10px;
        }

        #files>div {
            overflow: auto;
        }

        #path {
            margin-left: 10px;
        }

        .dropdown-item.close {
            font-size: 1em !important;
            font-weight: normal;
            opacity: 1;
        }

        #loading {
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 9;
            display: none;
            position: absolute;
            background: rgba(0, 0, 0, 0.5);
        }

        .lds-ring {
            margin: 0 auto;
            position: relative;
            width: 64px;
            height: 64px;
            top: 45%;
        }

        .lds-ring div {
            box-sizing: border-box;
            display: block;
            position: absolute;
            width: 51px;
            height: 51px;
            margin: 6px;
            border: 6px solid #fff;
            border-radius: 50%;
            animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
            border-color: #fff transparent transparent transparent;
        }

        .lds-ring div:nth-child(1) {
            animation-delay: -0.45s;
        }

        .lds-ring div:nth-child(2) {
            animation-delay: -0.3s;
        }

        .lds-ring div:nth-child(3) {
            animation-delay: -0.15s;
        }

        @keyframes lds-ring {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .dropdown-menu {
            min-width: 12rem;
        }

        #terminal {
            padding: 5px 10px;
            border-radius: .25rem;
        }

        #terminal .toggle {
            cursor: pointer;
        }

        #terminal pre {
            background: black;
            color: #ccc;
            padding: 5px 10px 10px 10px;
            border-radius: 5px 5px 0 0;
            margin: 5px 0 0 0;
            height: 200px;
            overflow-y: auto;
        }

        #terminal input.command {
            width: 100%;
            background: #333;
            color: #fff;
            border: 0;
            border-radius: 0 0 5px 5px;
            margin-bottom: 5px;
            padding: 5px;
        }

        #terminal .btn {
            padding: .5rem .4rem;
            font-size: .875rem;
            line-height: .5;
            border-radius: .2rem;
        }

        #terminal #prompt:fullscreen pre {
            margin: 0;
            border-radius: 0;
        }

        #terminal #prompt:fullscreen input.command {
            border-radius: 0;
        }

        #terminal span.toggle i::before {
            content: "\f107";
        }

        #terminal span.toggle.collapsed i::before {
            content: "\f105";
        }

        #terminal span.command {
            color: #eee;
        }

        .fa-file {
            color: #000;
        }

        .fa-folder {
            color: #f5c205;
        }

        .dark-mode-button {
            display: inline;
            float: left;
            margin-right: 10px;
            padding-top: 4px;
            border-radius: .2rem;
        }

        .dark-mode-button>label {
            margin: 0 10px 4px 10px;
        }

        body.dark-mode,
        body.dark-mode .modal-header,
        body.dark-mode .modal-footer {
            background: #2b373d;
            color: #fff;
        }

        body.dark-mode #files,
        body.dark-mode #terminal,
        body.dark-mode .btn-secondary,
        body.dark-mode .dropdown-menu,
        body.dark-mode .modal-body {
            background: #445760;
        }

        body.dark-mode a,
        body.dark-mode #path,
        body.dark-mode .btn-light,
        body.dark-mode .modal-header .close {
            color: #fff;
        }

        body.dark-mode .card {
            background-color: transparent;
        }

        body.dark-mode .far.fa-folder,
        body.dark-mode .far.fa-file {
            font-weight: 900;
        }

        body.dark-mode .jstree-default .jstree-leaf>.jstree-ocl,
        body.dark-mode .jstree-default .jstree-open>.jstree-ocl {
            filter: invert(1);
        }

        body.dark-mode .far.fa-file {
            color: #eee;
        }

        body.dark-mode .jstree-clicked,
        body.dark-mode .jstree-clicked i {
            color: #444 !important;
        }

        body.dark-mode #terminal .btn-light {
            background: #2b373d;
            border-color: transparent;
        }

        body.dark-mode .dark-mode-button,
        body.dark-mode .help-button {
            background: #445760 !important;
            border: 0;
        }

        body.dark-mode .text-muted {
            color: #eee !important;
        }

        body.dark-mode .modal-content {
            background-color: transparent;
        }

        body.dark-mode .modal-header,
        body.dark-mode .modal-footer {
            border: 0;
        }

        body.dark-mode input[type=text] {
            background-color: #272822;
            border-color: #272822;
            color: #f8f8f2;
        }

        body.dark-mode input[type=text]:focus {
            box-shadow: none;
        }

        .help-button {
            margin-right: 10px;
        }

        .heading-alert {
            border-radius: 0;
        }

        .heading-alert a.change-password {
            color: inherit;
            font-weight: bold;
            text-decoration: underline;
        }

        #search {
            position: relative;
        }

        #search .search-input {
            padding-right: 32px;
        }

        #search .search-clear {
            position: absolute;
            right: 2px;
            top: 1px;
            color: #555;
            cursor: pointer;
            padding: 10px;
        }
    </style>

    <?php foreach ($assets[LOCAL_ASSETS ? 'local' : 'cdn']['js'] as $value) : ?>
        <?php if (empty($value) === false) : ?>
            <script src="<?= $value ?>"></script>
        <?php endif; ?>
    <?php endforeach; ?>

    <script type="text/javascript">
        var editor,
            modes = {
                "js": "javascript",
                "json": "javascript",
                "md": "text/x-markdown"
            },
            last_keyup_press = false,
            last_keyup_double = false,
            terminal_history = 1,
            jstree_hashchange = true,
            token = "<?= $_SESSION['pheditor_token'] ?>";

        function alertBox(title, message, color) {
            iziToast.show({
                title: title,
                message: message,
                color: color,
                position: "bottomRight",
                transitionIn: "fadeInUp",
                transitionOut: "fadeOutRight",
            });
        }

        function setCookie(name, value, timeout) {
            if (timeout) {
                var date = new Date();
                date.setTime(date.getTime() + (timeout * 1000));
                timeout = "; expires=" + date.toUTCString();
            } else {
                timeout = "";
            }

            document.cookie = name + "=" + encodeURIComponent(value) + timeout + "; path=/";
        }

        function getCookie(name) {
            var cookies = document.cookie.split(';');

            for (var i = 0; i < cookies.length; i++) {
                if (cookies[i].trim().indexOf(name + "=") == 0) {
                    return decodeURIComponent(cookies[i].trim().substring(name.length + 1).trim());
                }
            }

            return false;
        }

        $(function() {
            editor = CodeMirror.fromTextArea($("#editor")[0], {
                <?php if (empty(EDITOR_THEME) === false) : ?>
                    theme: "<?= EDITOR_THEME ?>",
                <?php endif; ?>
                lineNumbers: true,
                mode: "application/x-httpd-php",
                indentUnit: 4,
                indentWithTabs: true,
                lineWrapping: <?= WORD_WRAP ? 'true' : 'false' ?>,
                gutters: ["CodeMirror-lint-markers"],
                lint: true
            });

            $("#files > div").on("load_node.jstree", function(a, b) {
                if (b.node.a_attr && b.node.a_attr.href != undefined) {
                    var hash = decodeURI(window.location.hash);
                    if (hash.indexOf(b.node.a_attr.href) == 0 && hash.replace(b.node.a_attr.href, "").indexOf("/") < 0) {
                        setTimeout(function() {
                            $("[data-file='" + hash.substring(1) + "']").click();

                            $(window).trigger("hashchange");
                        }, 250);
                    }
                }
            }).jstree({
                state: {
                    key: "pheditor"
                },
                plugins: ["state", "sort"],
                core: {
                    data: {
                        url: function(node) {
                            return node.id == "#" ? "<?= $_SERVER['SCRIPT_NAME'] ?>?path=" : "<?= $_SERVER['SCRIPT_NAME'] ?>?path=" + encodeURIComponent(node.a_attr["data-dir"]);
                        }
                    }
                },
                'sort': function(a, b) {
                    a1 = this.get_node(a);
                    b1 = this.get_node(b);
                    if (a1.icon == b1.icon) {
                        return (a1.text > b1.text) ? 1 : -1;
                    } else {
                        return (a1.icon > b1.icon) ? -1 : 1;
                    }
                }
            });

            $("#files").on("dblclick", "a[data-file]", function(event) {
                event.preventDefault();
                <?php

                $base_dir = str_replace($_SERVER['DOCUMENT_ROOT'], '', str_replace(DS, '/', MAIN_DIR));

                if (substr($base_dir, 0, 1) !== '/') {
                    $base_dir = '/' . $base_dir;
                }

                ?>

                let file = '<?= $base_dir ?>' + $(this).attr("data-file");

                if (file.substring(0, 2) == '//') {
                    file = file.substring(1);
                }

                window.open(file, '_blank');
            });

            $("a.change-password").click(function() {
                var password = prompt("Please enter new password:");

                if (password != null && password.length > 0) {
                    $.post("<?= $_SERVER['SCRIPT_NAME'] ?>", {
                        action: "password",
                        token: token,
                        password: password
                    }, function(data) {
                        alertBox(data.error ? "Error" : "Success", data.message, data.error ? "red" : "green");

                        if (data.error === false) {
                            setTimeout(function() {
                                location.reload();
                            }, 1000);
                        }
                    });
                }
            });

            $(".dropdown .new-file").click(function() {
                var path = $("#path").html();

                if (path.length > 0) {
                    var name = prompt("Please enter file name:", "new-file.php"),
                        end = path.substring(path.length - 1),
                        file = "";

                    if (name != null && name.length > 0) {
                        if (end == "/") {
                            file = path + name;
                        } else {
                            file = path.substring(0, path.lastIndexOf("/") + 1) + name;
                        }

                        $.post("<?= $_SERVER['SCRIPT_NAME'] ?>", {
                            action: "save",
                            token: token,
                            file: btoa(file),
                            data: ""
                        }, function(data) {
                            alertBox(data.error ? "Error" : "Success", data.message, data.error ? "red" : "green");

                            if (data.error == false) {
                                $("#files > div").jstree("refresh");

                                setTimeout(function() {
                                    $("[data-file='" + file + "']").click();
                                }, 250);
                            }
                        });
                    }
                } else {
                    alertBox("Warning", "Please select a file or directory", "yellow");
                }
            });

            $(".dropdown .new-dir").click(function() {
                var path = $("#path").html();

                if (path.length > 0) {
                    var name = prompt("Please enter directory name:", "new-dir"),
                        end = path.substring(path.length - 1),
                        dir = "";

                    if (name != null && name.length > 0) {
                        if (end == "/") {
                            dir = path + name;
                        } else {
                            dir = path.substring(0, path.lastIndexOf("/") + 1) + name;
                        }

                        $.post("<?= $_SERVER['SCRIPT_NAME'] ?>", {
                            action: "make-dir",
                            token: token,
                            dir: dir
                        }, function(data) {
                            alertBox(data.error ? "Error" : "Success", data.message, data.error ? "red" : "green");

                            if (data.error == false) {
                                $("#files > div").jstree("refresh");

                                setTimeout(function() {
                                    $("[data-dir='" + dir + "/']").click();
                                }, 250);
                            }
                        });
                    }
                } else {
                    alertBox("Warning", "Please select a file or directory", "yellow");
                }
            });

            $(".dropdown .save").click(function() {
                var path = $("#path").html(),
                    data = editor.getValue();

                if (path.length > 0) {
                    $("#digest").val(sha512(data));

                    $.post("<?= $_SERVER['SCRIPT_NAME'] ?>", {
                        action: "save",
                        token: token,
                        file: btoa(path),
                        data: data
                    }, function(data) {
                        alertBox(data.error ? "Error" : "Success", data.message, data.error ? "red" : "green");
                    });
                } else {
                    alertBox("Warning", "Please select a file", "yellow");
                }
            });

            $(".dropdown .close").click(function() {
                editor.setValue("");
                $("#files > div a:first").click();
                $(".dropdown").find(".save, .delete, .rename, .reopen, .close").addClass("disabled");
            });

            $(".dropdown .delete").click(function() {
                var path = $("#path").html();

                if (path.length > 0) {
                    if (confirm("Are you sure to delete this file?")) {
                        $.post("<?= $_SERVER['SCRIPT_NAME'] ?>", {
                            action: "delete",
                            token: token,
                            path: path
                        }, function(data) {
                            alertBox(data.error ? "Error" : "Success", data.message, data.error ? "red" : "green");

                            if (data.error == false) {
                                $("#files > div").jstree("refresh");
                            }
                        });
                    }
                } else {
                    alertBox("Warning", "Please select a file or directory", "yellow");
                }
            });

            $(".dropdown .rename").click(function() {
                var path = $("#path").html(),
                    split = path.split("/"),
                    file = split[split.length - 1],
                    dir = split[split.length - 2],
                    new_file_name;

                if (path.length > 0) {
                    if (file.length > 0) {
                        new_file_name = file;
                    } else if (dir.length > 0) {
                        new_file_name = dir;
                    } else {
                        new_file_name = "new-file";
                    }

                    var name = prompt("Please enter new name:", new_file_name);

                    if (name != null && name.length > 0) {
                        $.post("<?= $_SERVER['SCRIPT_NAME'] ?>", {
                            action: "rename",
                            token: token,
                            path: path,
                            name: name
                        }, function(data) {
                            alertBox(data.error ? "Error" : "Success", data.message, data.error ? "red" : "green");

                            if (data.error == false) {
                                $("#files > div").jstree("refresh");
                            }
                        });
                    }
                } else {
                    alertBox("Warning", "Please select a file or directory", "yellow");
                }
            });

            $(".dropdown .reopen").click(function() {
                var path = $("#path").html();

                if (path.length > 0) {
                    $(window).trigger("hashchange");
                }
            });

            $(window).resize(function() {
                if (window.innerWidth >= 720) {
                    var terminalHeight = $("#terminal").length > 0 ? $("#terminal").height() : 0,
                        height = window.innerHeight - $(".CodeMirror")[0].getBoundingClientRect().top - terminalHeight - 30,
                        searchHeight = $('#search').outerHeight(true) + 30;

                    $("#files").css("height", (height - searchHeight) + "px");
                    $(".CodeMirror").css("height", (height - 15) + "px");
                } else {
                    $("#files > div, .CodeMirror").css({
                        "height": ""
                    });
                }

                if (document.fullscreen) {
                    $("#prompt pre").height($(window).height() - $("#prompt input.command").height() - 20);
                }
            });

            $(window).resize();

            $(document).bind("keyup", function(event) {
                if (event.ctrlKey && event.altKey) {
                    if (event.keyCode == 78) {
                        $(".dropdown .new-file").click();
                        event.preventDefault();

                        return false;
                    } else if (event.keyCode == 83) {
                        $(".dropdown .save").click();
                        event.preventDefault();

                        return false;
                    } else if (event.keyCode == 76) {
                        $("#terminal .toggle").click();
                        event.preventDefault();

                        return false;
                    }
                }
            });

            $(document).bind("keyup", function(event) {
                if (event.keyCode == 27) {
                    if (last_keyup_press == true) {
                        last_keyup_double = true;

                        $("#fileMenu").click();
                        $("body").focus();
                    } else {
                        last_keyup_press = true;

                        setTimeout(function() {
                            if (last_keyup_double === false) {
                                if (document.activeElement.tagName.toLowerCase() == "textarea") {
                                    if ($("#terminal #prompt").hasClass("show")) {
                                        $("#terminal .command").focus();
                                    } else {
                                        $(".jstree-clicked").focus();
                                    }
                                } else if (document.activeElement.tagName.toLowerCase() == "input") {
                                    $(".jstree-clicked").focus();
                                } else {
                                    editor.focus();
                                }
                            }

                            last_keyup_press = false;
                            last_keyup_double = false;
                        }, 250);
                    }
                }
            });

            $(window).on("hashchange", function() {
                var hash = decodeURI(window.location.hash.substring(1)),
                    data = editor.getValue();

                if (hash.length > 0) {
                    if ($("#digest").val().length < 1 || $("#digest").val() == sha512(data)) {
                        if (hash.substring(hash.length - 1) == "/") {
                            var dir = $("a[data-dir='" + hash + "']");

                            if (dir.length > 0) {
                                editor.setValue("");
                                $("#digest").val("");
                                $("#path").html(hash);
                                $(".dropdown").find(".save, .reopen, .close").addClass("disabled");
                                $(".dropdown").find(".delete, .rename").removeClass("disabled");
                            }
                        } else {
                            var file = $("a[data-file='" + hash + "']");

                            if (file.length > 0) {
                                $("#loading").fadeIn(250);

                                $.post("<?= $_SERVER['SCRIPT_NAME'] ?>", {
                                    action: "open",
                                    token: token,
                                    file: btoa(hash),
                                }, function(data) {
                                    if (data.error == true) {
                                        alertBox("Error", data.message, "red");

                                        return false;
                                    }

                                    editor.setValue(data.data);
                                    editor.setOption("mode", "application/x-httpd-php");

                                    $("#digest").val(sha512(data.data));

                                    if (hash.lastIndexOf(".") > 0) {
                                        var extension = hash.substring(hash.lastIndexOf(".") + 1);

                                        if (modes[extension]) {
                                            editor.setOption("mode", modes[extension]);
                                        }
                                    }

                                    $("#editor").attr("data-file", hash);
                                    $("#path").html(hash).hide().fadeIn(250);
                                    $(".dropdown").find(".save, .delete, .rename, .reopen, .close").removeClass("disabled");

                                    $("#loading").fadeOut(250);
                                });
                            }
                        }
                    } else if (confirm("Discard changes?")) {
                        $("#digest").val("");

                        $(window).trigger("hashchange");
                    }
                }
            });

            if (window.location.hash.length < 1) {
                window.location.hash = "/";
            } else {
                $(window).trigger("hashchange");
            }

            $("#files").on("click", ".jstree-anchor", function() {
                location.href = $(this).attr("href");
            });

            $(document).ajaxError(function(event, request, settings) {
                var message = "An error occurred with this request.";

                if (request.responseText.length > 0) {
                    message = request.responseText;
                }

                if (confirm(message + " Do you want to reload the page?")) {
                    location.reload();
                }

                $("#loading").fadeOut(250);
            });

            $(window).keydown(function(event) {
                if ($("#fileMenu[aria-expanded='true']").length > 0) {
                    var code = event.keyCode;

                    if (code == 78) {
                        $(".new-file").click();
                    } else if (code == 83) {
                        $(".save").click();
                    } else if (code == 68) {
                        $(".delete").click();
                    } else if (code == 82) {
                        $(".rename").click();
                    } else if (code == 79) {
                        $(".reopen").click();
                    } else if (code == 67) {
                        $(".close").click();
                    } else if (code == 85) {
                        $(".upload-file").click();
                    }
                }
            });

            $(".dropdown .upload-file").click(function() {
                $("#uploadFileModal").modal("show");
                $("#uploadFileModal input").focus();
            });

            $("#uploadFileModal button").click(function() {
                var form = $(this).closest("form"),
                    formdata = false;

                form.find("input[name=destination]").val(window.location.hash.substring(1));

                if (window.FormData) {
                    formdata = new FormData(form[0]);
                }

                $.ajax({
                    url: "<?= $_SERVER['SCRIPT_NAME'] ?>",
                    data: formdata ? formdata : form.serialize(),
                    cache: false,
                    contentType: false,
                    processData: false,
                    type: "POST",
                    success: function(data, textStatus, jqXHR) {
                        alertBox(data.error ? "Error" : "Success", data.message, data.error ? "red" : "green");

                        if (data.error == false) {
                            $("#files > div").jstree("refresh");
                        }
                    }
                });
            });

            var terminal_dir = "";

            $("#terminal .command").keydown(function(event) {
                if (event.keyCode == 13) {
                    if ($(this).val().length > 0) {
                        var _this = $(this)
                        _val = _this.val();

                        if (_val.toLowerCase() == "clear") {
                            $("#terminal pre").html("");
                            _this.val("").focus();

                            return true;
                        } else if (_val.toLowerCase() == "exit") {
                            _this.val("");
                            $("#terminal .toggle").trigger("click");

                            return true;
                        }

                        _this.prop("disabled", true);
                        $("#terminal pre").append("<span class=\"command\">&gt; " + _val + "</span>\n");
                        $("#terminal pre").animate({
                            scrollTop: $("#terminal pre").prop("scrollHeight")
                        });

                        var terminal_commands = $.parseJSON(getCookie("terminal_commands"));

                        if (terminal_commands === false) {
                            terminal_commands = [];
                        }

                        terminal_commands.push(_val);

                        if (terminal_commands.length > 50) {
                            terminal_commands = terminal_commands.slice(1);
                        }

                        setCookie("terminal_commands", JSON.stringify(terminal_commands));

                        $.post("<?= $_SERVER['SCRIPT_NAME'] ?>", {
                            action: "terminal",
                            token: token,
                            command: _val,
                            dir: terminal_dir
                        }, function(data) {
                            if (data.error) {
                                $("#terminal pre").append(data.message);
                            } else {
                                if (data.dir != null) {
                                    terminal_dir = data.dir;
                                }

                                if (data.result == null) {
                                    data.result = "Command not found\n";
                                }

                                $("#terminal pre").append(data.result);
                            }

                            $("#terminal pre").stop().animate({
                                scrollTop: $("#terminal pre").prop("scrollHeight")
                            });
                            _this.val("").prop("disabled", false).focus();
                        });
                    } else {
                        $("#terminal pre").append("\n");
                        $("#terminal pre").stop().animate({
                            scrollTop: $("#terminal pre").prop("scrollHeight")
                        });
                    }
                } else if (event.keyCode == 38) {
                    var terminal_commands = $.parseJSON(getCookie("terminal_commands"));

                    if (terminal_commands && terminal_commands[terminal_commands.length - terminal_history]) {
                        $(this).val(terminal_commands[terminal_commands.length - terminal_history]);

                        terminal_history += 1;
                    }
                } else if (event.keyCode == 40) {
                    if (terminal_history > 1) {
                        var terminal_commands = $.parseJSON(getCookie("terminal_commands"));

                        if (terminal_commands && terminal_commands[terminal_commands.length - terminal_history + 2]) {
                            $(this).val(terminal_commands[terminal_commands.length - terminal_history + 2]);

                            terminal_history -= 1;
                        }
                    }
                }
            });

            $("#terminal .toggle").click(function() {
                if ($(this).attr("aria-expanded") != "true") {
                    $("#terminal .command").focus();
                }
            });

            $('#prompt').on('show.bs.collapse', function() {
                $("#terminal").find(".clear, .copy, .fullscreen").css({
                    "display": "block",
                    "opacity": "0",
                    "margin-right": "-30px"
                }).animate({
                    "opacity": "1",
                    "margin-right": "0px"
                }, 250);

                if (window.innerWidth >= 720) {
                    var height = window.innerHeight - $(".CodeMirror")[0].getBoundingClientRect().top - $("#terminal #prompt").height() - 55;

                    $("#files, .CodeMirror").animate({
                        "height": height + "px"
                    }, 250);
                } else {
                    $("#files > div, .CodeMirror").animate({
                        "height": ""
                    }, 250);
                }

                setCookie("terminal", "1", 86400);
            }).on('hide.bs.collapse', function() {
                $("#terminal").find(".clear, .copy, .fullscreen").fadeOut();

                if (window.innerWidth >= 720) {
                    var height = window.innerHeight - $(".CodeMirror")[0].getBoundingClientRect().top - $("#terminal span").height() - 35;

                    $("#files, .CodeMirror").animate({
                        "height": height + "px"
                    }, 250);
                } else {
                    $("#files > div, .CodeMirror").animate({
                        "height": ""
                    }, 250);
                }

                setCookie("terminal", "0", 86400);
            }).on('shown.bs.collapse', function() {
                $("#terminal .command").focus();
            });

            $("#terminal button.clear").click(function() {
                $("#terminal pre").html("");
                $("#terminal .command").val("").focus();
            });

            $("#terminal button.copy").click(function() {
                $("#terminal").append($("<textarea>").html($("#terminal pre").html()));

                element = $("#terminal textarea")[0];
                element.select();
                element.setSelectionRange(0, 99999);
                document.execCommand("copy");

                $("#terminal textarea").remove();
            });

            if (getCookie("terminal") == "1") {
                $("#terminal .toggle").click();
            }

            $("#terminal .fullscreen").click(function() {
                var element = $("#terminal #prompt")[0];

                if (element.requestFullscreen) {
                    element.requestFullscreen();

                    setTimeout(function() {
                        $("#prompt pre").height($(window).height() - $("#prompt input.command").height() - 20);
                        $("#prompt input.command").focus();
                    }, 500);
                }
            });

            $(window).on("fullscreenchange", function() {
                if (document.fullscreenElement == null) {
                    $("#terminal #prompt pre").css("height", "");
                    $(window).resize();
                }
            });

            $(".dark-mode-button input").change(function() {
                if ($(this).prop("checked") == true) {
                    $("body").addClass("dark-mode");
                    editor.setOption("theme", "monokai");

                    setCookie("dark_mode", "1", 30 * 86400);
                } else {
                    $("body").removeClass("dark-mode");
                    editor.setOption("theme", "default");

                    setCookie("dark_mode", "0", 30 * 86400 * -1);
                }
            });

            if (getCookie("dark_mode") == "1") {
                $(".dark-mode-button input").click();
            }

            $(".help-button").click(function() {
                $("#helpModal").modal("show");
            });

            $('#search .search-input').on('keyup', function() {
                var value = $(this).val();

                if (value.length > 0) {
                    $('#search .search-clear').show();
                    $('#files > div .jstree-children > li').hide();

                    $('#files > div .jstree-children > li > a').each(function() {
                        let regex = new RegExp(value, 'i');

                        if (regex.test($(this).text())) {
                            $(this).parent().show();
                        }
                    });

                    $('#files > div .jstree-children > li > ul').each(function() {
                        $(this).find('> li').each(function() {
                            if ($(this).css('display') != 'none') {
                                let _this = $(this);

                                while (_this.closest('ul.jstree-children').parent().length > 0) {
                                    _this.closest('ul.jstree-children').parent().show();
                                    _this = _this.closest('ul.jstree-children').parent();
                                }
                            }
                        });
                    });
                } else {
                    $('#search .search-clear').hide();
                    $('#files > div .jstree-children > li').show();
                }
            });

            $('#search .search-clear').on('click', function() {
                $('#search .search-input').val('').trigger('keyup');
            });
        });
    </script>
</head>

<body>
    <?php if (PASSWORD == hash('sha512', 'admin')) : ?>
        <div class="heading-alert alert alert-warning"><i class="fa fa-info-circle"></i><span class="ml-2">You are using Pheditor with default password. Please click <a href="javascript:void(0);" class="change-password">here</a> to change password after installation.</span></div>
    <?php endif; ?>

    <div class="container-fluid">

        <div class="row p-3">
            <div class="col-md-3">
                <h1><a href="http://github.com/pheditor/pheditor" target="_blank" title="Pheditor <?= VERSION ?>">Pheditor</a></h1>
            </div>
            <div class="col-md-9">
                <div class="float-left">
                    <div class="dropdown float-left">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="fileMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">File</button>
                        <div class="dropdown-menu" aria-labelledby="fileMenu">
                            <?php if (in_array('newfile', $permissions)) { ?>
                                <a class="dropdown-item new-file" href="javascript:void(0);">New File <span class="float-right text-secondary">N</span></a>
                            <?php } ?>

                            <?php if (in_array('newdir', $permissions)) { ?>
                                <a class="dropdown-item new-dir" href="javascript:void(0);">New Directory</a>
                            <?php } ?>

                            <?php if (in_array('uploadfile', $permissions)) { ?>
                                <a class="dropdown-item upload-file" href="javascript:void(0);">Upload File <span class="float-right text-secondary">U</span></a>
                            <?php } ?>

                            <?php if (in_array('newfile', $permissions) || in_array('newdir', $permissions)) { ?>
                                <div class="dropdown-divider"></div>
                            <?php } ?>

                            <?php if (in_array('newfile', $permissions) || in_array('editfile', $permissions)) { ?>
                                <a class="dropdown-item save disabled" href="javascript:void(0);">Save <span class="float-right text-secondary">S</span></a>
                            <?php } ?>

                            <?php if (in_array('deletefile', $permissions) || in_array('deletedir', $permissions)) { ?>
                                <a class="dropdown-item delete disabled" href="javascript:void(0);">Delete <span class="float-right text-secondary">D</span></a>
                            <?php } ?>

                            <?php if (in_array('renamefile', $permissions) || in_array('renamedir', $permissions)) { ?>
                                <a class="dropdown-item rename disabled" href="javascript:void(0);">Rename <span class="float-right text-secondary">R</span></a>
                            <?php } ?>

                            <a class="dropdown-item reopen disabled" href="javascript:void(0);">Re-open <span class="float-right text-secondary">O</span></a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item close disabled" href="javascript:void(0);">Close <span class="float-right text-secondary">C</span></a>
                        </div>
                    </div>
                    <span id="path" class="btn float-left"></span>
                </div>

                <div class="float-right">
                    <button type="button" class="btn btn-sm btn-light help-button"><i class="fa fa-question-circle"></i></button>

                    <div class="custom-control custom-switch dark-mode-button bg-light">
                        <input type="checkbox" class="custom-control-input" id="dark_mode">
                        <label class="custom-control-label" for="dark_mode"><i class="far fa-moon"></i></label>
                    </div>

                    <?php if (in_array('changepassword', $permissions)) { ?><a href="javascript:void(0);" class="change-password btn btn-sm btn-primary"><i class="fas fa-key"></i></a> &nbsp; <?php } ?><a href="<?= $_SERVER['SCRIPT_NAME'] ?>?logout=<?= $_SESSION['pheditor_token'] ?>" class="btn btn-sm btn-danger"><i class="fas fa-sign-out-alt"></i></a>
                </div>
            </div>
        </div>

        <div class="row px-3">
            <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                <div id="search">
                    <i class="fas fa-times search-clear" style="display: none;"></i>
                    <input type="text" value="" class="form-control mb-3 search-input" placeholder="Search&hellip;" autocomplete="off">
                </div>
                <div id="files" class="card">
                    <div class="card-block"></div>
                </div>
            </div>

            <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                <div class="card">
                    <div class="card-block">
                        <div id="loading">
                            <div class="lds-ring">
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                            </div>
                        </div>
                        <textarea id="editor" data-file="" class="form-control"></textarea>
                        <input id="digest" type="hidden" readonly>
                    </div>
                </div>
            </div>

            <?php if (in_array('terminal', $permissions) !== false) : ?>
                <div class="col-12">
                    <div class="card">
                        <div class="card-block">
                            <div id="terminal">
                                <div>
                                    <button type="button" class="btn btn-light float-right ml-1 clear" style="display: none;">Clear</button>
                                    <button type="button" class="btn btn-light float-right ml-1 copy" style="display: none;">Copy to clipboard</button>
                                    <button type="button" class="btn btn-light float-right ml-1 fullscreen" style="display: none;">Full Screen</button>
                                    <span class="toggle collapsed" data-toggle="collapse" data-target="#prompt"><i class="fa"></i> Terminal</span>
                                    <div style="clear:both"></div>
                                </div>
                                <div id="prompt" class="collapse">
                                    <pre></pre>
                                    <input name="command" type="text" value="" class="command" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

        </div>

    </div>

    <form method="post">
        <input name="action" type="hidden" value="upload-file">
        <input name="token" type="hidden" value="<?= $_SESSION['pheditor_token'] ?>">
        <input name="destination" type="hidden" value="">

        <div class="modal fade" id="uploadFileModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Upload File</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <input name="uploadfile[]" type="file" value="" multiple>
                        </div>
                        <?php

                        if (function_exists('ini_get')) {
                            $sizes = [
                                ini_get('post_max_size'),
                                ini_get('upload_max_filesize')
                            ];

                            $max_size = max($sizes);

                            echo '<small class="text-muted">Maximum file size: ' . $max_size . '</small>';
                        }

                        ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Upload</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="modal fade" id="helpModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Keyboard Shortcuts</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <?php

                        $keyboard_shortcuts = [
                            ['New File', ['Ctrl', 'Alt / &#8997;', 'N']],
                            ['Save File', ['Ctrl', 'Alt / &#8997;', 'S']],
                            ['Find', ['Ctrl / &#8984;', 'F']],
                            ['Find next', ['Ctrl / &#8984;', 'G']],
                            ['Find previous', ['Ctrl / &#8984;', 'Shift', 'G']],
                            ['Replace', ['Ctrl / &#8984;', 'Shift', 'F']],
                            ['Replace all', ['Ctrl / &#8984;', 'Shift', 'R']],
                            ['Persistent search', ['Alt / &#8997;', 'F']],
                            ['Go to line', ['Alt / &#8997;', 'G']],
                            ['Toggle Terminal', ['Ctrl', 'Alt / &#8997;', 'L']],
                            ['Terminal history', ['Up', 'Down']],
                            ['Open file menu', ['Esc (x2)']],
                            ['Switch between file manager and editor', ['Esc']],
                        ];

                        foreach ($keyboard_shortcuts as $value) :

                        ?>
                            <div class="col-12 col-sm-6 mb-1">
                                <div class="row">
                                    <div class="col-6 text-right"><kbd><?= implode('</kbd> <kbd>', $value[1]) ?></kbd></div>
                                    <div class="col-6"><?= $value[0] ?></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>