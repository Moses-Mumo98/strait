<?php
header('Access-Control-Allow-Origin: *');
ini_set('display_errors',1);
//error_reporting(E_ALL);
session_start();
include 'func.php';
include 'upload.php';
$GLOBALS['URL'] = $_SERVER['REMOTE_ADDR'];
$request = $_POST['request'];
debug("Received Request " . $request . " And IP " . $GLOBALS['URL'], "API");

switch ($request) {
	
	case 1:
		// Register($_POST['c_name'],$_POST['u_name'],$_POST['u_email'],$_POST['u_password']);
		Register($_POST['c_name'],$_POST['u_email'],$_POST['u_name'],$_POST['l_name'],$_POST['p_name'],$_POST['u_password'],$_FILES['user_image']['name']);
	break;
	
	case 2:
		login($_POST['uname'],$_POST['password']);
	break;

	case 3:
		getDashData();
	break;
	
	case 4:
		getMyProjects();
	break;
	
	case 5:
		getProjectStatus();
	break;
	
	case 6:
		getCompanyUsers($_POST['company_id']);
	break;
	
	case 7:
		saveProject();
	break;
	
	case 8:
		getUserStatus();
	break;
	
	case 9:
		getUserLevels();
	break;
	
	case 10:
		saveNewUser();
	break;
	
	case 11:
		getCompanyProjects($_POST['company_id']);
	break;
	
	case 12:
		getProjectTask($_POST['project_name']);
	break;
	
	case 13:
		SaveHours();
	break;
	
	case 14:
		getprojectUsers($_POST['project_name']);
	break;
	
	case 15:
		getUserTasks($_POST['project_name'],$_POST['user'],$_POST['task_id']);
	break;
	
	case 16:
		saveTask();
	break;
	
	case 17:
		getTaskUser($_POST['task_id']);
	break;
	
	
	case 18:
		resetPassword($_POST['user_email']);
	break;
	
	case 19:
		getUserLatest($_POST['user_id']);
	break;
	
	case 20:
		getTaskInfo($_POST['user_id'],$_POST['task_id']);
	break;
	
	case 21:
		updateTask();
	break;
	
	case 22:
		getOrgTypes();
	break;
	
	case 23:
		ListBranches();
	break;
	
	case 24:
		saveBranch();
	break;
	
	case 25:
		listDepartments();
	break;
	
	case 26:
		saveDepartment();
	break;
	
	case 27:
		getDepartmentProjects($_POST['dep_name']);
	break;
	
	case 28:
		getProjectTasks();
	break;
	
	case 29:
		saveSubTask();
	break;
	
	case 30:
		getSubTask();
	break;
	
	case 31:
		getSubTasksLogs();
	break;
	
	case 32:
		logPASA();
	break;
	
	case 33:
		invoiceDetails();
	break;
	
	case 34:
		ListFloatAccounts($_POST['company_id']);
	break;
	
	case 35:
		listCompanyUsersForFloat($_POST['company_id']);
	break;
	
	case 36:
		saveAccount();
	break;
	
	case 37:
		getPaymentsTypes($_POST['type']);
	break;
	
	case 38:
		saveTopup();
	break;
	
	case 39:
		AccountTransactions($_POST['company_id']);
	break;
	
	case 40:
		getStaffThroughPut();
	break;
	
	case 41:
		getClientInvoices();
	break;
	
	case 42:
		getProfile($_POST['user_id']);
	break;

	case 43:
		usersetting($_POST['user_id']);
	break;
    
	case 44:
		upload($_POST['user_image']);
    break;

	case 45:
		getPic($_POST['user_id']);

	break;
	case 46:
		updatePic($_FILES['user_image'],$_POST['user_id']);

	break;

	case 47:
		updateBranch($_POST['branch_id']);
		break;

	case 48:
		updateDepartment($_POST['company_id']);
	break;
	

    default:
        echo "Get Out Of Here";
    break;
}


function getPic($user_id){
	$conn = connect("timetracker1");
	$typehere = "getPic";
	debug("=================================================",$typehere);
	$user_image = $_POST['user_image'];
	$user_id = $_POST['user_id'];

	$strSQL = "SELECT user_image FROM tbl_users where user_id = '$user_id'";
	debug($strSQL, $typehere);
    $objQuery = mysqli_query($conn,$strSQL);
    $intNumField = mysqli_num_fields($objQuery);
    $resultArray = array();
    while ($obResult = mysqli_fetch_array($objQuery)) {
		
        $arrCol = array();
        for ($i = 0; $i < $intNumField; $i ++) {
              $arrCol[mysqli_fetch_field_direct($objQuery, $i)->name] = "127.0.0.1/straitLegal/API/uploads/". $obResult[$i];
        }
		
		try {
			array_push($resultArray, $arrCol);
		} catch (Exception $e) {
			debug("Error Reporting ".$e->getMessage(),$typehere);
		}
		
    }
	
	debug("Response".json_encode(array("pic" => $resultArray)),$typehere);
    echo json_encode(array("pic" => $resultArray));
    closer($conn);
	debug("=================================================",$typehere);
	

}

function updatePic($user_image,$user_id){
	$conn = connect("timetracker1");
	$typehere = "upload";
	debug("=================================================",$typehere);
	$valid_extensions = array('jpeg','jpg','png'); // valid extensions
      $path = './uploads/'; // upload directory
      if(!empty($_FILES['user_image']))
      {

      $img = $_FILES['user_image']['name'];
      $tmp = $_FILES['user_image']['tmp_name'];
      // get uploaded file's extension
      $ext = strtolower(pathinfo($img,PATHINFO_EXTENSION));
      // can upload same image using rand function
      $user_image = rand(1000,1000000).$img;
      // check's valid format
      if(in_array($ext,$valid_extensions)) 
      { 
      $path = $path.strtolower($user_image); 
      if(move_uploaded_file($tmp,$path)) 
      {  
	 $strSQL = "UPDATE tbl_users set user_image ='$user_image' where user_id = '$user_id'";

	 debug($strSQL, $typehere);
	 execute_($strSQL,$conn);
	  }
	  }
     }
	 
      //debug($strSQL, $typehere);
	//   execute_($strSQL,$conn);

	  //$roww = execute_($strSQL,$conn);
	  $result = array();
	  array_push($result,array("user_image" => $user_image));
	  debug("Upload Response".json_encode(array("update" => $result)),$typehere);
	  echo json_encode(array("update" => $result));
	  closer($conn);
	  debug("=================================================",$typehere);

}

