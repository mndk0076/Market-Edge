<?php 
    ob_start();
    require_once '../../config_test.php';
    require_once 'header.php';
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
            require_once 'listPortfolioSetting.php';
            require_once 'editPortfolio.php';
            require_once 'deletePortfolio.php';
        ?>
    </tbody>
</table>
<?php
include 'footer.php';
?>
