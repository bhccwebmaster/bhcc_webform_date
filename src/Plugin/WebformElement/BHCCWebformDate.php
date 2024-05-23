<?php

namespace Drupal\bhcc_webform_date\Plugin\WebformElement;

/* use Drupal\Core\Datetime\DateHelper;
use Drupal\Core\Form\FormStateInterface;
use Drupal\webform\Plugin\WebformElement\WebformCompositeBase;
use Drupal\webform\WebformSubmissionInterface; */
use Drupal\localgov_forms_date\Plugin\WebformElement\LocalgovFormsDate;

use Drupal\Core\Datetime\Entity\DateFormat;
use Drupal\Core\Form\FormStateInterface;
//use Drupal\webform\Plugin\WebformElement\DateList;

/**
 * Provides a 'bhcc_webform_date' element.
 *
 * @WebformElement(
 *   id = "bhcc_webform_date",
 *   label = @Translation("BHCC Date"),
 *   description = @Translation("Provides a webform element example."),
 *   category = @Translation("Composite elements"),
 *   multiline = TRUE,
 *   composite = TRUE,
 *   states_wrapper = TRUE,
 * )
 *
 * @see Drupal\localgov_forms_date\Plugin\WebformElement\LocalgovFormsDate
 */
class BHCCWebformDate extends LocalgovFormsDate {


  /**
   * {@inheritDoc}
   *
   * Overrides the Datebase class so that
   * date validation error messages display in
   * a UK Style format e.g dd-mm-yyyy.
   */
  public static function validateDate(&$element, FormStateInterface $form_state, &$complete_form) {
    parent::validateDate($element, $form_state, $complete_form);

    // get the error and strip out anything after the space - the time part

    if (!empty($form_state->getError($element))) {
      $form_errors = $form_state->getErrors();
      //$form_state->clearErrors();
      foreach ($form_errors as $error_key => $error_value) {
        $arguments = $error_value->getArguments();
        $string = $error_value->getUntranslatedString();
        if (str_contains($string, '%name must be on or before %max.') || str_contains($string, '%name must be on or after %min.')) {
          //strip the time from argument 2 - %max
          $arguments['%max'] = substr($arguments['%max'], 0, strrpos($arguments['%max'], ' '));
        }
      }
    }
  }

}
