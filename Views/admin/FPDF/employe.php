<?php
     require 'fpdf.php';
     
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->setTextColor(252, 3, 3);
        $pdf->Cell(200,20,'Employe Management System',0,1,'C');
        $pdf->setLeftMargin(30);
        $pdf->setTextColor(0, 0, 0);

        $pdf->Cell(20,10,"Date:",0,0,'C');
        $pdf->Cell(30,10,date("j-n-Y"),0,1,'C');
        // table column
        $pdf->Cell(20,10,'No',1,0,'C');
        $pdf->Cell(40,10,'PersonID ',1,0,'C');
        $pdf->Cell(40,10,'nom',1,0,'C');
        $pdf->Cell(40,10,'prenom',1,0,'C');
        $pdf->Cell(40,10,'age',1,1,'C');
        // table rows
        $pdf->SetFont('Arial','',14);
        $con = new PDO('mysql:host=localhost;dbname=make-up','root','');
        if (isset($_GET['PersonID']))
{
    $id = $_GET['PersonID'];
        $query ="SELECT * FROM livreur WHERE PersonID='$id' ";
        $result = $con->prepare($query);
        $result->execute();
        if($result->rowCount()!=0)
        {
                         $i=0;
            while($livreur = $result->fetch())
            {
              $pdf->Cell(20,10,++$i,1,0,'C');
              $pdf->Cell(40,10,$livreur['PersonID'],1,0,'C');
              $pdf->Cell(40,10,$livreur['nom'],1,0,'C');
              $pdf->Cell(40,10,$livreur['prenom'],1,0,'C');
              $pdf->Cell(40,10,$livreur['age'],1,1,'C');
            }

        }
        else {echo "not found record";}
    }

        $pdf->Output();
           
 
?>