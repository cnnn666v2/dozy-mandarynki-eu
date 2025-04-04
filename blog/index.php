<?php
    session_start();
    require $_SERVER['DOCUMENT_ROOT'] . '/config/php/db.php';
    $config = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '/config/php/cfg.php');

    $lorem_ipsum = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id mollis risus. Aliquam erat volutpat. Suspendisse at ullamcorper massa. Morbi tristique, justo sed ullamcorper efficitur, velit libero condimentum neque, ut gravida urna ante vitae quam. Vivamus viverra neque tincidunt, consectetur est nec, fermentum libero. Nam eget tempor nibh, vulputate sagittis justo. Pellentesque sodales nibh vel eros bibendum consequat dignissim sit amet diam. Phasellus sollicitudin ac felis non luctus. Duis id fermentum mauris, sed rutrum lectus.";
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

            <div class="flex flex-col justify-center items-center w-full">
                <h1 class="font-bold text-center mt-5">BLOGS</h1>
                <p class="flex gap-2">Page: <a href="#"><-</a> • <a href="#">1</a> • <a href="#">2</a> • <a href="#">3</a> • <a href="#">4</a> • <a href="#">5</a> • <a href="#">6</a> • <a href="#">7</a> • <a href="#">8</a> • <a href="#">9</a> • <a href="#">10</a> ... <a href="#">20</a> • <a href="#">-></a> | <button class="text-base text-gray-400 hover:text-gray-300">go to [x]</button></p>
                <form class="flex flex-row gap-2 w-full justify-center mt-2 text-lg">
                    <div class="flex flex-row w-[40%]">
                        <input type="text" name="query" placeholder="I wanna find..." class="px-2 py-1 rounded-l-lg w-full bg-slate-700 border-2 border-solid border-slate-500 border-r-0"/>
                        <button type="submit" class="border-2 border-solid border-green-600 rounded-r-lg px-2 uppercase hover:bg-green-600 transition-colors duration-200 ease-in-out">Search</button>
                    </div>

                    <div class="flex flex-col relative z-50">
                        <button type="button" class="border-2 border-solid border-cyan-600 uppercase rounded-lg px-2 hover:bg-cyan-600 transition-colors duration-200 ease-in-out h-full">Category</button>
                        <div id="category-dropdown" class="absolute flex flex-col bg-slate-900 border-2 border-solid border-slate-600 mt-10 p-2 rounded-lg gap-2">
                            <input type="text" placeholder="Search a category..." class="px-2 py-1 rounded-lg bg-slate-700 " />
                            <p class="text-sm uppercase font-semibold">Selected: <span class="uppercase bg-green-700 rounded-lg p-1 font-semibold text-xs">EXAMPLE CATEGORY</span></p>
                            <hr class="rounded-xl border-2">
                            <div class="flex flex-row flex-wrap gap-2">
                                <span class="uppercase bg-green-700 rounded-lg p-1 font-semibold text-xs">EXAMPLE CATEGORY</span>
                                <span class="uppercase bg-green-700 rounded-lg p-1 font-semibold text-xs">CATEGORY</span>
                                <span class="uppercase bg-green-700 rounded-lg p-1 font-semibold text-xs">JAJCO</span>
                                <span class="uppercase bg-green-700 rounded-lg p-1 font-semibold text-xs">XDDD VERY LONG CATEGORY NAME WHAT THE FUCK</span>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="border-2 border-solid border-cyan-600 uppercase rounded-lg px-2 hover:bg-cyan-600 transition-colors duration-200 ease-in-out">Tags</button>
                </form>
                <div class="flex flex-row justify-between flex-wrap w-full p-4 gap-4">
                    <div class="flex flex-row p-2 w-[49%] hover:bg-slate-800 border-2 border-solid border-red-600 rounded-md gap-2 group relative transition-colors ease-in-out duration-200">
                        <img src="/img/jajco.png" class="w-[150px] h-[150px] rounded-lg" />
                        <div class="flex flex-col w-full">
                            <h2 class="uppercase group-hover:text-blue-500 transition-colors ease-in-out duration-200">This is a blog</h2>
                            <h5>Category: <span class="uppercase bg-green-700 rounded-lg p-1 font-semibold text-xs">EXAMPLE CATEGORY</span></h5>
                            <p class="my-2"><?php echo htmlspecialchars(mb_substr($lorem_ipsum, 0, 190)) . '...'; ?></p>
                            <div class="flex flex-row w-full mt-auto items-center">
                                <h6 class="text-gray-400">Published on: 2.05.2025</h6>
                                <button class="border-2 border-green-700 ml-auto px-2 py-1 text-sm rounded-lg group-hover:bg-green-700 mt-auto uppercase transition-colors ease-in-out duration-200">Read more</button>
                            </div>
                        </div>
                        <a href="#" class="absolute w-full h-full"></a>
                    </div>

                    <div class="flex flex-row p-2 w-[49%] hover:bg-slate-800 border-2 border-solid border-red-600 rounded-md gap-2 group relative transition-colors ease-in-out duration-200">
                        <img src="/img/jajco.png" class="w-[150px] h-[150px] rounded-lg" />
                        <div class="flex flex-col w-full">
                            <h2 class="uppercase group-hover:text-blue-500 transition-colors ease-in-out duration-200">This is a blog</h2>
                            <h5>Category: <span class="uppercase bg-green-700 rounded-lg p-1 font-semibold text-xs">EXAMPLE CATEGORY</span></h5>
                            <p class="my-2"><?php echo htmlspecialchars(mb_substr($lorem_ipsum, 0, 190)) . '...'; ?></p>
                            <div class="flex flex-row w-full mt-auto items-center">
                                <h6 class="text-gray-400">Published on: 2.05.2025</h6>
                                <button class="border-2 border-green-700 ml-auto px-2 py-1 text-sm rounded-lg group-hover:bg-green-700 mt-auto uppercase transition-colors ease-in-out duration-200">Read more</button>
                            </div>
                        </div>
                        <a href="#" class="absolute w-full h-full"></a>
                    </div>

                    <div class="flex flex-row p-2 w-[49%] hover:bg-slate-800 border-2 border-solid border-red-600 rounded-md gap-2 group relative transition-colors ease-in-out duration-200">
                        <img src="/img/jajco.png" class="w-[150px] h-[150px] rounded-lg" />
                        <div class="flex flex-col w-full">
                            <h2 class="uppercase group-hover:text-blue-500 transition-colors ease-in-out duration-200">This is a blog</h2>
                            <h5>Category: <span class="uppercase bg-green-700 rounded-lg p-1 font-semibold text-xs">EXAMPLE CATEGORY</span></h5>
                            <p class="my-2"><?php echo htmlspecialchars(mb_substr($lorem_ipsum, 0, 190)) . '...'; ?></p>
                            <div class="flex flex-row w-full mt-auto items-center">
                                <h6 class="text-gray-400">Published on: 2.05.2025</h6>
                                <button class="border-2 border-green-700 ml-auto px-2 py-1 text-sm rounded-lg group-hover:bg-green-700 mt-auto uppercase transition-colors ease-in-out duration-200">Read more</button>
                            </div>
                        </div>
                        <a href="#" class="absolute w-full h-full"></a>
                    </div>

                    <div class="flex flex-row p-2 w-[49%] hover:bg-slate-800 border-2 border-solid border-red-600 rounded-md gap-2 group relative transition-colors ease-in-out duration-200">
                        <img src="/img/jajco.png" class="w-[150px] h-[150px] rounded-lg" />
                        <div class="flex flex-col w-full">
                            <h2 class="uppercase group-hover:text-blue-500 transition-colors ease-in-out duration-200">This is a blog</h2>
                            <h5>Category: <span class="uppercase bg-green-700 rounded-lg p-1 font-semibold text-xs">EXAMPLE CATEGORY</span></h5>
                            <p class="my-2"><?php echo htmlspecialchars(mb_substr($lorem_ipsum, 0, 190)) . '...'; ?></p>
                            <div class="flex flex-row w-full mt-auto items-center">
                                <h6 class="text-gray-400">Published on: 2.05.2025</h6>
                                <button class="border-2 border-green-700 ml-auto px-2 py-1 text-sm rounded-lg group-hover:bg-green-700 mt-auto uppercase transition-colors ease-in-out duration-200">Read more</button>
                            </div>
                        </div>
                        <a href="#" class="absolute w-full h-full"></a>
                    </div>

                    <div class="flex flex-row p-2 w-[49%] hover:bg-slate-800 border-2 border-solid border-red-600 rounded-md gap-2 group relative transition-colors ease-in-out duration-200">
                        <img src="/img/jajco.png" class="w-[150px] h-[150px] rounded-lg" />
                        <div class="flex flex-col w-full">
                            <h2 class="uppercase group-hover:text-blue-500 transition-colors ease-in-out duration-200">This is a blog</h2>
                            <h5>Category: <span class="uppercase bg-green-700 rounded-lg p-1 font-semibold text-xs">EXAMPLE CATEGORY</span></h5>
                            <p class="my-2"><?php echo htmlspecialchars(mb_substr($lorem_ipsum, 0, 190)) . '...'; ?></p>
                            <div class="flex flex-row w-full mt-auto items-center">
                                <h6 class="text-gray-400">Published on: 2.05.2025</h6>
                                <button class="border-2 border-green-700 ml-auto px-2 py-1 text-sm rounded-lg group-hover:bg-green-700 mt-auto uppercase transition-colors ease-in-out duration-200">Read more</button>
                            </div>
                        </div>
                        <a href="#" class="absolute w-full h-full"></a>
                    </div>
                </div>
                <hr class="border-2 border-gray-500 w-full mt-8">
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/config/html/content-end.html'; ?>
            </div>
        </div>

        <?php include $_SERVER['DOCUMENT_ROOT'] . '/config/html/footer.html'; ?>
    </body>
</html>