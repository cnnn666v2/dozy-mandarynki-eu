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

            <div class="flex flex-col justify-center items-center w-max">
                <h1 class="font-bold text-center mt-5">Welcome to my website, traveller! 👋</h1>
                <p class="text-center">Bring a coffee, or a can of beer, because you'll be in for a <i>looooooong</i> time 😉</p>

                <?php if(!empty($config['notice'])) { ?>
                    <div class="flex flex-col rounded-md border-2 border-red-600 bg-red-800 w-1/2 p-2 m-5 gap-2">
                        <h1 class="uppercase font-bold">Notice from the owner:</h1>
                        <hr>
                        <p><?= htmlspecialchars($config['notice']) ?></p>
                    </div>
                <?php } ?>

                <h1 class="text-center mt-10 uppercase">Latest blog news 📰</h1>
                <section id="blog-latest" class="flex flex-col items-center justify-center mt-4 px-4 w-full">
                    <div class="flex flex-row gap-5 w-full">
                        <?php
                        $stmt = $pdo->prepare("
                            SELECT a.id, a.title, a.description, a.author_id, a.category_id, a.featured_image, a.created_at, 
                                b.name AS category_name,
                                COALESCE(GROUP_CONCAT(c.name SEPARATOR ', '), '') AS tags
                            FROM {$dbprefix}blog AS a
                            JOIN {$dbprefix}categories AS b ON a.category_id = b.id
                            LEFT JOIN {$dbprefix}blog_tags AS bt ON a.id = bt.blog_id
                            LEFT JOIN {$dbprefix}tags AS c ON bt.tag_id = c.id
                            WHERE b.name != 'status'
                            GROUP BY a.id
                            ORDER BY a.created_at DESC
                            LIMIT 2
                        ");
                        $stmt->execute();
                        $blog_post = $stmt->fetchAll();
                        ?>

                        <?php foreach($blog_post as $post):?>
                            <article class="group flex flex-col p-2 border-2 rounded-lg border-red-600 flex-1 relative hover:bg-slate-800 hover:border-red-500 transition-colors ease-in-out duration-200">
                                <div class="flex flex-row h-full">
                                    <div class="flex flex-col min-w-[170px] max-w-[170px] h-full flex-wrap">
                                        <img src="<?php echo htmlspecialchars($post['featured_image']) ?>" class="rounded-xl" style="width: 150px; height: 150px;" />
                                        <p class="my-2 text-gray-300 text-wrap"><b>Category:</b> <span class="uppercase bg-green-700 rounded-lg p-1 font-semibold text-xs"><?php echo $post['category_name'] ?></span></p>
                                        <p class="text-gray-300 mb-2"><b>Tags:</b>
                                        <?php $i = 0; $endTags = false;
                                            $tagsString = trim($post['tags']);
                                            $tags = array_map('trim',  explode(',', $tagsString));
                                            foreach ($tags as $tag):
                                        ?>
                                        <?php if($i <= 5 && !$endTags) { ?>
                                            <span class="uppercase bg-blue-700 rounded-lg p-1 font-semibold text-xs inline-block"><?php $i++; echo htmlspecialchars($tag) ?></span>
                                        <?php } else if(!$endTags) { $endTags = true; ?>
                                            <span class="uppercase bg-blue-700 rounded-lg p-1 font-semibold text-xs inline-block">more...</span>
                                        <?php } endforeach;?>
                                        </p>
                                        <p class="mt-auto mb-2 text-sm text-gray-300 text-wrap">Published on: <?php echo htmlspecialchars($post['created_at']); ?></p>
                                    </div>
                                    <div class="ml-2">
                                        <h2 class="uppercase group-hover:text-blue-500 transition-colors ease-in-out duration-200"><?php echo htmlspecialchars($post['title']); ?></h2>
                                        <p class="my-2 text-gray-300"><?php echo htmlspecialchars(mb_substr($post['description'], 0, 200)) . '... <span class="text-blue-500">Continue reading</span>'; ?></p>
                                    </div>
                                </div>
                                <button class="border-2 border-green-700 px-2 py-1 text-lg rounded-lg group-hover:bg-green-700 mt-auto w-full uppercase transition-colors ease-in-out duration-200">Read more</button>
                                <a href="#" class="absolute top-0 left-0 w-full h-full"></a>
                            </article>
                        <?php endforeach; ?>
                    </div>

                    <h3 class="my-3">...or maybe you wanna see <b><i>all</i></b> of my blog posts? <a href="#">Check them out here</a></h3>
                </section>
                <hr class="border-2 border-gray-500 w-full">

                <h1 class="mb-3 mt-8 text-center uppercase font-bold">So... who are you? 🤔</h1>
                <section id="about-me" class="flex flex-col px-4 py-2">
                    <div class="flex flex-row gap-4">
                        <div class="flex flex-col flex-1 bg-slate-900 border-4 border-blue-600 rounded-xl p-3">
                            <h1 class="uppercase italic text-center">A teenager 🙋‍♂️</h1>
                            <p class="mt-1">I'm just your ordinary, 17 years old, Polish teenager. My hobbies include:
                                <br>- airsoft, games, editing videos, <br>- programming, cycling <br>- and something else probably<br><br>
                            </p>
                            <p class="mt-auto">If you want to know more personal things about me you can check them <a href="#">here</a></p>
                        </div>

                        <div class="flex flex-col flex-1 bg-emerald-950 border-4 border-green-600 rounded-xl p-3">
                            <h1 class="uppercase italic text-center">An aspiring programmer 👨‍💻</h1>
                            <p class="mt-1">I like messing with Unity, and making games with it, but the game industry won't be my carrer path.
                                <br><br>
                                What more suits me, is web development. Maybe not too much on the UI/UX side (as you can see here anyway), but more on the backend.
                                <br><br>
                                I've done a few website projects already (that are on my <a href="#">github</a> btw) and so my plan is to make more and more and more
                                If you want to know more personal things about me you can check them <a href="#">here</a>
                            </p>
                        </div>

                        <div class="flex flex-col flex-1 bg-orange-950 border-4 border-yellow-600 rounded-xl p-3">
                            <h1 class="uppercase italic text-center">A human 👽</h1>
                            <p class="mt-1">Yeah I'm just a human. Totally.
                            </p>
                        </div>
                    </div>

                    <h2 class="mt-3 text-center">TLDR?</h2>
                    <p class="text-center">Well, just a regular <i>human</i> teen who's into programming, gaming, airsoft and a bit more</p>
                </section>
                <hr class="border-2 border-gray-500 w-full">
            
                <h1 class="mb-3 mt-8 text-center uppercase font-bold">My projects ⚒</h1>
                <section id="projects-fav" class="flex flex-col items-center justify-center px-4 py-2 gap-5">
                    <div class="flex flex-row gap-5 flex-1 px-8">
                        <div class="flex flex-row border-4 rounded-xl border-blue-600 p-4 flex-1 gap-2">
                            <img src="/img/jajco.png" class="rounded-xl w-[150px] h-[150px] aspect-square">
                            <div class="ml-2 flex flex-col">
                                <h2 class="uppercase group-hover:text-blue-500 transition-colors ease-in-out duration-200">Roman Clicker (?)</h2>
                                <p class="my-2 text-gray-300">This is one of my favourite projects of all time! The first version of that game, was a simple clicker with some <i>really</i> boring combat system and very little content.
                                    <br>The new version of the game completely gets rid of the clicker mechanic (this is why I'm considering changing the name) and a better, turn-based combat system with skill trees, abilities, attack types, and more!</p>
                                <p class="mt-auto text-gray-300">The game is free and open-source, it's source is available under <a href="#">this github link</a>. And if you want to learn more about the game, you can do so <a href="#">here</a>.</p>
                            </div>
                        </div>

                        <div class="flex flex-row border-4 rounded-xl border-orange-600 p-4 flex-1 gap-2">
                            <img src="/img/astolfo.webp" class="rounded-xl w-[150px] h-[150px] aspect-square">
                            <div class="ml-2 flex flex-col">
                                <h2 class="uppercase group-hover:text-blue-500 transition-colors ease-in-out duration-200">cnnn666.madnarynki.eu</h2>
                                <p class="my-2 text-gray-300">Yes, this project is the current website you're viewing. There isn't much to say about it, except the fact that it's a personal website. I will try to most (if not all) features, on this website, write by myself.</p>
                                <p class="!mt-auto text-gray-300 text-right">Just like the <a href="#">Roman Clicker</a> project, this one is open-source. You can view the source code <a href="#">here</a>.</p>
                            </div>
                        </div>
                    </div>

                    <a class="border-2 text-white border-red-600 p-3 text-xl font-bold rounded-lg uppercase hover:border-red-700 hover:bg-slate-800 transition-colors ease-in-out duration-200" href="#">MORE PROJECTS</a>
                </section>
                <hr class="border-2 border-gray-500 w-full">

                <?php include $_SERVER['DOCUMENT_ROOT'] . '/config/html/content-end.html'; ?>
            </div>
        </div>

        <?php include $_SERVER['DOCUMENT_ROOT'] . '/config/html/footer.html'; ?>
    </body>
</html>