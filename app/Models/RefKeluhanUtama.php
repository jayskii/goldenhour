<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefKeluhanUtama extends Model
{
    protected $table = 'ref_keluhan_utama';

    protected $fillable = [
        'id',
        'nama'
      ];
  
  
      public static function query($params=[])
      {
          $query = parent::query();
  
          if(@$params['id'] != null) {
              $query->where('id', @$params['id']);
          }
  
          if(@$params['nama'] != null) {
              $query->where('nama', @$params['nama']);
          }
  
          return $query;
      }
  
      public static function get($params=[])
      {
          $query = static::query($params);
          return $query->get();
      }
  
      /**
       * @param  $params
       * @return  int
       */
      public static function sum($params=[])
      {
          $query = static::query($params);
  
          return $query->sum(@$params['attribute']);
      }
  
      public static function findArraySelect()
      {
          $array = [];
          foreach(RefKeluhanUtama::all() as $data) {
              $array[$data->id] = $data->nama;
          }
          return $array;
      }
}
