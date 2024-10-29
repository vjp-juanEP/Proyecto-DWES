<?php foreach ($auxPartners as $partner): ?>
    <ul class="list-inline">
        <li><img src="images/index/<?= $partner->this.$logo; ?>" alt="<?= $partner->this.$descripcion; ?>"></li>
        <li><?= $partner->this.$nombre; ?></li>
    </ul> 
<?php endforeach; ?>



<!-- <ul class="list-inline">
<li><img src="images/index/log2.jpg" alt="logo"></li>
<li>First Partner Name</li>
</ul>
<ul class="list-inline">
<li><img src="images/index/log1.jpg" alt="logo"></li>
<li>Second Partner Name</li>
</ul>
<ul class="list-inline">
<li><img src="images/index/log3.jpg" alt="logo"></li>
<li>Third Partner Name</li>
</ul> -->
