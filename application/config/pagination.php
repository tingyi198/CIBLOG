<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// $config['base_url']           = FALSE; // 跳轉的網址，由外部設定
// $config['per_page']           = FALSE; // 每頁最多的數量，由外部設定
// $config['total_rows']         = FALSE; // 想要分頁的總筆數，由外部設定
// $config['uri_segment']        = FALSE; // URI 哪個字段包含了頁數。因為使用 'page_query_string' 所以該參數無效
// $config['num_links']             = 2; // 設定當前頁的前後與後頁的分頁數量，如設定2，代表有2個前頁+2個後頁

$config['use_page_numbers']      = FALSE; // 在 URI 顯示你要分頁項目的索引編號，而不是頁數
$config['page_query_string']     = TRUE; // 不使用字段而使用 GET，可方便 offset 自動對應
$config['enable_query_strings']  = TRUE; // 啟用，若要使用 'page_query_string'
$config['query_string_segment']  = 'offset'; // "per_page" 是預設的分頁變數字串，可自訂
$config['reuse_query_string']    = TRUE; // TRUE 當網有 GET 參數的時候，換頁能連帶參數前往下一頁

$config['prefix']                = ''; // 給頁數添加前綴，如 offset=prefix2
$config['suffix']                = ''; // 給頁數添加後綴，如 offset=prefix2suffix
$config['use_global_url_suffix'] = FALSE; // TRUE 會使用 application/config/config.php 中的 $config['url_suffix']，重寫 $config['suffix'] 的值。

$config['full_tag_open']         = '<div class="btn-group justify-content-center">';
$config['full_tag_close']        = '</div>';

$config['first_link']            = '<<';
$config['first_tag_open']        = '<button type="button" class="btn btn-secondary">';
$config['first_tag_close']       = '</button>';
$config['first_url']             = '';

$config['last_link']             = '>>';
$config['last_tag_open']         = '<button type="button" class="btn btn-secondary">';
$config['last_tag_close']        = '</button>';

$config['next_link']             = '>';
$config['next_tag_open']         = '<button type="button" class="btn btn-secondary">';
$config['next_tag_close']        = '</button>';

$config['prev_link']             = '<';
$config['prev_tag_open']         = '<button type="button" class="btn btn-secondary">';
$config['prev_tag_close']        = '</button>';

$config['cur_tag_open']          = '<button type="button" class="btn btn-secondary active">';
$config['cur_tag_close']         = '</button>';

$config['num_tag_open']          = '<button type="button" class="btn btn-secondary">';
$config['num_tag_close']         = '</button>';

$config['display_pages']         = TRUE; // 顯示分頁數字，FALSE 僅出現上一頁/下一頁

// 添加屬性如 $config['attributes']   = ['class' => 'myclass'];
$config['attributes']            = FALSE;
