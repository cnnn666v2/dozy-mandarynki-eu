<?php
    session_start();
    require $_SERVER['DOCUMENT_ROOT'] . '/config/php/db.php';

    $stmt = $pdo->prepare("SELECT name, id FROM ${dbprefix}tags ORDER BY id DESC");
    $stmt->execute();
    $tags = $stmt->fetchAll();

    $stmt = $pdo->prepare("SELECT name, id FROM ${dbprefix}categories ORDER BY id DESC");
    $stmt->execute();
    $categories = $stmt->fetchAll();

    $stmt = $pdo->prepare("SELECT title, id, slug, description, featured_image, created_at FROM ${dbprefix}blog ORDER BY id DESC LIMIT 10");
    $stmt->execute();
    $blogs = $stmt->fetchAll();

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
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/config/html/navbar.php'; ?>
        </header>

        <div id="container" class="flex flex-row relative">
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/config/html/sidebar.html'; ?>

            <div class="flex flex-col justify-center items-center w-full">
                <h1 class="font-bold text-center mt-5">BLOGS</h1>
                <p class="flex gap-2">Page: <a href="#"><-</a> • <a href="#">1</a> • <a href="#">2</a> • <a href="#">3</a> • <a href="#">4</a> • <a href="#">5</a> • <a href="#">6</a> • <a href="#">7</a> • <a href="#">8</a> • <a href="#">9</a> • <a href="#">10</a> ... <a href="#">20</a> • <a href="#">-></a> | <button class="text-base text-gray-400 hover:text-gray-300">go to [x]</button></p>
                <form class="flex flex-row gap-2 w-full justify-center mt-2 text-lg">
                    <div class="flex flex-col relative z-50">
                        <button type="button" onclick="toggleCategory()" class="border-2 border-solid border-cyan-600 uppercase rounded-lg px-2 hover:bg-cyan-600 transition-colors duration-200 ease-in-out h-full">Category</button>
                        <div id="category-dropdown" class="absolute hidden flex flex-col bg-slate-900 border-2 border-solid border-slate-600 mt-10 p-2 rounded-lg gap-2 w-96 shadow-xl shadow-black" >
                            <input type="text" id="search-category" placeholder="Search a category..." class="px-2 py-1 rounded-lg bg-slate-700 " />
                            <p class="text-sm uppercase font-semibold">Selected: <button id="btn-selected-category" type="button" onclick="removeCategory()" class="uppercase bg-green-700 rounded-lg p-1 text-xs hover:bg-green-800 hover:text-red-500 transition-colors duration-200 ease-in-out">No category selected</button></p>
                            <hr class="rounded-xl border-2">
                            <div id="category-list" class="flex flex-row flex-wrap gap-2 max-h-32 pr-2 overflow-y-scroll">
                                <?php foreach($categories as $cat): ?>
                                <button type="button" name="<?= htmlspecialchars($cat['name']) ?>" onclick="selectCategory('<?=htmlspecialchars($cat['name'])?>', '<?=htmlspecialchars($cat['id'])?>')" class="uppercase bg-green-700 rounded-lg p-1 font-semibold text-xs hover:bg-green-400 hover:text-cyan-700 transition-colors duration-200 ease-in-out"><?= htmlspecialchars($cat['name']) ?></button>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col relative z-50">
                        <button type="button" onclick="toggleTags()" class="border-2 border-solid border-cyan-600 uppercase rounded-lg px-2 hover:bg-cyan-600 transition-colors duration-200 ease-in-out h-full">Tags</button>
                        <div id="tags-dropdown" class="absolute hidden flex flex-col bg-slate-900 border-2 border-solid border-slate-600 mt-10 p-2 rounded-lg gap-2 w-96 shadow-xl shadow-black" >
                            <input type="text" id="search-tags" placeholder="Search a tag..." class="px-2 py-1 rounded-lg bg-slate-700 " />
                            <p class="text-sm uppercase font-semibold">Selected:</p>
                            <div id="tag-table" class="flex flex-row gap-2 rounded-lg bg-slate-700 p-2 uppercase flex-wrap text-sm font-semibold max-h-24 overflow-y-scroll">
                                <?php foreach($tags as $tag): ?>
                                <button type="button" onclick="delTag(this, '<?= htmlspecialchars($tag['name']) ?>')" name="<?= htmlspecialchars($tag['name']) ?>" class="hidden uppercase bg-green-700 rounded-lg p-1 text-xs hover:bg-green-800 hover:text-red-500 transition-colors duration-200 ease-in-out"><?= htmlspecialchars($tag['name']) ?></button>
                                <?php endforeach; ?>
                            </div>
                            <hr class="rounded-xl border-2">
                            <div id="tags-list" class="flex flex-row flex-wrap gap-2 max-h-32 pr-2 overflow-y-scroll">
                                <?php foreach($tags as $tag): ?>
                                <button type="button" onclick="addTag(this, '<?= htmlspecialchars($tag['name']) ?>')" name="<?= htmlspecialchars($tag['name']) ?>" class="uppercase bg-green-700 rounded-lg p-1 font-semibold text-xs hover:bg-green-400 hover:text-cyan-700 transition-colors duration-200 ease-in-out"><?= htmlspecialchars($tag['name']) ?></button>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex flex-row w-[40%]">
                        <input type="text" name="query" placeholder="I wanna find..." class="px-2 py-1 rounded-l-lg w-full bg-slate-700 border-2 border-solid border-slate-500 border-r-0"/>
                        <button type="submit" class="border-2 border-solid border-green-600 rounded-r-lg px-2 uppercase hover:bg-green-600 transition-colors duration-200 ease-in-out">Search</button>
                    </div>

                    <input type="hidden" name="selected-category" value="" />
                    <input type="hidden" name="selected-tags" value="" />
                </form>

                <div class="flex flex-row justify-between flex-wrap w-full p-4 gap-4">
                    <?php foreach($blogs as $blog):?>
                    <div class="flex flex-row p-2 w-[49%] hover:bg-slate-800 border-2 border-solid border-red-600 rounded-md gap-2 group relative transition-colors ease-in-out duration-200">
                        <img src="<?= htmlspecialchars($blog['featured_image']) ?>" class="w-[150px] h-[150px] rounded-lg" />
                        <div class="flex flex-col w-full">
                            <h2 class="uppercase group-hover:text-blue-500 transition-colors ease-in-out duration-200"><?= htmlspecialchars($blog['title']) ?></h2>
                            <!-- TO DO: MODIFY MYSQL QUERY TO PRINT OUT CATEGORY NAME -->
                            <h5>Category: <span class="uppercase bg-green-700 rounded-lg p-1 font-semibold text-xs"><?= htmlspecialchars($blog['category_name']) ?></span></h5>
                            <p class="my-2 bbcodeparser"><?php echo htmlspecialchars(mb_substr($blog['description'], 0, 190)) . '...'; ?></p>
                            <div class="flex flex-row w-full mt-auto items-center">
                                <h6 class="text-gray-400">Published on: <?= htmlspecialchars($blog['created_at']) ?></h6>
                                <button class="border-2 border-green-700 ml-auto px-2 py-1 text-sm rounded-lg group-hover:bg-green-700 mt-auto uppercase transition-colors ease-in-out duration-200">Read more</button>
                            </div>
                        </div>
                        <a href="/blog/<?= $blog['slug'] ?>" class="absolute w-full h-full"></a>
                    </div>
                    <?php endforeach; ?>
                </div>
                <hr class="border-2 border-gray-500 w-full mt-8">
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/config/html/content-end.html'; ?>
            </div>
        </div>

        <?php include $_SERVER['DOCUMENT_ROOT'] . '/config/html/footer.php'; ?>
        <script src="/js/blogs/filters.js" defer></script>
        <script src="/js/blogs/bbcode-parser-home.js" defer></script>
    </body>
</html>