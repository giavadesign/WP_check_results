<?php 

/**
 * 
 * classe di attivazione 
 * 
*/

namespace dk_hair_check_results; 

class DK_HAIR_CHECK_RESULTS_Activator {

  public static function dk_hair_check_results_attivazione() {

    // echo 'sono dentro la fase di attivazione'; die();

    //require( DK_HAIR_CHECK_RESULTS_DIR . '/includes/inc_settings.php' );

    /*=========================  creo riferimento epr nuova pagina  =========================*/
    add_option( 'dk_hc_results_page_is_created' , 'false' );
    /*=========================  creo riferimento epr nuova pagina  / =========================*/

    /*
    foreach( $indici as $gender_key => $ranges_eta ){
      foreach( $ranges_eta as $eta_key => $imcs ){
        foreach( $imcs as $imc_key => $imc_val ){
          for( $i = 1 ; $i<= $nr_suggested_products ; $i++){
            
            $the_prod_field_name = 'field-' . $gender_key . '-' . $eta_key . '-' . $imc_key . '-prod_' . $i;
            update_option( $the_prod_field_name , sanitize_text_field( '' ) );
            
            $the_post_field_name = 'field-' . $gender_key . '-' . $eta_key . '-' . $imc_key . '-post_' . $i;
            update_option( $the_post_field_name , sanitize_text_field( '' ) );

          }
        }
      }
    }
    */

  }
}
?>