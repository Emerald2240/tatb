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
		<section class="cta-section theme-bg-light py-5">
			<?php
			require_once('includes/topbar.php')
			?>
		</section>
		<section class="blog-list px-3 py-5 p-md-5">
			<div class="container">
				<?php
				loadBlogPosts();
				?>
				<div class="item mb-5">
					<div class="media">
						<img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="assets/images/blog/blog-post-thumb-1.jpg" alt="image">
						<div class="media-body">
							<h3 class="title mb-1"><a href="post.php">Why Every Developer Should Have A Blog</a></h3>
							<div class="meta mb-1"><span class="date">Published 2 days ago</span><span class="time">5 min read</span><span class="comment"><a href="#">8 comments</a></span></div>
							<div class="intro">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies...</div>
							<a class="more-link" href="post.php">Read more &rarr;</a>
						</div>
						<!--//media-body-->
					</div>
					<!--//media-->
				</div>
				<!--//item-->
				<div class="item mb-5">
					<div class="media">
						<img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="assets/images/blog/blog-post-thumb-2.jpg" alt="image">
						<div class="media-body">
							<h3 class="title mb-1"><a href="post.php">A Guide to Becoming a Full-Stack Developer</a></h3>
							<div class="meta mb-1"><span class="date">Published 3 months ago</span><span class="time">3 min read</span><span class="comment"><a href="#">26 comments</a></span></div>
							<div class="intro">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies...</div>
							<a class="more-link" href="post.php">Read more &rarr;</a>
						</div>
						<!--//media-body-->
					</div>
					<!--//media-->
				</div>
				<!--//item-->

				<div class="item mb-5">
					<div class="media">
						<img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="assets/images/blog/blog-post-thumb-3.jpg" alt="image">
						<div class="media-body">
							<h3 class="title mb-1"><a href="post.php">High Performance JavaScript</a></h3>
							<div class="meta mb-1"><span class="date">Published 1 month ago</span><span class="time">8 min read</span><span class="comment"><a href="#">12 comments</a></span></div>
							<div class="intro"><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis </p>natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies...</div>
							<a class="more-link" href="post.php">Read more &rarr;</a>
						</div>
						<!--//media-body-->
					</div>
					<!--//media-->
				</div>
				<!--//item-->
				<div class="item mb-5">
					<div class="media">
						<img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="assets/images/blog/blog-post-thumb-4.jpg" alt="image">
						<div class="media-body">
							<h3 class="title mb-1"><a href="post.php">Top 5 JavaScript Frameworks</a></h3>
							<div class="meta mb-1"><span class="date">Published 2 months ago</span><span class="time">15 min read</span><span class="comment"><a href="#">3 comments</a></span></div>
							<div class="intro">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies...</div>
							<a class="more-link" href="post.php">Read more &rarr;</a>
						</div>
						<!--//media-body-->
					</div>
					<!--//media-->
				</div>
				<!--//item-->

				<div class="item mb-5">
					<div class="media">
						<img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="assets/images/blog/blog-post-thumb-5.jpg" alt="image">
						<div class="media-body">
							<h3 class="title mb-1"><a href="post.php">Learn React in 24 Hours</a></h3>
							<div class="meta mb-1"><span class="date">Published 2 months ago</span><span class="time">10 min read</span><span class="comment"><a href="#">23 comments</a></span></div>
							<div class="intro">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies...</div>
							<a class="more-link" href="post.php">Read more &rarr;</a>
						</div>
						<!--//media-body-->
					</div>
					<!--//media-->
				</div>
				<!--//item-->

				<div class="item">
					<div class="media">
						<img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="assets/images/blog/blog-post-thumb-6.jpg" alt="image">
						<div class="media-body">
							<h3 class="title mb-1"><a href="post.php">About Remote Working</a></h3>
							<div class="meta mb-1"><span class="date">Published 3 months ago</span><span class="time">2 min read</span><span class="comment"><a href="#">1 comment</a></span></div>
							<div class="intro">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies...</div>
							<a class="more-link" href="post.php">Read more &rarr;</a>
						</div>
						<!--//media-body-->
					</div>
					<!--//media-->
				</div>
				<!--//item-->

				<nav class="blog-nav nav nav-justified my-5">
					<a class="nav-link-prev nav-item nav-link d-none rounded-left" href="#">Previous<i class="arrow-prev fas fa-long-arrow-alt-left"></i></a>
					<a class="nav-link-next nav-item nav-link rounded" href="blog-list.php">Next<i class="arrow-next fas fa-long-arrow-alt-right"></i></a>
				</nav>

			</div>
		</section>

		<footer class="footer text-center py-2 theme-bg-dark">
			<?php
			require_once('includes/footer.php');
			?>
		</footer>

	</div>
	<!--//main-wrapper-->

	<!-- Javascript -->
	<?php
	require_once('includes/js.php');
	?>

	<?php
	//require_once('includes/styleswitch.php')
	?>


</body>

</html>