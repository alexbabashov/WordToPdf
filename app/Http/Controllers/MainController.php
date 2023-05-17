<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\Storage;

class MainController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Request $request)
    {
        return view('index');
    }

    public function convertDocPdf(Request $request)
    {
        $request->validate([
            'file' => 'required'
        ]);

        $filepath = 'upload_files';
        $disk = Storage::build([
            'driver' => 'local',
            'root' => public_path(''),
        ]);
        $disk->deleteDirectory($filepath);

        $time = time();
        $filenameDoc = $time . '_' . $request->file('file')->getClientOriginalName();
        $filenamePdf = $filenameDoc . '.pdf';
        $request->file('file')->move($filepath, $filenameDoc);

        $fullPathToFileDoc = public_path($filepath) . '/' . $filenameDoc;
        $fullPathToFilePdf = public_path($filepath) . '/' . $filenamePdf;

        //convertWordToPDF($fullPathToFileDoc, $fullPathToFilePdf)

        return response()->download($filepath . '/' . $filenameDoc);
    }

    // Источник
    // https://www.scratchcode.io/how-to-convert-word-to-pdf-in-laravel/
    //
    // public function convertWordToPDF()
    // {
    //     /* Set the PDF Engine Renderer Path */
    //     $domPdfPath = base_path('vendor/dompdf/dompdf');
    //     \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
    //     \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');

    //     /*@ Reading doc file */
    //     $template = new\PhpOffice\PhpWord\TemplateProcessor(public_path('result.docx'));

    //     /*@ Replacing variables in doc file */
    //     $template->setValue('date', date('d-m-Y'));
    //     $template->setValue('title', 'Mr.');
    //     $template->setValue('firstname', 'Scratch');
    //     $template->setValue('lastname', 'Coder');

    //     /*@ Save Temporary Word File With New Name */
    //     $saveDocPath = public_path('new-result.docx');
    //     $template->saveAs($saveDocPath);

    //     // Load temporarily create word file
    //     $Content = \PhpOffice\PhpWord\IOFactory::load($saveDocPath);

    //     //Save it into PDF
    //     $savePdfPath = public_path('new-result.pdf');

    //     /*@ If already PDF exists then delete it */
    //     if ( file_exists($savePdfPath) ) {
    //         unlink($savePdfPath);
    //     }

    //     //Save it into PDF
    //     $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content,'PDF');
    //     $PDFWriter->save($savePdfPath);
    //     echo 'File has been successfully converted';

    //     /*@ Remove temporarily created word file */
    //     if ( file_exists($saveDocPath) ) {
    //         unlink($saveDocPath);
    //     }
    // }
}
