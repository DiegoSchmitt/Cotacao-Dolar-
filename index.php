<?php
require_once 'app/config/config.php';
require_once 'app/modules/hg-api.php';
$hg = new HG_API(HG_API_KEY);
$dolar = $hg->dolar_quotation();

if($hg->is_error() == false){
    $variation = ($dolar['variation'] < 0) ? 'danger' : 'info';
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>Cotação dólar</title>
    </head>
    <body>
        <div class="container">
            <div class="col-12">
                <p>Cotação dólar</p>
                <?php if($hg->is_error() == false): ?>
                    <p>USD <span class="badge badge-pill <?php echo ($variation); ?>"><?php echo ($dolar['buy']);?></span></p>
                    <?php else: ?>
                        <p><span class="badge badge-pill badge-danger">Serviço indisponível</span></p>
                    <?php endif; ?>
            </div>
        </div>


        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>