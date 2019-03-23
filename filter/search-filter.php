
  <?php 
    require_once '../includes/header.php';
?>
<main>
<div class="stock">
<div class="slider_container">
			
 <div class="stock-search">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="search_container">
						<div class="search_content">
							<form action="#" class="search_form d-flex flex-row align-items-start justfy-content-start">
								<div class="search_form_content d-flex flex-row align-items-start justfy-content-start flex-wrap">
									<div>
										<select class="search_form_select">
											<option disabled selected>Sector</option>
											<option>All</option>
											<option>Basic Materials</option>
											<option>Conglomerates</option>
											<option>Consumer Goods</option>
											<option>Financial</option>
											<option>Healthcare</option>
											<option>Industrial Goods</option>
											<option>Services</option>
											<option>Technology</option>
											<option>Utilities</option>
										</select>
									</div>
									<div>
										<select class="search_form_select">
											<option disabled selected>Average Volume</option>
											<option>Under 50K</option>
											<option>Under 100K</option>
											<option>Under 500K</option>
											<option>Under 750K</option>
											<option>Under 1M</option>
											<option>Over 50K</option>
											<option>Over 100K</option>
											<option>Over 200K</option>
											<option>Over 300K</option>
											<option>Over 400K</option>
											<option>Over 500K</option>
											<option>Over 750K</option>
											<option>Over 1M</option>
											<option>100K to 500K/option>
											<option>100K to 1M</option>
											<option>500K to 1M</option>
											<option>500K to 10M</option>
										</select>
									</div>
									<div>
										<input class="search_form_select" type="text" name="price" placeholder="Price">
											 
									
									</div>
									<div>
										<input class="search_form_select" type="text" name="margin cap" placeholder="Margin Cap">
									</div>
									
								</div>
								<button class="search_form_button ml-auto">search</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
	<div class="table-info"> 
    <table class="table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Ticker</th>
                <th>Company</th>
                <th>Sector</th>
                <th>Industry</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>AABA/td>
                <td>AAC Holdings,Inc/td>
                <td>Healthcare</td>
                <td>Specialised Health Services</td>
                <td>$2000</td>
                
            </tr>
            <tr>
                <td>2</td>
                <td>AADR</td>
                <td>AdvisorShares Dorsey Wright ADR ETF</td>
                <td>Financial</td>
                <td>Exchange Traded Fund</td>
                <td>$2000</td>
                
            </tr>
            <tr>
                <td>3</td>
                <td>AAL</td>
                <td>American Airlines Group Inc</td>
                <td>Services</td>
                <td>Major Airlines</td>
                <td>$2000</td>
               
            </tr>
          
        </tbody>
    </table>
	</div>
</main>
<?php 
    include '../includes/footer.php';
?>






