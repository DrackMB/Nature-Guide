<div class="card  mb-3" style="max-width: 18rem;">
  <div class="card-header text-white bg-info">Liste des membres connectés</div>
  <div class="card-body">
  <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) :?>
    <div class="card-text" id="member"><?= $row["pseudo"]?></div>
    <hr>
    <?php endwhile;?>
  </div>
</div>