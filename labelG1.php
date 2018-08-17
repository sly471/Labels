
<?php
    require('PDF_Label.php');

    //WE NEED TO VERIFY THE PRINTER 
    $Barcode = "123456789012";
    $Color = "Gray";
    $Name = "Hello World";
    $Price = "$12.34";
    $Order = 3;
    $Height = ;
    for($x=$Order;$x>4;$x = $x-4){
        $Height+=47;
    }
    $pdf = new PDF_Label(array('paper-size'=>array(90, $Height), 'metric'=>'mm', 'marginLeft'=>0, 'marginTop'=>0, 'NX'=>2, 'NY'=>$Order/2+1, 'SpaceX'=>3, 'SpaceY'=>6, 'width'=>31, 'height'=>25, 'font-size'=>6));
    $pdf->AddPage("L");
    // Print labels
    $LabelLeft = $Order;
    for($i=0;$i<$Order/2;$i++) {
        for($j=1;$j<=4 || ($LabelLeft==0);$j++){    
            $pdf->SetFontSize(8);
            $text = sprintf("%s\n%s\n%s, %s", "Valija Gitana" ,$Name, $Color, $Price);
            $pdf->Add_Label($text);
            $pdf->SetFontSize(4);

            $pdf->UPC_A (4+($j-1)*24, 30+$i*50, $Barcode, 5, .15, 4);
            $LabelLeft--;
            if($LabelLeft==0){
                break;
            }
        }  
    }

    $pdf->Output("F", "Labels.pdf");

?>
