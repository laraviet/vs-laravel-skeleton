<?php

namespace Modules\Order\Entities\Traits\Methods;

trait OrderMethod
{
    public function genOrderNumber()
    {
        $prefix = 'OD';
        $id = $this->id;

        if ($id < 10) return "{$prefix}000000{$id}";
        if ($id < 100) return "{$prefix}00000{$id}";
        if ($id < 1000) return "{$prefix}0000{$id}";
        if ($id < 10000) return "{$prefix}000{$id}";
        if ($id < 100000) return "{$prefix}00{$id}";
        if ($id < 1000000) return "{$prefix}0{$id}";

        return "{$prefix}{$id}";
    }

    public static function statuses()
    {
        return [
            self::STATUS_PENDING    => _t('pending'),
            self::STATUS_PROCESSING => _t('processing'),
            self::STATUS_SUBMITTED  => _t('submitted'),
            self::STATUS_CANCELED   => _t('canceled'),
            self::STATUS_COMPLETED  => _t('completed'),
        ];
    }
}
