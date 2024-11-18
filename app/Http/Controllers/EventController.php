<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Relawan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        if($search){
            $events = Event::where('nama','like','%'. $search. '%')->orWhere('tags','like','%'. $search. '%')->orWhere('lokasi','like','%'. $search. '%')->orWhere('event_detail','like','%'. $search. '%')->get();
        }else{
            $events = Event::with('user')->get();
        }

        return view('event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('event.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'event_image' => 'required',
            'event_image.*' => 'image|mimes:jpeg,jpg,png|max:2048',
            'host' => 'required|exists:users,id',
            'nama' => 'required|min:5|regex:/^[A-Za-z0-9\s]+$/|string',
            'tags' => 'required|in:lingkungan,kemanusiaan,olahraga|string',
            'tanggal_mulai' => 'required|date|after:today',
            'tanggal_selesai' => 'required|date',
            'lokasi' => 'required|string|min:3|max:255|regex:/^[A-Za-z0-9\s,.-]+$/',
            'event_detail' => 'required|string|min:10|max:2000',
            'requirement' => 'required|string|min:10|max:2000',
            'target_donasi' => 'required|numeric'
        ]);

        $imagePath = [];

        if( $request->hasFile('event_image')){
            foreach($request->file('event_image') as $image){
                $imagePath[] = $image->store('event', 'public');
            }
        }

        Event::create([
            'event_image' => json_encode($imagePath),
            'host' => $request->host,
            'nama' => $request->nama,
            'tags' => $request->tags,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'lokasi' => $request->lokasi,
            'event_detail' => $request->event_detail,
            'requirement' => $request->requirement,
            'target_donasi' => $request->target_donasi
        ]);

        return redirect()->route('event.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        // session(['event_id' => $event->id_event]);
        $relawans = Relawan::where('event_id', $event->id_event)->latest()->get();
        return view('event.show', compact('event', 'relawans'));   
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        
        return view('event.update', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event): RedirectResponse
    {
        $request->validate([
            'event_image' => 'required',
            'event_image.*' => 'image|mimes:jpeg,jpg,png|max:2048',
            'nama' => 'required|min:5|regex:/^[A-Za-z0-9\s]+$/|string',
            'tags' => 'required|in:lingkungan,kemanusiaan,olahraga|string',
            'tanggal_mulai' => 'required|date|after:today',
            'tanggal_selesai' => 'required|date',
            'lokasi' => 'required|string|min:3|max:255|regex:/^[A-Za-z0-9\s,.-]+$/',
            'event_detail' => 'required|string|min:10|max:2000',
            'requirement' => 'required|string|min:10|max:2000',
            'target_donasi' => 'required|numeric'
        ]);

        

        if($request->hasFile('event_image')){

            if($event->event_image) {
                $oldImages = json_decode($event->event_image, true);
                foreach($oldImages as $oldImage) {
                    Storage::disk('public')->delete($oldImage);
                }
            }   

            $imagePath = [];
            
            foreach($request->file('event_image') as $image){
                $imagePath[] = $image->store('event', 'public');
            }
    
            
    
            $event->update([
                'event_image' => json_encode($imagePath),
                'nama' => $request->nama,
                'tags' => $request->tags,
                'tanggal_mulai' => $request->tanggal_mulai,
                'tanggal_selesai' => $request->tanggal_selesai,
                'lokasi' => $request->lokasi,
                'event_detail' => $request->event_detail,
                'requirement' => $request->requirement,
                'target_donasi' => $request->target_donasi
            ]);
        }else{
            $event->update([
                'nama' => $request->nama,
                'tags' => $request->tags,
                'tanggal_mulai' => $request->tanggal_mulai,
                'tanggal_selesai' => $request->tanggal_selesai,
                'lokasi' => $request->lokasi,
                'event_detail' => $request->event_detail,
                'requirement' => $request->requirement,
                'target_donasi' => $request->target_donasi
            ]);
        }

        return redirect()->route('event.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {   
        if($event->event_image) {
            $imagePaths = json_decode($event->event_image, true);
            foreach($imagePaths as $path) {
                Storage::disk('public')->delete($path);
            }
        }
        
        $event->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');


    }
}
