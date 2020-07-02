<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Diagnosis;
use Storage;

class Net1Controller extends Controller
{
    public function add()
    {
        return view('admin.net1.create');
    }
    public function create(Request $request)
    {
        $this->validate($request, Diagnosis::$rules);
        $net1 = new Diagnosis;
        $form = $request->all();

   

        unset($form['_token']);
     
        $net1->fill($form);
        $net1->save();
        $symptom_id = $form['symptom_id'];

        return redirect(route('symptom_detail', ['id' => $symptom_id]));
    }

    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            $posts = Diagnosis::where('title', $cond_title)->get();
        } else {
            $posts = Diagnosis::all();
        }
        return view('admin.net1.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
  
    public function edit(Request $request)
    {
        $net1 = Diagnosis::find($request->id);
        if (empty($net1)) {
            abort(404);
        }
        return view('admin.net1.edit', ['net1_form' => $net1]);
    }


    public function update(Request $request)
    {
        $this->validate($request, Diagnosis::$rules);
        $net1 = Diagnosis::find($request->id);
        $net1_form = $request->all();
        if ($request->remove == 'true') {
            $net1_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = Storage::disk('s3')->putFile('/', $form['image'], 'public');
            $net1->image_path = Storage::disk('s3')->url($path);
        } else {
            $net1_form['image_path'] = $net1->image_path;
        }

        unset($net1_form['_token']);
        unset($net1_form['image']);
        unset($net1_form['remove']);
        $net1->fill($net1_form)->save();


        return redirect('admin/net1/');
    }
    public function delete(Request $request)
    {
        $net1 = Diagnosis::find($request->id);
        $net1->delete();
        return redirect('admin/net1/');
    }
}
