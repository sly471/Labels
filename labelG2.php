
<?php
    require('PDF_Label.php');

    $Barcode = "123456789012";
    $Color = "Gray";
    $Name = "Hello World";
    $Price = "$12.34";
    $Order = 2;
    $Height = 10;
    for($x=0;$x<$Order; $x++){
        $Height+=12;
    }
    $pdf = new PDF_Label(array('paper-size'=>array(56, $Height), 'metric'=>'mm', 'marginLeft'=>0, 'marginTop'=>3, 'NX'=>1, 'NY'=>$Order, 'SpaceX'=>3, 'SpaceY'=>6, 'width'=>52, 'height'=>10, 'font-size'=>6));
    $pdf->AddPage("L");
    // Print labels
    $LabelLeft = $Order;
    for($i=0;$i<$Order;$i++) {
            
        $pdf->SetFontSize(6);
        $text = sprintf("%s\n%s\n%s, %s", "Valija Gitana" ,$Name, $Color, $Price);
        //$code='12345678901234567890';
        $pdf->Add_Label($text);
        $pdf->SetFontSize(4);

        $pdf->UPC_A (37,7+$i*16, $Barcode, 5, .15);
        $LabelLeft--;
        if($LabelLeft==0){
            break;
        }
      
    }

    $pdf->Output("F", "Labels.pdf");

    ?>
