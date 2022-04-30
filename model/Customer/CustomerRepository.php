<?php

namespace Model\Customer;

use Illuminate\Support\Facades\DB;

class CustomerRepository
{
    protected $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function get($customer_id, $contract_id)
    {
        DB::enableQueryLog();
        return $this->customer->with(['contract' => function ($query) use ($contract_id) {
            $query->fields();
            $query->where('contract_id', $contract_id)->first();
        }, 'contract.customer'])->find($customer_id);
        $query = DB::getQueryLog();
        dd($query);
    }
}
