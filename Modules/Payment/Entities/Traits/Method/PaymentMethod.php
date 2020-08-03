<?php

namespace Modules\Payment\Entities\Traits\Method;

trait PaymentMethod
{
    /**
     * @return array
     */
    public static function statuses()
    {
        return [
            self::STATUS_PENDING => _t('pending'),
            self::STATUS_PAID    => _t('paid'),
        ];
    }

    public function genInvoiceNumber()
    {
        $prefix = 'INV';
        $id = $this->id;

        if ($id < 10) return "{$prefix}000000{$id}";
        if ($id < 100) return "{$prefix}00000{$id}";
        if ($id < 1000) return "{$prefix}0000{$id}";
        if ($id < 10000) return "{$prefix}000{$id}";
        if ($id < 100000) return "{$prefix}00{$id}";
        if ($id < 1000000) return "{$prefix}0{$id}";

        return "{$prefix}{$id}";
    }
}
