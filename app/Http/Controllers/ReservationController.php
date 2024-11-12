<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Customer;
use App\Models\Governorate;
use App\Models\RentPlan;
use App\Models\Reservation;
use App\Models\ServiceRequest;
use App\Models\User;
use App\Models\RentItem;
use App\Models\RentType;
use App\TermConstants;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Calculation\DateTimeExcel\Month;

class ReservationController extends Controller
{
    public function index()
    {
        $reservationsQuery = Reservation::query();
        $data['route'] = 'reservations';
        $data['page'] = 'الحجوزات';
        $data['branches'] = Branch::with('rent_items')->get();

        if (isset(request()->text)) {
            $reservationsQuery->where('customer_name', 'like', '%' . request()->text . '%');
        }
        if (isset(request()->from)) {
            $reservationsQuery->where('start_date', '>=', Carbon::parse(request()->from));
        }
        if (isset(request()->to)) {
            $reservationsQuery->where('end_date', '<=', Carbon::parse(request()->to));
        }

        if (isset(request()->branch_id)) {
            $reservationsQuery->leftJoin('rent_items', 'reservations.rent_item_id', '=', 'rent_items.branch_id')
                ->where('branch_id', '=', request()->branch_id);
        }
        if (isset(request()->rent_item_id)) {
            $reservationsQuery->where('rent_item_id', '=', request()->rent_item_id);
        }

        $data['reservations'] = $reservationsQuery->get();
        return view('reservations.index', $data);
    }

    public function create()
    {
        $data['route'] = 'reservations/create';
        $data['page'] = 'اضافة حجز';
        $data['branches'] = Branch::with('rent_items')->get();
        $data['customers'] = Customer::all();
        $data['rent_plans'] = RentPlan::all();

        return view('reservations.create', $data);
    }

    public function store(Request $request)
    {
        $valid = $this->validate($request, [
            'customer_id' => 'required',
            'branch_id' => 'required',
            'rent_item_id' => 'required',
            'start_date' => 'required',
            'rent_plan_id' => 'required',
            'repeat_count' => 'required|min:1',
            'cost' => 'required',
            'description' => '|max:500',
        ]);

        $rentPlan = RentPlan::find($request->rent_plan_id);

        $rentStartDate = Carbon::createFromIsoFormat("YYYY-MM-DDTHH:mm:ss", $request->start_date . ':00');


        if ($rentPlan->unit == TermConstants::HOUR) {
            $rentStartDate->addHours($rentPlan->count * $request->repeat_count);

        } elseif ($rentPlan->unit == TermConstants::DAY) {
            $rentStartDate->addDays($rentPlan->count * $request->repeat_count);

        } elseif ($rentPlan->unit == TermConstants::WEEK) {
            $rentStartDate->addWeeks($rentPlan->count * $request->repeat_count);

        } elseif ($rentPlan->unit == TermConstants::MONTH) {
            $rentStartDate->addMonths($rentPlan->count * $request->repeat_count);
        } elseif ($rentPlan->unit == TermConstants::YEAR) {
            $rentStartDate->addYears($rentPlan->count * $request->repeat_count);
        }

        $valid['end_date'] = $rentStartDate->toDateTimeLocalString();
//        $valid['cost'] = $rentPlan->price * $request->repeat_count;
        Reservation::create($valid);
        return redirect()->route('reservations.index')->with(['success' => 'تم الاضافة بنجاح']);
    }

    public function edit(Reservation $reservation)
    {
        $data['route'] = 'reservations/' . $reservation->id . '/';
        $data['page'] = 'تعديل حجز';
        $data['reservation'] = $reservation;
        $data['branches'] = Branch::with('rent_items')->get();
        $data['rent_types'] = RentType::get();
        $data['customers'] = Customer::all();
        $data['rent_plans'] = RentPlan::all();

        return view('reservations.edit', $data);
    }

    public function update(Request $request, Reservation $reservation)
    {
        $valid = $this->validate($request, [
            'customer_id' => 'required',
            'branch_id' => 'required',
            'rent_item_id' => 'required',
            'start_date' => 'required',
            'rent_plan_id' => 'required',
            'repeat_count' => 'required|min:1',
            'cost' => 'required',
            'description' => '|max:500',
        ]);

        $rentPlan = RentPlan::find($request->rent_plan_id);

        $rentStartDate = Carbon::createFromIsoFormat("YYYY-MM-DDTHH:mm:ss", $request->start_date . ':00');


        if ($rentPlan->unit == TermConstants::HOUR) {
            $rentStartDate->addHours($rentPlan->count * $request->repeat_count);

        } elseif ($rentPlan->unit == TermConstants::DAY) {
            $rentStartDate->addDays($rentPlan->count * $request->repeat_count);

        } elseif ($rentPlan->unit == TermConstants::WEEK) {
            $rentStartDate->addWeeks($rentPlan->count * $request->repeat_count);

        } elseif ($rentPlan->unit == TermConstants::MONTH) {
            $rentStartDate->addMonths($rentPlan->count * $request->repeat_count);
        } elseif ($rentPlan->unit == TermConstants::YEAR) {
            $rentStartDate->addYears($rentPlan->count * $request->repeat_count);
        }

        $valid['end_date'] = $rentStartDate->toDateTimeLocalString();
        $valid['cost'] = $rentPlan->price * $request->repeat_count;
        $reservation->update($valid);

        return redirect()->route('reservations.index')->with(['success' => 'تم التعديل بنجاح']);
    }

    public function destroy(Request $request)
    {
        Reservation::findOrFail($request->id)->delete();
        return redirect()->route('reservations.index')->with(['success' => 'تم الحذف بنجاح']);
    }
}
