<?php

/**
 * match actions.
 *
 * @package    rugby
 * @subpackage match
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class matchActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->partidos = Doctrine_Core::getTable('Match')->getMatches();
  }

  public function executeExcelMatches(sfWebRequest $request)
  {
    header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
    header ("Cache-Control: no-cache, must-revalidate");
    header ("Pragma: no-cache");
    header ("Content-type: application/x-msexcel");
    header ("Content-Disposition: attachment; filename=CRONOGRAMA_DE_PARTIDOS_".date("Y").".xls" );
    header ("Content-Description: PHP/INTERBASE Generated Data" );
    
    toExcel::xlsBOF(); // begin Excel stream

    $partidos  =  Doctrine_Core::getTable('Match')->getMatchesByYear(date("Y"));

    toExcel::xlsWriteCell(0,0,"Fecha");
    toExcel::xlsWriteCell(0,1,"Visitante");
    toExcel::xlsWriteCell(0,2,"Local");
    $row = 1;
    foreach ($partidos as $partido) {
      $date = strtotime($partido->getDate());
      toExcel::xlsWriteCell($row,0,date("d/m/Y",$date));
      toExcel::xlsWriteCell($row,1,$partido->getTeamOne());
      toExcel::xlsWriteCell($row,2,$partido->getTeamTwo());
      $row++;
    }
    toExcel::xlsEOF(); 
  }
}
