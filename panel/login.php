<?php
    session_start();
    require $_SERVER['DOCUMENT_ROOT'] . '/config/php/db.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/config/php/cfg.php';

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        if (!empty($_POST['login']) && !empty($_POST['password'])) {
            $login = trim($_POST['login']);
            $pass = $_POST['password'];
    
            $table_users = $dbprefix . "_users";
    
            $stmt = $pdo->prepare("SELECT id, login, password, display_name FROM `$table_users` WHERE login = :login");
            $stmt->execute(['login' => $login]);
            $user = $stmt->fetch();
    
            if ($user && password_verify($pass, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['display_name'];
                header('Location: /panel/index.php');
                exit;
            } else {
                $error_msg = "Error: Invalid username or password!";
            }
        } else {
            $error_msg = "Error: Please fill in all fields! ".$_POST['login'].$_POST['password'];
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>Cnnn666 // Homepage</title>

        <link rel="stylesheet" href="/css/styles.css" />
        <link rel="stylesheet" href="/css/default.css" />
    </head>

    <body>
        <header class="flex flex-col w-full">
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/config/html/navbar.html'; ?>
        </header>

        <div id="container" class="flex flex-row relative">
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/config/html/sidebar.html'; ?>

            <div class="flex flex-col  items-center w-full">
                <?php 
                if($mode_registration == true) {
                ?>

                <h1 class="font-bold text-center mt-5">Hey there! 👋</h1>
                <p class="text-center">Please login to continue. </p>
                
                <form method="POST" action="/panel/login.php" class="bg-slate-900 rounded-xl p-4 flex flex-col w-1/2 gap-3 mb-8 mt-4 border-2 border-blue-500">
                    <div class="flex flex-row gap-4">
                        <div class="flex flex-col w-1/2">
                            <label for="login" class="text-xl font-bold">Login:</label>
                            <input type="text" name="login" placeholder="eg. XSecretSantaX" class="rounded-lg p-2 bg-slate-700 mb-6" required/>
        
                            <label for="password" class="text-xl font-bold">Password:</label>
                            <input type="password" name="password" placeholder="eg. *******" class="rounded-lg p-2 bg-slate-700 mb-6" required/>
                        </div>

                        <div class="flex flex-col items-center w-1/2">
                            <img src="/img/astolfo.webp" class="w-[150px] h-[150px] rounded-xl"/>
                            <p class="text-center mt-2">Welcome back, user.</p>
                            <p class="text-center my-2 text-red-600"><?php echo $error_msg; ?></a></p>
                        </div>
                    </div>
                    <button type="submit" class="rounded-lg p-2 border-2 border-green-600 hover:bg-green-600 uppercase transition-colors ease-in-out duration-200">Login</button>
                </form>

                <?php
                }
                ?>
                
                <hr class="border-2 border-gray-500 w-full">

                <?php include $_SERVER['DOCUMENT_ROOT'] . '/config/html/content-end.html'; ?>
            </div>
        </div>

        <?php include $_SERVER['DOCUMENT_ROOT'] . '/config/html/footer.html'; ?>
    </body>
</html>