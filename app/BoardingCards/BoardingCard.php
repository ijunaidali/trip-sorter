<?php

namespace TripSorter\BoardingCards;

/**
 * Class BoardingCard
 * @package TripSorter\BoardingCards
 */
abstract class BoardingCard implements BoardingCardInterface
{
    /**
     * @var
     */
    protected $source;

    /**
     * @var
     */
    protected $destination;

    /**
     * @var
     */
    protected $seatNumber;

    /**
     * BoardingCard constructor.
     * @param $source
     * @param $destination
     * @param $seatNumber
     */
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

    /**
     * @return mixed
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @return mixed
     */
    public function getDestination()
    {
        return $this->destination;
    }
}