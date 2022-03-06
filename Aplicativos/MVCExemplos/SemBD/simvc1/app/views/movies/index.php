<div class="container">
	<a href="<?php echo URL . 'movies/add' ?>" class="btn btn-lg btn-default pull-right">Add Movie</a>
	<div class="clearfix">
	</div>
	<h3 class="text-right"><em>Result: <?php echo $this->moviesNum ?> Movies</em></h3>
	<ul class="list-group">
		<?php for($i = 0; $i < $this->moviesNum; $i++): ?>
		<li class="list-group-item">
			<div class="col-xs-5">
				<h2><?php if( $this->movies[$i]->favorite == 'true' ): ?><span class="glyphicon glyphicon-star"></span><?php endif;?> <?php echo $this->movies[$i]->title ?></h2>
				<h3><a href="<?php echo URL . 'movies/edit/' . $this->movies[$i]->id ?>">Edit</a></h3>
				<h3><a href="<?php echo URL . 'delete/movie/' . $this->movies[$i]->id ?>">Delete</a></h3>
			</div>
			<div class="embed-responsive embed-responsive-16by9">
				<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $this->movies[$i]->path ?>" frameborder="0" allowfullscreen></iframe>
			</div>
		</li>
		<?php endfor; ?>
	</ul>
</div>