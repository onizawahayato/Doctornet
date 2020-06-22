<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Condition;
use Storage;
class Net2Controller extends Controller
{
    public function add()
  {
      return view('admin.net2.create');
  }
  public function create(Request $request)
  {
     $this->validate($request, Condition::$rules);
     $net2 = new Condition;
     $form = $request->all();

     if (isset($form['image'])) {
        $path = Storage::disk('s3')->putFile('/',$form['image'],'public');
        $net2->image_path = Storage::disk('s3')->url($path);
     } else {
          $net2->image_path = null;
     }

     unset($form['_token']);
     unset($form['image']);
     $net2->fill($form);
     $net2->save();

     return redirect('admin/net2/create');
  }

  public function index(Request $request)
  {
     $cond_title = $request->cond_title;
     if ($cond_title != '') {
          $posts = Condition::where('title', $cond_title)->get();
     } else {
          $posts = Condition::all();
      }
      return view('admin.net2.index', ['posts' => $posts, 'cond_title' => $cond_title]);
  }  
  
  public function edit(Request $request)
  {
      $net2 = Condition::find($request->id);
      if (empty($net2)) {
        abort(404);    
      }
      return view('admin.net2.edit', ['net2_form' => $net2]);
  }


   public function update(Request $request)
    {
        $this->validate($request, Condition::$rules);
        $net2 = Condition::find($request->id);
        $net2_form = $request->all();
        if ($request->remove == 'true') {
            $net2_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = Storage::disk('s3')->putFile('/',$form['image'],'public');
            $net2->image_path = Storage::disk('s3')->url($path);
        } else {
            $net2_form['image_path'] = $net2->image_path;
        }

        unset($net2_form['_token']);
        unset($net2_form['image']);
        unset($net2_form['remove']);
        $net2->fill($net2_form)->save();


        return redirect('admin/net2/');
    }
  public function delete(Request $request)
  {
      $net2 = Condition::find($request->id);
      $net2->delete();
      return redirect('admin/net2/');
  }  
}
