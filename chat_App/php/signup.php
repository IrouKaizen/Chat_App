<?php

/*session_start();
    include_once "config.php";
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
        $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
            if (mysqli_num_rows($sql) > 0) {
            echo "$email - is already exist ! ";
            } else {
                if (isset($_FILES['image'])) {
                $img_name = $_FILES['image']['name'];
                $tmp_name = $_FILES['image']['tmp_name'];

                $img_explode = explode('.', $img_name);
                $img_ext = end($img_explode);

                $extensions = ['png', 'jpeg', 'jpg'];
                    if (in_array($img_ext, $extensions) === true) {
                    $time = time();
                    $new_img_name = $time.$img_name;

                    if (move_uploaded_file($tmp_name, "images/" . $new_img_name)) {
                        $status = "Active now";
                        $random_id = random_int(time(), 10000000);

                        $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, password, img, status
                                                        VALUES({$random_id}, '{$fname}', '{$lname}', '{$email}, '{$password}', '{$new_img_name}', '{$status}')");
                        if ($sql2) {
                            $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                            if (mysqli_num_rows($sql3) > 0) {
                                $row = mysqli_fetch_assoc($sql3);
                                $_SESSION['unique_id'] = $row['unique_id];
                            } else {
                                # code...
                            }
                        } else {
                            echo "Something went wrong ! ";
                        }
                    }
                        else {
                        # code...
                        }
                    } else {
                    echo "Please select an Image file - jpeg, jpg, png ! ";
                    }
                }else {
                    echo"Please explode image";
                }
            }
        }else{
        echo "$email - is not valid email !";
        }
    }else {
    echo "All input field are required";
    }*/              //PDO>>>>>>>>>>
//

session_start();
    include_once "config.php";
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$password = $_POST['password'];

//$unique_id = $_POST['unique_id'];
//$image = $_POST['image'];
//$status = $_POST['status'];

//    $stmt = $pdo->prepare("INSERT INTO users (fname, lname, email, password) VALUES (:fname, :lname, :email, :password)");
    $stmt = $pdo->prepare("INSERT INTO users (fname, lname, email, password) VALUES (?,?,?,?)");

    /*$stmt->bindParam(':fname', $_POST['fname']);
    $stmt->bindParam(':lname', $_POST['lname']);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':password', $_POST['password']);
    $stmt->bindParam(':unique_id', $_POST['unique_id']);
    $stmt->bindParam(':image', $_POST['image']);
    $stmt->bindParam(':status', $_POST['status']);*/
    //$stmt->execute(array("fname" => $fname , "lname" => $lname, "email" => $email, "password" => $password));
    $stmt->execute(array( $fname , $lname, $email, $password));


    if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
            $stmt = $pdo->prepare("SELECT email FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $result = $stmt->fetchAll();

            if (count($result) > 0) {
            echo "$email - is already exist ! ";
            } else {
                if (isset($_FILES['image'])) {
                $img_name = $_FILES['image']['name'];
                $tmp_name = $_FILES['image']['tmp_name'];

                $img_explode = explode('.', $img_name);
                $img_ext = end($img_explode);

                $extensions = ['png', 'jpeg', 'jpg'];
                    if (in_array($img_ext, $extensions) === true) {
                    $time = time();
                    $new_img_name = $time.$img_name;

                    if (move_uploaded_file($tmp_name, "images/" . $new_img_name)) {
                        $status = "Active now";
                        $random_id = random_int(time(), 10000000);

                        $sql2 = $pdo->prepare("INSERT INTO users (unique_id, fname, lname, password, image, status) VALUES (:random_id, :fname, :lname, :email, :password, :new_img_name, :status)");
                        $sql2->bindParam(':random_id', $random_id);
                        $sql2->bindParam(':fname', $fname);
                        $sql2->bindParam(':lname', $lname);
                        $sql2->bindParam(':email', $email);
                        $sql2->bindParam(':password', $password);
                        $sql2->bindParam(':new_img_name', $new_img_name);
                        $sql2->bindParam(':status', $status);
                        $sql2->execute();

                        if($sql2){
                            //$sql3 = $conn->prepare("SELECT * FROM users WHERE email = :email");
                            $sql3->execute(['email' => $email]);
                            $sql3->bindParam(':email', $email);
                            $sql3->execute();
                            $result = $sql3->fetch(PDO::FETCH_ASSOC);
                            if(!empty($result)){
                            $_SESSION['unique_id'] = $result['unique_id'];
                            }else{
                                // code...
                            }
                        }else{
                            echo "Something went wrong !";
                        }
                    }
                        else {
                        # code...
                        }
                    } else {
                    echo "Please select an Image file - jpeg, jpg, png ! ";
                    }
                }else {
                    echo"Please explode image";
                }
            }
        }else{
            echo "$email is not a valid email!";
        }
    }else {
    echo "All input field are required";
    }
    ?>