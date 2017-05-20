<?php

namespace TripSorter\BoardingCards;

abstract class BoardingCard implements BoardingCardInterface
{
    protected $source;

    protected $destination;

    protected $seatNumber;

    public function __construct(
        $source,
        $destination,
        $seatNumber
    )
    {
        $this->source = $source;
        $this->destination = $destination;
        $this->seatNumber = $seatNumber;
    }
}