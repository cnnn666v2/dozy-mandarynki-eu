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
                        <article class="group flex flex-col p-2 border-2 rounded-lg border-red-600 flex-1 relative hover:bg-slate-800 hover:border-red-500 transition-colors ease-in-out duration-200">
                            <div class="flex flex-row">
                                <img src="/img/nightmare-foxy.gif" class="rounded-xl" style="width: 150px !important;height: 150px !important;">
                                <div class="ml-2">
                                    <h2 class="uppercase group-hover:text-blue-500 transition-colors ease-in-out duration-200">This is the absolute latest blog</h2>
                                    <p class="my-2 text-gray-300">And this is the description of the absolute latest blog</p>
                                </div>
                            </div>
                            <button class="border-2 border-green-700 px-2 py-1 text-lg rounded-lg group-hover:bg-green-900 mt-2 w-full uppercase transition-colors ease-in-out duration-200">Read more</button>
                            <a href="#" class="absolute top-0 left-0 w-full h-full"></a>
                        </article>

                        <article class="group flex flex-col p-2 border-2 rounded-lg border-red-600 flex-1 relative hover:bg-slate-800 hover:border-red-500 transition-colors ease-in-out duration-200">
                            <div class="flex flex-row">
                                <img src="/img/nightmare-foxy.gif" class="rounded-xl" style="width: 150px !important;height: 150px !important;">
                                <div class="ml-2">
                                    <h2 class="uppercase group-hover:text-blue-500 transition-colors ease-in-out duration-200">This is the (almost) absolute latest blog</h2>
                                    <p class="my-2 text-gray-300">And this is the description of the (almost) absolute latest blog</p>
                                </div>
                            </div>
                            <button class="border-2 border-green-700 px-2 py-1 text-lg rounded-lg group-hover:bg-green-900 mt-2 w-full uppercase transition-colors ease-in-out duration-200">Read more</button>
                            <a href="#" class="absolute top-0 left-0 w-full h-full"></a>
                        </article>
                    </div>

                    <h3 class="my-3">...or maybe you wanna see <b><i>all</i></b> of my blog posts? <a href="#">Check them out here</a></h3>
                </section>
                <hr class="border-2 border-gray-500 w-full">

                <h1 class="my-3 text-center uppercase font-bold">So... who are you? 🤔</h1>
                <section id="about-me" class="flex flex-col p-2">
                    <div class="flex flex-row gap-4">
                        <div class="flex flex-col flex-1 border-2 border-blue-600 rounded-xl p-2">
                            <h1 class="uppercase italic text-center">A teenager 🙋‍♂️</h1>
                            <p class="mt-1">I'm just your ordinary, 17 years old, Polish teenager. My hobbies include:
                                <br>- airsoft, games, editing videos, <br>- programming, cycling <br>- and something else probably<br><br>
                            </p>
                            <p class="mt-auto">If you want to know more personal things about me you can check them <a href="#">here</a></p>
                        </div>

                        <div class="flex flex-col flex-1 border-2 border-green-600 rounded-xl p-2">
                            <h1 class="uppercase italic text-center">An aspiring programmer 👨‍💻</h1>
                            <p class="mt-1">I like messing with Unity, and making games with it, but the game industry won't be my carrer path.
                                <br><br>
                                What more suits me, is web development. Maybe not too much on the UI/UX side (as you can see here anyway), but more on the backend.
                                <br><br>
                                I've done a few website projects already (that are on my <a href="#">github</a> btw) and so my plan is to make more and more and more
                                If you want to know more personal things about me you can check them <a href="#">here</a>
                            </p>
                        </div>

                        <div class="flex flex-col flex-1 border-2 border-yellow-600 rounded-xl p-2">
                            <h1 class="uppercase italic text-center">A human 👽</h1>
                            <p class="mt-1">Yeah I'm just a human. Totally.
                            </p>
                        </div>
                    </div>

                    <h2 class="mt-3">TLDR?</h2>
                    <p>Well, just a regular <i>human</i> teen who's into programming, gaming, airsoft and a bit more</p>
                </section>
                <hr class="border-2 border-gray-500 w-full">
            </div>
        </div>

        <?php include $_SERVER['DOCUMENT_ROOT'] . '/config/html/footer.html'; ?>
    </body>
</html>