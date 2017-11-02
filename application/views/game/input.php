<!DOCTYPE html>
<html lang="jp">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=.5, minimum-scale=.5, maximum-scale=.5, user-scarable=no"> 
  <title>SRC14</title>
  <link href="/assets/game/input/input.css" rel="stylesheet" madia="all" type="text/css">
  <link href="/assets/game/input/input_mobile.css" rel="stylesheet" madia="all" type="text/css">
  <script src="/assets/game/jquery-1.11.3.min.js"></script>
  <script src="/assets/game/input/input.js"></script>
</head>
<body>
<div id="scroll">
<div class="title">Game:<?php echo $game_no; ?>/Court:<?php echo $court; ?></div>

<form>

  <input id="game_no" type="hidden" value="<?php echo $game_no; ?>">

  <input id="court" type="hidden" value="<?php echo $court; ?>">

<div class="inputboxes">
  <input id="team_name" type="text" placeholder="team_name" value="<?php echo $items['team_name']; ?>">

  <input id="member_name_first" type="text" placeholder="member_name_first" value="<?php echo $items['member_name_first']; ?>">

  <input id="member_name_second" type="text" placeholder="member_name_second" value="<?php echo $items['member_name_second']; ?>">

  <input id="time_bonus" type="text" placeholder="time_mm:ss" value="<?php echo $items['time_bonus']; ?>">
  
</div>
  
  <button id="set">SET</button>

<div id="table">

  <?php foreach($items as $key => $value): if($key != 'id' && $key != 'game_no' && $key != 'court' && $key != 'team_name' && $key != 'member_name_first' && $key != 'member_name_second' && $key != 'time_bonus' && $key != 'total' && $key != 'noview'): ?>

    <div id="<?php echo $key; ?>" class="input_value">
      <button class="plus">+</button>
      <p class="value"><?php echo $value; ?></p>
      <button class="minus">--</button>
      <p class="item">
        <input class="item_input" type="hidden" value="<?php echo $key; ?>">
        <?php
        if ($key == 'start_goal_line') {
          echo '銀1秒停止';
        } elseif ($key == 'carry_out') {
          echo 'ｺﾝﾃﾅ取る';
        } elseif ($key == 'god_hand') {
          echo '神の手';
        } elseif ($key == 'mb1') {
          echo 'MB1に置く';
        } elseif ($key == 'mb1x') {
          echo '【中心×】<br>MB1に置く';
        } elseif ($key == 'mb1_option') {
          echo 'MB1で台の上に置く';
        } elseif ($key == 'mb2') {
          echo 'MB2に置く';
        } elseif ($key == 'mb2x') {
          echo '【中心×】<br>MB2に置く';
        } elseif ($key == 'mb3') {
          echo 'MB3に置く';
        } elseif ($key == 'mb3x') {
          echo '【中心×】<br>MB3に置く';
        } elseif ($key == 'mb4') {
          echo 'MB4に置く';
        } elseif ($key == 'mb4x') {
          echo '【中心×】<br>MB4に置く';
        } elseif ($key == 'obstacle_block') {
          echo '障害物はｺﾝﾃﾅ';
        } elseif ($key == 'center_perfect_stop') {
          echo '完全制覇';
        }
      ?></p>
    </div>

  <?php endif; endforeach; ?>
  
    <?php foreach($items as $key => $value): if($key == 'noview'): ?>
<div id="<?php echo $key ?>" class="input_value">
<button id="seiha" >完全制覇</button>
<p class="value" style="visibility:hidden"><?php echo $value ?></p>
<p class="item"><input class="item_input" type="hidden" value="<?php echo $key; ?>"></p>
</div>
  <?php endif; endforeach; ?>
  
</div>

</form>

<form action="/index.php/game/home">
<button type="submit" class="footer">home
</button></form>
</div>
</body>
</html>