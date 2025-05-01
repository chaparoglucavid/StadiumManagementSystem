<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PlaygroundSurfaceTypes;
use App\Models\SportTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlaygroundSurfaceTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $surfaceTypes = PlaygroundSurfaceTypes::with('sport_types')->get();
        return view('admin-dashboard.settings.playground-surface-types.index', compact('surfaceTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sportTypes = SportTypes::IsActive()->get();
        return view('admin-dashboard.settings.playground-surface-types.create', compact('sportTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $validated = $request->validate([
                'sport_types_uid' => 'required|string|max:255',
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'status' => 'required|string',
            ]);

            $feature = PlaygroundSurfaceTypes::create([
                'sport_types_uid' => $request->sport_types_uid,
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status,
            ]);

            DB::commit();
            flash('Örtük tipi müvəffəqiyyətlə əlavə olundu.', 'success');
            return redirect()->route('admin.playground-surface-types.index');
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
            flasher('Örtük tipi tapılmadı. Zəhmət olmasa yenidən cəhd edin.', 'success');
            return redirect()->back();
        }
        $decryptedUid = decrypt($id);
        $sportTypes = SportTypes::IsActive()->get();
        $surfaceType = PlaygroundSurfaceTypes::find($decryptedUid);
        return view('admin-dashboard.settings.playground-surface-types.edit', compact('surfaceType', 'sportTypes'));
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
                flasher('Örtük tipi tapılmadı. Zəhmət olmasa yenidən cəhd edin.', 'success');
                return redirect()->back();
            }
            $decryptedUid = decrypt($id);

            DB::beginTransaction();

            $validated = $request->validate([
                'sport_types_uid' => 'required|string|max:255',
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'status' => 'required|string',
            ]);

            $surfaceType = PlaygroundSurfaceTypes::findOrFail($decryptedUid);

            $surfaceType->sport_types_uid = $request->sport_types_uid;
            $surfaceType->name = $request->name;
            $surfaceType->description = $request->description;
            $surfaceType->status = $request->status;
            $surfaceType->save();

            DB::commit();

            flash('Örtük tipi müvəffəqiyyətlə yeniləndi.', 'success');
            return redirect()->route('admin.playground-surface-types.index');
        } catch (\Exception $exception) {
            dd($exception);
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
