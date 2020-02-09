<?php
/**
 * @package dompdf
 * @link    http://dompdf.github.com/
 * @author  Abdul Latif Munjiat <abdul23lm@gmail.com>
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 */

/**
 * Dummy reflower
 *
 * @access private
 * @package dompdf
 */
class Null_Frame_Reflower extends Frame_Reflower {

  function __construct(Frame $frame) { parent::__construct($frame); }

  function reflow(Block_Frame_Decorator $block = null) { return; }
  
}
