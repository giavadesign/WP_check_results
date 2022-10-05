<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hair Check</title>
  <!-- bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
  <!-- bootstrap / -->
</head>
<body>

<div class="dk_page_title_wrapper">
  <div class="container">
    <h1>
      Hair Check
    </h1>
    <h3>
      Impostazioni generali
    </h3>
  </div>
</div>

  <!-- container -->
  <div class="container">
  

    <!-- dk_split_choose -->
    <div class="dk_split_choose">
      <div class="dk_split_choose_item">
        <div class="dk_split_choose_item_inner">
          <a href="<?php echo admin_url() . 'admin.php?page=dk_hair_check_settings_page_uomo'; ?>">
          <i class="dashicons dashicons-businessman"></i>
          <span>
            Uomo
          </span>
          </a>
        </div>
      </div>
      <div class="dk_split_choose_item">
        <div class="dk_split_choose_item_inner">
          <a href="<?php echo admin_url() . 'admin.php?page=dk_hair_check_settings_page_donna'; ?>">
            <i class="dashicons dashicons-businesswoman"></i>
            <span>
              Donna
            </span>
          </a>
        </div>
      </div>
    </div>
    <!-- dk_split_choose / -->
    
  </div>
  <!-- container / -->

  <!-- bootstrap -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
  <!-- bootstrap / -->
  
</body>
</html>