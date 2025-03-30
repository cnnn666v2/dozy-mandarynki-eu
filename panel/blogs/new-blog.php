<?php
    session_start();
    require $_SERVER['DOCUMENT_ROOT'] . '/config/php/db.php';
    $config = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '/config/php/cfg.php');

    if(!isset($_SESSION['user_id'])) {
        header('Location: http://'.$_SERVER['HTTP_HOST']);
        exit();
    }

    try {
        $stmt = $pdo->query("SELECT name FROM {$dbprefix}categories");
        $categories = $stmt->fetchAll();
        
        $stmt = $pdo->query("SELECT name FROM {$dbprefix}tags");
        $tags = $stmt->fetchAll();
    } catch (PDOException $e) {
        die("Error: Query failed: " . $e->getMessage());
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = trim($_POST['title'] ?? '');
        $category = trim($_POST['category'] ?? '');
        $tags = isset($_POST['tags']) ? json_decode($_POST['tags'], true) : [];
        $file = $_FILES['file'];
        $content = trim($_POST['content'] ?? '');
        $author_id = $_SESSION['user_id'];

        if (empty($title) || empty($category) || empty($content)) {
            die("Error: Title, category, and content are required.");
        }
    
        try {
            $slug = strtolower(trim($title));
            $slug = preg_replace('/[^a-z0-9-]+/', '-', $slug);
            $slug = trim($slug, '-');

            $stmt = $pdo->prepare("SELECT COUNT(*) FROM {$dbprefix}blog WHERE slug = ?");
            $original_slug = $slug;
            $count = 1;

            while (true) {
                $stmt->execute([$slug]);
                $exists = $stmt->fetchColumn();
                if (!$exists) break;
                $slug = $original_slug . '-' . $count;
                $count++;
            }

            $datePath = date("Y") . '/' . date("m") . '/' . date("d") . '/img/';
            $uploadPath = $_SERVER['DOCUMENT_ROOT'] . '/uploads/'. $datePath; //Filepath for server upload
            $featured_image = null;

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            if (!is_writable($uploadPath)) {
                die("Error: Upload directory is not writable.");
            }
            
            if ($file['error'] !== UPLOAD_ERR_OK) {
                die("File upload error: " . $file['error']);
            }

            if (!empty($_FILES['file']['name'])) {
                $fileName = "FI_" . time() . "_" . basename($file['name']);
                $targetFile = $uploadPath . $fileName;
                $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
                $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

                if (in_array($fileType, $allowedTypes)) {
                    if (move_uploaded_file($file['tmp_name'], $targetFile)) {
                        $featured_image = $targetFile;
                    } else {
                        die("Error: Failed to upload file.");
                    }
                } else {
                    die("Error: Invalid file type. Allowed types: JPG, JPEG, PNG, GIF.");
                }
            }

            $uploadPathC = '/uploads/'. $datePath . $fileName; //Filepath to store in db and send to client

            $stmt = $pdo->prepare("SELECT id FROM {$dbprefix}categories WHERE name = ?");
            $stmt->execute([$category]);
            $category_row = $stmt->fetch();
            
            if (!$category_row) {
                die("Error: Invalid category.");
            }

            $category_id = $category_row['id'];

            $stmt = $pdo->prepare("INSERT INTO {$dbprefix}blog (title, slug, description, author_id, category_id, featured_image) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([htmlspecialchars($title), $slug, htmlspecialchars($content), $author_id, $category_id, $uploadPathC]);

            $blog_id = $pdo->lastInsertId();

            if (!empty($tags) && is_array($tags)) {
                foreach ($tags as $tag) {
                    echo "Tag: {$tag}";
                    $stmt = $pdo->prepare("SELECT id FROM {$dbprefix}tags WHERE name = ?");
                    $stmt->execute([$tag]);
                    $tag_row = $stmt->fetch();
    
                    if ($tag_row) {
                        $tag_id = $tag_row['id'];
                        $stmt = $pdo->prepare("INSERT INTO {$dbprefix}blog_tags (blog_id, tag_id) VALUES (?, ?)");
                        $stmt->execute([$blog_id, $tag_id]);
                    }
                }
            }
    
            header("Location: /panel/index.php"); // Change location to newly created blog
            exit();
        } catch (PDOException $e) {
            die("Database error: " . $e->getMessage());
        }
    }
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
                <nav id="nav-subtop" class="w-full">
                    <ul class="flex flex-row mx-2 py-4 text-xl uppercase font-bold pb-3">
                        <li class="px-2 py-3"><a class="px-2 py-3 text-white hover:text-white border-2 rounded-lg border-green-600 hover:bg-green-600 transition-colors ease-in-out duration-200" href="/panel/">Dashboard</a></li>
                        <li class="px-2 py-3"><a class="px-2 py-3 text-white hover:text-white border-2 rounded-lg border-green-600 hover:bg-green-600 transition-colors ease-in-out duration-200" href="#" id="subnav-blogs">Blogs</a></li>
                        <li class="px-2 py-3"><a class="px-2 py-3 text-white hover:text-white border-2 rounded-lg border-green-600 hover:bg-green-600 transition-colors ease-in-out duration-200" href="#" id="subnav-categories">Categories</a></li>
                        <li class="px-2 py-3"><a class="px-2 py-3 text-white hover:text-white border-2 rounded-lg border-green-600 hover:bg-green-600 transition-colors ease-in-out duration-200" href="#" id="subnav-tags">Tags</a></li>
                        <li class="px-2 py-3 ml-auto"><a class="px-2 py-3 text-white hover:text-white border-2 rounded-lg border-green-600 hover:bg-green-600 transition-colors ease-in-out duration-200" href="/panel/settings.php">Settings</a></li>
                        <li class="px-2 py-3"><a class="px-2 py-3 text-white hover:text-white border-2 rounded-lg border-green-600 hover:bg-green-600 transition-colors ease-in-out duration-200" href="/panel/account.php">Account</a></li>
                        <!--<li><a class="p-4 text-white hover:text-white  hover:border-cyan-500 hover:bg-slate-600" href="/panel/logout.php">Logout</a></li>-->
                        <span class="bg-green-600"></span>
                    </ul>

                    <div id="panel-dropdown" class="p-4 border-y-4 border-gray-500 bg-slate-900">
                        <h1 class="font-bold text-center uppercase">Welcome back, <span class="text-green-500"><?php echo $_SESSION['username'] ?></span> 👋</h1>
                        <p class="text-center">Have a great day!</p>

                        <div id="dropdown-blogs" class="flex flex-row w-full h-full hidden">
                            <div class="flex flex-col basis-1/2 gap-3">
                                <h1 class="uppercase">Blogs</h1>
                                <div class="flex flex-row gap-2">
                                    <a href="/panel/blogs/new-blog.php" class="p-2 border-2 border-cyan-600 rounded-lg text-xl uppercase text-white hover:text-white hover:bg-cyan-600 w-max transition-colors ease-in-out duration-200">New Blog +</a>
                                    <a href="#" class="p-2 border-2 border-cyan-600 rounded-lg text-xl uppercase text-white hover:text-white hover:bg-cyan-600 w-max transition-colors ease-in-out duration-200">All Blogs</a>
                                    <a href="#" class="p-2 border-2 border-cyan-600 rounded-lg text-xl uppercase text-white hover:text-white hover:bg-cyan-600 w-max transition-colors ease-in-out duration-200">Your Blogs</a>
                                </div>

                                <p>Random blog: <a href="#">[ TITLE ]</a></p>
                            </div>

                            <div class="flex flex-col basis-1/2 text-right mt-auto  ">
                                <p class="uppercase text-xl font-bold">Total blogs: 256</p>
                                <p class="uppercase text-xl font-bold">Total users: 10</p>
                                <a href="#" class="ml-auto mt-1 p-2 border-2 border-cyan-600 rounded-lg text-xl uppercase font-bold text-white hover:text-white hover:bg-cyan-600 w-max transition-colors ease-in-out duration-200">User list</a>
                            </div>
                        </div>

                        <div id="dropdown-categories" class="flex flex-row w-full h-full hidden">
                            <div class="flex flex-col basis-1/2 gap-3">
                                <h1 class="uppercase">Categories</h1>
                                <div class="flex flex-row gap-2">
                                    <a href="#" class="p-2 border-2 border-cyan-600 rounded-lg text-xl uppercase text-white hover:text-white hover:bg-cyan-600 w-max transition-colors ease-in-out duration-200">New Category +</a>
                                    <a href="#" class="p-2 border-2 border-cyan-600 rounded-lg text-xl uppercase text-white hover:text-white hover:bg-cyan-600 w-max transition-colors ease-in-out duration-200">All Categories</a>
                                </div>

                                <p class="uppercase font-bold">Pinned categories:
                                    <span class="bg-red-700 rounded-lg px-2 py-1">youtube</span>
                                    <span class="bg-green-700 rounded-lg px-2 py-1">life</span>
                                    <span class="bg-blue-700 rounded-lg px-2 py-1">news</span>
                                    <span class="bg-orange-700 rounded-lg px-2 py-1">tutorial</span>
                                    <a href="">[ Change ]</a>
                                </p>

                                <p class="uppercase font-bold">Total categories: 25</p>
                            </div>
                        </div>

                        <div id="dropdown-tags" class="flex flex-row w-full h-full hidden">
                            <div class="flex flex-col basis-1/2 gap-3">
                                <h1 class="uppercase">Tags</h1>
                                <div class="flex flex-row gap-2">
                                    <a href="#" class="p-2 border-2 border-cyan-600 rounded-lg text-xl uppercase text-white hover:text-white hover:bg-cyan-600 w-max transition-colors ease-in-out duration-200">New Tag +</a>
                                    <a href="#" class="p-2 border-2 border-cyan-600 rounded-lg text-xl uppercase text-white hover:text-white hover:bg-cyan-600 w-max transition-colors ease-in-out duration-200">All Tags</a>
                                </div>

                                <p class="uppercase font-bold">Pinned tags:
                                    <span class="bg-red-700 rounded-lg px-2 py-1">showcase</span>
                                    <span class="bg-green-700 rounded-lg px-2 py-1">photos</span>
                                    <span class="bg-blue-700 rounded-lg px-2 py-1">videos</span>
                                    <span class="bg-orange-700 rounded-lg px-2 py-1">games</span>
                                    <a href="">[ Change ]</a>
                                </p>

                                <p class="uppercase font-bold">Total tags: 25</p>
                            </div>
                        </div>
                    </div>
                </nav>

                <section id="dashboard" class="flex flex-row justify-center px-4 py-2 gap-2 w-full">
                    <form method="POST" enctype="multipart/form-data" action="/panel/blogs/new-blog.php" class="bg-slate-900 rounded-xl p-4 flex flex-col w-full gap-3 mb-8 mt-4 border-2 border-blue-500">
                        <div class="flex flex-col w-full gap-2">
                            <label for="title" class="text-xl font-bold">Blog title:</label>
                            <input type="text" name="title" placeholder="eg. I've adopted a cat! :3" class="rounded-lg p-2 bg-slate-700 mb-6" required/>
                            
                            <div class="flex flex-row gap-2">
                                <div class="flex flex-col w-1/3 gap-2">
                                    <label for="category" class="text-xl font-bold">Blog category:</label>
                                    <select name="category" class="rounded-lg p-2 bg-slate-700 uppercase">
                                        <?php foreach ($categories as $category): ?>
                                            <option value="<?= htmlspecialchars($category['name']) ?>">
                                                <?= htmlspecialchars($category['name']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>

                                    <p id="tag-err-msg" class="text-red-600 my-auto"></p>
                                </div>

                                <div class="flex flex-col w-2/3 gap-2">
                                    <label for="tags" class="text-xl font-bold">Blog tags:</label>
                                    <div class="flex flex-row gap-2">
                                        <select id="tags-list" class="rounded-lg p-2 bg-slate-700 w-1/4 uppercase">
                                            <?php foreach ($tags as $tag): ?>
                                                <option value="<?= htmlspecialchars($tag['name']) ?>">
                                                    <?= htmlspecialchars($tag['name']) ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                        <button type="button" id="add-tag" class="rounded-lg px-2 border-2 border-cyan-600 hover:bg-cyan-600 uppercase transition-colors ease-in-out duration-200">Add tag</button>
                                    </div>
                                    <div id="tag-table" class="flex flex-row gap-2 border-2 border-slate-500 w-full rounded-lg bg-slate-700 p-2 uppercase font-bold flex-wrap">
                                        <p id="dummy-tag" class="group bg-blue-600 rounded-md px-2 hover:bg-blue-400 hover:cursor-pointer hover:text-red-700 transition-colors ease-in-out duration-200 hidden">Dummy tag</p>
                                    </div>

                                    <input type="hidden" name="tags" id="tags-hidden">
                                </div>
                            </div>

                            <div class="flex flex-col gap-2">
                                <label for="file" class="text-xl font-bold">Featured image:</label>
                                <input type="file" name="file" accept="image/*" required/>
                            </div>

                            <div class="flex flex-col border-2 border-cyan-500 rounded-md w-full">
                                <div class="flex flex-row bg-slate-950 w-full gap-8 px-2 py-1 rounded-t-md">
                                    <div>
                                        <button type="button" class="blog-btn" onclick="insertElement('HEADER1')">[h1]</button>
                                        <button type="button" class="blog-btn" onclick="insertElement('HEADER2')">[h2]</button>
                                        <button type="button" class="blog-btn" onclick="insertElement('HEADER3')">[h3]</button>
                                        <button type="button" class="blog-btn" onclick="insertElement('HEADER4')">[h4]</button>
                                        <button type="button" class="blog-btn" onclick="insertElement('HEADER5')">[h5]</button>
                                        <button type="button" class="blog-btn" onclick="insertElement('HEADER6')">[h6]</button>
                                        <button type="button" class="blog-btn" onclick="insertElement('PARAGRAPH')">[p]</button>
                                        <button type="button" class="blog-btn" onclick="insertElement('BREAKLINE')">[br]</button>
                                    </div>

                                    <div>
                                        <button type="button" class="blog-btn" onclick="insertElement('BOLD')">[b]</button>
                                        <button type="button" class="blog-btn" onclick="insertElement('ITALIC')">[i]</button>
                                        <button type="button" class="blog-btn" onclick="insertElement('UNDERLINE')">[u]</button>
                                        <button type="button" class="blog-btn" onclick="insertElement('STRIKETHROUGH')">[s]</button>
                                    </div>

                                    <div>
                                        <button type="button" class="blog-btn" onclick="insertElement('HYPERLINK')">[a]</button>
                                        <button type="button" class="blog-btn" onclick="insertElement('IMAGE')">[img]</button>
                                        <button type="button" class="blog-btn" onclick="insertElement('QUOTE')">[q]</button>
                                        <button type="button" class="blog-btn" onclick="insertElement('BLOCKQUOTE')">[quote]</button>
                                        <button type="button" class="blog-btn" onclick="insertElement('CITE')">[cite]</button>
                                        <button type="button" class="blog-btn" onclick="insertElement('SPOILER')">[spoiler]</button>
                                    </div>
                                </div>
                                <textarea name="content" class="bg-slate-700 p-2 min-h-60 w-full rounded-b-md" placeholder="[h1]So today I have adopted a cat![/h1]" id="typing-post"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="rounded-lg p-2 border-2 border-green-600 hover:bg-green-600 uppercase transition-colors ease-in-out duration-200">Publish blog</button>
                    </form>
                </section>
                
                <hr class="mt-8 border-2 border-gray-500 w-full">

                <?php include $_SERVER['DOCUMENT_ROOT'] . '/config/html/content-end.html'; ?>
            </div>
        </div>

        <?php include $_SERVER['DOCUMENT_ROOT'] . '/config/html/footer.html'; ?>

        <script src="/js/panel-nav.js" defer></script>
        <script src="/js/blogs/tags.js" defer></script>
        <script src="/js/blogs/blog-maker.js" defer></script>
    </body>
</html>