function usersetting($user_id){
	$user_email = $_POST['user_email'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$user_phone = $_POST['user_phone'];
	
	
    $typehere = "usersetting";
    debug("===========================================", $typehere);
    $conn = connect("timetracker1");	
	
	if($user_id == ""){
		debug("userSetting",$typehere);
		$checker2 = "SELECT user_email,user_id,first_name,last_name,user_phone FROM tbl_users where user_id = '$user_id'";
		debug($checker2, $typehere);
		$q = execute_($checker2,$conn);
		$n = num($q);
		$result = array();
		while ($f = fetch($q)) {
			$user_id = $f['user_id'];
			
		}
		
		debug("User ID " . $user_id, $typehere);
		if ($user_id > 0) {
			debug($first_name . " already exists", $progresssscdtypehere);
			array_push($result, array("bool_code" => false,"message" => $first_name . " already exists"));
			echo json_encode(array("setting" => $result));
			return;
		}
		
		$sql = "INSERT INTO tbl_users(user_email, first_name, last_name, user_phone,user_password) 
		VALUES ('$user_email','$first_name','$last_name','$user_phone','$user_password')";
		debug($sql, $typehere);
		$roww = execute_($sql,$conn);
		$num = affected($conn);
		debug("Inserted " . $num." User Records", $typehere);
		if ($num > 0) {			
			array_push($result, array("bool_code" => true,"message" => $first_name . " Successfully Added"));
		} else {
			array_push($result, array("bool_code" => false,"message" => "Operation Failed, Try Again Later!!"));
		}
		echo json_encode(array("setting" => $result));
	}else{
		debug("Update Details For ".$user_id,$typehere);
		$sql = "UPDATE tbl_users set user_email='$user_email',first_name='$first_name',last_name ='$last_name', 
		user_phone='$user_phone' where user_id = '$user_id'";
		debug($sql, $typehere);
		$roww = execute_($sql,$conn);
		$num = affected($conn);
		debug("Updated " . $num." user Records", $typehere);
		$result = array();
		if ($num > 0) {
			array_push($result, array("bool_code" => true,"message" => $user_email . "Details Successfully Updated"));
		} else {
			array_push($result, array("bool_code" => false,"message" => "Failed to Update Details"));
		}
		echo json_encode(array("setting" => $result));
	}
    closer($conn);
	debug("=================================================",$typehere);
	
	
}


function getProfile($user_id){
	$conn = connect("timetracker1");
	$typehere = "getProfile";
	debug("=================================================",$typehere);
	$user_email = $_POST['user_email'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$user_phone = $_POST['user_phone'];
	$user_password = $_POST['user_password'];
	$user_image = $_POST['user_image'];
	$user_id = $_POST['user_id'];

	$strSQL = "SELECT user_email,first_name,last_name,user_phone,user_password,user_image FROM tbl_users where user_id = '$user_id'";
	debug($strSQL, $typehere);
    $objQuery = mysqli_query($conn,$strSQL);
    $intNumField = mysqli_num_fields($objQuery);
    $resultArray = array();
    while ($obResult = mysqli_fetch_array($objQuery)) {
        $arrCol = array();
        for ($i = 0; $i < $intNumField; $i ++) {
             $arrCol[mysqli_fetch_field_direct($objQuery, $i)->name] = $obResult[$i];
        }
		
		try {
			array_push($resultArray, $arrCol);
		} catch (Exception $e) {
			debug("Error Reporting ".$e->getMessage(),$typehere);
		}
    }
	debug("Response ".json_encode(array("profile" => $resultArray)),$typehere);
    echo json_encode(array("profile" => $resultArray));
    closer($conn);
	debug("=================================================",$typehere);
	

}

function getClientInvoices(){
	$conn = connect("timetracker1");
    $typehere = "getClientInvoices";
	debug("=================================================",$typehere);
	
	$company_users = $_POST['company_users'];
	$startDate = $_POST['startDate'];
	$endDate = $_POST['endDate'];
	
	$startDate = date("Y-m-d", strtotime($startDate));
	$endDate = date("Y-m-d", strtotime($endDate));
	
	$getUserID = "SELECT * from tbl_users where user_email = '$company_users'";
	debug($getUserID,$typehere);
	$q = execute_($getUserID,$conn);
	$f = fetch($q);
	$client_id = $f['user_id'];
	
	$strSQL = "SELECT c.sub_id,c.user_id,u.user_email,u.first_name,p.project_name,t.task_name,s.sub_name,c.counter_date,
	SUM(c.minutes) AS minutes,s.sub_progress,cycle,chargable,fee,q.first_name as client_name FROM task_counter c LEFT JOIN 
	sub_tasks s ON c.sub_id = c.sub_id LEFT JOIN tbl_tasks t ON t.task_id = s.task_id LEFT JOIN tbl_projects p ON 
	p.project_id = t.project_id LEFT JOIN tbl_users u ON u.user_id = c.user_id LEFT JOIN tbl_users q on q.user_id = p.client_id
	 WHERE p.client_id = '$client_id' and counter_date between '$startDate' and '$endDate' GROUP BY p.project_id";
		
    debug($strSQL, $typehere);
    $objQuery = mysqli_query($conn,$strSQL);
    $intNumField = mysqli_num_fields($objQuery);
    $resultArray = array();
    while ($obResult = mysqli_fetch_array($objQuery)) {
        $arrCol = array();
		$cycle = $obResult['cycle'];
		$fee = $obResult['fee'];
		$minutes = $obResult['minutes'];
		$subtotal = 0;
		$desc = '';
		debug("cycle ".$cycle." @ ".$fee." Worked ".$minutes,$typehere);
		if($cycle == 1){
			$subtotal = $fee;
			$desc = 'One Off';
		}else if($cycle == 2){
			$hours = floor($minutes / 3600);
			$subtotal = $hours * $fee;
			$desc = 'Hourly';
		}else if($cycle == 3){
			$days = floor($minutes / (3600*24));
			$subtotal = $days * $fee;
			$desc = 'Daily';
		}
		
		$arrCol["subtotal"] = $subtotal;
		$arrCol["desc"] = $desc;
        for ($i = 0; $i < $intNumField; $i ++) {
             $arrCol[mysqli_fetch_field_direct($objQuery, $i)->name] = $obResult[$i];
        }
		
		try {
			array_push($resultArray, $arrCol);
		} catch (Exception $e) {
			debug("Error Reporting ".$e->getMessage(),$typehere);
		}
    }
	debug("Response ".json_encode(array("logs" => $resultArray)),$typehere);
    echo json_encode(array("logs" => $resultArray));
    closer($conn);
	debug("=================================================",$typehere);
}

function getStaffThroughPut(){
	$conn = connect("timetracker1");
    $typehere = "getStaffThroughPut";
	debug("=================================================",$typehere);
	
	$company_users = $_POST['company_users'];
	$startDate = $_POST['startDate'];
	$endDate = $_POST['endDate'];
	
	$startDate = date("Y-m-d", strtotime($startDate));
	$endDate = date("Y-m-d", strtotime($endDate));
	
	$getUserID = "SELECT * from tbl_users where user_email = '$company_users'";
	debug($getUserID,$typehere);
	$q = execute_($getUserID,$conn);
	$f = fetch($q);
	$user_id = $f['user_id'];

	$strSQL = "SELECT c.sub_id,c.user_id,u.user_email,u.first_name,p.project_name,t.task_name,s.sub_name,c.counter_date,SUM(c.minutes)
	 AS minutes,s.sub_progress,chargable,fee,q.first_name as client_name FROM task_counter c LEFT JOIN sub_tasks s ON c.sub_id = c.sub_id
	  LEFT JOIN tbl_tasks t ON t.task_id = s.task_id LEFT JOIN tbl_projects p ON p.project_id = t.project_id LEFT JOIN tbl_users u ON u.user_id = c.user_id
	   LEFT JOIN tbl_users q ON q.user_id = p.client_id WHERE c.user_id = '$user_id' and counter_date between '$startDate' and '$endDate' GROUP BY p.project_id";
		
    debug($strSQL, $typehere);
    $objQuery = mysqli_query($conn,$strSQL);
    $intNumField = mysqli_num_fields($objQuery);
    $resultArray = array();
    while ($obResult = mysqli_fetch_array($objQuery)) {
        $arrCol = array();
		
        for ($i = 0; $i < $intNumField; $i ++) {
             $arrCol[mysqli_fetch_field_direct($objQuery, $i)->name] = $obResult[$i];
        }
		
		try {
			array_push($resultArray, $arrCol);
		} catch (Exception $e) {
			debug("Error Reporting ".$e->getMessage(),$typehere);
		}
    }
	debug("Response ".json_encode(array("logs" => $resultArray)),$typehere);
    echo json_encode(array("logs" => $resultArray));
    closer($conn);
	debug("=================================================",$typehere);
}

function AccountTransactions($company){
	$conn = connect("timetracker1");
    $typehere = "AccountTransactions";
	debug("=================================================",$typehere);
		
	$startDate = $_POST['startDate'];
	$endDate = $_POST['endDate'];
	

	$startDate = date("Y-m-d", strtotime($startDate));
	$endDate = date("Y-m-d", strtotime($endDate));
	

	$fl_acc_id =$_POST['fl_acc_id'];
	if($fl_acc_id == ""  ){
		$strSQL = "SELECT f.fl_acc_id,f.fl_acc_name,t.type_name,p.method_desc,a.fl_prev_amtkes,a.fl_amt_kes,a.fl_balancekes,
		CONCAT(a.fl_trans_date,' ',a.fl_trans_time) AS trans_date,g.first_name FROM float_transactions a
		LEFT JOIN fl_trans_types t ON t.type_id = a.fl_trans_type
		LEFT JOIN fl_payment_method p ON p.method_id = a.fl_payment_method
		LEFT JOIN float_accounts f ON f.fl_acc_id = a.fl_acc_id
		LEFT JOIN tbl_users u ON u.user_id = f.fl_acc_userid
		LEFT JOIN tbl_users g ON g.user_id = a.fl_userid where u.user_company = '$company' and fl_trans_date between 
		'$startDate' and '$endDate'
		ORDER BY fl_acc_id ASC,CONCAT(a.fl_trans_date,' ',a.fl_trans_time) ASC";
	}else{
		$strSQL = "SELECT f.fl_acc_id,f.fl_acc_name,t.type_name,p.method_desc,a.fl_prev_amtkes,a.fl_amt_kes,a.fl_balancekes,
		CONCAT(a.fl_trans_date,' ',a.fl_trans_time) AS trans_date,g.first_name FROM float_transactions a
		LEFT JOIN fl_trans_types t ON t.type_id = a.fl_trans_type
		LEFT JOIN fl_payment_method p ON p.method_id = a.fl_payment_method
		LEFT JOIN float_accounts f ON f.fl_acc_id = a.fl_acc_id
		LEFT JOIN tbl_users u ON u.user_id = f.fl_acc_userid
		LEFT JOIN tbl_users g ON g.user_id = a.fl_userid where f.fl_acc_id = '$fl_acc_id' and fl_trans_date between 
		'$startDate' and '$endDate'
		ORDER BY fl_acc_id ASC,CONCAT(a.fl_trans_date,' ',a.fl_trans_time) ASC";
	}
	debug($strSQL, $typehere);
    $objQuery = mysqli_query($conn,$strSQL);
    $intNumField = mysqli_num_fields($objQuery);
    $resultArray = array();
    while ($obResult = mysqli_fetch_array($objQuery)) {
        $arrCol = array();
        for ($i = 0; $i < $intNumField; $i ++) {
             $arrCol[mysqli_fetch_field_direct($objQuery, $i)->name] = $obResult[$i];
        }
		
		try {
			array_push($resultArray, $arrCol);
		} catch (Exception $e) {
			debug("Error Reporting ".$e->getMessage(),$typehere);
		}
    }
	debug("Response ".json_encode(array("trans" => $resultArray)),$typehere);
    echo json_encode(array("trans" => $resultArray));
    closer($conn);
	debug("=================================================",$typehere);
}

function saveTopup(){
    $fl_acc_id = $_POST['fl_acc_id'];
	$acc_bal = $_POST['acc_bal'];
	$t_amount = $_POST['t_amount'];
    $trans_ref = $_POST['trans_ref'];
    $payment_method = $_POST['payment_method'];
    $company_id = $_POST['company_id'];
    $user_id = $_POST['user_id'];
	
    $typehere = "saveTopup";
    debug("===========================================", $typehere);
    $conn = connect("timetracker1");

	debug("Save New Topup ",$typehere);
	$checker2 = "SELECT * from float_accounts where fl_acc_id = '$fl_acc_id'";
	debug($checker2, $typehere);
	$q = execute_($checker2,$conn);
	$f = fetch($q);
	$fl_acc_currentamtkes = $f['fl_acc_currentamtkes'];
	$new_bal = $fl_acc_currentamtkes + $t_amount;
	
	$transSaver = "INSERT INTO float_transactions(fl_acc_id, fl_trans_type,fl_trans_ref,fl_payment_method, fl_amt_kes, fl_trans_date, fl_trans_time, fl_userid, fl_prev_amtkes, fl_balancekes)
	VALUES ('$fl_acc_id','2','$trans_ref','$payment_method','$t_amount',CURRENT_DATE,CURRENT_TIME,'$user_id','$fl_acc_currentamtkes','$new_bal')";
	debug($transSaver, $typehere);
	execute_($transSaver,$conn);
	$num = affected($conn);
	debug("Inserted " . $num." Float Topup Records", $typehere);
	$result = array();
	if ($num > 0) {
		$updater = "UPDATE float_accounts set fl_acc_currentamtkes = '$new_bal',fl_acc_lasttopup = '$t_amount',fl_acc_lasttopupdate = NOW() where fl_acc_id = '$fl_acc_id'";
		debug($updater, $typehere);
		execute_($updater,$conn);
		array_push($result, array("bool_code" => true,"message" => "Client Account Topped Up Successfully"));
	} else {
		array_push($result, array("bool_code" => false,"message" => "Account topup failed"));
	}
	echo json_encode(array("accounttopup" => $result));
    closer($conn);
	debug("=================================================",$typehere);
}

function getPaymentsTypes($type){
	$conn = connect("timetracker1");
    $typehere = "getPaymentsTypes";
	debug("=================================================",$typehere);

	$strSQL = "SELECT * from fl_payment_method  where method_type = '$type' and method_id > 0";
		
    debug($strSQL, $typehere);
    $objQuery = mysqli_query($conn,$strSQL);
    $intNumField = mysqli_num_fields($objQuery);
    $resultArray = array();
    while ($obResult = mysqli_fetch_array($objQuery)) {
        $arrCol = array();
		
        for ($i = 0; $i < $intNumField; $i ++) {
             $arrCol[mysqli_fetch_field_direct($objQuery, $i)->name] = $obResult[$i];
        }
		
		try {
			array_push($resultArray, $arrCol);
		} catch (Exception $e) {
			debug("Error Reporting ".$e->getMessage(),$typehere);
		}
    }
	debug("Response ".json_encode(array("methods" => $resultArray)),$typehere);
    echo json_encode(array("methods" => $resultArray));
    closer($conn);
	debug("=================================================",$typehere);
}

function saveAccount(){
    $fl_acc_userid = $_POST['fl_acc_userid'];
	$acc_bal = $_POST['acc_bal'];
	$company_id = $_POST['company_id'];
    $user_id = $_POST['user_id'];
	
    $typehere = "saveAccount";
    debug("===========================================", $typehere);
    $conn = connect("timetracker1");
	debug("Got ACC ID as ".$acc_id,$typehere);

	if($acc_id == ""){
		debug("Save New Account ",$typehere);
		$checker2 = "SELECT * from float_accounts where fl_acc_userid = '$fl_acc_userid'";
		debug($checker2, $typehere);
		$q = execute_($checker2,$conn);
		$n = num($q);
		$fl_acc_id = 0;
		$result = array();
		while ($f = fetch($q)) {
			$fl_acc_id = $f['fl_acc_id'];
		}
		
		debug("Float Acc ID " . $fl_acc_id, $typehere);
		if ($fl_acc_id > 0) {
			debug($fl_acc_userid . " already exists", $typehere);
			array_push($result, array("bool_code" => false,"message" => "Account already exists"));
			echo json_encode(array("accountadd" => $result));
			return;
		}
		
		$sql = "INSERT INTO float_accounts(fl_acc_name, fl_acc_userid, fl_acc_currentamtkes, fl_created_on, fl_acc_createdby)
		VALUES ((SELECT first_name from tbl_users where user_id = '$fl_acc_userid'),'$fl_acc_userid','$acc_bal',NOW(),'$user_id')";
		debug($sql, $typehere);
		$roww = execute_($sql,$conn);
		$num = affected($conn);
		debug("Inserted " . $num." Float Account Records", $typehere);
		if ($num > 0) {
			$fl_acc_id = last_id($conn);
			if($acc_bal > 0){
				$transSaver = "INSERT INTO float_transactions(fl_acc_id, fl_trans_type,fl_payment_method,fl_trans_ref, fl_amt_kes, fl_trans_date, fl_trans_time, fl_userid, fl_prev_amtkes, fl_balancekes)
				VALUES ('$fl_acc_id','3','0','ACCOUNT CREATION','$acc_bal',CURRENT_DATE,CURRENT_TIME,'$user_id','0','$acc_bal')";
				debug($transSaver, $typehere);
				execute_($transSaver,$conn);
				
				$updater = "UPDATE float_accounts set fl_acc_lasttopup = '$acc_bal',fl_acc_lasttopupdate = NOW() where fl_acc_id = '$fl_acc_id'";
				debug($updater, $typehere);
				execute_($updater,$conn);
			}
			array_push($result, array("bool_code" => true,"message" => "Client Account Successfully Added"));
		} else {
			array_push($result, array("bool_code" => false,"message" => "Failed to Add Client Account"));
		}
		echo json_encode(array("accountadd" => $result));
	}else{
		debug("Update Details For ".$staff_id,$typehere);
		$sql = "UPDATE tbl_projects set modified_on = NOW(),project_name = '$p_name',project_desc = '$p_desc',department_id = '$department_id',status = '$status_no', start_date = '$startDate',end_date = '$endDate' where project_id = '$project_id'";
		debug($sql, $typehere);
		$roww = execute_($sql,$conn);
		$num = affected($conn);
		debug("Updated " . $num." Project Records", $typehere);
		$result = array();
		if ($num > 0) {
			array_push($result, array("bool_code" =>true,"message" => $p_name . " Details Successfully Updated"));
		} else {
			array_push($result, array("bool_code" =>false,"message" => "Failed to Update Staff Details"));
		}
		echo json_encode(array("projectadd" => $result));
	}
    closer($conn);
	debug("=================================================",$typehere);
}

function listCompanyUsersForFloat($company){
	$conn = connect("timetracker1");
    $typehere = "listCompanyUsersForFloat";
	$user_id = $_POST['user_id'];
	debug("=================================================",$typehere);
	
	$limit = $_POST['limit'];
	
	if($limit != ""){
		$adder = " and user_level = $limit ";
	}
	$strSQL = "SELECT s.*,l.*,t.*,td.dep_name,tb.branch_name FROM tbl_users s LEFT JOIN user_levels l ON l.level_id = s.user_level LEFT JOIN user_status t ON t.status_id = s.user_status left join tbl_departments td on td.dep_id = s.user_dep left join tbl_branches tb on tb.branch_id = s.user_branch where user_company = '$company' AND user_id NOT IN (select fl_acc_userid from float_accounts) $adder";
	debug($strSQL, $typehere);
    $objQuery = mysqli_query($conn,$strSQL);
    $intNumField = mysqli_num_fields($objQuery);
    $resultArray = array();
    while ($obResult = mysqli_fetch_array($objQuery)) {
        $arrCol = array();
        for ($i = 0; $i < $intNumField; $i ++) {
             $arrCol[mysqli_fetch_field_direct($objQuery, $i)->name] = $obResult[$i];
        }
		
		try {
			array_push($resultArray, $arrCol);
		} catch (Exception $e) {
			debug("Error Reporting ".$e->getMessage(),$typehere);
		}
    }
	debug("Response ".json_encode(array("users" => $resultArray)),$typehere);
    echo json_encode(array("users" => $resultArray));
    closer($conn);
	debug("=================================================",$typehere);
}

function ListFloatAccounts($company){
	$conn = connect("timetracker1");
    $typehere = "ListFloatAccounts";
	debug("=================================================",$typehere);
	$fl_acc_id = $_POST['fl_acc_id'];
	if($fl_acc_id == "")$strSQL = "SELECT a.fl_acc_id,u.first_name,a.fl_acc_currentamtkes,a.fl_acc_lasttopup,a.fl_acc_lasttopupdate,fl_created_on FROM float_accounts a LEFT JOIN tbl_users u ON u.user_id = a.fl_acc_userid WHERE u.user_company = '$company' AND u.user_level = '1' and fl_acc_status = 1";
	else $strSQL = "SELECT a.fl_acc_id,u.first_name,a.fl_acc_currentamtkes,a.fl_acc_lasttopup,a.fl_acc_lasttopupdate,fl_created_on FROM float_accounts a LEFT JOIN tbl_users u ON u.user_id = a.fl_acc_userid WHERE fl_acc_id = '$fl_acc_id'";
    debug($strSQL, $typehere);
    $objQuery = mysqli_query($conn,$strSQL);
    $intNumField = mysqli_num_fields($objQuery);
    $resultArray = array();
    while ($obResult = mysqli_fetch_array($objQuery)) {
        $arrCol = array();
        for ($i = 0; $i < $intNumField; $i ++) {
             $arrCol[mysqli_fetch_field_direct($objQuery, $i)->name] = $obResult[$i];
        }
		
		try {
			array_push($resultArray, $arrCol);
		} catch (Exception $e) {
			debug("Error Reporting ".$e->getMessage(),$typehere);
		}
    }
	debug("Response ".json_encode(array("accounts" => $resultArray)),$typehere);
    echo json_encode(array("accounts" => $resultArray));
    closer($conn);
	debug("=================================================",$typehere);
}

function invoiceDetails(){
	$conn = connect("timetracker1");
    $typehere = "invoiceDetails";
	debug("=================================================",$typehere);
	
	$sub = $_POST['sub'];
	$user = $_POST['user'];
	
	$strSQL = "SELECT c.sub_id,c.user_id,u.user_email,u.first_name,p.project_name,t.task_name,s.sub_name,c.counter_date,SUM(c.minutes) AS minutes,s.sub_progress,chargable,fee,cycle FROM task_counter c 
	LEFT JOIN sub_tasks s ON s.sub_id = c.sub_id LEFT JOIN tbl_tasks t ON t.task_id = s.task_id LEFT JOIN tbl_projects p ON p.project_id = t.project_id 
	LEFT JOIN tbl_users u ON u.user_id = c.user_id WHERE c.sub_id = '$sub' and c.user_id = '$user'";
		
    debug($strSQL, $typehere);
    $objQuery = mysqli_query($conn,$strSQL);
    $intNumField = mysqli_num_fields($objQuery);
    $resultArray = array();
    while ($obResult = mysqli_fetch_array($objQuery)) {
        $arrCol = array();
		$cycle = $obResult['cycle'];
		$fee = $obResult['fee'];
		$minutes = $obResult['minutes'];
		$subtotal = 0;
		$desc = '';
		debug("cycle ".$cycle." @ ".$fee." Worked ".$minutes,$typehere);
		if($cycle == 1){
			$subtotal = $fee;
			$desc = 'One Off';
		}else if($cycle == 2){
			$hours = floor($minutes / 3600);
			$subtotal = $hours * $fee;
			$desc = 'Hourly';
		}else if($cycle == 3){
			$days = floor($minutes / (3600*24));
			$subtotal = $days * $fee;
			$desc = 'Daily';
		}
		
		$arrCol["subtotal"] = $subtotal;
		$arrCol["desc"] = $desc;
        for ($i = 0; $i < $intNumField; $i ++) {
             $arrCol[mysqli_fetch_field_direct($objQuery, $i)->name] = $obResult[$i];
        }
		
		try {
			array_push($resultArray, $arrCol);
		} catch (Exception $e) {
			debug("Error Reporting ".$e->getMessage(),$typehere);
		}
    }
	debug("Response ".json_encode(array("logs" => $resultArray)),$typehere);
    echo json_encode(array("logs" => $resultArray));
    closer($conn);
	debug("=================================================",$typehere);
}

function logPASA(){
    $event_id = $_POST['event_id'];
	$global_id = $_POST['global_id'];
	$action = $_POST['action'];
	$startTime = $_POST['start_time'];
	$endTime = $_POST['end_time'];
	
	$startTime = date("Y-m-d H:i:s", strtotime($startTime));
	$endTime = date("Y-m-d H:i:s", strtotime($endTime));
		
    $typehere = "logPASA";
    debug("===========================================", $typehere);
	debug(json_encode($_POST),$typehere);
    $conn = connect("timetracker1");

	$getTaskID = "SELECT * from sub_tasks where event_id = '$event_id'";
	debug($getTaskID,$typehere);
	$q = execute_($getTaskID,$conn);
	$f = fetch($q);
	$sub_id = $f['sub_id'];
	
	$getUserID = "SELECT * from tbl_users where global_id = '$global_id'";
	debug($getUserID,$typehere);
	$q = execute_($getUserID,$conn);
	$f = fetch($q);
	$user_id = $f['user_id'];
	
	if($action == "START"){
		$saver = "INSERT INTO task_counter(sub_id, user_id, counter_date,created,added_by,time_started,status) VALUES ('$sub_id','$user_id',CURRENT_DATE,NOW(),'$user_id','$startTime',0)";
	}else{
		//TIMESTAMPADD(SECOND,-$hours,NOW())
		$getSUB = "SELECT * FROM task_counter where sub_id = '$sub_id' and user_id = '$user_id' and status = 0";
		debug($getSUB,$typehere);
		$q = execute_($getSUB,$conn);
		$f = fetch($q);
		$id = $f['id'];
		
		if ($action == "END"){
			$saver = "UPDATE task_counter set time_ended = '$endTime', minutes = TIMESTAMPDIFF(SECOND,time_started,'$endTime'),modified=NOW(),status = 1 where id = '$id'";
		}else{
			$saver = "UPDATE task_counter set time_ended = '$endTime', minutes = TIMESTAMPDIFF(SECOND,time_started,'$endTime'),modified=NOW() where id = '$id'";
		}
	}
	debug($saver, $typehere);
	$roww = execute_($saver,$conn);
	$saved = affected($conn);

	debug("Inserted " . $saved." Hours Records", $typehere);
	$result = array();
	if($saved){
		$progress = $_POST['progress'];
		if($progress > 0){
			$updater = "UPDATE sub_tasks set sub_progress = '$progress' where sub_id = '$sub_id'";
			debug($updater, $typehere);
			execute_($updater,$conn);
		}
		array_push($result, array("bool_code" => true,"message" => "Successfully Logged"));
	} else {
		array_push($result, array("bool_code" => false,"message" => "Failed to Log Time"));
	}
	debug("Response ".json_encode(array("hoursadd" => $result)),$typehere);
	echo json_encode(array("hoursadd" => $result));
			closer($conn);
	debug("=================================================",$typehere);
}

function getSubTasksLogs(){
	$conn = connect("timetracker1");
    $typehere = "getSubTasksLogs";
	debug("=================================================",$typehere);
	$task_id = $_POST['task_id'];
	$company = $_POST['company_id'];
	$project = $_POST['project_name'];
	$task_name = $_POST['task_name'];
	$sub_id = $_POST['sub_id'];
	$user_id = $_POST['user_id'];
	
	$getProjectID = "SELECT * FROM tbl_projects s WHERE s.project_name = '$project' and company_id = '$company'";
	debug($getProjectID,$typehere);
	$a = execute_($getProjectID,$conn);
	$b = fetch($a);
	console.log($b);
	$project_id = $b['project_id'];
	debug("Project ID ".$project_id,$typehere);
	
	if(!is_numeric($task_name)){
		$getTaskID = "SELECT * from tbl_tasks s where s.project_id = '$project_id' and task_name = '$task_name'";
		debug($getTaskID,$typehere);
		$q = execute_($getTaskID,$conn);
		$f = fetch($q);
		$task_id = $f['task_id'];
		debug("Task ID ".$task_id,$typehere);
	}else{
		$task_id = $task_name;
	}
	debug("task_id ".$task_id,$typehere);
	
	if($user_id == ""){
	$strSQL = "SELECT c.sub_id,c.user_id,u.user_email,u.first_name,p.project_name,t.task_name,s.sub_name,
	c.counter_date,SUM(c.minutes) AS minutes,s.sub_progress,chargable,fee FROM task_counter c LEFT JOIN sub_tasks s 
	ON c.sub_id = c.sub_id LEFT JOIN tbl_tasks t ON t.task_id = s.task_id LEFT JOIN tbl_projects p ON
	 p.project_id = p.project_id LEFT JOIN tbl_users u ON u.user_id = c.user_id WHERE s.task_id = '$task_id'
	  GROUP BY counter_date,c.user_id,c.sub_id";
	}
	else{
	$strSQL = "SELECT c.sub_id,c.user_id,u.user_email,u.first_name,p.project_name,t.task_name,s.sub_name,
	c.counter_date,SUM(c.minutes) AS minutes,s.sub_progress,chargable,fee FROM task_counter c LEFT JOIN sub_tasks s 
	ON c.sub_id = c.sub_id LEFT JOIN tbl_tasks t ON t.task_id = s.task_id LEFT JOIN tbl_projects p ON 
	p.project_id = p.project_id LEFT JOIN tbl_users u ON u.user_id = c.user_id WHERE s.task_id = '$task_id' 
	and c.user_id = '$user_id' GROUP BY counter_date,c.sub_id";
	}	
	
    debug($strSQL,$typehere);
    $objQuery = mysqli_query($conn,$strSQL);
    $intNumField = mysqli_num_fields($objQuery);
    $resultArray = array();
    while ($obResult = mysqli_fetch_array($objQuery)) {
        $arrCol = array();
		
		
        for ($i = 0; $i < $intNumField; $i ++) {
             $arrCol[mysqli_fetch_field_direct($objQuery, $i)->name] = $obResult[$i];
        }
		
		try {
			array_push($resultArray, $arrCol);
		} catch (Exception $e) {
			debug("Error Reporting ".$e->getMessage(),$typehere);
		}
    }
	debug("Response".json_encode(array("logs" => $resultArray)),$typehere);
    echo json_encode(array("logs" => $resultArray));
    closer($conn);
	debug("=================================================",$typehere);
}

function getSubTask(){
	$conn = connect("timetracker1");
    $typehere = "getSubTask";
	debug("=================================================",$typehere);
	
	$company = $_POST['company_id'];
	$project = $_POST['project_name'];
	$task_name = $_POST['task_name'];
	$sub_id = $_POST['sub_id'];
	
	$getProjectID = "SELECT * FROM tbl_projects s WHERE s.project_name = '$project' and company_id = '$company'";
	debug($getProjectID,$typehere);
	$a = execute_($getProjectID,$conn);
	$b = fetch($a);
	$project_id = $b['project_id'];
	debug("Project ID ".$project_id,$typehere);
	
	if(!is_numeric($task_name)){
		$getTaskID = "SELECT * from tbl_tasks s where s.project_id = '$project_id' and task_name = '$task_name'";
		debug($getTaskID,$typehere);
		$q = execute_($getTaskID,$conn);
		$f = fetch($q);
		$task_id = $f['task_id'];
		debug("Task ID ".$task_id,$typehere);
	}else{
		$task_id = $task_name;
	}
	
	if($sub_id == "")
		$strSQL = "SELECT s.*,k.task_name,c.status_desc FROM sub_tasks s left join 
		tbl_tasks k on k.task_id = s.task_id left join status_code c on c.status_no = s.status WHERE s.task_id  = '$task_id'";
	else
		$strSQL = "SELECT s.*,k.task_name,c.status_desc FROM sub_tasks s left join 
		tbl_tasks k on k.task_id = s.task_id left join status_code c on c.status_no = s.status WHERE sub_id = '$sub_id'";
		
    debug($strSQL, $typehere);
    $objQuery = mysqli_query($conn,$strSQL);
    $intNumField = mysqli_num_fields($objQuery);
    $resultArray = array();
    while ($obResult = mysqli_fetch_array($objQuery)) {
        $arrCol = array();
		
		$sub_id = $obResult['sub_id'];
		
		$getHours = "SELECT SUM(minutes) AS hours FROM task_counter t where t.sub_id = '$sub_id' GROUP BY t.sub_id";
		debug($getHours, $typehere);
		$q = execute_($getHours,$conn);
		$f = fetch($q);
		$hours = $f['hours'];
		
		if($hours == "") $hours = 0;
		
		$getAssigned = "SELECT u.assigned_users from tbl_assigned_users u where sub_id = $sub_id";
		debug($getAssigned, $typehere);
		$q = execute_($getAssigned,$conn);
		$users = "";
		$f = fetch($q);
		$assigned_users = $f['assigned_users'];
		$getUsers = "SELECT * from tbl_users where user_id in ($assigned_users)";
		debug($getUsers, $typehere);
		$q = execute_($getUsers,$conn);
		while($f = fetch($q)){
			$users .= $f['first_name'].",";
		}
		debug("Users: ".$users,$typehere);
		
        for ($i = 0; $i < $intNumField; $i ++) {
             $arrCol[mysqli_fetch_field_direct($objQuery, $i)->name] = $obResult[$i];
        }
		
		$arrCol["hours"] = $hours;
		$arrCol["users"] = $users;
		
		try {
			array_push($resultArray, $arrCol);
		} catch (Exception $e) {
			debug("Error Reporting ".$e->getMessage(),$typehere);
		}
    }
	debug("Response ".json_encode(array("subtasks" => $resultArray)),$typehere);
    echo json_encode(array("subtasks" => $resultArray));
    closer($conn);
	debug("=================================================",$typehere);
}

function saveSubTask(){
	$typehere = "saveSubTask";
    debug("===========================================", $typehere);
    $conn = connect("timetracker1");
    $t_name = $_POST['t_name'];
	$t_desc = $_POST['t_desc'];
	$dep_name = $_POST['dep_name'];
	$project_name = $_POST['project_name'];
	$task_name = $_POST['task_name'];
	
	$company_users = $_POST['company_users'];
	$project_status = $_POST['project_status'];

	$task_progress = $_POST['task_progress'];

	$meeting = $_POST['meeting'];
	$t_dur = $_POST['t_dur'];
	
	$startDate = $_POST['startDate'];
    $startTime = $_POST['startTime'];
	debug("startTime 1 ".$startTime,$typehere);
	$company = $_POST['company_id'];
	$user = $_POST['user_id'];
	
	$startDate = date("Y-m-d", strtotime($startDate));
	$startTime = date("H:i:s", strtotime($startTime));
	debug("startTime 2 ".$startTime,$typehere);
	
	$company_users = $_POST['company_users'];
	$sub_id = $_POST['sub_id'];
	
	$getCompany = "SELECT * FROM tbl_company s WHERE s.company_id = '$company'";
	debug($getCompany,$typehere);
	$q = execute_($getCompany,$conn);
	$f = fetch($q);
	$company_name = $f['company_name'];
	
	debug("Got Company as ".$company_name,$typehere);
	debug("Got Dep Name as ".$dep_name,$typehere);
	debug("Got Project Name as ".$project_name,$typehere);
	debug("Got Task Name as ".$task_name,$typehere);
	debug("Got Chargable as ".$chargable." ;Fee is ".$t_fee,$typehere);
	
	
	$getLevel = "SELECT * FROM status_code s WHERE s.status_desc = '$project_status'";
	debug($getLevel,$typehere);
	$a = execute_($getLevel,$conn);
	$b = fetch($a);
	$status_no = $b['status_no'];
	
	$getProjectID = "SELECT * FROM tbl_projects s WHERE s.project_name = '$project_name' and company_id = '$company'";
	debug($getProjectID,$typehere);
	$a = execute_($getProjectID,$conn);
	$b = fetch($a);
	$project_id = $b['project_id'];
	debug("Project ID ".$project_id,$typehere);
	
	$getUserID = "SELECT * FROM tbl_tasks s WHERE s.task_name = '$task_name' and project_id = '$project_id'";
	debug($getUserID,$typehere);
	$a = execute_($getUserID,$conn);
	$b = fetch($a);
	$task_id = $b['task_id'];
	debug("Task ID ".$task_id,$typehere);
	
	if($sub_id == ""){
		debug("Save New Tasks ",$typehere);
		$checker2 = "SELECT * from sub_tasks where sub_name = '$t_name' and task_id = '$task_id'";
		debug($checker2, $typehere);
		$q = execute_($checker2,$conn);
		$n = num($q);
		$sub_id = 0;
		$result = array();
		while ($f = fetch($q)) {
			$sub_id = $f['sub_id'];
		}
		
		debug("Sub Task ID " . $sub_id, $typehere);
		if ($sub_id > 0) {
			debug($t_name . " already exists", $typehere);
			array_push($result, array("bool_code" => false,"message" => $t_name . " already exists"));
			echo json_encode(array("taskadd" => $result));
			return;
		}
		
		$sql = "INSERT INTO sub_tasks(sub_name, sub_desc, task_id,sub_progress, created_on, created_by, status, start_date, start_time,meeting,duration) VALUES ('$t_name','$t_desc','$task_id','$task_progress',NOW(),'$user','$status_no','$startDate','$startTime','$meeting','$t_dur')";
		debug($sql, $typehere);
		$roww = execute_($sql,$conn);
		$num = affected($conn);
		debug("Inserted " . $num." User Records", $typehere);
		if ($num > 0) {
			$sub_id = last_id($conn);
			debug("Inserted With SubTask ID: ".$sub_id,$typehere);
			
			$length = count($company_users);
			debug("Found ".$length." Users",$typehere);
			
			$ids = "";
			foreach($company_users as $user_email){
				debug("User Email: ".$user_email,$typehere);
				$getUserID = "SELECT * from tbl_users where user_email = '$user_email'";
				debug($getUserID,$typehere);
				$q = execute_($getUserID,$conn);
				$f = fetch($q);
				$ids .= $f['user_id'].',';
			}
			// else{
			// 	debug("Update Details For ".$sub_id,$typehere);
			// 	$sql = "UPDATE sub_tasks set sub_name = '$t_name',sub_desc ='$t_desc',task_id = '$task_id',sub_progress = '$task_progress',created_on = NOW(),created_by = '$user',status = '$status_no',start_time = '$startTime', meeting = '$meeting', duration = '$t_dur' where sub_id = '$sub_id'";
			// 	debug($sql, $typehere);
			// 	$roww = execute_($sql,$conn);
			// 	$num = affected($conn);
			// 	debug("Updated " . $num." Task Records", $typehere);
			// 	$result = array();
				
			// }


			debug("IDs 1 ".$ids,$typehere);
			
			if (strpos($ids, $user) == false) {
				debug("Add Creator",$typehere);
				$ids .= $user.',';
			}
			
			debug("IDs 2 ".$ids,$typehere);
			if(substr($ids, -1, 1) == ',') {
				$ids = substr($ids, 0, -1);
			}
			
			if($ids == ""){
				$ids = $user_id;
			}
			
			debug("User IDs: ".$ids,$typehere);
			
			$saver = "INSERT INTO tbl_assigned_users(sub_id, assigned_users) VALUES ('$sub_id','$ids')";
			debug($saver,$typehere);
			execute_($saver,$conn);
			
			$getGlobalID = "SELECT * from tbl_users u left join tbl_company s on s.company_id = u.user_company where user_id = '$user'";
			debug($getGlobalID,$typehere);
			$q = execute_($getGlobalID,$conn);
			$f = fetch($q);
			$global_id = $f['global_id'];
			$company_type = $f['company_type'];
			$myemail = $f['user_email'];
			$my_name = $f['first_name'];
			
			if($company_type == 'SCHOOL'){
				$event_type = 'SCHOOL LESSON';
				$event_category_id = 2;
			}else if($company_type == 'LAWFIRM'){
				$event_type = 'COURT CASE';
				$event_category_id = 3;
			}else{
				$event_type = 'COMPANY TASK';
				$event_category_id = 1;
			}
			debug("Using Event Type ".$event_type." ID ".$event_category_id,$typehere);
			if($meeting ==1){
				$conn2 = connect("pasa");
				$saver = "INSERT INTO gts_events(event_name,event_type,date,time,content,event_manager,timestamp,addedByUid,provider_id,event_category_id,status) VALUES ('$t_name','$event_type','$startDate','$startTime','$t_name',(select user_uid from gts_users where global_id = '$global_id'),NOW(),(select user_uid from gts_users where global_id = '$global_id'),'2','$event_category_id','Active')";
				debug($saver,$typehere);
				execute_($saver,$conn2);
				
				$event_id = last_id($conn2);
				debug("Event ID: ",$typehere);
				
				$type = 'POST_PAID';
				if($chargable == 1){
					$type = 'PRE_PAID'; 
				}
				
				$saver3 = "INSERT INTO gts_metadata (event_id,interested_count,peer_see_peers,host_see_peers,allow_chats,pay_type,event_duration_min,access_address)  VALUES ('$event_id','$length','0','0','1','$type','$t_dur','$event_id')";
				debug($saver3,$typehere);
				execute_($saver3,$conn2);
				
				$invite = '<html><body>';
				$invite .= '<h3>'.$my_name.' is inviting you to a scheduled PASA Meeting</h3>';
				$invite .= '<p>Topic: '.$t_name.'</p>';
				$invite .= '<p>Time: '.$startDate.' '.$startTime.'</p>';
				$invite .= '<p>Join PASA Meeting <a target="_blank" href="https://aps.co.ke/strait/API/openLink?id='.$event_id.'">PASALAB</a></p>';
				$invite .= '<p>Meeting ID: '.$event_id.'</p>';
				$invite .= '</body></html>';
				debug($invite,$typehere);
				
				$ids = "";
				foreach($company_users as $user_email){
					debug("User Email: ".$user_email,$typehere);
					$getUserID = "SELECT * from gts_users where user_email = '$user_email'";
					debug($getUserID,$typehere);
					$q = execute_($getUserID,$conn2);
					$f = fetch($q);
					push_mail($user_email, $invite,"PASA EVENTS","PASA EVENTS","kapslabnotify@kaps.co.ke");
					$ids .= $f['user_uid'].',';
				}
				
				debug("IDs 1 ".$ids,$typehere);
				
				$getMyUserID = "SELECT * FROM gts_users where global_id = '$global_id'";
				debug($getMyUserID,$typehere);
				$q = execute_($getMyUserID,$conn2);
				$f = fetch($q);
				$user = $f['user_uid'];
				
				if (strpos($ids, $user) == false) {
					debug("Add Creator",$typehere);
					$ids .= $user.',';
				}
				
				debug("IDs 2 ".$ids,$typehere);
				if(substr($ids, -1, 1) == ',') {
					$ids = substr($ids, 0, -1);
				}
				
				if($ids == ""){
					$ids = $user_id;
				}
				
				debug("User IDs: ".$ids,$typehere);
				
				$saver = "INSERT INTO gts_assigned_users(event_id, assigned_users) VALUES ('$event_id','$ids')";
				debug($saver,$typehere);
				execute_($saver,$conn2);
				
				
				$saver = "INSERT INTO gts_event_details (event_id,school_name,department_name,course_name,unit_name) values ('$event_id','$company_name','$dep_name','$project_name','$task_name')";
				debug($saver,$typehere);
				execute_($saver,$conn2);
				
				//send email
				push_mail($myemail, $invite,"NEW PASA EVENTS","PASA EVENTS","kapslabnotify@kaps.co.ke");
				
				$updater = "UPDATE sub_tasks s set s.event_id = '$event_id' where sub_id = '$sub_id'";
				debug($updater,$typehere);
				execute_($updater,$conn);
			}
			array_push($result, array("bool_code" => true,"message" => $t_name . " Successfully Added"));
		} else {
			array_push($result, array("bool_code" => false,"message" => "Failed to Add SubTask"));
		}
		echo json_encode(array("taskadd" => $result));
	}else{
		debug("Update Details For ".$task_id,$typehere);
		$sql = "UPDATE sub_tasks set sub_name = '$t_name',sub_desc ='$t_desc',task_id = '$task_id',sub_progress = '$task_progress',created_on = NOW(),created_by = '$user',status = '$status_no',start_time = '$startTime', meeting = '$meeting', duration = '$t_dur' where sub_id = '$sub_id'";
		debug($sql, $typehere);
		$roww = execute_($sql,$conn);
		$num = affected($conn);
		debug("Updated " . $num." Task Records", $typehere);
		$result = array();
		if ($num > 0) {
			array_push($result, array("bool_code" => true,"message" => $t_name . " Details Successfully Updated"));
		} else {
			array_push($result, array("bool_code" => false,"message" => "Failed to Update Staff Details"));
		}
		echo json_encode(array("taskadd" => $result));
	}
    closer($conn);
	closer($conn2);
	debug("=================================================",$typehere);
}

function getProjectTasks(){
	$conn = connect("timetracker1");
    $typehere = "getProjectTasks";
	debug("=================================================",$typehere);
	
	$company = $_POST['company_id'];
	$project = $_POST['project_name'];
	$dep_name = $_POST['dep_name'];
	
	$getProjectID = "SELECT * FROM tbl_projects s WHERE s.project_name = '$project' and company_id = '$company'";
	debug($getProjectID,$typehere);
	$a = execute_($getProjectID,$conn);
	$b = fetch($a);
	$project_id = $b['project_id'];
	debug("Project ID ".$project_id,$typehere);
	
	$user_id = $_POST['user_id'];
	
	if ($user_id != "")
		$strSQL = "SELECT t.*,p.project_name,s.*,u.user_email,g.first_name AS client_name FROM tbl_tasks t LEFT JOIN tbl_users u on u.user_id = t.assigned_to LEFT JOIN tbl_projects p on p.project_id = t.project_id LEFT JOIN status_code s ON s.status_no = t.status left join sub_tasks st on st.task_id = t.task_id left join tbl_assigned_users tu on tu.sub_id = st.sub_id LEFT JOIN tbl_users g ON g.user_id = p.client_id where t.project_id = '$project_id' and (t.assigned_to = '$user_id' OR tu.assigned_users like '%$user_id%') GROUP BY task_id";
	else if($task_id == "")
		$strSQL = "SELECT t.*,p.project_name,s.*,u.user_email,g.first_name AS client_name FROM tbl_tasks t LEFT JOIN tbl_users u on u.user_id = t.assigned_to LEFT JOIN tbl_projects p on p.project_id = t.project_id LEFT JOIN status_code s ON s.status_no = t.status LEFT JOIN tbl_users g ON g.user_id = p.client_id where t.project_id = '$project_id'";
	else
		$strSQL = "SELECT t.*,p.project_name,s.*,u.user_email,g.first_name AS client_name FROM tbl_tasks t LEFT JOIN tbl_users u on u.user_id = t.assigned_to LEFT JOIN tbl_projects p on p.project_id = t.project_id LEFT JOIN status_code s ON s.status_no = t.status LEFT JOIN tbl_users g ON g.user_id = p.client_id where t.task_id = '$task_id'";
		
    debug($strSQL, $typehere);
    $objQuery = mysqli_query($conn,$strSQL);
    $intNumField = mysqli_num_fields($objQuery);
    $resultArray = array();
    while ($obResult = mysqli_fetch_array($objQuery)) {
        $arrCol = array();
		
		$task_id = $obResult['task_id'];
		
		$getHours = "SELECT SUM(minutes) AS hours FROM task_counter t left join sub_tasks s ON s.sub_id = t.sub_id where s.task_id = '$task_id' GROUP BY s.task_id";
		debug($getHours, $typehere);
		$q = execute_($getHours,$conn);
		$f = fetch($q);
		$hours = $f['hours'];
		
		if($hours == "") $hours = 0;
		
        for ($i = 0; $i < $intNumField; $i ++) {
             $arrCol[mysqli_fetch_field_direct($objQuery, $i)->name] = $obResult[$i];
        }
		
		$arrCol["hours"] = $hours;
		
		try {
			array_push($resultArray, $arrCol);
		} catch (Exception $e) {
			debug("Error Reporting ".$e->getMessage(),$typehere);
		}
    }
	debug("Response ".json_encode(array("tasks" => $resultArray)),$typehere);
    echo json_encode(array("tasks" => $resultArray));
    closer($conn);
	debug("=================================================",$typehere);
}


function getDepartmentProjects($dep_name){
	$conn = connect("timetracker1");
    $typehere = "getDepartmentProjects";
	debug("=================================================",$typehere);
	$strSQL = "SELECT * FROM tbl_projects p WHERE p.department_id = (SELECT dep_id from tbl_departments where dep_name = '$dep_name')";
    debug($strSQL, $typehere);
    $objQuery = mysqli_query($conn,$strSQL);
    $intNumField = mysqli_num_fields($objQuery);
    $resultArray = array();
    while ($obResult = mysqli_fetch_array($objQuery)) {
        $arrCol = array();
        for ($i = 0; $i < $intNumField; $i ++) {
             $arrCol[mysqli_fetch_field_direct($objQuery, $i)->name] = $obResult[$i];
        }
		
		try {
			array_push($resultArray, $arrCol);
		} catch (Exception $e) {
			debug("Error Reporting ".$e->getMessage(),$typehere);
		}
    }
	debug("Response ".json_encode(array("projects" => $resultArray)),$typehere);
    echo json_encode(array("projects" => $resultArray));
    closer($conn);
	debug("=================================================",$typehere);
}


function saveDepartment(){
    $d_name = $_POST['d_name'];
	$branch_name = $_POST['branch_name'];
	$company_id = $_POST['company_id'];
	$user_id = $_POST['user_id'];
	$dep_status = $_POST['dep_status'];
	
	$dep_id = $_POST['dep_id'];
	
    $typehere = "saveDepartment";
    debug("===========================================", $typehere);
    $conn = connect("timetracker1");	
	
	$getBranch = "SELECT * from tbl_branches t where branch_name = '$branch_name' and company_id = '$company_id'";
	debug($getBranch,$typehere);
	$q = execute_($getBranch,$conn);
	$f = fetch($q);
	$branch_id = $f['branch_id'];
	debug("Branch ID ".$branch_id,$typehere);
	
	if($dep_id == ""){
		debug("Save New Department ",$typehere);
		$checker2 = "SELECT * from tbl_departments where dep_name = '$d_name' and branch_id = '$branch_id'";
		debug($checker2, $typehere);
		$q = execute_($checker2,$conn);
		$n = num($q);
		$dep_id = 0;
		$result = array();
		while ($f = fetch($q)) {
			$dep_id = $f['dep_id'];
		}
		
		debug("Dep ID " . $dep_id, $typehere);
		if ($dep_id > 0) {
			debug($d_name . " already exists", $typehere);
			array_push($result, array("bool_code" => false,"message" => $d_name . " already exists"));
			echo json_encode(array("depadd" => $result));
			return;
		}
		
		$sql = "INSERT INTO tbl_departments(dep_name, branch_id, created_on, created_by,company) VALUES ('$d_name','$branch_id',NOW(),'$user_id','$company_id')";
		debug($sql, $typehere);
		$roww = execute_($sql,$conn);
		$num = affected($conn);
		debug("Inserted " . $num." User Records", $typehere);
		if ($num > 0) {			
			array_push($result, array("bool_code" => true,"message" => $d_name . " Successfully Added"));
		} else {
			array_push($result, array("bool_code" => false,"message" => "Operation Failed, Try Again Later!!"));
		}
		echo json_encode(array("depadd" => $result));
	}else{
		debug("Update Details For ".$dep_id,$typehere);
		$sql = "UPDATE tbl_departments set dep_name = '$d_name', dep_status = '$dep_status',branch_id = '$branch_id', modified_on = NOW() where dep_id = '$dep_id'";
		debug($sql, $typehere);
		$roww = execute_($sql,$conn);
		$num = affected($conn);
		debug("Updated " . $num." Department Records", $typehere);
		$result = array();
		if ($num > 0) {
			array_push($result, array("bool_code" => true,"message" => $d_name . " Details Successfully Updated"));
		} else {
			array_push($result, array("bool_code" => false,"message" => "Failed to Update Details"));
		}
		echo json_encode(array("depadd" => $result));
	}
    closer($conn);
	debug("=================================================",$typehere);
}

function updateDepartment($company_id){
	$typehere = "updateDepartment";
	debug("===========================================", $typehere);
    $conn = connect("timetracker1");
	$strSQL = "UPDATE tbl_departments set dep_status = 0 where company = '$company_id'";
	debug($strSQL, $typehere);
	execute_($strSQL,$conn);

	 $result = array();
	 array_push($result,array("company_id" => $company_id));
	 debug("Response".json_encode(array("updated" => $result)),$typehere);
	 echo json_encode(array("updated" => $result));
	 closer($conn);
	 debug("=================================================",$typehere);
   
	
}


function listDepartments(){
	$conn = connect("timetracker1");
    $typehere = "listDepartments";
	debug("=================================================",$typehere);
	$dep_id = $_POST['dep_id'];
	$dep_status = $_POST['dep_status'];
	$branch = $_POST['branch'];
	$company_id = $_POST['company_id'];
	$branch_id = $_POST['branch_id'];
	
	if($branch != ""){
		if(!is_numeric($branch)){
			$getBranchID = "select * from tbl_branches where branch_name = '$branch' and company_id = '$company_id'";
			debug($getBranchID,$typehere);
			$q = execute_($getBranchID,$conn);
			$f = fetch($q);
			$branch_id = $f['branch_id'];
		}else{
			$branch_id = $branch;
		}
		$strSQL = "SELECT t.dep_id,t.dep_name,t.dep_status,b.branch_name,t.created_on FROM tbl_departments t LEFT JOIN tbl_branches b ON b.branch_id = t.branch_id WHERE t.branch_id = '$branch_id'";
	}else if ($branch_id != ""){
		$strSQL = "SELECT t.dep_id,t.dep_name,t.dep_status,b.branch_name,t.created_on FROM tbl_departments t LEFT JOIN tbl_branches b ON b.branch_id = t.branch_id WHERE t.branch_id = '$branch_id'";
	}else if($dep_id == ""){
		$strSQL = "SELECT t.dep_id,t.dep_name,t.dep_status,b.branch_name,t.created_on FROM tbl_departments t LEFT JOIN tbl_branches b ON b.branch_id = t.branch_id WHERE company_id = '".$_POST['company_id']."'";
	}else {
		$strSQL = "SELECT t.dep_id,t.dep_name,t.dep_status,b.branch_name,t.created_on FROM tbl_departments t LEFT JOIN tbl_branches b ON b.branch_id = t.branch_id WHERE dep_id = '$dep_id'";
	}
    debug($strSQL, $typehere);
    $objQuery = mysqli_query($conn,$strSQL);
    $intNumField = mysqli_num_fields($objQuery);
    $resultArray = array();
    while ($obResult = mysqli_fetch_array($objQuery)) {
        $arrCol = array();
        for ($i = 0; $i < $intNumField; $i ++) {
             $arrCol[mysqli_fetch_field_direct($objQuery, $i)->name] = $obResult[$i];
        }
		
		try {
			array_push($resultArray, $arrCol);
		} catch (Exception $e) {
			debug("Error Reporting ".$e->getMessage(),$typehere);
		}
    }
	debug("Response ".json_encode(array("departments" => $resultArray)),$typehere);
    echo json_encode(array("departments" => $resultArray));
    closer($conn);
	debug("=================================================",$typehere);
}

function updateBranch(){
	$typehere = "updateBranch";
	debug("===========================================", $typehere);
	$branch_id = $_POST['branch_id'];
    $conn = connect("timetracker1");
	$strSQL = "UPDATE tbl_branches set branch_status=0 where branch_id = '$branch_id'";
	debug($strSQL, $typehere);
	execute_($strSQL,$conn);

	 $result = array();
	 array_push($result,array("branch_id" => $branch_id));
	 debug("Response".json_encode(array("updated" => $result)),$typehere);
	 echo json_encode(array("updated" => $result));
	 closer($conn);
	 debug("=================================================",$typehere);
   
	
}

function saveBranch(){
    $p_name = $_POST['p_name'];
	$p_desc = $_POST['p_desc'];
	$company_id = $_POST['company_id'];
	$user_id = $_POST['user_id'];
	
	$branch_id = $_POST['branch_id'];
	$branch_status = $_POST['branch_status'];
	
    $typehere = "saveBranch";
    debug("===========================================", $typehere);
    $conn = connect("timetracker1");	
	
	if($branch_id == ""){
		debug("Save New Branch ",$typehere);
		$checker2 = "SELECT * from tbl_branches where branch_name = '$p_name' and company_id = '$company_id' ";
		debug($checker2, $typehere);
		$q = execute_($checker2,$conn);
		$n = num($q);
		$branch_id = 0;
		$result = array();
		while ($f = fetch($q)) {
			$branch_id = $f['branch_id'];
		}
		
		debug("Branch ID " . $branch_id, $typehere);
		if ($branch_id > 0) {
			debug($p_name . " already exists", $typehere);
			array_push($result, array("bool_code" => false,"message" => $p_name . " already exists"));
			echo json_encode(array("branchadd" => $result));
			return;
		}
		
		$sql = "INSERT INTO tbl_branches(branch_name, branch_desc, company_id, created_on, created_by) VALUES ('$p_name','$p_desc','$company_id',NOW(),'$user_id')";
		debug($sql, $typehere);
		$roww = execute_($sql,$conn);
		$num = affected($conn);
		debug("Inserted " . $num." User Records", $typehere);
		if ($num > 0) {			
			array_push($result, array("bool_code" => true,"message" => $p_name . " Successfully Added"));
		} else {
			array_push($result, array("bool_code" => false,"message" => "Operation Failed, Try Again Later!!"));
		}
		echo json_encode(array("branchadd" => $result));
	}else{
		debug("Update Details For ".$branch_id,$typehere);
		$sql = "UPDATE tbl_branches set  branch_name = '$p_name',branch_desc ='$p_desc',branch_status='$branch_status',company_id = '$company_id', modified_on = NOW() where branch_id = '$branch_id'";
		debug($sql, $typehere);
		$roww = execute_($sql,$conn);
		$num = affected($conn);
		debug("Updated " . $num." Branch Records", $typehere);
		$result = array();
		if ($num > 0) {
			array_push($result, array("bool_code" => true,"message" => $p_name . " Details Successfully Updated"));
		} else {
			array_push($result, array("bool_code" => false,"message" => "Failed to Update Details"));
		}
		echo json_encode(array("branchadd" => $result));
	}
    closer($conn);
	debug("=================================================",$typehere);
}

function ListBranches(){
	$conn = connect("timetracker1");
    $typehere = "ListBranches";
	debug("=================================================",$typehere);
	$branch_id = $_POST['branch_id'];
	if($branch_id == "")$strSQL = "SELECT * from tbl_branches where company_id = '".$_POST['company_id']."'";
	else $strSQL = "SELECT * from tbl_branches where branch_id = '$branch_id' ";
    debug($strSQL, $typehere);
    $objQuery = mysqli_query($conn,$strSQL);
    $intNumField = mysqli_num_fields($objQuery);
    $resultArray = array();
    while ($obResult = mysqli_fetch_array($objQuery)) {
        $arrCol = array();
        for ($i = 0; $i < $intNumField; $i ++) {
             $arrCol[mysqli_fetch_field_direct($objQuery, $i)->name] = $obResult[$i];
        }
		
		try {
			array_push($resultArray, $arrCol);
		} catch (Exception $e) {
			debug("Error Reporting ".$e->getMessage(),$typehere);
		}
    }
	debug("Response ".json_encode(array("branches" => $resultArray)),$typehere);
    echo json_encode(array("branches" => $resultArray));
    closer($conn);
	debug("=================================================",$typehere);
}

function getOrgTypes(){
	$conn = connect("timetracker1");
    $typehere = "getOrgTypes";
	debug("=================================================",$typehere);
	
	$strSQL = "SELECT * FROM organization_types t";
    debug($strSQL, $typehere);
    $objQuery = mysqli_query($conn,$strSQL);
    $intNumField = mysqli_num_fields($objQuery);
    $resultArray = array();
    while ($obResult = mysqli_fetch_array($objQuery)) {
        $arrCol = array();
        for ($i = 0; $i < $intNumField; $i ++) {
             $arrCol[mysqli_fetch_field_direct($objQuery, $i)->name] = $obResult[$i];
        }
		
		try {
			array_push($resultArray, $arrCol);
		} catch (Exception $e) {
			debug("Error Reporting ".$e->getMessage(),$typehere);
		}
    }
	debug("Response ".json_encode(array("types" => $resultArray)),$typehere);
    echo json_encode(array("types" => $resultArray));
    closer($conn);
	debug("=================================================",$typehere);
}

function updateTask(){
	$conn = connect("timetracker1");
    $typehere = "updateTask";
	debug("=================================================",$typehere);
	$task_id = $_POST['task_id'];
	$task_progress = $_POST['task_progress'];
	$project_status = $_POST['project_status'];
	
	debug("Update Details For ".$task_id,$typehere);
	
	$getLevel = "SELECT * FROM status_code s WHERE s.status_desc = '$project_status'";
	debug($getLevel,$typehere);
	$a = execute_($getLevel,$conn);
	$b = fetch($a);
	$status_no = $b['status_no'];
	
	$adder = "";
	if($status_no == 1){
		$adder = ',completion_date = CURRENT_DATE';
	}
	
	$sql = "UPDATE tbl_tasks set task_progress = '$task_progress', modified_on = NOW(),status = '$status_no' $adder where task_id = '$task_id'";
	debug($sql, $typehere);
	$roww = execute_($sql,$conn);
	$num = affected($conn);
	debug("Updated " . $num." Task Records", $typehere);
	$result = array();
	if ($num > 0) {
		array_push($result, array("bool_code" => true,"message" => "Task Details Successfully Updated"));
	} else {
		array_push($result, array("bool_code" => false,"message" => "Failed to Update Task Details"));
	}
	echo json_encode(array("taskadd" => $result));
    closer($conn);
	debug("=================================================",$typehere);
}

function getTaskInfo($user_id,$task_id){
	$conn = connect("timetracker1");
    $typehere = "getTaskInfo";
	debug("=================================================",$typehere);
	
	$strSQL = "SELECT t.counter_date,SUM(t.minutes) AS minutes FROM task_counter t left join sub_tasks s on s.task_id = t.sub_id WHERE s.task_id = '$task_id' AND t.user_id = '$user_id' GROUP BY t.counter_date";
    debug($strSQL, $typehere);
    $objQuery = mysqli_query($conn,$strSQL);
    $intNumField = mysqli_num_fields($objQuery);
    $resultArray = array();
    while ($obResult = mysqli_fetch_array($objQuery)) {
        $arrCol = array();
        for ($i = 0; $i < $intNumField; $i ++) {
             $arrCol[mysqli_fetch_field_direct($objQuery, $i)->name] = $obResult[$i];
        }
		
		try {
			array_push($resultArray, $arrCol);
		} catch (Exception $e) {
			debug("Error Reporting ".$e->getMessage(),$typehere);
		}
    }
	debug("Response ".json_encode(array("taskinfo" => $resultArray)),$typehere);
    echo json_encode(array("taskinfo" => $resultArray));
    closer($conn);
	debug("=================================================",$typehere);
}

function getUserLatest($user_id){
	$conn = connect("timetracker1");
    $typehere = "getUserLatest";
	debug("=================================================",$typehere);
	
	$strSQL = "SELECT c.task_name,s.minutes,c.created_on FROM task_counter s left join sub_tasks sb on sb.sub_id = s.sub_id LEFT JOIN tbl_tasks c ON c.task_id = sb.task_id WHERE s.user_id = '$user_id' ORDER BY sb.sub_id DESC LIMIT 5";
    debug($strSQL, $typehere);
    $objQuery = mysqli_query($conn,$strSQL);
    $intNumField = mysqli_num_fields($objQuery);
    $resultArray = array();
    while ($obResult = mysqli_fetch_array($objQuery)) {
        $arrCol = array();
        for ($i = 0; $i < $intNumField; $i ++) {
             $arrCol[mysqli_fetch_field_direct($objQuery, $i)->name] = $obResult[$i];
        }
		
		try {
			array_push($resultArray, $arrCol);
		} catch (Exception $e) {
			debug("Error Reporting ".$e->getMessage(),$typehere);
		}
    }
	debug("Response ".json_encode(array("latest" => $resultArray)),$typehere);
    echo json_encode(array("latest" => $resultArray));
    closer($conn);
	debug("=================================================",$typehere);
}

function getTaskUser($task_id){
	$conn = connect("timetracker1");
    $typehere = "getTaskUser";
	debug("=================================================",$typehere);
	$strSQL = "SELECT * FROM tbl_tasks s LEFT JOIN tbl_users u ON u.user_id = s.assigned_to WHERE s.task_id = '$task_id'";
    debug($strSQL, $typehere);
    $objQuery = mysqli_query($conn,$strSQL);
    $intNumField = mysqli_num_fields($objQuery);
    $resultArray = array();
    while ($obResult = mysqli_fetch_array($objQuery)) {
        $arrCol = array();
        for ($i = 0; $i < $intNumField; $i ++) {
             $arrCol[mysqli_fetch_field_direct($objQuery, $i)->name] = $obResult[$i];
        }
		
		try {
			array_push($resultArray, $arrCol);
		} catch (Exception $e) {
			debug("Error Reporting ".$e->getMessage(),$typehere);
		}
    }
	debug("Response ".json_encode(array("task_user" => $resultArray)),$typehere);
    echo json_encode(array("task_user" => $resultArray));
    closer($conn);
	debug("=================================================",$typehere);
}

function saveTask(){
    $t_name = $_POST['t_name'];
	$t_desc = $_POST['t_desc'];
	$project_name = $_POST['project_name'];
	$company_users = $_POST['company_users'];
	$project_status = $_POST['project_status'];
	$task_progress = $_POST['task_progress'];
	
	
	$startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
	$company = $_POST['company_id'];
	$user = $_POST['user_id'];
	
	$startDate = date("Y-m-d", strtotime($startDate));
	$endDate = date("Y-m-d", strtotime($endDate));
	
	$company_users = $_POST['company_users'];
	$task_id = $_POST['task_id'];
	
    $typehere = "saveTask";
    debug("===========================================", $typehere);
    $conn = connect("timetracker1");
	debug("Got Task ID as ".$task_id,$typehere);
	debug("Got Company Users as ".$company_users,$typehere);
	debug("Got Project Name as ".$project_name,$typehere);
	
	$getLevel = "SELECT * FROM status_code s WHERE s.status_desc = '$project_status'";
	debug($getLevel,$typehere);
	$a = execute_($getLevel,$conn);
	$b = fetch($a);
	$status_no = $b['status_no'];
	
	$getProjectID = "SELECT * FROM tbl_projects s WHERE s.project_name = '$project_name' and company_id = '$company'";
	debug($getProjectID,$typehere);
	$a = execute_($getProjectID,$conn);
	$b = fetch($a);
	$project_id = $b['project_id'];
	debug("Project ID ".$project_id,$typehere);
	
	$getUserID = "SELECT * FROM tbl_users s WHERE s.user_email = '$company_users'";
	debug($getUserID,$typehere);
	$a = execute_($getUserID,$conn);
	$b = fetch($a);
	$user_id = $b['user_id'];
	debug("User ID ".$user_id,$typehere);
	
	if($task_id == ""){
		debug("Save New Tasks ",$typehere);
		$checker2 = "SELECT * from tbl_tasks where task_name = '$t_name' and project_id = '$project_id'";
		debug($checker2, $typehere);
		$q = execute_($checker2,$conn);
		$n = num($q);
		$t_id = 0;
		$result = array();
		while ($f = fetch($q)) {
			$t_id = $f['task_id'];
		}
		
		debug("Task ID " . $t_id, $typehere);
		if ($t_id > 0) {
			debug($t_name . " already exists", $typehere);
			array_push($result, array("bool_code" => false,"message" => $t_name . " already exists"));
			echo json_encode(array("taskadd" => $result));
	
	
			return;
		}
		
		$sql = "INSERT INTO tbl_tasks(task_name, task_desc, project_id,assigned_to,task_progress, created_on, created_by, status, start_date, end_date)
		VALUES ('$t_name','$t_desc','$project_id','$user_id','$task_progress',NOW(),'$user','$status_no','$startDate','$endDate')";
		debug($sql, $typehere);
		$roww = execute_($sql,$conn);
		$num = affected($conn);
		debug("Inserted " . $num." User Records", $typehere);
		if ($num > 0) {			
			array_push($result, array("bool_code" => true,"message" => $t_name . " Successfully Added"));
		} else {
			array_push($result, array("bool_code" => false,"message" => "Failed to Add Project"));
		}
		echo json_encode(array("taskadd" => $result));
	}else{
		debug("Update Details For ".$task_id,$typehere);
		$sql = "UPDATE tbl_tasks set task_name = '$t_name',task_desc ='$t_desc',project_id = '$project_id',task_progress = '$task_progress',assigned_to= '$user_id', modified_on = NOW(),status = '$status_no',start_date = '$startDate',end_date = '$endDate' where task_id = '$task_id'";
		debug($sql, $typehere);
		$roww = execute_($sql,$conn);
		$num = affected($conn);
		debug("Updated " . $num." Task Records", $typehere);
		$result = array();
		if ($num > 0) {
			array_push($result, array("bool_code" => true,"message" => $t_name . " Details Successfully Updated"));
		} else {
			array_push($result, array("bool_code" => false,"message" => "Failed to Update Staff Details"));
		}
		echo json_encode(array("taskadd" => $result));
	}
    closer($conn);
	debug("=================================================",$typehere);
}

function getUserTasks($project,$user,$task_id){
	$conn = connect("timetracker1");
    $typehere = "getUserTasks";
	debug("=================================================",$typehere);
	
	$company = $_POST['company_id'];
	$getProjectID = "SELECT * FROM tbl_projects s WHERE s.project_name = '$project' and company_id = '$company'";
	debug($getProjectID,$typehere);
	$a = execute_($getProjectID,$conn);
	$b = fetch($a);
	$project_id = $b['project_id'];
	debug("Project ID ".$project_id,$typehere);
	
	if($task_id == "")
		$strSQL = "SELECT t.*,p.project_name,s.*,u.user_email FROM tbl_tasks t LEFT JOIN tbl_users u on u.user_id = t.assigned_to LEFT JOIN tbl_projects p on p.project_id = t.project_id LEFT JOIN status_code s ON s.status_no = t.status where t.project_id = '$project_id' AND t.assigned_to = '$user'";
	else
		$strSQL = "SELECT t.*,p.project_name,s.*,u.user_email FROM tbl_tasks t LEFT JOIN tbl_users u on u.user_id = t.assigned_to LEFT JOIN tbl_projects p on p.project_id = t.project_id LEFT JOIN status_code s ON s.status_no = t.status where t.task_id = '$task_id'";
		
    debug($strSQL, $typehere);
    $objQuery = mysqli_query($conn,$strSQL);
    $intNumField = mysqli_num_fields($objQuery);
    $resultArray = array();
    while ($obResult = mysqli_fetch_array($objQuery)) {
        $arrCol = array();
		
		$task_id = $obResult['task_id'];
		
		$getHours = "SELECT SUM(minutes) AS hours FROM task_counter t left join sub_tasks s on s.sub_id = t.sub_id where s.task_id = '$task_id' GROUP BY s.task_id";
		debug($getHours, $typehere);
		$q = execute_($getHours,$conn);
		$f = fetch($q);
		$hours = $f['hours'];
		
		if($hours == "") $hours = 0;
		
        for ($i = 0; $i < $intNumField; $i ++) {
             $arrCol[mysqli_fetch_field_direct($objQuery, $i)->name] = $obResult[$i];
        }
		
		$arrCol["hours"] = $hours;
		
		try {
			array_push($resultArray, $arrCol);
		} catch (Exception $e) {
			debug("Error Reporting ".$e->getMessage(),$typehere);
		}
    }
	debug("Response ".json_encode(array("tasks" => $resultArray)),$typehere);
    echo json_encode(array("tasks" => $resultArray));
    closer($conn);
	debug("=================================================",$typehere);
}

function getprojectUsers($project){
	$conn = connect("timetracker1");
    $typehere = "getprojectUsers";
	debug("=================================================",$typehere);

	$getAssigned = "SELECT u.assigned_users from tbl_assigned_users u where project_id = (SELECT project_id FROM tbl_projects WHERE project_name = '$project')";
	debug($getAssigned, $typehere);
	$q = execute_($getAssigned,$conn);
	$f = fetch($q);
	$assigned_users = $f['assigned_users'];
	
	$user_id = $_POST['user_id'];
	
	if($user_id == "")
		$strSQL = "SELECT * from tbl_users where user_id in ($assigned_users)";
	else
		$strSQL = "SELECT * from tbl_users where user_id = '$user_id'";
	
    debug($strSQL, $typehere);
    $objQuery = mysqli_query($conn,$strSQL);
    $intNumField = mysqli_num_fields($objQuery);
    $resultArray = array();
    while ($obResult = mysqli_fetch_array($objQuery)) {
        $arrCol = array();		
        for ($i = 0; $i < $intNumField; $i ++) {
            $arrCol[mysqli_fetch_field_direct($objQuery, $i)->name] = $obResult[$i];
        }
		
		try {
			array_push($resultArray, $arrCol);
		} catch (Exception $e) {
			debug("Error Reporting ".$e->getMessage(),$typehere);
		}
    }
	debug("Response ".json_encode(array("users" => $resultArray)),$typehere);
    echo json_encode(array("users" => $resultArray));
    closer($conn);
	debug("=================================================",$typehere);
}

function SaveHours(){
    $hours = $_POST['hours'];
	$project_name = $_POST['project_name'];
	$sub_id = $_POST['sub_id'];
    $user_email = $_POST['user_email'];
	$company_id = $_POST['company_id'];
	$added_by = $_POST['added_by'];
	
    $typehere = "SaveHours";
    debug("===========================================", $typehere);
    $conn = connect("timetracker1");
	debug("Got Project Name as ".$project_name,$typehere);
	
	$sub_name = $_POST['sub_name'];
	if($sub_name != ""){
		$getTaskID = "SELECT * from sub_tasks where sub_name = '$task_name'";
		debug($getTaskID,$typehere);
		$q = execute_($getTaskID,$conn);
		$f = fetch($q);
		$sub_id = $f['sub_id'];
	}
	
	
	debug("User Email: ".$user_email,$typehere);
	if(!is_numeric($user_email)){
		$getUserID = "SELECT * from tbl_users where user_email = '$user_email'";
		debug($getUserID,$typehere);
		$q = execute_($getUserID,$conn);
		$f = fetch($q);
		$user_id = $f['user_id'];
	}else{
		$user_id = $user_email;
	}

		
	$saver = "INSERT INTO task_counter(sub_id, user_id, minutes,counter_date,created,added_by,time_started,time_ended,status) VALUES ('$sub_id','$user_id','$hours',CURRENT_DATE,NOW(),'$added_by',TIMESTAMPADD(SECOND,-$hours,NOW()),NOW(),2)";
	debug($saver, $typehere);
	$roww = execute_($saver,$conn);
	$saved = affected($conn);

	debug("Inserted " . $saved." Hours Records", $typehere);
	$result = array();
	if($saved){
		$progress = $_POST['progress'];
		if($progress > 0){
			$updater = "UPDATE sub_tasks set sub_progress = '$progress' where sub_id = '$sub_id'";
			debug($updater, $typehere);
			execute_($updater,$conn);
		}
		array_push($result, array("bool_code" => true,"message" => "Successfully Logged"));
	} else {
		array_push($result, array("bool_code" => false,"message" => "Failed to Add Hours"));
	}
	debug("Response ".json_encode(array("hoursadd" => $result)),$typehere);
	echo json_encode(array("hoursadd" => $result));
	closer($conn);
	debug("=================================================",$typehere);
}

function getProjectTask($project){
	$conn = connect("timetracker1");
    $typehere = "getProjectTask";
	debug("=================================================",$typehere);
	$user_id = $_POST['user_id'];
	$company_id  = $_POST['company_id'];
	$dep_id = $_POST['dep_id'];
	
	if($user_id == "")	$strSQL = "SELECT * FROM tbl_tasks p LEFT JOIN status_code s on s.status_no = p.status WHERE p.project_id = (SELECT project_id FROM tbl_projects WHERE project_name = '$project' AND company_id = '$company_id' AND department_id = '$dep_id')";
	else $strSQL = "SELECT * FROM tbl_tasks p LEFT JOIN status_code s on s.status_no = p.status WHERE p.project_id = (SELECT project_id FROM tbl_projects WHERE project_name = '$project' AND company_id = '$company_id') AND assigned_to = '$user_id'";
    debug($strSQL, $typehere);
    $objQuery = mysqli_query($conn,$strSQL);
    $intNumField = mysqli_num_fields($objQuery);
    $resultArray = array();
    while ($obResult = mysqli_fetch_array($objQuery)) {
        $arrCol = array();
        for ($i = 0; $i < $intNumField; $i ++) {
             $arrCol[mysqli_fetch_field_direct($objQuery, $i)->name] = $obResult[$i];
        }
		
		$task_id = $obResult['task_id'];
		
		if($user_id == "") $getHours = "SELECT SUM(minutes) AS hours FROM task_counter t left join sub_tasks s on s.sub_id = t.sub_id where s.task_id = '$task_id' GROUP BY t.task_id";
		else $getHours = "SELECT SUM(minutes) AS hours FROM task_counter t left join sub_tasks s on s.sub_id = t.sub_id where s.task_id = '$task_id' AND t.user_id = '$user_id' GROUP BY s.task_id";
		debug($getHours, $typehere);
		$q = execute_($getHours,$conn);
		$f = fetch($q);
		$hours = $f['hours'];
		
		if($hours == "") $hours = 0;
		
		$arrCol["hours"] = $hours;
		
		try {
			array_push($resultArray, $arrCol);
		} catch (Exception $e) {
			debug("Error Reporting ".$e->getMessage(),$typehere);
		}
    }
	debug("Response ".json_encode(array("tasks" => $resultArray)),$typehere);
    echo json_encode(array("tasks" => $resultArray));
    closer($conn);
	debug("=================================================",$typehere);
}

function getCompanyProjects($company){
	$conn = connect("timetracker1");
    $typehere = "getCompanyProjects";
	debug("=================================================",$typehere);
	$user_id = $_POST['user_id'];
	
	$strSQL = "SELECT * FROM tbl_projects p WHERE p.company_id = '$company' AND project_id in (SELECT project_id FROM tbl_assigned_users a WHERE a.assigned_users LIKE '%$user_id%')";
    debug($strSQL, $typehere);
    $objQuery = mysqli_query($conn,$strSQL);
    $intNumField = mysqli_num_fields($objQuery);
    $resultArray = array();
    while ($obResult = mysqli_fetch_array($objQuery)) {
        $arrCol = array();
        for ($i = 0; $i < $intNumField; $i ++) {
             $arrCol[mysqli_fetch_field_direct($objQuery, $i)->name] = $obResult[$i];
        }
		
		try {
			array_push($resultArray, $arrCol);
		} catch (Exception $e) {
			debug("Error Reporting ".$e->getMessage(),$typehere);
		}
    }
	debug("Response ".json_encode(array("projects" => $resultArray)),$typehere);
    echo json_encode(array("projects" => $resultArray));
    closer($conn);
	debug("=================================================",$typehere);
}

function saveNewUser(){
    $u_name = $_POST['u_name'];
	$u_email = $_POST['u_email'];
    $user_level = $_POST['user_level'];
    $user_status = $_POST['user_status'];
	$company_id = $_POST['company_id'];
	$added_by = $_POST['added_by'];
	$branch = $_POST['branch'];
	$dep = $_POST['dep'];
	$user_id = $_POST['user_id'];
	$typehere = "saveNewUser";
    debug("===========================================", $typehere);
    $conn = connect("timetracker1");
	debug("Got User ID as ".$user_id,$typehere);
	
	$type = $_POST['type'];
	
	if($type == "SCHOOL") $getLevel = "SELECT * FROM user_levels s WHERE s.school_desc = '$user_level'";
	else if($type == "LAWFIRM") $getLevel = "SELECT * FROM user_levels s WHERE s.law_desc = '$user_level'"; else $getLevel = "SELECT * FROM user_levels s WHERE s.level_desc = '$user_level'";
	debug($getLevel,$typehere);
	$a = execute_($getLevel,$conn);
	$b = fetch($a);
	$level_id = $b['level_id'];
	
	if(!is_numeric($branch)){
		$getBranchID = "SELECT * FROM tbl_branches WHERE branch_name = '$branch' and company_id = '$company_id'";
		debug($getBranchID,$typehere);
		$a = execute_($getBranchID,$conn);
		$b = fetch($a);
		$branch_id = $b['branch_id'];
	}else{
		$branch_id = $branch;
	}
	
	if(!is_numeric($dep)){
		$getDepID = "SELECT * FROM tbl_departments WHERE dep_name = '$dep' and company = '$company_id'";
		debug($getDepID,$typehere);
		$a = execute_($getDepID,$conn);
		$b = fetch($a);
		$dep_id = $b['dep_id'];
	}else{
		$dep_id = $dep;
	}
	
	$getStatus = "SELECT * FROM user_status WHERE status_desc = '$user_status'";
	debug($getStatus,$typehere);
	$a = execute_($getStatus,$conn);
	$b = fetch($a);
	$status_id = $b['status_id'];
	
	debug("level_id ".$level_id." status_id ".$status_id,$typehere);
	
	if($user_id == ""){
		debug("Save New Staff ",$typehere);
				
		$password = randomString(6);
		debug("Generated Password" . $password, $typehere);
		
		$GlobalID = checkUserGlobal($u_name,$u_email,$password);
		debug("User Global ID".$GlobalID,$typehere);
		
		$checker2 = "SELECT * from tbl_users where first_name='$u_name', user_email = '$u_email'";
		debug($checker2,$typehere);
		$q = execute_($checker2,$conn);
		$n = num($q);
		$user_id = 0;
		$result = array();
		while ($f = fetch($q)) {
			$user_id = $f['user_id'];
			$first_name = $f['u_name'];
		}
		
		debug("user_id ".$user_id,$typehere);
		if ($user_id > 0) {
			$sql = "UPDATE tbl_users set global_id = '$GlobalID' where user_id = '$user_id'";
		}else{
			$sql = "INSERT INTO tbl_users(global_id,user_email,user_password,first_name,user_level,user_status,user_company,created_on,user_branch,user_dep) VALUES ('$GlobalID','$u_email',MD5('$password'),'$u_name','$level_id','$status_id','$company_id',NOW(),'$branch_id','$dep_id')";
		}
		debug($sql,$typehere);
		$roww = execute_($sql,$conn);
		debug($roww);
		$num = affected($conn);
		debug("Inserted".$num." User Records", $typehere);
		if ($num > 0) {	
			if($user_id < 1){

			$docs = connect("docs");
			
			$exploded = multiexplode(array(" "), $u_name);
			$f_name = $exploded[0];
			$l_name = $exploded[1];
			
			$ins = "INSERT INTO dms_user(username, password, department, Email, last_name, first_name, can_add, can_checkin) VALUES ('$u_email',MD5('$password'),'1','$u_email','$l_name','$u_name','1','1')";
			debug($ins,$typehere);
			execute_($ins,$docs);
			$in = affected($docs);
			
			debug("Saved ".$in." DMS Records",$typehere);
			
			$id = last_id($docs);
			
			if($level_id > 2){
				$admin = 1;
			}else{
				$admin = 0;
			}
				
			$saver = "INSERT INTO dms_admin(id,admin) VALUES ('$id','$admin')";
			debug($saver,$typehere);
			execute_($saver,$docs);
			$in2 = affected($docs);
			debug("Saved ".$in2." DMS Admin Records",$typehere);
			
			if($level_id == 1){
				$save = "INSERT INTO dms_department (name) VALUES ('$u_name');";
				debug($save,$typehere);
				execute_($save,$docs);
			}
			
			$u_email = "Dear " . $u_name . " , An Account has been created for KAPS STRAIT & PASA Events Platform. Username: " . $u_email . " ,Password: ".$password."\nLogin here: https://www.aps.co.ke/strait";
			debug($u_email, $typehere);
			push_mail($u_email, $email,"New Account","KAPS STRAIT","kapslabnotify@kaps.co.ke");
			}
			array_push($result, array("bool_code" => true,"message" => $u_name . " Successfully Registered"));
		} else {
			array_push($result, array("bool_code" => false,"message" => "Failed to Register New User"));
		}
		echo json_encode(array("useradd" => $result));
	}else{
		debug("Update Details For ".$staff_id,$typehere);
		$sql = "UPDATE tbl_users set created_on = NOW(),user_email = '$u_email',first_name = '$u_name', user_level = '$u_level',user_dep = '$u_dep' where user_id = '$user_id'";
		debug($sql, $typehere);
		$roww = execute_($sql,$conn);
		$num = affected($conn);
		debug("Updated " . $num." User Records", $typehere);
		$result = array();
		if ($num > 0) {
			array_push($result, array("result" => 'TRUE',"addmessage" => $u_name . " Details Successfully Updated"));
		} else {
			array_push($result, array("result" => 'FALSE',"addmessage" => "Failed to Update Staff Details"));
		}
		echo json_encode(array("staffadd" => $result));
	}
    closer($conn);
	debug("=================================================",$typehere);
}


// function saveNewUser(){
//     $u_name = $_POST['u_name'];
// 	$u_email = $_POST['u_email'];
//     $user_level = $_POST['user_level'];
//     $user_status = $_POST['user_status'];
// 	$company_id = $_POST['company_id'];
// 	$added_by = $_POST['added_by'];
// 	$branch = $_POST['branch'];
// 	$dep = $_POST['dep'];
	
// 	$user_id = $_POST['user_id'];
	
//     $typehere = "saveNewUser";
//     debug("===========================================", $typehere);
//     $conn = connect("timetracker");
// 	debug("Got User ID as ".$user_id,$typehere);
	
// 	$type = $_POST['type'];
	
// 	if($type == "SCHOOL") $getLevel = "SELECT * FROM user_levels s WHERE s.school_desc = '$user_level'";
// 	else if($type == "LAWFIRM") $getLevel = "SELECT * FROM user_levels s WHERE s.law_desc = '$user_level'"; else $getLevel = "SELECT * FROM user_levels s WHERE s.level_desc = '$user_level'";
// 	debug($getLevel,$typehere);
// 	$a = execute_($getLevel,$conn);
// 	$b = fetch($a);
// 	$level_id = $b['level_id'];
	
// 	if(!is_numeric($branch)){
// 		$getBranchID = "SELECT * FROM tbl_branches WHERE branch_name = '$branch' and company_id = '$company_id'";
// 		debug($getBranchID,$typehere);
// 		$a = execute_($getBranchID,$conn);
// 		$b = fetch($a);
// 		$branch_id = $b['branch_id'];
// 	}else{
// 		$branch_id = $branch;
// 	}
	
// 	if(!is_numeric($dep)){
// 		$getDepID = "SELECT * FROM tbl_departments WHERE dep_name = '$dep' and company = '$company_id'";
// 		debug($getDepID,$typehere);
// 		$a = execute_($getDepID,$conn);
// 		$b = fetch($a);
// 		$dep_id = $b['dep_id'];
// 	}else{
// 		$dep_id = $dep;
// 	}
	
// 	$getStatus = "SELECT * FROM user_status WHERE status_desc = '$user_status'";
// 	debug($getStatus,$typehere);
// 	$a = execute_($getStatus,$conn);
// 	$b = fetch($a);
// 	$status_id = $b['status_id'];
	
// 	debug("level_id ".$level_id." status_id ".$status_id,$typehere);
	
// 	if($user_id == ""){
// 		debug("Save New Staff ",$typehere);
				
// 		$password = randomString(6);
// 		debug("Generated Password " . $password, $typehere);
		
// 		$GlobalID = checkUserGlobal($u_name,$u_email,$password);
// 		debug("User Global ID ".$GlobalID,$typehere);
		
// 		$checker2 = "select user_id, first_name from tbl_users where user_email = '$u_email'";
// 		debug($checker2, $typehere);
// 		$q = execute_($checker2,$conn);
// 		$n = num($q);
// 		$user_id = 0;
// 		$result = array();
// 		while ($f = fetch($q)) {
// 			$user_id = $f['user_id'];
// 			$full_name = $f['full_name'];
// 		}
		
// 		debug("user_id " . $user_id, $typehere);
// 		if ($user_id > 0) {
// 			$sql = "UPDATE tbl_users set global_id = '$GlobalID' where user_id = '$user_id'";
// 		}else{
// 			$sql = "INSERT INTO tbl_users(global_id,user_email,user_password,first_name,user_level,user_status,user_company,created_on,user_branch,user_dep) VALUES ('$GlobalID','$u_email',MD5('$password'),'$u_name','$level_id','$status_id','$company_id',NOW(),'$branch_id','$dep_id')";
// 		}
// 		debug($sql, $typehere);
// 		$roww = execute_($sql,$conn);
// 		$num = affected($conn);
// 		debug("Inserted " . $num." User Records", $typehere);
// 		if ($num > 0) {	
// 			if($user_id < 1){

// 			$docs = connect("docs");
			
// 			$exploded = multiexplode(array(" "), $u_name);
// 			$f_name = $exploded[0];
// 			$l_name = $exploded[1];
			
// 			$ins = "INSERT INTO dms_user(username, password, department, Email, last_name, first_name, can_add, can_checkin) VALUES ('$u_email',MD5('$password'),'1','$u_email','$l_name','$f_name','1','1')";
// 			debug($ins,$typehere);
// 			execute_($ins,$docs);
// 			$in = affected($docs);
			
// 			debug("Saved ".$in." DMS Records",$typehere);
			
// 			$id = last_id($docs);
			
// 			if($level_id > 2){
// 				$admin = 1;
// 			}else{
// 				$admin = 0;
// 			}
				
// 			$saver = "INSERT INTO dms_admin(id,admin) VALUES ('$id','$admin')";
// 			debug($saver,$typehere);
// 			execute_($saver,$docs);
// 			$in2 = affected($docs);
// 			debug("Saved ".$in2." DMS Admin Records",$typehere);
			
// 			if($level_id == 1){
// 				$save = "INSERT INTO dms_department (name) VALUES ('$u_name');";
// 				debug($save,$typehere);
// 				execute_($save,$docs);
// 			}
			
// 			$email = "Dear " . $u_name . " , An Account has been created for KAPS STRAIT & PASA Events Platform. Username: " . $u_email . " ,Password: ".$password."\nLogin here: https://www.aps.co.ke/strait";
// 			debug($email, $typehere);
// 			push_mail($u_email, $email,"New Account","KAPS STRAIT","kapslabnotify@kaps.co.ke");
// 			}
// 			array_push($result, array("bool_code" => true,"message" => $u_name . " Successfully Registered"));
// 		} else {
// 			array_push($result, array("bool_code" => false,"message" => "Failed to Register New User"));
// 		}
// 		echo json_encode(array("useradd" => $result));
// 	}else{
// 		debug("Update Details For ".$staff_id,$typehere);
// 		$sql = "UPDATE tbl_users set last_action = NOW(),user_email = '$s_email',first_name = '$f_name',last_name = '$l_name', user_level = '$s_level',user_dep = '$s_dep' where user_id = '$staff_id'";
// 		debug($sql, $typehere);
// 		$roww = execute_($sql,$conn);
// 		$num = affected($conn);
// 		debug("Updated " . $num." User Records", $typehere);
// 		$result = array();
// 		if ($num > 0) {
// 			array_push($result, array("result" => 'TRUE',"addmessage" => $s_name . " Details Successfully Updated"));
// 		} else {
// 			array_push($result, array("result" => 'FALSE',"addmessage" => "Failed to Update Staff Details"));
// 		}
// 		echo json_encode(array("staffadd" => $result));
// 	}
//     closer($conn);
// 	debug("=================================================",$typehere);
// }


function getUserLevels(){
    $conn = connect("timetracker1");
    $typehere = "getUserLevels";
	$type = $_POST['type'];
	
	debug("=================================================",$typehere);
	if($type == "SCHOOL"){
		$strSQL = "SELECT level_id,school_desc as  level_desc FROM user_levels order by level_id asc";
	}else if ($type == "LAWFIRM"){
		$strSQL = "SELECT level_id,law_desc as  level_desc FROM user_levels order by level_id asc";
	}else{
		$strSQL = "SELECT * FROM user_levels order by level_id asc";
	}
    debug($strSQL, $typehere);
    $objQuery = mysqli_query($conn,$strSQL);
    $intNumField = mysqli_num_fields($objQuery);
    $resultArray = array();
    while ($obResult = mysqli_fetch_array($objQuery)) {
        $arrCol = array();
        for ($i = 0; $i < $intNumField; $i ++) {
             $arrCol[mysqli_fetch_field_direct($objQuery, $i)->name] = $obResult[$i];
        }
		
		try {
			array_push($resultArray, $arrCol);
		} catch (Exception $e) {
			debug("Error Reporting ".$e->getMessage(),$typehere);
		}
    }
	debug("Response ".json_encode(array("levels" => $resultArray)),$typehere);
    echo json_encode(array("levels" => $resultArray));
    closer($conn);
	debug("=================================================",$typehere);
}


function getUserStatus(){
	$conn = connect("timetracker1");
    $typehere = "getUserStatus";
	debug("=================================================",$typehere);
	$strSQL = "SELECT * from user_status";
    debug($strSQL, $typehere);
    $objQuery = mysqli_query($conn,$strSQL);
    $intNumField = mysqli_num_fields($objQuery);
    $resultArray = array();
    while ($obResult = mysqli_fetch_array($objQuery)) {
        $arrCol = array();
        for ($i = 0; $i < $intNumField; $i ++) {
             $arrCol[mysqli_fetch_field_direct($objQuery, $i)->name] = $obResult[$i];
        }
		
		try {
			array_push($resultArray, $arrCol);
		} catch (Exception $e) {
			debug("Error Reporting ".$e->getMessage(),$typehere);
		}
    }
	debug("Response ".json_encode(array("status" => $resultArray)),$typehere);
    echo json_encode(array("status" => $resultArray));
    closer($conn);
	debug("=================================================",$typehere);
}

function saveProject(){
    $p_name = $_POST['p_name'];
	$p_desc = $_POST['p_desc'];
	$startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
	$company = $_POST['company_id'];
	$user_id = $_POST['user_id'];
	
	$startDate = date("Y-m-d", strtotime($startDate));
	$endDate = date("Y-m-d", strtotime($endDate));
	
    $project_status = $_POST['project_status'];
	$dep_name = $_POST['dep_name'];
	$project_id = $_POST['project_id'];
	
	
	$t_fee = $_POST['t_fee'];
	$chargable = $_POST['chargable'];
	$b_cycle = $_POST['b_cycle'];
	$company_users = $_POST['company_users'];
	
    $typehere = "saveProject";
    debug("===========================================", $typehere);
    $conn = connect("timetracker1");
	debug("Got Project ID as ".$project_id,$typehere);
	
	$getUserID = "SELECT * from tbl_users where user_email = '$company_users'";
	debug($getUserID,$typehere);
	$qs = execute_($getUserID,$conn);
	$fs = fetch($qs);
	$client_id = $fs['user_id'];

	$getDepID = "SELECT * from tbl_departments where dep_name = '$dep_name' and company = '$company'";
	debug($getDepID,$typehere);
	$q = execute_($getDepID,$conn);
	$f = fetch($q);
	$department_id = $f['dep_id'];
	
	$getLevel = "SELECT * FROM status_code s WHERE s.status_desc = '$project_status'";
	debug($getLevel,$typehere);
	$a = execute_($getLevel,$conn);
	$b = fetch($a);
	$status_no = $b['status_no'];
	
	if($project_id == ""){
		debug("Save New Project ",$typehere);
		$checker2 = "SELECT * from tbl_projects where project_name = '$p_name' and department_id = '$department_id'";
		debug($checker2, $typehere);
		$q = execute_($checker2,$conn);
		$n = num($q);
		$p_id = 0;
		$result = array();
		while ($f = fetch($q)) {
			$p_id = $f['project_id'];
		}
		
		debug("Project ID " . $p_id, $typehere);
		if ($p_id > 0) {
			debug($p_name . " already exists", $typehere);
			array_push($result, array("bool_code" => false,"message" => $p_name . " already exists"));
			echo json_encode(array("projectadd" => $result));
			return;
		}
		
		$sql = "INSERT INTO tbl_projects(project_name, project_desc, department_id, created_on, created_by, status, start_date, end_date,company_id,client_id,chargable,fee,cycle)
		VALUES ('$p_name','$p_desc','$department_id',NOW(),'$user_id','$status_no','$startDate','$endDate','$company','$client_id','$chargable','$t_fee','$b_cycle')";
		debug($sql, $typehere);
		$roww = execute_($sql,$conn);
		$num = affected($conn);
		debug("Inserted " . $num." User Records", $typehere);
		if ($num > 0) {
			array_push($result, array("bool_code" => true,"message" => $p_name . " Successfully Added"));
		} else {
			array_push($result, array("bool_code" => false,"message" => "Failed to Add Project"));
		}
		echo json_encode(array("projectadd" => $result));
	}else{
		debug("Update Details For ".$staff_id,$typehere);
		$sql = "UPDATE tbl_projects set modified_on = NOW(),project_name = '$p_name',status = '$status',project_desc = '$p_desc',department_id = '$department_id',status = '$status_no', start_date = '$startDate',end_date = '$endDate' where project_id = '$project_id'";
		debug($sql, $typehere);
		$roww = execute_($sql,$conn);
		$num = affected($conn);
		debug("Updated " . $num." Project Records", $typehere);
		$result = array();
		if ($num > 0) {
			array_push($result, array("bool_code" =>true,"message" => $p_name . " Details Successfully Updated"));
		} else {
			array_push($result, array("bool_code" =>false,"message" => "Failed to Update Staff Details"));
		}
		echo json_encode(array("projectadd" => $result));
	}
    closer($conn);
	debug("=================================================",$typehere);
}


function getCompanyUsers($company_id){
	$conn = connect("timetracker1");
    $typehere = "getCompanyUsers";
	$user_id = $_POST['user_id'];
	debug("=================================================",$typehere);

	//echo json_encode($conn);
	
	$limit = $_POST['limit'];
	
	if($limit != ""){
		if($limit ==1){
			$adder = " and user_level > $limit ";
		}
		
		if($limit ==2){
			$adder = " and user_level = 1";
		}
	}
	
	if($user_id == ""){
		$branch = $_POST['branch'];
		$dep = $_POST['dep'];
		if($branch != ""){
			$strSQL = "SELECT s.*,l.*,t.*,td.dep_name,tb.branch_name FROM tbl_users s LEFT JOIN user_levels l
			 ON l.level_id = s.user_level LEFT JOIN user_status t ON t.status_id = s.user_status left join 
			 tbl_departments td on td.dep_id = s.user_dep left join tbl_branches tb on tb.branch_id = s.user_branch 
			 where user_branch = '$branch' $adder";
		}else if($dep != ""){
			$strSQL = "SELECT s.*,l.*,t.*,td.dep_name,tb.branch_name FROM tbl_users s LEFT JOIN user_levels l 
			ON l.level_id = s.user_level LEFT JOIN user_status t ON t.status_id = s.user_status left join 
			tbl_departments td on td.dep_id = s.user_dep left join tbl_branches tb on tb.branch_id = s.user_branch 
			where user_dep = '$dep' $adder";
		}else {
			$strSQL = "SELECT s.*,l.*,t.*,td.dep_name,tb.branch_name FROM tbl_users s LEFT JOIN user_levels l 
			ON l.level_id = s.user_level LEFT JOIN user_status t ON t.status_id = s.user_status left join 
			tbl_departments td on td.dep_id = s.user_dep left join tbl_branches tb on tb.branch_id = s.user_branch 
			where user_company = '$company_id' $adder";
		}
	}else{
		$strSQL = "SELECT s.*,l.*,t.*,td.dep_name,tb.branch_name FROM tbl_users s LEFT JOIN user_levels l 
		ON l.level_id = s.user_level LEFT JOIN user_status t ON t.status_id = s.user_status left join 
		tbl_departments td on td.dep_id = s.user_dep left join tbl_branches tb on tb.branch_id = s.user_branch 
		where user_id = '".$user_id."'  ";
	}
    debug($strSQL,$typehere);
    $objQuery = mysqli_query($conn,$strSQL);
	//debug(json_encode(mysqli_free_result($objQuery)));
    $intNumField = mysqli_num_fields($objQuery);
    $resultArray = array();
    while ($obResult = mysqli_fetch_array($objQuery)) {
        $arrCol = array();
        for ($i = 0; $i < $intNumField; $i++) {
             $arrCol[mysqli_fetch_field_direct($objQuery,$i)->name] = $obResult[$i];
        }
		
		try {
			array_push($resultArray,$arrCol);
		} catch (Exception $e) {
			debug("Error Reporting".$e->getMessage(),$typehere);
		}
    }
	debug("Response".json_encode(array("users" => $resultArray)),$typehere);
    echo json_encode(array("users" => $resultArray));
    closer($conn);
	debug("=================================================",$typehere);
}

function getProjectStatus(){
	$conn = connect("timetracker1");
    $typehere = "getProjectStatus";
	debug("=================================================",$typehere);
	$strSQL = "SELECT * from status_code";
    debug($strSQL, $typehere);
    $objQuery = mysqli_query($conn,$strSQL);
    $intNumField = mysqli_num_fields($objQuery);
    $resultArray = array();
    while ($obResult = mysqli_fetch_array($objQuery)) {
        $arrCol = array();
        for ($i = 0; $i < $intNumField; $i ++) {
             $arrCol[mysqli_fetch_field_direct($objQuery, $i)->name] = $obResult[$i];
        }
		
		try {
			array_push($resultArray, $arrCol);
		} catch (Exception $e) {
			debug("Error Reporting ".$e->getMessage(),$typehere);
		}
    }
	debug("Response ".json_encode(array("status" => $resultArray)),$typehere);
    echo json_encode(array("status" => $resultArray));
    closer($conn);
	debug("=================================================",$typehere);
}

function getMyProjects(){
	$conn = connect("timetracker1");
    $typehere = "getMyProjects";
	debug("=================================================",$typehere);
	$company_id = $_POST['company_id'];
	$project_id = $_POST['project_id'];
	$user_id = $_POST['user_id'];
	$branch = $_POST['branch'];
	$dep_id = $_POST['dep_id'];
	
	if($user_id != ""){
		$strSQL = "SELECT p.project_id,p.project_name,project_desc,p.status,p.created_on,dep_name,p.start_date,p.end_date,status_desc,p.chargable,p.fee,p.cycle,u.first_name AS
		 client_name FROM tbl_projects p left join 
		status_code sc on sc.status_no = p.status left join tbl_departments td on td.dep_id = p.department_id LEFT JOIN 
		tbl_tasks t on t.project_id = p.project_id LEFT JOIN sub_tasks s on s.task_id = t.task_id left join 
		tbl_assigned_users u on u.sub_id = s.sub_id LEFT JOIN tbl_users u ON u.user_id = p.client_id WHERE 
		assigned_users like '%$user_id%' group by p.project_id";
	}else if($project_id != ""){
		$strSQL = "SELECT p.project_id,p.project_name,p.project_desc,p.status,p.created_on,td.dep_name,p.start_date,p.end_date,sc.status_desc,p.chargable,p.fee,p.cycle,u.first_name AS client_name FROM 
		tbl_projects p left join status_code sc on sc.status_no = p.status left join 
		tbl_departments td on td.dep_id = p.department_id LEFT JOIN tbl_branches b ON b.branch_id = td.branch_id LEFT JOIN 
		tbl_users u ON u.user_id = p.client_id WHERE p.project_id = '$project_id'";
	}else if($branch != ""){
		$strSQL = "SELECT p.project_id,p.project_name,p.project_desc,p.status,p.created_on,td.dep_name,p.start_date,p.end_date,sc.status_desc,p.chargable,p.fee,p.cycle,u.first_name AS client_name 
		FROM tbl_projects p left join 
		status_code sc on sc.status_no = p.status left join tbl_departments td on td.dep_id = p.department_id LEFT JOIN 
		tbl_branches b ON b.branch_id = td.branch_id LEFT JOIN tbl_users u ON u.user_id = p.client_id WHERE b.branch_id = '$branch'";
	}else if($dep_id != ""){
		$strSQL = "SELECT p.project_id,p.project_name,p.project_desc,p.status,p.created_on,td.dep_name,p.start_date,p.end_date,sc.status_desc,p.chargable,p.fee,p.cycle,u.first_name AS client_name FROM
		 tbl_projects p left join status_code sc on sc.status_no = p.status left join 
		 tbl_departments td on td.dep_id = p.department_id LEFT JOIN tbl_branches b ON b.branch_id = td.branch_id LEFT JOIN 
		 tbl_users u ON u.user_id = p.client_id WHERE p.department_id = '$dep_id'";
	}else{
		$strSQL = "SELECT p.project_id,p.project_name,p.project_desc,p.status,p.created_on,td.dep_name,p.start_date,p.end_date,sc.status_desc,p.chargable,p.fee,p.cycle,u.first_name AS client_name FROM 
		tbl_projects p left join status_code sc on sc.status_no = p.status left join tbl_departments td on td.dep_id = p.department_id LEFT JOIN 
		tbl_branches b ON b.branch_id = td.branch_id LEFT JOIN tbl_users u ON u.user_id = p.client_id WHERE p.company_id = '$company_id'";
	}
	
    debug($strSQL, $typehere);
    $objQuery = mysqli_query($conn,$strSQL);
    $intNumField = mysqli_num_fields($objQuery);
    $resultArray = array();
    while ($obResult = mysqli_fetch_array($objQuery)) {
        $arrCol = array();
		$project_id = $obResult['project_id'];
		debug("project_id ".$project_id,$typehere);
		
		if($user_id == "") $getHours = "SELECT SUM(minutes) AS hours FROM task_counter t LEFT JOIN sub_tasks st ON st.sub_id = t.sub_id LEFT JOIN tbl_tasks c ON c.task_id = st.task_id  WHERE project_id = '$project_id' GROUP BY st.sub_id";
		else $getHours = "SELECT SUM(minutes) AS hours FROM task_counter t LEFT JOIN sub_tasks st ON st.sub_id = t.sub_id LEFT JOIN tbl_tasks c ON c.task_id = st.task_id  WHERE project_id = '$project_id' and t.user_id = '$user_id' GROUP BY st.sub_id";
		debug($getHours, $typehere);
		$q = execute_($getHours,$conn);
		$f = fetch($q);
		$hours = $f['hours'];
		
		if($hours == "") $hours = 0;
		
		$getAssigned = "SELECT u.assigned_users from tbl_assigned_users u LEFT JOIN sub_tasks st ON st.sub_id = u.sub_id LEFT JOIN tbl_tasks c ON c.task_id = st.task_id where project_id = $project_id";
		debug($getAssigned, $typehere);
		$q = execute_($getAssigned,$conn);
		$users = "";
		$f = fetch($q);
		$assigned_users = $f['assigned_users'];
		$getUsers = "SELECT * from tbl_users where user_id in ($assigned_users)";
		debug($getUsers, $typehere);
		$q = execute_($getUsers,$conn);
		while($f = fetch($q)){
			$users .= $f['first_name'].",";
		}
		debug("Users: ".$users,$typehere);
		
		for ($i = 0; $i < $intNumField; $i ++) {
          $arrCol[mysqli_fetch_field_direct($objQuery, $i)->name] = $obResult[$i];
        }
	
		$arrCol["hours"] = $hours;
		$arrCol["users"] = $users;
		
		try {
			array_push($resultArray, $arrCol);
		} catch (Exception $e) {
			debug("Error Reporting ".$e->getMessage(),$typehere);
		}
    }
	debug("Response ".json_encode(array("projects" => $resultArray)),$typehere);
    echo json_encode(array("projects" => $resultArray));
    closer($conn);
	debug("=================================================",$typehere);
}

function getDashData(){
	$conn = connect("timetracker1");
    $typehere = "getDashData";
	debug("=================================================",$typehere);
	$company_id = $_POST['company_id'];
	
	$user_id = $_POST['user_id'];
	
	if($user_id == "") $getUsers = "SELECT COUNT(*) AS users FROM tbl_users t WHERE t.user_company = '$company_id'";
	else $getUsers = "SELECT COUNT(*) AS users FROM tbl_users t WHERE t.user_id = '$user_id'";
	debug($getUsers,$typehere);
	$q = execute_($getUsers,$conn);
	$f = fetch($q);
	$users = $f['users'];
	
	if($user_id == "") $getProjects = "SELECT COUNT(*) AS projects FROM tbl_projects t WHERE t.company_id = '$company_id'";
	else $getProjects = "SELECT COUNT(*) AS projects FROM tbl_projects t WHERE project_id in (SELECT project_id FROM tbl_assigned_users a WHERE a.assigned_users LIKE '%$user_id%')";
		
	debug($getProjects,$typehere);
	$q = execute_($getProjects,$conn);
	$f = fetch($q);
	$projects = $f['projects'];
	
	if($user_id == "") $getTasks = "SELECT COUNT(*) AS tasks FROM tbl_tasks s LEFT JOIN tbl_projects p ON p.project_id = s.project_id WHERE p.company_id = '$company_id'";
	else $getTasks = "SELECT COUNT(*) AS tasks FROM tbl_tasks s WHERE s.assigned_to = '$user_id'";
	debug($getTasks,$typehere);
	$q = execute_($getTasks,$conn);
	$f = fetch($q);
	$tasks = $f['tasks'];
	
	if($user_id == "") $getTasks = "SELECT COUNT(*) AS sub_tasks FROM sub_tasks s LEFT JOIN  tbl_tasks t on t.task_id = s.task_id LEFT JOIN tbl_projects p ON p.project_id = t.project_id WHERE p.company_id = '$company_id'";
	else $getTasks = "SELECT COUNT(*) AS sub_tasks FROM tbl_assigned_users s WHERE s.assigned_users LIKE '%$user_id%'";
	debug($getTasks,$typehere);
	$q = execute_($getTasks,$conn);
	$f = fetch($q);
	$sub_tasks = $f['sub_tasks'];
	
	if($user_id == "") $getHours = "SELECT SUM(minutes) AS minutes FROM task_counter t LEFT JOIN tbl_users u ON u.user_id = t.user_id WHERE u.user_company = '$company_id'";
	else $getHours = "SELECT SUM(minutes) AS minutes FROM task_counter WHERE user_id  = '$user_id'";
	debug($getHours,$typehere);
	$q = execute_($getHours,$conn);
	$f = fetch($q);
	$minutes = $f['minutes'];
	
	$result = array();
	array_push($result, array("users" => $users,"projects"=>$projects,"tasks"=>$tasks,"sub_tasks"=>$sub_tasks,"minutes"=>$minutes));
	debug("DashData Response ".json_encode(array("dashdata" => $result)),$typehere);
	echo json_encode(array("dashdata" => $result));
	closer($conn);
	debug("=================================================",$typehere);
}

function checkUserGlobal($u_email,$u_name,$l_name,$p_name,$u_password,$user_image){
	$conn = connect("users");
    $typehere = "Register";
	debug("==================== ON GLOBAL ==========================",$typehere);
	$checkU = "SELECT * FROM tbl_users u WHERE u.user_email = '$u_email'";
	debug($checkU,$typehere);
	$q = execute_($checkU,$conn);
	$user_id = 0;
	while($f = fetch($q)){
		$user_id = $f['user_id'];
	}
	if($user_id == 0){
		$saver = "INSERT INTO tbl_users(user_email,first_name,last_name,user_phone,user_password, created_on, user_status,user_image) VALUES ('$u_email','$u_name','$l_name','$p_name',MD5('$u_password'),NOW(),'1','$user_image')";
		debug($saver,$typehere);
		execute_($saver,$conn);
		$user_id = last_id($conn);
	}else{
		$saver = "UPDATE tbl_users s set user_password = MD5('$u_password') where user_id = '$user_id'";
		debug($saver,$typehere);
		execute_($saver,$conn);
	}
	
	$conn2 = connect("pasa");
	$names = explode(" ", $u_name);
	$u_name = $names[0];
	$l_name = $names[1];
	
	$checkU = "SELECT * FROM gts_users u WHERE u.user_email = '$u_email'";
	debug($checkU,$typehere);
	$q = execute_($checkU,$conn2);
	$u = num($q);
	debug("Found ".$u." User Records",$typehere);
		
	if($u > 0) {
		$saver2 = "UPDATE gts_users set global_id = '$user_id' where user_email = '$u_email'";
	}else{
		$saver2 = "INSERT INTO gts_users(global_id,user_uname,user_lname,user_email,user_password,user_level,user_date_joined,user_status) VALUES ('$user_id','$u_name','$l_name','$u_email',MD5('$u_password'),'23',NOW(),'0')";
	}
	debug($saver2,$typehere);
	execute_($saver2,$conn2);	
	
	debug("Got User ID from Global as ".$user_id,$typehere);
	closer($conn);
	closer($conn2);
	debug("==================== OFF GLOBAL ==========================",$typehere);
	return $user_id;
}


function Register($c_name,$u_email,$u_name,$l_name,$p_name,$u_password,$user_image){
	$conn = connect("timetracker1");
    $typehere = "Register";
	debug("=================================================",$typehere);
	$checkC = "SELECT * FROM tbl_company c WHERE c.company_name = '$c_name'";
	debug($checkC,$typehere);
	$q = execute_($checkC,$conn);
	$n = num($q);
	debug("Found ".$n." Company Records",$typehere);
	$result = array();
	if($n > 0){
		array_push($result, array("bool_code" => false,"message"=>$c_name ." Already Registered"));
	}else{
		$GlobalID = checkUserGlobal($u_email,$u_name,$l_name,$p_name,$u_password,$user_image);
		debug("User Global ID ".$GlobalID,$typehere);
		
		$conn = connect("timetracker1");
		$checkU = "SELECT * FROM tbl_users u WHERE user_email = '$u_email'";
		debug($checkU,$typehere);
		$q = execute_($checkU,$conn);
		$u = num($q);
		debug("Found ".$u." User Records",$typehere);
		$saver="";
		if($u > 0) {
			$saver = "UPDATE tbl_users set global_id = '$GlobalID' where user_email = '$u_email'";
			array_push($result, array("bool_code" => false,"message"=>$u_email ." Already Registered"));
		}else{

			debug($user_image,$typehere);
			$valid_extensions = array('jpeg','jpg','png','pdf');
			global $root;
			$path = 'uploads/'; // upload directory
			if(!empty($user_image))
		   {
		   $img = $user_image;// $_FILES['user_image']['name'];
		   $tmp = $_FILES['user_image']['tmp_name'];
		   // get uploaded file's extension
		   $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
		   // can upload same image using rand function
		   $user_image = rand(1000,1000000).$img;
		   // check's valid format
		   if(in_array($ext, $valid_extensions)) 
		    {
		   $path = $path.strtolower($user_image); 

		   if(move_uploaded_file($tmp,$path)) 
		   {
		  
			$saver = "INSERT INTO tbl_users(global_id,user_email,first_name,last_name,user_phone,user_password,created_on,user_level,user_image) 
			VALUES ('$GlobalID','$u_email','$u_name','$l_name','$p_name',MD5('$u_password'),NOW(),'5','$user_image')";
			

		   }
		   } 
		   else 
		   {
		   echo 'invalid';
		   }
		   }
	

		}
		debug($saver,$typehere);
		$qs = execute_($saver,$conn);
		$ins = affected($conn);
			
		debug("Saved ".$ins." Records",$typehere);
			
		if($ins){
			$user_id = last_id($conn);
			$org_type = $_POST['org_type'];
			$saverC = "INSERT INTO tbl_company(company_name, created_on, created_by,company_type) VALUES ('$c_name',NOW(),'$user_id','$org_type')";
			debug($saverC,$typehere);
			$qc = execute_($saverC,$conn);
				
			$company_id = last_id($conn);
				
			$updateU = "UPDATE tbl_users set user_company = '$company_id' where user_id = '$user_id'";
			debug($updateU,$typehere);
			execute_($updateU,$conn);
				
			$branch_name = $c_name." MAIN";
			$bsaver = "INSERT INTO tbl_branches(branch_name, branch_desc, company_id, branch_status, created_on, created_by) VALUES ('$branch_name','$branch_name','$company_id','1',NOW(),'$user_id')";
			debug($bsaver,$typehere);
			execute_($bsaver,$conn);
			
			$docs = connect("docs");
			
			$exploded = multiexplode(array(" "), $u_name);
			$f_name = $exploded[0];
			$l_name = $exploded[1];
			
			$ins = "INSERT INTO dms_user(username, password, department, Email, last_name, first_name, can_add, can_checkin) VALUES ('$u_email',MD5('$u_password'),'1','$u_email','$l_name','$f_name','1','1')";
			debug($ins,$typehere);
			execute_($ins,$docs);
			$in = affected($docs);
			
			debug("Saved ".$in." DMS Records",$typehere);
			
			$id = last_id($docs);
			
				
			$saver = "INSERT INTO dms_admin(id,admin) VALUES ('$id',1)";
			debug($saver,$typehere);
			execute_($saver,$docs);
			$in2 = affected($docs);
			
			debug("Saved ".$in2." DMS Admin Records",$typehere);
			
				
			$email = "Dear " . $u_name . " , your KAPS STRAIT & PASA Events Account has been successfully created. Username: " . $u_email . " ,Password: ".$u_password."\nLogin here: https://www.aps.co.ke/straitLegal/index";
			debug($email, $typehere);
			push_mail($u_email, $email,"New Account","KAPS STRAIT","kapslabnotify@kaps.co.ke");			
			array_push($result, array("bool_code" => true,"message"=>"Account Successfully registered"));
		}else{
			array_push($result, array("bool_code" => false,"message"=>"An error occured,try again"));
		}

	  
	
			// $saver = "INSERT INTO tbl_users(global_id,user_email,first_name,last_name,user_phone,user_password,profile_image,created_on,user_level) 
			// VALUES ('$GlobalID','$u_email','$u_name','$l_name','$p_name',MD5('$u_password'),'$user_image',NOW(),'5')";
		
		// debug($saver,$typehere);
		// $qs = execute_($saver,$conn);
		// $ins = affected($conn);
			
		// debug("Saved ".$ins." Records",$typehere);
			
		// if($ins){
		// 	$user_id = last_id($conn);
		// 	$org_type = $_POST['org_type'];
		// 	$saverC = "INSERT INTO tbl_company(company_name, created_on, created_by,company_type) VALUES 
		// 	('$c_name',NOW(),'$user_id','$org_type')";
		// 	debug($saverC,$typehere);
		// 	$qc = execute_($saverC,$conn);
				
		// 	$company_id = last_id($conn);
				
		// 	$updateU = "UPDATE tbl_users set user_company = '$company_id' where user_id = '$user_id'";
		// 	debug($updateU,$typehere);
		// 	execute_($updateU,$conn);
				
		// 	$branch_name = $c_name." MAIN";
		// 	$bsaver = "INSERT INTO tbl_branches(branch_name, branch_desc, company_id, branch_status, created_on, created_by) VALUES ('$branch_name','$branch_name','$company_id','1',NOW(),'$user_id')";
		// 	debug($bsaver,$typehere);
		// 	execute_($bsaver,$conn);
			
		// 	$docs = connect("docs");
			
		// 	$exploded = multiexplode(array(" "), $u_name);
		// 	$u_name = $exploded[0];
		// 	$l_name = $exploded[1];
			
		// 	// $ins = "INSERT INTO dms_user(username, password, department, Email, last_name, first_name, can_add, can_checkin) VALUES ('$u_email',MD5('$u_password'),'1','$u_email','$l_name','$f_name','1','1')";
		// 	// debug($ins,$typehere);
		// 	// execute_($ins,$docs);
		// 	// $in = affected($docs);
			
		// 	// debug("Saved ".$in." DMS Records",$typehere);
			
		// 	// $id = last_id($docs);
			
				
		// 	// $saver = "INSERT INTO dms_admin(id,admin) VALUES ('$id',1)";
		// 	// debug($saver,$typehere);
		// 	// execute_($saver,$docs);
		// 	// $in2 = affected($docs);
			
		// 	// debug("Saved ".$in2." DMS Admin Records",$typehere);
			
				
		// 	$email = "Dear " . $u_name . " , your KAPS STRAIT & PASA Events Account has been successfully created. Username: " . $u_email . " ,Password: ".$u_password."\nLogin here: https://www.aps.co.ke/straitLegal/index";
		// 	debug($email, $typehere);
		// 	push_mail($u_email, $email,"New Account","KAPS STRAIT","kapslabnotify@kaps.co.ke");			
		// 	array_push($result, array("bool_code" => true,"message"=>"Account Successfully registered"));
		// }
		// else{
		// 	array_push($result, array("bool_code" => false,"message"=>"An error occured,try again"));
		// }
	}
	debug("Register Response ".json_encode(array("register" => $result)),$typehere);
	echo json_encode(array("register" => $result));
	closer($conn);
	debug("=================================================",$typehere);
}

function login($uname,$upass){
	$conn = connect("timetracker1");
    $typehere = "login";
	debug("=================================================",$typehere);
	$checkV = "SELECT u.user_id,u.user_email,u.first_name,u.user_status,u.reset_pass,c.company_id,c.company_name,c.company_type,user_level,l.level_desc,l.company_desc,l.school_desc,l.law_desc,user_dep,user_branch FROM tbl_users u
	LEFT JOIN tbl_company c ON c.company_id = u.user_company
	LEFT JOIN user_levels l ON l.level_id = u.user_level
	WHERE u.user_email = '$uname' AND u.user_password = MD5('$upass')";
	debug($checkV,$typehere);
	$q = execute_($checkV,$conn);
	$n = num($q);
	debug("Found ".$n." User Records",$typehere);
	$result = array();
	if($n < 1){
		array_push($result, array("bool_code" => false,"message"=>"Invalid Email/Password"));
	}else{
		$f = fetch($q);
		$user_status = $f['user_status'];
		$reset_pass = $f['reset_pass'];
		if($user_status == 1 || $reset_pass == 1){
			$user_id = $f['user_id'];
			$user_email = $f['user_email'];
			$first_name = $f['first_name'];
			$company_id = $f['company_id'];
			$company_name = $f['company_name'];
			$org_type = $f['company_type'];
			if($org_type == "COMPANY"){
				$level_desc = $f['company_desc'];
			}else if($org_type == "SCHOOL"){
				$level_desc = $f['school_desc'];
			}else if($org_type == "LAWFIRM"){
				$level_desc = $f['law_desc'];
			}else{
				$level_desc = $f['level_desc'];
			}
			$user_level = $f['user_level'];
			$user_dep = $f['user_dep'];
			$user_branch = $f['user_branch'];
			array_push($result, array("bool_code" => true,"user_id"=>$user_id,"user_email"=>$user_email,'first_name'=>$first_name,"company_id"=>$company_id,"company_name"=>$company_name,"level_desc"=>$level_desc,"user_level"=>$user_level,"org_type"=>$org_type,"user_dep"=>$user_dep,"user_branch"=>$user_branch));
		}else{
			array_push($result, array("bool_code" => false,"message"=>"Inactive Account"));
		}
		
		
		
	}
	debug("Login Response ".json_encode(array("login" => $result)),$typehere);
	echo json_encode(array("login" => $result));
	closer($conn);
	debug("=================================================",$typehere);
}

function resetGlobalPassword($user_email,$u_password){
	$conn = connect("users");
    $typehere = "resetPassword";
	debug("==================== ON GLOBAL ==========================",$typehere);
	
	$saver = "UPDATE tbl_users  set user_password = MD5('$u_password') where user_email = '$user_email'";
	debug($saver,$typehere);
	execute_($saver,$conn);
	
	
	$conn2 = connect("pasa");
	$saver2 = "UPDATE gts_users set user_password = MD5('$u_password') where user_email = '$user_email'";
	debug($saver2,$typehere);
	execute_($saver2,$conn2);	
	
	closer($conn);
	closer($conn2);
	debug("==================== OFF GLOBAL ==========================",$typehere);
}

function resetPassword($user_email){
	$conn = connect("timetracker1");
    $typehere = "resetPassword";
	debug("=================================================",$typehere);
    $getUser = "SELECT a.user_id,a.user_email,a.first_name FROM tbl_users a where user_email = '$user_email'";
    debug($getUser,$typehere);
	$q = execute_($getUser,$conn);
	$f = fetch($q);
	
	if($_POST['newpass'] == ""){
		$password = randomString(6);
	}else{
		$password = $_POST['newpass'];
	}
	debug("Generated Password " . $password, $typehere);
		
	$updater = "update tbl_users set user_password = MD5('$password') where user_email = '$user_email'";
	debug($updater,$typehere);
	$q = execute_($updater,$conn);
	
	$n = affected($conn);
	debug("Updated ".$n." User records",$typehere);
	$result = array();
	if($n){
		resetGlobalPassword($f['user_email'],$password);
		if($_POST['newpass'] == ""){
			$email = "Dear " . $f['first_name'] . " , KAPS STRAIT & PASA Events Password has been changed to: ".$password.". Keep it safe";
		}else{
			$email = "Dear " . $f['first_name'] . " , KAPS STRAIT & PASA Events Password has been changed.";
		}
		push_mail($f['user_email'], $email,"Password Reset","KAPS STRAIT","kapslabnotify@kaps.co.ke");
		array_push($result, array("bool_code" => true,"message"=>"Password Reset Successful"));
	}else{
		array_push($result, array("bool_code" => true,"message"=>"Password Reset Failed,Try Again"));
	}
    debug("Password Reset Response ".json_encode(array("reset" => $result)),$typehere);
	echo json_encode(array("reset" => $result));
	closer($conn);
	debug("=================================================",$typehere);
}
?>
