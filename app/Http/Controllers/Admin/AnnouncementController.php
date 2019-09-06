<?php

namespace App\Http\Controllers\Admin;

use Announcements;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $announcements = Announcements::get();
      return view('admin');
    }

    public function show($id)
    {
        //
    }

    public function newAnnouncement()
    {
        return view('announcement.new_announcement');
    }

    public function create()
    {
        return view(
            'admin.announcement.new_announcement',
            ['announcement' => null]
        );
    }

    public function edit($id)
    {
        $announcement = Announcements::find($id);

        return view(
            'admin.announcement.new_announcement',
            ['announcement' => $announcement]
        );
    }

    public function store(Request $request)
    {
        $announcement = new Announcement();
        $announcement->title = $request->get('title');
        $announcement->body = $request->get('body');
        $announcement->save();
        return redirect('admin/users');
    }

    public function update(Request $request, $id)
    {
        $announcement = Announcements::find($id);
        $announcement = new Announcement();
        $announcement->title = $request->get('title');
        $announcement->body = $request->get('body');
        $announcement->save();
        return redirect('admin/users');
    }
}
