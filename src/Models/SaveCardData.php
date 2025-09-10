<?php

namespace Maksa988\MonobankAcquiring\Models;

class SaveCardData implements ModelInterface {

    /**
     * @var bool
     */
    protected $saveCard;

    /**
     * @var string
     */
    protected $walletId;

    public function __construct(
        bool $saveCard,
        string $walletId
    ) {
        $this->saveCard = $saveCard;
        $this->walletId = $walletId;
    }

    public function getSaveCard(): bool
    {
        return $this->saveCard;
    }

    public function getWalletId(): string
    {
        return $this->walletId;
    }

    public function toArray(): array
    {
        return [
            'saveCard' => $this->getSaveCard() ?: null,
            'walletId' => $this->getWalletId() ?: '',
        ];
    }

    public static function fromArray(array $data): ModelInterface
    {
        return new self(
            $data['saveCard'] ?? false,
            $data['walletId'] ?? '',
        );
    }
}