<?php 
    $partners = [];
    $auxPartners = [];

    $contadorLogo = 1;

    for ($i=1; $i <= 5 ; $i++) {
        //Provisional junto a $contadorLogo
        if($contadorLogo % 3 == 0){
            $contadorLogo++;
        }

        $partner = new Partner("Nombre " . $i, "log". $contadorLogo % 3 .".jpg" ,"Descripción " . $i);
        array_push($partners,$partner);
        $contadorLogo ++;
    }

    //Si hay (0,3] se mostrara todos los partners si (3,infinito) se mostrara 3 partners aleatorios
    if(count($partners) <= 3){
        $auxPartners = $partners;
    }else if(count($partners) > 3){
        $auxPartners = extractorPartners($partners);
    }

?>    

<?php foreach ($auxPartners as $partner): ?>
    <ul class="list-inline">
        <li><img src="images/index/<?= $partner->getLogo(); ?>" alt="<?= $partner->getDescripcion(); ?>"></li>
        <li><?= $partner->getNombre(); ?></li>
    </ul> 
<?php endforeach; ?>