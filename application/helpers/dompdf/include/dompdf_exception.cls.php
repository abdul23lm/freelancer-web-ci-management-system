<?php
/**
 * @package dompdf
 * @link    http://dompdf.github.com/
 * @author  Abdul Latif Munjiat <abdul23lm@gmail.com>
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 */

/**
 * Standard exception thrown by DOMPDF classes
 *
 * @package dompdf
 */
class DOMPDF_Exception extends Exception {

  /**
   * Class constructor
   *
   * @param string $message Error message
   * @param int $code Error code
   */
  function __construct($message = null, $code = 0) {
    parent::__construct($message, $code);
  }

}
