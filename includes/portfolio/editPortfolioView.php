<?php 
    ob_start();
    require_once '../../config_test.php';
    require_once 'header.php';
    require_once '../../userSession.php';
?>
<h1>Edit Portfolio</h1>
<table class="table-hover">
    <thead>
        <tr>
            <th style="display:none;">ID</th>
            <th>Ticker</th>
            <th>Company</th>
            <th>Shares</th>
            <th>Price</th>
            <th>Initial Value</th>
            <th>Market Price</th>
            <th>Market Value</th>
            <th>P/L</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            //adding the data to display in the table body
            require_once 'listPortfolioSetting.php';
            require_once 'editPortfolio.php';
            require_once 'deletePortfolio.php';
        ?>
    </tbody>
</table>
<div class="min-wrapper"></div>
<?php
include 'footer.php';
?>
