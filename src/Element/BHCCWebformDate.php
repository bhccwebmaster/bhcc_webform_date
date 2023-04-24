<?php

namespace Drupal\bhcc_webform_date\Element;

use Drupal\localgov_forms_date\Element\LocalgovFormsDate;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\StringTranslation\TranslatableMarkup;

/**
 * Provides a 'bhcc_webform_date'.
 *
 * Webform composites contain a group of sub-elements.
 *
 * IMPORTANT:
 * Webform composite can not contain multiple value elements (i.e. checkboxes)
 * or composites (i.e. webform_address)
 *
 * @FormElement("bhcc_webform_date")
 *
 * @see \Drupal\webform\Element\WebformCompositeBase
 * @see \Drupal\webform_example_composite\Element\WebformExampleComposite
 */
class BHCCWebformDate extends LocalgovFormsDate {

  /**
   * {@inheritdoc}
   */
  public function getInfo() {

    $today = strtotime('now');
    $todayFormat = date('d/m/Y', $today);
    $description = 'For example ' . $todayFormat;
    $parentInfo = parent::getInfo();
    $childInfo = [
      '#description' => $description,
    ];
    $returnInfo = array_replace($parentInfo, $childInfo);
    return $returnInfo;
  }

  /**
   * {@inheritdoc}
   */
  public static function validateDatelist(&$element, FormStateInterface $form_state, &$complete_form) {

    // Only process if it is of type
    // Bhcc_webform_date or bhcc_webform_date_of_birth.
    if ($element['#type'] != "bhcc_webform_date" && $element['#type'] != "bhcc_webform_date_of_birth") {
      return;
    }
    parent::validateDatelist($element, $form_state, $complete_form);

    $form_errors = $form_state->getErrors();
    if ($form_errors) {
      $form_state->clearErrors();
      foreach ($form_errors as $error_key => $error_value) {
        if ($error_value instanceof TranslatableMarkup) {

          // If arguments are null then this has already been dealt with.
          if (NULL != $error_value->getArguments()) {

            $date_placeholder = $error_value->getArguments();
            if (isset($date_placeholder['%min']) || isset($date_placeholder['%max'])) {

              // Format error into correct date format (dd-mm-YYYY)
              // if the date has min or max allowable values.
              if (isset($date_placeholder['%min'])) {
                $date = date('d-m-Y', strtotime($date_placeholder['%min']));
                $error_string = t('@element_name must be on or after @date', [
                  '@element_name' => $date_placeholder['%name'],
                  '@date' => $date,
                ]);
              }
              else {
                $date = date('d-m-Y', strtotime($date_placeholder['%max']));
                $error_string = " must be on or before ";
                $error_string = t('@element_name must be on or before @date', [
                  '@element_name' => $date_placeholder['%name'],
                  '@date' => $date,
                ]);
              }

              unset($error_value);
              $form_state->setErrorByName($error_key, $error_string);
            }
            else {
              // This handles required fields where argument
              // '%field' is used add it back in.
              $form_state->setErrorByName($error_key, $error_value);
            }
          }
        }
        else {
          // Add back in all other errors.
          $form_state->setErrorByName($error_key, $error_value);
        }
      }
    }
  }

}
