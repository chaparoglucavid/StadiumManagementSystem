<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CitiesController extends Controller
{
    public function index()
    {
        $cities = Cities::all();
        return view('admin-dashboard.settings.cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-dashboard.settings.cities.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $validated = $request->validate([
                'city_name' => 'required|array',
                'status' => 'required|string',
            ]);

            $city = Cities::create([
                'city_name' => $request->input('city_name'),
                'status' => $request->input('status'),
            ]);

            DB::commit();
            flash('Şəhər müvəffəqiyyətlə əlavə olundu.', 'success');
            return redirect()->route('admin.cities.index');
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
            flasher('Şəhər tapılmadı. Zəhmət olmasa yenidən cəhd edin.', 'success');
            return redirect()->back();
        }
        $decryptedUid = decrypt($id);
        $city = Cities::find($decryptedUid);
        return view('admin-dashboard.settings.cities.edit', compact('city'));
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
                flasher('Şəhər tapılmadı. Zəhmət olmasa yenidən cəhd edin.', 'success');
                return redirect()->back();
            }
            $decryptedUid = decrypt($id);

            DB::beginTransaction();

            $validated = $request->validate([
                'city_name' => 'required|array',
                'status' => 'required|string',
            ]);

            $city = Cities::findOrFail($decryptedUid);
            $city->city_name = $request->input('city_name');
            $city->status = $request->input('status');
            $city->save();

            DB::commit();

            flash('Şəhər müvəffəqiyyətlə yeniləndi.', 'success');
            return redirect()->route('admin.cities.index');
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
