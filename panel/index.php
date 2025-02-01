<?php
    session_start();
    require $_SERVER['DOCUMENT_ROOT'] . '/config/php/db.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/config/php/cfg.php';

    if(!isset($_SESSION['user_id'])) {
        header('Location: http://'.$_SERVER['HTTP_HOST']);
        exit();
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

            <div class="flex flex-col justify-center items-center w-max">
                <nav id="nav-subtop" class="border-b-4 border-gray-500 w-full">
                    <ul class="mx-1 py-4 flex flex-row text-xl uppercase font-bold">
                        <li><a class="p-4 text-white hover:text-white  hover:border-cyan-500 hover:bg-slate-600" href="#">Dashboard</a></li>
                        <li><a class="p-4 text-white hover:text-white  hover:border-cyan-500 hover:bg-slate-600" href="#">New Blog</a></li>
                        <li><a class="p-4 text-white hover:text-white  hover:border-cyan-500 hover:bg-slate-600" href="#">New Category</a></li>
                        <li><a class="p-4 text-white hover:text-white  hover:border-cyan-500 hover:bg-slate-600" href="#">New Tag</a></li>
                        <li class="ml-auto"><a class="p-4 text-white hover:text-white  hover:border-cyan-500 hover:bg-slate-600" href="#">Settings</a></li>
                        <li><a class="p-4 text-white hover:text-white  hover:border-cyan-500 hover:bg-slate-600" href="/panel/logout.php">Logout</a></li>
                    </ul>
                </nav>

                <h1 class="font-bold text-center mt-5 uppercase">Welcome back, <span class="text-green-500"><?php echo $_SESSION['username'] ?></span> 👋</h1>
                <p class="text-center">Have a great day!</p>
            
                <h1 class="mb-3 mt-8 text-center uppercase font-bold">My game projects</h1>
                <section id="games" class="flex flex-col items-center justify-center px-4 py-2 gap-5">
                    <div class="flex flex-row gap-5 flex-1 px-8">
                        <div class="flex flex-row border-4 rounded-xl border-blue-600 p-4 flex-1 gap-2">
                            <img src="/img/astolfo.webp" class="rounded-xl w-[150px] h-[150px] aspect-square">
                            <div class="ml-2 flex flex-col w-full">
                                <h2 class="uppercase group-hover:text-blue-500 transition-colors ease-in-out duration-200">CubeTest</h2>
                                <p class="my-2 text-gray-300">This was my first game ever made in Unity. I've made it by following a tutorial series from Brackeys. Additionally, the game features skins for the cube which can be bought with an in-game currency.
                                    <br>Currently, the game is not being worked on anymore, but I do want to revisit it in the future.
                                </p>
                                <button class="border-2 border-green-700 px-2 py-1 text-lg rounded-lg hover:bg-green-700 mt-auto uppercase w-max self-end transition-colors ease-in-out duration-200">Read more</button>
                            </div>
                        </div>

                        <div class="flex flex-row border-4 rounded-xl border-blue-600 p-4 flex-1 gap-2">
                            <img src="/img/jajco.png" class="rounded-xl w-[150px] h-[150px] aspect-square">
                            <div class="ml-2 flex flex-col w-full">
                                <h2 class="uppercase group-hover:text-blue-500 transition-colors ease-in-out duration-200">Roman Clicker (?)</h2>
                                <p class="my-2 text-gray-300">This is one of my favourite projects of all time! The first version of that game, was a simple clicker with some <i>really</i> boring combat system and very little content.
                                    <br>The new version of the game completely gets rid of the clicker mechanic (this is why I'm considering changing the name) and a better, turn-based combat system with skill trees, abilities, attack types, and more!</p>
                                <p class="mt-auto mb-2 text-gray-300">Game is not currently worked on, but a lot of the features are finished.</p>
                                <button class="border-2 border-green-700 px-2 py-1 text-lg rounded-lg hover:bg-green-700 mt-auto uppercase w-max self-end transition-colors ease-in-out duration-200">Read more</button>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-row gap-5 flex-1 px-8 justify-center">
                        <div class="flex flex-row border-4 rounded-xl border-blue-600 p-4 flex-1 gap-2">
                            <img src="/img/astolfo.webp" class="rounded-xl w-[150px] h-[150px] aspect-square">
                            <div class="ml-2 flex flex-col w-full">
                                <h2 class="uppercase group-hover:text-blue-500 transition-colors ease-in-out duration-200">Buckshot Roulette - Web Edition</h2>
                                <p class="my-2 text-gray-300">This is a replication of <a href="#">Buckshot Roulette</a> but in vanilla JavaScript.</p>
                                <p class="mt-auto mb-2 text-gray-300">Game is not currently worked on, and is not complete.</p>
                                <button class="border-2 border-green-700 px-2 py-1 text-lg rounded-lg hover:bg-green-700 mt-auto uppercase w-max self-end transition-colors ease-in-out duration-200">Read more</button>
                            </div>
                        </div>

                        <div class="flex flex-row border-4 rounded-xl border-blue-600 p-4 flex-1 gap-2">
                            <img src="/img/astolfo.webp" class="rounded-xl w-[150px] h-[150px] aspect-square">
                            <div class="ml-2 flex flex-col w-full">
                                <h2 class="uppercase group-hover:text-blue-500 transition-colors ease-in-out duration-200">Codename: Blitz</h2>
                                <p class="my-2 text-gray-300">This is yet another game project. I do not actively work on it, but sometimes I do.
                                    <br>Project is currently in the early stages, with barebones idea of what it's supposed to be.
                                </p>
                                <p class="mt-auto mb-2 text-gray-300">Both, the game and the source-code, are not available to the public yet.</p>
                                <button class="border-2 border-green-700 px-2 py-1 text-lg rounded-lg hover:bg-green-700 mt-auto uppercase w-max self-end transition-colors ease-in-out duration-200">Read more</button>
                            </div>
                        </div>
                    </div>
                </section>
                <hr class="my-8 border-2 border-gray-500 w-full">

                
                <hr class="mt-8 border-2 border-gray-500 w-full">

                <?php include $_SERVER['DOCUMENT_ROOT'] . '/config/html/content-end.html'; ?>
            </div>
        </div>

        <?php include $_SERVER['DOCUMENT_ROOT'] . '/config/html/footer.html'; ?>
    </body>
</html>