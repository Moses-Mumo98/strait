<?php include 'header.php'?>
<style>
    .contr{
        margin-top: 180px !important;
    }
    .upload_form_cont {
    background: -moz-linear-gradient(#ffffff, #f2f2f2);
    background: -ms-linear-gradient(#ffffff, #f2f2f2);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #ffffff), color-stop(100%, #f2f2f2));
    background: -webkit-linear-gradient(#ffffff, #f2f2f2);
    background: -o-linear-gradient(#ffffff, #f2f2f2);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#f2f2f2');
    -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#f2f2f2')";
    background: linear-gradient(#ffffff, #f2f2f2);

    color:#000;
    overflow:hidden;
    
    margin-bottom: 150px !important;
}
#upload_form {
    float:left;
    padding:20px;
    width:700px;
}
#preview {
    background-color:#fff;
    display:block;
    float:right;
    width:200px;
}
#upload_form > div {
    margin-bottom:10px;
}
#speed,#remaining {
    float:left;
    width:100px;
}
#b_transfered {
    float:right;
    text-align:right;
}
.clear_both {
    clear:both;
}
input {
    border-radius:10px;
    -moz-border-radius:10px;
    -ms-border-radius:10px;
    -o-border-radius:10px;
    -webkit-border-radius:10px;

    border:1px solid #ccc;
    font-size:14pt;
    padding:5px 10px;
}
input[type=button] {
    background: -moz-linear-gradient(#ffffff, #dfdfdf);
    background: -ms-linear-gradient(#ffffff, #dfdfdf);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #ffffff), color-stop(100%, #dfdfdf));
    background: -webkit-linear-gradient(#ffffff, #dfdfdf);
    background: -o-linear-gradient(#ffffff, #dfdfdf);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#dfdfdf');
    -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#dfdfdf')";
    background: linear-gradient(#ffffff, #dfdfdf);
}
#image_file {
    width:400px;
}
#progress_info {
    font-size:10pt;
}
#fileinfo,#error,#error2,#abort,#warnsize {
    color:#aaa;
    display:none;
    font-size:10pt;
    font-style:italic;
    margin-top:10px;
}
#progress {
    border:1px solid #ccc;
    display:none;
    float:left;
    height:14px;

    border-radius:10px;
    -moz-border-radius:10px;
    -ms-border-radius:10px;
    -o-border-radius:10px;
    -webkit-border-radius:10px;

    background: -moz-linear-gradient(#66cc00, #4b9500);
    background: -ms-linear-gradient(#66cc00, #4b9500);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #66cc00), color-stop(100%, #4b9500));
    background: -webkit-linear-gradient(#66cc00, #4b9500);
    background: -o-linear-gradient(#66cc00, #4b9500);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#66cc00', endColorstr='#4b9500');
    -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr='#66cc00', endColorstr='#4b9500')";
    background: linear-gradient(#66cc00, #4b9500);
}
#progress_percent {
    float:right;
}
#upload_response {
    margin-top: 10px;
    padding: 20px;
    overflow: hidden;
    display: none;
    border: 1px solid #ccc;

    border-radius:10px;
    -moz-border-radius:10px;
    -ms-border-radius:10px;
    -o-border-radius:10px;
    -webkit-border-radius:10px;

    box-shadow: 0 0 5px #ccc;
    background: -moz-linear-gradient(#bbb, #eee);
    background: -ms-linear-gradient(#bbb, #eee);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #bbb), color-stop(100%, #eee));
    background: -webkit-linear-gradient(#bbb, #eee);
    background: -o-linear-gradient(#bbb, #eee);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#bbb', endColorstr='#eee');
    -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr='#bbb', endColorstr='#eee')";
    background: linear-gradient(#bbb, #eee);
}

</style>
<div class="container">
        <div class="contr"><h2>Select a file and click Upload</h2></div>
        <div class="upload_form_cont">
            <form id="upload_form">
                <div id="file_inputs_container">
                    <div class="file_upload_group">
                        <div>
                            <label for="doc">Please select file</label>
                            <input type="file" name="doc[]" class="doc" />
                        </div>
                        <br>
                        <div>
                            <input type="text" placeholder="File description" name="descriptions[]" class="descriptions" />
                        </div>
                        <br>
                        <div>
                            <label>Select user</label>
                            
                            <select name="users[]" class="form-control select2 users"></select>
                        </div>
                        <br>
                    </div>
                </div>
                <div>
                    <input type="button" id="uplon" value="Add more files" />
                    <input type="button" id="upload_btns" value="Upload" />
                </div>
            </form>
        </div>
    </div>
    <div id="hloadingmessage" style="display:none;">Loading...</div>
    <div id="upload_response"></div>

<!-- <script>
    $(document).ready(function() {
    $('#uplon').click(function() {
        console.log("Add more files button clicked");
        addFileInput(); // Call function to append new file inputs
    });

    // Other event bindings...

    function addFileInput() {
        console.log("Adding new file input...");
        var fileInput = $('<input type="file" name="doc[]" />');
            var descInput = $('<input type="text" placeholder="File description" name="doc_name[]" />');
            var lineBreak = $('<br/>');
            
            // Prepend new file input and description above the existing elements
            $('.upload_form_cont form').prepend(lineBreak).prepend(descInput).prepend(fileInput);
            console.log("New file input appended");
    }
});

</script> -->
<script src="https://cdn.bootcdn.net/ajax/libs/limonte-sweetalert2/11.7.0/sweetalert2.all.js"></script>
        <?php include 'slider.php';?>
<?php include 'footer.php';?>