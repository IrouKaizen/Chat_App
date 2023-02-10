<?php include_once "header.php"; ?>
<body>
    <div class="wrapper">
        <section class="form login">
            <header>Realtime Chat App</header>
            <form action="#">
                <div class="error-txt">This is an error message !</div>
                <div class="name-details">
                    <div class="field input">
                        <label>Email adresse</label>
                        <input type="text" name="email" placeholder="Enter your email">
                    </div>
                    <div class="field input">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Enter your password">
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="field button">
                        <input type="submit" value="Continue to Chat">
                    </div>
                </div>
            </form>
            <div class="link">Not yet signed up ? <a href="index.php"> signup now</a></div>
        </section>
    </div>

    <script src="Javascript/pass-show-hide.js"></script>
    <script src="javascript/login.js"></script>
</body>
</html>