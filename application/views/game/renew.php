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
  <div class=<?php echo (mb_strlen($game['team_name'])>6)? "team_name2" : "team_name";?>>
    <?php echo $game['team_name']; ?>
  </div>
 </div>
 <div class="f_item2">
   <div class="total_points <?php if ($game['center_perfect_stop'] != 0) echo "noview"; ?>" ><span><?php echo $game['total']; ?></span>点
  </div>
  <div class="total_points_seiha <?php if ($game['center_perfect_stop'] == 0) echo "noview"; ?>"><span><?php echo $game['total']; ?></span>点
  </div>
 </div>
  <div class="f_item2">
  <div class="time_seiha <?php if ($game['center_perfect_stop'] == 0) echo "noview"; ?>">走破タイム: <span><?php echo $game['time_bonus']; ?></span>   
 </div>
 </div>
  </figure>
  </div>
    </div>
<?php endforeach; ?>
</figure>

</div id="split">
