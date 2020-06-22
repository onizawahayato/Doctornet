<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Symptom;
use Storage;
class NetController extends Controller
{
    public function add()
  {
      return view('admin.net.create');
  }
  public function create(Request $request)
  {
     $this->validate($request, Symptom::$rules);
     $net = new Symptom;
     $form = $request->all();

     if (isset($form['image'])) {
        $path = Storage::disk('s3')->putFile('/',$form['image'],'public');
        $net->image_path = Storage::disk('s3')->url($path);
     } else {
          $net->image_path = null;
     }

     unset($form['_token']);
     unset($form['image']);
     $net->fill($form);
     $net->save();

     return redirect('admin/net/create');
  }

  public function index(Request $request)
  {
     $cond_title = $request->cond_title;
     if ($cond_title != '') {
          $posts = Symptom::where('title', $cond_title)->get();
     } else {
          $posts = Symptom::all();
      }
      return view('admin.net.index', ['posts' => $posts, 'cond_title' => $cond_title]);
  }  
  
  public function edit(Request $request)
  {
      $net = Symptom::find($request->id);
      if (empty($net)) {
        abort(404);    
      }
      return view('admin.net.edit', ['net_form' => $net]);
  }


   public function update(Request $request)
    {
        $this->validate($request, Symptom::$rules);
        $net = Symptom::find($request->id);
        $net_form = $request->all();
        if ($request->remove == 'true') {
            $net_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = Storage::disk('s3')->putFile('/',$form['image'],'public');
            $net->image_path = Storage::disk('s3')->url($path);
        } else {
            $net_form['image_path'] = $net->image_path;
        }

        unset($net_form['_token']);
        unset($net_form['image']);
        unset($net_form['remove']);
        $net->fill($net_form)->save();


        return redirect('admin/net/');
    }
  public function delete(Request $request)
  {
      $net = Condition::find($request->id);
      $net->delete();
      return redirect('admin/net/');
  }  
}
