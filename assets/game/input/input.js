$(function() {

  $(document).on('click', '#set', function(ev) {
    ev.preventDefault();
    var game_no = $('#game_no').val();
    var court = $('#court').val();
    var team_name = $('#team_name').val();
    var member_name_first = $('#member_name_first').val();
    var member_name_second = $('#member_name_second').val();
    var time_bonus = $('#time_bonus').val();
    $.post('/index.php/game/receive_text', {
      game_no: game_no,
      court: court,
      team_name: team_name,
      member_name_first: member_name_first,
      member_name_second: member_name_second,
      time_bonus: time_bonus
    }, function(data) {
      console.log(data);
    });
  });

  $(document).on('click', '.plus', function(ev) {
    ev.preventDefault();
    var game_no = $('#game_no').val();
    var court = $('#court').val();
    var point = Number($(this).closest('.input_value').find('.value').text()) + 1;
    var item = $(this).closest('.input_value').find('.item_input').attr('value');
    var that = this;
    $.post('/index.php/game/receive_point', {
      game_no: game_no,
      court: court,
      item: item,
      point: point
    }, function(data) {
      console.log(data);
      $(that).closest('.input_value').find('.value').text(point);
    });
  });

  $(document).on('click', '.minus', function(ev) {
    ev.preventDefault();
    var game_no = $('#game_no').val();
    var court = $('#court').val();
    var point = (Number($(this).closest('.input_value').find('.value').text()) < 1) ? 0 : Number($(this).closest('.input_value').find('.value').text()) - 1;
    var item = $(this).closest('.input_value').find('.item_input').val();
    var that = this;
    $.post('/index.php/game/receive_point', {
      game_no: game_no,
      court: court,
      item: item,
      point: point
    }, function(data) {
      console.log(data);
      $(that).closest('.input_value').find('.value').text(point);
    });
  });
  
  $(document).on('click', '#seiha', function(ev) {
	ev.preventDefault();	
	if ($(this).hasClass("seihahover")) {
	$(this).removeClass("seihahover");
	} else {
	$(this).addClass("seihahover");
	}
    var game_no = $('#game_no').val();
    var court = $('#court').val();
	var item = $(this).closest('.input_value').find('.item_input').val();
	var point= (Number($(this).closest('.input_value').find('.value').text()) < 1) ? 1 : Number($(this).closest('.input_value').find('.value').text()) - 1;
	var that = this;
    $.post('/index.php/game/receive_point', {
      game_no: game_no,
      court: court,
	  item: item,
	  point: point,
    }, function(data) {
      console.log(data);
      $(that).closest('.input_value').find('.value').text(point);
	  });
	  });
	  });