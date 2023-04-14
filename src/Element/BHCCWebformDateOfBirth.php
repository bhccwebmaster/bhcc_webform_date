<?php

namespace Drupal\bhcc_webform_date\Element;

use Drupal\localgov_forms_date\Element\LocalgovFormsDOB;

/**
 * Provides a 'bhcc_webform_date_of_birth'.
 *
 * Webform composites contain a group of sub-elements.
 *
 *
 * IMPORTANT:
 * Webform composite can not contain multiple value elements (i.e. checkboxes)
 * or composites (i.e. webform_address)
 *
 * @FormElement("bhcc_webform_date_of_birth")
 *
 * @see \Drupal\webform\Element\WebformCompositeBase
 * @see \Drupal\webform_example_composite\Element\WebformExampleComposite
 */
class BHCCWebformDateOfBirth extends LocalgovFormsDOB {

}
