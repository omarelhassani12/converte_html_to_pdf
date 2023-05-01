<?php
require('./fpdf185/fpdf.php');

class PDF extends FPDF
{
    function Header()
    {
        // Logo
        $this->Image('logo.png', 10, 6, 30);
        // Police Arial gras 15
        $this->SetFont('Arial', 'B', 15);
        // Décalage à droite
        $this->Cell(80);
        // Titre
        $this->Cell(30, 10, 'Curriculum Vitae', 0, 0, 'C');
        // Saut de ligne
        $this->Ln(20);
    }

    function BasicInformation($name, $address, $phone, $email)
    {
        // Couleur de fond
        $this->SetFillColor(200, 220, 255);
        // Titre
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 6, 'Informations de base', 0, 1, 'L', true);
        // Saut de ligne
        $this->Ln(4);
        // Informations
        $this->SetFont('Arial', '', 12);
        $this->Cell(0, 6, 'Nom : ' . $name, 0, 1);
        $this->Cell(0, 6, 'Adresse : ' . $address, 0, 1);
        $this->Cell(0, 6, 'Téléphone : ' . $phone, 0, 1);
        $this->Cell(0, 6, 'E-mail : ' . $email, 0, 1);
        // Saut de ligne
        $this->Ln(10);
    }

    function Education($degree, $institution, $date)
    {
        // Couleur de fond
        $this->SetFillColor(200, 220, 255);
        // Titre
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 6, 'Formation', 0, 1, 'L', true);
        // Saut de ligne
        $this->Ln(4);
        // Informations
        $this->SetFont('Arial', '', 12);
        $this->Cell(0, 6, 'Diplôme : ' . $degree, 0, 1);
        $this->Cell(0, 6, 'Institution : ' . $institution, 0, 1);
        $this->Cell(0, 6, 'Date : ' . $date, 0, 1);
        // Saut de ligne
        $this->Ln(10);
    }

    function Skills($skills)
    {
        // Couleur de fond
        $this->SetFillColor(200, 220, 255);
        // Titre
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 6, 'Compétences', 0, 1, 'L', true);
        // Saut de ligne
        $this->Ln(4);
        // Informations
        $this->SetFont('Arial', '', 12);
        foreach ($skills as $skill) {
            $this->Cell(0, 6, '- ' . $skill, 0, 1);
        }
    }
}

// Instanciation de la classe dérivée
$pdf = new PDF();
$pdf->AddPage();
$pdf->BasicInformation('John Doe', '123 Rue Principale, Montréal, QC H3C 1K6', '(514) 123-4567', 'johndoe@example.com');
$pdf->Education('Baccalauréat en informatique', 'Université de Montréal', '2010-2013');
$pdf->Skills(array('Programmation en C++', 'Conception de bases de données', 'Développement web', 'Gestion de projet', 'Analyse de données'));
$pdf->Output();