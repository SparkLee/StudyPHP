<?php
require_once 'PHPMailerAutoload.php';
 
$results_messages = array();
 
$mail = new PHPMailer(true);
$mail->CharSet = 'utf-8';
 
class phpmailerAppException extends phpmailerException {}
 
try {
$to = 'liweijsj163.com';
if(!PHPMailer::validateAddress($to)) {
  throw new phpmailerAppException("收件人地址 " . $to . " 无效 -- 已中止邮件发送!");
}
$mail->isSMTP();
$mail->SMTPDebug  = 2;
$mail->Host       = "smtp.exmail.qq.com";
$mail->Port       = "465";
$mail->SMTPSecure = "ssl";
$mail->SMTPAuth   = true;
$mail->Username   = "liwei@vriworks.com";
$mail->Password   = "vw#2013";
$mail->addReplyTo("liwei@vriworks.com", "牛逼威");
$mail->From       = "liwei@vriworks.com";
$mail->FromName   = "牛逼威";
$mail->addAddress("liweijsj@163.com", "哈哈奇");
$mail->addBCC("496374935@qq.com");
$mail->addCC("send@vriworks.com");
$mail->Subject  = "测试一下就好(PHPMailer test using SMTP)";
$body = <<<'EOT'
噼里啪啦
EOT;
$mail->WordWrap = 78;
$mail->msgHTML($body, dirname(__FILE__), true); //Create message bodies and embed images
$mail->addAttachment('example/images/phpmailer_mini.png','phpmailer_mini.png');  // optional name
$mail->addAttachment('example/images/phpmailer.png', 'phpmailer.png');  // optional name
 
try {
  $mail->send();
  $results_messages[] = "Message has been sent using SMTP";
}
catch (phpmailerException $e) {
  throw new phpmailerAppException('Unable to send to: ' . $to. ': '.$e->getMessage());
}
}
catch (phpmailerAppException $e) {
  $results_messages[] = $e->errorMessage();
}
 
if (count($results_messages) > 0) {
  echo "<h2>Run results</h2>\n";
  echo "<ul>\n";
foreach ($results_messages as $result) {
  echo "<li>$result</li>\n";
}
echo "</ul>\n";
}