<?php
PageUtil::addVar("title","index");
?>

 <!-- Header -->
<header style="background-image:url(<?=$imagepath?>/placeholders/1280x1024/12.jpg);">

	<div class="container_12">

		<!-- Title and navigation panel -->
		<div id="panel" class="grid_12">

			<!-- Title -->
			<h1><a href="index.html">Travel</a></h1>

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
						<a href="blog.html">Blog</a>
						<ul>
							<li><a href="blog.html">Blog</a></li>
							<li><a href="blogpost.html">Blogpost</a></li>
						</ul>
					</li>
					<li>
						<a href="contact.html">Contact</a>
					</li>
				</ul>

				<!-- Search -->
				<form action="#" class="black">
					<input name="search" type="text" placeholder="Search..." />
					<input type="submit" />
				</form>
			</nav>
		
		</div>

	</div>
	
	<!-- Slider navigation -->
	<nav class="slider_nav">
		<a href="#" class="left">&nbsp;</a>
		<a href="#" class="right">&nbsp;</a>
	</nav>

	<!-- Slider -->
	<div class="slider_wrapper">

		<!-- Slider content -->
		<ul class="homepage_slider">

			<!-- First slide -->
			<li>
				<h2><a href="trip.html">The Indonesia Expedition from <strong>799 €</strong></a></h2>
				<p>Ubud, Uluwatu, Batur, Besakih and Tenganan</p>
			</li>

			<!-- Second slide -->
			<li>
				<h2><a href="hotel.html">A wonderful week in Singapore from <strong>999 €</strong></a></h2>
				<p>With accomodation in Marina Bay Sands</p>
			</li>

		</ul>

		<div class="clearfix"></div>
	</div>
	
</header>

