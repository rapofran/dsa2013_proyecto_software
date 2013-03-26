<?php

/**
 * graficos actions.
 *
 * @package    rugby
 * @subpackage graficos
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class graficosActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    // fechas recibidas como parametro
    $this->fecha1 = $request->getParameter('fecha1');
    $this->fecha2 = $request->getParameter('fecha2');

    //**************************************************************************************//

    $users    = ItemTable::getArticulosUsuarios($this->fecha1, $this->fecha2);

    $colores  = array("e5f867","596605","375181","bfd1d2","e57e0f","54380c","e50f28","a3129e","082454","f6f830","838383");

    $dataCant = Array();
    $dataUser = Array();
    foreach ($users as $user)
		{
			$dataCant[] = $user['cant'];
	    $dataUser[] = $user['username']." ( ".$user['cant']." )";
		}

    $this->dataCant = implode(",", $dataCant);
    $this->dataUser = implode("|", $dataUser);
    $this->colores1  = implode("|",array_slice($colores, 0, count($users)));

   //**************************************************************************************//

    $articulos = ItemTable::getCantidadClicksArticulos($this->fecha1, $this->fecha2);

    $data      = Array();
    $daraLabel = Array();
    foreach ($articulos as $item)
		{
			$data[]      = $item->getClick();
      $dataLabel[] = $item->getTitle()." ( ".$item->getClick()." )";
		}

    $this->data      = implode(",", $data);
    $this->dataLabel = implode("|", $dataLabel);
    $this->colores2  = implode("|",array_slice($colores, 0, count($articulos)));

  }
}
