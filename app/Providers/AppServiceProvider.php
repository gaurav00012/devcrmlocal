<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\MasterCompany;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //$this->sideBarMenu();        
    }

    // public function sideBarMenu(){
    //     $allCompanyData = array('' => 'Select Company');
    //     $allCompany = MasterCompany::All();
    //     foreach($allCompany as $companyKey => $companyData) $allCompanyData[$companyData->id] = $companyData->company_name;
       
    //     return View::share('companyData', $allCompanyData);
        
    // }

}
