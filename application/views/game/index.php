<!DOCTYPE html>
<html lang="jp">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width"> 
  <title>SRC14</title>
  <link href="/assets/game/index/index.css" rel="stylesheet" madia="all" type="text/css">
  <link href="/assets/game/index/index_mobile.css" rel="stylesheet" madia="all" type="text/css">
  <script src="/assets/game/jquery-1.11.3.min.js"></script>
  <script src="/assets/game/periodicalUpdater.js"></script>
  <script src="/assets/game/index/index.js"></script>
</head>
<body>
  <div id="body_size">

<div id="split">
<!-- <div class="title">SRC13 第<?php echo $game_no; ?>試合 <time>[<?php echo $time; ?>]</time> -->
<div class="title">SRC14 本予選 第<?php echo $game_no; ?>試合 <time>[<?php echo $time; ?>]</time></div>

<input id="game_no" type="hidden" value="<?php echo $game_no; ?>">

<figure class="flex-container">
<?php foreach($games as $game): ?>

  <div class="f_item">    
    <div class="game">
      <figure class="flex-container2">
        <div class="f_item2">
          <div class="court">
            <span class="courtnumber"><?php echo $game['court']; ?></span>コート
          </div>
        </div>
        <div class="f_item2">
          <div class="team_name">
            <?php echo $game['team_name']; ?>
          </div>
        </div>
        <div class="f_item2">
          <div class="total_points <?php if ($game['noview'] == 1) echo "noview"; ?>" ><span><?php echo $game['total']; ?></span>点
          </div>
          <div class="kanzen <?php if ($game['noview'] == 0) echo "noview"; ?>">完全制覇
          </div>
        </div>
        <div class="f_item2">
          <div class="type_seiha <?php if ($game['noview'] == 0) echo "noview"; ?>">走破タイム: <span><?php echo $game['time_bonus']; ?></span>  type: <span><?php echo $game['type_seiha']; ?></span> 
          </div>
        </div>
      </figure>
    </div>
  </div>

<?php endforeach; ?>
</figure>

</div id="split">

<!-- <div class="best">
  ただいまの最高点:
  <div><?php echo $max_total['team_name'].'：'.$max_total['total']; ?>点
  </div>
</div> -->

<form action="/index.php/game/home">
<button type="submit" class="footer">Home
</button></form>

<!--
<form action="/index.php/game/table/<?php echo $game_no; ?>">
<button type="submit" class="footer">詳細
</button></form>
-->

</div>

</body>
</html>