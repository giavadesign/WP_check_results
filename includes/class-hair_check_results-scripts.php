<?php 
/**
 * 
 * Classe per aggiunta stili e script
 *  
*/

namespace dk_hair_check_results;

class DK_HAIR_CHECK_RESULTS_Scripts {

  public function __construct(){

    // front end enqueue
    add_action('wp_enqueue_scripts' , array( $this , 'DK_HAIR_CHECK_RESULTS_Frontend_Scripts_fn' ) , 10 );
    
    // backend enqueue
    add_action('admin_enqueue_scripts', array( $this , 'DK_HAIR_CHECK_RESULTS_Backend_Scripts_fn' )  );

  }


  public function DK_HAIR_CHECK_RESULTS_Frontend_Scripts_fn(){

    if( is_page_template( 'tpl-hair_check-user_results.php' ) ){
      wp_enqueue_style( 'dk_hair_check_results_css', DK_HAIR_CHECK_RESULTS_DIR_URL . 'assets/css/dk_hair_check_results.css', array(), '1.0' );
      wp_enqueue_script( 'dk_hair_check_results_js', DK_HAIR_CHECK_RESULTS_DIR_URL . 'assets/js/dk_hair_check_results.js', array('jquery'), '1.0', false );
    }

  }
  
  public function DK_HAIR_CHECK_RESULTS_Backend_Scripts_fn(){

    wp_enqueue_style( 'dk_hair_check_results_css', DK_HAIR_CHECK_RESULTS_DIR_URL . 'assets/css/dk_hair_check_results_admin.css', array(), '1.0' );
    wp_enqueue_script( 'dk_hair_check_results_js', DK_HAIR_CHECK_RESULTS_DIR_URL . 'assets/js/dk_hair_check_results_admin.js', array('jquery'), '1.0', false );

  }


}
?>