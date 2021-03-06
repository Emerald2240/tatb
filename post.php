<?php
require_once "admin/config/connect.php";
require_once "admin/functions/functions.php";
addCount($_GET['id']);
//$created = getPostDate($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title><?= strtoupper(str_replace("-", " ", $_GET['title'])) ?></title>
	<meta name="description" content="<?= 'TATB Blog Post' ?>">
	<meta property='og:url' content="<?= 'https://techac.net/tatb/post.php' . '?id=' . $_GET['id'] . '&title=' . $_GET['title'] ?>;">
	<meta property='og:image' content="https://techac.net/tatb/blog_images/<?= getPostImage($_GET['id']) ?>">
	<meta property='keywords' content="<?= loadKeywords($_GET['id']) ?>">
	<!-- <meta property='og:locale' content="">
	<meta property='og:type' content=""> -->

	<!-- Meta -->

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

		<article class="blog-post px-3 py-5 p-md-5">
			<div class="container">
				<header class="blog-post-header">
					<h2 class="title mb-2"><?= strtoupper(str_replace("-", " ", $_GET['title'])) ?></h2>
					<div class="meta mb-3">
						<span class="date"><?= loadBlogPostTimeDetails(getPostDate($_GET['id'])) ?> </span>
						<span class="date"><i class="far fa-calendar-alt fa-fw"></i></span>
						<span class="comment"><a href="post.php?id=<?= $_GET['id'] ?>&title=<?= $_GET['title'] ?>#disqus_thread"></a></span>
					</div>

				</header>

				<!-- blog post -->
				<div class="blog-post-body">

					<?php

					loadBlogPost($_GET['id']);

					?>
					<div>
						<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8230887621285431" crossorigin="anonymous"></script>
						<ins class="adsbygoogle" style="display:block; text-align:center;" data-ad-layout="in-article" data-ad-format="fluid" data-ad-client="ca-pub-8230887621285431" data-ad-slot="5837351353"></ins>
						<script>
							(adsbygoogle = window.adsbygoogle || []).push({});
						</script>
					</div>

				</div>
				<!-- blogpost end -->


				<nav class="blog-nav nav nav-justified my-5">

					<?php if (getPrevId($_GET['id']) > 1) { ?>
						<a class="nav-link-prev nav-item nav-link rounded-left" href="<?= $_SERVER['PHP_SELF'] ?>?id=<?= getPrevId($_GET['id']) ?>&title=<?= getPrevTitle($_GET['id']) ?>"><?= ucwords(strtolower(getPostTitle(getPrevId($_GET['id'])))); ?><i class="arrow-prev fas fa-long-arrow-alt-left"></i></a>
					<?php } ?>

					<?php if (getNextId($_GET['id']) > 1) { ?>
						<a class="nav-link-next nav-item nav-link rounded-right" href="<?= $_SERVER['PHP_SELF'] ?>?id=<?= getNextId($_GET['id']) ?>&title=<?= getNextTitle($_GET['id']) ?>"><?= ucwords(strtolower(getPostTitle(getNextId($_GET['id'])))); ?><i class="arrow-next fas fa-long-arrow-alt-right"></i></a>
					<?php } ?>

				</nav>

				<div class="blog-comments-section">
					<div id="disqus_thread"></div>
					<script>
						/**
						 *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT 
						 *  THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR 
						 *  PLATFORM OR CMS.
						 *  
						 *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: 
						 *  https://disqus.com/admin/universalcode/#configuration-variables
						 */

						var disqus_config = function() {
							// Replace PAGE_URL with your page's canonical URL variable
							<?= 'https://techac.net/tatb/post.php' . '?id=' . $_GET['id'] . '&title=' . $_GET['title'] ?>;
							this.page.url = techac.net / tatb / post.php ? id : <?= $_GET['id'] ?>;

							// Replace PAGE_IDENTIFIER with your page's unique identifier variable
							//this.page.identifier = <?= $_GET['id'] ?>;
							this.page.identifier = id;
						};


						(function() { // REQUIRED CONFIGURATION VARIABLE: EDIT THE SHORTNAME BELOW
							var d = document,
								s = d.createElement('script');

							// IMPORTANT: Replace 3wmthemes with your forum shortname!
							s.src = 'https://techac-net-tatb.disqus.com/embed.js';

							s.setAttribute('data-timestamp', +new Date());
							(d.head || d.body).appendChild(s);
						})();
					</script>
					<noscript>
						Please enable JavaScript to view the
						<a href="https://disqus.com/?ref_noscript" rel="nofollow">
							comments powered by Disqus.
						</a>
					</noscript>
				</div>
				<!--//blog-comments-section-->

				<div>
					<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8230887621285431" crossorigin="anonymous"></script>
					<ins class="adsbygoogle" style="display:block; text-align:center;" data-ad-layout="in-article" data-ad-format="fluid" data-ad-client="ca-pub-8230887621285431" data-ad-slot="5837351353"></ins>
					<script>
						(adsbygoogle = window.adsbygoogle || []).push({});
					</script>
				</div>
			</div>
			<!--//container-->
		</article>


		<!--//promo-section-->

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
	<!-- Page Specific JS -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.14.2/highlight.min.js"></script>

	<!-- Custom JS -->
	<script src="assets/js/blog.js"></script>

	<?php
	//require_once('includes/styleswitch.php')
	?>
	<script id="dsq-count-scr" src="//techac-net-tatb.disqus.com/count.js" async></script>

</body>

</html>