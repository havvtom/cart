<?php

namespace App\Cart;

use Money\Money as BaseMoney;
use Money\Currency;
use Money\Formatter\IntlMoneyFormatter;
use Money\Currencies\ISOCurrencies;
use NumberFormatter;

class Money {

	protected $money;

	public function __construct($value)
	{
		$this->money = new BaseMoney($value, new Currency('ZAR'));
	}

	public function amount()
	{
		return $this->money->getAmount();
	}

	public function formatted()
	{
		$formatter = new IntlMoneyFormatter(
            new NumberFormatter('en_ZA', NumberFormatter::CURRENCY),
            new ISOCurrencies()
        );

        return $formatter->format($this->money);
	} 
}