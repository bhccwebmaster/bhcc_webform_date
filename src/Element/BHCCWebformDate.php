<?php

namespace Drupal\bhcc_webform_date\Element;

/* use Drupal\Component\Utility\Html;
use Drupal\Core\Render\Element;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Utility\NestedArray;
use Drupal\bhcc_webform\BHCCWebformHelper;
use Drupal\webform\Element\WebformCompositeBase;
use Drupal\webform\Utility\WebformArrayHelper;
use Drupal\Core\Datetime\DateHelper; */
use Drupal\localgov_forms_date\Element\LocalgovFormsDate;

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

}
