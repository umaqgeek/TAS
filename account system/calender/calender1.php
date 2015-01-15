<?php


// set the default timezone to use. Available since PHP 5.1
date_default_timezone_set('GMT');


// Prints something like: Monday
echo date("l");

// Prints something like: Monday 8th of August 2005 03:12:46 PM
echo "<br/>". date('jS F Y ');
echo "<br/>" .date('h:i:s A');

?>

<?php

echo date('Y', strtotime('0000-00-00 00:00:00'));

/*
PHP 5.3.3
returns: -0001

PHP 5.2.10
returns: 1970
*/





function user_account_form_validate($form, &$form_state) {
  if ($form['#user_category'] == 'account' || $form['#user_category'] == 'register') {
    $account = $form['#user'];
    // Validate new or changing username.
    if (isset($form_state['values']['name'])) {
      if ($error = user_validate_name($form_state['values']['name'])) {
        form_set_error('name', $error);
      }
      elseif ((bool) db_select('users')->fields('users', array('uid'))->condition('uid', $account->uid, '<>')->condition('name', db_like($form_state['values']['name']), 'LIKE')->range(0, 1)->execute()->fetchField()) {
        form_set_error('name', t('The name %name is already taken.', array('%name' => $form_state['values']['name'])));
      }
    }

    // Trim whitespace from mail, to prevent confusing 'e-mail not valid'
    // warnings often caused by cutting and pasting.
    $mail = trim($form_state['values']['mail']);
    form_set_value($form['account']['mail'], $mail, $form_state);

    // Validate the e-mail address, and check if it is taken by an existing user.
    if ($error = user_validate_mail($form_state['values']['mail'])) {
      form_set_error('mail', $error);
    }
    elseif ((bool) db_select('users')->fields('users', array('uid'))->condition('uid', $account->uid, '<>')->condition('mail', db_like($form_state['values']['mail']), 'LIKE')->range(0, 1)->execute()->fetchField()) {
      // Format error message dependent on whether the user is logged in or not.
      if ($GLOBALS['user']->uid) {
        form_set_error('mail', t('The e-mail address %email is already taken.', array('%email' => $form_state['values']['mail'])));
      }
      else {
        form_set_error('mail', t('The e-mail address %email is already registered. <a href="@password">Have you forgotten your password?</a>', array('%email' => $form_state['values']['mail'], '@password' => url('user/password'))));
      }
    }

    // Make sure the signature isn't longer than the size of the database field.
    // Signatures are disabled by default, so make sure it exists first.
    if (isset($form_state['values']['signature'])) {
      // Move text format for user signature into 'signature_format'.
      $form_state['values']['signature_format'] = $form_state['values']['signature']['format'];
      // Move text value for user signature into 'signature'.
      $form_state['values']['signature'] = $form_state['values']['signature']['value'];

      $user_schema = drupal_get_schema('users');
      if (drupal_strlen($form_state['values']['signature']) > $user_schema['fields']['signature']['length']) {
        form_set_error('signature', t('The signature is too long: it must be %max characters or less.', array('%max' => $user_schema['fields']['signature']['length'])));
      }
    }
  }
}
?>