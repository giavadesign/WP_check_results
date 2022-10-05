<?php 


#-----------------------------------------------------------
$genders = array(
  'm' => 'UOMO',
  'f' => 'DONNA',
);
#-----------------------------------------------------------
$eta_ranges = array(
  '0' => 'Fino a 30 anni',
  '1' => 'Da 31 a 48 anni',
  '2' => 'Da 49 a 64 anni',
  '3' => 'Da 65 anni in su'
);
#-----------------------------------------------------------
$jumbotrons = array();
$jumbotrons['m']['title'] = 'Hair Check - Uomo';
$jumbotrons['m']['subtitle'] = 'Imposta prodotti e articoli relativi ai risultati del quiz per il sesso maschile.';
$jumbotrons['f']['title'] = 'Hair Check - Donna';
$jumbotrons['f']['subtitle'] = 'Imposta prodotti e articoli relativi ai risultati del quiz per il sesso maschile.';
#-----------------------------------------------------------


/*=============================================
domande
=============================================*/
#-----------------------------------------------------------
$arr_qstns = array();
#-----------------------------------------------------------
$arr_qstns[2]['domanda']['slug'] = 'problematica';
$arr_qstns[2]['domanda']['testo'] = 'Problematica';

$arr_qstns[2]['risposte'][0]['slug'] = 'alopecia';
$arr_qstns[2]['risposte'][0]['testo'] = 'Alopecia';
$arr_qstns[2]['risposte'][1]['slug'] = 'effluvio';
$arr_qstns[2]['risposte'][1]['testo'] = 'Effluvio';
$arr_qstns[2]['risposte'][2]['slug'] = 'disidratamento';
$arr_qstns[2]['risposte'][2]['testo'] = 'Disidratamento generalizzato';
$arr_qstns[2]['risposte'][3]['slug'] = 'nessuna';
$arr_qstns[2]['risposte'][3]['testo'] = 'Nessuna problematica';

$arr_qstns[2]['suggested_products'] = 2;
$arr_qstns[2]['suggested_posts'] = 1;
#-----------------------------------------------------------
$arr_qstns[3]['domanda']['slug'] = 'tipologia';
$arr_qstns[3]['domanda']['testo'] = 'Tipologia';

$arr_qstns[3]['risposte'][0]['slug'] = 'lisci';
$arr_qstns[3]['risposte'][0]['testo'] = 'Lisci';
$arr_qstns[3]['risposte'][1]['slug'] = 'mossi';
$arr_qstns[3]['risposte'][1]['testo'] = 'Mossi';
$arr_qstns[3]['risposte'][2]['slug'] = 'ricci';
$arr_qstns[3]['risposte'][2]['testo'] = 'Ricci';
$arr_qstns[3]['risposte'][3]['slug'] = 'afro';
$arr_qstns[3]['risposte'][3]['testo'] = 'Afro';

$arr_qstns[3]['suggested_products'] = 1;
$arr_qstns[3]['suggested_posts'] = 0;
#-----------------------------------------------------------
$arr_qstns[5]['domanda']['slug'] = 'apparenza';
$arr_qstns[5]['domanda']['testo'] = 'Come risultano alla vista e al tatto';

$arr_qstns[5]['risposte'][0]['slug'] = 'secchi';
$arr_qstns[5]['risposte'][0]['testo'] = 'Secchi o sfibrati';
$arr_qstns[5]['risposte'][1]['slug'] = 'oleosi';
$arr_qstns[5]['risposte'][1]['testo'] = 'Oleosi o Grassi';
$arr_qstns[5]['risposte'][2]['slug'] = 'normali';
$arr_qstns[5]['risposte'][2]['testo'] = 'Normali';
$arr_qstns[5]['risposte'][3]['slug'] = 'setosi_lucenti';
$arr_qstns[5]['risposte'][3]['testo'] = 'Setosi e luncenti';

$arr_qstns[5]['suggested_products'] = 1;
$arr_qstns[5]['suggested_posts'] = 1;
#-----------------------------------------------------------
$arr_qstns[6]['domanda']['slug'] = 'stress';
$arr_qstns[6]['domanda']['testo'] = 'Livello di stress';

$arr_qstns[6]['risposte'][0]['slug'] = 'a';
$arr_qstns[6]['risposte'][0]['testo'] = '0 - 1';
$arr_qstns[6]['risposte'][1]['slug'] = 'b';
$arr_qstns[6]['risposte'][1]['testo'] = '2 - 3';
$arr_qstns[6]['risposte'][2]['slug'] = 'c';
$arr_qstns[6]['risposte'][2]['testo'] = '4 e +';

$arr_qstns[6]['suggested_products'] = 1;
$arr_qstns[6]['suggested_posts'] = 0;
#-----------------------------------------------------------
$arr_qstns[7]['domanda']['slug'] = 'forfora_cute';
$arr_qstns[7]['domanda']['testo'] = 'Punteggio forfora e cute';

$arr_qstns[7]['risposte'][0]['slug'] = 'a';
$arr_qstns[7]['risposte'][0]['testo'] = '0 - 1';
$arr_qstns[7]['risposte'][1]['slug'] = 'b';
$arr_qstns[7]['risposte'][1]['testo'] = '2 - 3';
$arr_qstns[7]['risposte'][2]['slug'] = 'c';
$arr_qstns[7]['risposte'][2]['testo'] = '4 e +';

$arr_qstns[7]['suggested_products'] = 1;
$arr_qstns[7]['suggested_posts'] = 0;
#-----------------------------------------------------------

/* ===================  domande  =================*/
?>