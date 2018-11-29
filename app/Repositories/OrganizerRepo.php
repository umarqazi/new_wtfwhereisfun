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
        if(count($user->organizers)){
            return $user->organizers;
        }else{
            return [];
        }
    }

    public function store($request){
        $organizer = new Organizer;

        $organizer->name                    =       $request->name;
        $organizer->description             =       $request->description;
        $organizer->contact                 =       $request->contact;
        $organizer->email                   =       $request->email;
        $organizer->location                =       $request->location;
        $organizer->website                 =       $request->website;
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

        $organizer->slug                    =       str_slug($organizer->name , '-').'-'.encrypt_id($organizer->id);
        $organizer->save();

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
        $organizer->contact                 =       $request->contact;
        $organizer->email                   =       $request->email;
        $organizer->location                =       $request->location;
        $organizer->is_allowed_on_event_page=       $request->is_allowed_on_event_page;
        $organizer->slug                    =       str_slug($request->name , '-').'-'.encrypt_id($organizer->id);

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

    public function updateProfileImage($updateData, $id){
        return $this->organizerModel->where('id', $id)->update($updateData);
    }

    public function getBySlug($slug){
        return $this->organizerModel->where('slug', $slug)->orWhere('organizer_url', $slug)->first();
    }

    public function getOrganizerEvents($id){
        $organizer = $this->getOrganizer($id);

    }

    public function updateOrganizerUrl($organizer,$request){
        $organizer = Organizer::find($organizer->id);
        $organizer->organizer_url = $request->url.'-'.$organizer->encrypted_id;
        $organizer->update();
        return $organizer;
    }

}