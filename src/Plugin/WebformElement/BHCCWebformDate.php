<?php

namespace Drupal\bhcc_webform_date\Plugin\WebformElement;

use Drupal\Core\Form\FormStateInterface;
use Drupal\localgov_forms_date\Plugin\WebformElement\LocalgovFormsDate;

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
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    unset($form['validation']['date_container']['date_max']);
    unset($form['validation']['date_container']['date_min']);

    return $form;
  }

}
