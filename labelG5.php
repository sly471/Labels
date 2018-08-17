
    <?php
        require('PDF_Label.php');
        /*------------------------------------------------
        To create the object, 2 possibilities:
        either pass a custom format via an array
        or use a built-in AVERY name
        ------------------------------------------------*/

        // Example of custom format
        // $pdf = new PDF_Label(array('paper-size'=>'A4', 'metric'=>'mm', 'marginLeft'=>1, 'marginTop'=>1, 'NX'=>2, 'NY'=>7, 'SpaceX'=>0, 'SpaceY'=>0, 'width'=>99, 'height'=>38, 'font-size'=>14));

        // Standard format
        // $pdf = new PDF_Label('L7163');
        //                               Dimensions    w   h                                                     columns   rows 
        // $pdf = new PDF_Label(array('paper-size'=>array(99, 95), 'metric'=>'mm', 'marginLeft'=>1, 'marginTop'=>1, 'NX'=>2, 'NY'=>4, 'SpaceX'=>3, 'SpaceY'=>3, 'width'=>44, 'height'=>21, 'font-size'=>6));

        $Barcode = "123456789012";
        $Color = "Gray";
        $Name = "Hello World";
        $Price = "$12.34";
        $Order = 3;
        $Height = 46.90;
        for($x=$Order;$x>4;$x = $x-4){
            $Height+=47;
        }
        $pdf = new PDF_Label(array('paper-size'=>array(96.52, $Height), 'metric'=>'mm', 'marginLeft'=>0, 'marginTop'=>0, 'NX'=>4, 'NY'=>$Order/4+1, 'SpaceX'=>3, 'SpaceY'=>6, 'width'=>21, 'height'=>44, 'font-size'=>8));
        $pdf->AddPage("L");
        // Print labels
        $LabelLeft = $Order;
        for($i=0;$i<$Order/4;$i++) {
            for($j=1;$j<=4 || ($LabelLeft==0);$j++){    
                $pdf->SetFontSize(8);
                $text = sprintf("%s\n%s\n%s, %s", "Valija Gitana" ,$Name, $Color, $Price);
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

        $pdf->Output("F", "Labels.pdf");

        ?>
