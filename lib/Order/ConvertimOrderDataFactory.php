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
            $adyenData
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
            $billingAddressJsonArray['name'],
            $billingAddressJsonArray['lastName'],
            $billingAddressJsonArray['address'],
            $billingAddressJsonArray['city'],
            $billingAddressJsonArray['postalCode'],
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
            $deliveryAddressJsonArray['name'],
            $deliveryAddressJsonArray['lastName'],
            $deliveryAddressJsonArray['address'],
            $deliveryAddressJsonArray['city'],
            $deliveryAddressJsonArray['postalCode'],
            $deliveryAddressJsonArray['state'],
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
            $orderItemJsonArray['vatRate']
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
        if (array_key_exists('eet_code', $goPayJsonArray)) {
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
     * @param  array $transportServiceJsonArray
     * @return \Convertim\Order\ConvertimOrderTransportServiceData
     */
    public function createConvertimOrderTransportServiceDataFromJsonArray($transportServiceJsonArray)
    {
        return new ConvertimOrderTransportServiceData();
    }
}
