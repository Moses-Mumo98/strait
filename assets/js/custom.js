$(document).ready(function() {
    var page = location.pathname.split('/').slice(-1)[0];
    loadedPage = page;
    logger('document loaded ' + page);

    logger("Is Logged In "+sessionStorage.getItem("loggedin"));
	if(page == 'index' || page == 'register'){
		
	}

    if(page == 'index' || page == 'register'){
    }else{

        NameLoggedIn = sessionStorage.getItem("first_name");
        userLevel = sessionStorage.getItem("user_level");
        userDep = sessionStorage.getItem("user_dep");
        userBranch = sessionStorage.getItem("user_branch");

        $('#userlogged').html("Hello "+NameLoggedIn);
        $('#user-name').html(NameLoggedIn);
        $('#user-company').html(sessionStorage.getItem("company_name"));
        $('#menu_identity').html(sessionStorage.getItem("company_name"));
        
        $('#user-role').html(sessionStorage.getItem("level_desc"));
    
        var initial = getIntials(sessionStorage.getItem("first_name"));
        logger("Initials "+initial);
        var IntialHtml = '<figure class="avatar mr-2 avatar-sm" data-initial="'+initial+'"></figure>';
        $('#myinitials').html(IntialHtml);
    
        var userInitialsHtml = '<figure class="avatar mr-2 avatar-xl" data-initial="'+initial+'"></figure>';
        $('#userInitials').html(userInitialsHtml);
    
        if(userLevel == 1){
            //document.getElementById('add-hours').style.display = 'none';
        }
    }
    if(page == 'index' || page == 'register'){

    }else{
        changeLabels();
    }
    
    if(page == "home"){
        logger("Home Loaded");
		initCalendar();
        getDashData();
        getMyProjects();
        getPic();
    }else if(page == "projects"){
        if(userLevel == 1){
            document.getElementById('addProjo').style.display = 'none';
        }
        ListProjects();
        getPic();
    }else if(page == "project-edit"){
		localStorage.setItem("chargable", 0);
        document.getElementById('chargeFee').style.display = 'none';
        document.getElementById('chargeFee1').style.display = 'none';
        getProjectStatus();
        listDepartments(1);
        getCompanyUsers();
        getPic();
        projectID = localStorage.getItem("projectID");
        if(!projectID){
            $('#project-edit-title').html("Add New "+localStorage.getItem("pr_name"));
        }else{
            logger("Got Project ID as "+projectID);
            $('#project-edit-title').html("Edit Project");
            getProjectDetails(projectID);
        }
    }else if(page == "users"){
        if(userLevel == 1){
            document.getElementById('addUser').style.display = 'none';
        }
        ListUsers();
        getPic();
    }else if(page == "user-edit"){
        if(!userID)$('#project-edit-title').html("Add New User");
        if(userLevel < 5){
            document.getElementById('branchDiv').style.display = 'none';
        }
        if(userLevel < 4){
            document.getElementById('depDiv').style.display = 'none';
        }
		listBranch(2);
        getUserStatus();
        getUserLevels();
        getPic();
    }else if(page == "add-hours"){
        getCompanyProjects(1);
    }else if(page == "tasks"){
        if(userLevel == 1){
            document.getElementById('addTask').style.display = 'none';
        }
        listDepartments(2);
        getPic();
    }else if(page == "task-edit"){
        taskID = localStorage.getItem("taskID");
        listDepartments(2);
        getProjectStatus();
        getCompanyUsers();
        getPic()
        if(!taskID){
            $('#project-edit-title').html("Add New "+localStorage.getItem("tr_name"));
        }else{
            logger("Got Task ID as "+taskID);
            $('#project-edit-title').html("Edit Task");
            getTasksDetails(taskID);
        }
    }else if(page == "timer"){
        if(userLevel == 1){
            document.getElementById('myslider').style.display = 'none';
            

        }
        getCompanyProjects(1);
        getPic();
    }else if(page == "register"){
        getOrgTypes();
        // Upload();
        user_image = sessionStorage.getItem("user_image");
    }else if(page == "branches"){
        if(userLevel < 5){
            document.getElementById('addBranch').style.display = 'none';
        }
        getBranches();
        getPic();
    }else if(page == "branch-edit"){
        branchID = localStorage.getItem("branchID");
        getPic();
        if(!branchID){
            $('#project-edit-title').html("Add New "+localStorage.getItem("branch"));
            getPic();
        }else{
            logger("Got Branch ID as "+branchID);
            $('#project-edit-title').html("Edit "+localStorage.getItem("branch"));
            getBranchDetails(branchID);
       
        }
    }else if(page == "departments"){
        if(userLevel < 4){
            document.getElementById('addDep').style.display = 'none';
        }
        getDepartments();
        getPic();
    }else if(page == "department-edit"){
        depID = localStorage.getItem("dep_id");
        listBranch(2);
        if(!depID){
            $('#project-edit-title').html("Add New Department");
        }else{
            logger("Got Dep ID as "+depID);
            $('#project-edit-title').html("Edit Department");
            getDepartmentDetails(depID);
        }  getPic();
    }else if(page == "sub-task"){
        if(userLevel == 1){
            document.getElementById('addSubTask').style.display = 'none';
        }
        listDepartment(2);
        getPic();
    }else if(page == "sub-edit"){
		localStorage.setItem("meeting", 0);
        subID = localStorage.getItem("subID");
        listDepartments(2);
        getProjectStatus();
        getCompanyUsers();
        getPic();
        if(!subID){
            $('#project-edit-title').html("Add New "+localStorage.getItem("subtasks"));
        }else{
            logger("Got Sub Task ID as "+subID);
            $('#project-edit-title').html("Edit Sub Task");
            getSubTasksDetails(subID);
        }
    }else if(page == "timeline"){
        listDepartments(2);
        getPic();
    }else if(page == "invoice"){
        getInvoiceDetails(localStorage.getItem("sub"),localStorage.getItem("user"));
        document.getElementById('paymentRow').style.display = 'none';
        getPic();
    }else if(page == 'chart'){
		loadGantt();
	}else if(page == 'accounts'){
		ListFloatAccounts();
        getPic();
	}else if(page == "account-edit"){
        listCompanyUsersForFloat();
        getPic();
        accID = localStorage.getItem("accID");
        if(!accID){
            $('#project-edit-title').html("Add New Client Account");
        }else{
            logger("Got Acc ID as "+accID);
            $('#project-edit-title').html("Edit User Account");
            //getAccountDetails(accID);
        }
    }else if(page == "account-topup"){
        getTopMethods(1);
        getPic();
        accID = localStorage.getItem("accID");
		if(!accID){
            getAccountDetails("");
        }else{
            logger("Got Acc ID as "+accID);
			getAccountDetails(accID);
        }
        
    }else if(page == "account-statement"){
        accID = localStorage.getItem("accID");
		getAccountDetails("");
		filterTransactions("");
        getPic();
        
    }else if(page == 'throughput'){
        getCompanyUsers();
        getPic();
    }else if(page == 'invoices'){
        getCompanyUsers();
        getPic();
    }else if(page == 'profile'){
        // userID = localStorage.getItem("user_id");
        getProfile("user_id");
        getPic("user_id");
        
    }else if(page == 'setting'){
        getProfile("user_id");
        getPic(user_id);
    }else if(page == 'forgot-pass'){
        resetPass();
    }else if(page == 'confirm_pass'){
        resetPass2();
       
    }
    
    PageLabels(page);
    

});

var myurl = "http://localhost/straitLegal/API/API.php";
console.log("Using Url " + myurl);
var NameLoggedIn = "";
var projectID;
var userID;
var taskID;
var userLevel;
var branchID;
var depID;
var subID;
var accID;
var loadedPage;
var user_image;
var user_id;


$('#dms').on('click', function(e) {
    var url = "dms/index.php?u=" + localStorage.getItem("uname") + "&p=" + localStorage.getItem("upass");
    logger(url);
    window.location = url;
    return false;
});


function myFunction() {
    var x = document.getElementById("password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }

function hideShowDiv(){
    const div=document.querySelectorAll("#myDIV");
  
  for(let i=0;i<div.length;i++){
   const styles = window.getComputedStyle(div[i]);
      
      if(styles.visibility=='visible'){
      div[i].style.visibility='hidden';
      }else{
      div[i].style.visibility='visible';
      }
    }
  }


function getPic(){
    var user_id = localStorage.getItem("user_id");
    var dataString = {
        'request': 45,
        'user_id': user_id
    };
    logger(dataString);
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data){
            logger(data);
            var picJSON = JSON.parse(data);
            for (var i = 0; i < picJSON.pic.length; i++){
                var user_image = picJSON.pic[i].user_image;
                $('#profile').html('<img style="width:100% !important;height:100% !important; border-radius:100% !important" src="'+"http://"+user_image+'"/>');
                
            }
        }
    })
}





function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
});

// function readURL(input) {
//     if (input.files && input.files[0]) {
//         var reader = new FileReader();
//         reader.onload = function(e) {
//             $('#imagePreview').css('background-image', 'url('+e.target.result +')');
//             $('#imagePreview').hide();
//             $('#imagePreview').fadeIn(650);
//         }
//         reader.readAsDataURL(input.files[0]);
//     }
// }
// $("#imageUpload").change(function() {
//     readURL(this);
// });

function readURL(user_image) {
    var form_data = new FormData();
    var user_id = localStorage.getItem("user_id");
    var user_image = $('input[name = "user_image"]').val();
    console.log("rrr",user_image)
    form_data.append('user_image', $('#user_image')[0].files[0]);
    form_data.append('request', 46);
    form_data.append('user_id', user_id);
    $.ajax({
      url:myurl,
      type:"POST",
      dataType:"text",
      data: form_data,
      contentType: false,
      cache: false,
      processData: false,
      beforeSend:function(){
       $('#profile').html('<img style="width:100% !important;height:100% !important; border-radius:100% !important" src="'+user_image+'"/>');
       $('#imagePreview').show();
      },   
      success:function(data){
        
        var imageImageHolder = JSON.parse(data).update[0].user_image
        console.log("data",imageImageHolder)
        $('#profile').html(`<img style="width:100% !important;height:100% !important; border-radius:100% !important" src="http://127.0.0.1/straitLegal/API/uploads/${imageImageHolder}"/>`);
        $('#imagePreview').show();
   
      },
    });
    
}
$("#user_image").change(function() {
        readURL(this);
    });





// function Upload(){
// logger("xckjxckl");
// //var user_image= $('input[name="user_image"]').val();
// var user_image= $("#user_image").val();

// logger(user_image);
// var formdata = new FormData();
// logger(formdata);  
// var file_data = document.getElementById('user_image').files[0];
// var image_name = file_data.image_name;
// var image_extension = image_name.split('.').pop().toLowerCase();

// if(jQuery.inArray(image_extension,['jpg','jpeg']) ==-1){
//     alert("invalid image file");
// }

// formdata.append('user_image',file_data);
// formdata.append('request',1);

// // append file to your form
// btnOuter = $(".button_outer");
//         // var dataString = {
//         //     'user_image': user_image,
//         //     'request': 1
//         // }
//         // logger(formdata);
       
//         $.ajax({
//             type: "POST",
//             url: myurl,
//             data: formdata,
//             dataType: "json",
//             async: false,
//             contentType: false, 
//             processData: false,
//             success: function(data) {
//                  logger(data);
//                 // var uploadJSON = JSON.parse(data);
//                 // $('#user_image').html(uploadJSON.upload[0].user_image);
//                 	},
//             error: function(e) {

//                 logger(e);
//                 }
//     });
    
    // var btnUpload = $("#user_image");
	// btnUpload.on("change",function(e){
    //     logger("image")
    // var user_image = btnUpload.val().split('.').pop().toLowerCase();
	// 	if($.inArray(user_image, ['gif','png','jpg','jpeg']) == -1) {
	// 		$(".error_msg").text("Not an Image...");
	// 	} else {

	// 		$(".error_msg").text("");
	// 		btnOuter.addClass("file_uploading");
	// 		setTimeout(function(){
	// 			btnOuter.addClass("user_image");
	// 		},3000);
	// 		var user_image = URL.createObjectURL(e.target.files[0]);
    //         sessionStorage.setItem("uploaded_image", user_image);
	// 		setTimeout(function(){
	// 			$("#uploaded_view").append('<img src="'+user_image+'"/>').addClass("show");
	// 		},3500);
	// 	}
	// });
	// $(".file_remove").on("click", function(e){
    //     logger("hhshjdue7")
	// 	$("#uploaded_view").removeClass("show");
	// 	$("#uploaded_view").find("user_image").remove();
	// 	btnOuter.removeClass("file_uploading");
	// 	btnOuter.removeClass("file_uploaded");
       
	// });
    
    // return false;
// }

//$('#upload2').on('click', function() {
function Upload(){
    var file_data = document.getElementById('user_image').files[0];  
    var form_data = new FormData();                  
    form_data.append('user_image', file_data);
    form_data.append('request', 1);
    var c_name = $('input[name = "c_name"]').val();
    var u_name = $('input[name = "u_name"]').val();
    var l_name = $('input[name = "l_name"]').val();
    var p_name = $('input[name = "p_name"]').val();
    var u_email = $('input[name = "u_email"]').val();
    var u_password = $('input[name = "u_password"]').val();
    var u_password2 = $('input[name = "u_password2"]').val();
    var orgTypes = $('#orgTypes').val();

    
	var errorMessage;
	
	if(c_name == ""){
		errorMessage = "Company Name is Required";
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
        document.getElementById("c_name").style.borderColor = "red";
		return;	
	}
	
	if(u_name == ""){
		errorMessage = "Your first name is Required";
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
        document.getElementById("u_name").style.borderColor = "red";
		return;	
	}

    if(l_name == ""){
		errorMessage = "Your last name is Required";
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
        document.getElementById("l_name").style.borderColor = "red";
		return;	
	}
	
    if(p_name == ""){
		errorMessage = "Your phone number is Required";
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
        document.getElementById("p_name").style.borderColor = "red";
		return;	
	}

	if(u_email == ""){
		errorMessage = "Your Email is Required";
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
        document.getElementById("u_email").style.borderColor = "red";
		return;	
	}

    
	
	if(u_password == ""){
		errorMessage = "Your Password is Required";
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
        document.getElementById("u_password").style.borderColor = "red";
		return;	
	}
    
    if(u_password2 == ""){
		errorMessage = "Your Password is Required";
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
        document.getElementById("u_password2").style.borderColor = "red";
		return;	
	}
	
    if(u_password!== u_password2){
        errorMessage = "Passwords are not matching";
        document.getElementById('confrimed').innerText = errorMessage;
        document.getElementById('confrimed').style.display = 'block';
        document.getElementById("u_password  || u_password2").style.borderColor = "red";
        return false;
     }

    form_data.append('c_name', c_name);
    form_data.append('u_name', u_name);
    form_data.append('l_name', l_name);
    form_data.append('p_name', p_name);
    form_data.append('u_email', u_email);
    form_data.append('u_password', u_password);
    form_data.append('org_type', orgTypes);

   
   var saveButton = document.getElementById('registerIcon');
   saveButton.classList.add('fa-spin');

    //alert(form_data);                             
    $.ajax({
        url: myurl, // point to server-side PHP script 
        dataType: 'text',  // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'POST',
        success: function(data){
            saveButton.classList.remove('fa-spin');
			
			logger('Register Response'+data);
			
            var jsObject = JSON.parse(data);
            logger(jsObject);
            var bool_code = jsObject.register[0].bool_code;
			logger("bool_code "+bool_code);
			
			if(bool_code){
                swal(jsObject.register[0].message, "Success", 'success').then(function () {
                    window.location = "index";
                });
			}else{
				errorMessage = jsObject.register[0].message;
				document.getElementById("confrimed").innerText = errorMessage;
				document.getElementById('confrimed').style.display = 'block';
			}
        },
        error: function(e) {
			saveButton.classList.remove('fa-spin');
        }
 
           
            //alert(php_script_response); // display response from the PHP script, if any
        
     });
};


    // var btnUpload = $("#user_image");
    //     btnOuter = $(".button_outer");
    //     logger("image")
	// btnUpload.on("change",function(e){
    //     logger("image")
    // var ext = btnUpload.val().split('.').pop().toLowerCase();
	// 	if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
	// 		$(".error_msg").text("Not an Image...");
	// 	} else {

	// 		$(".error_msg").text("");
	// 		btnOuter.addClass("file_uploading");
	// 		setTimeout(function(){
	// 			btnOuter.addClass("user_image");
	// 		},3000);
	// 		var user_image = URL.createObjectURL(e.target.files[0]);
          
	// 		setTimeout(function(){
	// 			$("#uploaded_view").append('<img src="'+user_image+'"/>').addClass("show");
	// 		},3500);
	// 	}
	// });
	// $(".file_remove").on("click", function(e){
    //     logger("hhshjdue7")
	// 	$("#uploaded_view").removeClass("show");
	// 	$("#uploaded_view").find("user_image").remove();
	// 	btnOuter.removeClass("file_uploading");
	// 	btnOuter.removeClass("file_uploaded");
       
	// });
    
    var btnUpload = $("#user_image"),
		btnOuter = $(".button_outer");
	btnUpload.on("change", function(e){
		var ext = btnUpload.val().split('.').pop().toLowerCase();
		if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
			$(".error_msg").text("Not an Image...");
		} else {
			$(".error_msg").text("");
			btnOuter.addClass("file_uploading");
			setTimeout(function(){
				btnOuter.addClass("file_uploaded");
			},3000);
			var uploadedFile = URL.createObjectURL(e.target.files[0]);
			setTimeout(function(){
				$("#uploaded_view").append('<img src="'+uploadedFile+'" />').addClass("show");
			},3500);
		}
	});
	$(".file_remove").on("click", function(e){
		$("#uploaded_view").removeClass("show");
		$("#uploaded_view").find("img").remove();
		btnOuter.removeClass("file_uploading");
		btnOuter.removeClass("file_uploaded");
	});



