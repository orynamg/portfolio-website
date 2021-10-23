<?php
session_start();
$loggedIn = isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]=== true;

require_once "config.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($_POST["delete_blog"])) {

        $sql = "DELETE FROM blogs WHERE blog_id=?";
        if($stmt = mysqli_prepare($link, $sql)){

            mysqli_stmt_bind_param($stmt, "i", $_POST["delete_blog"]);

            if(!mysqli_stmt_execute($stmt)){
                echo "Oops! Something went wrong. Please try again later.";
            }
        
            mysqli_stmt_close($stmt);
        }

    } if (!empty($_POST["add_like"])) {

            $sql = " UPDATE blogs SET likes = likes + 1 WHERE blog_id=?";
            if($stmt = mysqli_prepare($link, $sql)){
    
                mysqli_stmt_bind_param($stmt, "i", $_POST["add_like"]);
    
                if(!mysqli_stmt_execute($stmt)){
                    echo "Oops! Something went wrong. Please try again later.";
                }
            
                mysqli_stmt_close($stmt);
            }

    } if (!empty($_POST["add_dislike"])) {

        $sql = " UPDATE blogs SET dislikes = dislikes + 1 WHERE blog_id=?";
        if($stmt = mysqli_prepare($link, $sql)){

            mysqli_stmt_bind_param($stmt, "i", $_POST["add_dislike"]);

            if(!mysqli_stmt_execute($stmt)){
                echo "Oops! Something went wrong. Please try again later.";
            }
        
            mysqli_stmt_close($stmt);
        }

    } else if(!empty($_POST["title"]) && !empty($_POST["blog"])) {
        
        $sql = "INSERT INTO blogs(user_id, title, blog) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
     
            mysqli_stmt_bind_param($stmt, "iss", $_SESSION["id"], $_POST["title"], $_POST["blog"]);
            
            if(!mysqli_stmt_execute($stmt)){
                echo "Oops! Something went wrong. Please try again later.";
            }
        
            mysqli_stmt_close($stmt);
        }
    }

    if(!empty($_POST["month_filter"])) {
       $_SESSION["month_filter"] = (int)$_POST["month_filter"];
    } else {
        $_SESSION["month_filter"] = 0;
    }

}

class blog {

    public $title = "";
    public $blog = "";
    public $created_at = "";
    public $name = "";
    public $user_id = 0;
    public $blog_id = 0;
    public $user_picture = "";

}

function compareByDate($blog1, $blog2)
{
    if ($blog1->created_at == $blog2->created_at) {
        return 0;
    }
    return ($blog1->created_at < $blog2->created_at) ? 1 : -1;
}

$blogs = array();

$sql = "SELECT b.title, b.blog, b.blog_id, b.created_at, u.name, u.id, u.picture, b.likes, b.dislikes FROM blogs b INNER JOIN users u ON b.user_id = u.id";

if (isset($_SESSION["month_filter"]) && $_SESSION["month_filter"] > 0 && $_SESSION["month_filter"] < 13 ) {
    $sql .= " WHERE MONTH(b.created_at) = ?";
}

if($stmt = mysqli_prepare($link, $sql)){

    if (isset($_SESSION["month_filter"]) && $_SESSION["month_filter"] > 0 && $_SESSION["month_filter"] < 13 ) {
        mysqli_stmt_bind_param($stmt, "i", $_SESSION["month_filter"]);
    } 

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while($row = mysqli_fetch_array($result)){
    
        $blog = new blog;
        $blog->title = $row['title'];
        $blog->blog = $row['blog'];
        $blog->created_at = $row['created_at'];
        $blog->name = $row['name'];
        $blog->user_id = $row['id'];
        $blog->blog_id = $row['blog_id'];
        $blog->user_picture = $row['picture'];
        $blog->likes = $row['likes'];
        $blog->dislikes = $row['dislikes'];

        array_push($blogs, $blog);
    }

    mysqli_stmt_close($stmt);

    usort($blogs, "compareByDate");

}

mysqli_close($link);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/9de2faaa7b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" media="screen and (max-width: 1200px)" href="mobile.css">
    <title>Oryna Goichuk || Portfolio Website</title>
