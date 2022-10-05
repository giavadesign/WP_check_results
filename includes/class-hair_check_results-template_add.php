<?php 
/**
 * 
 * Classe per aggiunta template personalizzato per visualizzazione risultati quiz
 *  
*/

namespace dk_hair_check_results; 

class CLS_DK_HAIR_CHECK_Template_Add {

  public function __construct(){
    
    // aggiungo custom template al tema
    add_filter( 'theme_page_templates' , array( $this , 'DK_HAIR_CHECK_RESULTS_custom_template_add_fn') , 10 , 3  );

    // sovrascrivo template
    add_filter( 'template_include' , array( $this, 'DK_HAIR_CHECK_RESULTS_custom_template_include_fn' ) , 10 , 1  );

  }

  public function DK_HAIR_CHECK_RESULTS_custom_template_add_fn( $templates , $theme_obj , $post_obj ){

    $templates['tpl-hair_check-user_results.php'] = 'DK Hair Check User Results';

    return $templates;
  }
 
  public function DK_HAIR_CHECK_RESULTS_custom_template_include_fn( $template ){
    
    $is_page_hair_check_result_template = is_page_template( 'tpl-hair_check-user_results.php' );
    
    if( $is_page_hair_check_result_template ){
      // verifico che il template nonesista già nel tema
      $file_exists = file_exists( get_stylesheet_directory() . 'tpl-hair_check-user_results.php' );
      if( $file_exists ){ // se esiste fornisco quella del template
        return get_stylesheet_directory() . 'tpl-hair_check-user_results.php';
      }
      else{ // altrimenti restituisco quella del plugin
        return DK_HAIR_CHECK_RESULTS_PATH . '/page_templates/tpl-hair_check-user_results.php';
      }
    }
    return $template;
  }

}
?>