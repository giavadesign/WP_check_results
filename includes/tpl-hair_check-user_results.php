<?php 
get_header();
#-----------------------------------------------------------
require_once( WP_CONTENT_DIR . '/plugins/dk-hair-check-results/includes/inc_settings.php' );
#-----------------------------------------------------------
$session_dk_hc_response_key = 'dk_hair_check_response';
#-----------------------------------------------------------
$arr_progress_pics = array();
$arr_progress_pics[0] = '10percent.png';
$arr_progress_pics[1] = '25percent.png';
$arr_progress_pics[2] = '50percent.png';
$arr_progress_pics[3] = '75percent.png';
$arr_progress_pics[4] = '98percent.png';
#-----------------------------------------------------------
$arr_points_ranges = array();
$arr_points_ranges[0] = range( 40 , 21 );
$arr_points_ranges[1] = range( 20 , 16 );
$arr_points_ranges[2] = range( 11 , 15 );
$arr_points_ranges[3] = range( 6 , 10 );
$arr_points_ranges[3] = range( -8 , 5 );
#-----------------------------------------------------------
$arr_creativities = array();
$arr_creativities[0] = '01_lisci.png';
$arr_creativities[1] = '02_mossi.png';
$arr_creativities[2] = '03_ricci.png';
$arr_creativities[3] = '04_afro.png';
$arr_creativities['00'] = '00_alopecia-diradamento.png';
#-----------------------------------------------------------


if( isset( $_SESSION[$session_dk_hc_response_key] ) ){
  #-----------------------------------------------------------
  $arr_answers = $_SESSION[$session_dk_hc_response_key]['question_answers_array'];
  #-----------------------------------------------------------
  
  /*=========================  sesso  =========================*/
  $answered_keys = array_keys($arr_answers[1]['user_answer']);
  #-----------------------------------------------------------
  $sesso = strtoupper( $arr_answers[1]['user_answer'][$answered_keys[0]] );
  $sesso_index = array_search( $sesso , $genders );
  /*=========================  sesso /  =========================*/

  /*=========================  eta  =========================*/
  $answered_keys = array_keys($arr_answers[0]['user_answer']);
  #-----------------------------------------------------------
  $eta_index = $answered_keys[0];
  /*=========================  eta /  =========================*/

  $field_root_key = 'hc--s_'.$sesso_index.'-e_'.$eta_index;
  echo 'campo db ' . $field_root_key;
  
  

  /*=========================  punteggio  =========================*/
  $arr_points = array();
  foreach( $arr_answers as $risp_key => $risp_info ){
    $arr_points[] = $risp_info['points']; 
  }
  $total_points = array_sum( $arr_points );
  /*=========================  punteggio /  =========================*/
  
  /*=========================  progress  =========================*/
  foreach( $arr_points_ranges as $ranges_key => $ranges_array ){
    if( in_array( $total_points , $ranges_array ) ){
      $progress_index = $ranges_key;
      break;
    }
  }
  $the_progress_pic = $arr_progress_pics[$progress_index];
  /*=========================  progress /  =========================*/

  /*=========================  creativities  =========================*/
  $answered_keys = array_keys($arr_answers[2]['user_answer']);
  #-----------------------------------------------------------
  $answer_problema_index = array_search( $arr_answers[2]['user_answer'][$answered_keys[0]] , $arr_answers[2]['correct_answer'] );
  
  if( $answer_problema_index === 0 || $answer_problema_index === 2 ){
    $creativities_index = '00';
  }
  else{
    $answered_keys = array_keys($arr_answers[3]['user_answer']);
    #-----------------------------------------------------------
    $creativities_index = array_search( $arr_answers[3]['user_answer'][$answered_keys[0]] , $arr_answers[2]['correct_answer'] );
  }
  /*=========================  creativities /  =========================*/

  /*=========================  prodotti  =========================*/
  $prodotto_1_risp_keys = array_keys($arr_answers[2]['user_answer']);
  $prodotto_1_risp_index = array_search( $arr_answers[2]['user_answer'][$prodotto_1_keys[0]] , $arr_answers[2]['correct_answer'] );

  #-----------------------------------------------------------
  $prodotto_2_risp_index = $prodotto_1_risp_index;
  #-----------------------------------------------------------
  
  /*=========================  prodotti /  =========================*/
  

  /*=========================  prodotto 5  =========================*/
  // somma dei punti di array points con indice 8 e 9
  $prodotto_5_punti = $arr_points[8] + $arr_points[9];
  if( $prodotto_5_punti === 0 || $prodotto_5_punti === 1 ){ $prodotto_5_index = 0; }
  elseif( $prodotto_5_punti == 2 || $prodotto_5_punti == 3 ){ $prodotto_5_index = 1; }
  else{ $prodotto_5_index = 2; }
  /*=========================  prodotto 5 /  =========================*/
  
  /*=========================  prodotto 6  =========================*/
  // somma dei punti di array points con indice 7 e 14
  $prodotto_6_punti = $arr_points[7]+$arr_points[14];
  if( $prodotto_6_punti === 0 || $prodotto_6_punti === 1 ){ $prodotto_6_index = 0; }
  elseif( $prodotto_6_punti == 2 || $prodotto_6_punti == 3 ){ $prodotto_6_index = 1; }
  else{ $prodotto_6_index = 2; }
  /*=========================  prodotto 6 /  =========================*/
  
  
  
  
  echo '<h4>sesso : ' . $sesso . '</h4>';
  echo '<h4>sesso index : ' . $sesso_index . '</h4>';
  echo '<h4>eta : ' . $eta_ranges[$eta_index] . '</h4>';
  echo '<h4>eta index : ' . $eta_index . '</h4>';
  echo '<hr>';
  echo 'hc--s_' . $sesso_index . '-e_'.$eta_index.'-';
  echo '<hr>';
  echo '<h4>punteggio : ' . $total_points . '</h4>';
  echo '<hr>';
  echo 'punti prodotto 5: ' . $prodotto_5_punti;
  echo '<br>';
  echo 'indice prodotto 5: ' . $prodotto_5_index;
  echo '<hr>';
  echo 'punti prodotto 6: ' . $prodotto_6_punti;
  echo '<br>';
  echo 'indice prodotto 6: ' . $prodotto_6_index;
  echo '<hr>';
  echo '<h4>pictures' . $the_progress_pic .'</h4>';
  echo '<hr>';

  echo '<hr>';
  echo 'Problematica:' . $answer_problema_index;
  echo '<hr>';
  echo 'creativities index:' . $creativities_index;
  echo '<hr>';
  echo 'creativities img:' . $arr_creativities[$creativities_index];
  
  echo '<pre>';
  print_r($arr_points_ranges);
  echo '</pre>';
  echo '<pre>';
  print_r($arr_progress_pics);
  echo '</pre>';
  echo '<pre>';
  print_r($arr_points);
  echo '</pre>';
  echo '<pre>';
  print_r( $arr_answers );
  echo '</pre>';

  //unset( $_SESSION[$session_dk_hc_response_key] );
}

get_footer();


?>