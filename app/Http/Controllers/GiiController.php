<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

class GiiController extends Controller
{
    public $table;

    public function model(Request $request)
    {
        $table = $request->get('table');

        $className = str_replace('_',' ',$table);
        $className = ucwords($className);
        $className = str_replace(' ','', $className);

        $view = view('gii.model',[
            'table'=>$table
        ]);

        if($request->get('process')==1) {
            file_put_contents(app_path("/Models/{$className}.php"), $view);
        }

        return $view;
    }

    public function controller(Request $request)
    {
        $table = $request->get('table');

        $className = str_replace('_',' ',$table);
        $className = ucwords($className);
        $className = str_replace(' ','', $className);

        $view = view('gii.controller',[
            'table'=>$table
        ]);

        if($request->get('process')==1) {
            $filePath = app_path("/Http/Controllers/{$className}Controller.php");
            $fopen = fopen($filePath, "w");
            file_put_contents($filePath, $view);
            fclose($fopen);
        }

        return $view;

    }

    public function read(Request $request)
    {
        $table = $request->get('table');

        $folderName = str_replace('_','-',$table);

        $view = view('gii.read',[
            'table'=>$table
        ]);

        if($request->get('process')==1) {
            $filePath = resource_path("views/$folderName/read.blade.php");
            $fopen = fopen($filePath, "w");
            file_put_contents($filePath, $view);
            fclose($fopen);
        }

        return $view;
    }

    public function create(Request $request)
    {
        $table = $request->get('table');

        $folderName = str_replace('_','-',$table);

        $view = view('gii.create',[
            'table'=>$table
        ]);

        if($request->get('process')==1) {
            $filePath = resource_path("views/$folderName/create.blade.php");
            $fopen = fopen($filePath, "w");
            file_put_contents($filePath, $view);
            fclose($fopen);
        }

        return $view;
    }

    public function update(Request $request)
    {
        $table = $request->get('table');

        $folderName = str_replace('_','-',$table);

        $view = view('gii.update',[
            'table'=>$table
        ]);

        if($request->get('process')==1) {
            $filePath = resource_path("views/$folderName/update.blade.php");
            $fopen = fopen($filePath,"w");
            file_put_contents($filePath, $view);
            fclose($fopen);
        }

        return $view;
    }

    public function form(Request $request)
    {
        $table = $request->get('table');

        $folderName = str_replace('_','-',$table);

        $view = view('gii.form',[
            'table'=>$table
        ]);

        if($request->get('process')==1) {
            $filePath = resource_path("views/$folderName/_form.blade.php");
            $fopen = fopen($filePath, "w");
            file_put_contents($filePath, $view);
            fclose($fopen);

        }

        return $view;
    }

    public function index(Request $request)
    {
        $table = $request->get('table');

        $folderName = str_replace('_','-',$table);

        $view = view('gii.index',[
            'table'=>$table
        ]);

        if($request->get('process')==1) {

            $folderPath = resource_path("views/$folderName");

            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0755, true);
            }

            $filePath = resource_path("views/$folderName/index.blade.php");
            $fopen = fopen($filePath,"w");
            fwrite($fopen, $view);
            fclose($fopen);
        }

        return $view;

    }

    public function route(Request $request)
    {
        $table = $request->get('table');

        return view('gii.route',[
            'table'=>$table
        ]);
    }

    public function getFolderName()
    {
        return $folderName = str_replace('_','-',$this->table);
    }

    public function generate(Request $request)
    {
        if($request->get('table') == null) {
            return "Parameter table tidak boleh null";
        }

        $this->model($request);
        $this->controller($request);
        $this->index($request);
        $this->create($request);
        $this->update($request);
        $this->form($request);
        $this->read($request);
        return '<textarea cols="120" rows="20">'.$this->route($request).'</textarea>';
    }
}
