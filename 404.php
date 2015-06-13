<?php get_header(); ?>
	
	<!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <h1 class="text-center">Opps! Looks like the page is missing.</h1>

                <p>
                	The page you requested could not be found. Please try another page or search below.
                </p>

                <div class="row">
                	
                	<div class="col-xs-12">
                		<form action="<?php echo home_url(); ?>" method="get" novalidate>
                		<div class="input-group">
					    	<span class="input-group-btn">
					    		<input value="Search" class="btn btn-default" type="submit">
					    	</span>
					    	<input type="text" class="form-control" name="s" style="padding: 25px;" placeholder="Search for...">
					    </div><!-- /input-group -->
					    </form>
                	</div>

                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>