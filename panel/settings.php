<?php
    session_start();
    $config = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '/config/php/cfg.php');

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

            <div class="flex flex-col items-center w-full">
                <nav id="nav-subtop" class="w-full">
                    <ul class="flex flex-row mx-2 py-4 text-xl uppercase font-bold pb-3">
                        <li class="px-2 py-3"><a class="px-2 py-3 text-white hover:text-white border-2 rounded-lg border-green-600 hover:bg-green-600 transition-colors ease-in-out duration-200" href="/panel/">Dashboard</a></li>
                        <li class="px-2 py-3"><a class="px-2 py-3 text-white hover:text-white border-2 rounded-lg border-green-600 hover:bg-green-600 transition-colors ease-in-out duration-200" href="#" id="subnav-blogs">Blogs</a></li>
                        <li class="px-2 py-3"><a class="px-2 py-3 text-white hover:text-white border-2 rounded-lg border-green-600 hover:bg-green-600 transition-colors ease-in-out duration-200" href="#" id="subnav-categories">Categories</a></li>
                        <li class="px-2 py-3"><a class="px-2 py-3 text-white hover:text-white border-2 rounded-lg border-green-600 hover:bg-green-600 transition-colors ease-in-out duration-200" href="#" id="subnav-tags">Tags</a></li>
                        <li class="px-2 py-3 ml-auto"><a class="px-2 py-3 text-white hover:text-white border-2 rounded-lg border-green-600 hover:bg-green-600 transition-colors ease-in-out duration-200" href="/panel/settings.php">Settings</a></li>
                        <li class="px-2 py-3"><a class="px-2 py-3 text-white hover:text-white border-2 rounded-lg border-green-600 hover:bg-green-600 transition-colors ease-in-out duration-200" href="/panel/account.php">Account</a></li>
                        <span class="bg-green-600"></span>
                    </ul>

                    <div id="panel-dropdown" class="p-4 border-y-4 border-gray-500 bg-slate-900">
                        <h1 class="font-bold text-center uppercase">Welcome back, <span class="text-green-500"><?php echo $_SESSION['username'] ?></span> 👋</h1>
                        <p class="text-center">Have a great day!</p>

                        <div id="dropdown-blogs" class="flex flex-row w-full h-full hidden">
                            <div class="flex flex-col basis-1/2 gap-3">
                                <h1 class="uppercase">Blogs</h1>
                                <div class="flex flex-row gap-2">
                                    <a href="#" class="p-2 border-2 border-cyan-600 rounded-lg text-xl uppercase text-white hover:text-white hover:bg-cyan-600 w-max transition-colors ease-in-out duration-200">New Blog +</a>
                                    <a href="#" class="p-2 border-2 border-cyan-600 rounded-lg text-xl uppercase text-white hover:text-white hover:bg-cyan-600 w-max transition-colors ease-in-out duration-200">All Blogs</a>
                                    <a href="#" class="p-2 border-2 border-cyan-600 rounded-lg text-xl uppercase text-white hover:text-white hover:bg-cyan-600 w-max transition-colors ease-in-out duration-200">Your Blogs</a>
                                </div>

                                <p>Random blog: <a href="#">[ TITLE ]</a></p>
                            </div>

                            <div class="flex flex-col basis-1/2 text-right mt-auto  ">
                                <p class="uppercase text-xl font-bold">Total blogs: 256</p>
                                <p class="uppercase text-xl font-bold">Total users: 10</p>
                                <a href="#" class="ml-auto mt-1 p-2 border-2 border-cyan-600 rounded-lg text-xl uppercase font-bold text-white hover:text-white hover:bg-cyan-600 w-max transition-colors ease-in-out duration-200">User list</a>
                            </div>
                        </div>

                        <div id="dropdown-categories" class="flex flex-row w-full h-full hidden">
                            <div class="flex flex-col basis-1/2 gap-3">
                                <h1 class="uppercase">Categories</h1>
                                <div class="flex flex-row gap-2">
                                    <a href="#" class="p-2 border-2 border-cyan-600 rounded-lg text-xl uppercase text-white hover:text-white hover:bg-cyan-600 w-max transition-colors ease-in-out duration-200">New Category +</a>
                                    <a href="#" class="p-2 border-2 border-cyan-600 rounded-lg text-xl uppercase text-white hover:text-white hover:bg-cyan-600 w-max transition-colors ease-in-out duration-200">All Categories</a>
                                </div>

                                <p class="uppercase font-bold">Pinned categories:
                                    <span class="bg-red-700 rounded-lg px-2 py-1">youtube</span>
                                    <span class="bg-green-700 rounded-lg px-2 py-1">life</span>
                                    <span class="bg-blue-700 rounded-lg px-2 py-1">news</span>
                                    <span class="bg-orange-700 rounded-lg px-2 py-1">tutorial</span>
                                    <a href="">[ Change ]</a>
                                </p>

                                <p class="uppercase font-bold">Total categories: 25</p>
                            </div>
                        </div>

                        <div id="dropdown-tags" class="flex flex-row w-full h-full hidden">
                            <div class="flex flex-col basis-1/2 gap-3">
                                <h1 class="uppercase">Tags</h1>
                                <div class="flex flex-row gap-2">
                                    <a href="#" class="p-2 border-2 border-cyan-600 rounded-lg text-xl uppercase text-white hover:text-white hover:bg-cyan-600 w-max transition-colors ease-in-out duration-200">New Tag +</a>
                                    <a href="#" class="p-2 border-2 border-cyan-600 rounded-lg text-xl uppercase text-white hover:text-white hover:bg-cyan-600 w-max transition-colors ease-in-out duration-200">All Tags</a>
                                </div>

                                <p class="uppercase font-bold">Pinned tags:
                                    <span class="bg-red-700 rounded-lg px-2 py-1">showcase</span>
                                    <span class="bg-green-700 rounded-lg px-2 py-1">photos</span>
                                    <span class="bg-blue-700 rounded-lg px-2 py-1">videos</span>
                                    <span class="bg-orange-700 rounded-lg px-2 py-1">games</span>
                                    <a href="">[ Change ]</a>
                                </p>

                                <p class="uppercase font-bold">Total tags: 25</p>
                            </div>
                        </div>
                    </div>
                </nav>

                <section id="dashboard" class="flex flex-col items-center px-4 py-2 gap-2 w-full">
                    <form class="flex flex-col w-full gap-4">
                    <h1 class="uppercase font-bold text-center">Website Settings</h1>

                    <div class="flex flex-row items-start w-full gap-4">
                        <div class="flex flex-col items-start border-2 border-blue-600 p-4 w-1/3 rounded-lg">
                            <h1 class="uppercase font-bold text-center w-full">Modes</h1>
                            <div class="flex flex-row gap-2">
                                <label for="maintenance">Maintenance mode:</label>
                                <input type="checkbox" name="maintenance" />
                            </div>

                            <div class="flex flex-row gap-2">
                                <label for="registration">Registration:</label>
                                <input type="checkbox" name="registration" />
                            </div>
                        </div>

                        <div class="flex flex-col items-start border-2 border-blue-600 p-4 w-1/3 rounded-lg">
                            <h1 class="uppercase font-bold text-center w-full">Services</h1>
                            <div class="flex flex-row gap-2">
                                <label for="recovery">Email recovery (N/A):</label>
                                <input type="checkbox" name="recovery" disabled />
                            </div>
                        </div>

                        <div class="flex flex-col items-start border-2 border-blue-600 p-4 w-1/3 rounded-lg">
                            <h1 class="uppercase font-bold text-center w-full">Other</h1>
                            <div class="flex flex-row gap-2">
                                <label for="maintenance">Setting 1:</label>
                                <input type="checkbox" name="maintenance" />
                            </div>

                            <div class="flex flex-row gap-2">
                                <label for="registration">Setting 2:</label>
                                <input type="checkbox" name="registration" />
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="rounded-lg p-2 border-2 border-green-600 hover:bg-green-600 uppercase font-bold transition-colors ease-in-out duration-200">Save</button>
                    </form>
                </section>
                
                <hr class="mt-2 border-2 border-gray-500 w-full">

                <?php include $_SERVER['DOCUMENT_ROOT'] . '/config/html/content-end.html'; ?>
            </div>
        </div>

        <?php include $_SERVER['DOCUMENT_ROOT'] . '/config/html/footer.html'; ?>

        <script src="/js/panel-nav.js" defer></script>
    </body>
</html>