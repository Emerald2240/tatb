<?php
require_once "admin/config/connect.php";
require_once "admin/functions/functions.php";
?>
<!DOCTYPE html>
<html lang="en"> 
<head>
	<title>TA Tech Blog</title>

	<!-- Meta -->
	<meta name="description" content="Blog Template">
	<meta name="author" content="Xiaoying Riley at 3rd Wave Media">

	<?php
	require_once('includes/head.php');
	?>
</head>

<body>
<header class="header text-center">	    
		<?php 
		require_once('includes/sideprofilebar.php')
		?>
	</header>
    
    <div class="main-wrapper">
	<!-- <form class="d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 container" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
	</form> -->
	
	<div class="m-3"><form action="" method="post"></form>
                    <div class="form-group">
                        <label class="sr-only" for="semail">Enter Post</label>
                        <input type="email" id="semail" name="semail1" class="form-control mr-md-1 semail" placeholder="Enter Post">
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form></div>
	

	    <section class="blog-list px-3 py-5 p-md-5">
		    <div class="container">
			    <div class="item mb-5">
				    <div class="media">
					    <img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="assets/images/blog/blog-post-thumb-7.jpg" alt="image">
					    <div class="media-body">
						    <h3 class="title mb-1"><a href="blog-post.php">Heading Lorem Ipsum Dolor Sit Amet</a></h3>
						    <div class="meta mb-1"><span class="date">Published 3 months ago</span><span class="time">5 min read</span><span class="comment"><a href="#">4 comments</a></span></div>
						    <div class="intro">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies...</div>
						    <a class="more-link" href="blog-post.php">Read more &rarr;</a>
					    </div><!--//media-body-->
				    </div><!--//media-->
			    </div><!--//item-->
			    <div class="item mb-5">
				    <div class="media">
					    <img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="assets/images/blog/blog-post-thumb-8.jpg" alt="image">
					    <div class="media-body">
						    <h3 class="title mb-1"><a href="blog-post.php">Heading Lorem Ipsum Dolor Sit Amet</a></h3>
						    <div class="meta mb-1"><span class="date">Published 4 months ago</span><span class="time">3 min read</span><span class="comment"><a href="#">2 comments</a></span></div>
						    <div class="intro">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies...</div>
						    <a class="more-link" href="blog-post.php">Read more &rarr;</a>
					    </div><!--//media-body-->
				    </div><!--//media-->
			    </div><!--//item-->
			    
			    <div class="item mb-5">
				    <div class="media">
					    <img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="assets/images/blog/blog-post-thumb-9.jpg" alt="image">
					    <div class="media-body">
						    <h3 class="title mb-1"><a href="blog-post.php">Heading Nemo Enim Ipsam Voluptatem </a></h3>
						    <div class="meta mb-1"><span class="date">Published 4 months ago</span><span class="time">8 min read</span><span class="comment"><a href="#">7 comments</a></span></div>
						    <div class="intro">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies...</div>
						    <a class="more-link" href="blog-post.php">Read more &rarr;</a>
					    </div><!--//media-body-->
				    </div><!--//media-->
			    </div><!--//item-->
			    <div class="item mb-5">
				    <div class="media">
					    <img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="assets/images/blog/blog-post-thumb-10.jpg" alt="image">
					    <div class="media-body">
						    <h3 class="title mb-1"><a href="blog-post.php">Heading Perspiciatis Unde Omnis </a></h3>
						    <div class="meta mb-1"><span class="date">Published 5 months ago</span><span class="time">15 min read</span><span class="comment"><a href="#">3 comments</a></span></div>
						    <div class="intro">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies...</div>
						    <a class="more-link" href="blog-post.php">Read more &rarr;</a>
					    </div><!--//media-body-->
				    </div><!--//media-->
			    </div><!--//item-->
			    
			    <div class="item mb-5">
				    <div class="media">
					    <img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="assets/images/blog/blog-post-thumb-11.jpg" alt="image">
					    <div class="media-body">
						    <h3 class="title mb-1"><a href="blog-post.php">Heading Duis Arcu Tortor</a></h3>
						    <div class="meta mb-1"><span class="date">Published 5 months ago</span><span class="time">10 min read</span><span class="comment"><a href="#">0 comment</a></span></div>
						    <div class="intro">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies...</div>
						    <a class="more-link" href="blog-post.php">Read more &rarr;</a>
					    </div><!--//media-body-->
				    </div><!--//media-->
			    </div><!--//item-->
			    
			    <div class="item">
				    <div class="media">
					    <img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="assets/images/blog/blog-post-thumb-12.jpg" alt="image">
					    <div class="media-body">
						    <h3 class="title mb-1"><a href="blog-post.php">Heading Vestibulum Ante Ipsum Primis</a></h3>
						    <div class="meta mb-1"><span class="date">Published 6 months ago</span><span class="time">2 min read</span><span class="comment"><a href="#">8 comments</a></span></div>
						    <div class="intro">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies...</div>
						    <a class="more-link" href="blog-post.php">Read more &rarr;</a>
					    </div><!--//media-body-->
				    </div><!--//media-->
			    </div><!--//item-->
			    
			    <nav class="blog-nav nav nav-justified my-5">
				  <a class="nav-link-prev nav-item nav-link rounded-left" href="index.php">Previous<i class="arrow-prev fas fa-long-arrow-alt-left"></i></a>
				  <a class="nav-link-next nav-item nav-link rounded-right" href="blog-list.php">Next<i class="arrow-next fas fa-long-arrow-alt-right"></i></a>
				</nav>
				
		    </div>
	    </section>
	    
		<footer class="footer text-center py-2 theme-bg-dark">
			<?php
			require_once('includes/footer.php');
			?>
		</footer>
    
    </div><!--//main-wrapper-->
    
       
    <!-- Javascript -->          
    <?php
	require_once('includes/js.php');
	?>
    
    <?php
	//require_once('includes/styleswitch.php')
	?>

</body>
</html> 

