<?php
/**
 * @Entity
 * @Table(name="Gaestebuch")
 */
class NewEntry{
    /**
     * @Id @Column(type="integer" name="Eintrag") @GeneratedValue 
     * @var integer
     */
    private $id;

    /**
    * @Column(type="string" length="50" name="Vorname")
    * @var string
    */
    private $firstName;

    /**
    * @Column(type="string" length="50" name="Nachname")
    * @var string
    */
    private $lastName;

    /**
    * @Column(type="string" length="50" name="Stadt")
    * @var string
    */
    private $city;

    /**
    * @Column(type="string" length="255" name="Inhalt")
    * @var string
    */
    private $content;

    /**
     * @Column(type="Datum)
     * @var \DateTime
     */
    private $date;

    public function __construct(string $firstName, string $lastName, string $city, string $content){
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->city = $city;
        $this->content = $content;
    }

    //Id
    public function getId(){
        return $this->Id;
    }

    //Firstname
    public function getFirstname(){
        return $this->firstName;
    }

    //Lastname
    public function getLastname(){
        return $this->lastName;
    }
    
    //City
    public function getCity(){
        return $this->city;
    }

    //Content
    public function getContent(){
        return $this->content;
    }

    //Datum
    public function getDatum(){
        return $this->date;
    }
}