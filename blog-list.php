<?php
require_once "admin/config/connect.php";
require_once "admin/functions/functions.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Meta -->
	<title>TA TECH BLOG LATEST POSTS</title>
	<meta name="description" content="<?= 'Tech Acoustic Tech Blog' ?>">
	<!-- <meta property='og:title' content="TATB LATEST POSTS"> -->
	<meta property='og:url' content="https://techac.net/tatb/blog-list.php?pag=<?= $_GET['pag'] ?>">
	<meta property='og:image' itemprop="image" content="https://techac.net/tatb/assets/images/mike.jpg">
	<!-- <meta property='og:image' itemprop="image" content="<?= 'https://techac.net/tatb/blog_image/' . getPostImage($_GET['id']) ?>"> -->
	<meta property='keywords' content="Tech Acoustic, TA, TATB, Tech Blog, Tech, Science, Computers">
	<!-- <meta property='og:locale' content="">
	<meta property='og:type' content=""> -->

	<?php
	require_once('includes/head.php');
	?>
</head>

<style>
	.media-body {
		/* background-color: black; */
		/* overflow:auto; */
		line-break: auto;
	}
</style>

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
				<div>
					<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8230887621285431" crossorigin="anonymous"></script>
					<!-- general horizontal -->
					<ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-8230887621285431" data-ad-slot="3304178043" data-ad-format="auto" data-full-width-responsive="true"></ins>
					<script>
						(adsbygoogle = window.adsbygoogle || []).push({});
					</script>
				</div>

				<?php
				if (isset($_POST['submit'])) {
					advancedPostSearch($_POST);
				} else {

					if (isset($_GET['pag'])) {
						loadBlogPosts(1, $_GET['pag']);
					} else {
						loadBlogPosts(1, 10);
					}
				} //end of if statement for search
				?>

				<div>
					<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8230887621285431" crossorigin="anonymous"></script>
					<!-- general horizontal -->
					<ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-8230887621285431" data-ad-slot="3304178043" data-ad-format="auto" data-full-width-responsive="true"></ins>
					<script>
						(adsbygoogle = window.adsbygoogle || []).push({});
					</script>
				</div>

				
				<?php if (!isset($_POST['submit'])) { //if the search buttonb has been clicked, dont show this nav ?>
				<nav class="blog-nav nav nav-justified my-5">
					<?php
					if ($_GET['pag'] > 10) {
					?>
						<a class="nav-link-prev nav-item nav-link rounded-left" href="blog-list.php?pag=<?= $_GET['pag'] - 10 ?>">Previous<i class="arrow-prev fas fa-long-arrow-alt-left"></i></a>
					<?php } ?>

					<?php
					if (loadPostCount() > $_GET['pag']) {
					?>

						<a class="nav-link-next nav-item nav-link rounded-right" href="blog-list.php?pag=<?= $_GET['pag'] + 10 ?>">Next<i class="arrow-next fas fa-long-arrow-alt-right"></i></a>
					<?php } ?>
				</nav>
				<?php }?>

				<div>
					<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8230887621285431" crossorigin="anonymous"></script>
					<!-- general horizontal -->
					<ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-8230887621285431" data-ad-slot="3304178043" data-ad-format="auto" data-full-width-responsive="true"></ins>
					<script>
						(adsbygoogle = window.adsbygoogle || []).push({});
					</script>
				</div>
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