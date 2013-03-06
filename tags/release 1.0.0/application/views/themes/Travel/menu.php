<?php
?>
		<!-- Title and navigation panel -->
		<div id="panel" class="grid_12">

			<!-- Title -->
			<h1><a href="index.html">UASTravel</a></h1>

			<!-- Navigation -->
			<nav>
				<ul>
					<li>
						<a href="browse.html">Browse</a>
						<ul>	
							<li><a href="browse.html">Browse all</a></li>
							<li><a href="browse_hotels.html">Browse hotels</a></li>
							<li><a href="hotel.html">Hotel</a></li>
							<li><a href="trip.html">Trip</a></li>
						</ul>
					</li>
					<li>
						<a href="faq.html">Pages</a>
						<ul>
							<li><a href="faq.html">FAQ</a></li>
							<li><a href="forms.html">Forms</a></li>
						</ul>
					</li>
					<li>
						<a href="blog.html" class="selected">Blog</a>
						<ul>
							<li><a href="blog.html">Blog</a></li>
							<li><a href="blogpost.html" class="selected">Blogpost</a></li>
						</ul>
					</li>
					<li>
						<a href="contact.html">Contact</a>
					</li>
				</ul>

				<!-- Search -->
				<form method="post" action="<?php echo base_url(uri_string());?>" class="black">
					<input name="search" type="text" placeholder="Search..." />
					<input type="submit" />
				</form>
			</nav>
		
		</div>
