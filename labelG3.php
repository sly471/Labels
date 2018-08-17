
    <?php
        require('PDF_Label.php');

        $Barcode = "123456789012";
        $Color = "Gray";
        $Name = "Hello World";
        $Price = "$12.34";
        $Order = 7;
        $Height = 47;
        for($x=$Order;$x>4;$x = $x-4){
            $Height+=47;
        }
        $pdf = new PDF_Label(array('paper-size'=>array(96.52, $Height), 'metric'=>'mm', 'marginLeft'=>0, 'marginTop'=>0, 'NX'=>4, 'NY'=>$Order/4+1, 'SpaceX'=>3, 'SpaceY'=>3, 'width'=>21, 'height'=>44, 'font-size'=>8));        $pdf->AddPage("P");
        // Print labels
        $LabelLeft = $Order;
        for($i=0;$i<$Order/4;$i++) {
            for($j=1;$j<=4;$j++){    
                $pdf->SetFontSize(8);
                $text = sprintf("%s\n%s\n%s, %s", "Valija Gitana" ,$Name, $Color, $Price);
                //$code='12345678901234567890';
                $pdf->Add_Label($text);
                $pdf->SetFontSize(4);

                $pdf->UPC_A(4+($j-1)*24, 39+$i*46.5, $Barcode, 5, .15, 4);
                $LabelLeft--;
                if($LabelLeft==0){
                    break;
                }
            }  
        }

        $pdf->Output("F", "Labels.pdf");

        ?>
