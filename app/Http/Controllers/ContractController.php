<?php

namespace App\Http\Controllers;

use Model\Customer\CustomerRepository;

class ContractController extends Controller
{
    public function __construct()
    {
        $this->current_date = date('d/m/y');
    }

    public function index($customer_id, $contract_id, CustomerRepository $customerRepository)
    {
        $current_date = $this->current_date;

        $customer = $customerRepository->get($customer_id,$contract_id);
        return view('contract.show', compact('customer', 'current_date'));
    }
}
