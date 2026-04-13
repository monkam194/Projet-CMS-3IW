<h1>Titre : <?= h($page['title']) ?></h1>
<h2>Contenu :</h2>
<p> <?= h($page['content']) ?></p>
<br>
<br>
<br>
<br>
<h3>Auteur :</h3>
<span> <?= h($page['author']) ?></span>
<h4>Date de mise en ligne :</h4>
<?php $dateArr = explode("-", $page['date']); ?>
<span> <?= $dateArr[2] . "/" . $dateArr[1] . "/" . $dateArr[0]; ?> </span>