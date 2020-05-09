<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Net;
use App\History;
use Carbon\Carbon;
use Storage;

class NetController extends Controller
{
  public function add()
  {
      return view('admin.net.create');
  }
  public function create(Request $request)
  {
     $this->validate($request, Net::$rules);
     $net = new Net;
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
          $posts = Net::where('title', $cond_title)->get();
     } else {
          $posts = Net::all();
      }
      return view('admin.net.index', ['posts' => $posts, 'cond_title' => $cond_title]);
  }  
  
  public function edit(Request $request)
  {
      $net = Net::find($request->id);
      if (empty($net)) {
        abort(404);    
      }
      return view('admin.net.edit', ['net_form' => $net]);
  }


   public function update(Request $request)
    {
        $this->validate($request, Net::$rules);
        $net = Net::find($request->id);
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

        $history = new History;
        $history->net_id = $net->id;
        $history->edited_at = Carbon::now();
        $history->save();

        return redirect('admin/net/');
    }
  public function delete(Request $request)
  {
      $net = Net::find($request->id);
      $net->delete();
      return redirect('admin/net/');
  }  


}