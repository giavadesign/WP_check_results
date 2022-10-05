<?php 
/**
 * 
 * Classe princiaple per starte plugin
 *  
*/

namespace dk_hair_check_results; 

require_once DK_HAIR_CHECK_RESULTS_DIR . '/includes/class-hair_check_results-___info.php';
require_once DK_HAIR_CHECK_RESULTS_DIR . '/includes/class-hair_check_results-scripts.php';
require_once DK_HAIR_CHECK_RESULTS_DIR . '/includes/class-hair_check_results-contents.php';
require_once DK_HAIR_CHECK_RESULTS_DIR . '/includes/class-hair_check_results-template_add.php';
require_once DK_HAIR_CHECK_RESULTS_DIR . '/includes/class-hair_check_results-insert_page_results.php';

class CLS_DK_HAIR_CHECK_RESULTS {

  private $versione;

  public function __construct(){

    $this->versione = DK_HAIR_CHECK_RESULTS_Info::VERSIONE;
    $this->dk_hair_check_results_load_dipendenze();
  
  }

  public function dk_hair_check_results_load_dipendenze(){

    $dk_hair_check_results_scripts =  new DK_HAIR_CHECK_RESULTS_Scripts();
    $dk_hair_check_results_contents =  new DK_HAIR_CHECK_RESULTS_Contents();
    $dk_hair_check_results_template_add =  new CLS_DK_HAIR_CHECK_Template_Add();
    $dk_hair_check_results_insert_page_results =  new CLS_DK_HAIR_CHECK_Insert_Page_Results();

  }

}

?>