$('#useredit').on('click', function(e) {
    logger("useredit2");
    var user_email = $('input[name = "user_email"]').val();
    var first_name = $('input[name = "first_name"]').val();
    var last_name = $('input[name = "last_name"]').val();
    var user_phone = $('input[name = "user_phone"]').val();
    var user_id = localStorage.getItem("user_id");
    
     var errorMessage;
     if(user_email == ""){
		errorMessage = "user email is required"
        //errorMessage = localStorage.getItem("user_id")+" User email is Required";
        document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
        document.getElementById("user_email").style.borderColor = "red";
		return;	
	}else{
        document.getElementById("user_email").style.borderColor = "green";
    }
	
	if(first_name == ""){
        errorMessage = "first name is required"
        //errorMessage = localStorage.getItem("user_id")+" First name is Required";
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
        document.getElementById("first_name").style.borderColor = "red";
		return;	
	}else{
        document.getElementById("first_name").style.borderColor = "green";
    }

    if(last_name == ""){
        errorMessage = "last name is required"
        //errorMessage = localStorage.getItem("user_id")+" Last name is Required";
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
        document.getElementById("last_name").style.borderColor = "red";
		return;	
	}else{
        document.getElementById("last_name").style.borderColor = "green";
    }

    if(user_phone == ""){
        errorMessage = "user phone is required"
        //errorMessage = localStorage.getItem("user_id")+" User phone is Required";
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
        document.getElementById("user_phone").style.borderColor = "red";
		return;	
	}else{
        document.getElementById("user_phone").style.borderColor = "green";
    }


    var dataString = {
        'user_email':user_email,
        'first_name':first_name,
        'last_name':last_name,
        'user_phone':user_phone,
        'user_id': user_id,
        'request':43,
        // 'user_id':sessionStorage.getItem("user_id")

    }
    logger(dataString)
    var saveButton = document.getElementById('usereditIcon');
    saveButton.classList.add('fa-spin');
	
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
			
			saveButton.classList.remove('fa-spin');
			
			logger('Settings ' + data);
			
            var jsObject = JSON.parse(data);
            logger(jsObject);
            var bool_code = jsObject.setting[0].bool_code;
			logger("bool_code "+bool_code);
			
			if(bool_code){
                sessionStorage.setItem("user_id", jsObject.setting[0].user_id);
                swal(jsObject.setting[0].message, "Success", 'success');
			}else{
				errorMessage = jsObject.setting[0].message;
				document.getElementById("confrimed").innerText = errorMessage;
				document.getElementById('confrimed').style.display = 'block';
                document.getElementById("user_email").style.borderColor = "red";
                document.getElementById("first_name").style.borderColor = "red";
		
			}
        },
        error: function(e) {
			saveButton.classList.remove('fa-spin');
        }

    });
    return false;
});



function getProfile(){
    logger("profilenejkee")
    var user_id = localStorage.getItem("user_id");
        var dataString = {
            'request': 42,
            'user_id': user_id
        };
        logger(dataString);
        $.ajax({
            type: "POST",
            url: myurl,
            data: dataString,
            success: function(data){
                logger(data);
                var profileJSON = JSON.parse(data);
                var tbHTML = "";
                logger("Length of Profile JSON " +profileJSON.profile.length);
                for (var i = 0; i < profileJSON.profile.length; i++){
                    var user_email = profileJSON.profile[i].user_email;
                    var first_name = profileJSON.profile[i].first_name;
                    var last_name = profileJSON.profile[i].last_name;
                    var user_phone = profileJSON.profile[i].user_phone;
                    
                    
                    var code;
                    var toadd;

                    $('input[name="user_email"]').val(user_email);
                    $('input[name="first_name"]').val(first_name);
                    $('input[name="last_name"]').val(last_name);
                    $('input[name="user_phone"]').val(user_phone);
                  
        //sessionStorage.setItem("profileJSON", JSON.stringify(data));


                if(userLevel == 1){
                    toadd = "None Required";
                }else{
                    toadd ="<a onclick = 'setting("+user_id+")' data-toggle='tooltip' title='' data-original-title='Edit'><i class='fas fa-pencil-alt'></i></a>";
                }
                    
                tbHTML += "<tr><td><a href='#'>"+user_email+"</a></td>"+
                '<td class="col-green font-weight-bold">'+first_name+'</td>'+
                "<td>"+last_name+"</td>"+
                "<td>"+user_phone+"</td>"+"<td><div class='badge l-bg-"+code+"'>"+toadd+"</div></td></tr>";
                }
                tbHTML = '<table class="table table-striped table-hover" id="projectsTable" style="width:100%;"><thead><tr><th>User email</th><th>First name</th><th>Last name</th><th>User phone</th><th>Edit</th></tr></thead><tbody>'+tbHTML+'</tbody></table>';           
                $('#projects-table').html(tbHTML)
                //$('#projectsHead').html(ProfileJSON.profile.length + " "tem("user_id"));
                var oTable = $('#projectsTable').DataTable({
                    "iDisplayLength": 10,
                    dom: 'Bfrtip',
                    // buttons: [
                    //     'copy', 'csv', 'excel', 'pdf', 'print'
                    // ]
                    buttons: [
                        {
                            extend: 'copyHtml5',
                            exportOptions: {
                                columns: [0,1,2,3,4]
                            }
                        },
                        {
                            extend: 'excelHtml5',
                            exportOptions: {
                                columns: [0,1,2,3,4]
                            }
                        },
                        {
                            extend: 'pdfHtml5',
                            exportOptions: {
                                columns: [0,1,2,3,4]
                            }
                        },
                        {
                            extend: 'csvHtml5',
                            exportOptions: {
                                columns: [0,1,2,3,4]
                            }
                        },
                        'colvis'
                    ]
    
                });
            },
            error: function(e) {
    
            }
    
        });
        return false;
    }

    function setting (user_id){
        localStorage.setItem("user_id", user_id);
        window.location = "setting";
        return false;
    }

function getClientInvoices(){
    var company_users = $('#company-users').val();
    var startDate = $('input[name = "startDate"]').val();
    var endDate = $('input[name = "endDate"]').val();
    
    var dataString = {
        'request': 41,
        'company_users': company_users,
        'startDate':startDate,
        'endDate':endDate
    };

    logger(dataString);
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
           
            logger(data);
            var logsJSON = JSON.parse(data);
            var tbHTML = "";
            logger("Length of Projects JSON "+logsJSON.logs.length);
            for (var i = 0; i < logsJSON.logs.length; i++) {
                var sub_id = logsJSON.logs[i].sub_id;
                var user_email = logsJSON.logs[i].user_email;
                var first_name = logsJSON.logs[i].first_name;
                var project_name = logsJSON.logs[i].project_name;
                var desc = logsJSON.logs[i].desc;
                var fee = logsJSON.logs[i].fee;
                var subtotal = logsJSON.logs[i].subtotal;
                var minutes = logsJSON.logs[i].minutes;
                var sub_progress = logsJSON.logs[i].sub_progress;
                var user_id = logsJSON.logs[i].user_id;
                var chargable = logsJSON.logs[i].chargable;
                var fee = logsJSON.logs[i].fee;
                var client_name = logsJSON.logs[i].client_name;

                var moreValue = sub_id+','+ user_id;
                var toadd = "<button class='btn btn-warning btn-icon icon-left' onclick = 'moreLogs("+moreValue+")'><i class='fas fa-ellipsis-h'></i> Details</button>";

                tbHTML += "<tr><td><a href='#'>"+first_name+"</a></td>"+
                '<td class="col-red font-weight-bold">'+project_name+'</td>'+
                '<td class="col-purple font-weight-bold">'+ConvertMinutes(minutes)+'</td>'+
                '<td class="col-green font-weight-bold">'+number_format(fee)+" "+desc+"</td>"+
                '<td class="col-blue font-weight-bold">'+number_format(subtotal)+"</td></tr>";
            }
            tbHTML = '<table class="table table-striped table-hover" id="logsTable" style="width:100%;"><thead><tr><th>Client Name</th><th>Project Name</th><th>Total Time</th><th>@</th><th>Total Amount</th></tr></thead><tbody>'+tbHTML+'</tbody></table>';           
            $('#logs-table').html(tbHTML);
            $('#logsHead').html(logsJSON.logs.length + " Record(s)");
            var oTable = $('#logsTable').DataTable({
                "iDisplayLength": 10,
                dom: 'Bfrtip',
                buttons: [
					{
						extend: 'copyHtml5',
						exportOptions: {
							columns: [0,1,2,3]
						}
					},
					{
						extend: 'excelHtml5',
						exportOptions: {
							columns: [0,1,2,3]
						}
					},
					{
						extend: 'pdfHtml5',
						exportOptions: {
							columns: [0,1,2,3]
						}
					},
					{
						extend: 'csvHtml5',
						exportOptions: {
							columns: [0,1,2,3]
						}
					},
					'colvis'
				]

            });
        },
        error: function(e) {

        }

    });
    return false;    
}

function getStaffThroughPut() {
    var company_users = $('#company-users').val();
    var startDate = $('input[name = "startDate"]').val();
    var endDate = $('input[name = "endDate"]').val();
    
    var dataString = {
        'request': 40,
        'company_users': company_users,
        'startDate':startDate,
        'endDate':endDate
    };

    logger(dataString);
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
           
            logger(data);
            var logsJSON = JSON.parse(data);
            var tbHTML = "";
            logger("Length of Projects JSON "+logsJSON.logs.length);
            for (var i = 0; i < logsJSON.logs.length; i++) {
                var sub_id = logsJSON.logs[i].sub_id;
                var user_email = logsJSON.logs[i].user_email;
                var first_name = logsJSON.logs[i].first_name;
                var project_name = logsJSON.logs[i].project_name;
                var task_name = logsJSON.logs[i].task_name;
                var sub_name = logsJSON.logs[i].sub_name;
                var counter_date = logsJSON.logs[i].counter_date;
                var minutes = logsJSON.logs[i].minutes;
                var sub_progress = logsJSON.logs[i].sub_progress;
                var user_id = logsJSON.logs[i].user_id;
                var chargable = logsJSON.logs[i].chargable;
                var fee = logsJSON.logs[i].fee;
                var client_name = logsJSON.logs[i].client_name;

                var moreValue = sub_id+','+ user_id;
                var toadd = "<button class='btn btn-warning btn-icon icon-left' onclick = 'moreLogs("+moreValue+")'><i class='fas fa-ellipsis-h'></i> Details</button>";

                tbHTML += "<tr><td><a href='#'>"+project_name+"</a></td>"+
                '<td class="col-blue font-weight-bold">'+client_name+'</td>'+
                '<td class="col-green font-weight-bold">'+user_email+"</td>"+
                "<td>"+first_name+"</td>"+
                '<td class="col-purple font-weight-bold">'+ConvertMinutes(minutes)+"</td></tr>";
            }
            tbHTML = '<table class="table table-striped table-hover" id="logsTable" style="width:100%;"><thead><tr><th>Project Name</th><th>Client Name</th><th>'+localStorage.getItem("ur_name")+' Email</th><th>'+localStorage.getItem("ur_name") +' Name</th><th>Time Logged</th></tr></thead><tbody>'+tbHTML+'</tbody></table>';           
            $('#logs-table').html(tbHTML);
            $('#logsHead').html(logsJSON.logs.length + " Record(s)");
            var oTable = $('#logsTable').DataTable({
                "iDisplayLength": 10,
                dom: 'Bfrtip',
                buttons: [
					{
						extend: 'copyHtml5',
						exportOptions: {
							columns: [0,1,2,3,4]
						}
					},
					{
						extend: 'excelHtml5',
						exportOptions: {
							columns: [0,1,2,3,4]
						}
					},
					{
						extend: 'pdfHtml5',
						exportOptions: {
							columns: [0,1,2,3,4]
						}
					},
					{
						extend: 'csvHtml5',
						exportOptions: {
							columns: [0,1,2,3,4]
						}
					},
					'colvis'
				]

            });
        },
        error: function(e) {

        }

    });
    return false;
}

function filterTransactions(ac_id){
	var startDate = $('input[name = "p_from"]').val();
    var endDate = $('input[name = "p_to"]').val();
	var company_id =  sessionStorage.getItem("company_id");
	
    var dataString = {
        'request': 39,
        'company_id': company_id,
		'startDate':startDate,
		'endDate':endDate,
		'fl_acc_id': ac_id
    };
    logger(dataString);
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
            logger(data);
            var AccountsJSON = JSON.parse(data);
            var tbHTML = "";
            logger("Length of Projects JSON "+AccountsJSON.trans.length);
            for (var i = 0; i < AccountsJSON.trans.length; i++) {
                var fl_acc_id = AccountsJSON.trans[i].fl_acc_id;
                var fl_acc_name = AccountsJSON.trans[i].fl_acc_name;
                var type_name = AccountsJSON.trans[i].type_name;
                var method_desc = AccountsJSON.trans[i].method_desc;
                var fl_prev_amtkes = AccountsJSON.trans[i].fl_prev_amtkes;
                var fl_amt_kes = AccountsJSON.trans[i].fl_amt_kes;
                var fl_balancekes = AccountsJSON.trans[i].fl_balancekes;
                var trans_date = AccountsJSON.trans[i].trans_date;
                var first_name = AccountsJSON.trans[i].first_name;

                tbHTML += "<tr><td><a href='#'>"+fl_acc_name+"</a></td>"+
				 '<td align = "right" class="col-purple font-weight-bold">'+type_name+'</td>'+
                '<td class="col-green font-weight-bold">'+method_desc+'</td>'+
                "<td align = 'right'>"+number_format(fl_prev_amtkes)+"</td>"+
                "<td align = 'right'>"+number_format(fl_amt_kes)+"</td>"+
                "<td align = 'right'>"+number_format(fl_balancekes)+"</td>"+
                "<td>"+trans_date+"</td>"+
				"<td>"+first_name+"</td></tr>";
            }
            tbHTML = '<table class="table table-striped table-hover" id="statementsTable" style="width:100%;"><thead><tr><th>Client Name</th><th>Trans Type</th><th>Payment Method</th><th>Previous Balance</th><th>Trans Amount</th><th>New Balance</th><th>Trans Date</th><th>Company User</th></tr></thead><tbody>'+tbHTML+'</tbody></table>';           
            $('#statement-table').html(tbHTML);
            $('#statementHead').html(AccountsJSON.trans.length + " Client Account Statement Records");
            var oTable = $('#statementsTable').DataTable({
                "iDisplayLength": 10,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]

            });
        },
        error: function(e) {

        }

    });
    return false;
}

$('#t_filter').on('click', function(e) {
    var acc_id = $('#company-user').val();
	filterTransactions(acc_id);
    return false;
});

function accountStatement  (id){
    localStorage.setItem("accID", id);
    window.location = "account-statement";
    return false;
}

$('#accStatement').on('click', function(e) {
    localStorage.setItem("accID", "");
    window.location = "account-statement";
    return false;
});

$('#topSaver').on('click', function(e) {
	logger("topSaver Now");
    var acc_bal = $('input[name = "acc_bal"]').val();
    var t_amount = $('input[name = "t_amount"]').val();
    var trans_ref = $('input[name = "trans_ref"]').val();
    var payment_method = $('#payment-method').val();
    var acc_id = $('#company-user').val();
	
	var errorMessage;
	
	if(t_amount == "" ||t_amount < 1){
		errorMessage = "Topup Amount is Required";
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
        document.getElementById("t_amount").style.borderColor = "red";
		return;	
	}else{
        document.getElementById("t_amount").style.borderColor = "green";
    }
	
	if(trans_ref == ""){
		errorMessage = "Trans Reference is Required";
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
        document.getElementById("trans_ref").style.borderColor = "red";
		return;	
	}else{
        document.getElementById("trans_ref").style.borderColor = "green";
    }

    if(payment_method == ""){
		errorMessage = "Specify Payment Method";
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
		return;	
	}
	
	
    var dataString = {
        'fl_acc_id': acc_id,
        'acc_bal': acc_bal,
        't_amount': t_amount,
        'trans_ref': trans_ref,
        'payment_method': payment_method,
        'request': 38,
        'company_id':sessionStorage.getItem("company_id"),
        'user_id':sessionStorage.getItem("user_id")
    };
    logger(dataString);
	
	var saveButton = document.getElementById('topsaverIcon');
    saveButton.classList.add('fa-spin');
	
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
			
			saveButton.classList.remove('fa-spin');
			
			logger('Account Add Response ' + data);
			
            var jsObject = JSON.parse(data);
            logger(jsObject);
            var bool_code = jsObject.accounttopup[0].bool_code;
			logger("bool_code "+bool_code);
			
			if(bool_code){
				 swal(jsObject.accounttopup[0].message, "Success", 'success').then(function () {
                    window.location = "accounts";
                });
			}else{
				errorMessage = jsObject.accounttopup[0].message;
				document.getElementById("confrimed").innerText = errorMessage;
				document.getElementById('confrimed').style.display = 'block';
			}
        },
        error: function(e) {
			saveButton.classList.remove('fa-spin');
        }

    });
    return false;
});

function getTopMethods(type) {
    logger("Listing TopMethods");
	
    var dataString = {
        'request': 37,
        'type': type
    };

    logger(dataString);
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
            logger(data);
            var methodJSON = JSON.parse(data);
            var methods = '<option></option>';
            logger("Length Ya " + methodJSON + " Ni " + methodJSON.methods.length);
            for (var i = 0; i < methodJSON.methods.length; i++) {
                if (i == 0) {
                    methods += "<option value='" + methodJSON.methods[i].method_id + "' selected>" + methodJSON.methods[i].method_desc + "</option>";
                } else {
                    methods += "<option value='" + methodJSON.methods[i].method_id + "'>" + methodJSON.methods[i].method_desc + "</option>";
                }
            }
            $("#payment-method").html(methods);
        },
        error: function(e) {

        }

    });
    return false;
}

function getAccountDetails(id){
    logger("Get Project Details for "+id);
    var dataString = {
        'request': 34,
		'company_id':sessionStorage.getItem("company_id"),
        'fl_acc_id':id
    };
    logger(dataString);
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
            logger(data);
            var AccountJSON = JSON.parse(data);
			var details = '<option></option>';
            logger("Length Ya " + AccountJSON + " Ni " + AccountJSON.accounts.length);
            for (var i = 0; i < AccountJSON.accounts.length; i++) {
                if (i == 0) {
                    details += "<option value='" + AccountJSON.accounts[i].fl_acc_id + "' data-amt = '" + AccountJSON.accounts[i].fl_acc_currentamtkes + "'>" + AccountJSON.accounts[i].first_name + "</option>";
                } else {
                    details += "<option value='" + AccountJSON.accounts[i].fl_acc_id + "' data-amt = '" + AccountJSON.accounts[i].fl_acc_currentamtkes + "'>" + AccountJSON.accounts[i].first_name + "</option>";
                }
            }
            $("#company-user").html(details).trigger('change');
        },
        error: function(e) {

        }

    });
    return false;
}

$("#company-user").change(function () {
    var amt = $(this).find(':selected').data('amt');
    $("#acc_bal").val(amt);
});

