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
                <div class="flex flex-row justify-between flex-wrap w-full p-4 gap-4">
                    <div class="flex flex-row p-2 w-[49%] border-2 border-solid border-red-600 rounded-md gap-2 group">
                        <img src="/img/jajco.png" class="w-[150px] h-[150px] rounded-lg" />
                        <div class="flex flex-col w-full">
                            <h2>This is a blog</h2>
                            <h5>Category: <span class="uppercase bg-green-700 rounded-lg p-1 font-semibold text-xs">EXAMPLE CATEGORY</span></h5>
                            <p class="my-2"><?php echo htmlspecialchars(mb_substr($lorem_ipsum, 0, 190)) . '...'; ?></p>
                            <div class="flex flex-row w-full mt-auto items-center">
                                <h6 class="text-gray-400">Published on: 2.05.2025</h6>
                                <button class="border-2 border-green-700 ml-auto px-2 py-1 text-sm rounded-lg group-hover:bg-green-700 mt-auto uppercase transition-colors ease-in-out duration-200">Read more</button>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-row p-2 w-[49%] border-2 border-solid border-red-600 rounded-md gap-2 group">
                        <img src="/img/jajco.png" class="w-[150px] h-[150px] rounded-lg" />
                        <div class="flex flex-col w-full">
                            <h2>This is a blog</h2>
                            <h5>Category: <span class="uppercase bg-green-700 rounded-lg p-1 font-semibold text-xs">EXAMPLE CATEGORY</span></h5>
                            <p class="my-2"><?php echo htmlspecialchars(mb_substr($lorem_ipsum, 0, 190)) . '...'; ?></p>
                            <div class="flex flex-row w-full mt-auto items-center">
                                <h6 class="text-gray-400">Published on: 2.05.2025</h6>
                                <button class="border-2 border-green-700 ml-auto px-2 py-1 text-sm rounded-lg group-hover:bg-green-700 mt-auto uppercase transition-colors ease-in-out duration-200">Read more</button>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-row p-2 w-[49%] border-2 border-solid border-red-600 rounded-md gap-2 group">
                        <img src="/img/jajco.png" class="w-[150px] h-[150px] rounded-lg" />
                        <div class="flex flex-col w-full">
                            <h2>This is a blog</h2>
                            <h5>Category: <span class="uppercase bg-green-700 rounded-lg p-1 font-semibold text-xs">EXAMPLE CATEGORY</span></h5>
                            <p class="my-2"><?php echo htmlspecialchars(mb_substr($lorem_ipsum, 0, 190)) . '...'; ?></p>
                            <div class="flex flex-row w-full mt-auto items-center">
                                <h6 class="text-gray-400">Published on: 2.05.2025</h6>
                                <button class="border-2 border-green-700 ml-auto px-2 py-1 text-sm rounded-lg group-hover:bg-green-700 mt-auto uppercase transition-colors ease-in-out duration-200">Read more</button>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-row p-2 w-[49%] border-2 border-solid border-red-600 rounded-md gap-2 group">
                        <img src="/img/jajco.png" class="w-[150px] h-[150px] rounded-lg" />
                        <div class="flex flex-col w-full">
                            <h2>This is a blog</h2>
                            <h5>Category: <span class="uppercase bg-green-700 rounded-lg p-1 font-semibold text-xs">EXAMPLE CATEGORY</span></h5>
                            <p class="my-2"><?php echo htmlspecialchars(mb_substr($lorem_ipsum, 0, 190)) . '...'; ?></p>
                            <div class="flex flex-row w-full mt-auto items-center">
                                <h6 class="text-gray-400">Published on: 2.05.2025</h6>
                                <button class="border-2 border-green-700 ml-auto px-2 py-1 text-sm rounded-lg group-hover:bg-green-700 mt-auto uppercase transition-colors ease-in-out duration-200">Read more</button>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-row p-2 w-[49%] border-2 border-solid border-red-600 rounded-md gap-2 group">
                        <img src="/img/jajco.png" class="w-[150px] h-[150px] rounded-lg" />
                        <div class="flex flex-col w-full">
                            <h2>This is a blog</h2>
                            <h5>Category: <span class="uppercase bg-green-700 rounded-lg p-1 font-semibold text-xs">EXAMPLE CATEGORY</span></h5>
                            <p class="my-2"><?php echo htmlspecialchars(mb_substr($lorem_ipsum, 0, 190)) . '...'; ?></p>
                            <div class="flex flex-row w-full mt-auto items-center">
                                <h6 class="text-gray-400">Published on: 2.05.2025</h6>
                                <button class="border-2 border-green-700 ml-auto px-2 py-1 text-sm rounded-lg group-hover:bg-green-700 mt-auto uppercase transition-colors ease-in-out duration-200">Read more</button>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="border-2 border-gray-500 w-full mt-8">
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/config/html/content-end.html'; ?>
            </div>
        </div>

        <?php include $_SERVER['DOCUMENT_ROOT'] . '/config/html/footer.html'; ?>
    </body>
</html>