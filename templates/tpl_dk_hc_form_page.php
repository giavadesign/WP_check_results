<?php
#-----------------------------------------------------------
include( DK_HAIR_CHECK_RESULTS_DIR . '/includes/inc_settings.php' );
include( DK_HAIR_CHECK_RESULTS_DIR . '/includes/inc_get_items.php' );
include( DK_HAIR_CHECK_RESULTS_DIR . '/includes/inc_save_options.php' );
#-----------------------------------------------------------
?>

<div class="dk_page_title_wrapper">
  <div class="container">
    <h1>
      <?php echo $jumbotrons[$index_sesso]['title']; ?>
    </h1>
    <p>
      <?php echo $jumbotrons[$index_sesso]['subtitle']; ?>
    </p>
  </div>
</div>

<!-- content -->
<div class="container">

  <!-- form -->
  <form name="frm_dk_hc_gender_settings" action="" method="POST">

    <?php wp_nonce_field('dk_hc_gender_settings', 'submit_post'); ?>

    <!-- nav_tabs -->
    <ul class="nav nav-tabs" role="tablist">
      <?php 
      $c = 0;
      foreach( $eta_ranges as $eta_range_index => $eta_range_value ):
        $c++;
        $tab_active_class = ( $c == 1 ) ? 'active' : '';
      ?>
      <li class="nav-item">
        <a 
          class="nav-link <?php echo $tab_active_class; ?>" href="#pan_<?php echo $eta_range_index; ?>" 
          role="tab" data-toggle="tab"
        >
          <?php echo $eta_range_value; ?>
        </a>
      </li>
      <?php endforeach; ?>
    </ul>
    <!-- nav_tabs / -->

    <!-- tab_panes -->
    <div class="tab-content">
      <?php 
      $c = 0;
      foreach( $eta_ranges as $eta_range_index => $eta_range_value ):
        $c++;
        $pan_active_class = ( $c == 1 ) ? 'show active' : '';
      ?>
      <!-- tab_item -->
      <div 
        role="tabpanel" 
        class="tab-pane fade <?php echo $pan_active_class; ?>" 
        id="pan_<?php echo $eta_range_index;?>"
      >
        <?php foreach( $arr_qstns as $question_key => $question_obj ): ?>  
        <!-- question_card_wrapper -->
        <div class="dk_question_card_wrapper">
          <!-- question_title -->
          <div class="frm_dk_question_title">
            <span>
              <?php echo $question_obj['domanda']['testo']; ?>
            </span>
          </div>
          <!-- question_title / -->
          <!-- table -->
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col" width="150px">Risposta</th>
                <th scope="col">Prodotti</th>
                <th scope="col">Articoli</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              foreach( $question_obj['risposte'] as $risposta_key => $risposta_obj ):
              ?>
              <tr>
                <td>
                  <?php echo $risposta_obj['testo']; ?>
                </td>
                <td>
                  <?php 
                  for( $i = 1 ; $i<= $question_obj['suggested_products']; $i++):
                    #-----------------------------------------------------------
                    $the_select_name = 'hc--' . 's_' . $index_sesso . '-e_'.$eta_range_index .'-d_' . $question_key . '-r_' . $risposta_key . '-prod_' . $i;
                    $the_stored_value = esc_attr( get_option( $the_select_name ) );
                    #-----------------------------------------------------------
                  ?>
                  <select 
                    name="<?php echo $the_select_name; ?>" 
                    class="selectpicker border rounded" 
                    data-live-search="true" data-width="100%"
                    id="<?php echo $question_key . '|' .$risposta_key; ?>"
                    data-stored_value="<?php echo $the_stored_value; ?>"
                    data-select_name="<?php echo $select_name; ?>"
                    >
                    <option value="">
                      [ --- nessun prodotto selezionato ---]
                    </option>
                    <?php foreach( $dk_hc_prods as $prodotto ): ?>
                    <option 
                      <?php selected( $the_stored_value , $prodotto->ID ); ?>
                      value="<?php echo $prodotto->ID; ?>"
                    >
                      <?php echo $prodotto->post_title; ?>
                    </option>
                    <?php endforeach; ?>

                  </select>
                  <?php endfor; ?>
                </td>
                <td>
                  <?php 
                  for( $i = 1 ; $i<= $question_obj['suggested_posts']; $i++):
                    #-----------------------------------------------------------
                    $the_select_name = 'hc--' . 's_' . $index_sesso . '-e_'.$eta_range_index .'-d_' . $question_key . '-r_' . $risposta_key . '-post_' . $i;
                    $the_stored_value = esc_attr( get_option( $the_select_name ) );
                    #-----------------------------------------------------------
                    
                  ?>
                  <select 
                    name="<?php echo $the_select_name; ?>" 
                    class="selectpicker border rounded" 
                    data-live-search="true" data-width="100%"
                    id="<?php echo $question_key . '|' .$risposta_key; ?>"
                    data-stored_value="<?php echo $the_stored_value; ?>"
                    data-select_name="<?php echo $select_name; ?>"
                    >
                    <option value="">
                      [ --- nessun post selezionato ---]
                    </option>
                    <?php foreach( $dk_hc_posts as $articolo ): ?>
                    <option 
                      <?php selected( $the_stored_value , $articolo->ID ); ?>
                      value="<?php echo $articolo->ID; ?>"
                    >
                      <?php echo $articolo->post_title; ?>
                    </option>
                    <?php endforeach; ?>

                  </select>
                    <?php endfor; ?>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <!-- table / -->
        </div>
        <!-- question_card_wrapper / -->
        <?php endforeach; ?>
      </div>
      <!-- tab_item / -->
      <?php endforeach; ?>
    </div>
    <!-- tab_panes / -->
    

    <!-- row -->
    <div class="row">
      <!-- col -->
      <div class="col-md-12">
        <input type="hidden" name="index_sesso" value="<?php echo $index_sesso; ?>">
        <?php submit_button(); ?>
      </div>
      <!-- col / -->
    </div>
    <!-- row / -->
  </form>
  <!-- form / -->    
</div>
<!-- content / -->