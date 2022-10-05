<?php 

/**
  * Plugin Name:       [DK] - DK Hair Check Result
  * Plugin URI:        https://www.a5studio.net/
  * Description:       Plugin per gestire i risultati dinamici del questionario hair check, consigliando prodotti e articoli relativi ad ogni risultato ottenuto
  * Version:           1.0
  * Requires PHP:      7.2+
  * Author:            Angelo Giava
  * Author URI:        https://www.giavadesign.it
  * License:           GPL v2 or later
  * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
  * Text Domain:       dk_hair_check_results
  * Domain Path:       /languages
  */
?>
<?php 

namespace dk_hair_check_results; 

if(!defined('WPINC')){
  die();
}

define( 'DK_HAIR_CHECK_RESULTS_DIR' , dirname(__FILE__) );
define( 'DK_HAIR_CHECK_RESULTS_DIR_URL' , plugin_dir_url(__FILE__) );
define( 'DK_HAIR_CHECK_RESULTS_PATH' , plugin_dir_path(__FILE__) );

//add_option( 'dk_hc_results_page_is_created' , 'false' );


###############################################
// Attivazione plugin
#----------------------------------------------
register_activation_hook( __FILE__ , __NAMESPACE__ . '\dk_hair_check_results_activation_fn' );
function dk_hair_check_results_activation_fn(){
  require_once ( DK_HAIR_CHECK_RESULTS_DIR . '/includes/class-hair_check_results-___activator.php');
  DK_HAIR_CHECK_RESULTS_Activator::dk_hair_check_results_attivazione();
}
#----------------------------------------------
# Attivazione plugin  /
###############################################


###############################################
// Disattavazione plugin
#----------------------------------------------
register_deactivation_hook( __FILE__ , __NAMESPACE__ . '\dk_hair_check_results_deactivation_fn' );
function dk_hair_check_results_deactivation_fn(){
  require_once ( DK_HAIR_CHECK_RESULTS_DIR . '/includes/class-hair_check_results-___deactivator.php' );
  DK_HAIR_CHECK_RESULTS_Deactivator::dk_hair_check_results_disattivazione();
}
#----------------------------------------------
# Disattavazione plugin  /
###############################################

###############################################
// Disinstallazione plugin
#----------------------------------------------
register_uninstall_hook( __FILE__ , __NAMESPACE__ . '\dk_hair_check_results_uninstall_fn' );
function dk_hair_check_results_uninstall_fn(){
  require_once ( DK_HAIR_CHECK_RESULTS_DIR . '/includes/class-hair_check_results-___unistallator.php' );
  DK_HAIR_CHECK_RESULTS_Unistallator::dk_hair_check_results_unistall();
}
#----------------------------------------------
# Disattavazione plugin  /
###############################################





/*=========================  Main class  =========================*/
require_once( DK_HAIR_CHECK_RESULTS_DIR . '/includes/class-hair_check_results.php' );
$starter = new CLS_DK_HAIR_CHECK_RESULTS();
/*=========================  Main class  =========================*/


?>