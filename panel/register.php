<?php
    session_start();
    require $_SERVER['DOCUMENT_ROOT'] . '/config/php/db.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/config/php/cfg.php';

    if(isset($_SESSION['user'])) {
        header('Location: http://'.$_SERVER['HTTP_HOST'].'/panel/index.php');
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if($mode_registration) {
            if (isset($_POST['login'], $_POST['display-name'], $_POST['password'], $_POST['password-confirm'])) {
                $login = trim($_POST['login']);
                $display_name = trim($_POST['display-name']);
                $password = $_POST['password'];
                $password_confirm = $_POST['password-confirm'];
        
                if ($login === "" || $display_name === "" || $password === "" || $password_confirm === "") {
                    $error_msg = "Error: All fields are required!";
                } elseif ($password !== $password_confirm) {
                    $error_msg = "Error: Passwords do not match!";
                } else {
                    try {
                        $table_users = $dbprefix . "users";
    
                        $stmt = $pdo->prepare("SELECT id FROM `$table_users` WHERE login = ?");
                        $stmt->execute([$login]);
                        
                        if ($stmt->fetch()) {
                            $error_msg = "Error: Username already taken!";
                        } else {
                            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                            
                            $stmt = $pdo->prepare("INSERT INTO " . $dbprefix . "users (login, display_name, password) VALUES (?, ?, ?)");
                            if ($stmt->execute([$login, $display_name, $hashed_password])) {
                                $_SESSION['user'] = $login;
                                $_SESSION['user_id'] = $user['id'];
                                $_SESSION['username'] = $user['display_name'];
                                header('Location: http://'.$_SERVER['HTTP_HOST'].'/panel/index.php');
                                exit();
                            } else {
                                $error_msg = "Error: Registration failed. Please try again.";
                            }
                        }
                    } catch (PDOException $e) {
                        $error_msg = "Error: Database error: " . $e->getMessage();
                    }
                }
            } else {
                $error_msg = "Error: Invalid form submission.";
            }
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
                <p class="text-center">Please register to continue. </p>
                
                <form method="POST" action="/panel/register.php" class="bg-slate-900 rounded-xl p-4 flex flex-col w-1/2 gap-3 mb-8 mt-4 border-2 border-blue-500">
                    <div class="flex flex-row gap-4">
                        <div class="flex flex-col w-1/2">
                            <label for="login" class="text-xl font-bold">Login:</label>
                            <input type="text" name="login" placeholder="eg. XSecretSantaX" class="rounded-lg p-2 bg-slate-700 mb-6" />

                            <label for="display-name" class="text-xl font-bold">Display name:</label>
                            <input type="text" name="display-name" placeholder="eg. Jajco" class="rounded-lg p-2 bg-slate-700 mb-6" />
        
                            <label for="password" class="text-xl font-bold">Password:</label>
                            <input type="password" name="password" placeholder="eg. *******" class="rounded-lg p-2 bg-slate-700 mb-6" />
        
                            <label for="password-confirm" class="text-xl font-bold">Confirm password:</label>
                            <input type="password" name="password-confirm" placeholder="same as above *******" class="rounded-lg p-2 bg-slate-700 mb-2" />
                        </div>

                        <div class="flex flex-col items-center w-1/2">
                            <img src="/img/astolfo.webp" class="w-[150px] h-[150px] rounded-xl"/>
                            <p class="text-center my-2 text-red-600"><?php echo $error_msg; ?></a></p>
                            <p class="text-center mt-auto">By creating an account, you agree to our <a href="#">terms of service</a> and <a href="#">privacy policy</a></p>
                        </div>
                    </div>
                    <button type="submit"  class="rounded-lg p-2 border-2 border-green-600 hover:bg-green-600 uppercase transition-colors ease-in-out duration-200">Register</button>
                </form>

                <?php
                } else {
                ?>

                <h1 class="font-bold text-center mt-5">You can't create an account.</h1>
                <p class="text-center mb-4">Registration has been disabled by the service owner.</p>

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