$('#accSaver').on('click', function(e) {
	logger("accSaver Now");
    var acc_bal = $('input[name = "acc_bal"]').val();
    var user_id = $('#company-users').val();
	
    var dataString = {
        'fl_acc_userid': user_id,
        'acc_bal': acc_bal,
        'request': 36,
        'company_id':sessionStorage.getItem("company_id"),
        'user_id':sessionStorage.getItem("user_id")
    };
    logger(dataString);
	
	var saveButton = document.getElementById('accsaverIcon');
    saveButton.classList.add('fa-spin');
	
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
			
			saveButton.classList.remove('fa-spin');
			
			logger('Account Add Response ' + data);
			
            var jsObject = JSON.parse(data);
            logger(jsObject);
            var bool_code = jsObject.accountadd[0].bool_code;
			logger("bool_code "+bool_code);
			
			if(bool_code){
				 swal(jsObject.accountadd[0].message, "Success", 'success').then(function () {
                    window.location = "accounts";
                });
			}else{
				errorMessage = jsObject.accountadd[0].message;
				document.getElementById("confrimed").innerText = errorMessage;
				document.getElementById('confrimed').style.display = 'block';
			}
        },
        error: function(e) {
			saveButton.classList.remove('fa-spin');
        }

    });
    return false;
});

function listCompanyUsersForFloat() {
    logger("Listing Company Users");
    var company_id =  sessionStorage.getItem("company_id");
    var limit;
    if(loadedPage == "account-edit"){
        limit = 1;
    }

    var dataString = {
        'request': 35,
        'company_id': company_id,
        'limit':limit
    };

    logger(dataString);
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
            logger(data);
            var usersJSON = JSON.parse(data);
            var users = '<option></option>';
            logger("Length Ya " + usersJSON + " Ni " + usersJSON.users.length);
            for (var i = 0; i < usersJSON.users.length; i++) {
                if (i == 0) {
                    users += "<option value='" + usersJSON.users[i].user_id + "' selected>" + usersJSON.users[i].first_name + "</option>";
                } else {
                    users += "<option value='" + usersJSON.users[i].user_id + "'>" + usersJSON.users[i].first_name + "</option>";
                }
            }
            $("#company-users").html(users);
        },
        error: function(e) {

        }

    });
    return false;
}

function loadGantt(){
	logger("Loading Chart");
	anychart.onDocumentReady(function () {
        anychart.data.loadJsonFile(
          'https://cdn.anychart.com/samples/gantt-working-with-data/gantt-tree-from-json/data.json',
          function (data) {
            var chart = anychart.fromJson(data);
            chart.container('container');
            chart.draw();
            chart.fitAll();
          }
        );
      });
	  return false;
}

function ListFloatAccounts() {
    var company_id =  sessionStorage.getItem("company_id");
	
    var dataString = {
        'request': 34,
        'company_id': company_id
    };
    logger(dataString);
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
           //{"accounts":[{"fl_acc_id":"1","first_name":"Michael Kibet","fl_acc_currentamtkes":"0","fl_acc_lasttopup":"0","fl_acc_lasttopupdate":"0000-00-00 00:00:00"}]}
            logger(data);
            var AccountsJSON = JSON.parse(data);
            var tbHTML = "";
            logger("Length of Projects JSON "+AccountsJSON.accounts.length);
            for (var i = 0; i < AccountsJSON.accounts.length; i++) {
                var fl_acc_id = AccountsJSON.accounts[i].fl_acc_id;
                var first_name = AccountsJSON.accounts[i].first_name;
                var fl_acc_currentamtkes = AccountsJSON.accounts[i].fl_acc_currentamtkes;
                var fl_acc_lasttopup = AccountsJSON.accounts[i].fl_acc_lasttopup;
                var fl_acc_lasttopupdate = AccountsJSON.accounts[i].fl_acc_lasttopupdate;
                var fl_created_on = AccountsJSON.accounts[i].fl_created_on;

                var toadd;
                if(userLevel == 1){
                    toadd = "None Required";
                }else{
                    toadd ="<a onclick = 'topupAccount("+fl_acc_id+")' data-toggle='tooltip' title='' data-original-title='Topup'><i class='fas fa-hand-holding-usd'></i></a>"+
					"<a onclick = 'accountStatement("+fl_acc_id+")' data-toggle='tooltip' title='' data-original-title='Activity'><i class='fas fa-list-ul'></i></a><a data-toggle='tooltip' title='' data-original-title='Delete'><i class='far fa-trash-alt'></i></a>";
                }

                tbHTML += "<tr><td><a href='#'>"+first_name+"</a></td>"+
				 '<td align = "right" class="col-purple font-weight-bold">'+number_format(fl_acc_currentamtkes)+'</td>'+
                '<td class="col-green font-weight-bold">'+fl_created_on+'</td>'+
                "<td align = 'right'>"+number_format(fl_acc_lasttopup)+"</td>"+
                "<td>"+fl_acc_lasttopupdate+"</td>"+
				"<td>"+toadd+"</td></tr>";
            }
            tbHTML = '<table class="table table-striped table-hover" id="projectsTable" style="width:100%;"><thead><tr><th>Client Name</th><th>Account Balance</th><th>Created On</th><th>Last Transaction</th><th>Last Transaction Date</th><th>Action</th></tr></thead><tbody>'+tbHTML+'</tbody></table>';           
            $('#projects-table').html(tbHTML);
            $('#projectsHead').html(AccountsJSON.accounts.length + " Client Accounts");
            var oTable = $('#projectsTable').DataTable({
                "iDisplayLength": 10,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]

            });
        },
        error: function(e) {

        }

    });
    return false;
}

function topupAccount (id){
    localStorage.setItem("accID", id);
    window.location = "account-topup";
    return false;
}

$('#addAccount').on('click', function(e) {
    localStorage.setItem("accID", "");
    window.location = "account-edit";
    return false;
});

$('#accTopup').on('click', function(e) {
    localStorage.setItem("accID", "");
    window.location = "account-topup";
    return false;
});

function startPayment(){
    document.getElementById('paymentRow').style.display = 'block';
    return false;
}

function mpesaPayer(){
	logger('mpesa_pay clicked');
	var amount = document.getElementById("totaldue").textContent;
	logger("Amount is: "+amount);
	
	var ticket = document.getElementById("invoice-number").textContent;
	logger("Ticket is: "+ticket);
	
	var mobile = $('#mobile').val();
	logger("mobile is: "+mobile);
	
	if (mobile == "") {
        alert("Enter Phone Number");
        return;
    }
	
	 var dataString = {
        'request': 1,
        'regKey': 'abc123',
        'msisdn': mobile,
        'respondUrl': respondUrl,
        'billAmount': 1,
        'reference': ticket
    };
    logger(dataString);
	var saveButton = document.getElementById('mpesaIcon');
    saveButton.classList.add('fa-spin');
    $.ajax({
        type: "POST",
        url: apiurl,
        data: dataString,
        success: function(data) {
			saveButton.classList.remove('fa-spin');
            logger('M-PESA Pay Response: ' + data);
			var jsObject = JSON.parse(data);
            var message = jsObject.mpesapayment[0].message;
            document.getElementById("confrimed").innerText = message;
			document.getElementById('confrimed').style.display = 'block';
        },
        error: function(e) {
			saveButton.classList.remove('fa-spin');
         
        }
    });
	
	
    return false;
}

function ccPayer(){
	debug('cc_pay clicked');
	var amount = document.getElementById("totaldue").textContent;
	debug("Amount is: "+amount);
	
	var ticket = document.getElementById("invoice-number").textContent;
	debug("Ticket is: "+ticket);
	
	var f_name = $('#f_name').val();
	debug("f_name is: "+f_name);
	
	var m_name = $('#m_name').val();
	debug("m_name is: "+m_name);
	
	var l_name = $('#l_name').val();
	debug("l_name is: "+l_name);
	
	var c_no = $('#c_no').val();
	debug("c_no is: "+c_no);
	
	var cvc = $('#cvc').val();
	debug("cvc is: "+cvc);
	
	var e_month = $('#e_month').val();
	debug("e_month is: "+e_month);
	
	var e_year = $('#e_year').val();
	debug("e_year is: "+e_year);
	
	if (f_name == "" || m_name == "" || l_name == "" || c_no == "" || cvc == "" || e_month == "" || e_year == "") {
        alert("Enter All the Fields");
        return;
    }
	
	 var dataString = {
        'request': 2,
        'regKey': 'abc123',
        'respondUrl': respondUrl,
        'billAmount': 1,
		'reference': ticket,
        'c_no': c_no,
		'cvs': cvc,
		'f_name': f_name,
		'm_name': m_name,
		'l_name': l_name,
		'e_month': e_month,
		'e_year': e_year,
    };
    debug(dataString);
	var saveButton = document.getElementById('ccIcon');
    saveButton.classList.add('fa-spin');
    $.ajax({
        type: "POST",
        url: apiurl,
        data: dataString,
        success: function(data) {
			saveButton.classList.remove('fa-spin');
			document.open();
			document.write(data);
			document.close();
        },
        error: function(e) {
			saveButton.classList.remove('fa-spin');
        }
    });
	
	
    return false;
}

function getInvoiceDetails(sub,user){
    logger("Get Invoice Details for "+sub+" User "+user);
    var dataString = {
        'request': 33,
        'sub': sub,
        'user':user
    };
    logger(dataString);
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
           logger(data);
           var logsJSON = JSON.parse(data);
           var invoice_number = logsJSON.logs[0].sub_id;
		   document.getElementById('invoice-number').innerHTML = "PASA"+invoice_number;
		   document.getElementById('eventname').innerHTML = logsJSON.logs[0].project_name;
		   document.getElementById('taskname').innerHTML = logsJSON.logs[0].task_name;
		   document.getElementById('myname').innerHTML = logsJSON.logs[0].first_name;
		   document.getElementById('myemail').innerHTML = logsJSON.logs[0].user_email;
		   
		   document.getElementById('eventdate').innerHTML = logsJSON.logs[0].counter_date;
		   document.getElementById('sub_name').innerHTML = logsJSON.logs[0].sub_name;
		   document.getElementById('fee').innerHTML = number_format(logsJSON.logs[0].fee) +" "+logsJSON.logs[0].desc;
		   document.getElementById('minutes').innerHTML = ConvertMinutes(logsJSON.logs[0].minutes);
		   //var total = Math.round(Number(logsJSON.logs[0].minutes)/60 * Number(logsJSON.logs[0].fee));
		   document.getElementById('total').innerHTML = number_format(logsJSON.logs[0].subtotal);
		   document.getElementById('subtotal').innerHTML = number_format(logsJSON.logs[0].subtotal);
		   document.getElementById('totaldue').innerHTML = number_format(logsJSON.logs[0].subtotal);
		   
		   
		   
        },
        error: function(e) {

        }

    });
    return false;
}

function meetingStatus(val){
    logger("Meeting Gotten as "+val);
    if(val == 1){
        localStorage.setItem("meeting", 1);
    }else{
        localStorage.setItem("meeting", 0);
    }
 }

function eventStatus(val){
    logger("Status Gotten as "+val);
    if(val == 1){
        document.getElementById('chargeFee').style.display = 'block';
        document.getElementById('chargeFee1').style.display = 'block';
        localStorage.setItem("chargable", 1);
    }else{
        document.getElementById('chargeFee').style.display = 'none';
        document.getElementById('chargeFee1').style.display = 'none';
        localStorage.setItem("chargable", 0);
    }
 }
function getSubTasksDetails(id){
    logger("Get Task Details for "+id);
    var dataString = {
        'request': 30,
        'sub_id':id
    };
    logger(dataString);
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
            logger(data);
            var tasksJSON = JSON.parse(data);
            logger("Length Ya " + tasksJSON + " Ni " + tasksJSON.subtasks.length);
            for (var i = 0; i < tasksJSON.subtasks.length; i++) {
                $('input[name="t_name"]').val(tasksJSON.subtasks[i].sub_name);
                $('#project-edit-title').html("Edit: "+tasksJSON.subtasks[i].sub_name);
                $('input[name="t_desc"]').val(tasksJSON.subtasks[i].sub_desc);
                
                $("#project_name").val(tasksJSON.subtasks[i].project_name).trigger('change');
                $("#company-users").val(tasksJSON.subtasks[i].users).trigger('change');
                $("#project-status").val(tasksJSON.subtasks[i].status_desc).trigger('change');
                $("#task_name").val(tasksJSON.subtasks[i].task_name).trigger('change');

                var start_date = tasksJSON.subtasks[i].start_date;
                var start_time = tasksJSON.subtasks[i].start_time;

                if(start_date) $('input[name="startDate"]').val(start_date);
                if(start_time) $('input[name="startTime"]').val(start_time);

                var task_progress = tasksJSON.subtasks[i].sub_progress;
                document.getElementById("myRange").value = task_progress;
                document.getElementById("demo").innerHTML = task_progress+" %";
            }
        },
        error: function(e) {

        }

    });
    return false;
}

function logTime(){
    var timeworked = $('#hidden_hours').val();
    logger("timeworked "+timeworked);
    var task_name = $('#task-name').val();
    var project_name = $('#project-name').val();
    var dep_name = $('#dep_name').val();
    var sub_name =  $('#sub-name').val();

    var slider = document.getElementById("myRange");
    var task_progress  = slider.value;

    if(userLevel == 1){
        
    }else{
        if(task_progress < 1){
            errorMessage = "Specify Progress";
            document.getElementById("confrimed").innerText = errorMessage;
            document.getElementById('confrimed').style.display = 'block';
            return;	
        }
    }


    var dataString = {
        'hours': timeworked,
        'project_name': project_name,
        'sub_id': sub_name,
        'project_name': project_name,
        'task_name':task_name,
        'user_email': sessionStorage.getItem("user_id"),
        'dep_name': dep_name,
        'request': 13,
        'company_id':sessionStorage.getItem("company_id"),
        'added_by':sessionStorage.getItem("user_id"),
        'progress':task_progress
    };
    logger(dataString);
	
	var saveButton = document.getElementById('timersaverIcon');
    saveButton.classList.add('fa-spin');
	
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
			
			saveButton.classList.remove('fa-spin');
			
			logger('Task Add Response ' + data);
			
            var jsObject = JSON.parse(data);
            logger(jsObject);
            var bool_code = jsObject.hoursadd[0].bool_code;
			logger("bool_code "+bool_code);
			
			if(bool_code){
                swal(jsObject.hoursadd[0].message, "Success", 'success').then(function () {
                    window.location = "timer";
                });
			}else{
				errorMessage = jsObject.hoursadd[0].message;
				document.getElementById("confrimed").innerText = errorMessage;
				document.getElementById('confrimed').style.display = 'block';
			}
        },
        error: function(e) {
			saveButton.classList.remove('fa-spin');
        }

    });
    return false;
}

$('#logout').on('click', function(e) {
    sessionStorage.setItem("loggedin", "");
    window.location = "index";
    sessionStorage.clear();
    localStorage.clear();
    return false;

});

$('#subtaskSaver').on('click', function(e) {
	logger("subtaskSaver Now");
    var t_name = $('input[name = "t_name"]').val();
    var t_desc = $('input[name = "t_desc"]').val();
    var t_dur = $('input[name = "t_dur"]').val();
    var dep_name = $('#dep_name').val();
    var project_name = $('#project_name').val();
    var task_name = $('#task_name').val();

    var company_users = $('#company-users').val();
    var project_status = $('#project-status').val();

    var startDate = $('input[name = "startDate"]').val();
    var startTime = $('input[name = "startTime"]').val();

    var errorMessage;
	
	if(t_name == ""){
		errorMessage = "Name is Required";
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
        document.getElementById("t_name").style.borderColor = "red";
		return;	
	}else{
        document.getElementById("t_name").style.borderColor = "green";
    }
	
	if(t_desc == ""){
		errorMessage = "Description is Required";
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
        document.getElementById("t_desc").style.borderColor = "red";
		return;	
	}else{
        document.getElementById("t_desc").style.borderColor = "green";
    }

    if(project_name == ""){
		errorMessage = "Specify "+localStorage.getItem("pr_name");
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
		return;	
	}
	
	if(project_status == ""){
		errorMessage = "Specify Status";
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
		return;	
	}
	
	if(company_users == ""){
		errorMessage = "Specify Assigned Users";
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
		return;	
    }
    logger("User Level "+userLevel);

    var slider = document.getElementById("myRange");
    var task_progress  = slider.value;

    var dataString = {
        't_name': t_name,
        't_desc': t_desc,
        'dep_name': dep_name,
        'project_name': project_name,
        'task_name':task_name,
        'company_users': company_users,
        'project_status': project_status,
        'startDate':startDate,
        'startTime':startTime,
        'request': 29,
        'company_id':sessionStorage.getItem("company_id"),
        'user_id':sessionStorage.getItem("user_id"),
        'task_progress':task_progress,
        'sub_id':subID,
        'meeting':localStorage.getItem("meeting"),
        't_dur':t_dur
    };
    logger(dataString);
	
	var saveButton = document.getElementById('subtasksaverIcon');
    saveButton.classList.add('fa-spin');
	
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
			
			saveButton.classList.remove('fa-spin');
			
			logger('Task Add Response ' + data);
			
            var jsObject = JSON.parse(data);
            logger(jsObject);
            var bool_code = jsObject.taskadd[0].bool_code;
			logger("bool_code "+bool_code);
			
			if(bool_code){
                swal(jsObject.taskadd[0].message, "Success", 'success');
			}else{
				errorMessage = jsObject.taskadd[0].message;
				document.getElementById("confrimed").innerText = errorMessage;
				document.getElementById('confrimed').style.display = 'block';
			}
        },
        error: function(e) {
			saveButton.classList.remove('fa-spin');
        }

    });
    return false;
});

$('#printInvoice').click(function(){
    Popup($('.invoice')[0].outerHTML);
    function Popup(data) 
    {
        window.print();
        return true;
    }
});

function moreLogs(sub,user){
    logger("More Logs for sub "+sub+" User "+user);
    return false;
}

function invoice(sub,user){
    logger("Invoice for sub "+sub+" User "+user);
    localStorage.setItem("sub",sub);
    localStorage.setItem("user",user);
    window.location = 'invoice';
    return false;
}

