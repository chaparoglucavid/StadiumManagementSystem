<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cities;
use App\Models\Regions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegionsController extends Controller
{
    public function index()
    {
        $regions = Regions::with('cities')->get();
        return view('admin-dashboard.settings.regions.index', compact('regions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = Cities::IsActive()->get();
        return view('admin-dashboard.settings.regions.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $validated = $request->validate([
                'cities_uid' => 'required|string',
                'region_name' => 'required|array',
                'status' => 'required|string',
            ]);

            $region = Regions::create([
                'cities_uid' => $request->input('cities_uid'),
                'region_name' => $request->input('region_name'),
                'status' => $request->input('status'),
            ]);

            DB::commit();
            flash('Rayon müvəffəqiyyətlə əlavə olundu.', 'success');
            return redirect()->route('admin.regions.index');
        } catch (\Exception $exception) {
            dd($exception);
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
            flasher('Rayon tapılmadı. Zəhmət olmasa yenidən cəhd edin.', 'success');
            return redirect()->back();
        }
        $decryptedUid = decrypt($id);
        $region = Regions::find($decryptedUid);
        $cities = Cities::IsActive()->get();
        return view('admin-dashboard.settings.regions.edit', compact('region', 'cities'));
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
                flasher('Rayon tapılmadı. Zəhmət olmasa yenidən cəhd edin.', 'success');
                return redirect()->back();
            }
            $decryptedUid = decrypt($id);

            DB::beginTransaction();

            $validated = $request->validate([
                'cities_uid' => 'required|string',
                'region_name' => 'required|array',
                'status' => 'required|string',
            ]);

            $region = Regions::findOrFail($decryptedUid);
            $region->cities_uid = $request->input('cities_uid');
            $region->region_name = $request->input('region_name');
            $region->status = $request->input('status');
            $region->save();

            DB::commit();

            flash('Rayon müvəffəqiyyətlə yeniləndi.', 'success');
            return redirect()->route('admin.regions.index');
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
