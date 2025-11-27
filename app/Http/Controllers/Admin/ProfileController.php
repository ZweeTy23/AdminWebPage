<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = Profile::find(1);
        return view('admin.profile.index', compact('profile'));
    }

    public function update(Request $request, $id)
    {
        $profile = Profile::findOrFail($id);

        // Validamos
        $request->validate([
            'company_name' => 'required|string|max:255',
            'title'        => 'required|string|max:255',
        ]);

        // Llenamos excepto archivos
        $profile->fill($request->except(['logo', 'seo', 'favicon']));

        // Guardamos imágenes
        $dir = public_path('img/profile/');

        // LOGO
        if ($request->hasFile('logo')) {
            if ($profile->logo && file_exists($dir.$profile->logo)) {
                unlink($dir.$profile->logo);
            }

            $newName = Str::slug($profile->company_name).'.'.$request->logo->extension();
            $request->logo->move($dir, $newName);
            $profile->logo = $newName;
        }

        // SEO
        if ($request->hasFile('seo')) {
            if ($profile->seo && file_exists($dir.$profile->seo)) {
                unlink($dir.$profile->seo);
            }

            $newName = Str::slug($profile->company_name).'-seo.'.$request->seo->extension();
            $request->seo->move($dir, $newName);
            $profile->seo = $newName;
        }

        // FAVICON
        if ($request->hasFile('favicon')) {
            if ($profile->favicon && file_exists($dir.$profile->favicon)) {
                unlink($dir.$profile->favicon);
            }

            $newName = Str::slug($profile->company_name).'-favicon.'.$request->favicon->extension();
            $request->favicon->move($dir, $newName);
            $profile->favicon = $newName;
        }

        $profile->save();

        return redirect()->back()->with('success', 'Perfil actualizado correctamente');
    }
}
