<?php
require_once "admin/config/connect.php";
require_once "admin/functions/functions.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>TA TECH BLOG HOME PAGE</title>
	<meta name="description" content="<?= 'Tech Blog' ?>">
	<meta property='og:title' content="TATB">
	<meta property='og:url' content="<?= $_SERVER['PHP_SELF'] ?>">
	<!-- <meta property='og:description' content="Tech Blog"> -->
	<!-- <meta property='og:image' itemprop="image" content="<?= 'blog_image/' . getPostImage($_GET['id']) ?>"> -->
	<meta property='keywords' content="Tech Acoustic, TA, TATB, Tech Blog, Tech, Science, Computers">
	<!-- <meta property='og:locale' content="">
	<meta property='og:type' content=""> -->

	<!-- Meta -->
	<meta name="author" content="Orji Michael Chukwuebuka at Tech Acoustic">
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
				if (!isset($_GET['pag'])) {
					loadBlogPosts(null, 10);
				} else {
					loadBlogPosts(null, $_GET['pag']);
				}
				?>
				<!-- <div class="item mb-5">
					<div class="media">
						<img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="assets/images/blog/blog-post-thumb-1.jpg" alt="image">
						<div class="media-body">
							<h3 class="title mb-1"><a href="post.php">Why Every Developer Should Have A Blog</a></h3>
							<div class="meta mb-1"><span class="date">Published 2 days ago</span><span class="time">5 min read</span><span class="comment"><a href="#">8 comments</a></span></div>
							<div class="intro">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies...</div>
							<a class="more-link" href="post.php">Read more &rarr;</a>
						</div>
						media-body
					</div>
					media
				</div>
				//item -->

				<nav class="blog-nav nav nav-justified my-5">
					<?php
					//This section checks the total post count and determines if to show next or previous or both
					//Previous
					if (isset($_GET['pag'])) {

						//if the pagination variable is less than or equals to 10, this means we cant go back so no previous button is shown
						if ($_GET['pag'] <= 10) {
						} else { ?>
							<a class="nav-link-prev nav-item nav-link rounded-left" href="index.php?pag=<?= $_GET['pag'] - 10 ?>">Previous<i class="arrow-prev fas fa-long-arrow-alt-left"></i></a>
						<?php } ?>


						<?php
						//Next
						//if total post count is greater than pagination variable, then show next button
						if (loadPostCount() > $_GET['pag']) {
						?>
							<a class="nav-link-next nav-item nav-link rounded-right" href="index.php?pag=<?php echo $_GET['pag'] + 10; ?>">Next<i class="arrow-next fas fa-long-arrow-alt-right"></i></a>
						<?php } else {
							//Default next button
						?>
						<?php }
					} else { ?>
						<a class="nav-link-next nav-item nav-link rounded-right" href="index.php?pag=20">Next<i class="arrow-next fas fa-long-arrow-alt-right"></i></a>
					<?php } ?>
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