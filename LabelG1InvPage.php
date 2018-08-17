
<?php
    require('PDF_Label.php');

    //WE NEED TO VERIFY THE PRINTER 
    $Barcode = "123456789012";
    $Color = "Gray";
    $Name = "Hello World";
    $Price = "$12.34";
    $Order = 3;
    $Height = 27;
    $pdf = new PDF_Label(array('paper-size'=>array(70, $Height), 'metric'=>'mm', 'marginLeft'=>4, 'marginTop'=>0, 'NX'=>2, 'NY'=>1, 'SpaceX'=>7, 'SpaceY'=>5, 'width'=>31, 'height'=>25, 'font-size'=>6));
    // Print labels
    $LabelLeft = $Order;
        $x = 0;
        for($i=0;$i<$Order;$i++) {
            if($i%2 == 0){
                $x = 0;
                $pdf->AddPage("L");
            }  
            $pdf->SetFontSize(6);
            $text = sprintf("%s\n%s\n%s, %s", "Valija Gitana" ,$Name, $Color, $Price);
            $pdf->Add_Label($text);
            $pdf->SetFontSize(4);

            $pdf->UPC_A (8+($x)*38, 17, $Barcode, 5, .15, 4);
            $LabelLeft--;
            $x++;
            if($LabelLeft==0){
                break;
            }
         
    }

    $pdf->Output("F", "Labels.pdf");

?>
