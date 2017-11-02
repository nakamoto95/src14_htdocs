$(function() {

  $(document).on('click', '#set', function(ev) {
  	ev.preventDefault();
    var game_no = $('#game_no').val();
    var court = $('#court').val();
    console.log(game_no+court);
   	location.href="/index.php/game/input/"+game_no+"/"+court+"/";
  });

  $(document).on('click', '#setup', function(ev) {
  	ev.preventDefault();
    var game_no = $('#game_no').val();
    console.log(game_no);
   	location.href="/index.php/game/index/"+game_no+"/";
  });

  $(document).on('click', '#to_final_1', function(ev) {
    ev.preventDefault();
    $.post(
      '/index.php/game/change_db/FINAL_1/',
      {},
      function(data) {
        console.log('OK'+data);
      }
    );
  });
});