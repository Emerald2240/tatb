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

				<?php
				loadBlogPosts(1, $_GET['pag']);
				?>

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