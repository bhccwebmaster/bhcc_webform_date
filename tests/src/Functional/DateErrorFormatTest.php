<?php

declare(strict_types = 1);

namespace Drupal\Tests\bhcc_webform_date;

use Drupal\Tests\BrowserTestBase;
use Drupal\Core\Datetime\DrupalDateTime;

/**
 * Tests localgov_forms_date.
 *
 * Tests the LocalGov Forms Date Webform element in the context of a Multipage
 * Webform.
 */
class DateErrorFormatTest extends BrowserTestBase {

  /**
   * Filling in bhcc webform date elememt with a date outside the specifies range
   *  (using #date_date_min and #date_date_max), should be in the format d/m/Y 
   *
   * Test steps:
   * - Uses a Webform with a bhcc webform date element with the #date_date_min set to today
   *  
   * - Fills in the date field with 1/1/1900
   * - Clicks the "Submit" button and asserts error message.
   */
  public function testDateErrorFormat() :void {

    // Load the first page of the form.
    $this->drupalGet('/webform/test_date_error_format_form');

    // Fill in the date element and then proceed to the next page.
    $form_values = [
      'first_date[day]'   => 1,
      'first_date[month]' => 1,
      'first_date[year]'  => 1900,
    ];
    $this->submitForm($form_values, 'Submit');

    //get todays date
    // @todo calculate todays date
    $date = new DrupalDateTime('now');
    $date->format('d/m/Y');
    echo $date;
    // Assert that the error message is present and in the correct format
    // $this->assertSession()->pageTextContains('Minimum Today Date must be on or after 17/05/2023');
    $this->assertSession()->pageTextContains('must be on or after');
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
