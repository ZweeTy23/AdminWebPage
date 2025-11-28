<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Str; // Importante: Se agregó esta línea para usar Str::slug

class ProfileController extends Controller
{
    public function index()
    {
        $profile = Profile::find(1);
        return view('admin.profile.index', compact('profile'));
    }

    public function update(Request $request, $id)
    {

        $profile = Profile::find($id);

        // 1. Evitamos el error "Column not found: name" y protegemos los campos de archivo
        $profile->fill($request->except(['logo', 'seo', 'favicon', 'name']));

        // Nos aseguramos de que company_name se asigne correctamente
        $profile->company_name = $request->company_name;

        // Variables para borrar imágenes antiguas
        $logo_previous = $profile->logo;
        $seo_previous = $profile->seo;
        $favicon_previous = $profile->favicon;

        // Creamos un nombre base usando el nombre de la empresa (ej: "mi-empresa")
        // Si no hay company_name, usamos "default" para evitar errores
        $base_name = Str::slug($request->company_name ?? 'default');

        // --- LOGO ---
        if ($request->hasFile('logo')) {
            // Corrección: Agregada la barra '/' que faltaba
            $previous_path = public_path('img/profile/' . $logo_previous);

            if (file_exists($previous_path) && is_file($previous_path)) {
                unlink($previous_path);
            }

            $logo = $request->file('logo');
            // Corrección: Usamos $base_name en lugar de $request->name
            $logo_name = $base_name . '.' . $logo->guessExtension();

            $route = public_path('img/profile/');
            $logo->move($route, $logo_name); // Usamos move para guardar
            $profile->logo = $logo_name;
        }

        // --- SEO ---
        if ($request->hasFile('seo')) {
            $previous_path = public_path('img/profile/' . $seo_previous);

            if (file_exists($previous_path) && is_file($previous_path)) {
                unlink($previous_path);
            }

            $seo = $request->file('seo');
            $seo_name = $base_name . '-seo.' . $seo->guessExtension();

            $route = public_path('img/profile/');
            $seo->move($route, $seo_name);
            $profile->seo = $seo_name;
        }

        // --- FAVICON ---
        if ($request->hasFile('favicon')) {
            $previous_path = public_path('img/profile/' . $favicon_previous);

            if (file_exists($previous_path) && is_file($previous_path)) {
                unlink($previous_path);
            }

            $favicon = $request->file('favicon');
            $favicon_name = $base_name . '-favicon.' . $favicon->guessExtension();

            $route = public_path('img/profile/');
            $favicon->move($route, $favicon_name);
            $profile->favicon = $favicon_name;
        }

        $profile->save();

        return redirect()->back();
    }
}
