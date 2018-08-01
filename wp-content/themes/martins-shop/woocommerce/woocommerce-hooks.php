<?php

add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields', 30 );
// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {
    
    // remove filefds
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_company']);
    //unset($fields['billing']['billing_state']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_country']);
    unset($fields['order']['order_comments']);
    //$fields['billing']['billing_state']['options']['burgas'] = ['burgas', 'Бургас'];
// Change labels
    // first name
    $fields['billing']['billing_first_name']['placeholder'] = 'Вашето име...';
    $fields['billing']['billing_first_name']['label'] = 'Име';
    // last name
    $fields['billing']['billing_last_name']['placeholder'] = 'Вашата фамилия...';
    $fields['billing']['billing_last_name']['label'] = 'Фамилия';
    // address
    $fields['billing']['billing_address_1']['placeholder'] = 'Вашият адрес...';
    $fields['billing']['billing_address_1']['label'] = 'Адресс';    
    // емаил
    $fields['billing']['billing_email']['placeholder'] = 'Вашият имейл адрес ...';
    $fields['billing']['billing_email']['label'] = 'Имейл';  
    // пхоне
    $fields['billing']['billing_phone']['placeholder'] = 'Вашият телефонен номер ...';
    $fields['billing']['billing_phone']['label'] = 'Телефонен номер';  
    
    $fields['billing']['billing_city']['placeholder'] = 'Въведете вашият град...';
    $fields['billing']['billing_city']['label'] = 'Град';  
    

    $fields['order']['order_comments']['type'] = 'textarea';
    $fields['order']['order_comments']['placeholder'] = 'В това поле въведете коментари към поръчката...';
    $fields['order']['order_comments']['label'] = 'Допълнителна информация';  
    // return changes
    return $fields;
}

	/**   =======   Woocommerce Hooks    =======    **/

remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
	

