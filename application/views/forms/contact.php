<?php 
// if the url field is empty 
if(isset($_POST['url']) && $_POST['url'] == ''){
     // then send the form to your email
    if($_POST["message"] == "" || $_POST["name"] == "" || $_POST["subject"] == "" || $_POST["email"] == ""){
        echo "<p>Please press the back button and fill in all fields</p>";
    } else {
        // then send the form to your email
        mail( 'albertosanjaya15@gmail.com', 'Contact Form', print_r($_POST,true) );
    }
} 
// otherwise, let the spammer think that they got their message through
?>