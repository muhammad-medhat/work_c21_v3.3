<?php
require __DIR__ . '/escpos/autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

try {
	// Enter the share name for your USB printer here
	$connector = new WindowsPrintConnector("EPSON TM-T88IV ReceiptE4");
	$printer = new Printer($connector);

	/* Print a "Hello world" receipt" */
	//$printer -> text("Hello World!\n");
	$printer -> cut();
	
	/* Close printer */
	$printer -> close();
} catch(Exception $e) {
	echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
}
