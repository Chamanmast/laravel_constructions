<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ImagePresets;
use App\Models\SiteSetting;
use App\Models\SmtpSetting;
use App\Traits\ImageGenTrait;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    //
    public $path = 'upload/template/thumbnail/';

    public $image_preset;

    public $image_preset_main;

    use ImageGenTrait;

    public function __construct()
    {
        $this->image_preset = ImagePresets::whereIn('id', [1])->get();
        $this->image_preset_main = ImagePresets::find(14);
    }

    public function SmtpSetting()
    {
        $setting = SmtpSetting::find(1);

        return view('backend.setting.smpt_update', compact('setting'));
    }

    // End Method
    public function UpdateSmtpSetting(Request $request, $id)
    {
        SmtpSetting::findOrFail($id)->update([
            'mailer' => $request->mailer,
            'host' => $request->host,
            'port' => $request->port,
            'username' => $request->username,
            'password' => $request->password,
            'encryption' => $request->encryption,
            'from_name' => $request->from_name,
        ]);

        $notification = [
            'message' => 'Smtp Setting Updated Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    // End Method
    public function SiteSetting()
    {

        $sitesetting = SiteSetting::find(1);

        return view('backend.setting.site_update', compact('sitesetting'));
    }

    // End Method
    public function UpdateSiteSetting(Request $request, $id)
    {

        $site_id = $id;

        $validated = $request->validate([
            'site_title' => 'required',
            'app_name' => 'required',
            'logo' => 'mimes:jpeg,jpg,png|max:2048',
            'favicon' => 'mimes:jpeg,jpg,png|max:1048',
        ]);
        if ($request->file('logo')) {
            $image = $request->file('logo');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $image = $request->file('logo');
            $save_url = $this->imageGenrator($image, $this->image_preset_main, $this->image_preset, $this->path);
        } else {
            $save_url = SiteSetting::find($site_id)->logo;
        }

        if ($request->file('favicon')) {
            $image = $request->file('favicon');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $image = $request->file('favicon');
            $save_url2 = $this->imageGenrator($image, $this->image_preset_main, $this->image_preset, $this->path);
        } else {
            $save_url2 = SiteSetting::find($site_id)->favicon;
        }

        SiteSetting::findOrFail($site_id)->update([
            'site_title' => $request->site_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'about' => $request->about,
            'phone' => $request->phone,
            'address' => $request->address,
            'app_name' => $request->app_name,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'pinterest' => $request->pinterest,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,
            'copywrite' => $request->copywrite,
            'pagination' => $request->pagination,
            'logo' => $save_url,
            'favicon' => $save_url2,
        ]);

        $notification = [
            'message' => 'SiteSetting Updated  Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    } // End Method
}
