<?php

namespace Maksa988\MonobankAcquiring\Models;

class WalletItem implements ModelInterface
{
    /**
     * @var string
     */
    protected $cardToken;

    /**
     * @var string
     */
    protected $maskedPan;

    /**
     * @var string|null
     */
    protected $country;

    /**
     * @param string      $cardToken
     * @param string      $maskedPan
     * @param string|null $country
     */
    public function __construct(
        string $cardToken,
        string $maskedPan,
        string $country = null
    ) {
        $this->cardToken = $cardToken;
        $this->maskedPan = $maskedPan;
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getCardToken(): string
    {
        return $this->cardToken;
    }

    /**
     * @return string
     */
    public function getMaskedPan(): string
    {
        return $this->maskedPan;
    }

    /**
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'cardToken' => $this->getCardToken(),
            'maskedPan' => $this->getMaskedPan(),
            'country' => $this->getCountry()
        ];
    }

    /**
     * @param array $data
     *
     * @return WalletItem
     */
    public static function fromArray(array $data): WalletItem
    {
        return new WalletItem(
            $data['cardToken'],
            $data['maskedPan'],
            $data['country'] ?? null
        );
    }
}
