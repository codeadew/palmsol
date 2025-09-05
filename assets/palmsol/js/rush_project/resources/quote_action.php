<?PHP 
$first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
$last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$sex = mysqli_real_escape_string($conn, $_POST['sex']);
$country = mysqli_real_escape_string($conn, $_POST['country']);
echo $message = mysqli_real_escape_string($conn, $_POST['message']);
if(isset($_POST['request'])){
   $query_to_save_request = "INSERT INTO `flights`.`quote` (`fname`, `lname`, `email`, `phone`, `sex`, `country`, `message`) VALUES ('$first_name', '$last_name', '$email', '$phone', '$sex', '$country', '$message')";
   $save_request= send_query ($conn,$query_to_save_request);
   confirm ($save_request);
   // Set the recipient email address
$to = 'ayisat0113@gmail.com';

// Set the email subject
$subject = 'New message from contact form';

// Build the email message
$body = "Name: $first_name $last_name\nEmail: $email\nMessage: $message";

// Send the email using the mail() function
if (mail($to, $subject, $body)) {
    echo 'Your message has been sent.';
} else {
    echo 'An error occurred. Please try again later.';
}
}
?>
