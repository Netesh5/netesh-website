<?php
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$subject=$_POST['subject'];
$message=$_POST['message'];

$conn = new mysqli('localhost','root','','contact_details');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into userdata(name,email,phone,subject,message)
    values(?,?,?,?,?)");
    $stmt->bind_param("ssiss", $name, $email, $phone, $subject, $message);
    $stmt->execute();
    echo"Message Sent";
    $stmt->close();
    $conn->close();
}
?>
