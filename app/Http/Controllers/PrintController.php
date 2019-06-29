<?php
namespace App\Http\Controllers;
require '../vendor/autoload.php';

use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $connector = new FilePrintConnector("php://stdout");
        $printer = new Printer($connector);
        $centerjustification = Printer::JUSTIFY_CENTER;
        $rightjustification = Printer::JUSTIFY_RIGHT;
        $leftjustification = Printer::JUSTIFY_LEFT;
        $printer->setJustification($centerjustification);
        // header goes here
        $printer->text("Company name Here \n");
        $printer->setJustification($centerjustification);
        $printer->text("Address Here \n");
        $printer->setJustification($centerjustification);
        $printer->text("Other info like motto Here \n");
        $printer->text("-------------------------------------------------------------------\n");
        $printer->setJustification($leftjustification);
        $printer->text("Text");
        $printer->setJustification();
        $printer->setJustification($centerjustification);
        $printer->text("Text");
        $printer->setJustification();
        $printer->setJustification($rightjustification);
        $printer->text("Text\n");
        $printer->setJustification();
        $printer->setJustification($centerjustification);
        $printer->text("Text\n");
        $printer->text("-------------------------------------------------------------------\n");
        $items = array(
            "rice" => "100 naira",
            "beans"=>"300 naira",
            "akamu"=>"40 naira"
        );
        foreach($items as $key => $value){
            $printer->setJustification($centerjustification);
            $printer->text( $key . "  > ------------------ > ". $value. " \n");
        }
        $printer->setJustification($centerjustification);
        $printer->text("Subtotal      =    50000 naira\n");
        $printer->setJustification($centerjustification);
        $printer->text("Tax           =    5% \n");
        $printer->setJustification($centerjustification);
        $printer->text("Total         =    50250 naira\n");
        $printer->setJustification($centerjustification);
        $printer->text("Thanks for Patronizing Us\n");
        $printer->setJustification($centerjustification);
        $printer->text("See you soon\n");
        $printer->setJustification($centerjustification);
        $printer->text( Date("Y-m-d h:i:sa")."\n");
        $printer->setJustification(); // Reset

        $printer->cut();
        $printer->close();
        return view('welcome');

    }
   //adding image
        // try {
        //     $logo = EscposImage::load("../public/images/img.jpg", false);
        //     $mode = Printer::IMG_DEFAULT;
        //     $printer->graphics($logo, $mode);
        // } catch (Exception $e) {
        //     /* Images not supported on your PHP, or image file not found */
        //     $printer->text($e->getMessage() . "\n");
        // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
