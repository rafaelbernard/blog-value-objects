<?php

namespace Test\Blog\Domain;

use Blog\Domain\ClassYear;
use Blog\Domain\ClassGrade;
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
        $grade = new ClassGrade(self::SEVENTH_GRADE);
        $this->assertInstanceOf(ClassGrade::class, $grade);
    }

    /**
     * @test
     */
    public function itCanNotBeCreatedFromAnInvalidNumber()
    {
        $this->expectException(\InvalidArgumentException::class);

        new ClassGrade(self::INVALID_GRADE);
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

        $student1Grade = ClassGrade::gradeFromStudentClassYearAndSeniorClassYear($student1ClassYear, $seniorClassYear);
        $student2Grade = ClassGrade::gradeFromStudentClassYearAndSeniorClassYear($student2ClassYear, $seniorClassYear);
        $student3Grade = ClassGrade::gradeFromStudentClassYearAndSeniorClassYear($student3ClassYear, $seniorClassYear);
        $student4Grade = ClassGrade::gradeFromStudentClassYearAndSeniorClassYear($student4ClassYear, $seniorClassYear);
        $student5Grade = ClassGrade::gradeFromStudentClassYearAndSeniorClassYear($student5ClassYear, $seniorClassYear);
        $student6Grade = ClassGrade::gradeFromStudentClassYearAndSeniorClassYear($student6ClassYear, $seniorClassYear);

        $this->assertEquals(ClassGrade::TWELFTH_GRADE, $student1Grade->value());
        $this->assertEquals(ClassGrade::ELEVENTH_GRADE, $student2Grade->value());
        $this->assertEquals(ClassGrade::TENTH_GRADE, $student3Grade->value());
        $this->assertEquals(ClassGrade::FOURTH_GRADE, $student4Grade->value());
        $this->assertEquals(ClassGrade::ALUMNI, $student5Grade->value());
        $this->assertEquals(ClassGrade::KINDERGARTEN, $student6Grade->value());
    }
}
