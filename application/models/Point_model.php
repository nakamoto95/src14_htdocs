<?php
class Point_model extends CI_Model {

  public function __construct() {
    $this->load->database();
  }

  public function get_points_for_index($game_no, $court) {
    $this->db->where('game_no', $game_no);
    $this->db->where('court', $court);
    $this->db->limit(1);
    $query = $this->db->get('points');
    $result = $query->result_array()[0];
    return [
    'court' => $result['court'],
    'team_name' => $result['team_name'],
	  'time_bonus' => $result['time_bonus'],

      'start_goal_line' => $start_goal_line = 
        $result['start_goal_line'] * 100,
		
      'carry_out' => $carry_out = 
        $result['carry_out'] * 400 +
        $result['god_hand'] * 200,

      'mb1' => $mb1 =
        $result['mb1'] * 400 +
        $result['mb1x'] * 200 +
        $result['mb1_option'] * 600,

      'mb2' => $mb2 =
        $result['mb2'] * 600 +
        $result['mb2x'] * 300 ,

      'mb3' => $mb3 =
        $result['mb3'] * 1000 +
        $result['mb3x'] * 500,
      'mb4' => $mb4 =
        $result['mb4'] * 1200 +
        $result['mb4x'] * 600,

      'center_perfect_stop' => $center_perfect_stop =
        $result['center_perfect_stop'] * 4500,
		
      'obstacle' => $obstacle =
        $result['obstacle_block'] * 600,
		
  		'noview' => $noview = $result['noview'],

      'total' => $start_goal_line + $carry_out + $mb1 + $mb2 + $mb3 + $mb4 + $center_perfect_stop + $obstacle];
  }

  public function update_total_points($game_no, $court) {
    $total = $this->get_points_for_index($game_no, $court)['total'];
    $data = array(
      'total' => $total
    );
    $this->db->where('game_no', $game_no);
    $this->db->where('court', $court);
    $this->db->update('points', $data);
    return $this->get_points_for_input($game_no, $court);
  }

  public function get_all_games() {
    $this->db->limit(1024);
    $this->db->order_by('total', 'desc');
    $query = $this->db->get('points');
    return $query->result_array();
  }

  public function get_points_for_input($game_no, $court) {
    $this->db->where('game_no', $game_no);
    $this->db->where('court', $court);
    $this->db->limit(1);
    $query = $this->db->get('points');
    return $query->result_array()[0];
  }

  public function set_text($game_no, $court, $team_name, $member_name_first, $member_name_second, $time_bonus, $type_seiha) {
    $data = array(
      'team_name' => $team_name,
      'member_name_first' => $member_name_first,
      'member_name_second' => $member_name_second,
      'time_bonus' => $time_bonus
    );
    $this->db->where('game_no', $game_no);
    $this->db->where('court', $court);
    $this->db->update('points', $data);
    return $game_no.':'.$court;
  }

  public function renew_point_for_input($game_no, $court, $item, $point) {
    $data = array(
    $item => $point,
    );
    $this->db->where('game_no', $game_no);
    $this->db->where('court', $court);
    $this->db->update('points', $data);
    return $court.':'.$item.':'.$point;
  }

  public function create_records($start, $end) {
    $courts = array('A', 'B', 'C', 'D', 'E', 'F','G');
    for($i=$start; $i < $end+1 ; $i++) { 
      foreach($courts as $court) {
        $data = array(
          'game_no' => $i,
          'court' => $court,
        );
        $this->db->insert('points', $data);
      }
    }
    return true;
  }

  public function get_max_total() {
    $this->db->select_max('total');
    $query = $this->db->get('points');
    $total = $query->result_array()[0]['total'];
    $this->db->where('total', $total);
    $query = $this->db->get('points');
    $team_name = $query->result_array()[0]['team_name'];
    return array(
      'team_name' => $team_name,
      'total' => $total
    );
  }
}
?>