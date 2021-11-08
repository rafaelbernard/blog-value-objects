<?php

namespace Test\Blog\Domain;

use Blog\Domain\ClassYear;
use Blog\Domain\Grade;
use Test\TestCase;

class GradeTest extends TestCase
{
    const EARLY_MONTH = 1;
    const LATE_MONTH = 9;
    const CUSTOM_ROLLOVER_MONTH = 10;
    const ROLL_OVER_DAY = 31;

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
        $grade = new Grade(self::SEVENTH_GRADE);
        $this->assertInstanceOf(Grade::class, $grade);
    }

    /**
     * @test
     */
    public function itCanNotBeCreatedFromAnInvalidNumber()
    {
        $this->expectException(\InvalidArgumentException::class);

        new Grade(self::INVALID_GRADE);
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

        $student1Grade = Grade::gradeFromStudentClassYearAndSeniorClassYear($student1ClassYear, $seniorClassYear);
        $student2Grade = Grade::gradeFromStudentClassYearAndSeniorClassYear($student2ClassYear, $seniorClassYear);
        $student3Grade = Grade::gradeFromStudentClassYearAndSeniorClassYear($student3ClassYear, $seniorClassYear);
        $student4Grade = Grade::gradeFromStudentClassYearAndSeniorClassYear($student4ClassYear, $seniorClassYear);
        $student5Grade = Grade::gradeFromStudentClassYearAndSeniorClassYear($student5ClassYear, $seniorClassYear);
        $student6Grade = Grade::gradeFromStudentClassYearAndSeniorClassYear($student6ClassYear, $seniorClassYear);

        $this->assertEquals($student1Grade->value(), Grade::TWELFTH_GRADE);
        $this->assertEquals($student2Grade->value(), Grade::ELEVENTH_GRADE);
        $this->assertEquals($student3Grade->value(), Grade::TENTH_GRADE);
        $this->assertEquals($student4Grade->value(), Grade::FOURTH_GRADE);
        $this->assertEquals($student5Grade->value(), Grade::ALUMNI);
        $this->assertEquals($student6Grade->value(), Grade::KINDERGARTEN);
    }
}
