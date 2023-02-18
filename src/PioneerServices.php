<?php

namespace HossamMonir\Pioneer;

use HossamMonir\Pioneer\Contracts\PioneerContract;

class PioneerServices extends PioneerContract
{
    private string $NationalityNumber;
    private int $EducationalYearID;
    private int $ReceiptType;

    public function __construct()
    {
        parent::__construct();

        $this->EducationalYearID = config('pioneer.current_educational_year');
        $this->ReceiptType = 1;
    }

    public function setNationalityNumber(string $NationalityNumber): self
    {
        $this->NationalityNumber = $NationalityNumber;

        return $this;
    }

    /**
     * Set Educational Year
     *
     * @param int|null $EducationalYearID
     * @return $this
     */
    public function setEducationalYear(int $EducationalYearID = null): self
    {
        $this->EducationalYearID = $EducationalYearID ?? config('pioneer.current_educational_year');

        return $this;
    }

    public function setReceiptType(int $ReceiptType): self
    {
        $this->ReceiptType = $ReceiptType === 1 ? 1 : 0;

        return $this;
    }


    /**
     * Get Nationalities from Pioneer API
     *
     * @return array
     */
    public function nationalities(): array
    {
        return $this->getNationalities();
    }

    /**
     * Get Branches from Pioneer API
     *
     * @return array
     */
    public function branches(): array
    {
        return $this->getBranches();
    }

    /**
     * Get Educational Years from Pioneer API
     *
     * @return array
     */
    public function educationalYears(): array
    {
        return $this->getEducationalYears();
    }

    /**
     * Get Superior Information
     *
     * @return mixed
     */
    public function superior(): mixed
    {
        return $this->getSuperior(
            NationalityNumber: $this->NationalityNumber,
        );
    }

    /**
     * Get Students Information for Superior
     *
     * @return mixed
     */
    public function students(): mixed
    {
        return $this->getSuperiorStudents(
            EducationalYearID: $this->EducationalYearID,
            SuperiorID: $this->superior()['SuperiorID'],
        );
    }

    /**
     * Get Students Statement for Superior
     *
     * @return mixed
     */
    public function studentsStatement(): mixed
    {
        return $this->getStudentsStatement(
            EducationalYearID: $this->EducationalYearID,
            SuperiorID: $this->superior()['SuperiorID'],
        );
    }

    /**
     * Get Summarized Statement for Superior
     *
     * @return mixed
     */
    public function summarizedStatement(): mixed
    {
        return $this->getSummarizedStatement(
            EducationalYearID: $this->EducationalYearID,
            SuperiorID: $this->superior()['SuperiorID'],
        );
    }

    /**
     * Get Payments for Superior
     *
     * @return mixed
     */
    public function payments(): mixed
    {
        return $this->getPayments(
            EducationalYearID: $this->EducationalYearID,
            SuperiorID: $this->superior()['SuperiorID'],
            ReceiptType: $this->ReceiptType,
        );
    }
}
