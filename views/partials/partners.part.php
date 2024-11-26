<?php 
    //Si hay (0,3] se mostrara todos los partners si (3,infinito) se mostrara 3 partners aleatorios
    $auxPartners = $partners;
    if(count($partners) > 3){
        $auxPartners = extractorPartners($partners);
    }
?>    

<?php foreach ($auxPartners as $partner): ?>
    <ul class="list-inline">
        <li><img src="<?= $partner->getUrlLogo(); ?>" alt="<?= $partner->getDescripcion(); ?>" width="100px"></li>
        <li><?= $partner->getNombre(); ?></li>
    </ul> 
<?php endforeach; ?>