<?php

class Player
{
    protected string $name;
    protected int $score = 0;
    protected bool $alive = true;
    protected int $generatedNumber = 0;

    public function __construct(string $name)
    {
        $this->setName($name);
        $this->renewNumber();
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function incrementScore(int $incrementBy = 1): static
    {
        $incrementBy = $incrementBy >= 0 ? $incrementBy : 0;
        $newScore = $this->getScore() + $incrementBy;

        $this->setScore($newScore);

        return $this;
    }

    public function decrementScore(int $decrementBy = 1): static
    {
        $decrementBy = $decrementBy >= 0 ? $decrementBy : 0;
        $newScore = $this->getScore() - $decrementBy;

        $this->setScore($newScore);

        return $this;
    }

    protected function die(): void
    {
        $this->alive = false;

        echo PHP_EOL . 'GAME OVER!' . PHP_EOL;
    }

    public function setScore(int $score): static
    {
        $score = $score >= 0 ? $score : 0;

        $this->score = $score;

        $this->checkLive();

        return $this;
    }

    public function isAlive(): bool
    {
        return $this->alive;
    }

    protected function checkLive(): void
    {
        if ($this->alive <= 0) {
            $this->die();
        }
    }

    public function getScore(): int
    {
        return $this->score;
    }

    public static function className(): string
    {
        return static::class;
    }

    public function randomInt(): int
    {
        return rand(0, 1000) ;
    }

    public function renewNumber(): static
    {
        $this->generatedNumber = $this->randomInt();
        return $this;
    }

    public function getNumber(): int
    {
        return $this->generatedNumber;
    }
}