function getSubTasksLogs() {
    var company_id =  sessionStorage.getItem("company_id");
    var task_name = $('#task_name').val();
    var project_name = $('#project_name').val();
    var dep_name = $('#dep_name').val();

    var user_id;

    if(userLevel == 1){
        user_id = sessionStorage.getItem("user_id");
    }
    
    var dataString = {
        'request': 31,
        'company_id': company_id,
        'task_name':task_name,
        'project_name':project_name,
        'dep_name':dep_name,
        'user_id':user_id
    };
    logger(dataString);
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
           
            logger(data);
            var logsJSON = JSON.parse(data);
            var tbHTML = "";
            logger("Length of Projects JSON "+logsJSON.logs.length);
            for (var i = 0; i < logsJSON.logs.length; i++) {
                var sub_id = logsJSON.logs[i].sub_id;
                var user_email = logsJSON.logs[i].user_email;
                var first_name = logsJSON.logs[i].first_name;
                var project_name = logsJSON.logs[i].project_name;
                var task_name = logsJSON.logs[i].task_name;
                var sub_name = logsJSON.logs[i].sub_name;
                var counter_date = logsJSON.logs[i].counter_date;
                var minutes = logsJSON.logs[i].minutes;
                var sub_progress = logsJSON.logs[i].sub_progress;
                var user_id = logsJSON.logs[i].user_id;
                var chargable = logsJSON.logs[i].chargable;
                var fee = logsJSON.logs[i].fee;

                var moreValue = sub_id+','+ user_id;
                var toadd;

                if(chargable == 1){
                    toadd = "<button class='btn btn-primary btn-icon icon-left' onclick = 'invoice("+moreValue+")'><i class='fas fa-credit-card'></i>Invoice</button>";
                    toadd += "<button class='btn btn-warning btn-icon icon-left' onclick = 'moreLogs("+moreValue+")'><i class='fas fa-ellipsis-h'></i> More</button>";
                }else{
                    toadd = "<button class='btn btn-warning btn-icon icon-left' onclick = 'moreLogs("+moreValue+")'><i class='fas fa-ellipsis-h'></i> More</button>";
                }

                tbHTML += "<tr><td><a href='#'>"+sub_name+"</a></td>"+
                '<td class="col-green font-weight-bold">'+task_name+'</td>'+
                '<td class="col-purple font-weight-bold">'+project_name+'</td>'+
                "<td>"+user_email+"</td>"+
                "<td>"+first_name+"</td>"+
                "<td>"+counter_date+"</td>"+
                "<td>"+ConvertMinutes(minutes)+"</td>"+
                "<td class='align-middle'><div class='progress-text'>"+sub_progress+"%</div><div class='progress' data-height='6' style='height: 6px;'><div class='progress-bar' data-width="+sub_progress+"% style='width: "+sub_progress+"%;'></div></div></td>"+
                "<td>"+toadd+"</td></tr>";
            }
            tbHTML = '<table class="table table-striped table-hover" id="logsTable" style="width:100%;"><thead><tr><th>'+localStorage.getItem("subtask")+'</th><th>'+localStorage.getItem("tr_name")+'</th><th>'+localStorage.getItem("pr_name")+'</th><th>'+localStorage.getItem("ur_name")+' Email</th><th>'+localStorage.getItem("ur_name") +' Name</th><th>'+localStorage.getItem("subtask")+' Date</th><th>Time Recorded</th><th>'+localStorage.getItem("subtask")+' Progress</th><th>Actions</th></tr></thead><tbody>'+tbHTML+'</tbody></table>';           
            $('#logs-table').html(tbHTML);
            $('#logsHead').html(logsJSON.logs.length + " "+localStorage.getItem("subtasks")+" Logs");
            var oTable = $('#logsTable').DataTable({
                "iDisplayLength": 10,
                dom: 'Bfrtip',
                buttons: [
					{
						extend: 'copyHtml5',
						exportOptions: {
							columns: [0,1,2,3,4,5,6,7]
						}
					},
					{
						extend: 'excelHtml5',
						exportOptions: {
							columns: [0,1,2,3,4,5,6,7]
						}
					},
					{
						extend: 'pdfHtml5',
						exportOptions: {
							columns: [0,1,2,3,4,5,6,7]
						}
					},
					{
						extend: 'csvHtml5',
						exportOptions: {
							columns: [0,1,2,3,4,5,6,7]
						}
					},
					'colvis'
				]

            });
        },
        error: function(e) {

        }

    });
    return false;
}



function getSubTasks() {
    var company_id =  sessionStorage.getItem("company_id");
    var task_name = $('#task_name').val();
    var project_name = $('#project_name').val();
    var dep_name = $('#dep_name').val();
    
    var dataString = {
        'request': 30,
        'company_id':company_id,
        'task_name':task_name,
        'project_name':project_name,
        'dep_name':dep_name
    };
    logger(dataString);
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
           
            logger(data);
            var taskJSON = JSON.parse(data);
            var tbHTML = "";
            logger("Length of Projects JSON "+taskJSON.subtasks.length);
            for (var i = 0; i < taskJSON.subtasks.length; i++) {
                var sub_id = taskJSON.subtasks[i].sub_id;
                var sub_name = taskJSON.subtasks[i].sub_name;
                var sub_desc = taskJSON.subtasks[i].sub_desc;
                var task_progress = taskJSON.subtasks[i].sub_progress;
                var start_date = taskJSON.subtasks[i].start_date;
                var start_time = taskJSON.subtasks[i].start_time;
                var status = taskJSON.subtasks[i].status_desc;
                var users = taskJSON.subtasks[i].users;
                var created_on = taskJSON.subtasks[i].created_on;
                var task_name = taskJSON.subtasks[i].task_name;

                if (!start_date) start_date = "N/A";

                var code;
                if(status == "New"){
                    code = "orange";
                }else if(status == "Started"){
                    code = "purple";
                }else if(status == "Completed"){
                    code = "green";
                }else if(status == "Suspended"){
                    code = "red";
                }

                var users_array = users.split(',');
                var userHTML="";
                for(var d = 0; d < users_array.length; d++) {
                    var staff_name = users_array[d].replace(/^\s*/, "").replace(/\s*$/, "");
                    if(staff_name != ""){
                        userHTML += '<li class="team-member team-member-sm"><figure class="avatar mr-2 avatar-sm bg-secondary text-white" data-initial="'+getIntials(staff_name)+'"></figure></li>';
                    }
                }
                var toadd;
                if(userLevel == 1){
                    toadd= "N/A"
                }else{
                    toadd = "<a onclick = 'EditSubTask("+sub_id+")' data-toggle='tooltip' title='' data-original-title='Edit'><i class='fas fa-pencil-alt'></i></a><a onclick= 'hidetask("+sub_id+")' data-toggle='tooltip' title='' data-original-title='Delete'><i class='far fa-trash-alt'></i></a>";
                }

                tbHTML += "<tr><td><a href='#'>"+sub_name+"</a></td>"+
                '<td class="col-green font-weight-bold">'+sub_desc+'</td>'+
                '<td class="col-purple font-weight-bold">'+task_name+'</td>'+
                '<td class="text-truncate"><ul class="list-unstyled order-list m-b-0 m-b-0">'+userHTML+'</ul></td>'+
                "<td>"+created_on+"</td>"+
                "<td><div class='badge l-bg-"+code+"'>"+status+"</div></td>"+
                "<td class='align-middle'><div class='progress-text'>"+task_progress+"%</div><div class='progress' data-height='6' style='height: 6px;'><div class='progress-bar' data-width="+task_progress+"% style='width: "+task_progress+"%;'></div></div></td>"+
                "<td>"+start_date+" "+start_time+"</td>"+
                "<td>"+toadd+"</td></tr>";
            }
            tbHTML = '<table class="table table-striped table-hover" id="projectsTable" style="width:100%;"><thead><tr><th>Name</th><th>Description</th><th>'+localStorage.getItem("tr_name")+'</th><th>Assigned To</th><th>Created On</th><th>Status</th><th>Progress</th><th>Start Time</th><th>Actions</th></tr></thead><tbody>'+tbHTML+'</tbody></table>';           
            $('#projects-table').html(tbHTML);
            $('#projectsHead').html(taskJSON.subtasks.length + " "+localStorage.getItem("subtasks"));
            var oTable = $('#projectsTable').DataTable({
                "iDisplayLength": 10,
                dom: 'Bfrtip',
                buttons: [
					{
						extend: 'copyHtml5',
						exportOptions: {
							columns: [0,1,2,3,4,5,6,7]
						}
					},
					{
						extend: 'excelHtml5',
						exportOptions: {
							columns: [0,1,2,3,4,5,6,7]
						}
					},
					{
						extend: 'pdfHtml5',
						exportOptions: {
							columns: [0,1,2,3,4,5,6,7]
						}
					},
					{
						extend: 'csvHtml5',
						exportOptions: {
							columns: [0,1,2,3,4,5,6,7]
						}
					},
					'colvis'
				]

            });
        },
        error: function(e) {

        }

    });
    return false;
}

function EditSubTask(id){
    logger("Editting "+id);
    localStorage.setItem("subID", id);
    window.location = "sub-edit";
    return false;
}

function hidetask(id){
    var sub_id =localStorage.getItem("subID")
    var dataString = {
        'request':50,
        'sub_id':sub_id
    }
    logger("Deleting "+id);
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
    localStorage.setItem("subID", id);
    window.location = "sub-task";
        
        }
})
    return false;
    
}

function listSubTasks() {
    var company_id =  sessionStorage.getItem("company_id");
    var task_name = $('#task-name').val();
    var project_name = $('#project-name').val();
    var sub_name = $('#sub-name').val();
    logger("Getting Tasks For Project: "+sub_name);
   
    var dataString = {
        'request': 30,
        'company_id': company_id,
        'task_name':task_name,
        'sub_name':sub_name,
        'project-name':project_name
   
    };
    logger(dataString);

    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
            logger(data);
            var taskJSON = JSON.parse(data);
            var subtasks = '<option></option>';
            logger("Length Ya " + taskJSON + " Ni " + taskJSON.subtasks.length);
            for (var i = 0; i < taskJSON.subtasks.length; i++) {
                if (i == 0) {
                    subtasks += "<option value='" + taskJSON.subtasks[i] + taskJSON.subtasks[i].sub_id + "</option>";
                } else {
                    subtasks += "<option value='" + taskJSON.subtasks[i] + taskJSON.subtasks[i].sub_id + "</option>";
                }
            }
            $("#sub-name").html(subtasks);
        },
        error: function(e) {

        }

    });
    return false;
}

function listProjectTasks() {
    logger("Listing Project Tasks");
    var company_id =  sessionStorage.getItem("company_id");
    var project_name = $('#project_name').val();
    var task_name = $('#task-name').val();
    var dep_name = $('#dep_name').val();

    var user_id;
    if(userLevel < 3){
        user_id = sessionStorage.getItem("user_id");
    }
    
    var dataString = {
        'request': 28,
        'company_id': company_id,
        'task_name':task_name,
        'project_name':project_name,
        'dep_name':dep_name,
        'user_id':user_id
    };
    logger(dataString);
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
            logger(data);
            var taskJSON = JSON.parse(data);
            var tasks = '<option></option>';
            logger("Length Ya " + taskJSON + " Ni " + taskJSON.tasks.length);
            for (var i = 0; i < taskJSON.tasks.length; i++) {
                if (i == 0) {
                    tasks += "<option value='" + taskJSON.tasks[i].task_name + "' selected>" + taskJSON.tasks[i].task_name + "</option>";
                } else {
                    tasks += "<option value='" + taskJSON.tasks[i].task_name + "'>" + taskJSON.tasks[i].task_name + "</option>";
                }
            }
            $("#task_name").html(tasks);
            if(loadedPage == "sub-edit"){

            }else if(loadedPage == "timeline"){
                getSubTasksLogs();
            }else{
                getSubTasks();
            }
        },
        error: function(e) {

        }

    });
    return false;
}

function getProjectDetails(id){
    logger("Get Project Details for "+id);
    var dataString = {
        'request': 4,
        'project_id':id
    };
    logger(dataString);
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
            logger(data);
            var projectJSON = JSON.parse(data);
            logger("Length Ya " + projectJSON + " Ni " + projectJSON.projects.length);
            for (var i = 0; i < projectJSON.projects.length; i++) {
                $('input[name="p_name"]').val(projectJSON.projects[i].project_name);
                $('#project-edit-title').html("Edit "+localStorage.getItem("pr_name")+": "+projectJSON.projects[i].project_name);
                $('input[name="p_desc"]').val(projectJSON.projects[i].project_desc);
                
                $("#dep_name").val(projectJSON.projects[i].dep_name).trigger('change');
                $("#project-status").val(projectJSON.projects[i].status_desc).trigger('change');
                //load file status: -1 represents new ,0 represents Started, 1 Represents completed while 2 .
                // if(BranchJSON.branches[i].branch_status=="0"){
                //     document.getElementById("status_dropdown").selectedIndex= "1";
                //     }
                //     else if{
    
                //         document.getElementById("status_dropdown").selectedIndex= "2";
                //     }
                //     else{
    
                //         document.getElementById("status_dropdown").selectedIndex= "0";
                //     }

                var start_date = projectJSON.projects[i].start_date;
                var end_date = projectJSON.projects[i].end_date;

                if(start_date) $('input[name="startDate"]').val(start_date);
                if(end_date) $('input[name="endDate"]').val(end_date);
            }
            
        },
        error: function(e) {

        }

    });
    return false;
}

function listDepartments(page) {
    var company_id =  sessionStorage.getItem("company_id");
	
	var branch;
	if(loadedPage == "user-edit"){
		branch = $('#branch-name').val();
    }else{
        if(userLevel == 4){
            branch = sessionStorage.getItem("user_branch");
        }
    }
    
    var dep_id;
    if(userLevel < 4){
        dep_id  = sessionStorage.getItem("user_dep");
    }

    var dataString = {
        'request': 25,
        'company_id':company_id,
        'branch':branch,
        'dep_id':dep_id
    };

    logger(dataString);
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
            logger(data);
            var departmentsJSON = JSON.parse(data);
            var departments = '<option></option>';
            logger("Length Ya " + departmentsJSON + " Ni " + departmentsJSON.departments.length);
            for(var i = 0; i < departmentsJSON.departments.length; i++) {
                if (i == 0) {
                    departments += "<option value='" + departmentsJSON.departments[i].dep_name + "' selected>" + departmentsJSON.departments[i].dep_name + "</option>";
                } else {
                    departments += "<option value='" + departmentsJSON.departments[i].dep_name + "'>" + departmentsJSON.departments[i].dep_name + "</option>";
                }
            }
            $("#dep_name").html(departments);
            if(page == 2){
                getDepartmentProjects();
            }
        },
        error: function(e) {

    1    }

    });
    return false;
}

function listDepartment(page) {
    var company_id =  sessionStorage.getItem("company_id");
	
	var branch;
	if(loadedPage == "user-edit"){
		branch = $('#branch-name').val();
    }else{
        if(userLevel == 4){
            branch = sessionStorage.getItem("user_branch");
        }
    }
    
    var dep_id;
    if(userLevel < 4){
        dep_id  = sessionStorage.getItem("user_dep");
    }

    var dataString = {
        'request': 53,
        'company_id':company_id,
        'branch':branch,
        'dep_id':dep_id
    };

    logger(dataString);
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
            logger(data);
            var departmentJSON = JSON.parse(data);
            var department = '<option></option>';
            logger("Length Ya " + departmentJSON + " Ni " + departmentJSON.department.length);
            for(var i = 0; i < departmentJSON.department.length; i++) {
                if (i == 0) {
                    department += "<option value='" + departmentJSON.department[i].dep_name + "' selected>" + departmentJSON.department[i].dep_name + "</option>";
                } else {
                    department += "<option value='" + departmentJSON.department[i].dep_name + "'>" + departmentJSON.department[i].dep_name + "</option>";
                }
            }
            $("#dep_name").html(department);
            if(page == 2){
                getDepartmentProjects();
            }
        },
        error: function(e) {

    1    }

    });
    return false;
}


function getProjectTasks() {
    var company_id =  sessionStorage.getItem("company_id");
    var project_name = $('#project_name').val();
    var dep_name = $('#dep_name').val();

    var user_id;
    if(userLevel < 3){
        user_id = sessionStorage.getItem("user_id");
    }
    
    var dataString = {
        'request': 28,
        'company_id': company_id,
        'project_name':project_name,
        'dep_name':dep_name,
        'user_id':user_id
    };
    logger(dataString);
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
           
            logger(data);
            var taskJSON = JSON.parse(data);
            var tbHTML = "";
            logger("Length of Projects JSON "+taskJSON.tasks.length);
            for (var i = 0; i < taskJSON.tasks.length; i++) {
                var task_id = taskJSON.tasks[i].task_id;
                var task_name = taskJSON.tasks[i].task_name;
                var task_desc = taskJSON.tasks[i].task_desc;
                var user_email = taskJSON.tasks[i].user_email;
                var start_date = taskJSON.tasks[i].start_date;
                var end_date = taskJSON.tasks[i].end_date;
                var status = taskJSON.tasks[i].status_desc;
                var project_name = taskJSON.tasks[i].project_name;
                var created_on = taskJSON.tasks[i].created_on;

                var client_name = taskJSON.tasks[i].client_name;

                if (!start_date) start_date = "N/A";
                if (!end_date) end_date = "N/A";

                var code;
                if(status == "New"){
                    code = "orange";
                }else if(status == "Started"){
                    code = "purple";
                }else if(status == "Completed"){
                    code = "green";
                }else if(status == "Suspended"){
                    code = "red";
                }

                tbHTML += "<tr><td><a href='#'>"+task_name+"</a></td>"+
                '<td class="col-green font-weight-bold">'+task_desc+'</td>'+
                '<td class="col-purple font-weight-bold">'+project_name+'</td>'+
                '<td class="col-blue font-weight-bold">'+client_name+'</td>'+
                "<td>"+user_email+"</td>"+
                "<td>"+created_on+"</td>"+
                "<td><div class='badge l-bg-"+code+"'>"+status+"</div></td>"+
                "<td>"+start_date+"</td>"+
                "<td>"+end_date+"</td>"+
                "<td><a onclick = 'EditTask("+task_id+")' data-toggle='tooltip' title='' data-original-title='Edit'><i class='fas fa-pencil-alt'></i></a><a onclick = 'HideTasks("+task_id+")' data-toggle='tooltip' title='' data-original-title='Delete'><i class='far fa-trash-alt'></i></a></td></tr>";
            }
            tbHTML = '<table class="table table-striped table-hover" id="projectsTable" style="width:100%;"><thead><tr><th>Name</th><th>Description</th><th>'+localStorage.getItem("pr_name")+'</th><th>Client Name</th><th>Assigned To</th><th>Created On</th><th>Status</th><th>Start Date</th><th>End Date</th><th>Actions</th></tr></thead><tbody>'+tbHTML+'</tbody></table>';           
            $('#projects-table').html(tbHTML);
            $('#projectsHead').html(taskJSON.tasks.length + " "+localStorage.getItem("tr_name"));
            var oTable = $('#projectsTable').DataTable({
                "iDisplayLength": 10,
                dom: 'Bfrtip',
                buttons: [
					{
						extend: 'copyHtml5',
						exportOptions: {
							columns: [0,1,2,3,4,5,6,7]
						}
					},
					{
						extend: 'excelHtml5',
						exportOptions: {
							columns: [0,1,2,3,4,5,6,7]
						}
					},
					{
						extend: 'pdfHtml5',
						exportOptions: {
							columns: [0,1,2,3,4,5,6,7]
						}
					},
					{
						extend: 'csvHtml5',
						exportOptions: {
							columns: [0,1,2,3,4,5,6,7]
						}
					},
					'colvis'
				]

            });
        },
        error: function(e) {

        }

    });
    return false;
}

