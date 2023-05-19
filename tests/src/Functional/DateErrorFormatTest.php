<?php

declare(strict_types = 1);

namespace Drupal\Tests\bhcc_webform_date;

use Drupal\Tests\BrowserTestBase;

/**
 * Tests bhcc_webform_date.
 *
 * Tests the BHCC Date  Webform element in the context of a Multipage
 * Webform.
 */
class DateErrorFormatTest extends BrowserTestBase {

  /**
   * Test for out of range date.
   *
   * Set bhcc_webform_date elememt with
   * a date outside the specified range.
   * (using #date_date_min and #date_date_max),
   * should be in the format d/m/Y.
   *
   * Test steps:
   *
   * Uses a Webform with bhcc_webform_date element
   * using #date_date_min set to 1/1/2023.
   *
   * Fills in the date field with 1/1/1900,
   * click the "Submit" button and assert
   * error message with correct date format.
   */
  public function testDateErrorFormat() :void {

    $forms = [
      '/webform/test_date_error_format_form',
      '/webform/test_dob_error_format_form',
    ];

    foreach ($forms as $form) {

      // Load the form.
      $this->drupalGet($form);

      // Fill in the date element and then proceed to submit the page.
      $form_values = [
        'first_date[day]'   => 1,
        'first_date[month]' => 1,
        'first_date[year]'  => 1900,
        'second_date[day]'   => 1,
        'second_date[month]' => 1,
        'second_date[year]'  => 1900,
      ];
      $this->submitForm($form_values, 'Submit');

      // Assert that the error messages are present and in the correct format.
      $this->assertSession()->pageTextContains('Minimum Date 1/1/2023 must be on or after 01/01/2023');
      // Get todays date.
      $now = date('d/m/Y');
      $this->assertSession()->pageTextContains('Minimum Today Date must be on or after ' . $now);

    }
  }

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'localgov_forms_date',
    'localgov_forms_date_test',
    'bhcc_webform_date',
    'bhcc_webform_date_test',
  ];

  /**
   * {@inheritdoc}
   */
  protected $defaultTheme = 'stark';

}
