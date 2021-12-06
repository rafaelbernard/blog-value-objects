<?php

namespace Test\Blog\Domain;

use Blog\Domain\ClassYear;
use Blog\Domain\CardRank;
use Test\TestCase;

class GradeTest extends TestCase
{
    const SEVENTH_GRADE = 7;
    const EIGHTH_GRADE = 8;
    const TWELFTH_GRADE = 12;
    const ALUMNI = 13;
    const INVALID_GRADE = 14;

    /**
     * @test
     */
    public function itCanBeCreatedFromANumber()
    {
        $grade = new CardRank(self::SEVENTH_GRADE);
        $this->assertInstanceOf(CardRank::class, $grade);
    }

    /**
     * @test
     */
    public function itCanNotBeCreatedFromAnInvalidNumber()
    {
        $this->expectException(\InvalidArgumentException::class);

        new CardRank(self::INVALID_GRADE);
    }

    /**
     * @test
     */
    public function itShouldReturnCorrectStudentGradeGivenStudentClassYearAndSeniorClassYear()
    {
        $student1ClassYear = new ClassYear(2020);
        $student2ClassYear = new ClassYear(2021);
        $student3ClassYear = new ClassYear(2022);
        $student4ClassYear = new ClassYear(2028);
        $student5ClassYear = new ClassYear(2019);
        $student6ClassYear = new ClassYear(2032);
        $seniorClassYear = new ClassYear(2020);

        $student1Grade = CardRank::gradeFromStudentClassYearAndSeniorClassYear($student1ClassYear, $seniorClassYear);
        $student2Grade = CardRank::gradeFromStudentClassYearAndSeniorClassYear($student2ClassYear, $seniorClassYear);
        $student3Grade = CardRank::gradeFromStudentClassYearAndSeniorClassYear($student3ClassYear, $seniorClassYear);
        $student4Grade = CardRank::gradeFromStudentClassYearAndSeniorClassYear($student4ClassYear, $seniorClassYear);
        $student5Grade = CardRank::gradeFromStudentClassYearAndSeniorClassYear($student5ClassYear, $seniorClassYear);
        $student6Grade = CardRank::gradeFromStudentClassYearAndSeniorClassYear($student6ClassYear, $seniorClassYear);

        $this->assertEquals(CardRank::TWELFTH_GRADE, $student1Grade->value());
        $this->assertEquals(CardRank::ELEVENTH_GRADE, $student2Grade->value());
        $this->assertEquals(CardRank::TENTH_GRADE, $student3Grade->value());
        $this->assertEquals(CardRank::FOURTH_GRADE, $student4Grade->value());
        $this->assertEquals(CardRank::ALUMNI, $student5Grade->value());
        $this->assertEquals(CardRank::KINDERGARTEN, $student6Grade->value());
    }
}
