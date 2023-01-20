<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="refresh" content="15">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="views/assets/css/style.css">
    <!------ Include the above in your HEAD tag ---------->
    <title>Monitorar IPs</title>
</head>
<body>


<div class="container">
    <?php
    $servidores = [
        "MITSI" => "www.mitsi.com.br",
        "UOL" => "www.uol.com.br",
        "BRASPRESS" => "www.braspress.com",
        "GLOBO" => "www.globo.com",
        "terra" => "www.terra.com.br",
    ];
    //var_dump($retorno);
    ?>

    <div class="kpx_login">

        <h3 class="kpx_authTitle">Monitoramento de <a href="#">IPs</a></h3>

        <div class="row kpx_socialButtons">
            <?php
            foreach ($servidores as $servidor => $ip) {
                $retorno = shell_exec("C:\Windows\system32\ping -n 1 $ip");

                if (preg_match("/tempo=/", $retorno) || preg_match("/tempo</", $retorno)) {
                    $status = "spotify";
                    $off_or_On = "fa fa-toggle-on";
                } else {
                    $status = "lastfm";
                    $off_or_On = "fa fa-toggle-off";
                }

                ?>

                <div class="col-sm divSpaco">
                    <a href="#" class="btn btn-lg btn-block kpx_btn-<?= $status ?>" data-toggle="tooltip"
                       data-placement="top" title="Spotify">
                        <p class=""><?= $servidor ?></p>
                        <i class="<?= $off_or_On ?>" aria-hidden="true"></i>
                        <span class="hidden-xs"><?= $ip ?></span>
                    </a>
                </div>


                <?php
            }
            ?>
        </div>
        <br>
        <hr>
    </div>


</body>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
</html>