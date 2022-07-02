<h1>Страница когда есть доступ - <?php if(isset($user)) {echo $user['login'];} ?></h1>

<?php foreach ($products as $product): ?>

<p><?= $product['id'] ?> - <?= $product['title'] ?></p></br>

<?php endforeach; ?>
