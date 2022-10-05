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
$arr_points_ranges[4] = range( -8 , 5 );
#-----------------------------------------------------------
$arr_progress[0]['val'] = 1;
$arr_progress[0]['color'] = '#777';
$arr_progress[1]['val'] = 25;
$arr_progress[1]['color'] = '#E9B90E';
$arr_progress[2]['val'] = 50;
$arr_progress[2]['color'] = '#0670AE';
$arr_progress[3]['val'] = 75;
$arr_progress[3]['color'] ='#33AAB5';
$arr_progress[4]['val'] = 98;
$arr_progress[4]['color'] = '#40993C';
#-----------------------------------------------------------
$arr_creativities = array();
$arr_creativities[0] = '01_lisci.jpg';
$arr_creativities[1] = '02_mossi.jpg';
$arr_creativities[2] = '03_ricci.jpg';
$arr_creativities[3] = '04_afro.jpg';
$arr_creativities['00'] = '00_alopecia-diradamento.jpg';
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

  #-----------------------------------------------------------
  $field_root_key = 'hc--s_'.$sesso_index.'-e_'.$eta_index.'-';
  #-----------------------------------------------------------
  

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

  /*=========================  tipo_di_capello  =========================*/
  $tipo_di_capello_index = array_keys($arr_answers[3]['user_answer']);
  $tipo_di_capello = $arr_answers[3]['user_answer'][$tipo_di_capello_index[0]] ;
  #-----------------------------------------------------------
  // stress
  $stress_punti = $arr_points[8] + $arr_points[9];
  if( $stress_punti === 0 || $stress_punti === 1 ){ $stress_string_text = 'NO'; $stress_string_color = '#40993C'; }
  elseif( $stress_punti == 2 || $stress_punti == 3 ){ $stress_string_text = 'MEDIO'; $stress_string_color = '#E9B90E'; }
  else{ $stress_string_text = 'SI'; $stress_string_color = '#ff4480'; }
  

  /*=========================  tipo_di_capello /  =========================*/
  


  /*=========================  posts  =========================*/
  $post_1_risp_keys = array_keys($arr_answers[2]['user_answer']);
  $post_1_risp_index = array_search( $arr_answers[2]['user_answer'][$post_1_risp_keys[0]] , $arr_answers[2]['correct_answer'] );
  $post_1_field_key = $field_root_key.'d_2-r_'.$post_1_risp_index.'-post_1';
  $post_1_id = esc_attr( get_option( $post_1_field_key ) );
  #-----------------------------------------------------------
  $post_2_risp_keys = array_keys($arr_answers[5]['user_answer']);
  $post_2_risp_index = array_search( $arr_answers[5]['user_answer'][$post_2_risp_keys[0]] , $arr_answers[5]['correct_answer'] );
  $post_2_field_key = $field_root_key.'d_2-r_'.$post_2_risp_index.'-post_1';
  $post_2_id = esc_attr( get_option( $post_2_field_key ) );
  #-----------------------------------------------------------
  /*=========================  posts /  =========================*/
  

  /*=========================  prodotti  =========================*/
  $prodotto_1_risp_keys = array_keys($arr_answers[2]['user_answer']);
  $prodotto_1_risp_index = array_search( $arr_answers[2]['user_answer'][$prodotto_1_risp_keys[0]] , $arr_answers[2]['correct_answer'] );
  $prodotto_1_field_key = $field_root_key.'d_2-r_'.$prodotto_1_risp_index.'-prod_1';
  $prodotto_1_id = esc_attr( get_option( $prodotto_1_field_key ) );
  #-----------------------------------------------------------
  $prodotto_2_risp_index = $prodotto_1_risp_index;
  $prodotto_2_field_key = $field_root_key.'d_2-r_'.$prodotto_2_risp_index.'-prod_2';
  $prodotto_2_id = esc_attr( get_option( $prodotto_2_field_key ) );
  #-----------------------------------------------------------
  $prodotto_3_risp_keys = array_keys($arr_answers[3]['user_answer']);
  $prodotto_3_risp_index = array_search( $arr_answers[3]['user_answer'][$prodotto_3_risp_keys[0]] , $arr_answers[3]['correct_answer'] );
  $prodotto_3_field_key = $field_root_key.'d_3-r_'.$prodotto_1_risp_index.'-prod_1';
  $prodotto_3_id = esc_attr( get_option( $prodotto_3_field_key ) );
  #-----------------------------------------------------------
  $prodotto_4_risp_keys = array_keys($arr_answers[5]['user_answer']);
  $prodotto_4_risp_index = array_search( $arr_answers[5]['user_answer'][$prodotto_4_risp_keys[0]] , $arr_answers[5]['correct_answer'] );
  $prodotto_4_field_key = $field_root_key.'d_5-r_'.$prodotto_4_risp_index.'-prod_1';
  $prodotto_4_id = esc_attr( get_option( $prodotto_4_field_key ) );
  #-----------------------------------------------------------
  /*=========================  prodotti /  =========================*/
  

  /*=========================  prodotto 5  =========================*/
  // somma dei punti di array points con indice 8 e 9
  $prodotto_5_punti = $arr_points[8] + $arr_points[9];
  if( $prodotto_5_punti === 0 || $prodotto_5_punti === 1 ){ $prodotto_5_risp_index = 0; }
  elseif( $prodotto_5_punti == 2 || $prodotto_5_punti == 3 ){ $prodotto_5_risp_index = 1; }
  else{ $prodotto_5_risp_index = 2; }
  #-----------------------------------------------------------
  $prodotto_5_field_key = $field_root_key.'d_6-r_'.$prodotto_5_risp_index.'-prod_1';
  $prodotto_5_id = esc_attr( get_option( $prodotto_5_field_key ) );
  #-----------------------------------------------------------
  /*=========================  prodotto 5 /  =========================*/
  
  /*=========================  prodotto 6  =========================*/
  // somma dei punti di array points con indice 7 e 14
  $prodotto_6_punti = $arr_points[7]+$arr_points[14];
  if( $prodotto_6_punti === 0 || $prodotto_6_punti === 1 ){ $prodotto_6_index = 0; }
  elseif( $prodotto_6_punti == 2 || $prodotto_6_punti == 3 ){ $prodotto_6_index = 1; }
  else{ $prodotto_6_index = 2; }
  #-----------------------------------------------------------
  $prodotto_6_field_key = $field_root_key.'d_7-r_'.$prodotto_5_risp_index.'-prod_1';
  $prodotto_6_id = esc_attr( get_option( $prodotto_6_field_key ) );
  #-----------------------------------------------------------
  /*=========================  prodotto 6 /  =========================*/

  $the_uploads_dir = wp_get_upload_dir();
  ?>

  <div class="dk_hair_check_results">
    
    <!-- section -->
    <section>
      <h1>Risultati Hair Check</h1>
      <!-- row -->
      <div class="dk_hc_results">
        <!-- col -->
        <div class="dk_hc_results_creativities">
          <div class="dk_hc_col_inner">
            <img src="<?php echo $the_uploads_dir['baseurl'] . '/customs/' . $arr_creativities[$creativities_index]; ?>">
          </div>
        </div>
        <!-- col / -->
 
        <!-- col -->
        <div class="dk_hc_results_progress">
          <div class="dk_hc_col_inner">
            <img src="<?php echo $the_uploads_dir['baseurl'] . '/customs/' . $the_progress_pic; ?>">
          </div>
        </div>
        <!-- col / -->
        
        <!-- col -->
        <div class="dk_hc_stats_stats_wrapper">
          <div class="dk_hc_stats_stats_inner">
            <!-- stats -->
            <div class="dk_hc_stats">
              <div class="dk_hc_stats_label">
                Stato di salute del capello misurato:
              </div>
              <div class="dk_hc_stats_val">
                <span style="color: <?php echo $arr_progress[$progress_index]['color']; ?>"><?php echo $arr_progress[$progress_index]['val']; ?>%</span>
              </div>
            </div>
            <!-- stats -->
            <!-- stats -->
            <div class="dk_hc_stats">
              <div class="dk_hc_stats_label">
                Tipo di capelli:
              </div>
              <div class="dk_hc_stats_val">
                <?php echo $tipo_di_capello; ?>
              </div>
            </div>
            <!-- stats -->
            <!-- stats -->
            <div class="dk_hc_stats">
              <div class="dk_hc_stats_label">
                Fattore di stress:
              </div>
              <div class="dk_hc_stats_val">
                <span style="color: <?php echo $stress_string_color ;?>"><?php echo $stress_string_text; ?></span>
              </div>
            </div>
            <!-- stats -->
           
            <p>Consulta i consigli personalizzati per trovare elementi di miglioramento:</p>
          </div>
        </div>
        <!-- col / -->
      </div>
      <!-- row / -->
    </section>
    <!-- section / -->

    <!-- section -->
    <section>
      <!-- row -->
      <div class="dk_hc_row">
        <!-- col -->
        <div class="dk_hc_col_12">
          <h2>
            <span class="title_inner">
              Consigli personalizzati
            </span>
          </h2>
        </div>
        <!-- col / -->
      </div>
      <!-- row / -->
      
      <!-- row -->
      <div class="dk_hc_row dk_hc_suggestions">
        <?php 
        for( $i = 1; $i <= 4 ; $i++ ):
          $prod_id_var_name = 'prodotto_'.$i.'_id';
          $the_prod_id = $$prod_id_var_name;
          #-----------------------------------------------------------
          $wp_product = wc_get_product( $the_prod_id );
          $the_prod_title = $wp_product->get_name();
          $the_prod_permalink = get_permalink( $wp_product->get_id() );
          $the_prod_pic_id = $wp_product->get_image_id();
          $the_prod_thumbnail = get_the_post_thumbnail_url( $the_prod_id , 'dk_hc_custom_size_600' );
        ?>
        <!-- col -->
        <div class="dk_hc_col dk_hc_col_3 dk_hc_suggestion">
          <div class="dk_hc_col_inner">
            <div class="dk_prod_wrapper">
              <a href="<?php echo $the_prod_permalink; ?>" alt="<?php $the_prod_title; ?>" title="<?php $the_prod_title; ?>">
                <div class="dk_prod_pic">
                  <img src="<?php echo $the_prod_thumbnail; ?>" alt="<?php echo $the_prod_title; ?>">
                </div>
                <div class="dk_prod_title">
                  <?php echo $the_prod_title; ?>
                </div>
              </a>
            </div>
          </div>
        </div>
        <!-- col / -->
        <?php endfor; ?>
        <div class="dk_clear_float"></div>
      </div>
      <!-- row / -->

      <!-- row -->
      <div class="dk_hc_row">
        <?php 
        for( $i = 5; $i <= 6 ; $i++ ):
          $prod_id_var_name = 'prodotto_'.$i.'_id';
          $the_prod_id = $$prod_id_var_name;
          #-----------------------------------------------------------
          $wp_product = wc_get_product( $the_prod_id );
          $the_prod_title = $wp_product->get_name();
          $the_prod_permalink = get_permalink( $wp_product->get_id() );
          $the_prod_pic_id = $wp_product->get_image_id();
          $the_prod_thumbnail = get_the_post_thumbnail_url( $the_prod_id , 'dk_hc_custom_size_600' );
        ?>
        <!-- col -->
        <div class="dk_hc_col dk_hc_col_3">
          <div class="dk_hc_col_inner_spacing">
            <div class="dk_prod_wrapper">
              <a href="<?php echo $the_prod_permalink; ?>" alt="<?php echo $the_prod_title; ?>" title="<?php echo $the_prod_title; ?>">
                <div class="dk_prod_pic">
                  <img src="<?php echo $the_prod_thumbnail; ?>" alt="<?php echo $the_prod_title; ?>">
                </div>
                <div class="dk_prod_title">
                  <?php echo $the_prod_title; ?>
                </div>
              </a>
            </div>
          </div>
        </div>
        <!-- col / -->
        <?php endfor; ?>
        <?php 
        for( $i = 1 ; $i <= 2; $i++ ):
          $post_id_var_name = 'post_'.$i.'_id';
          $the_post_id = $$post_id_var_name;
          #-----------------------------------------------------------
          $the_post_title = get_the_title($the_post_id);
          $the_post_thumbnail = get_the_post_thumbnail_url( $the_post_id , 'dk_hc_custom_size_600' );
          $the_post_permalink = get_permalink( $the_post_id );
        ?>
        <!-- col -->
        <div class="dk_hc_col dk_hc_col_3">
          <div class="dk_hc_col_inner">
            <div class="dk_prod_wrapper">
              <a href="<?php echo $the_post_permalink; ?>" alt="<?php echo $the_post_title; ?>" title="<?php echo $the_post_title; ?>">
                <div class="dk_prod_pic">
                  <img src="<?php echo $the_post_thumbnail; ?>" alt="<?php echo $the_post_title; ?>">
                </div>
                <div class="dk_prod_title">
                  <?php echo $the_post_title; ?>
                </div>
              </a>
            </div>
          </div>
        </div>
        <!-- col / -->
        <?php endfor; ?>
        <div class="dk_clear_float"></div>
      </div>
      <!-- row / -->

      <!-- row -->
      <div class="dk_hc_row">
        <!-- col -->
        <div class="dk_hc_col">
          <a href="/hair-check" class="dk_hc_link">Compila un nuovo questionario</a>
        </div>
        <!-- col / -->
      </div>
      <!-- row / -->
    </section>
    <!-- section / -->

    <!-- section -->
    <section>
      <div class="dk_hc_row dk_hc_adv">
        <div class="dk_hc_col_12">
          <h1>Hai mai provato Hydrafacial Keravive?</h1>
        </div>
        
        <!-- col -->
        <div class="dk_hc_col dk_hc_col_4">
          <div class="dk_hc_adv_pic">
            <img src="<?php echo $the_uploads_dir['baseurl'] . '/customs/'; ?>trattamento-hydrafacial-keravive.jpeg" />
          </div>
        </div>
        <!-- col / -->
        
        <!-- col -->
        <div class="dk_hc_col dk_hc_col_8 dk_hc_adv_claim">
          <p>
            Il nostro centro benessere ad Avellino <strong>(NGN Store)</strong> é un laboratorio con tecnologie e personale altamente specializzati. 
            <strong>Hydrafacial Keravive</strong> é un trattamento medico estetico che deterge, stimola e nutre in profondità il cuoio capelluto. 
            É indicato per migliorare i trattamenti anticaduta e per ottenere capelli piu folti e brillanti. 
          </p>

          <a href="/hair-check" class="dk_hc_link">Richiedi maggiori informazioni</a>
        </div>
        <!-- col / -->

        <div class="dk_clear_float"></div>

      </div>
    </section>
    <!-- section / -->

  </div>
  <?php 
  //unset( $_SESSION[$session_dk_hc_response_key] );
}

get_footer();

?>