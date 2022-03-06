<div class="container">
	<form action="<?php echo URL . 'update/movie/' . $this->movie[0]->id ?>" method="POST" class="form-horizontal" role="form">
			<div class="form-group form-group-lg">
				<label class="col-xs-2 control-label">Title</label>
				<div class="col-xs-14">
					<input name="title" type="text" class="form-control" value="<?php echo $this->movie[0]->title ?>">
				</div>
			</div>

			<div class="form-group form-group-lg">
				<label class="col-xs-2 control-label">Path</label>
				<div class="col-xs-14">
					<input name="path" type="text" class="form-control" value="<?php echo "https://www.youtube.com/watch?v=" . $this->movie[0]->path ?>">
				</div>
			</div>

			<div class="form-group form-group-lg">
				<div class="col-xs-offset-2 col-xs-14">
					<div class="checkbox">
						<label>
							<input name="favorite" type="checkbox" <?php if( $this->movie[0]->favorite == 'true' ) echo 'checked' ?>>
							Favorite
						</label>
					</div>
				</div>
				
			</div>
			<input type="hidden" name="csrf" value="<?php echo CSRF::set() ?>">
			<div class="form-group">
				<div class="col-sm-16">
					<button type="submit" class="btn btn-primary pull-right">Submit</button>
				</div>
			</div>
	</form>
</div>