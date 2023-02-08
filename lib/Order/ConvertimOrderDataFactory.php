<?php

namespace Convertim\Order;

class ConvertimOrderDataFactory
{
    /**
     * @param array $orderJsonArray
     */
    public function createConvertimOrderDataFromJsonArray($orderJsonArray)
    {
        $customerData = $this->createConvertimCustomerDataFromJsonArray($orderJsonArray['header']['customer']);
        $transportData = $this->createConvertimOrderTransportDataFromJsonArray($orderJsonArray['transport']);
        $paymentData = $this->createConvertimOrderPaymentDataFromJsonArray($orderJsonArray['payment']);

        $itemsData = array_map(
            function ($item) {
                return $this->createConvertimOrderItemDataFromJsonArray($item);
            },
            $orderJsonArray['items']
        );

        $cartExtraData = [];
        if (array_key_exists('cartExtraData', $orderJsonArray)) {
            $cartExtraData = $orderJsonArray['cartExtraData'];
        }

        $promoCodesData = array_map(
            function ($promoCode) {
                return $this->createConvertimOrderPromoCodeDataFromJsonArray($promoCode);
            },
            $orderJsonArray['promoCodes']
        );

        $goPayData = null;
        if (array_key_exists('gopay', $orderJsonArray) && $orderJsonArray['gopay'] !== null) {
            $goPayData = $this->createConvertimOrderGoPayDataFromJsonArray($orderJsonArray['gopay']);
        }

        $adyenData = null;
        if (array_key_exists('adyen', $orderJsonArray) && $orderJsonArray['adyen'] !== null) {
            $goPayData = $this->createConvertimOrderAdyenDataFromJsonArray($orderJsonArray['adyen']);
        }

        $paypalData = null;
        if (array_key_exists('paypal', $orderJsonArray) && $orderJsonArray['paypal'] !== null) {
            $paypalData = $this->createConvertimOrderPaypalDataFromJsonArray($orderJsonArray['paypal']);
        }

        $registerToNewsletter = false;
        if (array_key_exists('registerToNewsletter', $orderJsonArray['header']) && $orderJsonArray['header']['registerToNewsletter'] !== null) {
            $registerToNewsletter = $orderJsonArray['header']['registerToNewsletter'];
        }

        $registerToEshop = false;
        if (array_key_exists('registerToEshop', $orderJsonArray['header']) && $orderJsonArray['header']['registerToEshop'] !== null) {
            $registerToEshop = $orderJsonArray['header']['registerToEshop'];
        }

        $browserInfoData = [];
        if (array_key_exists('browserInfo', $orderJsonArray)) {
            $browserInfoData = $orderJsonArray['browserInfo'];
        }

        $paymentStatus = null;
        if (array_key_exists('paymentStatus', $orderJsonArray) && $orderJsonArray['paymentStatus'] !== null) {
            $paymentStatus = $this->createConvertimOrderPaymentStatusFromJsonArray($orderJsonArray['paymentStatus']);
        }

        return new ConvertimOrderData(
            $orderJsonArray['header']['uuid'],
            $orderJsonArray['header']['comment'],
            $orderJsonArray['header']['disallowHeurekaVerifiedByCustomers'],
            $customerData,
            $transportData,
            $paymentData,
            $itemsData,
            $promoCodesData,
            $goPayData,
            $adyenData,
            $registerToNewsletter,
            $registerToEshop,
            $cartExtraData,
            $paypalData,
            $browserInfoData,
            $paymentStatus
        );
    }

    /**
     * @param  array $customerJsonArray
     * @return \Convertim\Order\ConvertimCustomerData
     */
    public function createConvertimCustomerDataFromJsonArray(array $customerJsonArray)
    {
        $deliveryAddressData = $this->createConvertimCustomerDeliveryAddressDataFromJsonArray($customerJsonArray['deliveryAddress']);

        $billingAddressData = $this->createConvertimCustomerBillingAddressDataFromJsonArray($customerJsonArray['billingAddress']);

        return new ConvertimCustomerData(
            $customerJsonArray['deliveryAddress']['name'],
            $customerJsonArray['deliveryAddress']['lastName'],
            $customerJsonArray['email'],
            $customerJsonArray['telephonePrefix'],
            $customerJsonArray['telephoneNumber'],
            $deliveryAddressData,
            $billingAddressData,
            $customerJsonArray['eshopCustomerUuid']
        );
    }

    /**
     * @param  array|null $billingAddressJsonArray
     * @return \Convertim\Order\ConvertimCustomerBillingAddressData|null
     */
    public function createConvertimCustomerBillingAddressDataFromJsonArray($billingAddressJsonArray)
    {
        if ($billingAddressJsonArray === null) {
            return null;
        }

        return new ConvertimCustomerBillingAddressData(
            $billingAddressJsonArray['uuid'],
            $billingAddressJsonArray['name'],
            $billingAddressJsonArray['lastName'],
            $billingAddressJsonArray['street'],
            $billingAddressJsonArray['city'],
            $billingAddressJsonArray['postCode'],
            $billingAddressJsonArray['country'],
            $billingAddressJsonArray['companyName'],
            $billingAddressJsonArray['identificationNumber'],
            $billingAddressJsonArray['vatNumber']
        );
    }

    /**
     * @param  array $deliveryAddressJsonArray
     * @return \Convertim\Order\ConvertimCustomerDeliveryAddressData
     */
    public function createConvertimCustomerDeliveryAddressDataFromJsonArray($deliveryAddressJsonArray)
    {
        return new ConvertimCustomerDeliveryAddressData(
            $deliveryAddressJsonArray['uuid'],
            $deliveryAddressJsonArray['name'],
            $deliveryAddressJsonArray['lastName'],
            $deliveryAddressJsonArray['street'],
            $deliveryAddressJsonArray['city'],
            $deliveryAddressJsonArray['postCode'],
            $deliveryAddressJsonArray['country'],
            $deliveryAddressJsonArray['companyName'],
            $deliveryAddressJsonArray['carrierPhonePrefix'],
            $deliveryAddressJsonArray['carrierPhoneNumber']
        );
    }

