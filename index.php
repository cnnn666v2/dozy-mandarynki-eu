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

        <div id="container" class="flex flex-row">
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/config/html/sidebar.html'; ?>

            <div class="flex flex-col basis-5/6">
                <h1 class="font-bold text-center mt-5">Welcome to my website, traveller! 👋</h1>
                <p class="text-center">Bring a coffee, or a can of beer, because you'll be in for a <i>looooooong</i> time 😉</p>

                <h1 class="text-center mt-10 uppercase">Latest blog news 📰</h1>
                <section id="blog-latest" class="flex flex-col items-center justify-center mt-4 px-4">
                    <div class="flex flex-row gap-5">
                        <article class="group flex flex-row p-2 border-2 rounded-lg border-red-600 flex-1 relative hover:bg-slate-800 hover:border-red-500 transition-colors ease-in-out duration-200">
                            <img src="/img/nightmare-foxy.gif" width="150" height="150" class="rounded-xl">
                            <div class="ml-2">
                                <h2 class="uppercase group-hover:text-blue-500 transition-colors ease-in-out duration-200">This is the absolute latest blog</h2>
                                <p class="mt-2 text-gray-300">And this is the description of the absolute latest blog</p>
                            </div>
                            <a href="#" class="absolute top-0 left-0 w-full h-full"></a>
                        </article>

                        <article class="group flex flex-row p-2 border-2 rounded-lg border-red-600 flex-1 relative hover:bg-slate-800 hover:border-red-500 transition-colors ease-in-out duration-200">
                            <img src="/img/nightmare-foxy.gif" width="150" height="150" class="rounded-xl">
                            <div class="ml-2">
                                <h2 class="uppercase group-hover:text-blue-500 transition-colors ease-in-out duration-200">This is the (almost) absolute latest blog</h2>
                                <p class="mt-2 text-gray-300">And this is the description of the (almost) absolute latest blog</p>
                            </div>
                            <a href="#" class="absolute top-0 left-0 w-full h-full"></a>
                        </article>
                    </div>

                    <h3 class="my-3">...or maybe you wanna see <b><i>all</i></b> ofmy blog posts? <a href="#">Check them out here</a></h3>
                </section>
            </div>
        </div>

        <?php include $_SERVER['DOCUMENT_ROOT'] . '/config/html/footer.html'; ?>
    </body>
</html>