<!-- Main content -->
<div class="container_12">

	<!-- Recommended trips -->
	<ul class="results">

		<li class="short grid_3">
			<a href="hotel.html"><img src="<?=$imagepath?>/placeholders/220x100/8.jpg" alt="" /></a>
			<h3><a href="hotel.html">Marina Bay Sands</a></h3>
			<span class="stars">
				<img src="<?=$imagepath?>/star_full.png" alt="" />
				<img src="<?=$imagepath?>/star_full.png" alt="" />
				<img src="<?=$imagepath?>/star_full.png" alt="" />
				<img src="<?=$imagepath?>/star_half.png" alt="" />
				<img src="<?=$imagepath?>/star_empty.png" alt="" />
			</span>
			<div>
				<span><a href="#">Singapore</a></span>
				<span><strong>1 899 €</strong> / 10 days</span>
			</div>
		</li>

		<li class="short grid_3">
			<a href="hotel.html"><img src="<?=$imagepath?>/placeholders/220x100/9.jpg" alt="" /></a>
			<h3><a href="hotel.html">Hotel Palma</a></h3>
			<span class="stars">
				<img src="<?=$imagepath?>/star_full.png" alt="" />
				<img src="<?=$imagepath?>/star_full.png" alt="" />
				<img src="<?=$imagepath?>/star_full.png" alt="" />
				<img src="<?=$imagepath?>/star_half.png" alt="" />
				<img src="<?=$imagepath?>/star_empty.png" alt="" />
			</span>
			<div>
				<span><a href="#">Mallorca</a></span>
				<span><strong>1 899 €</strong> / 10 days</span>
			</div>
		</li>

		<li class="short grid_3">
			<a href="hotel.html"><img src="<?=$imagepath?>/placeholders/220x100/13.jpg" alt="" /></a>
			<h3><a href="hotel.html">Holiday Inn</a></h3>
			<span class="stars">
				<img src="<?=$imagepath?>/star_full.png" alt="" />
				<img src="<?=$imagepath?>/star_full.png" alt="" />
				<img src="<?=$imagepath?>/star_full.png" alt="" />
				<img src="<?=$imagepath?>/star_half.png" alt="" />
				<img src="<?=$imagepath?>/star_empty.png" alt="" />
			</span>
			<div>
				<span><a href="#">Cannes</a></span>
				<span><strong>1 899 €</strong> / 10 days</span>
			</div>
		</li>

		<li class="short grid_3">
			<a href="hotel.html"><img src="<?=$imagepath?>/placeholders/220x100/14.jpg" alt="" /></a>
			<h3><a href="hotel.html">Hotel Grand</a></h3>
			<span class="stars">
				<img src="<?=$imagepath?>/star_full.png" alt="" />
				<img src="<?=$imagepath?>/star_full.png" alt="" />
				<img src="<?=$imagepath?>/star_full.png" alt="" />
				<img src="<?=$imagepath?>/star_half.png" alt="" />
				<img src="<?=$imagepath?>/star_half.png" alt="" />
			</span>
			<div>
				<span><a href="#">Singapore</a></span>
				<span><strong>1 899 €</strong> / 10 days</span>
			</div>
		</li>

	</ul>

	<div class="clearfix"></div>
	<hr class="dashed grid_12" />


	<!-- Search form and last minute -->
	<section class="search_lm grid_12">
	
		<!-- Ticket search form -->
		<section class="search sidebar">

			<h2>
				<span data-form="find_trip" class="selected">Find a trip</span>
				<span data-form="find_hotel">Find a hotel</span>
				<span data-form="tickets">Tickets</span>
			</h2>

			<!-- Find a trip form -->
			<form action="#" data-form="find_trip" class="black">

				<label>Destination</label>
				<input type="text" name="destination" value="All" />

				<div class="half">
					<label>Transportation</label>
					<input type="text" name="transportation" value="Plane" />
				</div>

				<div class="half last">
					<label>Date</label>
					<input type="text" name="date" class="date" value="11/23/2011" />
				</div>

				<div class="half">
					<label>Guests</label>
					<input type="text" name="guests" value="2" />		
				</div>

				<div class="half last">
					<label>Rooms</label>
					<input type="text" name="rooms" value="1" />		
				</div>

				<input type="submit" value="Search">

			</form>

			<!-- Find a hotel form -->
			<form action="#" data-form="find_hotel" class="black" style="display:none;">

				<label>Destination</label>
				<input type="text" name="destination" value="All" />

				<div class="half">
					<label>Check in</label>
					<input type="text" name="check_in" class="date" value="11/23/2011" />
				</div>

				<div class="half last">
					<label>Check out</label>
					<input type="text" name="check_out" class="date" value="11/23/2011" />
				</div>

				<div class="half">
					<label>Guests</label>
					<input type="text" name="guests" value="2" />		
				</div>

				<div class="half last">
					<label>Rooms</label>
					<input type="text" name="rooms" value="1" />		
				</div>

				<input type="submit" value="Search">

			</form>

			<!-- Tickets form -->
			<form action="#" data-form="tickets" class="black" style="display:none;">
				
				<div class="half">
					<label>From</label>
					<input type="text" name="from" value="JFK" />	
				</div>

				<div class="half last">
					<label>To</label>
					<input type="text" name="to" value="SFO" />		
				</div>

				<div class="half">
					<label>Leaving date</label>
					<input type="text" name="leaving-date" class="date" value="11/23/2011" />
				</div>

				<div class="half last">
					<label>Return date</label>
					<input type="text" name="return-date" class="date" value="11/23/2011" />
				</div>

				<div class="half">
					<label>Adults</label>
					<input type="text" name="adults" value="2" />		
				</div>

				<div class="half last">
					<label>Children</label>
					<input type="text" name="children" value="0" />		
				</div>

				<input type="submit" value="Search">

			</form>
		</section>

		<!-- Last minute -->
		<section class="last_minute">
			<table>
				<tr class="header">
					<th>Destination</th>
					<th>Hotel</th>
					<th>Departure</th>
					<th>Length</th>
					<th>Price</th>
				</tr>
				<tr>
					<td><a href="browse.html">Spain</a></td>
					<td>Hotel Grand 5*</td>
					<td>13 Oct - 25 Oct</td>
					<td>12 nights</td>
					<td><del>1 099 €</del> 899 €</td>
				</tr>
				<tr>
					<td><a href="browse.html">Greece</a></td>
					<td>Hotel Palma 4*</td>
					<td>15 Oct - 25 Oct</td>
					<td>10 nights</td>
					<td><del>1 099 €</del> 749 €</td>
				</tr>
				<tr>
					<td><a href="browse.html">Italy</a></td>
					<td>Holiday Inn 4*</td>
					<td>15 Oct - 25 Oct</td>
					<td>10 nights</td>
					<td><del>1 099 €</del> 799 €</td>
				</tr>
				<tr>
					<td><a href="browse.html">Egypt</a></td>
					<td>Beach Resort 5*</td>
					<td>18 Oct - 28 Oct</td>
					<td>9 nights</td>
					<td><del>1 099 €</del> 799 €</td>
				</tr>
				<tr>
					<td><a href="browse.html">United Kingdom</a></td>
					<td>Spa & Golf Resort 4*</td>
					<td>18 Oct - 28 Oct</td>
					<td>9 nights</td>
					<td><del>1 099 €</del> 749 €</td>
				</tr>
				<tr>
					<td><a href="browse.html">Thailand</a></td>
					<td>Welness Resort 5*</td>
					<td>20 Oct - 29 Oct</td>
					<td>9 nights</td>
					<td><del>1 099 €</del> 849 €</td>
				</tr>
				<tr>
					<td><a href="browse.html">Spain</a></td>
					<td>Hotel Grand 5*</td>
					<td>25 Oct - 05 Nov</td>
					<td>11 nights</td>
					<td><del>1 099 €</del> 899 €</td>
				</tr>
			</table>
		</section>

	</section>

	<div class="clearfix"></div>
	<hr class="dashed grid_12" />

	<!-- Latest blog articles -->
	<section class="latest_articles">
		
		<article class="grid_4">
			<a href="blogpost.html"><img src="<?=$imagepath?>/placeholders/300x100/1.jpg" alt="" /></a>
			<h2><a href="blogpost.html">Around the world</a></h2>
			<div class="info">
				by <strong>John Doe</strong>
				<img src="<?=$imagepath?>/hseparator.png" alt="" />
				<strong>8</strong> comments
				<img src="<?=$imagepath?>/hseparator.png" alt="" />
				<strong>Nov 04</strong>
			</div>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam interdum nunc at mauris condimentum rhoncus. Proin fermentum ligula vitae elit laoreet a ullamcorper lorem cursus. Suspendisse malesuada nisl nec magna fringilla ornare. Clabel urabitur molestie ligula a urna hendrerit quis porttitor enim ornare.</p>
		</article>

		<article class="grid_4">
			<a href="blogpost.html"><img src="<?=$imagepath?>/placeholders/300x100/3.jpg" alt="" /></a>
			<h2><a href="blogpost.html">Letters from Africa</a></h2>
			<div class="info">
				by <strong>John Doe</strong>
				<img src="<?=$imagepath?>/hseparator.png" alt="" />
				<strong>8</strong> comments
				<img src="<?=$imagepath?>/hseparator.png" alt="" />
				<strong>Sep 16</strong>
			</div>
			<p>Proin fermentum ligula vitae elit laoreet a ullamcorper lorem cursus. Suspendisse malesuada nisl nec magna fringilla ornare. Curabitur molestie ligula a urna hendrerit quis porttitor enim ornare. Nullam leo enim, sollicitudin semper venenatis at, aliquet et nisi. Aliquam placerat aliquet feugiat. Curabitur molestie ligula.</p>
		</article>

		<article class="grid_4">
			<a href="blogpost.html"><img src="<?=$imagepath?>/placeholders/300x100/4.jpg" alt="" /></a>
			<h2><a href="blogpost.html">Wonders of Indonesia</a></h2>
			<div class="info">
				by <strong>John Doe</strong>
				<img src="<?=$imagepath?>/hseparator.png" alt="" />
				<strong>8</strong> comments
				<img src="<?=$imagepath?>/hseparator.png" alt="" />
				<strong>Aug 15</strong>
			</div>
			<p>Nullam interdum nunc at mauris condimentum rhoncus. Proin fermentum ligula vitae elit laoreet a ullamcorper lorem cursus. Suspendisse malesuada nisl nec magna fringilla ornare. Curabitur molestie ligula a urna hendrerit quis porttitor enim ornare. Nullam leo enim, sollicitudin semper venenatis at, aliquet et nisi.</p>
		</article>

	</section>
	
</div> 
 
 	<!-- Footer -->
	<footer><div class="container_12">
		
		<nav class="grid_8">
			<a href="#">Home</a>
			<a href="#">Catalogue</a>
			<a href="#">Blog</a>
			<a href="#">Contact</a>
			<a href="#">FAQ</a>
		</nav>

		<p class="address grid_4">
			<strong>Travel Agency Inc.</strong><br />
			<span>123 Wall Street , New York</span><br />
			<span><a href="mailto:contact@travelagency.com">contact@travelagency.com</a></span>
		</p>

		<p class="copyright grid_8">
			© 2011 Travel Agency
		</p>

	</div></footer>


	<!-- Google Analytics -->
	<script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-XXXXXXX-X']); // Set your Google Analytics ID here
		_gaq.push(['_trackPageview']);

		(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>