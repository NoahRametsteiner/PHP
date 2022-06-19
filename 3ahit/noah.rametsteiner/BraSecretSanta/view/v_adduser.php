<?php require 'inc/header.php' ?>
<div class="container">
	<div class="row">
		<div class="col-md-offset-3 col-md-6 col-sm-6 col-xs-12 form-box">
			<h1 class="text-center">Secret Santa</h1> <hr>
			<form class="form-horizontal" role="form" action="../controller/c_saveUsers.php" name="formAddUsers" method="POST">
                <div class="after-add-more">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3" for="partname">Name:</label>
                        <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" id="partname" name="realname[]" placeholder="Enter Name">
                        </div>
				    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3" for="email">Email:</label>
                        <div class="col-md-8 col-sm-8 col-xs-8">
                            <div class="input-group control-group">
                                <input type="text" name="email[]" id="email" class="form-control" placeholder="Enter Email">
                                <div class="input-group-btn">
                                    <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="copy hide">
                    <div class="control-group">
                    <div class="form-group"  style="margin-top:10px">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3" for="partname">Name:</label>
                        <div class="col-md-8 col-sm-8 col-xs-8">
                            <input type="text" class="form-control" id="partname" name="realname[]" placeholder="Enter Other Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3" for="email">Email:</label>
                        <div class="col-md-8 col-sm-8 col-xs-8">
                            <div class="input-group">
                                <input type="text" name="email[]" id="email" class="form-control" placeholder="Enter Other Email">
                                <div class="input-group-btn">
                                    <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
				</div>
				<hr>
		        <div class="form-group">
					<div class="col-md-6 col-sm-6 col-xs-6 col-md-offset-3 col-sm-offset-3 col-xs-offset-3 text-center">
						<button type="submit" class="btn btn-success btn-block submit" name="buttonAddUsers">Submit</button>
					</div>
				</div>
		    </form>
		</div>
	</div>
</div>
<?php require 'inc/footer.php' ?>