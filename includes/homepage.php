<?php 
    require_once 'header.php';
?>
<div class="home-container">
	<div class="home-portfolio">
		<h3 class="home-portfolio-title">Portfolio</h3>
		<i class="fas fa-cog home-icon"></i>
		<table class="table-hover">
			<thead>
				<tr>
					<th>Ticker</th>
					<th>Company</th>
					<th>Shares</th>
					<th>Price</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>APPL</td>
					<td>Apple Inc</td>
					<td>10</td>
					<td>$154.3</td>
				</tr>
				<tr>
					<td>APPL</td>
					<td>Apple Inc</td>
					<td>10</td>
					<td>$154.3</td>
				</tr>
				<tr>
					<td>APPL</td>
					<td>Apple Inc</td>
					<td>10</td>
					<td>$154.3</td>
				</tr>
				<tr>
					<td>APPL</td>
					<td>Apple Inc</td>
					<td>10</td>
					<td>$154.3</td>
				</tr>
				<tr>
					<td>APPL</td>
					<td>Apple Inc</td>
					<td>10</td>
					<td>$154.3</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="home-status">
		<h2>Recent Status</h2>

		<!-- USER RECENT POST -->
		<div class="card">
			<div class="card-body">
				<h5 class="card-title">Enrina Wilms</h5>
				<h6 class="card-subtitle mb-2 text-muted">March 15, 2019</h6>
				<p class="card-text">This is where my status post will show up about stock market</p>

				<!-- CREATE POST STAUS MODAL -->
				<!-- Button trigger modal -->
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
					Post Status
				</button>

				<!-- Modal -->
				<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<!-- STATUS FORM -->
								<div class="form-group">
									<label class="control-label" for="content-post">Post Status</label>
									<form>
										<div>
											<textarea class="form-control" id="content-post" name="content-post">enter your status here</textarea>
										</div>
										<div class="col-md-4">
											<br/>
											<input type="submit" id="submit" name="submit" class="btn btn-primary">
										</div>
									</form>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
				<!-- comments -->
				<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
					Comments
				</button>
			</div>
		</div>
		<div class="collapse" id="collapseExample">
			<div class="card card-body">
				<!--FORM FOR COMMENTS-->
				<form>
					<div class="form-group">
						<input type="text" class="form-control" id="comment" aria-describedby="commentHelp" placeholder="Enter your ocmment here">
					</div>
					<!--					<button type="submit" class="btn btn-primary">Submit</button>-->
				</form>
				<!--LIST OF COMMENTS HERE-->
				<ul class="list-unstyled w-100">
					<li class="media">
						<img class="mr-3" src="../images/default.png" width="60px" alt="Generic placeholder image">
						<div class="media-body">
							<h5 class="mt-0 mb-1">Kennetch Mendoza</h5>
							<h6 class="mt-0 mb-1">March 15, 2019</h6>
							<p>This is where kenneth comments will show.!</p>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<!--
		<div class="card my-4">
			<div class="card-body">
				<form class="form-horizontal">
					<fieldset>

						 Textarea 
						<div class="form-group">
							<label class="control-label" for="content-post">Post Status</label>
							<div>
								<textarea class="form-control" id="content-post" name="content-post">enter your status here</textarea>
							</div>
								<input type="submit" id="submit" name="submit" class="btn btn-primary">
						</div>

					</fieldset>
				</form>
			</div>
		</div>
-->

	</div>
	<div class="home-watchlist">
		<h3 class="home-portfolio-title">Watchlist</h3>
		<i class="fas fa-cog home-icon"></i>
		<table>
			<thead>
				<tr>
					<th>Ticker</th>
					<th>Company</th>
					<th>Price</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>APPL</td>
					<td>Apple Inc</td>
					<td>$154.3</td>
				</tr>
				<tr>
					<td>APPL</td>
					<td>Apple Inc</td>
					<td>$154.3</td>
				</tr>
				<tr>
					<td>APPL</td>
					<td>Apple Inc</td>
					<td>$154.3</td>
				</tr>
				<tr>
					<td>APPL</td>
					<td>Apple Inc</td>
					<td>$154.3</td>
				</tr>
				<tr>
					<td>APPL</td>
					<td>Apple Inc</td>
					<td>$154.3</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<?php 
    include 'footer.php';
?>