function getDepartmentProjects(){
    logger("Listing Department Tasks");
    var dep_name = $('#dep_name').val();
    logger("Getting Project for department: "+dep_name);
    
    var dataString = {
        'request': 27,
        'dep_name':dep_name
    };
    logger(dataString);
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
            logger(data);
            var projectsJSON = JSON.parse(data);
            var projects = '<option></option>';
            logger("Length Ya " + projectsJSON + " Ni " + projectsJSON.projects.length);
            for (var i = 0; i < projectsJSON.projects.length; i++) {
                if (i == 0) {
                    projects += "<option value='" + projectsJSON.projects[i].project_name + "' selected>" + projectsJSON.projects[i].project_name + "</option>";
                } else {
                    projects += "<option value='" + projectsJSON.projects[i].project_name + "'>" + projectsJSON.projects[i].project_name + "</option>";
                }
            }
            $("#project_name").html(projects);
            logger("At Page "+loadedPage);
            if(loadedPage == "sub-task" || loadedPage == "sub-edit" || loadedPage == "timeline"){
                listProjectTasks();
            }else{
                getProjectTasks();
            }
        },
        error: function(e) {

        }

    });
    return false;
}

$('#depSaver').on('click', function(e) {
	logger("depSaver Now");
    var d_name = $('input[name = "d_name"]').val();
    var branch_name = $('#branch-name').val();
    var index = document.getElementById("status_dropdown").selectedIndex;
    if(index==0){

        index=1;
    }
    else{

        index=0;
    }

    var errorMessage;

	if(d_name == ""){
		errorMessage = "Department Name is Required";
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
        document.getElementById("d_name").style.borderColor = "red";
		return;	
	}else{
        document.getElementById("d_name").style.borderColor = "green";
    }
	
    var dataString = {
        'd_name': d_name,
        'branch_name': branch_name,
        'dep_status': index,
        'request': 26,
        'company_id':sessionStorage.getItem("company_id"),
        'user_id':sessionStorage.getItem("user_id"),
        'dep_id':localStorage.getItem("dep_id")
    };

    logger(dataString);
	
	var saveButton = document.getElementById('depsaverIcon');
    saveButton.classList.add('fa-spin');
	
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
			
			saveButton.classList.remove('fa-spin');
			
			logger('Dep Add Response ' + data);
			
            var jsObject = JSON.parse(data);
            logger(jsObject);
            var bool_code = jsObject.depadd[0].bool_code;
			logger("bool_code "+bool_code);
			
			if(bool_code){
                swal(jsObject.depadd[0].message, "Success", 'success');
			}else{
				errorMessage = jsObject.depadd[0].message;
				document.getElementById("confrimed").innerText = errorMessage;
				document.getElementById('confrimed').style.display = 'block';
			}
        },
        error: function(e) {
			saveButton.classList.remove('fa-spin');
        }

    });
    return false;
});

function getDepartmentDetails(id){
    logger("Get Department Details for "+id);
    var dataString = {
        'request': 25,
        'dep_id':id
    };
    logger(dataString);
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
            logger(data);
            var DepartmentJSON = JSON.parse(data);
            logger("Length Ya " + DepartmentJSON + " Ni " + DepartmentJSON.departments.length);
            for (var i = 0; i < DepartmentJSON.departments.length; i++) {
                $('input[name="d_name"]').val(DepartmentJSON.departments[i].dep_name);
                $('#project-edit-title').html("Edit Department: "+DepartmentJSON.departments[i].dep_name);
                $("#branch-name").val(DepartmentJSON.departments[i].branch_name).trigger('change');
                
                if(DepartmentJSON.departments[i].dep_status=="0"){
                    document.getElementById("status_dropdown").selectedIndex= "1";
                    }
                    else{
    
                        document.getElementById("status_dropdown").selectedIndex= "0";
                    }//document.getElementById('branch-name').value(DepartmentJSON.departments[i].branch_name).trigger('change');
            }
        },
        error: function(e) {

        }

    });
    return false;
}



function listBranches(page) {
    var company_id =  sessionStorage.getItem("company_id");

    var branch;
    if(userLevel < 5){
        branch = sessionStorage.getItem("user_branch");
    }

    var dataString = {
        'request': 23,
        'company_id':company_id,
        'branch_id':branch
    };

    logger(dataString);
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
            logger(data);
            var branchesJSON = JSON.parse(data);
            var branches = '<option></option>';
            logger("Length Ya " + branchesJSON + " Ni " + branchesJSON.branches.length);
            for (var i = 0; i < branchesJSON.branches.length; i++) {
                if (i == 0) {
                    branches += "<option value='" + branchesJSON.branches[i].branch_name + "' selected>" + branchesJSON.branches[i].branch_name + "</option>";
                } else {
                    branches += "<option value='" + branchesJSON.branches[i].branch_name + "'>" + branchesJSON.branches[i].branch_name + "</option>";
                }
            }
            $("#branch-name").html(branches);
			if(page == 2){
				listDepartments(1);
			}
        },
        error: function(e) {

        }

    });
    return false;
}

function listBranch(page) {
    var company_id =  sessionStorage.getItem("company_id");

    var branch;
    if(userLevel < 5){
        branch = sessionStorage.getItem("user_branch");
    }

    var dataString = {
        'request': 52,
        'company_id':company_id,
        'branch_id':branch
    };

    logger(dataString);
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
            logger(data);
            var branchJSON = JSON.parse(data);
            var branch = '<option></option>';
            logger("Length Ya " + branchJSON + " Ni " + branchJSON.branch.length);
            for (var i = 0; i < branchJSON.branch.length; i++) {
                if (i == 0) {
                    branch += "<option value='" + branchJSON.branch[i].branch_name + "' selected>" + branchJSON.branch[i].branch_name + "</option>";
                } else {
                    branch += "<option value='" + branchJSON.branch[i].branch_name + "'>" + branchJSON.branch[i].branch_name + "</option>";
                }
            }
            $("#branch-name").html(branch);
            if(page == 2){
				listDepartment(1);
			}
			
        },
        error: function(e) {

        }

    });
    return false;
}

function listBranches(page) {
    var company_id =  sessionStorage.getItem("company_id");

    var branch;
    if(userLevel < 5){
        branch = sessionStorage.getItem("user_branch");
    }

    var dataString = {
        'request': 23,
        'company_id':company_id,
        'branch_id':branch
    };

    logger(dataString);
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
            logger(data);
            var branchesJSON = JSON.parse(data);
            var branches = '<option></option>';
            logger("Length Ya " + branchesJSON + " Ni " + branchesJSON.branches.length);
            for (var i = 0; i < branchesJSON.branches.length; i++) {
                if (i == 0) {
                    branches += "<option value='" + branchesJSON.branches[i].branch_name + "' selected>" + branchesJSON.branches[i].branch_name + "</option>";
                } else {
                    branches += "<option value='" + branchesJSON.branches[i].branch_name + "'>" + branchesJSON.branches[i].branch_name + "</option>";
                }
            }
            $("#branch-name").html(branches);
			if(page == 2){
				listDepartments(1);
			}
        },
        error: function(e) {

        }

    });
    return false;
}


function editDep (id){
    localStorage.setItem("dep_id", id);
    window.location = "department-edit";
    return false;
}


// function hideDep (id){
//     localStorage.setItem("dep_id", id);
//     window.location = "departments";
//     return false;
// }

function hideDep(id){
    var dep_id =localStorage.getItem("dep_id")
    var message = $(this).data('confirm');
    var dataString = {
        'request':54,
        'dep_id':dep_id
    }
    logger("Deleting "+id);
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
    // localStorage.setItem("dep_id", id);
    // window.location = "departments";
        
      		
    var jsObject = JSON.parse(data);
    logger(jsObject);
    var bool_code = jsObject.hideDepartment[0].bool_code;
    logger("bool_code "+bool_code);
    
    if(bool_code){
        localStorage.setItem("dep_id", jsObject.hideDepartment[0].dep_id);
          swal({
            title: "Are you sure ??",
            text: message, 
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            swal("Department has been deleted!", {
              icon: "success",
            });
            localStorage.setItem("dep_id", id);
            window.location = "departments";
          } else {
            swal("Department has not been deleted!");
          }
        });
    
    }
        
        }
})
    return false;
}



function updateDep (id){
    localStorage.setItem("dep_id", id);
    window.location = "departments";
    return false;
}

$('#addDep').on('click', function(e) {
    localStorage.setItem("dep_id", "");
    window.location = "department-edit";
    return false;
});

$('#addProjo').on('click', function(e) {
    localStorage.setItem("projectID", "");
    window.location = "project-edit";
    return false;
});

function editProject (id){
    localStorage.setItem("projectID", id);
    window.location = "project-edit";
    return false;
}



function getDepartments() {
    var company_id =  sessionStorage.getItem("company_id");
    
    var dep_id;
    var branch;
    if(userLevel < 4){
        dep_id = sessionStorage.getItem("user_dep");
    }

    if(userLevel < 5){
        branch = sessionStorage.getItem("user_branch");
    }

    var dataString = {
        'request': 25,
        'company_id': company_id,
        'dep_id':dep_id,
        'branch_id':branch
    };

    logger(dataString);
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
           
            logger(data);
            var departmentsJSON = JSON.parse(data);
            var tbHTML = "";
            logger("Length of departmentsJSON "+departmentsJSON.departments.length);
            for (var i = 0; i < departmentsJSON.departments.length; i++) {
                var dep_id = departmentsJSON.departments[i].dep_id;
                var dep_name = departmentsJSON.departments[i].dep_name;
                var branch_name = departmentsJSON.departments[i].branch_name;
                var created_on = departmentsJSON.departments[i].created_on; 
                var dep_status = departmentsJSON.departments[i].dep_status; 
                var code;
                var status_desc;
                if(dep_status == "1"){
                    code = "green";
                    status_desc ="Open";
                }else {
                    code = "red";
                    status_desc ="Closed";
                }
                var toadd= "";
                if(userLevel < 3){

                }else{
                    toadd = "<a onclick = 'editDep("+dep_id+")' data-toggle='tooltip' title='' data-original-title='Edit'><i class='fas fa-pencil-alt'></i></a><a onclick= 'hideDep("+dep_id+")' data-toggle='tooltip' title='' data-original-title='Delete'><i class='far fa-trash-alt'></i></a>";
                }
                tbHTML += "<tr><td><a href='#'>"+dep_name+"</a></td>"+
                '<td class="col-green font-weight-bold">'+branch_name+'</td>'+
                "<td>"+created_on+"</td>"+
                "<td><div class='badge l-bg-"+code+"'>"+status_desc+"</div></td>"+
                "<td>"+toadd+"</td></tr>";
                // tbHTML += "<tr><td><a href='#'>"+dep_name+"</a></td>"+
                // '<td class="col-green font-weight-bold">'+branch_name+'</td>'+
                // "<td>"+created_on+"</td>"+"<td><div class='badge l-bg-"+code+"'>"+status_desc+"</div></td>"+
                // "<td>"+toadd+"</td></tr>";
            }
            tbHTML = '<table class="table table-striped table-hover" id="projectsTable" style="width:100%;"><thead><tr><th>Name</th><th>'+localStorage.getItem("branch")+'</th><th>Created On</th><th>Status</th><th>Actions</th></tr></thead><tbody>'+tbHTML+'</tbody></table>';           
            $('#projects-table').html(tbHTML);
            //$('#projectsHead').html(ProjectJSON.projects.length + " Project(s)");
            var oTable = $('#projectsTable').DataTable({
                "iDisplayLength": 10,
                dom: 'Bfrtip',
                buttons: [
					{
						extend: 'copyHtml5',
						exportOptions: {
							columns: [0,1,2]
						}
					},
					{
						extend: 'excelHtml5',
						exportOptions: {
							columns: [0,1,2]
						}
					},
					{
						extend: 'pdfHtml5',
						exportOptions: {
							columns: [0,1,2]
						}
					},
					{
						extend: 'csvHtml5',
						exportOptions: {
							columns: [0,1,2]
						}
					},
					'colvis'
				]

            });
        },
        error: function(e) {

        }

    });
    return false;
}

function getBranchDetails(id){
    logger("Get Branch Details for "+taskID);
    var dataString = {
        'request': 23,
        'branch_id':id
    };
    logger(dataString);
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
            logger(data);
            var BranchJSON = JSON.parse(data);
    
            logger("Length Ya " + BranchJSON + " Ni " + BranchJSON.branches.length);
            for (var i = 0; i < BranchJSON.branches.length; i++) {


                logger("Branch Status "+BranchJSON.branches[i].branch_status);
            
                $('input[name="p_name"]').val(BranchJSON.branches[i].branch_name);
                $('#project-edit-title').html("Edit "+localStorage.getItem("branch")+" : "+BranchJSON.branches[i].branch_name);
                $('input[name="p_desc"]').val(BranchJSON.branches[i].branch_desc);
//load branch status: 0 represents Closed while 1 Represents Closed.
                if(BranchJSON.branches[i].branch_status=="0"){
                document.getElementById("status_dropdown").selectedIndex= "1";
                }
                else{

                    document.getElementById("status_dropdown").selectedIndex= "0";
                }
            }
        },
        error: function(e) {

        }

    });
    return false;
}

function editBranch(id){
    localStorage.setItem("branchID", id);
    window.location = "branch-edit";
    return false;
}

function hideBranch(id){
    var branch_id = localStorage.getItem("branchID");
    var message = $(this).data('confirm');
    var dataString = {
        'request':51,
        'branch_id':branch_id
    }
    logger("hideBranch "+id);


    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
  
    // window.location = "branches";
    		
    var jsObject = JSON.parse(data);
    logger(jsObject);
    var bool_code = jsObject.hidebranch[0].bool_code;
    logger("bool_code "+bool_code);
    
    if(bool_code){
        localStorage.setItem("branch", jsObject.hidebranch[0].branch_id);
          swal({
            title: "Are you sure ??",
            text: message, 
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            swal("Branch has been deleted!", {
              icon: "success",
            });
            localStorage.setItem("branchID", id);
            window.location = "branches";
          } else {
            swal("Branch has not been deleted!");
          }
        });
    
    }
        
        }
})
    return false;
}





function updateBranch(id){
    localStorage.setItem("branchID", id);
    window.location = "branches";
    return false;
};

$('#addBranch').on('click', function(e) {
    localStorage.setItem("branchID", "");
    window.location = "branch-edit";
    return false;
});

function updateBranch() {
    logger("hhcjjc")
    var branch;
    if(userLevel < 5){
        branch = sessionStorage.getItem("user_branch");
    }
    var dataString = {
        'request': 47,
        'branch_id':branch,
        //'company_id':company_id
    };

    logger(dataString);
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
           logger(data);
           ///localStorage.setItem("branchID", id);
           //window.location = "branches";
           return false;
           
    },
    
            });
        }
    

function getBranches() {
    var company_id =  sessionStorage.getItem("company_id");
    logger("User Level "+userLevel);
    var branch;
    if(userLevel < 5){
        branch = sessionStorage.getItem("user_branch");
    }
    var dataString = {
        'request': 23,
        'branch_id':branch,
        'company_id': company_id
    };

    logger(dataString);
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
           
            logger(data);
            var BranchJSON = JSON.parse(data);
            var tbHTML = "";
            logger("Length of BranchJSON "+BranchJSON.branches.length);
            for (var i = 0; i < BranchJSON.branches.length; i++) {
                var branch_id = BranchJSON.branches[i].branch_id;
                var branch_name = BranchJSON.branches[i].branch_name;
                var branch_desc = BranchJSON.branches[i].branch_desc;
                var created_on = BranchJSON.branches[i].created_on;
                var branch_status = BranchJSON.branches[i].branch_status;

                var code;
                var status_desc;
                if(branch_status == "1"){
                    code = "green";
                    status_desc ="Open";
                }else {
                    code = "red";
                    status_desc ="Closed";
                }
                var toadd = "";
                if(userLevel < 5){ 
                
                }else{
                toadd="<a onclick='editBranch("+branch_id+")' data-toggle='tooltip' title='' data-original-title='Edit'><i class='fas fa-pencil-alt'></i></a><a onclick= 'hideBranch("+branch_id+")' data-toggle='tooltip' title='' data-original-title='Delete'><i class='far fa-trash-alt'></i></a>";
                }

                tbHTML += "<tr><td><a href='#'>"+branch_name+"</a></td>"+
                '<td class="col-green font-weight-bold">'+branch_desc+'</td>'+
                "<td>"+created_on+"</td>"+
                "<td><div class='badge l-bg-"+code+"'>"+status_desc+"</div></td>"+
                "<td>"+toadd+"</td></tr>";
            }
            tbHTML = '<table class="table table-striped table-hover" id="projectsTable" style="width:100%;"><thead><tr><th>Name</th><th>Description</th><th>Created On</th><th>Status</th><th>Actions</th></tr></thead><tbody>'+tbHTML+'</tbody></table>';           
            $('#projects-table').html(tbHTML);
            //$('#projectsHead').html(ProjectJSON.projects.length + " Project(s)");
            var oTable = $('#projectsTable').DataTable({
                "iDisplayLength": 10,
                dom: 'Bfrtip',
                buttons: [
					{
						extend: 'copyHtml5',
						exportOptions: {
							columns: [0,1,2,3]
						}
					},
					{
						extend: 'excelHtml5',
						exportOptions: {
							columns: [0,1,2,3]
						}
					},
					{
						extend: 'pdfHtml5',
						exportOptions: {
							columns: [0,1,2,3]
						}
					},
					{
						extend: 'csvHtml5',
						exportOptions: {
							columns: [0,1,2,3]
						}
					},
					'colvis'
				]

            });
        },
        error: function(e) {

        }

    });
    return false;
}

