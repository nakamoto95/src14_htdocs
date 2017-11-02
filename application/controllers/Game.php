<?php
class Game extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Point_model');
    $this->load->helper('url_helper');
  }

  public function index($game_no = null) {
    $data['game_no'] = $game_no;
    $data['games'] = [
      $this->Point_model->get_points_for_index($game_no, 'A'),
      $this->Point_model->get_points_for_index($game_no, 'B'),
      $this->Point_model->get_points_for_index($game_no, 'C'),
      $this->Point_model->get_points_for_index($game_no, 'D'),
      $this->Point_model->get_points_for_index($game_no, 'E'),
      $this->Point_model->get_points_for_index($game_no, 'F'),
      $this->Point_model->get_points_for_index($game_no, 'G')
    ];
    
    date_default_timezone_set('Asia/Tokyo');
    $i = intval(date('i'))+0;
    if($i > 59) {$i = $i-60;}
    $data['time'] = $i.':'.date('s');
    $data['max_total'] = $this->Point_model->get_max_total();
    $this->load->view('game/index', $data);
  }
  
  public function table($game_no = null) {
    $data['game_no'] = $game_no;
    $data['games'] = [
      $this->Point_model->get_points_for_index($game_no, 'A'),
      $this->Point_model->get_points_for_index($game_no, 'B'),
      $this->Point_model->get_points_for_index($game_no, 'C'),
      $this->Point_model->get_points_for_index($game_no, 'D'),
      $this->Point_model->get_points_for_index($game_no, 'E'),
      $this->Point_model->get_points_for_index($game_no, 'F'),
      $this->Point_model->get_points_for_index($game_no, 'G')
    ];
    
      date_default_timezone_set('Asia/Tokyo');
    $i = intval(date('i'))+0;
    if($i > 59) {$i = $i-60;}
    $data['time'] = $i.':'.date('s');
    $this->load->view('game/table', $data);
  }

  public function input($game_no, $court) {
    $data['game_no'] = $game_no;
    $data['court'] = $court;
    $data['items'] = $this->Point_model->get_points_for_input($game_no, $court);
    $this->load->view('game/input', $data);
  }

  public function receive_text() {
    $game_no = $this->input->post('game_no');
    $court = $this->input->post('court');
    $team_name = $this->input->post('team_name');
    $member_name_first = $this->input->post('member_name_first');
    $member_name_second = $this->input->post('member_name_second');
    $time_bonus = $this->input->post('time_bonus');
    echo $this->Point_model->set_text($game_no, $court, $team_name, $member_name_first, $member_name_second, $time_bonus);
  }

  public function receive_point() {
    $game_no = $this->input->post('game_no');
    $court = $this->input->post('court');
    $item = $this->input->post('item');
    $point = $this->input->post('point');
    echo $this->Point_model->renew_point_for_input($game_no, $court, $item, $point);
  }

  public function renew_point() {
    $game_no = $this->input->post('game_no');
    $data['game_no'] = $game_no;
    $data['games'] = [
      $this->Point_model->get_points_for_index($game_no, 'A'),
      $this->Point_model->get_points_for_index($game_no, 'B'),
      $this->Point_model->get_points_for_index($game_no, 'C'),
      $this->Point_model->get_points_for_index($game_no, 'D'),
      $this->Point_model->get_points_for_index($game_no, 'E'),
  	  $this->Point_model->get_points_for_index($game_no, 'F'),
      $this->Point_model->get_points_for_index($game_no, 'G')
    ];

        date_default_timezone_set('Asia/Tokyo');
    $i = intval(date('i'))+0;
    if($i > 59) {$i = $i-60;}
    $data['time'] = $i.':'.date('s');
    $this->load->view('game/renew', $data);
  }

  public function home() {
    $this->load->view('game/home');
  }

  public function update_total_points() {
    echo '<html><head><style>td { padding: 1rem; font-size: 5rem;}</style></head><body><table>';
    $games = $this->Point_model->get_all_games();
    foreach($games as $key => $game) {
      $game = $this->Point_model->update_total_points($game['game_no'], $game['court']);
      echo '<tr><td>'.$game['team_name'].'</td><td>'.$game['game_no'].$game['court'].'</td><td>'.$game['total'].'点'.'</td><td>'.($key+1).'位</td></tr>';
    }
    echo '</table></body></html>';
  }

  public function create_records($start, $end) {
    $this->Point_model->create_records($start, $end);
    echo 'DONE';
  }

  // public function change_db($to) {
  //   $DB_USING = $to;
  //   return true;
  // }
}
?>