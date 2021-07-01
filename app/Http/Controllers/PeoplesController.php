<?php

namespace App\Http\Controllers;

use App\Models\jobs;
use App\Models\people;
use App\Http\Requests\peopleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class PeoplesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peoples = people::join('jobs','jobs.id', '=' , 'people.jobs_id')
        ->select(
            'people.id','people.name','jobs.id as id_jobs',
            'jobs.name as name_jobs','people.img','people.slug'
        )
        ->latest('id')
        ->paginate(6);

        return view('peoples.index',compact('peoples'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jobs = jobs::all();
        return view('peoples.create', compact('jobs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(peopleRequest $request)
    {

        $slug = Str::slug($request->name);

        $people = people::select('id')->where('slug','=',$slug)->get();

        if($people->collect()->count() != 0)
        {
           
            $new_slug = $slug.'-'.$people[0]['id']+random_int(1,1000000000);

        }   
        else {
            
            $new_slug = $slug;

        }

        $img = $request->file('img')->store('public/peoples');
        $url = Storage::url($img);


        $persona = new people ();

        $persona->name = $request->name;
        $persona->slug = $new_slug;
        $persona->jobs_id = $request->job;
        $persona->img = $url;

        $persona->save();


        $request->session()->flash('bg', 'success');
        $request->session()->flash('name', $request->name);
        $request->session()->flash('msg', 'se ha creado con exito');

        return redirect('/personas')->with('status', true);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        if(Cache::has('people'.'-'.$slug)){ 
            $people = Cache::get('people'.'-'.$slug);
        }   
        else{
            $people = people::join('jobs','jobs.id', '=' , 'people.jobs_id')
            ->select('people.id','people.name','jobs.id as id_jobs','jobs.name as name_jobs','people.img','people.slug')
            ->where('people.slug','=',$slug)
            ->paginate(6);

            Cache::put('people'.'-'.$slug, $people);
        }


        return view('peoples.show',compact('people'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        if(Cache::has('people'.'-'.$slug)){ 
            $people = Cache::get('people'.'-'.$slug);
        }
        else{
            $people = people::join('jobs','jobs.id', '=' , 'people.jobs_id')
            ->select('people.id','people.name','jobs.id as id_jobs','jobs.name as name_jobs','people.img','people.slug')
            ->where('people.slug','=',$slug)
            ->paginate(6);

            Cache::put('people'.'-'.$slug, $people);
        }

        $jobs = jobs::all()->where('id', '!=', $people[0]['id_jobs'] );

        return view('peoples.edit',compact('people','jobs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function urlImage(Request $request,$ulr_old){

        if($request->hasFile('img')){

            $img = $request->file('img')->store('public/peoples');
            $url = Storage::url($img);       

        }
        else {
            
            $url = $ulr_old;

        }

        return $url;

    }

    public function update(Request $request, $slug)
    {
        $request->validate([
            "name" => "required",
            "job" => "required"
        ]);

        $people = people::where('slug','=',$slug)->get();

        
        foreach ($people as $persona)  {
            
            $old_name = $persona->name;
            $old_slug = $persona->slug;
            $old_img = $persona->img;
            $id = $persona->id;
        }


        if ($old_name == $request->name) {
            
            $new_slug = $old_slug;

        }

        else {

            $new_slug = Str::slug($request->name);

            $rs = people::select('id')->where('slug', '=' ,$new_slug)->get();


            if($rs->collect()->count() != 0){

                $id_create = people::latest('id')->limit(1)->get();
                $new_slug = $new_slug.'-'.$id_create[0]['id']+1;
            }

        }

        $url = $this->urlImage($request, $old_img);

        $persona = people::find($id);

        try {

            $persona->update([
                "name" => $request->name,
                "slug" => $new_slug,
                "jobs_id" => $request->job,
                "img" => $url
            ]);
    
        Cache::forget('people'.'-'.$old_slug);
            
        $request->session()->flash('bg', 'warning');
        $request->session()->flash('name', $request->name);
        $request->session()->flash('msg', 'se ha modificado con exito');

        return redirect('/personas')->with('status', true); 
        
        } catch (\Throwable $th) {

            $request->session()->flash('bg', 'danger');
            $request->session()->flash('name', "");
            $request->session()->flash('msg', 'Ocurrio un error');

            return redirect('/personas')->with('status', true); 
        }


    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $people = people::find($id);
        
        Cache::forget('people'.'-'.$people->slug);
        people::destroy($id);

        session()->flash('bg', 'danger');
        session()->flash('name', $people->name);
        session()->flash('msg', 'Se elimino');
        
        return redirect('personas')->with('status',true);
     
    }


}

