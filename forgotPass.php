            <?php
            require("class.phpmailer.php");
            require("PHPMailerAutoload.php");
            require ("forgotPass_form.php");
            

            define("pusheen_blog", "http://localhost/TEST");

            $mail= new PHPMailer; //enables
            //Server settings
            $mail->SMTPDebug = 0; // Enable
            $mail->isSMTP(); // Set mailer to use SMTP
            $mail->Host       = "smtp.gmail.com"; // Set host name
            $mail->SMTPAuth   = true; // Set this true if SMTP host requires authentification to send mail
            $mail->Username   = "womenwhocan.org@gmail.com"; // Profile username
            $mail->Password   = "Decentric22$"; // Profile email password
            $mail->SMTPSecure = "tls"; // Enable TLS encryption, `ssl` also accepted
            $mail->Port       = 587; // TCP port to connect to

            //Recipients
            $mail->setFrom('womenwhocan.org@gmail.com', 'WomenWhoCan');
            $mail->FromName = "WomenWhoCan";
            $mail->addAddress('$_POST', ['member-email']); // Add a recipient
            $mail->addReplyTo('womenwhocan.org.gmail.com');
            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');          // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');     // Optional name

            //Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = "Forget Password Recovery";
            
            
            $mail->Body="<div>".$member[0]["name"]."<br><br><p>Click here to recover your password<br>
            <a href='".pusheen_blog."resetPassword.php?name=".$member[0]["name"]."'> ".pusheen_blog.
            "resetPassword.php?name=".$member[0]["name"]."</a><br><br></p>Regards<br> Admin.</div>";

            if (!$mail->send()) {
                $error_message = "Mailer Error : " . $mail->ErrorInfo;

            } else {
                $success_message = "Your request has been submitted successfully";
            }

            ?>

 