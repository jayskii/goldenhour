<?php

$modelName = str_replace('_', ' ', $table);
$modelName = ucwords($modelName);
$modelName = str_replace(' ', '', $modelName);

$viewName = str_replace('_', '-',$table);

print "<?php";

?>


namespace App\Http\Controllers;

use App\Models\<?= $modelName; ?>;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Components\GridView;

class <?= $modelName; ?>Controller extends Controller
{
    public $layout = 'layouts.backend.main';

    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index(Request $request)
    {
        $query = <?= $modelName; ?>::query();

        $all<?= $modelName; ?> = $query->get();

        return view('<?= $viewName; ?>.index',[
            'layout' => $this->layout,
            'all<?= $modelName; ?>' => $all<?= $modelName; ?>
        ]);
    }

    public function read(Request $request)
    {
        $id = $request->get('id');
        $model = <?= $modelName; ?>::findOrFail($id);

        return view('<?= $viewName; ?>.read',[
            'layout' => $this->layout,
            'model' => $model
        ]);
    }

    public function create(Request $request)
    {
        $model = new <?= $modelName; ?>();

        $referrer = URL::previous();

        if($request->post('process') == 1 AND $model->loadAttributes($request->all())) {

            $referrer = $request->input('referrer');

            if($model->validate() AND $model->save()) {
                return redirect($referrer)->with('success','Data berhasil disimpan');
            }
        }

        return view('<?= $viewName; ?>.create',[
            'layout' => $this->layout,
            'model' => $model,
            'referrer' => $referrer
        ]);
    }

    public function update(Request $request)
    {
        $id = $request->get('id');
        $model = <?= $modelName; ?>::findOrFail($id);

        $referrer = URL::previous();

        if($request->post('process') == 1 AND $model->loadAttributes($request->all())) {

            $referrer = $request->input('referrer');

            if($model->validate() AND $model->save()) {
                return redirect($referrer)->with('success','Data berhasil disimpan');;
            }
        }

        return view('<?= $viewName; ?>.update',[
            'layout' => $this->layout,
            'model' => $model,
            'referrer' => $referrer
        ]);
    }

    public function delete(Request $request)
    {
        $id = $request->get('id');
        $model = <?= $modelName; ?>::findOrFail($id);

        if($model->delete()) {
            return redirect(URL::previous())->with('success','Data berhasil dihapus');
        } else {
            return redirect(URL::previous())->with('error','Data GAGAL dihapus');
        }
    }
}
