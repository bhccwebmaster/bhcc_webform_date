<?php

declare(strict_types = 1);

namespace Drupal\Tests\bhcc_webform_date_of_birth;

use Drupal\Tests\BrowserTestBase;

/**
 * Tests bhcc_webform_date_of_birth.
 *
 * Tests the BHCC Date of birth Webform element in the context of a Multipage
 * Webform.
 */
class DateOfBirthErrorFormatTest extends BrowserTestBase {

  /**
   * Test for out of range date.
   *
   * Set bhcc_webform_date_of_birth elememt with
   * a date outside the specified range.
   * (using #date_date_min and #date_date_max),
   * should be in the format d/m/Y.
   *
   * Test steps:
   *
   * Uses a Webform with bhcc_webform_date_of_birth
   * element using #date_date_min set to 1/1/2023.
   *
   * Fills in the date field with 1/1/1900,
   * click the "Submit" button and assert
   * error message with correct date format.
   */
  public function testDateErrorFormat() :void {

    // Load the first page of the form.
    $this->drupalGet('/webform/test_dob_error_format_form');

    // Fill in the date element and then proceed to the next page.
    $form_values = [
      'first_date[day]'   => 1,
      'first_date[month]' => 1,
      'first_date[year]'  => 1900,
    ];
    $this->submitForm($form_values, 'Submit');

    // Get todays date.
    /*     $current_time = \Drupal::time()->getCurrentTime();
    $timenow = $current_time->format('d/m/Y'); */
    // Assert that the error message is present and in the correct format.
    $this->assertSession()->pageTextContains('Minimum Today Date must be on or after 01/01/2023');
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
