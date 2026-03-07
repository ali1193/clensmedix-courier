<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingsController extends Controller
{
    public function edit()
    {
        return view('admin.settings.edit', [
            'settings' => [
                'site_name' => Setting::get('site.name', 'ClensMedix Courier LLC'),
                'site_logo' => Setting::get('site.logo_path'),
                'contact_phone' => Setting::get('contact.phone', '832-466-1443'),
                'contact_email' => Setting::get('contact.email', 'Clensmedix@gmail.com'),
                'smtp_host' => Setting::get('smtp.host'),
                'smtp_port' => Setting::get('smtp.port'),
                'smtp_username' => Setting::get('smtp.username'),
                'smtp_password' => Setting::get('smtp.password'),
                'smtp_encryption' => Setting::get('smtp.encryption'),
                'smtp_from_email' => Setting::get('smtp.from_email'),
                'smtp_from_name' => Setting::get('smtp.from_name'),
            ],
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'site_name' => ['required', 'string', 'max:255'],
            'site_logo' => ['nullable', 'image', 'max:2048'],
            'contact_phone' => ['required', 'string', 'max:50'],
            'contact_email' => ['required', 'email', 'max:150'],
            'smtp_host' => ['nullable', 'string', 'max:255'],
            'smtp_port' => ['nullable', 'integer'],
            'smtp_username' => ['nullable', 'string', 'max:255'],
            'smtp_password' => ['nullable', 'string', 'max:255'],
            'smtp_encryption' => ['nullable', 'string', 'max:20'],
            'smtp_from_email' => ['nullable', 'email', 'max:150'],
            'smtp_from_name' => ['nullable', 'string', 'max:255'],
        ]);

        Setting::set('site.name', $data['site_name']);
        Setting::set('contact.phone', $data['contact_phone']);
        Setting::set('contact.email', $data['contact_email']);

        Setting::set('smtp.host', $data['smtp_host'] ?? '');
        Setting::set('smtp.port', $data['smtp_port'] ?? '');
        Setting::set('smtp.username', $data['smtp_username'] ?? '');
        Setting::set('smtp.password', $data['smtp_password'] ?? '');
        Setting::set('smtp.encryption', $data['smtp_encryption'] ?? '');
        Setting::set('smtp.from_email', $data['smtp_from_email'] ?? '');
        Setting::set('smtp.from_name', $data['smtp_from_name'] ?? '');

        if ($request->hasFile('site_logo')) {
            $path = $request->file('site_logo')->move(public_path('uploads'), 'logo-'.time().'.'.$request->file('site_logo')->getClientOriginalExtension());
            $publicPath = 'uploads/'.basename($path);
            Setting::set('site.logo_path', $publicPath);
        }

        return redirect()->route('admin.settings.edit')->with('success', 'Settings updated.');
    }
}
