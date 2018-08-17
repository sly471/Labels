
    <?php
        require('PDF_Label.php');

        $Barcode = "409902019071";
        $Color = "Gray";
        $Name = "Hello World";
        $Price = "$12.34";
        $Order = 6;
        $Height = 46.90;

        $pdf = new PDF_Label(array('paper-size'=>array(96.52, 46), 'metric'=>'mm', 'marginLeft'=>0, 'marginTop'=>0, 'NX'=>4, 'NY'=>1, 'SpaceX'=>2.75, 'SpaceY'=>0, 'width'=>21, 'height'=>44, 'font-size'=>8));
        // Print labels
        $LabelLeft = $Order;
        $x = 0;
        for($i=0;$i<$Order;$i++) {
            if($i%4 == 0){
                $x = 0;
                $pdf->AddPage("L");
            }   
            $pdf->SetFontSize(8);
            $text = sprintf("%s\n%s\n%s, %s", "Valija Gitana" ,$Name, $Color, $Price);
            $pdf->Add_Label($text);
            $pdf->SetFontSize(20);
            
            $pdf->UPC_A(3+($x)*24, 30, $Barcode, 10, .18);
            $LabelLeft--;
            $x++;
            if($LabelLeft==0){
                    break;
                }
            }

        $pdf->Output("F", "Labels.pdf");

        ?>
