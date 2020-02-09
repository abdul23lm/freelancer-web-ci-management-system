<?php
/**
 * @package dompdf
 * @link    http://dompdf.github.com/
 * @author  Abdul Latif Munjiat <abdul23lm@gmail.com>
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 */

/**
 * Dummy positioner
 *
 * @access private
 * @package dompdf
 */
class Null_Positioner extends Positioner {

  function __construct(Frame_Decorator $frame) {
    parent::__construct($frame);
  }

  function position() { return; }
  
}
