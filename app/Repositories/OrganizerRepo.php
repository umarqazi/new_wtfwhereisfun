<?php
/**
 * Created by PhpStorm.
 * User: jazib
 * Date: 8/31/18
 * Time: 5:00 PM
 */

namespace App\Repositories;

use App\Organizer;
use Illuminate\Support\Facades\Auth;
class OrganizerRepo
{
    /**
     * @var Organzier
     */
    private $organizerModel;

    /**
     * organizerRepo constructor.
     */
    public function __construct()
    {
        $organizerModel = new Organizer();
        $this->organizerModel = $organizerModel;
    }
    public function getAll(){
        return Organizer::all();
    }

    public function userOrganizers(){
        $user = Auth::user();
        return $user->organizers;
    }

    public function store($request){
        $organizer = new Organizer;

        $organizer->name                    =       $request->name;
        $organizer->description             =       $request->description;
        $organizer->website                 =       $request->website;
        $organizer->organizer_url           =       $request->organizer_url;
        $organizer->facebook                =       $request->facebook;
        $organizer->twitter                 =       $request->twitter;
        $organizer->instagram               =       $request->instagram;
        $organizer->google                  =       $request->google;
        $organizer->timbler                 =       $request->timbler;
        $organizer->linkedin                =       $request->linkedin;
        $organizer->background_color        =       $request->background_color;
        $organizer->text_color              =       $request->text_color;
        $organizer->is_allowed_on_event_page=       $request->is_allowed_on_event_page;

        $user  = Auth::user();
        $user->organizers()->save($organizer);
        return $organizer;
    }

    public function getOrganizer($id){
        return Organizer::find($id);
    }

    public function profileUpdate($request, $id){
        $organizer = Organizer::find($id);

        $organizer->name                    =       $request->name;
        $organizer->description             =       $request->description;
        $organizer->website                 =       $request->website;
        $organizer->organizer_url           =       $request->organizer_url;
        $organizer->is_allowed_on_event_page=       $request->is_allowed_on_event_page;

        $organizer->save();
        return $organizer;
    }

    public function socialLinksUpdate($request, $id){
        $organizer = Organizer::find($id);

        $organizer->facebook                =       $request->facebook;
        $organizer->twitter                 =       $request->twitter;
        $organizer->instagram               =       $request->instagram;
        $organizer->google                  =       $request->google;
        $organizer->timbler                 =       $request->timbler;
        $organizer->linkedin                =       $request->linkedin;

        $organizer->save();
        return $organizer;
    }

    public function profileColorsUpdate($request, $id){
        $organizer = Organizer::find($id);

        $organizer->text_color              =       $request->text_color;
        $organizer->background_color        =       $request->background_color;

        $organizer->save();
        return $organizer;
    }

    public function deleteImage($id){
        $organizer = $this->organizerModel->where('id', $id)->first();
        $this->organizerModel->where('id', $id)->update(['thumbnail' => '']);
        return $organizer->thumbnail;
    }

    public function updateProfileImage($file, $id){
        $this->organizerModel->where('id', $id)->update(['thumbnail' => $file]);
    }

}