$('#branchSaver').on('click', function(e) {
	logger("branchSaver Now");
    var p_name = $('input[name = "p_name"]').val();
    var p_desc = $('input[name = "p_desc"]').val();
    var index = document.getElementById("status_dropdown").selectedIndex;

    if(index==0){

        index=1;
    }
    else{

        index=0;
    }



    var errorMessage;

	if(p_name == ""){
		errorMessage = localStorage.getItem("branch")+" Name is Required";
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
        document.getElementById("p_name").style.borderColor = "red";
		return;	
	}else{
        document.getElementById("p_name").style.borderColor = "green";
    }
	
	if(p_desc == ""){
		errorMessage = localStorage.getItem("branch")+" Description is Required";
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
        document.getElementById("p_desc").style.borderColor = "red";
		return;	
	}else{
        document.getElementById("p_desc").style.borderColor = "green";
    }
	
    var dataString = {
        'p_name': p_name,
        'p_desc': p_desc,
        'request': 24,
        'branch_status':index,
        'company_id':sessionStorage.getItem("company_id"),
        'user_id':sessionStorage.getItem("user_id"),
        'branch_id':localStorage.getItem("branchID")
    };

    logger(dataString);
	
	var saveButton = document.getElementById('branchsaverIcon');
    saveButton.classList.add('fa-spin');
	
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
			
			saveButton.classList.remove('fa-spin');
			
			logger('Project Add Response ' + data);
			
            var jsObject = JSON.parse(data);
            logger(jsObject);
            var bool_code = jsObject.branchadd[0].bool_code;
			logger("bool_code "+bool_code);
			
			if(bool_code){
                swal(jsObject.branchadd[0].message, "Success", 'success');
			}else{
				errorMessage = jsObject.branchadd[0].message;
				document.getElementById("confrimed").innerText = errorMessage;
				document.getElementById('confrimed').style.display = 'block';
			}
        },
        error: function(e) {
			saveButton.classList.remove('fa-spin');
        }

    });
    return false;
});

function getOrgTypes() {
    var dataString = {
        'request': 22
    };
    logger(dataString);
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
            logger(data);
            var typesJSON = JSON.parse(data);
            var types = '<option></option>';
            logger("Length Ya " + typesJSON + " Ni " + typesJSON.types.length);
            for (var i = 0; i < typesJSON.types.length; i++) {
                if (i == 0) {
                    types += "<option value='" + typesJSON.types[i].type_name + "' selected>" + typesJSON.types[i].type_name + "</option>";
                } else {
                    types += "<option value='" + typesJSON.types[i].type_name + "'>" + typesJSON.types[i].type_name + "</option>";
                }
            }
            $("#orgTypes").html(types);
        },
        error: function(e) {

        }

    });
    return false;
}

function getTasksDetails(taskID){
    logger("Get Task Details for "+taskID);
    var dataString = {
        'request': 15,
        'task_id':taskID
    };
    logger(dataString);
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
            logger(data);
            var tasksJSON = JSON.parse(data);
            logger("Length Ya " + tasksJSON + " Ni " + tasksJSON.tasks.length);
            for (var i = 0; i < tasksJSON.tasks.length; i++) {
                $('input[name="t_name"]').val(tasksJSON.tasks[i].task_name);
                $('#project-edit-title').html("Edit Task: "+tasksJSON.tasks[i].task_name);
                $('input[name="t_desc"]').val(tasksJSON.tasks[i].task_desc);
                
                $("#project-name").val(tasksJSON.tasks[i].project_name).trigger('change');
                $("#company-users").val(tasksJSON.tasks[i].user_email).trigger('change');
                $("#project-status").val(tasksJSON.tasks[i].status_desc).trigger('change');

                /*document.getElementById('project-name').value = tasksJSON.tasks[i].project_name;
                document.getElementById('company-users').value = tasksJSON.tasks[i].user_email;
                document.getElementById('project-status').value = tasksJSON.tasks[i].status_desc;*/

                var start_date = tasksJSON.tasks[i].start_date;
                var end_date = tasksJSON.tasks[i].end_date;

                if(start_date) $('input[name="startDate"]').val(start_date);
                if(end_date) $('input[name="endDate"]').val(end_date);

                var task_progress = tasksJSON.tasks[i].task_progress;
                document.getElementById("myRange").value = task_progress;
                document.getElementById("demo").innerHTML = task_progress+" %";
            }
        },
        error: function(e) {

        }

    });
    return false;
}

$('#taskSaver').on('click', function(e) {
	logger("taskSaver Now");
    var t_name = $('input[name = "t_name"]').val();
    var t_desc = $('input[name = "t_desc"]').val();
    var project_name = $('#project_name').val();
    var company_users = $('#company-users').val();
    var project_status = $('#project-status').val();

    var startDate = $('input[name = "startDate"]').val();
    var endDate = $('input[name = "endDate"]').val();

    var errorMessage;

    if(startDate > endDate){
        errorMessage = "Deadline should be > than Start Time";
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
        return;
	}
	
	if(t_name == ""){
		errorMessage = "Name is Required";
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
        document.getElementById("t_name").style.borderColor = "red";
		return;	
	}else{
        document.getElementById("t_name").style.borderColor = "green";
    }
	
	if(t_desc == ""){
		errorMessage = "Description is Required";
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
        document.getElementById("t_desc").style.borderColor = "red";
		return;	
	}else{
        document.getElementById("t_desc").style.borderColor = "green";
    }

    if(project_name == ""){
		errorMessage = "Specify "+localStorage.getItem("pr_name");
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
		return;	
	}
	
	if(project_status == ""){
		errorMessage = "Specify Status";
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
		return;	
	}
	
	if(company_users == ""){
		errorMessage = "Specify Assigned Users";
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
		return;	
    }
    logger("User Level "+userLevel);

    var slider = document.getElementById("myRange");
    var task_progress  = slider.value;

    var dataString = {
        't_name': t_name,
        't_desc': t_desc,
        'project_name': project_name,
        'company_users': company_users,
        'project_status':project_status,
        'startDate':startDate,
        'endDate':endDate,
        'request': 16,
        'company_id':sessionStorage.getItem("company_id"),
        'user_id':sessionStorage.getItem("user_id"),
        'task_progress':task_progress,
        'task_id':taskID
    };
    logger(dataString);
	
	var saveButton = document.getElementById('tasksaverIcon');
    saveButton.classList.add('fa-spin');
	
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
			
			saveButton.classList.remove('fa-spin');
			
			logger('Task Add Response ' + data);
			
            var jsObject = JSON.parse(data);
            logger(jsObject);
            var bool_code = jsObject.taskadd[0].bool_code;
			logger("bool_code "+bool_code);
			
			if(bool_code){
                swal(jsObject.taskadd[0].message, "Success", 'success');
			}else{
				errorMessage = jsObject.taskadd[0].message;
				document.getElementById("confrimed").innerText = errorMessage;
				document.getElementById('confrimed').style.display = 'block';
			}
        },
        error: function(e) {
			saveButton.classList.remove('fa-spin');
        }

    });
    return false;
});


$('#addTask').on('click', function(e) {
    localStorage.setItem("taskID", "");
    window.location = "task-edit";
});


$('#addSubTask').on('click', function(e) {
    localStorage.setItem("subID", "");
    window.location = "sub-edit";
});


function getUserTasks(){
    var project_name = $('#project-name').val();
    var user_id = $('#company-users').val();
    logger("Getting Tasks For Project: "+project_name+" And User "+user_id);
    var dataString = {
        'request': 15,
        'project_name':project_name,
        'company_id':sessionStorage.getItem("company_id"),
        'user':user_id
    };
    logger(dataString);
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
            logger(data);
            var tasksJSON = JSON.parse(data);
            var tbHTML = "";
            logger("Length Ya " + tasksJSON + " Ni " + tasksJSON.tasks.length);
            for (var i = 0; i < tasksJSON.tasks.length; i++) {
                var task_id = tasksJSON.tasks[i].task_id;
                tbHTML += '<div class="col-12 col-md-4 col-lg-4"><div class="pricing pricing-highlight"><div class="pricing-title">'+tasksJSON.tasks[i].project_name+'</div><div class="pricing-padding">'+
                '<div class="pricing-price"><div>'+tasksJSON.tasks[i].task_name+'</div><div>'+tasksJSON.tasks[i].task_name+'</div></div><div class="pricing-details">'+
                '<div class="pricing-item"><div class="pricing-item-icon bg-secondary text-white"><i class="far fa-hand-point-right"></i></div><div class="pricing-item-label">Created On: '+tasksJSON.tasks[i].created_on+'</div></div>'+
                '<div class="pricing-item"><div class="pricing-item-icon bg-secondary text-white"><i class="far fa-hand-point-right"></i></div><div class="pricing-item-label">Start Date: '+tasksJSON.tasks[i].start_date+'</div></div>'+
                '<div class="pricing-item"><div class="pricing-item-icon bg-secondary text-white"><i class="far fa-hand-point-right"></i></div><div class="pricing-item-label">End Date: '+tasksJSON.tasks[i].end_date+'</div></div>'+
                '<div class="pricing-item"><div class="pricing-item-icon bg-secondary text-white"><i class="far fa-hand-point-right"></i></div><div class="pricing-item-label">Task Status: '+tasksJSON.tasks[i].status_desc+'</div></div>'+
                '<div class="pricing-item"><div class="pricing-item-icon bg-secondary text-white"><i class="far fa-hand-point-right"></i></div><div class="pricing-item-label">Work Duration: '+ConvertMinutes(tasksJSON.tasks[i].hours)+'</div></div></div></div>'+
                ' <div class="progress-text">'+tasksJSON.tasks[i].task_progress+'%</div><div class="progress" data-height="6" style="height: 6px;"><div class="progress-bar" data-width="'+tasksJSON.tasks[i].task_progress+'%" style="width: '+tasksJSON.tasks[i].task_progress+'%;"></div></div>'+
                '<div class="pricing-cta"><a href="#" onclick="EditTask('+task_id+')">Edit <i class="fas fa-edit"></i></a></div></div></div>';
            }
            $('#taskDiv').html(tbHTML);
        },
        error: function(e) {

        }

    });
    return false;
}

function EditTask(task_id){
    logger("Editting "+task_id);
    localStorage.setItem("taskID", task_id);
    window.location = "task-edit";
    return false;
}


function HideTasks(task_id){
    var task_id =localStorage.getItem("taskID")
    var dataString = {
        'request':56,
        'task_id':task_id
    }
    logger("Deleting "+task_id);
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
    localStorage.setItem("taskID", task_id);
    //window.location = "tasks";
        
        }
})
    return false;
    
}

function getprojectUsers(){
    var project_name = $('#project-name').val();
    logger("Getting Tasks For Project: "+project_name);
    
    var user_id;
    if(userLevel == 1){
        user_id = sessionStorage.getItem("user_id");
    }

    var dataString = {
        'request': 14,
        'project_name':project_name,
        'user_id':user_id
    };
    logger(dataString);
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
            logger(data);
            var usersJSON = JSON.parse(data);
            var users = '<option></option>';
            logger("Length Ya " + usersJSON + " Ni " + usersJSON.users.length);
            for (var i = 0; i < usersJSON.users.length; i++) {
                if (i == 0) {
                    users += "<option value='" + usersJSON.users[i].user_id + "' selected>" + usersJSON.users[i].user_email + "</option>";
                } else {
                    users += "<option value='" + usersJSON.users[i].user_id + "'>" + usersJSON.users[i].user_email + "</option>";
                }
            }
            $("#company-users").html(users);
            getUserTasks();
        },
        error: function(e) {

        }

    });
    return false;
}

$('#hoursSaver').on('click', function(e) {
    logger("hoursSaver Now");
    var hours = $('input[name = "hours"]').val();
    var project_name = $('#project-name').val();
    var task_id = $('#task-name').val();
    var company_users = $('#company-users').val();

    var errorMessage;
	if(hours == ""){
		errorMessage = "Add Minutes Worked";
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
        document.getElementById("hours").style.borderColor = "red";
		return;	
	}else{
        document.getElementById("hours").style.borderColor = "green";
    }

	if(project_name == ""){
		errorMessage = "Specify Project";
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
		return;	
	}
	
	if(task_id == ""){
		errorMessage = "Specify Task";
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
		return;	
    }

    if(company_users == ""){
		errorMessage = "Specify Users";
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
		return;	
    }

    var dataString = {
        'hours': hours,
        'project_name': project_name,
        'task_id': task_id,
        'user_email': company_users,
        'request': 13,
        'company_id':sessionStorage.getItem("company_id"),
        'added_by':sessionStorage.getItem("user_id")
    };
    logger(dataString);
	
	var saveButton = document.getElementById('hourssaverIcon');
    saveButton.classList.add('fa-spin');
	
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
			
			saveButton.classList.remove('fa-spin');
			
			logger('Hours Add Response ' + data);
			
            var jsObject = JSON.parse(data);
            logger(jsObject);
            var bool_code = jsObject.hoursadd[0].bool_code;
			logger("bool_code "+bool_code);
			
			if(bool_code){
                swal(jsObject.hoursadd[0].message, "Success", 'success').then(function () {
                    window.location = "tasks";
                });
			}else{
				errorMessage = jsObject.hoursadd[0].message;
				document.getElementById("confrimed").innerText = errorMessage;
				document.getElementById('confrimed').style.display = 'block';
			}
        },
        error: function(e) {
			saveButton.classList.remove('fa-spin');
        }

    });
    return false;
});

function getAssignedUser(){
    var task_id = $('#task-name').val();
    logger("Getting User For Task: "+task_id);
    var dataString = {
        'request': 17,
        'task_id':task_id
    };
    logger(dataString);
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
            logger(data);
            var userJSON = JSON.parse(data);
            var users = '<option></option>';
            logger("Length Ya " + userJSON + " Ni " + userJSON.task_user.length);
            for (var i = 0; i < userJSON.task_user.length; i++) {
                if (i == 0) {
                    users += "<option value='" + userJSON.task_user[i].user_email + "' selected>" + userJSON.task_user[i].user_email + "</option>";
                } else {
                    users += "<option value='" + userJSON.task_user[i].user_email + "'>" + userJSON.task_user[i].user_email + "</option>";
                }
            }
            $("#company-users").html(users);
        },
        error: function(e) {

        }

    });
    return false;
}

function getAllTasks(){
    var project_name = $('#project-name').val();
    logger("Getting Tasks For Project: "+project_name);
    var dataString = {
        'request': 12,
        'project_name':project_name,
		'company_id':sessionStorage.getItem("company_id"),
        'dep_id':sessionStorage.getItem("user_dep")
    };
    logger(dataString);
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
            logger(data);
            var tasksJSON = JSON.parse(data);
            var tasks = '<option></option>';
            logger("Length Ya " + tasksJSON + " Ni " + tasksJSON.tasks.length);
            for (var i = 0; i < tasksJSON.tasks.length; i++) {
                if (i == 0) {
                    tasks += "<option value='" + tasksJSON.tasks[i].task_id + "' selected>" + tasksJSON.tasks[i].task_name + "</option>";
                } else {
                    tasks += "<option value='" + tasksJSON.tasks[i].task_id + "'>" + tasksJSON.tasks[i].task_name + "</option>";
                }
            }
            $("#task-name").html(tasks);
            if(loadedPage == "timer" || page == "sub-edit"){
                listSubTasks();
            }else{
                getAssignedUser();
            }
        },
        error: function(e) {

        }

    });
    return false;
}

function getCompanyProjects(page) {
    logger("Getting Company Projects");
    var company_id =  sessionStorage.getItem("company_id");

    var user_id;
    if(userLevel == 1){
        user_id = sessionStorage.getItem("user_id");
    }

    var dataString = {
        'request': 11,
        'company_id':company_id,
        'user_id':user_id
    };
    logger(dataString);
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
            logger(data);
            var projectsJSON = JSON.parse(data);
            var projects = '<option></option>';
            logger("Length Ya " + projectsJSON + " Ni " + projectsJSON.projects.length);
            for (var i = 0; i < projectsJSON.projects.length; i++) {
                if (i == 0) {
                    projects += "<option value='" + projectsJSON.projects[i].project_name + "' selected>" + projectsJSON.projects[i].project_name + "</option>";
                } else {
                    projects += "<option value='" + projectsJSON.projects[i].project_name + "'>" + projectsJSON.projects[i].project_name + "</option>";
                }
            }
            $("#project-name").html(projects);
            if(page == 1){
                getAllTasks();
                

            }else if (page == 2){
                getprojectUsers();
            }
        },
        error: function(e) {

        }

    });
    return false;
}


$('#userSaver').on('click', function(e) {
    logger("userSaver Now");
    var u_name = $('input[name = "u_name"]').val();
    //var last_name = $('input[name = "last_name"]').val();
    var u_email = $('input[name = "u_email"]').val();
    //var user_phone = $('input[name = "user_phone"]').val();
    var user_level = $('#user-level').val();
    var user_status = $('#user-status').val();

    var errorMessage;
	if(u_name == ""){
		errorMessage = "User Name is Required";
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
        document.getElementById("u_name").style.borderColor = "red";
		return;	
	}else{
        document.getElementById("u_name").style.borderColor = "green";
    }
	
	if(u_email == ""){
		errorMessage = "User Email is Required";
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
        document.getElementById("u_email").style.borderColor = "red";
		return;	
	}else{
        document.getElementById("u_email").style.borderColor = "green";
    }
	
	if(user_level == ""){
		errorMessage = "Specify User Level";
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
		return;	
	}
	
	if(user_status == ""){
		errorMessage = "Specify User Status";
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
		return;	
    }

    var branch;
    var dep;
    if(userLevel > 4){
        branch = $('#branch-name').val();
    }else{
        branch = sessionStorage.getItem("user_branch");
    }

    if(userLevel > 3){
        dep = $('#dep_name').val();
    }else{
        dep = sessionStorage.getItem("user_dep");
    }

    var dataString = {
        'u_name': u_name,
        'u_email': u_email,
        'user_level': user_level,
        'user_status': user_status,
        'request': 10,
        'company_id':sessionStorage.getItem("company_id"),
        'added_by':sessionStorage.getItem("user_id"),
        'type':sessionStorage.getItem("org_type"),
        'branch':branch,
        'dep':dep
    };
    logger(dataString);
	
	var saveButton = document.getElementById('usersaverIcon');
    saveButton.classList.add('fa-spin');
	
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
			
			saveButton.classList.remove('fa-spin');
			
			logger('User Add Response' + data);
			var jsObject = JSON.parse(data);
            logger(jsObject);
            var bool_code = jsObject.staffadd[0].bool_code;
			logger("bool_code " + bool_code);
			
			if(bool_code){
                swal(jsObject.staffadd[0].message, "Success", 'success').then(function () {
                    window.location = "user-edit";
                });
			}else{
				errorMessage = jsObject.staffadd[0].message;
				document.getElementById("confrimed").innerText = errorMessage;
				document.getElementById('confrimed').style.display = 'block';
			}
        },
        error: function(e) {
			saveButton.classList.remove('fa-spin');
        }

    });
    return false;
});

