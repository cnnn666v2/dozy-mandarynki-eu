<?php
ini_set('display_errors', '0');
ini_set('display_startup_errors', '0');
error_reporting(E_ALL);

    session_start();
    require $_SERVER['DOCUMENT_ROOT'] . '/config/php/db.php';
    $config = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '/config/php/cfg.php');

    $blog_id = isset($_GET['id']) ? (int) $_GET['id'] : null;
    $blog_slug = isset($_GET['slug']) ? $_GET['slug'] : null;

    if ($blog_slug) {
        $stmt = $pdo->prepare("
            SELECT a.id, a.title, a.description, a.author_id, a.category_id, a.featured_image, a.created_at, a.updated_at, a.views, a.likes,
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
            SELECT a.id, a.title, a.description, a.author_id, a.category_id, a.featured_image, a.created_at, a.updated_at, a.views, a.likes,
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
    $views = htmlspecialchars($blog_post[0]['views']);
    $likes = htmlspecialchars($blog_post[0]['likes']);

    if(!isset($_COOKIE["viewedPost_".$id])) {
        $update_stmt = $pdo->prepare("UPDATE {$dbprefix}blog SET views = views + 1, updated_at = updated_at WHERE id = :id");
        $update_stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $update_stmt->execute();

        setcookie("viewedPost_".$id, "true", time() + (86400 * 30), "/"); // Cookie will expire in 30 days
    }

    $action = "null";
    $blog_liked = isset($_GET['action_like']) ? $_GET['action_like'] : null;

    if(isset($_COOKIE["likedPost_".$id])) {
        $action = "unlike";
        $liked_post = "bg-blue-600";

        if($blog_liked == "unlike") {
            $update_stmt = $pdo->prepare("UPDATE {$dbprefix}blog SET likes = likes - 1, updated_at = updated_at WHERE id = :id");
            $update_stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $update_stmt->execute();

            $liked_post = "bg-transparent";
            unset($_COOKIE["likedPost_".$id]);        // Remove cookie
            setcookie("likedPost_".$id, "", -1, "/"); // Remove cookie
        }
    } else {
        $action = "true";
        if($blog_liked == "true") {
            $update_stmt = $pdo->prepare("UPDATE {$dbprefix}blog SET likes = likes + 1, updated_at = updated_at WHERE id = :id");
            $update_stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $update_stmt->execute();

            $liked_post = "bg-blue-600";
            setcookie("likedPost_".$id, "true", time() + (86400 * 150), "/"); // Cookie will expire in 150 days
        }
    }

    $stmt = $pdo->prepare("
        SELECT title, created_at, featured_image, slug
        FROM {$dbprefix}blog
        WHERE author_id = :id AND id != :b_id
        GROUP BY id DESC
        LIMIT 3
    ");
    $stmt->bindParam(':id', $_SESSION['user_id'], PDO::PARAM_INT);
    $stmt->bindParam(':b_id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $other_blogs = $stmt->fetchAll();

    /*
    unset($_COOKIE["likedPost_".$id]);
    setcookie("likedPost_".$id, "", -1, "/");
    */
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
                                    <div class="flex flex-row gap-2">
                                        <p class="rounded-lg px-2 border-2 mt-2 border-green-700 bg-green-700 uppercase w-max">Views: <?= $views ?></p>
                                        <?php echo '<button type="button" class="rounded-lg px-2 border-2 mt-2 border-blue-600 '. $liked_post .' hover:bg-blue-600 uppercase transition-colors ease-in-out duration-200 w-max"><a href="/blog/'.$blog_slug.'?action_like='.$action.'" style="width:100%;height:100%;padding:0;margin:0;color:white;">'.$likes.' Likes</a></button>' ?>
                                    </div>
                                    <p class="text-sm mt-2 rounded-lg px-2 border-2 border-slate-900 bg-slate-800 w-max">Published on: <?= $published ?><?php if($modified != $published) { echo htmlspecialchars(" | Edited at: " . $modified); } ?></p>
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
                        <h2 class="uppercase font-bold"><span class="text-lg">More</span> <span class="text-cyan-500">blogs</span> <span class="text-lg">from</span> <span class="text-green-600"><?= $author ?></span></h2>
                        <div class="flex flex-row gap-6">
                            <?php
                            if (!$other_blogs) {
                                echo '<h3 class="uppercase my-auto">'.$author ." hasn't published any other blogs</h3>";
                            } else {
                                foreach($other_blogs as $blog2):
                            ?>
                            <div class="group flex flex-col relative bg-black border-4 border-slate-600 rounded-lg overflow-hidden transition-all ease-in-out duration-200">
                                <img src="<?= $blog2['featured_image'] ?>" class="w-[300px] h-[150px] opacity-40 transition-all ease-in-out duration-200 group-hover:scale-150 group-hover:opacity-20" />
                                <div class="flex flex-col absolute w-full h-full p-2">
                                    <h2 class="mt-auto truncate font-bold transition-all ease-in-out duration-300 group-hover:text-blue-500"><?= $blog2['title'] ?></h2>
                                    <h5><?= $blog2['created_at'] ?></h5>
                                </div>
                                <a href="/blog/<?=$blog2['slug']?>" class="absolute w-full h-full"></a>
                            </div>
                            <?php
                                endforeach;
                            }
                            ?>
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