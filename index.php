<!-- This small calculator was made by Glori4n(https://glori4n.com) as a small exercise for begginer students -->

<?php

if(isset($_POST['submit'])){

    $name = addslashes($_POST["name"]);
    $email = addslashes($_POST["email"]);
    $msg = addslashes($_POST["msg"]);
    @$opt1 = addslashes($_POST["opt1"]);

    $to = "YOUREMAIL@YOUREMAIL.COM";
    $subject = addslashes($_POST["subject"]);
    $body = "Name: ".$name."\r\n E-mail: ".$email."\r\n Message: ".$msg;
    $header =   "From: YOUREMAIL@YOUREMAIL.COM"."\r\n".
                "Reply-To: ".$email."\r\n".
                "X-Mailer: PHP/".phpversion();
    
    if(mail($to, $subject, $body, $header)){

        if(isset($opt1) && !empty($opt1) && mail($email, $subject, $body, $header)){
            echo "<h1>Message sent, and a copy was sent to the supplied E-mail.</h1>";
        }else{
            echo "<h1>Mail sent!</h1>";
        }
        
    }else{
        echo "<h1>Mail failed to be sent.";
    }
    exit;

}

?>

<form method="POST">

    Name: <br>  
    <input type="text" name="name"><br><br>
    
    Your E-mail: <br>
    <input type="text" name="email"><br><br>

    Subject: <br>
    <input type="text" name="subject"><br><br>

    Message: <br>
    <textarea name="msg"></textarea><br><br>

    Would you like to have a copy of this message sent to your E-mail?
    <input type="checkbox" name="opt1"><br><br>

    <input type="submit" name="submit">

</form>