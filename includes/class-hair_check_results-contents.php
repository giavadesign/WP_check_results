<?php 
/**
 * 
 * Classe per aggiunta contenuto html
 *  
*/

namespace dk_hair_check_results;

class DK_HAIR_CHECK_RESULTS_Contents {

  private $dk_hair_check_results_html;

  public function __construct(){

    
    add_action( "admin_menu", array( $this , 'dk_hair_check_add_menu_pages' ) );

    /*=============================================
    custom image size
    =============================================*/
    add_image_size( 'dk_hc_custom_size_600', 600, 600, true );
    #-----------------------------------------------------------
    add_filter( 'image_size_names_choose', array( $this ,'wpb_custom_image_sizes' ) );
    /* ===================  custom image size  =================*/
 
  }

	public function dk_body_check_results_main_function(){
		
		// die( 'Funzione principale' );
		
	}
  
  public function dk_hair_check_add_menu_pages(){
		
		add_menu_page(
      'Hair Check', //$page_title
      'Hair Check', //$menu_title
      'manage_options', //$capability
      'dk_hair_check_settings_main_page',  //$menu_slug
      array( $this , 'dk_hair_check_settings_main_page_function' ), //$function
      'dashicons-clipboard', //$icon_url
      40  //$position
    );

    add_submenu_page(
      'dk_hair_check_settings_main_page', //$parent_slug,
      'Hair Check - Uomo', //$page_title,
      'Uomo', // $menu_title,
      'manage_options',
      'dk_hair_check_settings_page_uomo', //$menu_slug,
      array( $this, 'dk_hair_check_settings_page_uomo_function' ) 
    );
    
    add_submenu_page(
      'dk_hair_check_settings_main_page', //$parent_slug,
      'Hair Check - Donna', //$page_title,
      'Donna', // $menu_title,
      'manage_options',
      'dk_hair_check_settings_page_donna', //$menu_slug,
      array( $this, 'dk_hair_check_settings_page_donna_function' ) 
    );
		
  }
  
  public function dk_hair_check_settings_main_page_function(){
    require( DK_HAIR_CHECK_RESULTS_DIR . '/templates/tpl_dk_hc_main_page.php' );
  }
  
  public function dk_hair_check_settings_page_uomo_function(){
    require( DK_HAIR_CHECK_RESULTS_DIR . '/templates/tpl_dk_hc_settings_uomo_page.php' ); 
  }
  
  public function dk_hair_check_settings_page_donna_function(){
    require( DK_HAIR_CHECK_RESULTS_DIR . '/templates/tpl_dk_hc_settings_donna_page.php' ); 
  }

  function wpb_custom_image_sizes( $size_names ) {
    $new_sizes = array(
        'dk_hc_custom_size_600' => 'Thumb per Hair Check Results', 
    );
    return array_merge( $size_names, $new_sizes );
  }

}
?>