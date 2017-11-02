$(function() {

  $(function () {
    setInterval(function () {
      var game_no = $('#game_no').val();
      $.post('/index.php/game/renew_point', {
        game_no: game_no
      }, function (data) {
        var html = data.split('<div id="split">')[1].split('</div id="split">')[0];
        //html = html.split('</div id="split">')[0];
        console.log(html);
        $('#split').html(html);
      });
    }, 1000);
  });

});