</head>
<body>
    
    <!-- Navbar -->
    <nav  class="blog-nav" id="main-nav">
        <a href="index.php" class="logo"><img src="project_resources/IMG_0669.PNG" alt="" class="logo"></a>
        <ul>
            <li><a href="index.php">HOME</a></li>
            <li><a href="index.php#about">ABOUT</a></li>
            <li><a href="blog.php">BLOG</a></li>
            <li><a href="projects.php">PROJECTS</a></li>
            <li><a href="contact.php">CONTACT</a></li>

            <?php if ($loggedIn) { ?>
                <li><a class="user" href="my-account.php"><i class="fas fa-user-circle fa-2x"></i></a></li>
            <?php } else { ?>
                <li><a href="login.php">LOG IN</a></li>
            <?php } ?>

        </ul>
    </nav>
    <div class="pad"></div>
    <section class="blogs">
    <div class="blog-flex">
        <div>
            <h3 class="section-title">Blog Page</h3>
            <div class="bottom-line"></div> 
            <h2>Log in and become a part of my blog!</h2>
        </div>
    </div>
    <div class="blog-content admin-blog-content">
        <div class="blog-box admin-blog">
            <div class="admin-blog-box">
                <h2>Work Hard Play Harder.</h2>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ad dolor distinctio officiis vitae, cum atque quam quidem natus quo minima repudiandae facere? Laborum a natus repellat dolorem commodi suscipit nulla exercitationem sunt atque expedita minus, culpa quae aliquid explicabo maiores nobis iusto odio ducimus! Atque, reiciendis, assumenda corrupti suscipit aut inventore consequatur nostrum deleniti eaque non doloribus! Inventore voluptate ipsum laboriosam reprehenderit velit placeat perferendis, tempore aut quod, exercitationem repudiandae laudantium id odit quisquam commodi quae unde at et pariatur dolores impedit assumenda! Doloribus, illo! Quas debitis possimus minus ipsa, explicabo officiis ad temporibus harum. Facere distinctio dignissimos quo vero nesciunt ipsam animi laboriosam sequi quod asperiores. Ducimus quidem ipsum placeat accusantium excepturi quod aliquam eum, illo nobis fugit tempora illum dicta officia odio magni eos ut necessitatibus? Reiciendis, harum vero explicabo commodi quidem quo. Illum quas quasi autem delectus, qui earum exercitationem quos sapiente, iste voluptates molestiae fuga nihil suscipit labore laborum porro excepturi, nisi ab. Vel maxime provident recusandae laborum similique nisi! Fuga voluptates dolorem id incidunt laboriosam quae vitae illo consequatur, optio eaque earum quasi quos molestiae ex quis mollitia labore quam sit eius laudantium quo assumenda!</p>
                <ul class="admin-ul">
                    <li class="name">~ Oryna Goichuk</li>
                    <li class="time"><?= $blog->created_at; ?></li>
                </ul>
            </div>
            
        </div>
    </div>
    <div class="comments">
        <h2>Comment your opinions down below!</h2>
    </div>
    <div class="dropdown-centre">
        <div class="dropdown">
            <a  class="btn dropdown-btn">Filter By Date</a>
            <div class="dropdown-content">
                <a onclick="filterByMonth(0)">Clear Filter</a>
                <a onclick="filterByMonth(1)">01/2021</a>
                <a onclick="filterByMonth(2)">02/2021</a>
                <a onclick="filterByMonth(3)">03/2021</a>
                <a onclick="filterByMonth(4)">04/2021</a>
                <a onclick="filterByMonth(5)">05/2021</a>
                <a onclick="filterByMonth(6)">06/2021</a>
            </div>
        </div>
    </div>
        <div class="blog-content">

            <?php foreach($blogs as $blog): ?>
            <div>
                <div class="blog-box">
                    <h2><?= $blog->title; ?></h2>
                    <p><?= $blog->blog; ?></p>
                    <div class="comment-icons">

                        <?php if ($loggedIn) { ?>
                            <p><i onclick="addLike(<?= $blog->blog_id ?>)" class="fas fa-heart"></i></p>
                        <?php } ?>
                        
                        <?php if (!$loggedIn) { ?>
                            <p><i onclick="errorMessage()" class="fas fa-heart"></i></p>
                        <?php } ?> 

                        <p class="like-icon-text"><?= $blog->likes ?></p>

                        <?php if ($loggedIn) { ?>
                            <p><i onclick="addDislike(<?= $blog->blog_id ?>)" class="fas fa-thumbs-down"></i></p>
                        <?php } ?>
                        
                        <?php if (!$loggedIn) { ?>
                            <p><i onclick="errorMessage()" class="fas fa-thumbs-down"></i></p>
                        <?php } ?> 

                        <p class="dislike-icon-text"><?= $blog->dislikes ?></p>
                        

                        <?php if ($loggedIn) { ?>
                            <?php if ($blog->user_id == $_SESSION["id"]) : ?>
                                <p><i onclick="deleteBlog(<?= $blog->blog_id ?>)" class="fas fa-trash"></i></p>
                            <?php endif; ?>
                        <?php } ?>
                        

                    </div>
                </div>
                <ul>

                    <?php if(!empty($blog->user_picture)) : ?>
                        <li><img src="<?= $blog->user_picture; ?>" alt=""></li>
                    <?php else : ?>
                        <li><i class="fas fa-user-circle fa-3x"></i></li>
                    <?php endif; ?>

                    <li><?= $blog->name; ?></li>
                    <li class="time"><?= $blog->created_at; ?></li>
                </ul>
            </div>

            <?php endforeach; ?>
            
        </div>
    </section>
    <?php if ($loggedIn) { ?>
        <aside class="addblog">
            <form id="blogForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <h3 class="section-title">Add Comment</h3>
                <div class="bottom-line"></div> 
                <div class="add-blog-content">
                    <div>
                        <input class="blah" type="text" name="title" placeholder="Title" required>
                        <textarea class="blah message-input" classtype="text" name="blog" required placeholder="Enter text here..."></textarea>

                    </div>
                </div>
                <div class="button-set">
                
                        <input onclick="preventDefault()" value="Post" class="btn submit-btn">
                        <input onclick="ConfirmationPopUp()" value="Clear" class="btn submit-btn">

                </div>
                <input type="hidden" id="delete_blog" name="delete_blog">
                <input type="hidden" id="add_like" name="add_like">
                <input type="hidden" id="add_dislike" name="add_dislike">
                <input type="hidden" id="month_filter" name="month_filter">

            </form>
        </aside>
                
    <?php } else { ?>
        <aside class="login">
            <p>To participate in the blog, you must log in!</p>
            <a href="login.php" class="btn">Login</a>
        </aside>
                
    <?php } ?>

    <script>
        function ConfirmationPopUp() {
            if (confirm("Are you sure you want to clear form?")) {
                document.getElementById("blogForm").reset();
            }
        }

        function preventDefault() {
            const requiredElements = document.getElementsByClassName("blah");
            let isMissing = false;
            for (let element of requiredElements) {
                if (element.value == "") {
                    element.classList.add("required");
                    isMissing = true;
                }  
                else {
                    element.classList.remove("required");
                }
            } 
            if (!isMissing) {
                    document.getElementById("blogForm").submit();
                    
                }
        }

        function deleteBlog(blogId) {
           document.getElementById("delete_blog").value=blogId;
           document.getElementById("blogForm").submit();

        }

        function addLike(blogId) {
           document.getElementById("add_like").value=blogId;
           document.getElementById("blogForm").submit();
        }

        function addDislike(blogId) {
           document.getElementById("add_dislike").value=blogId;
           document.getElementById("blogForm").submit();
        }

        function filterByMonth(month) {
            document.getElementById("month_filter").value=month;
            document.getElementById("blogForm").submit();
        }

        function errorMessage() {
            alert("You must log in to like and dislike comments!");
        }

        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }



    </script>
    
    <!-- Footer -->
    <footer class="footer">
        <div class="social">
            <a href="https://github.com/orynamg"><i class="fab fa-github fa-2x"></i></a>
            <a href="#"><i class="fab fa-twitter fa-2x"></i></a>
            <a href="#"><i class="fab fa-linkedin fa-2x"></i></a>
            <a href="https://www.snapchat.com/add/arina_goichuk"><i class="fab fa-snapchat fa-2x"></i></a>
        </div>
        <p>Copyright &copy; 2021 - Oryna Goichuk</p>
    </footer>
</body>
</html> 