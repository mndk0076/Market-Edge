<?php require_once 'header.php'; ?>

<main>
	<!-- Page Content -->
	<div class="container">

		<div class="row">

			<!-- Blog Entries Column -->
			<div class="col-md-9">

				<h1 class="my-4 public-h1">Portfolio</h1>

				<!-- Blog Post -->
				<table class="table table-striped table-dark table-hover">
					<thead>
						<tr>
							<th scope="col">Ticker</th>
							<th scope="col">Company</th>
							<th scope="col">Shares</th>
							<th scope="col">Price</th>
							<th scope="col">Initial Value</th>
							<th scope="col">Market Value</th>
							<th scope="col">P/L</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>APPL</td>
							<td>Apple Inc</td>
							<td>10</td>
							<td>$154.3</td>
							<td>$1000</td>
							<td>$2000</td>
							<td>$1000</td>
						</tr>
						<tr>
							<td>APPL</td>
							<td>Apple Inc</td>
							<td>10</td>
							<td>$154.3</td>
							<td>$1000</td>
							<td>$2000</td>
							<td>$1000</td>
						</tr>
						<tr>
							<td>APPL</td>
							<td>Apple Inc</td>
							<td>10</td>
							<td>$154.3</td>
							<td>$1000</td>
							<td>$2000</td>
							<td>$1000</td>
						</tr>
						<tr>
							<td>APPL</td>
							<td>Apple Inc</td>
							<td>10</td>
							<td>$154.3</td>
							<td>$1000</td>
							<td>$2000</td>
							<td>$1000</td>
						</tr>


					</tbody>
				</table>

			</div>

			<!-- Sidebar Widgets Column -->
			<div class="col-md-3">

				<!-- Search Widget -->
				<div class="card my-4">
					<h5 class="card-header">Recent Status</h5>
					<div class="card-body">
						<form class="form-horizontal">
							<fieldset>

								<!-- Textarea -->
								<div class="form-group">
									<label class="control-label" for="content-post">Post Status</label>
									<div>
										<textarea class="form-control" id="content-post" name="content-post">enter your status here</textarea>
									</div>
									<div class="col-md-4">
										<input type="submit" id="submit" name="submit" class="btn btn-primary">
									</div>
								</div>

							</fieldset>
						</form>
					</div>
				</div>


				<!-- Side Widget -->
				<div class="card my-3">
					<h5 class="card-header">Side Widget</h5>
					<div class="media">
						<img src="../images/default.png" class="mr-3" alt="..." width="64px">
						<div class="media-body">
							<h5 class="mt-0">Media heading</h5>
							Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.
						</div>
					</div>
				</div>

			</div>

		</div>
		<!-- /.row -->

	</div>
</main>

<?php include 'footer.php'; ?>
