<?php

class Transport
{
    private $id;
    private $namePlaceStart;
    private $namePlaceEnd;
    private $nameDriver;
    private $numberPhoneDriver;
    private $nameTruck;
    private $licensePlateTruck;
    private $timeStart;

    /**
     * @param $id
     * @param $namePlaceStart
     * @param $namePlaceEnd
     * @param $nameDriver
     * @param $numberPhoneDriver
     * @param $nameTruck
     * @param $licensePlateTruck
     */
    public function __construct($id, $namePlaceStart, $namePlaceEnd, $nameDriver, $numberPhoneDriver, $nameTruck, $licensePlateTruck, $timeStart)
    {
        $this->id = $id;
        $this->namePlaceStart = $namePlaceStart;
        $this->namePlaceEnd = $namePlaceEnd;
        $this->nameDriver = $nameDriver;
        $this->numberPhoneDriver = $numberPhoneDriver;
        $this->nameTruck = $nameTruck;
        $this->licensePlateTruck = $licensePlateTruck;
        $this->timeStart = $timeStart;
    }

    /**
     * @return mixed
     */
    public function getTimeStart()
    {
        return $this->timeStart;
    }

    /**
     * @param mixed $timeStart
     */
    public function setTimeStart($timeStart)
    {
        $this->timeStart = $timeStart;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNamePlaceStart()
    {
        return $this->namePlaceStart;
    }

    /**
     * @param mixed $namePlaceStart
     */
    public function setNamePlaceStart($namePlaceStart)
    {
        $this->namePlaceStart = $namePlaceStart;
    }

    /**
     * @return mixed
     */
    public function getNamePlaceEnd()
    {
        return $this->namePlaceEnd;
    }

    /**
     * @param mixed $namePlaceEnd
     */
    public function setNamePlaceEnd($namePlaceEnd)
    {
        $this->namePlaceEnd = $namePlaceEnd;
    }

    /**
     * @return mixed
     */
    public function getNameDriver()
    {
        return $this->nameDriver;
    }

    /**
     * @param mixed $nameDriver
     */
    public function setNameDriver($nameDriver)
    {
        $this->nameDriver = $nameDriver;
    }

    /**
     * @return mixed
     */
    public function getNumberPhoneDriver()
    {
        return $this->numberPhoneDriver;
    }

    /**
     * @param mixed $numberPhoneDriver
     */
    public function setNumberPhoneDriver($numberPhoneDriver)
    {
        $this->numberPhoneDriver = $numberPhoneDriver;
    }

    /**
     * @return mixed
     */
    public function getNameTruck()
    {
        return $this->nameTruck;
    }

    /**
     * @param mixed $nameTruck
     */
    public function setNameTruck($nameTruck)
    {
        $this->nameTruck = $nameTruck;
    }

    /**
     * @return mixed
     */
    public function getLicensePlateTruck()
    {
        return $this->licensePlateTruck;
    }

    /**
     * @param mixed $licensePlateTruck
     */
    public function setLicensePlateTruck($licensePlateTruck)
    {
        $this->licensePlateTruck = $licensePlateTruck;
    }
}