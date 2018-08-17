
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
$Height = 46.90;
for($x=$Order;$x>4;$x = $x-4){
    $Height+=47;
}

$pdf = new PDF_Label(array('paper-size'=>array(96.52, $Height), 'metric'=>'mm', 'marginLeft'=>0, 'marginTop'=>0, 'NX'=>4, 'NY'=>$Order/4+1, 'SpaceX'=>3, 'SpaceY'=>6, 'width'=>21, 'height'=>44, 'font-size'=>8));

$pdf->AddPage("P");
// Print labels
$LabelLeft = $Order;
for($i=0;$i<$Order/4;$i++) {
    for($j=1;$j<=4 || ($LabelLeft==0);$j++){    
        $pdf->SetFontSize(8);
        $text = sprintf("%s\n%s\n%s %s", "Valija Gitana" ,$Name, $Color, $Price);
        //$code='12345678901234567890';
        $pdf->Add_Label($text);
        $pdf->SetFontSize(4);

        $pdf->UPC_A (4+($j-1)*24, 30+$i*50, $Barcode, 5, .15, 4);
        $LabelLeft--;
        if($LabelLeft==0){
            break;
        }
    }  
}
$pdf->Output("D", "Labels.pdf");
?>

    
