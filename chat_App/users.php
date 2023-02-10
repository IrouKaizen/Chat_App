<?php
session_start();
if (!isset($_SESSION['unique_id'])) {
    header("location : ../login.php");
}
?>

<?php include_once "header.php"; ?>
<body>
    <div class="wrapper">
        <section class="users">
        <header>
            <?php
           include_once "php/config.php";
           $stmt = $pdo->prepare("SELECT * FROM users WHERE unique_id = :unique_id");
           $stmt->execute(['unique_id' => $_SESSION['unique_id']]);
           $result = $stmt->fetchAll();
           if(count($result) > 0){
               $row = $result[0];
           }
            ?>
            <div class="content">
                <img src="php/images/<?php echo $row['img'] ?>" alt="">
                <div class="detail">
                <span><?php echo $row['fname'] . " " . $row['lname']; ?></span>
                <p><?php echo $row['status']; ?></p>

                </div>
            </div>
            <a href="#" class="logout">Logout</a>
        </header>
                <div class="search">
                    <span class="text">Select an user to start chat</span>
                    <input type="text" placeholder="Enter name to search...">
                    <button><i class="fas fa-search"></i></button>
                </div>
                <div class="users-list">
                    <a href="#">
                        <div class="content">
                            <img src="after.jpg" alt="">
                            <div class="detail">
                                <span>Irou Kaizen</span>
                                <p>This is test message</p>
                            </div>
                        </div>
                        <div class="status-dot"><i class="fas fa-circle"></i></div>
                    </a>

                    <a href="#">
                        <div class="content">
                            <img src="after.jpg" alt="">
                            <div class="detail">
                                <span>Irou Kaizen</span>
                                <p>This is test message</p>
                            </div>
                        </div>
                        <div class="status-dot"><i class="fas fa-circle"></i></div>
                    </a>

                    <a href="#">
                        <div class="content">
                            <img src="after.jpg" alt="">
                            <div class="detail">
                                <span>Irou Kaizen</span>
                                <p>This is test message</p>
                            </div>
                        </div>
                        <div class="status-dot"><i class="fas fa-circle"></i></div>
                    </a>

                    <a href="#">
                        <div class="content">
                            <img src="after.jpg" alt="">
                            <div class="detail">
                                <span>Irou Kaizen</span>
                                <p>This is test message</p>
                            </div>
                        </div>
                        <div class="status-dot"><i class="fas fa-circle"></i></div>
                    </a>

                    <a href="#">
                        <div class="content">
                            <img src="after.jpg" alt="">
                            <div class="detail">
                                <span>Irou Kaizen</span>
                                <p>This is test message</p>
                            </div>
                        </div>
                        <div class="status-dot"><i class="fas fa-circle"></i></div>
                    </a>

                    <a href="#">
                        <div class="content">
                            <img src="after.jpg" alt="">
                            <div class="detail">
                                <span>Irou Kaizen</span>
                                <p>This is test message</p>
                            </div>
                        </div>
                        <div class="status-dot"><i class="fas fa-circle"></i></div>
                    </a>

                    <a href="#">
                        <div class="content">
                            <img src="after.jpg" alt="">
                            <div class="detail">
                                <span>Irou Kaizen</span>
                                <p>This is test message</p>
                            </div>
                        </div>
                        <div class="status-dot"><i class="fas fa-circle"></i></div>
                    </a>
                </div>
        </section>
    </div>

    <script src="Javascript/user.js"></script>

</body>
</html>