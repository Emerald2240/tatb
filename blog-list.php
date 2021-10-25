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
			require_once('includes/searchbar.php')
			?>
		</section>

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
						</div>
						<!--//media-body-->
					</div>
					<!--//media-->
				</div>
				<!-- item body end -->
				
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