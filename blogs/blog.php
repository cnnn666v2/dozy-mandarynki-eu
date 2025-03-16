<?php
    session_start();
    require $_SERVER['DOCUMENT_ROOT'] . '/config/php/db.php';
    $config = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '/config/php/cfg.php');
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
                <div id="container-blog" class="flex flex-col items-center w-full">
                    <div id="blog-banner" class="flex flex-row justify-center items-center w-full gap-3 bg-[url('/img/jajco.png')] py-10 relative border-b-2 border-gray-500">
                        <span class="w-full h-full absolute bg-black bg-opacity-65 z-0"></span>
                        <img src="/img/jajco.png" class="w-[50px] h-[50px] rounded-full z-10 place-self-start" />
                        <div class="flex flex-col z-10">
                            <h1 class="font-bold w-full">This is a very example title of a blog post which is very important</h1>
                            <div class="flex flex-col">
                                <div class="flex flex-row">
                                    <p>Author: Cnnn666</p>
                                    <p class="ml-auto">Published on: 3/12/2025 | Edited on: 4/12/2025</p>
                                </div>
                                <div class="flex flex-row gap-3">
                                    <button type="button" class="rounded-lg px-4 border-2 mt-2 border-cyan-600 hover:bg-cyan-600 uppercase transition-colors ease-in-out duration-200 w-max">Edit blog</button>
                                    <button type="button" class="rounded-lg px-4 border-2 mt-2 border-red-600 hover:bg-red-600 uppercase transition-colors ease-in-out duration-200 w-max">Delete blog</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="blog-content" class="flex flex-col text-left max-w-[100vw] xl:max-w-[50vw] m-5">
                        <p>where lets say a 6.45685584123 where lets say a 6.45685584123where lets say a 6.45685584123where lets say a 6.45685584123where lets say a 6.45685584123where lets say a 6.45685584123where lets say a 6.45685584123where lets say a 6.45685584123where lets say a 6.45685584123where lets say a 6.45685584123where lets say a 6.45685584123where lets say a 6.45685584123where lets say a 6.45685584123where lets say a 6.45685584123where lets say a 6.45685584123where lets say a 6.45685584123where lets say a 6.45685584123where lets say a 6.45685584123where lets say a 6.45685584123where lets say a 6.45685584123where lets say a 6.45685584123where lets say a 6.45685584123where lets say a 6.45685584123where lets say a 6.45685584123where lets say a 6.45685584123where lets say a 6.45685584123where lets say a 6.45685584123where lets say a 6.45685584123where lets say a 6.45685584123</p>
                    </div>

                    <div id="blog-footer" class="flex flex-col bg-slate-900 justify-center items-center w-full gap-3 border-t-2 border-gray-500 py-2">
                        <h2 class="uppercase font-bold"><span class="text-lg">More</span> <span class="text-cyan-500">blogs</span> <span class="text-lg">from</span> <span class="text-green-600">Cnnn666</span></h2>
                        <div class="flex flex-row gap-6">
                            <div class="group flex flex-col relative bg-black border-4 border-slate-600 rounded-lg overflow-hidden transition-all ease-in-out duration-200">
                                <img src="/img/main/icon.webp" class="w-[300px] h-[150px] opacity-40 transition-all ease-in-out duration-200 group-hover:scale-150 group-hover:opacity-20" />
                                <div class="flex flex-col absolute w-full h-full p-2">
                                    <h2 class="mt-auto truncate font-bold transition-all ease-in-out duration-300 group-hover:text-blue-500">
                                        Title of a blog post XDdddd
                                    </h2>
                                    <h5>Published: 2/12/2025</h5>
                                </div>
                                <a href="#" class="absolute w-full h-full"></a>
                            </div>

                                                        <div class="group flex flex-col relative bg-black border-4 border-slate-600 rounded-lg overflow-hidden transition-all ease-in-out duration-200">
                                <img src="/img/main/icon.webp" class="w-[300px] h-[150px] opacity-40 transition-all ease-in-out duration-200 group-hover:scale-150 group-hover:opacity-20" />
                                <div class="flex flex-col absolute w-full h-full p-2">
                                    <h2 class="mt-auto truncate font-bold transition-all ease-in-out duration-300 group-hover:text-blue-500">
                                        Title of a blog post XDdddd
                                    </h2>
                                    <h5>Published: 2/12/2025</h5>
                                </div>
                                <a href="#" class="absolute w-full h-full"></a>
                            </div>

                                                        <div class="group flex flex-col relative bg-black border-4 border-slate-600 rounded-lg overflow-hidden transition-all ease-in-out duration-200">
                                <img src="/img/main/icon.webp" class="w-[300px] h-[150px] opacity-40 transition-all ease-in-out duration-200 group-hover:scale-150 group-hover:opacity-20" />
                                <div class="flex flex-col absolute w-full h-full p-2">
                                    <h2 class="mt-auto truncate font-bold transition-all ease-in-out duration-300 group-hover:text-blue-500">
                                        Title of a blog post XDdddd
                                    </h2>
                                    <h5>Published: 2/12/2025</h5>
                                </div>
                                <a href="#" class="absolute w-full h-full"></a>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="border-2 border-gray-500 w-full">

                <?php include $_SERVER['DOCUMENT_ROOT'] . '/config/html/content-end.html'; ?>
            </div>
        </div>

        <?php include $_SERVER['DOCUMENT_ROOT'] . '/config/html/footer.html'; ?>
    </body>
</html>