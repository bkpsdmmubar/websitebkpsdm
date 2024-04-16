<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{

    public function index(){

        return view('dashboardweb.video.index',[
            'videos' => Video::orderBy('id','desc')->get()
        ]);


    }

    public function store(Request $request){

        $rules = [
            'judul' => 'required',
            'youtube_code' => 'required',
        ];

        $messages = [
            'judul.required' => 'Judul wajib diisi!',
            'youtube_code.required' => 'Code Youtube wajib diisi!',
        ];

        $this->validate($request, $rules, $messages);

        Video::create([
            'judul' => $request->judul,
            'youtube_code' => $request->youtube_code,
        ]);

        return redirect( route('video') )->with('success', 'Data Video berhasil di simpan');

    }

    public function update(Request $request, $id){
        $video = Video::find($id);

        
        $rules = [
            'judul' => 'required',
            'youtube_code' => 'required',
        ];

        $messages = [
            'judul.required' => 'Judul wajib diisi!',
            'youtube_code.required' => 'Code Youtube wajib diisi!',
        ];

        $this->validate($request, $rules, $messages);

        $video->update([
            'judul' => $request->judul,
            'youtube_code' => $request->youtube_code,
        ]);

        return redirect(route('video'))->with('success', 'Data Video berhasil di update');


    }


    public function delete($id){

        $video = Video::find($id);
        
        $video->delete();

        return redirect(route('video'))->with('success', 'data berhasil di hapus');

    }

}