function getUserLevels() {
    logger("Getting User Levels");
    var dataString = {
        'request': 9,
        'type':sessionStorage.getItem("org_type")
    };
    logger(dataString);
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
            logger(data);
            var levelJSON = JSON.parse(data);
            var levels = '<option></option>';
            logger("Length Ya " + levelJSON + " Ni " + levelJSON.levels.length);
            for (var i = 0; i < levelJSON.levels.length; i++) {
                if (i == 0) {
                    levels += "<option value='" + levelJSON.levels[i].level_desc + "' selected>" + levelJSON.levels[i].level_desc + "</option>";
                } else {
                    levels += "<option value='" + levelJSON.levels[i].level_desc + "'>" + levelJSON.levels[i].level_desc + "</option>";
                }
            }
            $("#user-level").html(levels);
        },
        error: function(e) {

        }

    });
    return false;
}

function getUserStatus() {
    logger("Getting User Status");
    var dataString = {
        'request': 8    
    };
    logger(dataString);
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
            logger(data);
            var statusJSON = JSON.parse(data);
            var status = '<option></option>';
            logger("Length Ya " + statusJSON + " Ni " + statusJSON.status.length);
            for (var i = 0; i < statusJSON.status.length; i++) {
                if (i == 0) {
                    status += "<option value='" + statusJSON.status[i].status_desc + "' selected>" + statusJSON.status[i].status_desc + "</option>";
                } else {
                    status += "<option value='" + statusJSON.status[i].status_desc + "'>" + statusJSON.status[i].status_desc + "</option>";
                }
            }
            $("#user-status").html(status);
        },
        error: function(e) {

        }

    });
    return false;
}

$('#addUser').on('click', function(e) {
    projectID = "";
    window.location = "user-edit";
});

function ListUsers(){
    var company_id =  sessionStorage.getItem("company_id");
    var user_id =  sessionStorage.getItem("user_id");
    var user_id;
    if(userLevel == 1){
        user_id = sessionStorage.getItem("user_id");
    }

    var dep;
    var branch;

    if(userLevel == 5){

    }else if(userLevel == 4){
        branch = sessionStorage.getItem("user_branch");
    }else if(userLevel < 4){
        dep = sessionStorage.getItem("user_dep");
    }

    var dataString = {
        'request': 6,
        'company_id': company_id,
        'user_id':user_id,
        'branch':branch,
        'dep':dep,
		'limit':2
    };
    logger(dataString);
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
           
            logger(data);
            var UsersJSON = JSON.parse(data);
            var tbHTML = "";
            logger("Length of Users JSON "+UsersJSON.users.length);
            for (var i = 0; i < UsersJSON.users.length; i++) {
                var user_id = UsersJSON.users[i].user_id;
                var user_email = UsersJSON.users[i].user_email;
                var first_name = UsersJSON.users[i].first_name;
                //var user_phone = UsersJSON.users[i].user_phone;
                var status_desc = UsersJSON.users[i].status_desc;
                var created_on = UsersJSON.users[i].created_on;
                var dep_name = UsersJSON.users[i].dep_name;
                var branch_name = UsersJSON.users[i].branch_name;


                var status;
                if(status_desc == 'Active'){
                    status = "green"; 
                }else{
                    status = "red"; 
                }
                
                var level_desc;
                if(sessionStorage.getItem("org_type") == "SCHOOL"){
                    level_desc = UsersJSON.users[i].school_desc;
                }else if(sessionStorage.getItem("org_type") == "LAWFIRM"){
                    level_desc = UsersJSON.users[i].law_desc;
                }else{
                    level_desc = UsersJSON.users[i].level_desc;
                }

                var code;
                if(level_desc == "STAFF" || level_desc == "STUDENT" || level_desc == "CLIENTS"){
                    code = "green";
                }else if(level_desc == "TEAM LEADER" || level_desc == "LECTURER" || level_desc == "ASSOCIATES"){
                    code = "purple";
                }else if(level_desc == "HOD"){
                    code = "yellow";
                }else if(level_desc == "SNR MGMT" || level_desc == "PRINCIPAL"){
                    code = "orange";
                }else{
                    code = "red";
                }

                var deleteButton = 'deletebtn' + user_id;
                var buttonID = 'reset'+user_id;
                var adder = "";
                var deleter = "";
                if(userLevel == 1){

                }else{
                    adder = "<button class='btn btn-warning' onclick='resetUser(" + user_id + ")'> <i id = "+buttonID+" class='fa fa-key'></i></button>";
                    //deleter = "<button class='btn btn-danger' onclick='deleteStaff(" + user_id + ")'> <i id = "+deleteButton+" class='fa fa-trash'></i></button>";
                }

                tbHTML += "<tr><td class='col-green font-weight-bold'>"+first_name+"</td>"+
                "<td>"+user_email+"</td>"+
                '<td class="col-blue font-weight-bold">'+branch_name+'</td>'+
                '<td class="col-purple font-weight-bold">'+dep_name+'</td>'+
                "<td>"+created_on+"</td>"+
                "<td><div class='badge l-bg-"+code+"'>"+level_desc+"</div></td>"+
                "<td><div class='badge l-bg-"+status+"'>"+status_desc+"</div></td>"+
                '<td align="left">' +adder+deleter+
                "</td></tr>";
            }
            tbHTML = '<table class="table table-striped table-hover" id="usersTable" style="width:100%;"><thead><tr><th>Name</th><th>Email</th><th>'+localStorage.getItem("branch")+'</th><th>Department</th><th>Added On</th><th>Level</th><th>Status</th><th>Actions</th></tr></thead><tbody>'+tbHTML+'</tbody></table>';           
            $('#users-table').html(tbHTML);
            $('#usersHead').html(UsersJSON.users.length + " Record(s)");
            var oTable = $('#usersTable').DataTable({
                "iDisplayLength": 10,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]

            });
        },
        error: function(e) {

        }

    });
    return false;
}

function resetUser(id){
    localStorage.setItem("user_id", id);
    window.location = "setting";
    return false;
}

function resetPass(){
logger("resetpassword2");
//var user_email = document.querySelector('input[name="user_email"]').value;
 var user_email = $('input[name = "user_email"]').val();
console.log("wuuw",user_email)

var errorMessage;	
if(user_email == ""){
    errorMessage = "Useremail Required";
    document.getElementById("confrimed").innerText = errorMessage;
    document.getElementById('confrimed').style.display = 'block';
    document.getElementById("user_email").style.borderColor = "red";
    return;	
}
    var dataString = {
        'user_email': user_email,
        'request': 18
    };
    logger(dataString);
	
	var resetPass = document.getElementById('resetIcon');
    resetPass.classList.add('fa-spin');
	
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
			
			resetPass.classList.remove('fa-spin');
			
			logger('Reset Password Response ' + data);
			
            var jsObject = JSON.parse(data);
            logger(jsObject);		
			swal(jsObject.reset[0].message, "Success", 'success');
        },
        error: function(e) {
			resetPass.classList.remove('fa-spin');
        }

    });
    return false;
}

function resetPass2(){
    logger("resetpassword");
    //var user_email = document.querySelector('input[name="user_email"]').value;
    var user_email = $('input[name = "user_email"]').val();
     var user_password = $('input[name = "user_password"]').val();
     
    
    
    var errorMessage;	
    if(user_email == ""){
        errorMessage = "User email Required";
        document.getElementById("confrimed").innerText = errorMessage;
        document.getElementById('confrimed').style.display = 'block';
        document.getElementById("user_email").style.borderColor = "red";
        return;	
    }
    if(user_password == ""){
        errorMessage = "User password Required";
        document.getElementById("confrimed").innerText = errorMessage;
        document.getElementById('confrimed').style.display = 'block';
        document.getElementById("user_password").style.borderColor = "red";
        return;	
    }
        var dataString = {
            'user_email': user_email,
            'user_password': user_password,
            'request': 49
        };
        logger(dataString);
        
        var resetPass2 = document.getElementById('resetIcon');
        resetPass2.classList.add('fa-spin');
        
        $.ajax({
            type: "POST",
            url: myurl,
            data: dataString,
            success: function(data) {
                
                resetPass2.classList.remove('fa-spin');
                
                logger('Reset Password Response ' + data);
                
                var jsObject = JSON.parse(data);
                logger(jsObject);		
                swal(jsObject.confirm[0].message, "Success", 'success');
            },
            error: function(e) {
                resetPass2.classList.remove('fa-spin');
            }
    
        });
        return false;
    }
    

$('#projectSaver').on('click', function(e) {
	logger("projectSaver Now");
    var p_name = $('input[name = "p_name"]').val();
    var p_desc = $('input[name = "p_desc"]').val();
    var project_status = $('#project-status').val();
    var dep_name = $('#dep_name').val();

    var startDate = $('input[name = "startDate"]').val();
    var endDate = $('input[name = "endDate"]').val();

	var t_fee = $('input[name = "t_fee"]').val();
	var b_cycle = $('#b_cycle').val();
	var company_users = $('#company-users').val();
	
    var errorMessage;

    if(startDate > endDate){
        errorMessage = "Deadline should be > than Start Time";
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
        return;
	}
	
	if(p_name == ""){
		errorMessage = "File Name is Required";
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
        document.getElementById("p_name").style.borderColor = "red";
		return;	
	}else{
        document.getElementById("p_name").style.borderColor = "green";
    }
	
	if(p_desc == ""){
		errorMessage = "File Description is Required";
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
        document.getElementById("p_desc").style.borderColor = "red";
		return;	
	}else{
        document.getElementById("p_desc").style.borderColor = "green";
    }
	
	if(project_status == ""){
		errorMessage = "Specify Project Status";
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
		return;	
	}
	
	if(dep_name == ""){
		errorMessage = "Specify Department";
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
		return;	
    }

    var dataString = {
        'p_name': p_name,
        'p_desc': p_desc,
        'project_status': project_status,
        'dep_name': dep_name,
        'startDate':startDate,
        'endDate':endDate,
        'request': 7,
        'company_id':sessionStorage.getItem("company_id"),
        'user_id':sessionStorage.getItem("user_id"),
        'project_id':localStorage.getItem("projectID"),
		't_fee':t_fee,
		'chargable':localStorage.getItem("chargable"),
		'b_cycle':b_cycle,
		'company_users': company_users
    };
    logger(dataString);
	
	var saveButton = document.getElementById('projectsaverIcon');
    saveButton.classList.add('fa-spin');
	
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
			
			saveButton.classList.remove('fa-spin');
			
			logger('Project Add Response ' + data);
			
            var jsObject = JSON.parse(data);
            logger(jsObject);
            var bool_code = jsObject.projectadd[0].bool_code;
			logger("bool_code "+bool_code);
			
			if(bool_code){
                swal(jsObject.projectadd[0].message, "Success", 'success');
			}else{
				errorMessage = jsObject.projectadd[0].message;
				document.getElementById("confrimed").innerText = errorMessage;
				document.getElementById('confrimed').style.display = 'block';
			}
        },
        error: function(e) {
			saveButton.classList.remove('fa-spin');
        }

    });
    return false;
});

function getProjectStatus() {
    logger("Getting Project Status");
    var dataString = {
        'request': 5
    };
    logger(dataString);
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
            logger(data);
            var statusJSON = JSON.parse(data);
            var status = '<option></option>';
            logger("Length Ya " + statusJSON + " Ni " + statusJSON.status.length);
            for (var i = 0; i < statusJSON.status.length; i++) {
                if (i == 0) {
                    status += "<option value='" + statusJSON.status[i].status_desc + "' selected>" + statusJSON.status[i].status_desc + "</option>";
                } else {
                    status += "<option value='" + statusJSON.status[i].status_desc + "'>" + statusJSON.status[i].status_desc + "</option>";
                }
            }
            $("#project-status").html(status);
        },
        error: function(e) {

        }

    });
    return false;
}

function getCompanyUsers() {
    logger("Getting Company Users");
    var company_id =  sessionStorage.getItem("company_id");
    var user_id;
    logger("User Level "+userLevel);

    if(userLevel == 1){
        user_id = sessionStorage.getItem("user_id");
    }
    var limit;
    if(loadedPage == "task-edit"){
        limit = 1;
        if(userLevel == 2){
            user_id = sessionStorage.getItem("user_id");
        }
    }

    if(loadedPage == "project-edit" || loadedPage == "invoices"){
        limit = 2;
    }

    var dep;
    var branch;

    if(userLevel == 5){

    }else if(userLevel == 4){
        branch = sessionStorage.getItem("user_branch");
    }else if(userLevel < 4){
        dep  = sessionStorage.getItem("user_dep");
    }

    var dataString = {
        'request': 6,
        'company_id': company_id,
        'user_id':user_id,
        'branch':branch,
        'dep':dep,
        'limit':limit
    };

    logger(dataString);
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
            logger(data);
            var usersJSON = JSON.parse(data);
            var users = '<option></option>';
            logger("Length Ya " + usersJSON + " Ni " + usersJSON.users.length);
            for (var i = 0; i < usersJSON.users.length; i++) {
                if (i == 0) {
                    users += "<option value='" + usersJSON.users[i].user_email + "' selected>" + usersJSON.users[i].user_email + "</option>";
                } else {
                    users += "<option value='" + usersJSON.users[i].user_email + "'>" + usersJSON.users[i].user_email + "</option>";
                }
            }
            $("#company-users").html(users).trigger('change');
        },
        error: function(e) {

        }

    });
    return false;
}


function getMyProjects() {
    var company_id =  sessionStorage.getItem("company_id");
    var dataString = {
        'request': 4,
        'company_id': company_id
    };
    logger(dataString);
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
           
            logger(data);
            var ProjectJSON = JSON.parse(data);
            var trHTML = "";
            var tbHTML = "";
            logger("Length of Projects JSON "+ProjectJSON.projects.length);
            for (var i = 0; i < ProjectJSON.projects.length; i++) {
                var project_id = ProjectJSON.projects[i].project_id;
                var project_name = ProjectJSON.projects[i].project_name;
                var hours = ProjectJSON.projects[i].hours;
                var created_on = ProjectJSON.projects[i].created_on;
                var start_date = ProjectJSON.projects[i].start_date;
                var end_date = ProjectJSON.projects[i].end_date;
                var status = ProjectJSON.projects[i].status_desc;
                var users = ProjectJSON.projects[i].users;
                var project_desc = ProjectJSON.projects[i].project_desc;
				
				addCalendarEvent(i, end_date, '', project_name);

                if (!start_date) start_date = "N/A";
                if (!end_date) end_date = "N/A";

                var userHTML="";
                var users_array = users.split(',');

                for(var d = 0; d < users_array.length; d++) {
                    var staff_name = users_array[d].replace(/^\s*/, "").replace(/\s*$/, "");
                    if(staff_name != ""){
                        userHTML += '<li class="team-member team-member-sm"><figure class="avatar mr-2 avatar-sm bg-secondary text-white" data-initial="'+getIntials(staff_name)+'"></figure></li>';
                    }
                }

                trHTML += "<tr><td class='text-truncate'>"+project_name+"</td>"+
                '<td class="text-truncate"><ul class="list-unstyled order-list m-b-0">'+userHTML+'</ul></td>'+
                '<td class="text-truncate">'+hours+'</td></tr>';

                var code;
                if(status == "New"){
                    code = "orange";
                }else if(status == "Started"){
                    code = "purple";
                }else if(status == "Completed"){
                    code = "green";
                }else if(status == "Suspended"){
                    code = "red";
                }

                tbHTML += "<tr><td><a href='#'>"+project_name+"</a></td>"+
                '<td class="col-green font-weight-bold">'+project_desc+'</td>'+
                '<td class="text-truncate"><ul class="list-unstyled order-list m-b-0 m-b-0">'+userHTML+'</ul></td>'+
                "<td>"+created_on+"</td>"+
                "<td><div class='badge l-bg-"+code+"'>"+status+"</div></td>"+
                "<td>"+start_date+"</td>"+
                "<td>"+end_date+"</td>"+
                "<td><a data-toggle='tooltip' title='' data-original-title='Edit'><i class='fas fa-pencil-alt'></i></a><a onclick= 'hideproject("+project_id+")' data-toggle='tooltip' title='' data-original-title='Delete'><i class='far fa-trash-alt'></i></a></td><tr>";
            }

            trHTML = '<table class="table table-hover table-xl mb-0"><thead><tr><th>Project Name</th><th>Staff</th><th>Minutes</th></tr></thead><tbody>'+trHTML+'</tbody></table>';
            tbHTML = '<table class="table table-striped"><thead><tr><th>Project</th><th>Description</th><th>Created On</th><th>Team</th><th>Status</th><th>Start Date</th><th>End Date</th><th>Actions</th></tr></thead>'+tbHTML+'</tbody></table>';
            //logger(tbHTML);
            $('#project-team-scroll').html(trHTML);
            $('#proTeamScroll').html(tbHTML);
        },
        error: function(e) {

        }

    });
    return false;
}

function hideproject(id){
    var project_id =localStorage.getItem("projectID");
    var dataString = {
        'request':55,
        'project_id':project_id
    }
    logger("Deleting "+id);
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
    localStorage.setItem("projectID", id);
    window.location = "projects";
        
        }
})
    return false;
    
}


function addCalendarEvent(id, start, end, title) {
  var eventObject = {
    id: id,
    start: start,
    title: title,
	backgroundColor: "#f39c12", //yellow
    borderColor: "#f39c12" //yellow
  };
  $('#calendar').fullCalendar('renderEvent', eventObject, true);
}

function getDashData() {
	var company_id =  sessionStorage.getItem("company_id");
	
    var dataString = {
        'request': 3,
		'company_id':company_id
    };

    logger(dataString);
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
            logger('Dashboard Data ' + data);
            var jsObject = JSON.parse(data);
            $('#no_of_users').html(jsObject.dashdata[0].users);
            $('#no_of_projects').html(jsObject.dashdata[0].projects);
            $('#no_of_tasks').html(jsObject.dashdata[0].tasks);
            $('#no_of_subtasks').html(jsObject.dashdata[0].sub_tasks);
        },
        error: function(e) {
           
        }

    });
    return false;
}

