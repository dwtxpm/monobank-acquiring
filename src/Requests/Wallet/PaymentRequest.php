<?php

namespace Maksa988\MonobankAcquiring\Requests\Wallet;

use Maksa988\MonobankAcquiring\Requests\RequestInterface;
use Maksa988\MonobankAcquiring\Responses\Wallet\PaymentResponse;

class PaymentRequest implements RequestInterface
{

    const INITIATION_KIND_MERCHANT = 'merchant';
    const INITIATION_KIND_CLIENT = 'client';

    /**
     * @var string
     */
    public $cardToken;

    /**
     * @var int
     */
    public $amount;

    /**
     * @var int
     */
    public $ccy;

    /**
     * @var string
     */
    public $initiationKind;

    /**
     * @var string
     */
    public $redirectUrl;

    /**
     * @var string|null
     */
    public $webHookUrl;

    /**
     * @param string      $cardToken
     * @param int         $amount
     * @param string      $redirectUrl
     * @param int         $ccy
     * @param string      $initiationKind
     * @param string|null $webHookUrl
     */
    public function __construct(
        string $cardToken,
        int $amount,
        string $redirectUrl,
        int $ccy = 980,
        string $initiationKind = self::INITIATION_KIND_MERCHANT,
        string $webHookUrl = null
    ) {
        $this->cardToken = $cardToken;
        $this->amount = $amount;
        $this->redirectUrl = $redirectUrl;
        $this->ccy = $ccy;
        $this->initiationKind = $initiationKind;
        $this->webHookUrl = $webHookUrl;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            "cardToken" => $this->cardToken,
            "amount" => $this->amount,
            "ccy" => $this->ccy,
            "initiationKind" => $this->initiationKind,
            "redirectUrl" => $this->redirectUrl,
            "webHookUrl" => $this->webHookUrl,
        ];
    }

    /**
     * @return string
     */
    public function url(): string
    {
        return "/api/merchant/wallet/payment";
    }

    /**
     * @return string
     */
    public function httpMethod(): string
    {
        return "POST";
    }

    /**
     * @return PaymentResponse
     */
    public function response(): PaymentResponse
    {
        return new PaymentResponse();
    }
}
