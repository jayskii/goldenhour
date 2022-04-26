<?php

namespace App\Http\Controllers;

use App\Models\UserUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use App\Components\GridView;

class UserUserController extends Controller
{
    public $layout = 'layouts.backend.main';

    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index(Request $request)
    {
        $id_user_role = $request->get('id_user_role');

        $query = UserUser::query([
            'id_user_role' => $id_user_role
        ]);

        $allUserUser = $query->get();

        return view('user-user.index',[
            'layout' => $this->layout,
            'allUserUser' => $allUserUser,
            'id_user_role' => $id_user_role
        ]);
    }

    public function read(Request $request)
    {
        $id = $request->get('id');
        $model = UserUser::findOrFail($id);

        return view('user-user.read',[
            'layout' => $this->layout,
            'model' => $model
        ]);
    }

    public function create(Request $request)
    {
        $model = new UserUser();
        $model->id_user_role = $request->get('id_user_role');

        $referrer = URL::previous();

        if($request->post('process') == 1) {

            $referrer = $request->input('referrer');

            $model->username = $request->post('username');
            $model->password = $request->post('password');
            $model->password = Hash::make($model->password);

            if($model->save()) {
                return redirect($referrer)->with('success','Data berhasil disimpan');
            }
        }

        return view('user-user.create',[
            'layout' => $this->layout,
            'model' => $model,
            'referrer' => $referrer
        ]);
    }

    public function update(Request $request)
    {
        $id = $request->get('id');
        $model = UserUser::findOrFail($id);

        $referrer = URL::previous();

        if($request->post('process') == 1) {

            $referrer = $request->input('referrer');

            $model->username = $request->post('username');
            $model->password = $request->post('password');
            $model->id_faskes = $request->post('id_faskes');
            $model->password = Hash::make($model->password);

            if($model->save()) {
                return redirect($referrer)->with('success','Data berhasil disimpan');;
            }
        }

        return view('user-user.update',[
            'layout' => $this->layout,
            'model' => $model,
            'referrer' => $referrer
        ]);
    }

    public function delete(Request $request)
    {
        $id = $request->get('id');
        $model = UserUser::findOrFail($id);

        if($model->delete()) {
            return redirect(URL::previous())->with('success','Data berhasil dihapus');
        } else {
            return redirect(URL::previous())->with('error','Data GAGAL dihapus');
        }
    }
}
