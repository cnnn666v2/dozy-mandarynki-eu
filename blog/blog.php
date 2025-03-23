<?php
    session_start();
    require $_SERVER['DOCUMENT_ROOT'] . '/config/php/db.php';
    $config = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '/config/php/cfg.php');

    $blog_id = isset($_GET['id']) ? (int) $_GET['id'] : null;
    $blog_slug = isset($_GET['slug']) ? $_GET['slug'] : null;

    if ($blog_slug) {
        $stmt = $pdo->prepare("
            SELECT a.id, a.title, a.description, a.author_id, a.category_id, a.featured_image, a.created_at, a.updated_at, 
                b.name AS category_name, u.display_name AS author_name,
                COALESCE(GROUP_CONCAT(c.name SEPARATOR ', '), '') AS tags
            FROM {$dbprefix}blog AS a
            JOIN {$dbprefix}categories AS b ON a.category_id = b.id
            JOIN {$dbprefix}users AS u ON a.author_id = u.id
            LEFT JOIN {$dbprefix}blog_tags AS bt ON a.id = bt.blog_id
            LEFT JOIN {$dbprefix}tags AS c ON bt.tag_id = c.id
            WHERE a.slug = :slug
            GROUP BY a.id
            LIMIT 1
        ");
        $stmt->bindParam(':slug', $blog_slug, PDO::PARAM_STR);
    } elseif ($blog_id) {
        $stmt = $pdo->prepare("
            SELECT a.id, a.title, a.description, a.author_id, a.category_id, a.featured_image, a.created_at, a.updated_at, 
                b.name AS category_name, u.display_name AS author_name,
                COALESCE(GROUP_CONCAT(c.name SEPARATOR ', '), '') AS tags
            FROM {$dbprefix}blog AS a
            JOIN {$dbprefix}categories AS b ON a.category_id = b.id
            JOIN {$dbprefix}users AS u ON a.author_id = u.id
            LEFT JOIN {$dbprefix}blog_tags AS bt ON a.id = bt.blog_id
            LEFT JOIN {$dbprefix}tags AS c ON bt.tag_id = c.id
            WHERE a.id = :id
            GROUP BY a.id
            LIMIT 1
        ");
        $stmt->bindParam(':id', $blog_id, PDO::PARAM_INT);
    } else {
        die("Error: Blog post not found.");
    }

    $stmt->execute();
    $blog_post = $stmt->fetchAll();

    if (!$blog_post) {
        die("Error: Blog post not found.");
    }

    $id = htmlspecialchars($blog_post[0]['id']);
    $title = htmlspecialchars($blog_post[0]['title']);
    $content = htmlspecialchars($blog_post[0]['description']);
    $author = htmlspecialchars($blog_post[0]['author_name']);
    $catID = htmlspecialchars($blog_post[0]['category_id']);
    $fImage = htmlspecialchars($blog_post[0]['featured_image']);
    $published = htmlspecialchars($blog_post[0]['created_at']);
    $modified = htmlspecialchars($blog_post[0]['updated_at']);
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
                    <div id="blog-banner" class="flex flex-row justify-center items-center w-full py-10 relative border-b-2 border-gray-500" style="background-image: url('<?= $fImage ?>');">
                        <span class="w-full h-full absolute bg-black bg-opacity-70 z-0"></span>
                        <div class="flex flex-row justify-center gap-3 z-10 w-full px-2">
                            <img src="/img/jajco.png" class="w-[50px] h-[50px] rounded-full place-self-start" />
                            <div class="flex flex-col w-[75%]" >
                                <h1 class="font-bold w-full text-wrap break-words"><?= $title ?></h1>
                                <div class="flex flex-col">
                                    <p>Author: <a class="bg-black rounded-xl p-1" href="#"><?= $author ?></a></p>
                                    <p class="mb-1 text-wrap">Category: <span class="uppercase bg-green-700 rounded-lg p-1 font-semibold text-xs"><?= $blog_post[0]['category_name'] ?></span></p>
                                    <div class="flex flex-row gap-2">
                                        <p class="text-wrap">Tags:
                                        <?php
                                            $tagsString = trim($blog_post[0]['tags']);
                                            $tags = array_map('trim',  explode(',', $tagsString));
                                            foreach($tags as $tag):
                                        ?>
                                        <span class="uppercase bg-blue-700 rounded-lg p-1 font-semibold text-xs inline-block"><?= htmlspecialchars($tag) ?></span>
                                        <?php endforeach ?>
                                        </p>
                                    </div>
                                    <p class="text-sm mt-1">Published on: <?= $published ?><?php if($modified != $published) { echo htmlspecialchars(" | Edited at: " . $modified); } ?></p>
                                    <?php if($_SESSION['user_id'] == $blog_post[0]['author_id']) { ?>
                                    <div class="flex flex-row gap-3">
                                        <button type="button" class="rounded-lg px-4 border-2 mt-2 border-cyan-600 hover:bg-cyan-600 uppercase transition-colors ease-in-out duration-200 w-max">Edit blog</button>
                                        <button type="button" class="rounded-lg px-4 border-2 mt-2 border-red-600 hover:bg-red-600 uppercase transition-colors ease-in-out duration-200 w-max">Delete blog</button>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="blog-content" class="flex flex-col text-left w-[75%] my-5 px-5 xl:px-0">
                       <p> <?= $content ?> </p>
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
        <script src="/js/blogs/bbcode-parser.js"></script>
    </body>
</html>