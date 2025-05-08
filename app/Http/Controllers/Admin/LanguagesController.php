<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Languages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LanguagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Languages::all();
        return view('admin-dashboard.settings.languages.index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-dashboard.settings.languages.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'status' => 'required|string',
                'icon' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            ]);

            if ($request->hasFile('icon')) {
                $icon = $request->file('icon');
                $iconName = time() . '-' . $icon->getClientOriginalName();
                $destinationPath = public_path('dashboard/images/icons');
                $icon->move($destinationPath, $iconName);
            }

            $language = Languages::create([
                'name' => $request->input('name'),
                'icon' => $iconName ?? NULL,
                'status' => $request->input('status'),
            ]);

            DB::commit();
            flash('Dil müvəffəqiyyətlə əlavə olundu.', 'success');
            return redirect()->route('admin.languages.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            flash("Xəta baş verdi. Zəhmət olmasa yenidən cəhd edin", 'danger');
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $result = checkIdsAvailable($id);
        if(!$result)
        {
            flasher('Dil tapılmadı. Zəhmət olmasa yenidən cəhd edin.', 'success');
            return redirect()->back();
        }
        $decryptedUid = decrypt($id);
        $language = Languages::find($decryptedUid);
        return view('admin-dashboard.settings.languages.edit', compact('language'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {

            $result = checkIdsAvailable($id);
            if(!$result)
            {
                flasher('Dil tapılmadı. Zəhmət olmasa yenidən cəhd edin.', 'success');
                return redirect()->back();
            }
            $decryptedUid = decrypt($id);

            DB::beginTransaction();

            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'status' => 'required|string',
                'icon' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            ]);

            $language = Languages::findOrFail($decryptedUid);

            if ($request->hasFile('icon')) {
                $icon = $request->file('icon');
                $iconName = time() . '-' . $icon->getClientOriginalName();
                $destinationPath = public_path('dashboard/images/icons');
                $icon->move($destinationPath, $iconName);
                $language->icon = $iconName;
            }

            $language->name = $request->name;
            $language->status = $request->status;
            $language->save();

            DB::commit();

            flash('Dil məlumatları müvəffəqiyyətlə yeniləndi.', 'success');
            return redirect()->route('admin.features.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            flash("Xəta baş verdi. Zəhmət olmasa yenidən cəhd edin", 'danger');
            return redirect()->back();
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
