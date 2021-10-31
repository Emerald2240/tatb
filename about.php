<?php
require_once "admin/config/connect.php";
require_once "admin/functions/functions.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>TA Tech Blog</title>

	<!-- Meta -->
	<title>ABOUT TA TECH BLOG</title>
	<meta name="description" content="<?= 'Tech Acoustic Tech Blog' ?>">
	<!-- <meta property='og:title' content="ABOUT ORJI MICHAEL"> -->
	<meta property='og:url' content="https://techac.net/tatb/about.php">
	<meta property='og:image' itemprop="image" content="https://techac.net/tatb/assets/images/mike.jpg">
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

		<article class="about-section py-5">
			<div class="container">
				<h2 class="title mb-3">About Me</h2>

				<p>I'm a guy trying to live my best life through a career in programming. I started using computers
					since i was 8 and since then have been very passionate about it</p>
				<p>I love playing video games, sports, Watching action movies, Petting animals, the great outdoors...</p>
				<p>I studied Computer Engineering at Enugu State University of Science and Technology(ESUT). I started proffessional programming in 2018 and currently have experience in over 7 programming languages, frameworks and API's....</p>
				<figure><img class="img-fluid" src="assets/images/about-me.jpg" alt="image"></figure>
				<h5 class="mt-5">About The Blog</h5>
				<p>The blog was made from the need for tech and tech concepts to be understood by all, not just a select few. I do my best to break down tech topics as a way to educate others and learn as well.</p>
				<h5 class="mt-5">My Skills and Experiences</h5>
				<p> I'm a fullstack developer and freelancer. Since i started learning to code seriously in 2018 i've built multiple desktop apps, android apps, websites, blogs and hybrids projects for numerous clients.<br>
					I've always had a knack for writing and english but it took until recently for me to start using it for the service of others. I currently own a blog and do some writing on my social media every now and then. I tutor students on web development and computer engineering as well in my state for a fee.<br>
					I am also a student of Computer Engineering ESUT, a University based in Nigeria. At the time of writing this i'm in my final year.<br>
					I'm also a computer hardware specialist, having lots of knowledge on the different parts of the computer and replacing/fixing them if necessary with extensive knowledge in software installation and troubleshooting as well.

					<h5 class="mt-5">Side Projects</h5>
					<a target="_blank" href="https://Techac.net/apps">TA List</a>
					<p>An android app used for creating lists.</P>
					<!-- <p><strong>Java | Android Studio</strong></P> -->

					<a target="_blank" href="https://Techac.net/tapq">TA Past Questions, ESUT</a>
					<p>Records past exam questions and incorporates database functions with them, so as to make it easier for students to prepare.</p>
					<!-- <p><strong>PHP | HTML5 | CSS3 | JavaScript | Bootstrap | JQuery | MySQL</strong></p> -->

					<a target="_blank" href="https://techac.net/tatb">Tech Blog</a>
					<p>I discuss the most useful topics relating to technology. Our aim is to make tech and tech concepts easy for everyone to understand.</p>
					<!-- <p><strong>PHP | HTML5 | CSS3 | JavaScript | Bootstrap | JQuery | MySQL</strong></p> -->

					<a target="_blank" href="https://techac.net/tats">TA Tech Store</a>
					<p>An online store for tech products and gadgets at very cheap prices (in progress).</p>
					<!-- <p><strong>PHP | HTML5 | CSS3 | JavaScript | Bootstrap | JQuery | MySQL</strong></p> -->
					<p>For more projects checkout my: <a target="_blank" href="https://techac.net/p">Portfolio<i class="fab fa-github-alt fa-fw"></i></a></p>


					<!-- <figure><a href="https://made4dev.com"><img class="img-fluid" src="assets/images/promo-banner.jpg" alt="image"></a></figure> -->
			</div>
		</article>
		<!--//about-section-->

		<section class="cta-section theme-bg-light py-5">

			<?php
			require_once('includes/topbar.php')
			?>
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