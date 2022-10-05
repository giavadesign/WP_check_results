<?php 
/**
 * 
 * Classe per creazione pagina che avrà il suo template personalizzato
 *  
*/

namespace dk_hair_check_results; 

class CLS_DK_HAIR_CHECK_Insert_Page_Results {

  public function __construct(){
  
    // creo pagina risultati
    add_action( 'admin_init' , array( $this, 'DK_HAIR_CHECK_RESULTS_Insert_Page_fn' ) , 10 );

  }

  public function DK_HAIR_CHECK_RESULTS_Insert_Page_fn(){
    
    /*=========================  creo pagina se non esiste =========================*/
    $dk_hc_results_page_is_created = get_option( 'dk_hc_results_page_is_created' );
    #-----------------------------------------------------------
    if( $dk_hc_results_page_is_created == 'false' ){
      $dk_hc_page_result_args = array(
        'post_title' => 'Hair Check Results',
        'post_content' => 'Risultati Quiz Hair Check',
        'post_status' => 'publish',
        'post_author' => get_current_user_id(),
        'post_type' => 'page'
      );
      $dk_hc_page_result = wp_insert_post( $dk_hc_page_result_args ); // inserisco la pagina che restituisce l'id creato
      if( !is_wp_error( $dk_hc_page_result ) ){
        update_option( 'dk_hc_results_page_id' , $dk_hc_page_result );
        update_option( 'dk_hc_results_page_is_created' , 'true' );
        update_post_meta( $dk_hc_page_result , '_wp_page_template' , 'tpl-hair_check-user_results.php' );
      }
      else{
        $dk_hc_page_result->get_error_message();
      }
    }
    #-----------------------------------------------------------
  }

}
?>