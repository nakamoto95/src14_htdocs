<div id="split_split">

<!-- <div class="title">SRC12 第<?php echo $game_no; ?>試合 <time>[<?php echo $time; ?>]</time> -->
<div class="title">SRC14 2次予選 第<?php echo $game_no; ?>試合<time>[<?php echo $time; ?>]</time>
</div>

<input id="game_no" type="hidden" value="<?php echo $game_no; ?>">

<?php foreach($games as $game): ?>

  <div class="game">

    <div class="team-name">
      チーム：<?php echo $game['team_name']; ?>
    </div>

    <table class="points_table">

      <tr>
        <td class="points_item">
          Robot Centerで1秒停止
        </td>
        <td class="points_value">
          <?php echo $game['start_goal_line']; ?>点
        </td>
      </tr>

      <tr>
        <td class="points_item">
          周回成功ボーナス
        </td>
        <td class="points_value">
          <?php echo $game['robot_center_laps']; ?>点
        </td>
      </tr>

      <tr>
        <td class="points_item">
          コンテナ運びだし
        </td>
        <td class="points_value">
          <?php echo $game['carry_out']; ?>点
        </td>
      </tr>

      <tr>
        <td class="points_item">
          橋通過
        </td>
        <td class="points_value">
          <?php echo $game['bridge']; ?>点
        </td>
      </tr>

      <tr>
        <td class="points_item">
          直角コーナー通過
        </td>
        <td class="points_value">
          <?php echo $game['rightangle']; ?>点
        </td>
      </tr>

      <tr>
        <td class="points_item">
          コンテナ1
        </td>
        <td class="points_value">
          <?php echo $game['container1']; ?>点
        </td>
      </tr>

      <tr>
        <td class="points_item">
          コンテナ2
        </td>
        <td class="points_value">
          <?php echo $game['container2']; ?>点
        </td>
      </tr>

      <tr>
        <td class="points_item">
          コンテナ3
        </td>
        <td class="points_value">
          <?php echo $game['container3']; ?>点
        </td>
      </tr>

      <tr>
        <td class="points_item">
          Robot Centerに持ち帰ったコンテナ
        </td>
        <td class="points_value">
          <?php echo $game['robot_center_remained']; ?>点
        </td>
      </tr>

      <tr>
        <td class="points_item">
          コンテナボーナス
        </td>
        <td class="points_value">
          <?php echo $game['container_bonus']; ?>点
        </td>
      </tr>

      <tr>
        <td class="points_item">
          タイムボーナス
        </td>
        <td class="points_value">
          <?php echo $game['time_bonus']; ?>点
        </td>
      </tr>

    </table>

    <div class="total_points">
      総得点：<?php echo $game['total']; ?>点
    </div>

  </div>

<?php endforeach; ?>

</div id="split_split">
