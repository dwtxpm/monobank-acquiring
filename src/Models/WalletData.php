<?php

namespace Maksa988\MonobankAcquiring\Models;

class WalletData implements ModelInterface
{
    const STATUS_NEW = 'new';
    const STATUS_CREATED = 'created';
    const STATUS_FAILED = 'failed';

    /**
     * @var string
     */
    protected $walletId;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var string
     */
    protected $cardToken;

    public function __construct(
        string $walletId,
        string $status,
        ?string $cardToken = ''
    ) {
        $this->walletId = $walletId;
        $this->status = $status;
        $this->cardToken = $cardToken;
    }

    public function getWalletId(): string
    {
        return $this->walletId;

    }

    public function getStatus(): string
    {
        return $this->status;

    }

    public function getCardToken(): string
    {
        return $this->cardToken;
    }

    public function toArray(): array
    {
        return [
            'walletId' => $this->getWalletId(),
            'status' => $this->getStatus(),
            'cardToken' => $this->getCardToken(),
        ];
    }

    public static function fromArray($data): WalletData
    {
        return new self(
            $data['walletId'],
            $data['status'],
            $data['cardToken'] ?? ''
        );
    }
}
