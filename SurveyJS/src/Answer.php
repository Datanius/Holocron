<?php

class Answer implements SplSubject
{
    private $key;
    private $value;
    private $surveyIdentifier;
    private $time;

    private $observers;

    public function __construct(string $surveyIdentifer, string $key, $value, $time)
    {
        $this->surveyIdentifier = $surveyIdentifer;
        $this->key = $key;
        $this->value = $value;
        $this->time = $time;
        $this->observers = new SplObjectStorage();
    }

    public function attach(SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    public function detach(SplObserver $observer)
    {
        $this->observers->detach($observer);
    }

    public function getKey()
    {
        return $this->key;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function save()
    {
        if (is_array($this->value) == true) {
            $this->value = implode('#', $this->value);
        }

        $PDO = new PDO("sqlite:" . __DIR__ . "/../resources/sqlite.db");
        $query = "INSERT INTO answers (`survey_identifier`, `question_key`, `answer`, `time`)";
        $query .= " VALUES (:survey_identifier, :question_key, :answer, :time)";

        $statement = $PDO->prepare($query);
        $statement->bindValue(":survey_identifier", $this->surveyIdentifier);
        $statement->bindValue(":question_key", $this->key);
        $statement->bindValue(":answer", $this->value);
        $statement->bindValue(":time", date("Y-m-d H:i:s"));
        $statement->execute();
        $this->notify();
    }

    public function notify()
    {
        /** @var SplObserver $observer */
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}