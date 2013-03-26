<?php

/**
 * club actions.
 *
 * @package    rugby
 * @subpackage club
 * @author     Frank, Tincho
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */

class clubActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    /* traemos una coleccion de los miembros del club, dependiendo su tipo
    *
    * 1: Presidente
    * 2: Administracion
    * 3: Coordinacion de Rugby
    * 4: Jugador
    *
    */

    $this->presidentes      = Doctrine_Core::getTable('Member')->getMembersByType('1');
    $this->administradores  = Doctrine_Core::getTable('Member')->getMembersByType('2');
    $this->coordinadores    = Doctrine_Core::getTable('Member')->getMembersByType('3');

    // obtenemos toda la info de la base
    $this->stuff            = Doctrine_Core::getTable('Stuff')->find('1');  

    // obtenemos una coleccion de jugadores del clubActions   
    $this->jugadores  = Doctrine_Core::getTable('Member')->getMembersByType('4');
  }

  public function executeExcelPlayer(sfWebRequest $request)
  {
    header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
    header ("Cache-Control: no-cache, must-revalidate");
    header ("Pragma: no-cache");
    header ("Content-type: application/x-msexcel");
    header ("Content-Disposition: attachment; filename=LISTADO_DE_JUGADORES_ACTUALES.xls" );
    header ("Content-Description: PHP/INTERBASE Generated Data" );
    
    toExcel::xlsBOF(); // begin Excel stream

    $jugadores  = Doctrine_Core::getTable('Member')->getMembersByType('4');

    toExcel::xlsWriteCell(0,0,"Apellido y Nombre");
    toExcel::xlsWriteCell(0,1,"Fecha de Nacimiento");
    toExcel::xlsWriteCell(0,2,"Categoria");
    $row = 1;
    foreach ($jugadores as $jugador) {
      toExcel::xlsWriteCell($row,0,$jugador->getName());
      $date = strtotime($jugador->getBirthday());
      toExcel::xlsWriteCell($row,1,date("d/m/Y",$date));
      toExcel::xlsWriteCell($row,2,$jugador->getCategory());
      $row++;
    }
    toExcel::xlsEOF(); 
  }

  public function executeExportRules(sfWebRequest $request){

    $stuff  = Doctrine_Core::getTable('Stuff')->find('1');

    $doc_title    = "Reglamento de Rugby Infantil";
    $doc_subject  = "Reglamento de Rugby Infantil";
    $doc_keywords = "Reglamento de Rugby Infantil";
    $header_title = "Reglamento de Rugby Infantil";

    $htmlcontent = $stuff->getRules();
    
    $this->buildPdf($doc_title,$doc_subject,$doc_keywords,$header_title,$htmlcontent);
  }
  
  public function executeExportHistory(sfWebRequest $request){

    $stuff  = Doctrine_Core::getTable('Stuff')->find('1');

    $doc_title    = "Historia del club";
    $doc_subject  = "Historia del club";
    $doc_keywords = "Historia del club";
    $header_title = "Historia del club";

    $htmlcontent = $stuff->getStory();
    
    $this->buildPdf($doc_title,$doc_subject,$doc_keywords,$header_title,$htmlcontent);
  }

  public function executeExportInstitucional(sfWebRequest $request){

    $stuff  = Doctrine_Core::getTable('Stuff')->find('1');

    $doc_title    = "Informacion Institucional";
    $doc_subject  = "Informacion Institucional";
    $doc_keywords = "Informacion Institucional";
    $header_title = "Informacion Institucional";

    $htmlcontent = $stuff->getDescription() ;
    
    $this->buildPdf($doc_title,$doc_subject,$doc_keywords,$header_title,$htmlcontent);
  }

  protected function buildPdf($doc_title,$doc_subject,$doc_keywords,$header_title,$htmlcontent){
    $config = sfTCPDFPluginConfigHandler::loadConfig();
   
    
    sfTCPDFPluginConfigHandler::includeLangFile($this->getUser()->getCulture());

    //create new PDF document (document units are set by default to millimeters)
    $pdf = new sfTCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true);
   
    // set document information
    $pdf->SetCreator('Sitio Web - Ensenada Rugby Club');
    $pdf->SetAuthor('Ensenada Rugby Club');
    $pdf->SetTitle($doc_title);
    $pdf->SetSubject($doc_subject);
    $pdf->SetKeywords($doc_keywords);
   
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH,$header_title, PDF_HEADER_STRING);
   
    //set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
   
    //set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO); //set image scale factor
   
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
   
    //initialize document
    $pdf->AliasNbPages();
    $pdf->AddPage();
   
    // set barcode
    $pdf->SetBarcode(date("Y-m-d H:i:s", time()));
   
    // output some HTML code
    $pdf->writeHTML($htmlcontent , true, 0);
   
    // remove page header/footer
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
   
    // Close and output PDF document
    $pdf->Output();
   
    // Stop symfony process
    throw new sfStopException();
  }

}
