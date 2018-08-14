
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
         $pdf = new PDF_Label(array('paper-size'=>array(96.52, 46.90), 'metric'=>'mm', 'marginLeft'=>0, 'marginTop'=>0, 'NX'=>4, 'NY'=>1, 'SpaceX'=>3, 'SpaceY'=>0, 'width'=>21, 'height'=>44, 'font-size'=>9));

        $pdf->AddPage('L');

        // Print labels
        for($i=1;$i<=4;$i++) {
            $text = sprintf("%s\n%s\n%s\n%s %s, %s", "Melaza $i", 'TWO STRANDS CLOVER NECKLACE', '056403841', '409901948204', 'GREY', '$10.90');
            $pdf->Add_Label($text);
        }

        $pdf->Output();
    ?>

