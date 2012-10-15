<section class="blogpost grid_12">
<h2>Post Added</h2>
<p>Add Post Success <a href="<?php echo base_url("/post/add"); ?>">Click Here</a> to add anothor post.</p>
<?php echo redirect(base_url("post/create/".$post_data['id']));?>
</section>