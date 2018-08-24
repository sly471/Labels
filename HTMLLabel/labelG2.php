
<?php
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);
require('PDF_Label.php');

$Barcode = $_POST["code"];
$Color = $_POST["color"];
$Name = $_POST["name"];
$Price = $_POST["price"];
$Order = $_POST["order"];


$pdf = new PDF_Label(array('paper-size'=>array(96.52, 46), 'metric'=>'mm', 'marginLeft'=>0, 'marginTop'=>0, 'NX'=>4, 'NY'=>1, 'SpaceX'=>2.75, 'SpaceY'=>0, 'width'=>21, 'height'=>44, 'font-size'=>8));
// Print labels
$LabelLeft = $Order;
$x = 0;
for($i=0;$i<$Order;$i++) {
    if($i%4 == 0){
        $x = 0;
        $pdf->AddPage("L");
    }   
    $pdf->SetFontSize(8*$A);
    $text = sprintf("%s\n%s\n%s, %s", "Valija Gitana" ,$Name, $Price);
    $pdf->Add_Label($text);
    
    
   
    $LabelLeft--;
    $x++;
    if($LabelLeft==0){
            break;
        }
    }
     $pdf->EAN13(1, 30, $Barcode, 3, .19);
     // $pdf->UPC_A(3+48, 30, $Barcode, 10,.18);
     // $pdf->Code128((3+24), 30, $code, 17,8);
$pdf->Output("D", "Labels.pdf");

?>