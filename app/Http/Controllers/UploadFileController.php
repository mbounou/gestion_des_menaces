<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FileRequest;
use App\File;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Storage;
use App\Models\CategorieM;
use App\Models\Menace;

class UploadFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct(){
         $this->middleware('auth');
     }


    public function index()
    {
        return view('upload_file');
    }

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
    public function store(FileRequest $request)
    {
        // $this->validate($request,[
        //     'file_name' => 'required|mimes:text/log'
        // ]);
        $data = $request->all();
        $uploadedFile = $request->file('file_name');
        $filename = time().$uploadedFile->getClientOriginalName();
        $path = Storage::disk('files')->getAdapter()->getPathPrefix();
        Storage::disk('files')->putFileAs(
            null,
            $uploadedFile,
            $filename
        );

        $upload = new File();
        $upload->file_name = $path."".$filename;
        $upload->user_id = Auth::user()->id;
        $upload->save();

        $file = Storage::disk('files')->get($filename);
        $tableLogs = array();

        $fileligne = explode("\n",$file);
        foreach ($fileligne as $elt) {
            $entries = explode(" ", $elt);
            $lineLog = array();
            // dd($entries);
            foreach($entries as $entry) {
                $data = array_pad(explode("=", $entry),2,null);
                $key = $data[0];
                $value = $data[1];
                $lineLog[$key] = $value;
            }
            
            if (isset($lineLog['logid'])) {
        
                array_push($tableLogs, $lineLog); // This line should be removed in a normal application
            }
            
        }
        $inject = CategorieM::find(6);
        $dos = CategorieM::find(7);
        $menaces = Menace::all();
        if(empty($menaces)){
            foreach ($tableLogs as $ligne) {
                if(strpos($ligne['attack'],"DoS")){
                    Menace::create([
                        'categorie_id' => $dos->id,
                        'signature' => $ligne['attack'],
                        'nom_menace' => "DoS"
                    ]);
                }else if(strpos($ligne['attack'],"Injection")){
                    Menace::create([
                        'categorie_id' => $inject->id,
                        'signature' => $ligne['attack'],
                        'nom_menace' => "Injection"
                    ]);
                }
            }
        }else{
            foreach ($menaces as $menace) {
                Menace::destroy($menace->id);
            }
            foreach ($tableLogs as $ligne) {
                if(strpos($ligne['attack'],"DoS")){
                    Menace::create([
                        'categorie_id' => $dos->id,
                        'signature' => $ligne['attack'],
                        'nom_menace' => "DoS"
                    ]);
                }else if(strpos($ligne['attack'],"Injection")){
                    Menace::create([
                        'categorie_id' => $inject->id,
                        'signature' => $ligne['attack'],
                        'nom_menace' => "Injection"
                    ]);
                }
            }
        }
        
        return redirect()->route('menaces.index');
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
