<?php

namespace Modules\ShippingCompanies\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Modules\ShippingCompanies\Entities\ShippingCompany;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Modules\ShippingCompanies\Repositories\ShippingCompanyRepository;

class ShippingCompaniesController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;


    /**
     * @var \Modules\ShippingCompanies\Repositories\ShippingCompanyRepository
     */
    private $repository;

    /**
     * ShippingCompaniesController constructor.
     * @param ShippingCompanyRepository $repository
     */
    public function __construct(ShippingCompanyRepository $repository)
    {
        $this->authorizeResource(ShippingCompany::class, 'shipping_company');

        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $shipping_companies = $this->repository->all();

        return view('shipping_companies::shipping_companies.index', compact('shipping_companies'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('shippingcompanies::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('shippingcompanies::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('shippingcompanies::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
