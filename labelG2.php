
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
        $pdf = new PDF_Label(array('paper-size'=>array(96.52, 46.90), 'metric'=>'mm', 'marginLeft'=>0, 'marginTop'=>0, 'NX'=>4, 'NY'=>1, 'SpaceX'=>3, 'SpaceY'=>0, 'width'=>21, 'height'=>44, 'font-size'=>8));;
        $pdf->AddPage('L');
        
        // Print labels
        for($i=0;$i<4;$i++) {
            $pdf->SetFontSize(8);
            $text = sprintf("%s\n%s\n%s, %s", "Valija Gitana", 'TWO STRANDS CLOVER NECKLACE', 'GREY', '$10.90');
            $code='12345678901234567890';
            $pdf->Add_Label($text);
            $pdf->CODE128(4+$i*24, 30, $code, 15, 10, 15);
            $pdf->SetFontSize(4);
            $pdf->SetXY(2.5+$i*24,15);
            $pdf->Write(51.5,$code);
            
        }

        $pdf->Output();

        ?>
