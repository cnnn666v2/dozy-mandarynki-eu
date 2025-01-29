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
                <h1 class="font-bold text-center mt-5 uppercase">projects</h1>
                <p class="text-center">They're all listed below and split into categories. (Almost) All of them are open-source</p>
            
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

                <h1 class="mb-3 text-center uppercase font-bold">My website projects</h1>
                <section id="webapps" class="flex flex-col items-center justify-center px-4 py-2 gap-5">
                    <div class="flex flex-row gap-5 flex-1 px-8">
                        <div class="flex flex-row border-4 rounded-xl border-blue-600 p-4 flex-1 gap-2">
                            <img src="/img/astolfo.webp" class="rounded-xl w-[150px] h-[150px] aspect-square">
                            <div class="ml-2 flex flex-col w-full">
                                <h2 class="uppercase group-hover:text-blue-500 transition-colors ease-in-out duration-200">Cnnn666.mandarynki.eu</h2>
                                <p class="my-2 text-gray-300">Yes, it's the website you're currently on! The website is built with vanilla js, vanilla php and Tailwind CSS.
                                    <br>One of the key features is the customly written blogging option.</p>
                                <p class="mt-auto mb-2 text-gray-300">The project is being actively worked on and more features are to come!</p>
                                <button class="border-2 border-green-700 px-2 py-1 text-lg rounded-lg hover:bg-green-700 mt-auto uppercase w-max self-end transition-colors ease-in-out duration-200">Read more</button>
                            </div>
                        </div>

                        <div class="flex flex-row border-4 rounded-xl border-blue-600 p-4 flex-1 gap-2">
                            <img src="/img/jajco.png" class="rounded-xl w-[150px] h-[150px] aspect-square">
                            <div class="ml-2 flex flex-col w-full">
                                <h2 class="uppercase group-hover:text-blue-500 transition-colors ease-in-out duration-200">Cipher</h2>
                                <p class="my-2 text-gray-300">This one is supposed to be a customly written twitter. The website underwent an identity crisis and didn't know what it was supposed to be.
                                    <br>Current code is to be re-written and improved. Website is lacking a lot of features which would make it a twitter clone.</p>
                                <p class="mt-auto mb-2 text-gray-300">Project is not being currently worked on.</p>
                                <button class="border-2 border-green-700 px-2 py-1 text-lg rounded-lg hover:bg-green-700 mt-auto uppercase w-max self-end transition-colors ease-in-out duration-200">Read more</button>
                            </div>
                        </div>
                    </div>
                </section>
                <hr class="my-8 border-2 border-gray-500 w-full">

                <h1 class="mb-3 text-center uppercase font-bold">Discord Bots</h1>
                <section id="discordbots" class="flex flex-col items-center justify-center px-4 py-2 gap-5">
                    <div class="flex flex-row gap-5 flex-1 px-8">
                        <div class="flex flex-row border-4 rounded-xl border-blue-600 p-4 flex-1 gap-2">
                            <img src="/img/astolfo.webp" class="rounded-xl w-[150px] h-[150px] aspect-square">
                            <div class="ml-2 flex flex-col w-full">
                                <h2 class="uppercase group-hover:text-blue-500 transition-colors ease-in-out duration-200">Cnnn666v2</h2>
                                <p class="my-2 text-gray-300">This is my first discord bot created, it was a multi-purpose bot including features like moderation or economy.
                                    <br>Ever since Discord demanded to switch from text commands (for example "!help") and move to slash commands, I've lost all motivation to work on any discord bot.</p>
                                <p class="mt-auto mb-2 text-gray-300">As much as I would like to work on it again, I probably never will.</p>
                                <button class="border-2 border-green-700 px-2 py-1 text-lg rounded-lg hover:bg-green-700 mt-auto uppercase w-max self-end transition-colors ease-in-out duration-200">Read more</button>
                            </div>
                        </div>

                        <div class="flex flex-row border-4 rounded-xl border-blue-600 p-4 flex-1 gap-2">
                            <img src="/img/jajco.png" class="rounded-xl w-[150px] h-[150px] aspect-square">
                            <div class="ml-2 flex flex-col w-full">
                                <h2 class="uppercase group-hover:text-blue-500 transition-colors ease-in-out duration-200">Minedeck</h2>
                                <p class="my-2 text-gray-300">A never released discord bot, which was supposed to be an idle minigame bot.
                                    <br>The code isn't available, and will never be.
                                </p>
                                <button class="border-2 border-green-700 px-2 py-1 text-lg rounded-lg hover:bg-green-700 mt-auto uppercase w-max self-end transition-colors ease-in-out duration-200">Read more</button>
                            </div>
                        </div>
                    </div>
                </section>
                <hr class="my-8 border-2 border-gray-500 w-full">

                <h1 class="mb-3 text-center uppercase font-bold">Game modifications</h1>
                <section id="mods" class="flex flex-col items-center justify-center px-4 py-2 gap-5">
                    <div class="flex flex-row gap-5 flex-1 px-8">
                        <div class="flex flex-row border-4 rounded-xl border-blue-600 p-4 flex-1 gap-2">
                            <img src="/img/astolfo.webp" class="rounded-xl w-[150px] h-[150px] aspect-square">
                            <div class="ml-2 flex flex-col w-full">
                                <h2 class="uppercase group-hover:text-blue-500 transition-colors ease-in-out duration-200">Extra Tweaks</h2>
                                <p class="my-2 text-gray-300">It's a mod for Minecraft 1.17 utilizing Fabric API. It added a few items and blocks and that's it.</p>
                                <p class="mt-auto mb-2 text-gray-300">Currently, the mod is not being worked on anymore, but I want to revisit it in the future</p>
                                <button class="border-2 border-green-700 px-2 py-1 text-lg rounded-lg hover:bg-green-700 mt-auto uppercase w-max self-end transition-colors ease-in-out duration-200">Read more</button>
                            </div>
                        </div>

                        <div class="flex flex-row border-4 rounded-xl border-blue-600 p-4 flex-1 gap-2">
                            <img src="/img/jajco.png" class="rounded-xl w-[150px] h-[150px] aspect-square">
                            <div class="ml-2 flex flex-col w-full">
                                <h2 class="uppercase group-hover:text-blue-500 transition-colors ease-in-out duration-200">More Turrets Mod</h2>
                                <p class="my-2 text-gray-300">It's a mindustry mod, which adds few turrets.</p>
                                <p class="mt-auto mb-2 text-gray-300">Project is not being currently worked on.</p>
                                <button class="border-2 border-green-700 px-2 py-1 text-lg rounded-lg hover:bg-green-700 mt-auto uppercase w-max self-end transition-colors ease-in-out duration-200">Read more</button>
                            </div>
                        </div>
                    </div>
                </section>
                <hr class="my-8 border-2 border-gray-500 w-full">

                <h1 class="mb-3 text-center uppercase font-bold">Video projects</h1>
                <section id="videos" class="flex flex-col items-center justify-center px-4 py-2 gap-5">
                    <div class="flex flex-row gap-5 flex-1 px-8 justify-center">
                        <div class="flex flex-row border-4 rounded-xl border-blue-600 p-4 flex-1 gap-2 max-w-[75%]">
                            <img src="/img/astolfo.webp" class="rounded-xl w-[150px] h-[150px] aspect-square">
                            <div class="ml-2 flex flex-col w-full">
                                <h2 class="uppercase group-hover:text-blue-500 transition-colors ease-in-out duration-200">Minecraft Gameplay | #1</h2>
                                <p class="my-2 text-gray-300">A 1.5h worth of a minecraft footage on a private vanilla server (on which I've been playing for over 2 years).</p>
                                <p class="mt-auto mb-2 text-gray-300">The plan is to cut down the footage from 1.5h to a 20min - 30min video. If it turns out to be impossible, I'll split it into 2 parts.</p>
                                <button class="border-2 border-green-700 px-2 py-1 text-lg rounded-lg hover:bg-green-700 mt-auto uppercase w-max self-end transition-colors ease-in-out duration-200">Read more</button>
                            </div>
                        </div>
                    </div>
                </section>
                <hr class="mt-8 border-2 border-gray-500 w-full">

                <?php include $_SERVER['DOCUMENT_ROOT'] . '/config/html/content-end.html'; ?>
            </div>
        </div>

        <?php include $_SERVER['DOCUMENT_ROOT'] . '/config/html/footer.html'; ?>
    </body>
</html>