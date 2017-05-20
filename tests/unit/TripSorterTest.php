<?php

namespace TripSorterTest\Unit;

use PHPUnit\Framework\TestCase;
use TripSorter\BoardingCards\AirplaneBoardingCard;
use TripSorter\BoardingCards\BusBoardingCard;
use TripSorter\BoardingCards\TrainBoardingCard;
use TripSorter\Destinations\Destination;
use TripSorter\TripSorter;

class TripSorterTest extends TestCase
{
    /**
     * @test
     */
    public function itShouldSortGivenBoardingCards()
    {
        $expected = [
            'Take train 78A from Madrid to Barcelona. Sit in seat 45B.',
            'Take the airport bus from Barcelona to Gerona Airport. No seat assignment.',
            'From Gerona Airport, take flight SK455 to Stockholm. Gate 45B, seat 3A. Baggage drop at ticket counter 344.',
            'From Stockholm, take flight SK22 to New York JFK. Gate 22, seat 7B. Baggage will be automatically transferred from your last leg.',
            'You have arrived at your final destination.'
        ];

        $airplaneCard1 = new AirplaneBoardingCard(
            'SK22',
            '22',
            '7B',
            'Baggage will we automatically transferred from your last leg',
            new Destination('Stockholm'),
            new Destination('New York JFK')
        );

        $airplaneCard2 = new AirplaneBoardingCard(
            'SK455',
            '45B',
            '3A',
            'Baggage drop at ticket counter 344',
            new Destination('Gerona Airport'),
            new Destination('Stockholm')
        );

        $busCard = new BusBoardingCard(
            null,
            new Destination('Barcelona'),
            new Destination('Gerona')
        );

        $trainCard = new TrainBoardingCard(
            '78A',
            '45B',
            new Destination('Madrid'),
            new Destination('Barcelona')
        );

        $tripSorter = new TripSorter();
        $tripSorter->addBoardingCard($airplaneCard1);
        $tripSorter->addBoardingCard($airplaneCard2);
        $tripSorter->addBoardingCard($busCard);
        $tripSorter->addBoardingCard($trainCard);

        $tripSorter->sortBoardingCards();

        $sorted = $tripSorter->getSortedBoardingCards();

        $this->assertEquals($expected, $sorted);
    }
}