$('#loginbutton').on('click', function(e) {
    document.getElementById("confrimed").innerText = "";
    logger("CLICKED");
    var user_name = $('input[name = "email"]').val();
    var user_password = $('input[name = "password"]').val();
   
	
	if(user_name == ""){
		errorMessage = "Username Required";
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
        document.getElementById("email").style.borderColor = "red";
		return;	
	}
	
	if(user_password == ""){
		errorMessage = "Password Required";
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
        document.getElementById("password").style.borderColor = "red";
		return;	
	}
	
    var dataString = {
        'uname': user_name,
        'password': user_password,
        'request': 2
    };
    logger(dataString);
    
	var LoginButton = document.getElementById('loginIcon');
	LoginButton.classList.add('fa-spin');
	
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
			LoginButton.classList.remove('fa-spin');
            logger(data);

            var jsObject = JSON.parse(data);
            logger("user data logged",jsObject);
            localStorage.setItem("user_d_p0",JSON.stringify(jsObject))
            var bool_code = jsObject.login[0].bool_code;
			logger("bool_code "+bool_code);
			
            if (bool_code) {
                document.getElementById("confrimed").innerText = "Welcome "+jsObject.login[0].first_name;
				document.getElementById("email").style.borderColor = "#666";
                document.getElementById("password").style.borderColor = "#666";
				document.getElementById("confrimed").style.color = "#666";
			    localStorage.setItem("user_id", jsObject.login[0].user_id);
				localStorage.setItem("user_email", jsObject.login[0].user_email);
				sessionStorage.setItem("first_name", jsObject.login[0].first_name);
				sessionStorage.setItem("company_id", jsObject.login[0].company_id);
				sessionStorage.setItem("company_name", jsObject.login[0].company_name);
                sessionStorage.setItem("level_desc", jsObject.login[0].level_desc);
                sessionStorage.setItem("user_level", jsObject.login[0].user_level);
                sessionStorage.setItem("org_type", jsObject.login[0].org_type);
                sessionStorage.setItem("user_dep", jsObject.login[0].user_dep);
                localStorage.setItem("dep_id", jsObject.login[0].dep_id);
                sessionStorage.setItem("user_branch", jsObject.login[0].user_branch);
                sessionStorage.setItem("loggedin", 1);
                localStorage.setItem("uname",user_name);
                localStorage.setItem("upass",user_password);

                loadNames(sessionStorage.getItem("org_type"));
				window.location = "home";
			}else{
				document.getElementById("confrimed").innerText = jsObject.login[0].message;
                document.getElementById('confrimed').style.display = 'block';
                document.getElementById("email").style.borderColor = "red";
                document.getElementById("password").style.borderColor = "red";
			}

        },
        error: function(e) {
			LoginButton.classList.remove('fa-spin');
        }

    });
    return false;
});

$('#register').on('click', function(e) {
	logger("Register Now");
    var c_name = $('input[name = "c_name"]').val();
    var u_name = $('input[name = "u_name"]').val();
    var l_name = $('input[name = "l_name"]').val();
    var p_name = $('input[name = "p_name"]').val();
    var u_email = $('input[name = "u_email"]').val();
    var u_password = $('input[name = "u_password"]').val();
    var orgTypes = $('#orgTypes').val();
    //var user_image = $('#user_image').val();
    
	var errorMessage;
	
	if(c_name == ""){
		errorMessage = "Company Name is Required";
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
        document.getElementById("c_name").style.borderColor = "red";
		return;	
	}
	
	if(u_name == ""){
		errorMessage = "Your Name is Required";
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
        document.getElementById("u_name").style.borderColor = "red";
		return;	
	}

    if(l_name == ""){
		errorMessage = "Your Name is Required";
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
        document.getElementById("l_name").style.borderColor = "red";
		return;	
	}
	
    if(p_name == ""){
		errorMessage = "Your Name is Required";
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
        document.getElementById("p_name").style.borderColor = "red";
		return;	
	}

	if(u_email == ""){
		errorMessage = "Your Email is Required";
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
        document.getElementById("u_email").style.borderColor = "red";
		return;	
	}
	
	if(u_password == ""){
		errorMessage = "Your Password is Required";
		document.getElementById("confrimed").innerText = errorMessage;
		document.getElementById('confrimed').style.display = 'block';
        document.getElementById("u_password").style.borderColor = "red";
		return;	
	}
	

    var dataString = {
        'c_name': c_name,
        'u_name': u_name,
        'l_name': l_name,
        'p_name': p_name,
        'u_email': u_email,
        'u_password': u_password,
        'org_type':orgTypes,
        //'user_image':user_image,
        //'user_image':sessionStorage.getItem("uploaded_image"),
        'request': 1
    };
    logger(dataString);
	
	var saveButton = document.getElementById('registerIcon');
	saveButton.classList.add('fa-spin');
	
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
			
			saveButton.classList.remove('fa-spin');
			
			logger('Register Response'+data);
			
            var jsObject = JSON.parse(data);
            logger(jsObject);
            var bool_code = jsObject.register[0].bool_code;
			logger("bool_code "+bool_code);
			
			if(bool_code){
                swal(jsObject.register[0].message, "Success", 'success').then(function () {
                    window.location = "index";
                });
			}else{
				errorMessage = jsObject.register[0].message;
				document.getElementById("confrimed").innerText = errorMessage;
				document.getElementById('confrimed').style.display = 'block';
			}
        },
        error: function(e) {
			saveButton.classList.remove('fa-spin');
        }

    });
    return false;
});


function ListProjects() {
    var company_id =  sessionStorage.getItem("company_id");
    var user_id;
    if(userLevel == 1){
        user_id = sessionStorage.getItem("user_id");
    }

    var dep_id;
    var branch;
    logger("userLevel "+userLevel);
    if(userLevel < 4){
        dep_id = sessionStorage.getItem("user_dep");
    }

    if(userLevel == 4){
        branch = sessionStorage.getItem("user_branch");
    }

    var dataString = {
        'request': 4,
        'company_id': company_id,
        'user_id':user_id,
        'dep_id':dep_id,
        'branch':branch
    };
    logger(dataString);
    $.ajax({
        type: "POST",
        url: myurl,
        data: dataString,
        success: function(data) {
           
            logger(data);
            var ProjectJSON = JSON.parse(data);
            var tbHTML = "";
            logger("Length of Projects JSON "+ProjectJSON.projects.length);
            for (var i = 0; i < ProjectJSON.projects.length; i++) {
                var project_id = ProjectJSON.projects[i].project_id;
                var project_name = ProjectJSON.projects[i].project_name;
                var hours = ProjectJSON.projects[i].hours;
                var created_on = ProjectJSON.projects[i].created_on;
                var start_date = ProjectJSON.projects[i].start_date;
                var end_date = ProjectJSON.projects[i].end_date;
                var status = ProjectJSON.projects[i].status_desc;
                var dep_name = ProjectJSON.projects[i].dep_name;
                var project_desc = ProjectJSON.projects[i].project_desc;

                var chargable = ProjectJSON.projects[i].chargable;
                var fee = ProjectJSON.projects[i].fee;
                var cycle = ProjectJSON.projects[i].cycle;
                var client_name = ProjectJSON.projects[i].client_name;

                if (!start_date) start_date = "N/A";
                if (!end_date) end_date = "N/A";

                var code;
                if(status == "New"){
                    code = "orange";
                }else if(status == "Started"){
                    code = "purple";
                }else if(status == "Completed"){
                    code = "green";
                }else if(status == "Suspended"){
                    code = "red";
                }
                var toadd;
                if(userLevel == 1){
                    toadd = "None Required";
                }else{
                    toadd ="<a onclick = 'editProject("+project_id+")' data-toggle='tooltip' title='' data-original-title='Edit'><i class='fas fa-pencil-alt'></i></a><a a onclick = 'hideproject("+project_id+")' data-toggle='tooltip' title='' data-original-title='Delete'><i class='far fa-trash-alt'></i></a>";
                }

                tbHTML += "<tr><td><a href='#'>"+project_name+"</a></td>"+
                '<td class="col-green font-weight-bold">'+project_desc+'</td>'+
                "<td>"+created_on+"</td>"+
                '<td class="col-purple font-weight-bold">'+dep_name+'</td>'+
                '<td class="col-blue font-weight-bold">'+client_name+'</td>'+
                "<td><div class='badge l-bg-"+code+"'>"+status+"</div></td>"+
                "<td>"+start_date+"</td>"+
                "<td>"+end_date+"</td>"+
                "<td>"+toadd+"</td></tr>";
            }
            tbHTML = '<table class="table table-striped table-hover" id="projectsTable" style="width:100%;"><thead><tr><th>Name</th><th>Description</th><th>Created On</th><th>Department</th><th>Client Name</th><th>Status</th><th>Start Date</th><th>End Date</th><th>Actions</th></tr></thead><tbody>'+tbHTML+'</tbody></table>';           
            $('#projects-table').html(tbHTML);
            $('#projectsHead').html(ProjectJSON.projects.length + " "+localStorage.getItem("pr_name"));
            var oTable = $('#projectsTable').DataTable({
                "iDisplayLength": 10,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]

            });
        },
        error: function(e) {

        }

    });
    return false;
}

function loadNames(ltype){
    logger("Loading "+ltype);
    localStorage.setItem("loadingtjja",ltype)
    lang.init(ltype, afterLangLoad);
   
}
function afterLangLoad(){
    console.log("saveLang",JSON.parse(JSON.stringify(lang)))
    
    localStorage.setItem("saveLang",JSON.stringify(lang.getString(
        "pr_name"
    )))
    localStorage.setItem("pr_name", lang.getString('pr_name'));
    localStorage.setItem("tr_name", lang.getString('tr_name'));
    localStorage.setItem("ur_name", lang.getString('ur_name'));
    localStorage.setItem("branches", lang.getString('branches'));
    localStorage.setItem("branch", lang.getString('branch'));
    localStorage.setItem("subtasks", lang.getString('subtasks'));
    localStorage.setItem("subtask", lang.getString('subtask'));
    localStorage.setItem("workingLec", lang.getString('workingLec'));
    localStorage.setItem("workingStud", lang.getString('workingStud'));
    
}

function changeLabels(){
    $('#menu_p').html(localStorage.getItem("pr_name"));
    $('#menu_link_p').html(localStorage.getItem("pr_name"));
    $('#menu_link_t').html(localStorage.getItem("tr_name"));
    $('#menu_link_sub_t').html(localStorage.getItem("subtasks"));

    $('#menu_users').html(localStorage.getItem("ur_name"));
    $('#link_users').html(localStorage.getItem("ur_name"));

    $('#menu_link_branch').html(localStorage.getItem("branches"));

    $('#title_users').html(localStorage.getItem("ur_name"));
    $('#user_a_label').html(localStorage.getItem("ur_name"));

    if(userLevel == 1){
        $('#timer_label').html(localStorage.getItem("workingStud"));
    }else{
        $('#timer_label').html(localStorage.getItem("workingLec"));
    }

    $('#logs_label').html(localStorage.getItem("subtask")+ " Logs");

    
    return false;
}

function PageLabels(page){
    logger("Changing Page Labels for "+page);
    if(page == "home"){

        $('#projectsLabel').html(localStorage.getItem("pr_name"));
        $('#tasksLabel').html(localStorage.getItem("tr_name"));
        $('#usersLabel').html(localStorage.getItem("ur_name"));
        $('#subtasksLabel').html(localStorage.getItem("subtask"));
    
        $('#home_p').html(localStorage.getItem("pr_name")+" List");
        $('#home_t').html(localStorage.getItem("pr_name")+" Team");
    }else if(page == "projects"){
        $('#p_header').html(localStorage.getItem("pr_name"));
        $('#p_link').html(localStorage.getItem("pr_name"));
        $('#add_p').html("Add New "+localStorage.getItem("pr_name"));
        $('#projectsHead').html(localStorage.getItem("pr_name"));
    }else if(page == "branches"){
        $('#b_header').html(localStorage.getItem("branch"));
        $('#b_link').html(localStorage.getItem("branch"));
        $('#add_b').html("Add New "+localStorage.getItem("branch"));
        $('#projectsHead').html(localStorage.getItem("branches"));
    }else if(page == "branch-edit"){
        $('#b_header').html(localStorage.getItem("branches"));
        $('#b_link').html(localStorage.getItem("branches"));
        $('#b_add_link').html("Add New "+localStorage.getItem("branches"));

        $('#l_pname').html(localStorage.getItem("branch")+" Name");
        $('#l_pdesc').html(localStorage.getItem("branch")+" Description"); 
    }
    else if(page == "department-edit"){
        $('#l_b_name').html(localStorage.getItem("branch")+" Name");
    }else if(page == "project-edit"){
        $('#p_header').html(localStorage.getItem("pr_name"));
        $('#p_link').html(localStorage.getItem("pr_name"));
        $('#p_a_link').html("Add New "+localStorage.getItem("pr_name"));
    }else if(page == "tasks"){
        $('#page_title').html(localStorage.getItem("tr_name"));
        $('#link_p').html(localStorage.getItem("pr_name"));
        $('#link_t').html(localStorage.getItem("tr_name"));
        $('#projectsHead').html(localStorage.getItem("tr_name"));
        $('#add_t').html("Add New "+localStorage.getItem("tr_name"));
        $('#l_project_name').html(localStorage.getItem("pr_name"));
    }else if(page == "task-edit"){
        $('#page_title').html(localStorage.getItem("tr_name"));
        $('#link_p').html(localStorage.getItem("pr_name"));
        $('#link_t').html(localStorage.getItem("tr_name"));
        $('#link_add_t').html("Add New "+localStorage.getItem("tr_name"));

        $('#l_t_name').html(localStorage.getItem("tr_name") +" Name");
        $('#l_t_desc').html(localStorage.getItem("tr_name") +" Description");
        $('#l_project_name').html(localStorage.getItem("pr_name") +" Name");
        $('#l_project_name').html(localStorage.getItem("pr_name"));

    }else if(page == "sub-task"){
        $('#page_title').html(localStorage.getItem("subtasks"));
        $('#link_p').html(localStorage.getItem("pr_name"));
        $('#link_t').html(localStorage.getItem("tr_name"));
        $('#link_sub_t').html(localStorage.getItem("subtasks"));
        $('#projectsHead').html(localStorage.getItem("subtasks"));
        $('#add_t').html("Add New "+localStorage.getItem("subtasks"));
        $('#l_project_name').html(localStorage.getItem("pr_name"));
        $('#l_task_name').html(localStorage.getItem("tr_name"));
    }else if(page == "sub-edit"){
        $('#page_title').html(localStorage.getItem("subtasks"));
        $('#link_p').html(localStorage.getItem("pr_name"));
        $('#link_t').html(localStorage.getItem("tr_name"));
        $('#link_sub_t').html(localStorage.getItem("subtasks"));
        $('#link_add_t').html("Add New "+localStorage.getItem("subtasks"));

        $('#l_t_name').html(localStorage.getItem("subtask") +" Name");
        $('#l_t_desc').html(localStorage.getItem("subtask") +" Description");
        $('#l_project_name').html(localStorage.getItem("pr_name"));
        $('#l_task_name').html(localStorage.getItem("tr_name"));
        $('#date_label').html(localStorage.getItem("subtask")+ " Date");

    }else if(page == "user-edit"){
		$('#l_b_name').html(localStorage.getItem("branch")+" Name");
	}else if(page == "timer"){
        $('#projectlabel').html(localStorage.getItem("pr_name"));
        $('#tasklabel').html(localStorage.getItem("tr_name"));
        $('#subtasklabel').html(localStorage.getItem("subtask"));

        if(userLevel == 1){
            $('#page_title').html(localStorage.getItem("workingStud"));
            $('#timer_link').html(localStorage.getItem("workingStud"));
            $('#project-edit-title').html(localStorage.getItem("workingStud"));
        }else{
            $('#page_title').html(localStorage.getItem("workingLec"));
            $('#timer_link').html(localStorage.getItem("workingLec"));
            $('#project-edit-title').html(localStorage.getItem("workingLec"));
        }
        
    }else if(page == "timeline"){
        $('#page_title').html(localStorage.getItem("subtask")+ " Logs");
        $('#link_sub_t').html(localStorage.getItem("subtask")+ " Logs");   
        $('#projectsHead').html(localStorage.getItem("subtask")+ " Logs");
        $('#l_project_name').html(localStorage.getItem("pr_name"));
        $('#l_task_name').html(localStorage.getItem("tr_name"));
    }
    return false;
}

function ConvertMinutes(seconds) {
    seconds = Number(seconds);
    var d = Math.floor(seconds / (3600*24));
    var h = Math.floor(seconds % (3600*24) / 3600);
    var m = Math.floor(seconds % 3600 / 60);
    var s = Math.floor(seconds % 60);
    
    var dDisplay = d > 0 ? d + (d == 1 ? " day, " : " Days, ") : "";
    var hDisplay = h > 0 ? h + (h == 1 ? " hour, " : " Hours, ") : "";
    var mDisplay = m > 0 ? m + (m == 1 ? " minute, " : " Minutes, ") : "";
    var sDisplay = s > 0 ? s + (s == 1 ? " second" : " Seconds") : "";
    return dDisplay + hDisplay + mDisplay + sDisplay;
}

function ConvertMinutes_OLD(num){
    d = Math.floor(num/1440);
    h = Math.floor((num-(d*1440))/60);
    m = Math.round(num%60);
    s = num;
  
    if(d>0){
      return(d + " days, " + h + " hours, "+m+" minutes");
    }else{
      return(h + " hours, "+m+" minutes");
    }
  }

function getIntials(name){
    var initials = name.match(/\b\w/g) || [];
    initials = ((initials.shift() || '') + (initials.pop() || '')).toUpperCase();
    return initials;
}

function logger(msg) {
    console.log(msg);
}

function number_format(number) {
    var thousands_sep = ",";
    var dec_point = ".";
    var decimals = 2;
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function(n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}

function initCalendar(){
	var date = new Date();
    var d = date.getDate(),
    m = date.getMonth(),
    y = date.getFullYear();
    $('#calendar').fullCalendar({
			header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay'
		},
		buttonText: {
		today: 'today',
		month: 'month',
		week: 'week',
		day: 'day'
		},
		editable: true,
		droppable: true, // this allows things to be dropped onto the calendar !!!
		drop: function (date, allDay) { // this function is called when something is dropped

				// retrieve the dropped element's stored Event Object
			var originalEventObject = $(this).data('eventObject');

				// we need to copy it, so that multiple events don't have a reference to the same object
			var copiedEventObject = $.extend({}, originalEventObject);

				// assign it the date that was reported
			copiedEventObject.start = date;
			copiedEventObject.allDay = allDay;
			copiedEventObject.backgroundColor = $(this).css("background-color");
			copiedEventObject.borderColor = $(this).css("border-color");

				// render the event on the calendar
				// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
			$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

				// is the "remove after drop" checkbox checked?
			if ($('#drop-remove').is(':checked')) {
				  // if so, remove the element from the "Draggable Events" list
				$(this).remove();
			}

		}
    });
	return false;
}
