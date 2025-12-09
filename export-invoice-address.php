<?php
ob_start(); // Start buffering to prevent early output include 'db/session.php';

require_once('tcpdf/tcpdf.php');
include 'db/connection.php';


if (!isset($_POST['ids']) || !is_array($_POST['ids'])) {
    die("No invoice selected.");
}

$ids = array_map('intval', $_POST['ids']);
$idList = implode(',', $ids);

$result = mysqli_query($conn, "SELECT * FROM customer1 WHERE id IN ($idList)");
$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// TCPDF setup
$pdf = new TCPDF();
$pdf->AddPage();
$pdf->SetFont('helvetica', '', 12);

// HTML content
$html = '<table border="1" cellpadding="6" cellspacing="0" width="100%">';

for ($i = 0; $i < count($data); $i += 2) {
    $html .= '<tr>';

    $html .= '<td width="50%" padding="10px">';
    $html .= htmlspecialchars($data[$i]['cname']) . '<br>';
    $html .= htmlspecialchars($data[$i]['address']) . '<br>';
    $html .= htmlspecialchars($data[$i]['city']) . '<br>';
    $html .= htmlspecialchars($data[$i]['mobile']);
    $html .= '</td>';

    if (isset($data[$i + 1])) {
        $html .= '<td width="50%" padding="10px">';
        $html .= htmlspecialchars($data[$i + 1]['cname']) . '<br>';
        $html .= htmlspecialchars($data[$i + 1]['address']) . '<br>';
        $html .= htmlspecialchars($data[$i + 1]['city']) . '<br>';
        $html .= htmlspecialchars($data[$i + 1]['mobile']);
        $html .= '</td>';
    } else {
       
        $html .= '<td width="50%" padding="10px"></td>';
    }

    $html .= '</tr>';
}

$html .= '</table>';

// Final clean-up and output
ob_end_clean(); // Clean the buffer
$pdf->writeHTML($html);
$pdf->Output('invoices.pdf', 'D');
exit;
