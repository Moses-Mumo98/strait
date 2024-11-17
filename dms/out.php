<?php
use Aura\Html\Escaper as e;
session_start();
$GLOBALS['state'] = 1;
require_once 'odm-load.php';
debug("========== out.php =====================");
if (!isset($_SESSION['uid'])) {
    redirect_visitor();
}

$last_message = isset($_REQUEST['last_message']) ? $_REQUEST['last_message'] : '';
debug("Last Message ".$last_message);

debug("Draw Header with ".msg('label_file_listing')." Message being ".$last_message);
draw_header(msg('label_file_listing'), $last_message);
debug("After draw_header");
sort_browser();
debug("After sort_browser");

$user_obj = new User($_SESSION['uid'], $pdo);
#debug("User Json ".json_encode($user_obj));
if ($user_obj->isAdmin()) {
    $reviewIdCount = sizeof($user_obj->getAllRevieweeIds());
} elseif ($user_obj->isReviewer()) {
    $reviewIdCount = sizeof($user_obj->getRevieweeIds());
} else {
    $reviewIdCount = 0;
}
    
if ($reviewIdCount > 0) {
    echo '<img src="images/exclamation.gif" /> <a href="toBePublished.php?state=1">'.msg('message_documents_waiting'). '</a>: ' . e::h($reviewIdCount)  . '</a><br />';
}

$rejected_files_obj = $user_obj->getRejectedFileIds();

if (isset($rejected_files_obj[0]) && $rejected_files_obj[0] != null) {
    echo '<img src="images/exclamation_red.gif" /> <a href="rejects.php?state=1">'. msg('message_documents_rejected') . '</a>: ' .sizeof($rejected_files_obj) . '<br />';
}

$llen = $user_obj->getNumExpiredFiles();
if ($llen > 0) {
    echo '<img src="images/exclamation_red.gif"><a href="javascript:window.location=\'search.php?submit=submit&sort_by=id&where=author_locked_files&sort_order=asc&keyword=-1&exact_phrase=on\'">' .msg('message_documents_expired'). ': ' . e::h($llen) . '</a><br />';
}
// get a list of documents the user has "view" permission for
// get current user's information-->department



//set values
$user_perms = new UserPermission($_SESSION['uid'], $pdo);
//$start_P = getmicrotime();
$file_id_array = $user_perms->getViewableFileIds(true);
//$end_P = getmicrotime();


list_files($file_id_array, $user_perms, $GLOBALS['CONFIG']['dataDir'], false);

draw_footer();
//Fb::log('<br> <b> Load Page Time: ' . (getmicrotime() - $start_time) . ' </b>');
//echo '<br> <b> Load Permission Time: ' . ($end_P - $start_P) . ' </b>';	
//echo '<br> <b> Load Sort Time: ' . ($lsort_e - $lsort_b) . ' </b>';	
//echo '<br> <b> Load Table Time: ' . ($llist_e - $llist_b) . ' </b>';	
