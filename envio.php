<!--

	Gostou deste script?
	
	Então curta a nossa página no Facebook
	https://www.facebook.com/invettorbrasil
	
	Siga-nos no twitter:
	https://twitter.com/invettorbrasil
	
	suporte para clientes invettor: atendimento@invettor.com.br
	
	Time de suporte inVettor 07/03/2017

-->
<?php 
                if ($_POST) 
                {
                    //Carrega as classes do PHPMailer
                    include("./phpmailer/class.phpmailer.php"); 
                    include("./phpmailer/class.smtp.php"); 
                    
                    //envia o e-mail para o visitante do site
                    $mailDestino = $_POST['txtEmail']; 
                    $nome = $_POST['txtNome'];
                    $mensagem = "Obrigado pelo seu contato, responderemos ASAP!";
                    $assunto = "Obrigado pelo seu contato!";
                   
                    
                    //envia o e-mail para o administrador do site
                    $mailDestino = 'erick.fernandesg@gmail.com'; 
                    $nome = 'inVettor';	
                    $assunto = "Mensagem recebida do site";
                    $mensagem = "Recebemos uma mensagem no site <br/>
                                <strong>Nome:</strong> $_POST[txtNome]<br/>
                                <strong>e-mail:</strong> $_POST[txtEmail]<br/>
                                <strong>Numero:</strong> $_POST[txtNumero]<br/>
                                <strong>Cargo:</strong> $_POST[txtCargo]<br/>
                                <strong>Empresa:</strong> $_POST[txtEmpresa]<br/>
                                <strong>mensagem:</strong> $_POST[txtMensagem]";
                    
                    
                    
                }
          
 $mail = new PHPMailer();
 $mail->IsSMTP(); 
 $mail->CharSet = 'UTF-8';
/* $mail->True;*/
 $mail->Host = "smtp.gmail.com"; // Servidor SMTP
 $mail->SMTPSecure = "tls"; // conexão segura com TLS
 $mail->Port = 587; 
 $mail->SMTPAuth = true; // Caso o servidor SMTP precise de autenticação
 $mail->Username = "erick.fernandesg@gmail.com"; // SMTP username
 $mail->Password = "Futebol1203"; // SMTP password
 $mail->From = "erick.fernandesg@gmail.com"; // From
 $mail->FromName = "Sua Empresa" ; // Nome de quem envia o email
 $mail->AddAddress($mailDestino, $nome); // Email e nome de quem receberá //Responder
 $mail->WordWrap = 50; // Definir quebra de linha
 $mail->IsHTML = true ; // Enviar como HTML
 $mail->Subject = $assunto ; // Assunto
 $mail->Body = '<br/>' . $mensagem . '<br/>' ; //Corpo da mensagem caso seja HTML
 $mail->AltBody = "$mensagem" ; //PlainText, para caso quem receber o email não aceite o corpo HTML

if(!$mail->Send()) // Envia o email
 { 
 echo "Erro no envio da mensagem";
 } 
 
?>