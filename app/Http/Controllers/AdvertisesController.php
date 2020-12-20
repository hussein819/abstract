<?php

namespace App\Http\Controllers;

use App\Models\Advertise;
use App\Models\Contact;
use App\Models\User;
use App\Models\Website;
use Illuminate\Http\Request;
use function GuzzleHttp\default_user_agent;

class AdvertisesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $advertise = Advertise::all();
        $advertise = Advertise::simplepaginate(15);
        return view('abstract.index', compact('advertise'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create(Advertise $advertise)
    {
        $websites = Website::all();
        return view('control.add', compact('advertise', 'websites'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request, Advertise $advertise)
    {
        $advertise->load('user.advertises');
        $data = $this->getValidation();
        $advertise = auth()->user()->advertises()->create($data);
        $this->storeFile($advertise);
        return redirect(route('control.add'))->with('message', '');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show()
    {
        $advertises = Advertise::all()->sortBy('id');
        $advertises->load('website.advertises');
        return view('control.show', compact('advertises'));
    }

    public function details(Advertise $advertise)
    {
        return view('control.details', compact('advertise'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Advertise $advertise)
    {
        $user = User::all();
        $websites = Website::all();
        return view('control.edit', compact('advertise', 'user', 'websites'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Advertise $advertise)
    {
        $data = $this->getValidation();
        $advertise->update($data);

        $this->storeFile($advertise);
        return redirect(route('control.show'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy(Advertise $advertise)
    {
        $advertise->delete();

        return redirect(route('control.show'));
    }

    /////////////////////////////////////////////////
    ///
    public function category(Advertise $advertise, User $user)
    {
        return view('abstract.category', compact('advertise', 'user'));
    }

    public function about(Advertise $advertise, User $user)
    {
        return view('abstract.about');
    }

    public function audio(Advertise $advertise, Request $request)
    {
        $contacts = Contact::where('website_id', $request->query('website_id', 1))->get()->sortByDesc('id');
        // $contact=\DB::table('contacts')->get();
        $count = $contacts->count();
        $website = Website::all();

        return view('abstract.single_audio', compact('advertise', 'count', 'contacts', 'website'));
    }

    public function video(Advertise $advertise, Request $request)
    {
        $contacts = Contact::where('website_id', $request->query('website_id', 3))->get()->sortByDesc('id');
        // $contact=\DB::table('contacts')->get();
        $count = $contacts->count();
        $website = Website::all();
        return view('abstract.single_video', compact('advertise', 'count', 'contacts', 'website'));

    }

    public function contact(Advertise $advertise, Contact $contact, Request $request)
    {
        //$contact = Contact::all();
        $website = Website::all();
        return view('abstract.contact', compact('advertise', 'contact', 'website'));

    }

    public function gallery(Advertise $advertise, User $user, Request $request)
    {
        $contacts = Contact::where('website_id', $request->query('website_id', 2))->get()->sortByDesc('id');
        // $contact=\DB::table('contacts')->get();
        $count = $contacts->count();
        $website = Website::all();
        return view('abstract.single_gallery', compact('advertise', 'count', 'contacts', 'website'));

    }

    public function standard(Advertise $advertise, Request $request)
    {
        $contacts = Contact::where('website_id', $request->query('website_id', 2))->get()->sortByDesc('id');
        // $contact=\DB::table('contacts')->get();
        $count = $contacts->count();
        $website = Website::all();

        return view('abstract.single_standard', compact('advertise', 'contacts', 'count', 'website'));

    }

    public function search(Advertise $advertise, Request $request)
    {
        $q = $_GET['q'];
        $advertise = Advertise::where('title', 'LIKE', '%' . $q . '%')->orWhere('summary', 'LIKE', '%' . $q . '%')->get();
        if (count($advertise) > 0) {
            return view('abstract.search')->withDetails($advertise)->withQuery($q);
        } else {
            return view('abstract.search')->withMessage('No Details found. Try to search again !');
        }

    }

    public function contact_store(Contact $contact, Advertise $advertise)
    {
        $data = $this->getValidationContact();
        $contact = auth()->user()->contacts()->create($data);
        return redirect()->back();

    }

    public function contact_destroy(Contact $contact, Advertise $advertise)
    {
        $contact->delete();
        return redirect()->back();
    }

    public function contact_edit(Contact $contact, Advertise $advertise)
    {
        // $contacts = Contact::all();
        $websites = Website::all();
        return view('abstract.editcontact', compact('advertise', 'contact', 'websites'));
    }

    public function contact_update(Contact $contact, Advertise $advertise)
    {
        $data = $this->getValidationContact();
        $contact->update($data);
        return redirect()->back();

    }

    public function guide(Advertise $advertise, User $user)
    {
        $contacts = Contact::all();
        $website = Website::all();
        return view('abstract.style_guide', compact('advertise', 'contacts', 'website'));

    }

    protected function getValidation()
    {
        return \request()->validate([
            'title' => 'required|max:50',
            'summary' => 'required',
            'details' => 'required',
            'website_id' => 'required',
            'audios' => 'sometimes|file|mimes:audio/mpeg,mpga,mp3,wav,aac',
            'videos' => 'sometimes|file|mimes:mp4,mov,ogg ',
            'photos' => 'sometimes|file|mimes:jpeg,jpg,png,gif',
            'photo_audio' => 'sometimes|file|mimes:jpeg,jpg,png,gif',
        ]);
    }

    protected function getValidationContact()
    {
        return \request()->validate([
            'website_id' => 'required|',
            'comment' => ['required', 'max:2000'],
        ]);
    }

    private function storeFile(Advertise $advertise)
    {
        //code for upload photos
        if (\request()->hasFile('photos')) {
            $advertise->update([
                'photos' => \request()->photos->store('advertises.photos', 'public'),
            ]);

        }
        if (\request()->hasFile('audios')) {
            $advertise->update([
                'audios' => \request()->audios->store('advertises.audios', 'public'),
            ]);
        }
        if (\request()->hasFile('photo_audio')) {
            $advertise->update([
                'photo_audio' => \request()->photo_audio->store('advertises.photo_audio', 'public'),
            ]);
        }

        if (\request()->hasFile('videos')) {
            $advertise->update([
                'videos' => \request()->videos->store('advertises.videos', 'public'),
            ]);
        }
    }

    /* if(is_array($request->file('audios')))
    {e
    $audios=array();
    foreach($request->file('audios') as $advertis) {
    $uniqueid=uniqid();
    $original_name=$advertis->getClientOriginalName();
    $size=$advertis->getSize();
    $extension=$advertis->getClientOriginalExtension();
    $filename=Carbon::now()->format('Ymd').'_'.$uniqueid.'.'.$extension;
    $audiopath=url('/storage/audios/'.$filename);
    $path=$advertis->storeAs('/audios',$filename);
    array_push($audios,$audiopath);
    }
    $all_audios=implode(",",$audios);
    }else{
    // handle single file
    if($request->hasFile('audios')){
    $uniqueid=uniqid();
    $original_name=$request->file('audios')->getClientOriginalName();
    $size=$request->file('audios')->getSize();
    $extension=$request->file('audios')->getClientOriginalExtension();
    $filename=Carbon::now()->format('Ymd').'_'.$uniqueid.'.'.$extension;
    $audiopath=url('/storage/audios/'.$filename);
    $path=$advertis->storeAs('public/audios/',$filename);
    $all_audios=$audiopath;
    } */
    public function user_show()
    {
        $users = User::all()->sortBy('id');
        return view('control.users.show', compact('users'));
    }
}
