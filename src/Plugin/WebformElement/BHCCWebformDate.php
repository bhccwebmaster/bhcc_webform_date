<?php

namespace Drupal\bhcc_webform_date\Plugin\WebformElement;

/* use Drupal\Core\Datetime\DateHelper;
use Drupal\Core\Form\FormStateInterface;
use Drupal\webform\Plugin\WebformElement\WebformCompositeBase;
use Drupal\webform\WebformSubmissionInterface; */
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
class BHCCWebformDate extends LocalgovFormsDate {}
