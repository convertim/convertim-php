<?php

namespace Convertim;

interface ConvertimBackendInterface
{
    const CONVERTIM_AUTHORIZATION_HEADER = 'Convertim-Authorization';

    public function ping();

    public function getLoginDetail();

    public function getCustomerDetail();

    public function getLastOrderDetail();

    public function getCustomerDetailByOrder();

    public function checkOrder();

    public function saveOrder();
}
