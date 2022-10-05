<?php 

if( isset( $_POST ) ){
  if( 
    isset( $_REQUEST['submit_post'] ) &&
    wp_verify_nonce( $_REQUEST['submit_post'], 'dk_hc_gender_settings' )
    ){

    #-----------------------------------------------------------
    $the_index_sesso = $_POST['index_sesso'];
    #-----------------------------------------------------------
    
    foreach( $_POST as $key => $val){
      if( substr( $key , 0, 6 ) == 'hc--s_' ){
        
        $the_select_name = $key;
        $the_select_val = $val;

        update_option( $the_select_name , sanitize_text_field( $the_select_val ) );
        
      }
    }

  }
}
?>