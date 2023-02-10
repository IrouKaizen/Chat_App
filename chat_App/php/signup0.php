<?php
    include_once "config.php";
    #$fname = mysqli_real_escape_string($conn, $_POST['fname']);
    #$lname = mysqli_real_escape_string($conn, $_POST['lname']);
    #$email = mysqli_real_escape_string($conn, $_POST['email']);
    #$password = mysqli_real_escape_string($conn, $_POST['password']);

 //   $pdo = new PDO($dsn, $user, $pass);
// $fname = $pdo->quote($_POST['fname']);
 //   $lname = $pdo->quote($_POST['lname']);
  //  $email = $pdo->quote($_POST['email']);
   // $password = $pdo->quote($dsn, $_POST['password']);

   if (isset($_POST['fname'])) {
    $fname = $pdo->quote($_POST['fname']);
}

if (isset($_POST['lname'])) {
    $lname = $pdo->quote($_POST['lname']);
}

if (isset($_POST['email'])) {
    $email = $pdo->quote($_POST['email']);
}

if (isset($_POST['password'])) {
    $password = $pdo->quote($_POST['password']);
}

    if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
        //let's check user email is valid or not
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){//if email is valid
        //$sql = mysqli_query($dsn, "SELECT email FROM");
        $stmt = $conn->prepare("SELECT email FROM email WHERE email = :'{$email}");
        $stmt->bindParam(":value", $value);
        $stmt->execute();
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

            if ($stmt->rowCount() > 0){
                echo "$email - This email already exist !!!";
            }else{
            //let's check user upload file or not
                if(isset($FILES['image'])){ //if file is uploaded
                $img_name = $_FILES['image']['name']; //getting user uploaded img name
//                $img_type = $_FILES['image']['type']; //getting user upload img type
                $tmp_name = $_FILES['image']['tmp_name']; //this temporary name is used to save/move file in our folder

                //let's explode image get last extension name like jpg png
                $img_explode = explode('.', $img_name);
                $img_ext = end($img_explode); //here we get the extensionnof an user uploaded img file 
                $extensions = ['png', 'jpeg', 'jpg']; //there are some valid img ext and we've store them in array
                if(in_array($img_ext, $extensions) === true){ //if user uploaded img ext is matched with any array extensions
                    $time = time(); // This will return current time..
                                    //we need this time because when you uploading user img to in our folder we rename user file with current time
                                    //so all the image will have a unique name
                    //let's move the user uploaded img to our particular folder
                    $new_img_name = $time . $img_name;

                    /*if(move_uploaded_file($tmp_name, "image/".$new_img_name)){ //if user upload img move to our folder successfully
                    $status = "Active now"; //once user signed up then his status will be active now)
                     $random_id = random_int(time(), 10000000); //creating random id for user
                     //let's insert all user data inside table
                        $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status)
                                            VALUES ({$random_id}, '{$fname}', '{$lname}','{$email}','{$password}','{$new_img_name}', '{$status}'");
                        if ($sql2) {//if these data inserted
                            $sql3 = mysqli_query($conn, "SELECT *FROM users WHERE email = '{$email}'");
                            if (mysqli_num_rows($sql3) >0 ) {
                                $row = mysqli_fetch_row($sql3) ;
                                $_SESSION['unique_id'] = $row['unique_id']; //using this session we used user unique_id in other php file
                                echo "success";
                            }
                        }else{
                            echo "Something went wrong!";
                        }

                    }*/
                    $pdo = new PDO("mysql:host=localhost;chat", "root", "root");

$sql = "INSERT INTO users (unique_id, fname, lname, email, password, img, status) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$random_id, $fname, $lname, $email, $password, $new_img_name, $status]);

                    if ($stmt->rowCount() > 0) {
                        $sql = "SELECT * FROM users WHERE email = ?";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute([$email]);
                            if ($stmt->rowCount() > 0) {
                                $row = $stmt->fetch();
                                $_SESSION['unique_id'] = $row['unique_id'];
                                echo "success";
                    } else {
                        echo "Something went wrong!";
                    }

                }
                else {
                    echo "Please select an image file - jpeg, jpg, png!!!";
                }
                }else{
                echo "Please, select an Image file!";
                }
            }
    }else{
        echo  " $email - This is not a valid email ! ";
    }
}else{
    echo "All input field are require";
}

?>