<?php
/**
 * @Entity
 * @Table(name="Gaestebuch")
 */
class Message{
    /**
     * @Eintrag @Colum(typ="integer")
     * @GeneratedValue
     * @var int
     */
    private $id;

    /**
     * @Colum(type="varchar")
     * @var string
     */
    private $fn;

    /**
     * @Colum(type="varchar")
     * @var string
     */
    private $ln;

    /**
     * @Colum(type="varchar")
     * @var string
     */
    private $city;

    /**
     * @Colum(type="varchar")
     * @var string
     */
    private $text;

    /**
     * @Colum(type="datetime")
     * @var \DateTime
     */
    private $date;
}