    /**
     * @param  array $transportJsonArray
     * @return \Convertim\Order\ConvertimOrderTransportData
     */
    public function createConvertimOrderTransportDataFromJsonArray($transportJsonArray)
    {
        $extraData = null;
        if (array_key_exists('extra', $transportJsonArray) && $transportJsonArray['extra']) {
            $extraData = $this->createConvertimOrderTransportExtraDataFromJsonArray($transportJsonArray['extra']);
        }

        return new ConvertimOrderTransportData(
            $transportJsonArray['uuid'],
            $transportJsonArray['priceWithoutVat'],
            $transportJsonArray['priceWithVat'],
            $transportJsonArray['vatRate'],
            $transportJsonArray['source'],
            $transportJsonArray['type'],
            $extraData
        );
    }

    /**
     * @param  array $transportExtraJsonArray
     * @return \Convertim\Order\ConvertimOrderTransportExtraData|null
     */
    public function createConvertimOrderTransportExtraDataFromJsonArray($transportExtraJsonArray)
    {
        if (array_key_exists('selectedPickupPlace', $transportExtraJsonArray) === false) {
            return null;
        }

        $selectedPickupPlace = $transportExtraJsonArray['selectedPickupPlace'];

        return new ConvertimOrderTransportExtraData(
            $selectedPickupPlace['code'],
            $selectedPickupPlace['company'],
            $selectedPickupPlace['street'],
            $selectedPickupPlace['city'],
            $selectedPickupPlace['postcode'],
            $selectedPickupPlace['country']
        );
    }

    /**
     * @param  array $paymentJsonArray
     * @return \Convertim\Order\ConvertimOrderPaymentData
     */
    public function createConvertimOrderPaymentDataFromJsonArray($paymentJsonArray)
    {
        return new ConvertimOrderPaymentData(
            $paymentJsonArray['uuid'],
            $paymentJsonArray['type'],
            $paymentJsonArray['priceWithoutVat'],
            $paymentJsonArray['priceWithVat'],
            $paymentJsonArray['vatRate']
        );
    }

    /**
     * @param  array $orderItemJsonArray
     * @return \Convertim\Order\ConvertimOrderItemData
     */
    public function createConvertimOrderItemDataFromJsonArray($orderItemJsonArray)
    {
        return new ConvertimOrderItemData(
            '' . $orderItemJsonArray['productId'],
            $orderItemJsonArray['productName'],
            $orderItemJsonArray['quantity'],
            $orderItemJsonArray['priceWithoutVat'],
            $orderItemJsonArray['priceWithVat'],
            $orderItemJsonArray['vatRate'],
            $orderItemJsonArray['extra']
        );
    }

    /**
     * @param  array $promoCodeJsonArray
     * @return \Convertim\Order\ConvertimOrderPromoCodesData
     */
    public function createConvertimOrderPromoCodeDataFromJsonArray($promoCodeJsonArray)
    {
        return new ConvertimOrderPromoCodesData(
            $promoCodeJsonArray['uuid'],
            $promoCodeJsonArray['code']
        );
    }

    /**
     * @param  array $goPayJsonArray
     * @return \Convertim\Order\ConvertimOrderGoPayData
     */
    public function createConvertimOrderGoPayDataFromJsonArray($goPayJsonArray)
    {
        $eetFikData = null;
        if (array_key_exists('eet_code', $goPayJsonArray) && array_key_exists('fik', $goPayJsonArray['eet_code'])) {
            $eetFikData = $goPayJsonArray['eet_code']['fik'];
        }

        return new ConvertimOrderGoPayData(
            $goPayJsonArray['amount'],
            $goPayJsonArray['order_number'],
            $goPayJsonArray['currency'],
            $goPayJsonArray['id'],
            $goPayJsonArray['state'],
            $eetFikData
        );
    }

    /**
     * @param  array $adyenJsonArray
     * @return \Convertim\Order\ConvertimOrderAdyenData
     */
    public function createConvertimOrderAdyenDataFromJsonArray($adyenJsonArray)
    {
        return new ConvertimOrderAdyenData(
            $adyenJsonArray['id']
        );
    }

    /**
     * @param  array $paypalJsonArray
     * @return \Convertim\Order\ConvertimOrderPaypalData
     */
    public function createConvertimOrderPaypalDataFromJsonArray($paypalJsonArray)
    {
        return new ConvertimOrderPaypalData(
            $paypalJsonArray['id'],
            $paypalJsonArray['state'],
            $paypalJsonArray['cart']
        );
    }

    /**
     * @param  array $transportServiceJsonArray
     * @return \Convertim\Order\ConvertimOrderTransportServiceData
     */
    public function createConvertimOrderTransportServiceDataFromJsonArray($transportServiceJsonArray)
    {
        return new ConvertimOrderTransportServiceData();
    }

    /**
     * @param array $paymentStatusJsonArray
     * @return \Convertim\Order\ConvertimOrderDataPaymentStatus
     */
    private function createConvertimOrderPaymentStatusFromJsonArray($paymentStatusJsonArray)
    {
        return new ConvertimOrderDataPaymentStatus(
            $paymentStatusJsonArray['paymentProvider'],
            $paymentStatusJsonArray['paymentProviderId'],
            $paymentStatusJsonArray['status'],
            $paymentStatusJsonArray['isPaid']
        );
    }
}
