<!DOCTYPE html>
<html lang="jp">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width"> 
  <title>SRC14</title>
  <link href="/assets/game/home/home.css" rel="stylesheet">
  <script src="/assets/game/jquery-1.11.3.min.js"></script>
  <script src="/assets/game/home/home.js"></script>
</head>
<body>

<form>

  <!-- <input id="game_no" type="text" placeholder="試合番号"> -->
	<div class="flex">
  <select id="game_no" name="試合番号">
    <?php for ($i=1; $i < 15; $i++) {  ?>
      <option><?php echo $i; ?></option>
    <?php } ?>
  </select>
  </div>
<div class="flex">
  <select id="court" name="コート">
  	<option>A</option>
  	<option>B</option>
  	<option>C</option>
    <option>D</option>
    <option>E</option>
    <option>F</option>
    <option>G</option>
	</select>
</div>
<div class="flex">
<div class="flexwrap">
  <button id="set">GO to INPUT</button>

  <button id="setup">GO to INDEX</button>
  </div>
</div>
</form>

</body>
</html>