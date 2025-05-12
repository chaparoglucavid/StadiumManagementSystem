<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Features;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeaturesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $features = Features::all();
        return view('admin-dashboard.settings.features.index', compact('features'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-dashboard.settings.features.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $validated = $request->validate([
                'name' => 'required|array',
                'description' => 'nullable|array',
                'status' => 'required|string',
                'icon' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            ]);

            if ($request->hasFile('icon')) {
                $icon = $request->file('icon');
                $iconName = time() . '-' . $icon->getClientOriginalName();
                $destinationPath = public_path('dashboard/images/icons');
                $icon->move($destinationPath, $iconName);
            }

            $feature = Features::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'icon' => $iconName ?? NULL,
                'status' => $request->input('status'),
            ]);

            DB::commit();
            flash('Özəllik müvəffəqiyyətlə əlavə olundu.', 'success');
            return redirect()->route('admin.features.index');
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
            flasher('Meydança özəlliyi tapılmadı. Zəhmət olmasa yenidən cəhd edin.', 'success');
            return redirect()->back();
        }
        $decryptedUid = decrypt($id);
        $feature = Features::find($decryptedUid);
        return view('admin-dashboard.settings.features.edit', compact('feature'));
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
                flasher('Meydança özəlliyi tapılmadı. Zəhmət olmasa yenidən cəhd edin.', 'success');
                return redirect()->back();
            }
            $decryptedUid = decrypt($id);

            DB::beginTransaction();

            $validated = $request->validate([
                'name' => 'required|array',
                'description' => 'nullable',
                'status' => 'required|string',
                'icon' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            ]);

            $feature = Features::findOrFail($decryptedUid);

            if ($request->hasFile('icon')) {
                $icon = $request->file('icon');
                $iconName = time() . '-' . $icon->getClientOriginalName();
                $destinationPath = public_path('dashboard/images/icons');
                $icon->move($destinationPath, $iconName);
                $feature->icon = $iconName;
            }

            $feature->name = $request->input('name');
            $feature->description = $request->input('description');
            $feature->status = $request->input('status');
            $feature->save();

            DB::commit();

            flash('Özəllik müvəffəqiyyətlə yeniləndi.', 'success');
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
