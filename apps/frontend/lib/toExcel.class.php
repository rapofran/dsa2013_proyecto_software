<?php
class toExcel { 
  public static function xlsBOF()
  {
    echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
    return;
  }

  // Excel end of file footer
  public static function xlsEOF()
  { 
    echo pack("ss", 0x0A, 0x00);
    return;
  }

  // Function to write a Number (double) into Row, Col
  public static function xlsWriteNumber($Row, $Col, $Value)
  {
    echo pack("sssss", 0x203, 14, $Row, $Col, 0x0);
    echo pack("d", $Value);
    return;
  }

  // Function to write a label (text) into Row, Col (UTF8)
  public static function xlsWriteLabel($Row, $Col, $Value )
  {
    $Value2UTF8=utf8_decode($Value);
    $L = strlen($Value2UTF8);
    echo pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L);
    echo $Value2UTF8;
    return;
  }

  //Escribir texto o numeros en una celda (Gracias Bruno!)
  public static function xlsWriteCell($Row, $Col, $Value )
  {
    if(is_numeric($Value))
    self::xlsWriteNumber($Row, $Col, $Value);
    else
    self::xlsWriteLabel($Row, $Col, $Value);
  }
}

