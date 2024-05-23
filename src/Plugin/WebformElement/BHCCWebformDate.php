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

    $value = $element['#value'];
    $name = empty($element['#title']) ? $element['#parents'][0] : $element['#title'];
    $date_date_format = (!empty($element['#date_date_format'])) ? $element['#date_date_format'] : DateFormat::load('html_date')->getPattern();

    // Convert DrupalDateTime array and object to ISO datetime.
    if (is_array($value)) {
      $value = ($value['object']) ? $value['object']->format(DateFormat::load('html_datetime')->getPattern()) : '';
    }
    elseif ($value) {
      $datetime = WebformDateHelper::createFromFormat($date_date_format, $value);
      if ($datetime === FALSE || static::formatDate($date_date_format, $datetime->getTimestamp()) !== $value) {
        $form_state->setError($element, t('%name must be a valid date.', ['%name' => $name]));
        $value = '';
      }
      else {
        // Clear timestamp to date elements.
        if ($element['#type'] === 'date') {
          $datetime->setTime(0, 0, 0);
          $value = $datetime->format(DateFormat::load('html_date')->getPattern());
        }
        else {
          $value = $datetime->format(DateFormat::load('html_datetime')->getPattern());
        }
      }
    }

    $form_state->setValueForElement($element, $value);
    if ($value === '') {
      return;
    }

    $time = strtotime($value);

    // Ensure that the input is greater than the #date_date_min property, if set.
    if (!empty($element['#date_date_min'])) {
      $min = strtotime(static::formatDate('Y-m-d', strtotime($element['#date_date_min'])));
      if ($time < $min) {
        $form_state->setError($element, t('%name must be on or after %min.', [
          '%name' => $name,
          '%min' => static::formatDate($date_date_format, $min),
        ]));
      }
    }

    // Ensure that the input is less than the #date_date_max property, if set.
    if (!empty($element['#date_date_max'])) {
      $max = strtotime(static::formatDate('Y-m-d 23:59:59', strtotime($element['#date_date_max'])));
      if ($time > $max) {
        $form_state->setError($element, t('%name must be on or before %max.', [
          '%name' => $name,
          '%max' => static::formatDate($date_date_format, $max),
        ]));
      }
    }

    // Ensure that the input is greater than the #date_min property, if set.
    if (!empty($element['#date_min'])) {
      $min = strtotime($element['#date_min']);
      if ($time < $min) {
        $form_state->setError($element, t('%name must be on or after %min.', [
          '%name' => $name,
          '%min' => static::formatDate($date_date_format, $min),
        ]));
      }
    }

    // Ensure that the input is less than the #date_max property, if set.
    if (!empty($element['#date_max'])) {
      $max = strtotime($element['#date_max']);
      if ($time > $max) {
        $form_state->setError($element, t('%name must be on or before %max.', [
          '%name' => $name,
          '%max' => static::formatDate($date_date_format, $max),
        ]));
      }

    }
  }

}
