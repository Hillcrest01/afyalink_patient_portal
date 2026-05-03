<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\getOdataTrait;
use Illuminate\Pagination\LengthAwarePaginator;


class GeneralController extends Controller
{
    use getOdataTrait;
    public function jobs()
    {
        $today = date('Y-m-d');
        $url = config('app.Odata') . 'QyHREmployeeRequisitions?' . '$' . "filter=" . rawurlencode("Advertised eq true and Closed eq false and Closing_Date ge $today");
        $items = collect($this->getOData($url)['value'] ?? []);
        $page = request()->input('page', 1);
        $perPage = 10;

        $vacancies = new LengthAwarePaginator(
            $items->forPage($page, $perPage),
            $items->count(),
            $perPage,
            $page,
            ['path' => request()->url()]
        );

        return view('welcome', compact('vacancies'));
    }
    public function dashboard(){
        $url = config('app.odataBaseUrl') . 'QyDoctors?' . '$' . "filter=" . rawurlencode("Status eq 'Active'");
        $doctors = $this->getOData($url)['value'];
        // dd($doctors);
        $data = [
            'doctors' => $doctors,
        ];
        return view('dashboard')->with($data);
    }
}
