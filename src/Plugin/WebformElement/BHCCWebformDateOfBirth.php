<?php

namespace Drupal\bhcc_webform_date\Plugin\WebformElement;

use Drupal\localgov_forms_date\Plugin\WebformElement\LocalgovFormsDOB;

/**
 * Provides a 'bhcc_webform_date_of_birth' element.
 *
 * @WebformElement(
 *   id = "bhcc_webform_date_of_birth",
 *   label = @Translation("BHCC Date Of Birth"),
 *   description = @Translation("Provides a webform element example."),
 *   category = @Translation("Composite elements"),
 *   multiline = TRUE,
 *   composite = TRUE,
 *   states_wrapper = TRUE,
 * )
 *
 * @see \Drupal\webform_example_composite\Element\WebformExampleComposite
 * @see \Drupal\webform\Plugin\WebformElement\WebformCompositeBase
 * @see \Drupal\webform\Plugin\WebformElementBase
 * @see \Drupal\webform\Plugin\WebformElementInterface
 * @see \Drupal\webform\Annotation\WebformElement
 */
class BHCCWebformDateOfBirth extends BHCCWebformDate {

}
