<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;

class pdfHandlerController extends Controller
{
    // this api handle pdf , run the script filter the data and run sotre it
    public function store()
    {
        $this->storepdf();

//        todo: sotr to the db

    }

    public function storepdf(){

//          $output = [];
////        exec('python ' . public_path('app/python/script.py'), $output);
//        exec('/usr/bin/python ' . public_path('app/python/script.py'),$output);
//        dd($output);

        $process = new Process(['Python', base_path() . 'app/python/script.py']);
//        $process = new Process(['Python', public_path() . 'C:/Users/acer/Desktop/cvmanager/app/python/script.py']);
        $process->run();
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
//        return $process->getOutput();
        }
//dd($process);
        dd($process->getOutput());


    }

}
