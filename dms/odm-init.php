<?php
require __DIR__ . '/vendor/autoload.php';

/**
 * Set up the various view objects needed
 * and add the templates/layouts
 */
$factory = new \Aura\Html\HelperLocatorFactory;
$helpers = $factory->newInstance();
$view_factory = new \Aura\View\ViewFactory;
$view = $view_factory->newInstance($helpers);
$view_registry = $view->getViewRegistry();
$view_registry->set('access_log',  __DIR__ . '/templates/views/access_log.php');

$layout_registry = $view->getLayoutRegistry();
$layout_registry->set('default', __DIR__ . '/templates/layouts/default.php');

/*
 * Connect to Database
 */

$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8";
debug($dsn);
try {
    $pdo = new PDO($dsn, DB_USER, DB_PASS);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
$GLOBALS['pdo'] = $pdo;
debug("Got Connection");
ob_start();
include('includes/FirePHPCore/fb.php');

/*
/*
 * Load the Settings class
 */
require_once('Settings_class.php');
$settings = new Settings($pdo);
$settings->load();

/*
 * Common functions
 */
require_once('functions.php');

/*
 * Load the allowed file types list
 */
require_once('FileTypes_class.php');
$filetypes = new FileTypes_class($pdo);
$filetypes->load();

// Set the revision directory. (relative to $dataDir)
$CONFIG['revisionDir'] = $GLOBALS['CONFIG']['dataDir'] . 'revisionDir/';

// Set the revision directory. (relative to $dataDir)
$CONFIG['archiveDir'] = $GLOBALS['CONFIG']['dataDir'] . 'archiveDir/';

$_GET = sanitizeme($_GET);
$_REQUEST = sanitizeme($_REQUEST);
$_POST = sanitizeme($_POST);
$_SERVER = sanitizeme($_SERVER);
$_FILES = sanitizeme($_FILES);
