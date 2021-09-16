<?php 

    //Import PHPMailer classes into the global namespace
    use PHPMailer\PHPMailer\PHPMailer;
    require './vendor/autoload.php';
    //Create a new PHPMailer instance
    $mail = new PHPMailer();

//check if the User is coming from the form

if( $_SERVER['REQUEST_METHOD'] == 'POST' ){

    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $last_name = filter_var($_POST['last_name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $number = filter_var($_POST['number'], FILTER_SANITIZE_NUMBER_INT);
    $msg = filter_var($_POST['msg'], FILTER_SANITIZE_STRING);
    $body = 'Name: ' . $name . ' ' .  $last_name . '<br>' . 'Email: ' .  $email . '<br>' . ' Phone Number: ' . $number . '<br>' . $msg;


    // Creating Array of the Errors
    $errors = array();

    if(strlen($name) < 3 ){
        $errors[]= "Name must be more than 3 latters.";
    }
    if(strlen($email) < 7 ){
        $errors[]= "Put you correct Email.";
    }
    if(strlen($number) < 7 ){
        $errors[]= "Put you correct Phone number.";
    }    
    if(strlen($msg) < 15 ){
        $errors[]= "Message must be more than 15 latters.";
    }
    
    //Send the Email
    if(!isset($last_name)){$last_name = '';}


    if(empty($errors)){


        //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'mail.web12.ro';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'x17web12';                 // SMTP username
        $mail->Password = 'hlODsn5TdDUm';                           // SMTP password
        $mail->SMTPSecure = 'TLS';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;  

        $mail->setFrom('bayram@web12.ro', 'Web12 Contact Form');
        //$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
        $mail->addAddress('bayram.web12@gmail.com');               // Name is optional
        $mail->addReplyTo('bayram.web12@gmail.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Email from My clients';

        $mail->Body    =  $body; 


    

        if($mail->send()){
            $success = '<div class="card-panel green accent-2"><p class="flow-text success-msg ">Your message was sent</p></div>';      
            $name = '';
            $last_name = '';
            $email = '';
            $number = '';
            $msg = '';

            //header('location: http://web12.ro/test');

            
        }else{
            $success = '<div class="card-panel red lighten-1"><p class="flow-text success-msg ">Your message was not sent</p></div>';

        }

    }


}// SERVER METHOD

?> <!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1"><meta http-equiv="X-UA-Compatible" content="ie=edge"><title>Web12 | Bayram Alak - WordPress and Web Developer | بيرم علك - تصميم وتطوير المواقع</title><meta name="Description" content="My name is Bayram and I am living in Romania. I offer you highly customizable wordpress website designs. Regardless if your website is a blog, a presentation site, or an online store"><meta name="Keywords" content="WordPress, HTML5, php, css, web development, تصميم المواقع"><!--Import fav --><link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png"><link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png"><link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png"><link rel="manifest" href="img/site.webmanifest"><link rel="mask-icon" href="img/safari-pinned-tab.svg" color="#5bbad5"><meta name="msapplication-TileColor" content="#da532c"><meta name="theme-color" content="#ffffff"><!--Import materialize.css--><link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection"><link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"><link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous"><link href="https://fonts.googleapis.com/css?family=Cairo:300|Poiret+One|Quicksand" rel="stylesheet"><link rel="stylesheet" href="css/main.css"></head><body><div id="wrap" class="wrap"><header class="row"><div class="col m6"><h1><a href="http://web12.ro/">WEB12</a></h1></div><div class="col m6"><a href="http://web12.ro/"><img class="logo" src="./img/web12-Bayram-Alak-logo.png" alt="Web12.ro"></a></div></header><div class="container"><div class="row"><div class="col l6"><div class="title"><h4 class="brm-name">Bayram Alak</h4><h5>WordPress & Front-end Developer</h5></div><div class="lang-content"><ul id="tabs-swipe-demo" class="tabs"><li class="tab col s3 flag"><a href="#test-swipe-1"><img src="img/united_kingdom_round_icon_64.png" alt="English"></a></li><li class="tab col s3 flag"><a href="#test-swipe-2"><img src="img/iraq_round_icon_64.png" alt="عربي"></a></li><li class="tab col s3 flag"><a href="#test-swipe-3"><img src="img/romania_round_icon_64.png" alt="Romanian"></a></li></ul><div id="test-swipe-1" class="col s12 tab-contetn en-text"><p>My name is Bayram and I am living in Romania. I offer you highly customizable wordpress website designs. Regardless if your website is a blog, a presentation site, or an online store, you can select your own original design. Moreover, I can create your online shop based on woocommerce. I can also remove malware, debug errors, immigrate your site safely from one domain to another. I can also work as a front-end developer based on CSS SASS, JQuery, HTLM5, Bootstrap, ZURB foundation</p></div><div id="test-swipe-2" class="col s12 tab-contetn ar-text"><p>اسمي بيرم, اعيش في رومانيا, مطورلواجهات المواقع و كذلك نظام الوردبرس والووكومرس وهي اضافة لبناء متجر الكتورني متكامل واحترافي, اهتم ايضا باخر التصاميم العالمية التي بدورها تجعل من موقعك جذابا وملائم لكل الزوار والمستخدمين ومتوافق ايضا مع جميع احجام الشاشات من جهاز المحمول الى الشاشات الكبيرة مرورا بالتابلت. خدماتي باختصار هي تصميم وتطوير المواقع, نقل المواقع الى استضافة جديدة, سد الكثير من الثغرات الخاصة بالوردبرس, انشاء متجر الكتروني مع العديد من طرق الدفع كالدفع عن طريق البنك او الباي بال. وكذلك انشاء المواقع الاخبارية والشخصية.</p></div><div id="test-swipe-3" class="col s12 tab-contetn ro-text"><p>Numele meu este Bayram și locuiesc în România. Vă ofer servicii personalizate de dezvoltare a site-urilor wordpress. Indiferent dacă site-ul dvs. este un blog, un site de prezentare sau un magazin online, va puteți selecta propriul design original. În plus, vă pot crea un magazin online bazat pe woocommerce. De asemenea, pot elimina malware, erorile de depanare, transfera site-ul dvs. în condiții de siguranță de la un domeniu la altul. De asemenea, pot lucra ca front-end developer bazat pe CSS SASS, JQuery, HTLM5, Bootstrap, ZURB.</p></div></div><div class="fixed-action-btn horizontal"><a class="btn-floating btn-large red pulse"><i class="fas fa-comments"></i></a><ul><li><a href="https://www.facebook.com/Web12.ro" class="btn-floating light-blue darken-4"><i class="fab fa-facebook-f"></i></a></li><li><a href="https://twitter.com/BayramWeb" class="btn-floating light-blue lighten-1"><i class="fab fa-twitter"></i></a></li><li><a href="https://www.upwork.com/freelancers/~01bfa8457c0d85d1e5" class="btn-floating green accent-3"><i class="fas fa-globe"></i></a></li><li><a href="https://www.linkedin.com/in/bayram-alak-b246397a/" class="btn-floating light-blue darken-4"><i class="fab fa-linkedin-in"></i></a></li></ul></div></div><div class="col l6"><h4>Contact Me</h4><h5>Tel: +40764911953</h5> <?php
                                if (! empty($errors)){
                                    echo "<div class='errors'>";
                                    echo "<ul>";
                                        foreach($errors as $error){
                                            echo"<li>";
                                                echo $error;
                                            echo "</li>";
                                        }
                                    echo "</ul>";
                                    echo "</div>";

                                }    


                            ?> <?php 
                            if(isset($success)){ 
                                echo $success ;
                            }
                            ?> <form form autocomplete="off" class="contact-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"><div class="row"><div class="input-field col m6 opl"><input name="name" id="first_name" type="text" class="validate" data-length="10" value="<?php if(isset($name)){ echo $name; } ?>"> <label for="first_name">First Name</label> <i class="fas fa-asterisk brm_name"></i></div><div class="input-field col m6"><input name="last_name" id="last_name" type="text" class="validate" data-length="10" value="<?php if(isset($last_name)){ echo $last_name; } ?>"> <label for="last_name">Last Name</label></div></div><div class="row"><div class="input-field col m6 opl"><input name="email" id="email" type="email" class="validate" value="<?php if(isset($email)){ echo $email; } ?>"> <label for="email">Email</label> <i class="fas fa-asterisk brm_email"></i></div><div class="input-field col m6 opl"><input name="number" id="tel" type="text" class="validate" value="<?php if(isset($number)){ echo $number; } ?>"> <label for="tel">Phone Number</label> <i class="fas fa-asterisk brm_tel"></i></div></div><div class="row"><div class="input-field col s12 opl"><textarea name="msg" id="textarea" class="materialize-textarea" data-length="500"><?php if(isset($msg)){ echo $msg; } ?></textarea> <label for="textarea">Textarea</label> <i class="fas fa-asterisk brm_msg"></i></div></div><div class="row"><div class="input-field col s6 anti-spam"><div class="row"><div class="col s6"><div class="calc-nr"><span class="1st-nr"><?php echo rand(1, 4); ?> </span><span class="opr">X</span> <span class="2nd-nr"><?php echo rand(1, 3); ?> </span><span class="equl">=</span></div></div><div class="col s4 result"><input id="result-input" class="" type="text" placeholder="?"></div></div></div><div class="input-field col s6 send-div"><input id="send" class="waves-effect waves-light btn-large light-blue lighten-3 brm-btn" type="submit" value="Send"></div></div></form></div></div></div></div><!--Import jQuery before materialize.js--><script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script><script type="text/javascript" src="js/materialize.min.js"></script><script type="text/javascript" src="js/jquery.nicescroll.min.js"></script><script src="js/beneposto.js"></script><script src="js/main.js"></script><!-- Global site tag (gtag.js) - Google Analytics --><script async src="https://www.googletagmanager.com/gtag/js?id=UA-45223100-1"></script><script>window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-45223100-1');</script></body></html>