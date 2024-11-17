<?php
if (file_exists('config.php')) {
    // In the case of root folder calls
    require_once('config.php');
} elseif (file_exists('../config.php')) {
    // In the case of subfolders
    require_once('../config.php');
} elseif (file_exists('../../config.php')) {
    // In the case of plugins
    require_once('../../config.php');
} else {
    header('Location: index.php');
}

require_once(ABSPATH . 'odm-init.php');
