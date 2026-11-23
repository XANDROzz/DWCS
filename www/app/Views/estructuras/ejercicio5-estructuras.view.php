<p>Sobre el salario de <?= $salary?>€, se han descontado <?= $totalDiscount?>€, dando como salario final <?= $finalSalary?>€</p>

<p><?php if($finalSalary > 2000): ?>
    <div class="alert-success">Felicidades, tienes un salario por encima de la media.</div>
<?php endif;?></p>