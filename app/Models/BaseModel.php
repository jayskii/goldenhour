<?php


namespace App\Models;

use App\Components\Form;
use App\Components\Html;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class BaseModel
 *
 * @package App\Models
 * @method static \App\Models\BaseModel findOrFail($id)
 * @method static create(array $data)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BaseModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BaseModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BaseModel query()
 * @mixin \Eloquent
 */
class BaseModel extends Model
{
    public $errors = false;

    public static function rules()
    {
        return [];
    }

    public static function rulesMessage()
    {
        return [];
    }

    public function loadAttributes($input=[])
    {
        if(count($input)==0) {
            return false;
        }

        foreach($this->fillable as $attribute) {
            if(@$input[$attribute] !== null) {
                $this->$attribute = $input[$attribute];
            }
        }

        return true;

    }

    public function loadFillable(Request $request)
    {

        $input = $request->input();

        foreach($this->fillable as $attribute) {
            if(array_key_exists($attribute, $input)) {
                $this->$attribute = $input[$attribute];
            }
            if(@$input[$attribute] !== null) {

            }
        }

        return true;

    }

    public function save(array $options = [])
    {
        if($this->validate()) {
            return parent::save($options);
        }

        return false;

    }

    public function validate()
    {
        $validator = Validator::make(
            $this->getAttributes(),
            static::rules(),
            static::rulesMessage()
        );

        if($validator->fails()) {
            $this->errors = $validator->messages();
            return false;
        }

        return true;
    }

    public function hasErrors()
    {
        if($this->errors!=false) {
            return $this->errors->any();
        }

        return false;
    }

    public function getErrors()
    {
        if($this->errors!=false) {
            return $this->errors->all();
        }

        return null;
    }

    /**
     * @return \Infureal\Html\Tag
     */
    public function getLinkReadIcon()
    {
        return Html::a('<i class="fa fa-eye"></i>',$this->urlRead());
    }

    public function urlUpdate()
    {
        $url = str_replace('_','-',$this->table);
        $url = url('/'.$url.'/update/'.$this->id);
        return $url;
    }

    public function urlRead()
    {
        $url = str_replace('_','-',$this->table);
        $url = url('/'.$url.'/read/'.$this->id);
        return $url;
    }

    public function urlDelete()
    {
        $url = str_replace('_','-',$this->table);
        $url = url('/'.$url.'/delete/'.$this->id);

        return $url;
    }

    public function getLinkUpdateIcon()
    {
        return Html::a('<i class="fa fa-pencil-alt"></i>',$this->urlUpdate());
    }

    public function getLinkUpdateButton()
    {
        return Html::a('<i class="fa fa-pencil-alt"></i> Ubah',$this->urlUpdate(),[
            'class'=>'btn btn-success btn-flat'
        ]);
    }

    public function getLinkDeleteIcon()
    {
        $output = Html::a('<i class="fa fa-trash"></i>',$this->urlDelete(),[
            'onclick'=>"return confirm('Yakin akan menghapus data?');"
        ]);

        return $output;

        /*

        $route = str_replace('_','-',$this->table);
        $route = $route.'.delete';
        $route = [$route,'id'=>$this->id];

        $output = Html::form($output,[
            'method' => 'post',
            'action' => $url
        ]);

        $output .= Form::close();

        return $output;
        */
    }
}
