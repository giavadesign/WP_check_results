<?php 

/**
 * 
 * classe di disattivazione 
 * 
*/

namespace dk_hair_check_results; 

class DK_HAIR_CHECK_RESULTS_Unistallator {
  
  public static function dk_hair_check_results_unistall() {
    
     #-----------------------------------------------------------
     require( DK_HAIR_CHECK_RESULTS_DIR . '/includes/inc_settings.php' );
     #-----------------------------------------------------------
     
    /*=========================  elimino valori fields  =========================*/
    foreach( $arr_qstns as $question_key => $question_obj ){
      foreach( $question_obj['risposte'] as $risposta_key => $risposta_obj ){
        foreach( $genders as $gender_key => $gender_val ){
          foreach( $eta_ranges as $eta_key => $eta_val ){
            for( $i = 1 ; $i<= $question_obj['suggested_products']; $i++){
              $tb_option_name = 'hc--s_'.$gender_key.'-e_'.$eta_key.'-d_'.$question_key.'-r_'.$risposta_key.'-prod_'.$i;
              delete_option( $tb_option_name , sanitize_text_field( '' ) );
            }
            for( $i = 1 ; $i<= $question_obj['suggested_posts']; $i++){
              $tb_option_name = 'hc--s_'.$gender_key.'-e_'.$eta_key.'-d_'.$question_key.'-r_'.$risposta_key.'-post_'.$i;
              delete_option( $tb_option_name , sanitize_text_field( '' ) );
            }

          }
        }
      }
    }   
    /*=========================  elimino valori fields /  =========================*/
  }
}
?>