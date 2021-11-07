<?php

namespace Blog\Domain;

final class Grade
{
    const ALUMNI = 13;
    const TWELFTH_GRADE = 12;
    const ELEVENTH_GRADE = 11;
    const TENTH_GRADE = 10;
    const NINTH_GRADE = 9;
    const EIGHTH_GRADE = 8;
    const SEVENTH_GRADE = 7;
    const SIXTH_GRADE = 6;
    const FIFTH_GRADE = 5;
    const FOURTH_GRADE = 4;
    const THIRD_GRADE = 3;
    const SECOND_GRADE = 2;
    const FIRST_GRADE = 1;
    const KINDERGARTEN = 0;

    /* @var int $value */
    private $value;

    /**
     * @param int|string $value
     */
    public function __construct($value)
    {
        if (
            filter_var(
                $value,
                FILTER_VALIDATE_INT,
                ["options" => ["min_range" => self::KINDERGARTEN, "max_range" => self::ALUMNI]]
            ) !== false
        ) {
            throw new \OutOfRangeException('Grade must be an integer between 0 (Kindergarten) and 13 (Alumni)');
        }

        $this->value = $value;
    }

    /**
     * @param ClassYear $studentClassYear
     * @param ClassYear $seniorClassYear
     *
     * @return Grade
     */
    public static function gradeFromStudentClassYearAndSeniorClassYear(Classyear $studentClassYear, ClassYear $seniorClassYear)
    {
        $value = $seniorClassYear->value() - $studentClassYear->value() + 12;
        if ($value > self::TWELFTH_GRADE) {
            $value = self::ALUMNI;
        } elseif ($value < 1) {
            $value = self::KINDERGARTEN;
        }
        return new static($value);
    }

    public function value(): int
    {
        return $this->value;
    }

    public function equals(self $otherGrade): bool
    {
        return $this->value() == $otherGrade->value();
    }

    public function __toString(): string
    {
        return (string) $this->value;
    }
}
